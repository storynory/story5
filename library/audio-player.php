<?php
/*
Plugin Name: Story Audio Player
Plugin URI: http://storynory.com
Description: This is storynory's media plugin using jplayer.
Version: 1.50
Author: hugh fraser
Author URI: http://storynory.com
*/

header("Access-Control-Allow-Origin: http://traffic.libsyn.com");

function getEnclosure () {
$post_id = $GLOBALS['post']->ID; 
    $enclosure = get_enclosed($post_id);
            if ($enclosure) {
             foreach ($enclosure as $mp3) {
                          // get file extension
                            $fext = strtolower(substr(strrchr($mp3,"."),1));
                                if ($fext == 'mp3') {
                    return $mp3;
                    
                               }

             }
        }
                
}

function playerControls ($mp3) {
  echo  '
    
<div class="audio-container js-audioPlayer clear">
<div class=" audioPlayer  nav">

    <ul>
    <li class="left">
    <a href="'.  $mp3 .'" class="playPause" title="Play : Pause"><span class="icon icon-play"></span></a>
    </li>
        <li class="right volume--r">
        
<input type="range" class="range-volume"  min=0 value=10 max=10 />
        </li>
    <li class="right">
    <b class="icon high icon-volume"></b>
    </li>
    <li class="right">
    <span class="time">00:00</span> 
    </li>


    <li class="left flex">

    <div class="buffer"></div>
        <input type="range" class="audio-bar js-audioRange " min="0" max="500" value="0" />  

    
    </li>
    
    </ul>

 

</div>

<div class="info">
<a class="download" href="'.  $mp3 .'" download > <b class="icon icon-download" >  Download</b> </a>
</div>
</div>


';

};



add_shortcode('audio', 'audio_player');

function audio_player ($atts) {
     extract(shortcode_atts(array(
     "url" => 'http://storynory.com',  // placeholder for url don't actually need it as getting enclosure, but might use in later versions

     ), $atts));
     global $post;
     $title = $post->post_title;

     $mp3 = getEnclosure ();
     $path_parts = pathinfo($mp3);
     $filename = $path_parts['basename'];
   

if (! is_feed()) {
playerControls ($mp3);
   

}

 else {
	return '<a href="'.  $mp3 .'" class="play tooltip fatButton button playPause rounded" title="Play : Pause">Download Audio</a>';
	
}
}




?>