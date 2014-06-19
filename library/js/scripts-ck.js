// var  isTouch      = 'ontouchstart' in window,
//eStart      = isTouch ? 'touchstart'  : 'mousedown',
//eMove     = isTouch ? 'touchmove' : 'mousemove';
//eEnd     = isTouch ? 'touchend' : 'mouseup';
jQuery(function(){jQuery(".side-open").on("click",function(){console.log("click");jQuery("#sidebar").css("left","0%");jQuery(".wrap").addClass("lock")});jQuery(".side-close, .overlay").on("click",function(){jQuery("#sidebar").css("left","-100%");jQuery(".wrap").removeClass("lock")})});