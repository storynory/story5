<?php
/**
Template Name: homepage
*/
?><?php get_header(); // meta, html, body, opens .wrap ?>



<div class="grid">
	
	<div class="grid__item one-whole">


		
	<?php include_once "masthead.php" ?>
		
		<div id="sidebar" class="sidebar grid__item two-thirds">
			
			<?php //get_sidebar(); ?>	
		</div>

	<div class="grid__item one-whole">

	<nav class="nav--wrap">
		
	</nav>	

		</div><!--
				
		
	--><div class="grid__item r-two-thirds">


	<div class="notice gutter">


		<?php 

		$args = array(
			'posts_per_page'=> 1,
			'cat' => 11
			
			
			);


// the query
			$the_query = new WP_Query( $args); ?>

			<?php if ( $the_query->have_posts() ) : ?>

			<!-- pagination here -->

			<!-- the loop -->
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<h2><b class="badge">New</b>  <a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h2>
			<figure class="media--r">
				<?php the_post_thumbnail('full'); ?>
				<figcaption>
					<?php the_excerpt(); ?>
				</figcaption>  
				<div class="space--top">
					<a class="btn space right default" href="<?php the_permalink(); ?>"><b class="icon icon-arrow-right"></b>Go To Story</a>
				</div>

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

		<ul class="list-border">
			<li>

				<figure class="media">

					<img alt="gladys" class="left" src="http://www.storynory.com/wp-content/uploads/2014/05/gladyssquare-1400-100x100.jpg" />
					<figcaption>
						Our musical series about Gladys who aims to be a pop diva.

					</figcaption>
					<a class="btn right" href="http://www.storynory.com/2014/06/01/o1-gladys-alone-advice/"><b class="icon icon-arrow-right"></b>Go To</a>
				</figure>
			</li>
			<li>

				<figure class="media">

					<img alt="The Hound" class="left" src="http://storynory.cachefly.net/wp-content/uploads/2014/04/scary-dog-thumb.jpg" />
					<figcaption>	
						The full audio book of The Hound of the Baskervilles.
						<a class="btn right" href="http://storynory.dev/2014/04/22/01-baskervilles-mr-sherlock-holmes/"><b class="icon icon-arrow-right"></b>Go To</a>
					</figcaption>


				</figure>	
			</li>
		</ul>

	</div>

</div>	


<div class="grid__item one-whole">



	<figure class="notice media gutter">
		<img src="http://storynory.dev/wp-content/uploads/2014/06/beatrice-frog.png" alt="Beatrice Fog" width="100" height="100" class="alignnone size-full wp-image-12822" />
		<figcaption>
			Listen to 100s of free audio books for kids beautifully read.  Bertie has: 
<ul class="list--inline">
			<li><a href="/archives/">Original Stories</a></li>
			<li><a href="/archives/classic-authors/">Classic Audio Books</a></li>
			<li><a href="/archives/poems-music/">Poems and Music</a></li>
			<li><a href="/archives/fairy-tales/">Fairy Tales</a></li>
			<li><a href="/archives/educational-stories/">Educational Stories</a></li>
			<li><a href="/archives/myths-world-stories/">Myths and World Stories</a></li>
			<li><a href="/archives/stories-for-younger-children/">Junior Stories</a></li>
</ul>


		</figcaption>

	</figure>

</div>

<div class="grid__item one-whole">
<h3>Recent Stories</h3>

<div class="inline__item r-one-half"> 
<?php $lastposts = get_posts('category=1&numberposts=10&offset=1&order=desc&orderby=post_date');
foreach($lastposts as $post) :
	setup_postdata($post);
?>

	<article class="gutter space archives__item">


		<figure class="media">
			<h4> <a href="<?php the_permalink() ?>"><?php the_title(); ?> </a></h4>
			<?php thumb (); ?>
			<figcaption>
				<a class="a-trans" href="<?php the_permalink() ?>">
				<?php the_excerpt (); ?></a>

			</figcaption>
		</figure>

	</article>

</div><!--	--><div class="inline__item r-one-half">
<?php endforeach; ?>
</div>
</div>

<div class="grid__item one-whole">

	<footer class="footer" role="contentinfo">




		<nav role="navigation">

			<?php bones_footer_links(); ?>
		</nav>
	 
<div class="notice small gutter">
<p>Storynory Ltd, 26 Star Street, London UK.  +44 (0) 7941 190 740.   Bertie@storynory.com.<p>
<p>Audio, text and images are Copyright Storynory Ltd unless otherwise stated<p>
<p>Our Terms and Conditions make it easy for schools to use our materials for free, please see our <a href="/about-storynory/privacy/" >legal page</a> for details</p>
</div>


	 </footer> <!-- 

	 end footer 
	--></div>
	
</div> <!-- end grid-->

<?php get_footer(); // ends .wrap  footer hooker, ends body and html?>