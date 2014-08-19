
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

//************************************************************

//  The Plugin


(function( $ ){

// unify an end touch / click event
var isTouch = 'ontouchstart' in window,
eClick  = isTouch ? 'touchend' : 'click';
var options,checkaudio;


  var methods = {

   

    init: function() {

      methods.moveForward = methods.setMoveForward;
     

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
    getDuration: function(myaudio,range,span) {
      var duration;
      $(range).attr("max",myaudio.duration);
      duration = methods.formatTime(myaudio.duration);
      $(span).text(duration);
      return $("span.duration").text(duration);
    },

    playPause: function(myaudio) {

try {

      if (myaudio.paused) {
       
        return myaudio.play();


      } else {
        return myaudio.pause();
      }
}
catch(err) {}

    },

   update: function(range,span) {
    var time;
    time = $(range).val();
    time = methods.formatTime(time);
  
    $(span).text(time);
},
    
    moveForward : function () {},

    setMoveForward: function (myaudio, range) {
      var anim = function () { $(range).val(myaudio.currentTime);};
        requestAnimationFrame(anim);
   },

   cancelMoveForward : function () {},  // we need cancel move forward for scrubbing in fireFox

   buffered: function (myaudio) {
    var percent;
    try {
      percent = ( myaudio.buffered.end(0) ) / ( myaudio.duration) * 100;
      var anim = function () {
        $('.buffer').css("background-image", "linear-gradient( to right, #F5F5F5  "  + percent + "%, #69b07f  " + percent + "% )");
      };
      requestAnimationFrame(anim);
    }

    catch (err) { }
     },

    scrubWhite : function (myaudio, range) {
    var percent;
    percent =  ( myaudio.currentTime )  / ( myaudio.duration ) * 100;
    var anim = function () {
      $(range).css("background-image", "linear-gradient( to right, white "  + percent + "%,   #EFD480 " + percent + "% )");
     };
     requestAnimationFrame(anim);
  },


  scrub : function (myaudio,range) {
    
    var time = $(range).val();
    myaudio.currentTime = time;
   
    var percent;
    percent =  ( myaudio.currentTime )  / ( myaudio.duration ) * 100;
  
    if ( myaudio.buffered.end(0) >= myaudio.currentTime) {
      var anim = function () {
        $(range ).css("background-image", "linear-gradient( to right, white "  + percent + "%,  #EFD480 " + percent + "% )");
      };
      requestAnimationFrame(anim);
   }
 },

  volume : function (myaudio,range, icon) {
   var vol;
   vol = $(range).val();
   myaudio.volume = vol / 10;
   if (vol <= 7.5  && vol > 5) {
      $(icon ).removeClass("high").removeClass("low").addClass("medium");

   }

   if (vol >= 7.5 ){
      $(icon ).removeClass("medium").addClass("high");

   }
   
 

   if (vol < 5 && vol >= 2.5) {
        $(icon).removeClass("medium").removeClass("quiet").addClass("low");
   }

    if (vol < 2.5 && vol > 0.1) {
        $(icon).removeClass("mute").removeClass("low").addClass("quiet");
   }


 

   if (vol <= 0.1 ) {
       $(icon).removeClass("quiet").addClass("mute");
   }

  
 },

 ready : function (icon) {
  $(icon).removeClass("mute").addClass("high");
 },

 
};

//INIT ********************

methods.init();
methods.MoveForward = methods.setMoveForward;

// setup plugin

$.fn.kissaudio = function( options ) {
 
    this.each( function(i) {
        // Do something to each element here.

var player = $(this);
var audioRange  = $(settings.audioRange,player);
var playPause = $(settings.playPause,player);
var volumeRange = $(settings.volumeRange,player);
var iconVolume = $(settings.iconVolume,player);
var spanTime    = $(settings.spanTime,player);
var audioLoading = $(settings.audioLoading, player);


// create audio
var nextaudio = $("a.playPause").eq(i+1);
var myaudio = new Audio();


myaudio.src= $(playPause, this).attr("href");

$(playPause).on("click", function() {
   
if (myaudio.readyState === 0) {
  myaudio.load();
}
     methods.playPause(myaudio);
     myaudio.addEventListener('timeupdate',function () {
     methods.update(audioRange,spanTime);
});

   return false;
 });

$(myaudio).on('ended', function() {
  myaudio.currentTime = 0;
  $(nextaudio).trigger("click");   
  });

$(audioRange).on("input", function() {

// myaudio.pause(); // we need to figure out how to make sure that percentage is of correct audio
methods.moveForward = methods.cancelMoveForward();
methods.update(audioRange,spanTime);
methods.scrub(myaudio,audioRange);

});


$(volumeRange).on("input", function() {
    methods.volume(myaudio, volumeRange, iconVolume);
 });


$(audioRange ).on(eClick, function () {
  methods.moveForward  =  methods.setMoveForward; 
  methods.scrub(myaudio, audioRange);

});



myaudio.addEventListener('timeupdate',function (){
methods.update(spanTime);

  methods.MoveForward(myaudio, audioRange);
   methods.scrubWhite(myaudio, audioRange);
});


//methods.myaudio.addEventListener('progress',function (){
 // requestAnimationFrame(methods.buffered);

//});




$(myaudio).on('canplay', function() {
   methods.ready(iconVolume);
   $(audioLoading).fadeOut("slow");

  });

$(myaudio).on('loadedmetadata', function() {
   methods.getDuration(myaudio,audioRange,spanTime); // might add to different place

  });

$(myaudio).on('play',function(e) {
    
    if ( checkaudio !== e.target  && checkaudio !== undefined ) {
      checkaudio.pause();
    }

    checkaudio = e.target;
   


    $(playPause).removeClass("play");
    $(playPause).addClass("pause");


  });

$(myaudio).on('pause',
  function() {

    $(settings.playPause, player).removeClass("pause");
    $(settings.playPause, player).addClass("play");
  });





$(myaudio).on('loadedmetadata',
  function() {

   methods.getDuration(myaudio,audioRange);

 });


    });
 
};

var settings = $.extend({
    playPause       : 'a.playPause',
    audioRange       : '.js-audioRange',
    volumeRange    : '.range-volume',
    iconVolume     :".icon-volume",
    spanTime  :    ".time",
    audioLoading  :    ".audioLoading",
}, options);


})(window.jQuery || window.Zepto || window.$);