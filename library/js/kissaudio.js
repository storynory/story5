// polyfill for request animation frame from paul irish et al

(function (window, rAF, cAF) {
    var lastTime = 0, vendors = ['ms', 'moz', 'webkit', 'o'], x;

    for (x = 0; x < vendors.length && !window[rAF]; ++x) {
        window[rAF] = window[vendors[x] + 'RequestAnimationFrame'];
        window[cAF] = window[vendors[x] + 'CancelAnimationFrame']  || window[vendors[x] + 'CancelRequestAnimationFrame'];
    }

    if (!window[rAF]) {
        window[rAF] = function (callback) {
            var currTime = new Date().getTime(),
                timeToCall = Math.max(0, 16 - (currTime - lastTime)),
                id = window.setTimeout(function () { callback(currTime + timeToCall); }, timeToCall);

            lastTime = currTime + timeToCall;

            return id;
        };
    }

    if (!window[cAF]) {
        window[cAF] = function (id) {
            window.clearTimeout(id);
        };
    }
}(this, 'requestAnimationFrame', 'cancelAnimationFrame'));


// unify an end touch / click event
var isTouch = 'ontouchstart' in window,
  eClick  = isTouch ? 'touchend' : 'click';

//  The Plugin


(function( $ ){


  var methods = {

    mp3: $("a.playPause").attr("href"),

    audio: new Audio(),

    init: function() {

      methods.audio.src = methods.mp3;
      methods.moveForward = methods.setMoveForward;
      return methods.audio.src;

    },
    formatTime: function(seconds) {
      var minutes;
      seconds = Math.round(seconds);
      minutes = Math.floor(seconds / 60);
      if (minutes < 10) { minutes = "0" + minutes ;}
      seconds = seconds - (minutes * 60);
      if (seconds < 10) { seconds = "0" + seconds ;}
      return minutes + ":" + seconds;
    },
    getDuration: function(myAudio) {
      var duration;
      duration = methods.formatTime(myAudio.duration);
      $(".js-audioRange").attr("max",myAudio.duration);
      return $("span.duration").text(duration);
    },

    playPause: function() {

      if (methods.audio.paused && methods.audio.readyState >= 1  ) {
       
        return methods.audio.play();


      } else {
        return methods.audio.pause();
      }
    },

   update: function() {
    var time;
    time = $(".js-audioRange").val();
    time = methods.formatTime(time);
   $("span.time").text(time);
},
    
    moveForward : function () {},

    setMoveForward: function () {
     $('.js-audioRange').val(methods.audio.currentTime);
   },

   cancelMoveForward : function () {},  // we need cancel move forward for scrubbing in fireFox

   buffered: function () {
    var percent;
    try {
      percent = ( methods.audio.buffered.end(0) ) / ( methods.audio.duration) * 100;
      $('.buffer').css("background-image", "linear-gradient( to right, #F5F5F5  "  + percent + "%, #69b07f  " + percent + "% )");
    }

    catch (err) { }
     },

    scrubWhite : function () {
    var percent;
    percent =  ( methods.audio.currentTime )  / ( methods.audio.duration ) * 100;
    $('.js-audioRange').css("background-image", "linear-gradient( to right, white "  + percent + "%,   #EFD480 " + percent + "% )");

  },

  scrub : function () {
    var time = $(".js-audioRange").val();
    methods.audio.currentTime = time;
    var percent;
    percent =  ( methods.audio.currentTime )  / ( methods.audio.duration ) * 100;
    if ( methods.audio.buffered.end(0) >= methods.audio.currentTime) {
     $('.js-audioRange').css("background-image", "linear-gradient( to right, white "  + percent + "%,  #EFD480 " + percent + "% )");
   }
 },

  volume : function () {
   var vol;
   vol = $(".range-volume").val();
   methods.audio.volume = vol / 10;
   if (vol <= 7.5  && vol > 5) {
      $(".icon-volume").removeClass("high").removeClass("low").addClass("medium");

   }

   if (vol >= 7.5 ){
      $(".icon-volume").removeClass("medium").addClass("high");

   }
   
 

   if (vol < 5 && vol >= 2.5) {
        $(".icon-volume").removeClass("medium").removeClass("quiet").addClass("low");
   }

    if (vol < 2.5 && vol > 0.1) {
        $(".icon-volume").removeClass("mute").removeClass("low").addClass("quiet");
   }


 

   if (vol <= 0.1 ) {
       $(".icon-volume").removeClass("quiet").addClass("mute");
   }

  
 },

 ready : function () {
  $(".icon-volume").removeClass("mute").addClass("high");
 },

 duration : function ()  {
  var time;
    time = methods.audio.duration;
    time = methods.formatTime(time);
    $("span.time").text(time);

 }
};


methods.init();


$("a.playPause").on("click",
  function() {
    //methods.audio.src = $(this).attr("href");
     methods.playPause(methods.audio);
     methods.audio.addEventListener('timeupdate',function () {
     requestAnimationFrame( methods.update );
});

   return false;
 });



$(".js-audioRange").on("input", function() {

// methods.audio.pause(); 
methods.moveForward = methods.cancelMoveForward;
cancelAnimationFrame(methods.moveForward);
requestAnimationFrame( methods.update );
 requestAnimationFrame(methods.scrub);

});


$(".range-volume").on("input", function() {
    methods.volume();
 });


$(".js-audioRange").on(eClick, function () {
  methods.moveForward = methods.setMoveForward;
 requestAnimationFrame(methods.moveForward);
 // methods.audio.play(); 
});


methods.audio.addEventListener('timeupdate',function (){
 // requestAnimationFrame( methods.update );

  requestAnimationFrame( methods.moveForward );
  requestAnimationFrame( methods.scrubWhite );
});


//methods.audio.addEventListener('progress',function (){
 // requestAnimationFrame(methods.buffered);

//});


$(methods.audio).on('canplay', function() {
    methods.ready();

  });

$(methods.audio).on('loadedmetadata', function() {
   methods.duration(); // might add to different place

  });

$(methods.audio).on('play',
  function() {


    $("a.playPause").removeClass("play");
    $("a.playPause").addClass("pause");


  });

$(methods.audio).on('pause',
  function() {

    $("a.playPause").removeClass("pause");
    $("a.playPause").addClass("play");
  });


$(methods.audio).on('loadedmetadata',
  function() {

   methods.getDuration(methods.audio);

 });

})(window.jQuery || window.Zepto || window.$);