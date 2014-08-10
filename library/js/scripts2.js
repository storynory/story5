

var  isTouch      = 'ontouchstart' in window,
  eStart      = isTouch ? 'touchstart'  : 'mousedown',
  eMove     = isTouch ? 'touchmove' : 'mousemove',
  eEnd     = isTouch ? 'touchend' : 'mouseup';

function throttle(fn, threshhold, scope) {
  threshhold || (threshhold = 250);
  var last,
      deferTimer;
  return function () {
    var context = scope || this;

    var now = +new Date,
        args = arguments;
    if (last && now < last + threshhold) {
      // hold on to it
      clearTimeout(deferTimer);
      deferTimer = setTimeout(function () {
        last = now;
        fn.apply(context, args);
      }, threshhold);
    } else {
      last = now;
      fn.apply(context, args);
    }
  };
}



  jQuery(function($) {
   

jQuery('false').on("click", function() {
  return false;

});


 
jQuery('.side-open').on("click", function() {


         jQuery("#sidebar").css("left","0%");
         jQuery(".wrap").addClass("lock");

    });


jQuery('.side-close, .overlay').on("click", function() {
        jQuery("#sidebar").css("left","-100%");
      jQuery(".wrap").removeClass("lock");
  });


jQuery('.drop').on("click", function() {
  if (jQuery(this).hasClass("active")) {
         jQuery('.drop ul').removeClass("open");
        jQuery('.drop').removeClass("active");

  }



else {
        jQuery('.drop').removeClass("active");
        jQuery(this).addClass("active");
        jQuery('.drop ul').removeClass("open");
        jQuery("ul", this).addClass("open");
      }   



  });


jQuery('.wrap').not(".drop").on("click", function() {

  jQuery(".drop ul").removeClass("open");



});

var stickers = [
  "/wp-content/themes/story5/library/img/colin.svg",
  "/wp-content/themes/story5/library/img/wicked-queen.svg",
  "/wp-content/themes/story5/library/img/queen-frog.svg",
  "/wp-content/themes/story5/library/img/frog-teacher.svg",
  "/wp-content/themes/story5/library/img/tadpole.svg",
  "/wp-content/themes/story5/library/img/sadie.svg",
  "/wp-content/themes/story5/library/img/boris-human.svg",
  "/wp-content/themes/story5/library/img/boris-frog.svg",
  "/wp-content/themes/story5/library/img/duck.svg",
  "/wp-content/themes/story5/library/img/freddie.svg",
  "/wp-content/themes/story5/library/img/studious-tadpole.svg",
  "/wp-content/themes/story5/library/img/bertie-young-man-b.png"

];


jQuery(".visible").CaptainFade ({
  images: stickers // REQUIRED an array of images for the slideshow

 
});


jQuery('.bpn-current a').on("click", function() {
  return false;


});







 var   hiFive = {
        mp3: $("a.playPause").attr("href"),
        audio: new Audio(),
        init: function() {
            hiFive.audio.src = hiFive.mp3;
            return hiFive.audio.src;
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
            duration = hiFive.formatTime(myAudio.duration);
            return $("span.duration").text(duration);
        },
        update: function(myAudio) {
            var time;
            time = hiFive.formatTime(myAudio.currentTime);
            $("span.time").text(time);
        },
        updateSeekbar: function(myAudio) {
          var percent;
        percent = (myAudio.currentTime / myAudio.duration) * 100;
        return percent;  
        },

        moveHandle : function (myAudio) {
           var percent, percentReverse;
             percent = (myAudio.currentTime / myAudio.duration) * 100;
             percentReverse = ( 100 - percent ) * -1;
                $(".progress__bar").css("left" , percentReverse +"%");
          
        },

        scrubAudio: function(myAudio, value) {
            var newtime;
           hiFive.playPause(myAudio);
            var duration = myAudio.duration;
            newtime = (value * duration) / 100;
      
          myAudio.currentTime = newtime;
     
           hiFive.playPause(myAudio);
                   
        },


        playPause: function(audio) {
            if (hiFive.audio.paused) {
                return hiFive.audio.play();
            } else {
                return hiFive.audio.pause();
            }
        }
    };


    var prog =  function (element, pageX, pageY) {
    var y,x;
    var  width = $(element).innerWidth(),
     height = $(element).innerHeight();

     

    var elementX = $(element).offset().left,  // position of element
    elementY =  $(element).offset().top;

    x = ( pageX - elementX );   // progress in px
    y = ( pageY - elementY); 

    var progress =  {
        x : ( x / width ) * 100,   // progress as percent
        y : ( y / height ) * 100 +"%"

      };

      return progress;

    };



    hiFive.init();



    $("a.playPause").on("click",
    function() {
        $(this).toggleClass("pause");
        hiFive.playPause(hiFive.audio);
        return false;
    });

 $(".progress").on("click",
    function(e) {

      var progress = prog(this,e.pageX,e.pageY);
      console.log(progress.x);

      hiFive.scrubAudio(hiFive.audio, progress.x);
    });
 



 $(".handle").on(eStart,
  function() {
    $(".progress").on(eMove,
      function(e) {
        console.log(e);

        var progress = prog(this,e.pageX,e.pageY);
        console.log(progress.x);

        hiFive.scrubAudio(hiFive.audio, progress.x);
      });
    
  });
 
  $(".handle").on(eEnd,
  function() {
    $(".progress").off(eMove);
      
    
  });



    $(hiFive.audio).bind('timeupdate',
    function() {
      hiFive.update(hiFive.audio);
       hiFive.moveHandle(hiFive.audio);
       hiFive.getDuration(hiFive.audio);

    });



    $(hiFive.audio).on('play',
    function(evt) {
        $("a.playPause").removeClass("play");
        $("a.playPause").addClass("pause");

    });

    $(hiFive.audio).on('pause',
    function(evt) {

        $("a.playPause").removeClass("pause");
        $("a.playPause").addClass("play");
    });

   $(hiFive.audio).on('progress',
    function() {
       // $("span.indicator").addClass("loader");
    

    });

   $(hiFive.audio).on('loadeddata',
    function(evt) {
        $("span.indicator").removeClass("loader");
    });

    $(hiFive.audio).on('loadedmetadata',
    function(evt) {

         hiFive.getDuration(hiFive.audio);

    });


 


 })( jQuery );





