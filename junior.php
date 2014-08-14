<?php
/**
Template Name: junior
*/
?>

<?php
/**
Template Name: homepage
*/
?><?php get_header(); // meta, html, body, opens .wrap ?>

<h1 class="archive-title h2">
	Stories for Younger Children
								

								</h1>
								<aside class="notify gutter">
									<img class="img--left thumb" src="http://storynory.cachefly.net/thumbs/ladybird_thumb.png" alt="Nursery Rhymes 1" width="100" height="100">
									<?php echo category_description(97); ?>
								</aside>
	

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
  'posts_per_page' => 10,
  'paged' => $paged,
  'cat'  => 97
);

query_posts($args); 
?>



							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

								<header class="article-header">

									<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								

								</header> <!-- end article header -->

								<section class="entry-content vertical media--r clearfix">

									<?php thumb() ?>
									<figcaption>
										<?php $excerpt = strip_tags(get_the_excerpt());?>

									<p><?php echo $excerpt; ?><a href="<?php the_permalink(); ?>" ><b class="icon icon-arrow-right"></b> Read More</a></p>
									
									<?php  
									$mp3 = getEnclosure ();
    								 $path_parts = pathinfo($mp3);
     								$filename = $path_parts['basename'];
     								if ($mp3) {
    								playerControls($mp3); 
    							}
    								?>							

	

								</figcaption>

								</section> <!-- end article section -->

								<footer class="article-footer">

								</footer> <!-- end article footer -->

							</article> <!-- end article -->

							<?php endwhile; ?>

									<?php if (function_exists('bones_page_navi')) { ?>
										<?php bones_page_navi(); ?>
									<?php } else { ?>
										<nav class="wp-prev-next">
											<ul class="clearfix">
												<li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "bonestheme")) ?></li>
												<li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "bonestheme")) ?></li>
											</ul>
										</nav>
								<?php } ?>
<?php endif; ?>
	 <footer class="footer" role="contentinfo">
	 	<nav role="navigation">

	 		<?php bones_footer_links(); ?>
	 	</nav>
	 </footer> <!-- 

	 end footer 
	--></div>
	
	</div> <!-- end grid--> 

	





	</div>
	
	<?php get_footer(); // ends .wrap  footer hooker, ends body and html?>