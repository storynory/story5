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

var stickers = [
  "/wp-content/themes/story5/library/img/colin.svg",
  "/wp-content/themes/story5/library/img/wicked-queen.svg",
  "/wp-content/themes/story5/library/img/queen-frog.svg",
  "/wp-content/themes/story5/library/img/frog-teacher.svg",
  "/wp-content/themes/story5/library/img/tadpole.svg",
  "/wp-content/themes/story5/library/img/sadie.svg",
  "/wp-content/uploads/2014/06/bertie-young-man.png",
  "/wp-content/themes/story5/library/img/boris-human.svg",
  "/wp-content/themes/story5/library/img/boris-frog.svg",
  "/wp-content/themes/story5/library/img/duck.svg",
  "/wp-content/themes/story5/library/img/freddie.svg",
  "/wp-content/themes/story5/library/img/studious-tadpole.svg"

];

var count = 0;

var length = stickers.length;

var counter = function () {

 count = count + 1;
  if (length === count) {
      count = 0;
    } 

   return count; 
};

var fadeStickers = function (img) {
    
        jQuery("#sticker01").fadeOut(2000, function() {
        jQuery("#sticker01").attr("src",img).fadeIn(1000);
     
      });
 
};

var run  = setInterval(function() {
fadeStickers (stickers[count]);
  counter();

},6000);

run ();

jQuery('.bpn-current a').on("click", function() {
  return false;


});


});
