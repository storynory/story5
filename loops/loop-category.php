<?php if( have_posts() ) {
     	while ( have_posts() ) {
     		the_post(); ?>
              
                <article class="">
                  
                    <header>
     		          	<h3  class="title-cat fancy"><a class="fancy" href="<?php the_permalink() ?>"><?php the_title (); ?></a></h3>
                        



                    </header>
                         
                    <?php 	
global $more; 
$more = 0 ; ?>



<div class="media"> 
 <?php   thumb (); ?>
<figcaption><?php the_excerpt(); ?>


</figcaption>
</div>
<?php

//the_content('<p>More Details...</p>'); ?>
  

                </article>
     <?php	}
     		} else {
     	/* No posts found */
          } ?>
      