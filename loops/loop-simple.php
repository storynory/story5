<?php 
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); 
			//
			// Post Content here
			//
		 the_content();
		} // end while
	} // end if
?>
