// select individual words
var select;
select = function() {
    var sel = (document.selection && document.selection.createRange().text) ||
    (window.getSelection && window.getSelection().toString());
    return sel;
};


  (function( $ ){
   

$('false').on("click", function() {
  return false;

});


 
$('.side-open').on("click", function() {


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


$(".js-audioPlayer").kissaudio();



// simple tooltip
//http://www.alessioatzeni.com/blog/simple-tooltip-with-jquery-only-text/
$('.masterTooltip').hover(function(){
        // Hover over code
        var title = $(this).attr('title');
        $(this).data('tipText', title).removeAttr('title');

 )};
 
 var tip = function (title) {       
        $('<p class="tooltip"></p>')
        .text(title)
        .appendTo('body')
        .fadeIn('slow');
}, function() {
        // Hover out code
        $(this).attr('title', $(this).data('tipText'));
        $('.tooltip').remove();
}).mousemove(function(e) {
        var mousex = e.pageX + 20; //Get X coordinates
        var mousey = e.pageY + 10; //Get Y coordinates
        $('.tooltip')
        .css({ top: mousey, left: mousex });
});
}


// reset on back button
 $('input:checkbox').prop('checked', false);
 $('#donateXclick').val("_xclick");
  $("#donatePrice").attr("name","amount");

$("#donateRecur").on("change", function() {
   var box = $(this);
   if($(box).is(':checked')) {
      $("#donatePrice").attr("name","a3");
      $("#donateXclick").val("_xclick-subscriptions");

   }
  else {
    $("#donatePrice").attr("name","amount");
    $("#donateXclick").val("_xclick");
  }


});

$('.form').on('submit', function (e) {
    $('.required').each(function(){
        var self = $(this);
        if (self.val() === '') {
            e.preventDefault();
        } else {
            // submit otherwise
        }
    });
});


// select individual words
select = function() {
    var sel = (document.selection && document.selection.createRange().text) ||
    (window.getSelection && window.getSelection().toString());
    return sel;
};


$.ajax({
        type: "GET",
        url: "/wp-content/themes/story5/library/translate.php",
        data: {
          what : "witch",
          from : "en",
          to : "fr"
        },
        dataType: 'json',
        success: function(data) {
            console.log(data.sentences[0].trans);
        },
        error: function(data) {
            console.log('sorry, translation did not work');
        }
    });




 })( jQuery );




