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

	
		<? // include main article loops //




			include_once "loops/loop-archive.php" ;

		 ?>

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
