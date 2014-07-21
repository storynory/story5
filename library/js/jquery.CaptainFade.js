/*CaptainFade() by Hugh Fraser Licence MIT
*
*/
/* [URL] */
;(function(defaults, $, window, document, undefined) {

	'use strict';


	$.extend({
		// Function to change the default properties of the plugin
		// Usage:
		// jQuery.pluginSetup({property:'Custom value'});
		pluginSetup : function(el,options) {

			return $.extend(defaults, options);
		}
	}).fn.extend({
		// Usage:
		// jQuery(selector).pluginName({property:'value'});
		CaptainFade : function(options) {

			options = $.extend({}, defaults, options);

			return $(this).each(function() {

				// Plugin logic
				// Calling the function:
				// jQuery(selector).pluginName(options);
				var visible = options.visible;
				var length = options.images.length;
			//	var first = options.images[0];
			var pagenumber = 0;
			var page = 0;
			var counter = 0;
				var play; // need to declare outside of setInterval function so can clear it and start it again

				var goTo = function (page) {
					options.before(); // first callback
					$(visible).fadeOut(options.fadeOutspeed, function() {
						$(visible).attr("src", options.images[page]);

						options.middle(); // second callback	
						$(visible).fadeIn(options.fadeInspeed, function() {
							options.after(); // last callback
						});


					});
					pagenumber = page;
					//console.log ("pagenumber " + pagenumber);
					options.pagenumber = page;
				};

				var loop = function () {

					counter = counter + 1;


					if (counter === length) {	
						counter = 0;
					}   


					goTo(counter);

				};

				setTimeout(function () {

						var start = function() {
							play = setInterval(function()
							{ 

								loop ();


							},8000);
						};

						if (options.loop === true) {
							start();
						}

					}, 200);	

				var pause = function () {
					clearInterval(play); 
				};

				var next = function ()  {
					pause ();
					

					if (pagenumber === length -2 ) {
						page = 0;
					}

					else {
						page = pagenumber +1;
					}
					goTo(page);

				};

				var prev = function ()  {
					pause ();

					if (pagenumber ===  0 ) {
						page = length -1;
					}

					else {
						page = pagenumber -1;
					}
					goTo(page);

				};

				// click to go to next slide
				$(options.next).click(function() {
					next();
					return false;

				});
				// click to go to previous slides
				$(options.prev).click(function() {
					prev();
					return false;

				});

				// click to go to pause
				$(options.pause).click(function() {
					pause();
					return false;

				});

				// click to go to play
				$(options.play).click(function() {
					//start();
					//return false;	
				});

				


			});
}

});
})({
	visible: " .visible", // REQUIRED a starting image whose src we will fade in and out - should also match first src in array of images
	images: "an array of images please",  // REQUIRED an array of images for the slideshow
	prev : ".prev",
	next : ".next",
	pagenumber: 0,
	play : ".play",
	pause:  ".pause",
	loop: true, // could be better named since it is auto play
	fadeOutspeed: 600,
	fadeInspeed: 1000,
	before: function() {},  // callback
	middle: function() {}, // callback
	after:  function() {} // callback
}, jQuery, window, document);


