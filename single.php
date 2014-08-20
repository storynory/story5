<?php get_header(); // meta, html, body, opens .wrap
	 global $more; $more=0; the_content(''); $more=1;
 ?>


	<div class="grid">
		
		<div class="grid__item one-whole">

		
		<?php include_once "masthead.php" ?>

		</div><!--
			
		
	 --><div class="grid__item one-whole">

	  	<nav class="nav--wrap">
	
		</nav>	

		</div><!--
				
		
	 --><div class="grid__item one-whole"> 

	<div class="gutter">
	
<?php get_template_part( 'loops/loop-single' ); ?>

		


		
		</div>

</div>

<div id="sidebar" class="sidebar grid__item two-thirds">
	
		<?php get_sidebar(); ?>	
</div>

	<div class="grid__item one-whole">

	 <footer class="footer" role="contentinfo">
	 	<nav role="navigation">

	 		<?php bones_footer_links(); ?>
	 	</nav>
	 </footer> <!-- 

	 end footer 
	--></div>
	
	</div> <!-- end grid-->
	
	<?php get_footer(); // ends .wrap  footer hooker, ends body and html?>