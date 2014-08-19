!function(e,a,n){var t=0,o=["ms","moz","webkit","o"],i;for(i=0;i<o.length&&!e[a];++i)e[a]=e[o[i]+"RequestAnimationFrame"],e[n]=e[o[i]+"CancelAnimationFrame"]||e[o[i]+"CancelRequestAnimationFrame"];e[a]||(e[a]=function(a){var n=(new Date).getTime(),o=Math.max(0,16-(n-t)),i=e.setTimeout(function(){a(n+o)},o);return t=n+o,i}),e[n]||(e[n]=function(a){e.clearTimeout(a)})}(this,"requestAnimationFrame","cancelAnimationFrame"),function($){var e="ontouchstart"in window,a=e?"touchend":"click",n,t,o={init:function(){o.moveForward=o.setMoveForward},formatTime:function(e){var a;return e=Math.round(e),a=Math.floor(e/60),10>a&&(a="0"+a),e-=60*a,10>e&&(e="0"+e),a+":"+e},getDuration:function(e,a,n){var t;return $(a).attr("max",e.duration),t=o.formatTime(e.duration),$(n).text(t),$("span.duration").text(t)},playPause:function(e){return e.paused&&4===e.readyState?e.play():e.pause()},update:function(e,a){var n;n=$(e).val(),n=o.formatTime(n),$(a).text(n)},moveForward:function(){},setMoveForward:function(e,a){var n=function(){$(a).val(e.currentTime)};requestAnimationFrame(n)},cancelMoveForward:function(){},buffered:function(e){var a;try{a=e.buffered.end(0)/e.duration*100;var n=function(){$(".buffer").css("background-image","linear-gradient( to right, #F5F5F5  "+a+"%, #69b07f  "+a+"% )")};requestAnimationFrame(n)}catch(t){}},scrubWhite:function(e,a){var n;n=e.currentTime/e.duration*100;var t=function(){$(a).css("background-image","linear-gradient( to right, white "+n+"%,   #EFD480 "+n+"% )")};requestAnimationFrame(t)},scrub:function(e,a){var n=$(a).val();e.currentTime=n;var t;if(t=e.currentTime/e.duration*100,e.buffered.end(0)>=e.currentTime){var o=function(){$(a).css("background-image","linear-gradient( to right, white "+t+"%,  #EFD480 "+t+"% )")};requestAnimationFrame(o)}},volume:function(e,a,n){var t;t=$(a).val(),e.volume=t/10,7.5>=t&&t>5&&$(n).removeClass("high").removeClass("low").addClass("medium"),t>=7.5&&$(n).removeClass("medium").addClass("high"),5>t&&t>=2.5&&$(n).removeClass("medium").removeClass("quiet").addClass("low"),2.5>t&&t>.1&&$(n).removeClass("mute").removeClass("low").addClass("quiet"),.1>=t&&$(n).removeClass("quiet").addClass("mute")},ready:function(e){$(e).removeClass("mute").addClass("high")}};o.init(),o.MoveForward=o.setMoveForward,$.fn.kissaudio=function(e){this.each(function(e){var n=$(this),r=$(i.audioRange,n),u=$(i.playPause,n),d=$(i.volumeRange,n),s=$(i.iconVolume,n),m=$(i.spanTime,n),c=$(i.audioLoading,n),l=$("a.playPause").eq(e+1),f=new Audio;f.preload="metadata",f.src=$(u,this).attr("href"),$(u).on("click",function(){return 0===f.readyState&&f.load(),o.playPause(f),f.addEventListener("timeupdate",function(){o.update(r,m)}),!1}),$(f).on("ended",function(){f.currentTime=0,$(l).trigger("click")}),$(r).on("input",function(){o.moveForward=o.cancelMoveForward(),o.update(r,m),o.scrub(f,r)}),$(d).on("input",function(){o.volume(f,d,s)}),$(r).on(a,function(){o.moveForward=o.setMoveForward,o.scrub(f,r)}),f.addEventListener("timeupdate",function(){o.update(m),o.MoveForward(f,r),o.scrubWhite(f,r)}),$(f).on("canplay",function(){o.ready(s),$(c).fadeOut("slow")}),$(f).on("loadedmetadata",function(){o.getDuration(f,r,m)}),$(f).on("play",function(e){t!==e.target&&void 0!==t&&t.pause(),t=e.target,$(u).removeClass("play"),$(u).addClass("pause")}),$(f).on("pause",function(){$(i.playPause,n).removeClass("pause"),$(i.playPause,n).addClass("play")}),$(f).on("loadedmetadata",function(){o.getDuration(f,r)})})};var i=$.extend({playPause:"a.playPause",audioRange:".js-audioRange",volumeRange:".range-volume",iconVolume:".icon-volume",spanTime:".time",audioLoading:".audioLoading"},n)}(window.jQuery||window.Zepto||window.$);