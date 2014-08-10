(function($) {  

 // we have two public functions - 
 //scrub returns x and y positions of the mouse on scrub
 // move handle - moves the scrubber if it has a handle. (you don't need it without a handle);
  
  var  isTouch      = 'ontouchstart' in window,
  eStart      = isTouch ? 'touchstart'  : 'mousedown',
  eMove     = isTouch ? 'touchmove' : 'mousemove';


var scrub = function () {

  $(this).on (eMove, function (e)  {
    var element = $(this);
    prog =  methods.progress (element, e.x, e.y);
   
    return prog;
  });

};


var api = {
  scrub : scrub
}; 


    var methods = {
      
      innerDimensions : function (elem) {  // Get dimensions without borders. zepto does not have innerWidth();
      
      //   - first get widths of borders

 
        var borderTop = parseInt(elem.css("border-top-width"), 10), 
            borderRight = parseInt(elem.css("border-right-width"), 10),
            borderBottom = parseInt(elem.css("border-bottom-width"), 10),
            borderLeft = parseInt(elem.css("border-left-width"), 10);
            

        var borderWidth = borderLeft + borderRight,    
            borderHeight = borderTop + borderBottom;

            
        var outWidth = $(elem).width(),  // get outer dimensions
            outHeight = $(elem).height();
            
            
        var dimensions = { // take away borders
            X : outWidth - borderWidth, 
            Y : outHeight - borderHeight

           } ;


        return dimensions;    

  },

  progress : function (element, pageX, pageY) {

   var element = element;

 
    var dimensions = methods.innerDimensions( element ),  // dimensions without borders
        width = dimensions.X,
        height = dimensions.Y;

    var elementX = $(element).offset().left,  // position of element
        elementY =  $(element).offset().top;

    var x = ( pageX - elementX ),   // progress in px
        y = ( pageY - elementY) ; 

    var progress =  {
        x : ( x / width ) * 100 +"%",   // progress as percent
        y : ( y / height ) * 100 +"%"

      };

    return progress;
 
  }

};

     var defaults = {
        callback : function() {}
    };

$.fn.myuiScrubber = function(options) {  
  if (typeof arguments[0] === 'string') {  
    var property = arguments[1];  
    var args = Array.prototype.slice.call(arguments);  
    args.splice(0, 1);  

    api[arguments[0]].apply(this, args);  
  }  
  else {  

  defaults = $.extend(defaults, options); // Overwrite defaults
   init.apply(this, defaults);  
 }  
 return this;  
};  


      function init(options){ 

    
   }

   })(window.jQuery || window.Zepto || window.$); 





