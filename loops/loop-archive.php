	<?php if (is_category()) { ?>

<?php // controler 
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$order = 'ASC' ;
	$orderby = 'date';
	$checked =  $order;
	$category = get_the_category(); 
	if (isset($_REQUEST["order"])) {
		$order = $_REQUEST["order"];
		$checked = $_REQUEST["order"];
			if ($order == 'ABC') {
			     $order ='ASC';
				 $orderby = 'title';
				 $checked = 'ABC';
			}
	}
	
	?>

								<h1 class="archive-title h2">
									<?php single_cat_title(); ?>

									<?php 
									$page = intval(get_query_var('paged'));
									if ($page !== 1 && $page !== 0) {
									echo  ': Page ' .$page; }?>

								</h1>
								<aside class="notify gutter">
								<?php echo category_description(); ?>
								<?php $cat = get_query_var('cat'); 
	
	
							
	$thisCat = get_category(get_query_var('cat'),false);
	
	 $parentid = $thisCat -> category_parent;
if ($parentid) {

  if ( $parentid == 107 ) {
  		$page = "<a href='/archives/'>Original Stories</a>";
  }
  else if ($parentid == 105) {
  		 
  		$page = "<a href='/archives/classic-authors/'>Classic Authors</a>";
  
  }

  else if ($parentid == 106) {
  			$page = "<a href='/archives/educational-stories/'>Educational Stories</a>";

  }

   else if ($parentid == 8) {
  			$page = "<a href='/archives/fairy-tales/'>Fairy Tales</a>";

  }


      else if ($parentid == 171) {
  			$page = "<a href='/archives/myths-world-stories/'>Myths and World Stories</a>";

  }

        else if ($parentid == 172) {
  			$page = "<a href='/archives/archives/poems-music//'>Poems and Music</a>";

  }



  else {
     $page = "";
  }

	$parent_link = get_category_link( $parentid);	 ?>
	<p class="vertical">
		<?php if (get_metadata('taxonomy', $cat, 'feedburner', true)) {
			$feed = get_metadata('taxonomy', $cat, 'feedburner', true);
			$itunes = str_replace('http','itpc', $feed); ?>
	
		<a class="masterTooltip " title="Click this icon for our podcast feed to these stories.   You can copy and paste  the feed's URL into a podcast app to download this category."    href="<?php echo $feed; ?>" ><span class="rss icon icon-feed"></span></a>

		<a class="masterTooltip itunes" title="Click this icon to subscribe to this category in iTunes as a podcast"    href="<?php echo $itunes; ?>" ><span class="itunes icon icon-podcast"></span></a>	
		<span class="right--r">
			<b class="icon icon-direction"></b>
			<a href="/category/stories">Stories</a><b class="icon icon-arrow-right center"></b>
			<?php echo $page ?></span>
			<?php } ?>
		</p>
		<?php	} ?>

	
	</aside>
<p class="fancy"><i>Showing latest stories first.</i> <b class="icon icon-arrow-right"></b><a href="?order=ASC">Earliest First</a></p>				

							<?php } elseif (is_tag()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e("Posts Tagged:", "bonestheme"); ?></span> <?php single_tag_title(); ?>
								</h1>

							<?php } elseif (is_author()) {
								global $post;
								$author_id = $post->post_author;
							?>
								<h1 class="archive-title h2">

									<span><?php _e("Posts By:", "bonestheme"); ?></span> <?php the_author_meta('display_name', $author_id); ?>

								</h1>
							<?php } elseif (is_day()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e("Daily Archives:", "bonestheme"); ?></span> <?php the_time('l, F j, Y'); ?>
								</h1>

							<?php } elseif (is_month()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e("Monthly Archives:", "bonestheme"); ?></span> <?php the_time('F Y'); ?>
									</h1>

							<?php } elseif (is_year()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e("Yearly Archives:", "bonestheme"); ?></span> <?php the_time('Y'); ?>
									</h1>
							<?php } 

			$args = array(
	    	'cat'        =>    get_query_var('cat'),
	        'order'           => 'ASC',
	        'orderby'           => 'date',
	        'paged'           => $paged,
		
    );	


    ?>		
<?php

 $catPosts = new WP_Query ( $args );

                    // The Loop
					while ( $catPosts->have_posts() ) : $catPosts->the_post();?>
	 
		

							

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

							

									


