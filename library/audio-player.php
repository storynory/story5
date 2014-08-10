<?php
/*
Plugin Name: Story Audio Player
Plugin URI: http://storynory.com
Description: This is storynory's media plugin using jplayer.
Version: 1.50
Author: hugh fraser
Author URI: http://storynory.com
*/



add_shortcode('audio', 'audio_player');

function audio_player ($atts) {
     extract(shortcode_atts(array(
     "url" => 'http://storynory.com',  // placeholder for url don't actually need it as getting enclosure, but might use in later versions

     ), $atts));
     global $post;
     $title = $post->post_title;

     $mp3 = getEnclosure ();

if (! is_feed()) {

     return '
	
<div class="audio-container">
<div class=" audioPlayer nav">

	<ul>
	<li class="left">
	<a href="'.  $mp3 .'" class="playPause" title="Play : Pause"><span class="icon icon-play"></span></a>
	</li>
		<li class="right">
    	
<input type="range" class="range-volume" min=0 value=10 max=10 />
    	</li>
	<li class="right">
    <b class="icon mute icon-volume"></b>
    </li>
    <li class="right">
    <span class="time">00:00</span> 
    </li>


	<li class="left flex">

	<div class="buffer"></div>
		<input type="range" class="audio-bar js-audioRange" min="0" max="500" value="0" />	

	
	</li>
    
	</ul>

 

</div>

<a class="download" href="'.  $mp3 .'   " download=". $mp3 ." > <b class="icon icon-download" >  Download</b> </a>

</div>

'
;



}

 else {
	return '<a href="'.  $mp3 .'" class="play tooltip fatButton button playPause rounded" title="Play : Pause">Download Audio</a>';
	
}
}

?>