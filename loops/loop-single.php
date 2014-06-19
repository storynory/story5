				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

					<header class="article-header">

						<h1 class="page-title"><?php the_title(); ?></h1>
					 
					 <div class="vertical"><span class="icon glyphicon-bookmark"></span> <span>You are here:  <?php $bread = archivebox(); ?>
							<a  href="/<?php echo $bread['pageSlug']?>/" ><?php echo $bread["sectionName"]?></a>   
							<span>  <span class="icon center glyphicon-arrow-right"></span></span>
							<a class="nowrap" href="/category/<?php echo $bread["postCatSlug"]?>/" ><?php echo $bread["postCatName"] ?></a>  </span> 

					 	<span class="Commments right--r"><span class="icon glyphicon-comment "></span><a href="#comments"><?php comments_number( 'no comments yet', 'one comment', '% comments' ); ?></a></span>

						</div>
						


					</header> <!-- end article header -->


					<?php global $more; $more=0; the_content(''); $more=1; ?>



<hr class="vertical" />
<div id="main-content" class="drop">
					<?php the_content('', true); ?>



					<footer class="article-footer">
						<p class="clearfix"><?php the_tags('<span class="tags">' . __('Tags:', 'bonestheme') . '</span> ', ', ', ''); ?></p>

					</footer> <!-- end article footer -->
</div>
					<?php comments_template(); ?>
				</article> <!-- end article section -->
				

			<?php endwhile; else : ?>

			<article id="post-not-found" class="hentry clearfix">
				<header class="article-header">
					<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
				</header>
				<section class="entry-content">
					<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
				</section>
				<footer class="article-footer">
					<p><?php _e("This is the error message in the page-custom.php template.", "bonestheme"); ?></p>
				</footer>
			</article>

		<?php endif; ?>



