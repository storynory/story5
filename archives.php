<?php
/*
Template Name: archives
*/
?>

<?php get_header(); // meta, html, body, opens .wrap ?>
	<div class="grid">
		
		<div class="grid__item one-whole">

		
		<?php include_once "masthead.php" ?>

		</div><!--
			
		
	 --><div class="grid__item one-whole">

	  	<nav class="nav--wrap">
	
		</nav>	

		</div><!--
				
		
	 --><div class="grid__item one-whole">

	
	
		
		<?php // include main article loop that does for most pages here //
		
			get_template_part( 'loops/loop-archives' ); 

		 ?>

</div>

<div id="sidebar" class="sidebar grid__item two-thirds">
	
		<?php get_sidebar(); ?>	
</div>

	<div class="grid__item one-whole">

	 <footer class="footer" role="contentinfo">

<div class="grid__item one-whole">


<nav>
<ul class="social-icons-horiz centered" >

	
							
            <li class="left"><a href="mailto:myfriend@change-this-email-address.com?subject=<?php the_title(); ?>&body=I've just been listening to <?php the_title();?> on Storynory.  Here's the link: <?php echo get_permalink( ); ?>. I think you would love it too"><span class="icon icon-mail-send"></span></a></li>							
							
             <li class="left"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink (); ?>&kidDirectedSite=1"><span class="icon icon-facebook"></a></li>
							
             <li class="left"><a href="https://plus.google.com/share?url=<?php the_permalink (); ?>"><span class="icon icon-googleplus"></a></li>
							
             <li class="left"><a href="https://twitter.com/home?status=<?php the_permalink (); ?>"><span class="icon icon-twitter"></a></li>
            							
             <li class="left"><a href="http://feeds.feedburner.com/storynory"><span class="icon icon-feed"></a></li>
	</ul>
</nav>
</div>

	 	<nav role="navigation">

	 		<?php bones_footer_links(); ?>
	 	</nav>
	 </footer> <!-- 

	 end footer 
	--></div>
	
	</div> <!-- end grid-->
	


	<?php get_footer(); // ends .wrap  footer hooker, ends body and html?>