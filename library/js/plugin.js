(function($) {


// any set up stuff goes here


// public functions
var pub1 = function () {


};

var pub2 = function () {
    methods.methods1();

};

// expose public functions
var api = {
  pup1 : pub1,
  pub2 : pub2
};

// internal methods

    var methods = {
      
      method1 : function () {  // Get dimensions without borders. zepto does not have innerWidth();
      
          

  },


  method2 : function () {

   
 
  }

};

// add defaults that can be over rided by options
     var defaults = {
        default1 : function() {},
         default2 : function() {},
    };

    $.fn.myuiScrubber = function(options) {
      if (typeof arguments[0] === 'string') {
      //  var property = arguments[1];
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

// not all jquery's features work in zepto so be careful if use zepto



