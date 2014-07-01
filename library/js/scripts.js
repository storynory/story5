// var  isTouch      = 'ontouchstart' in window,
  //eStart      = isTouch ? 'touchstart'  : 'mousedown',
  //eMove     = isTouch ? 'touchmove' : 'mousemove';
  //eEnd     = isTouch ? 'touchend' : 'mouseup';

  jQuery(function() {
  //  FastClick.attach(document.body);



 
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

});
