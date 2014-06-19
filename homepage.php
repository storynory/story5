<?php
/**
Template Name: homepage
*/
?><?php get_header(); // meta, html, body, opens .wrap ?>
	<div class="grid">
		
		<div class="grid__item one-whole">

		
		<?php include_once "masthead.php" ?>

		</div><!--
			
		
	 --><div class="grid__item one-whole">

	  	<nav class="nav--wrap">
	
		</nav>	

		</div><!--
				
		
	 --><div class="grid__item r-two-thirds">


<div class="notice">


<?php 

	$args = array(
				'posts_per_page'=> 1,
				
				
				);


// the query
$the_query = new WP_Query( $args); ?>

<?php if ( $the_query->have_posts() ) : ?>

  <!-- pagination here -->

  <!-- the loop -->
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <h2><b class="badge">New</b>  <a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h2>
<figure class="media">
<?php the_post_thumbnail('full'); ?>
<figcaption>
    <?php the_excerpt(); ?>
    <p><a class="btn default" href="<?php the_permalink(); ?>"><b class="icon glyphicon-headphones"></b>  Go to Story &raquo</a></p>
 </figcaption>   
 </figure>   
  <?php endwhile; ?>
  <!-- end of the loop -->

  <!-- pagination here -->

  <?php wp_reset_postdata(); ?>

<?php else:  ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</div>
</div>

<div class="grid__item r-one-third">
<div class="gutter--left gutter">
<h3>Don't Miss</h3>

<p>Our musical series about Gladys follows a clever girl who plans to make it big as a pop diva.</p>

</div>

</div>	


<div class="grid__item one-whole">

	<figure class="notice media gutter">
	<img src="http://storynory.dev/wp-content/uploads/2014/06/beatrice-frog.png" alt="Beatrice Fog" width="100" height="100" class="alignnone size-full wp-image-12822" />
	<figcaption>
	Listen to 100s of free audio books for kids beautifully read.  Bertie has original stories, classic audio books, poems, fairy tales, myths, legends and more.
</figcaption>
</figure>

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
