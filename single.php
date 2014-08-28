<?php get_header(); // meta, html, body, opens .wrap

$postid = get_the_ID(); 
$title =  get_the_title( $postid ); // we need this not to conflict with Barley
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
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
		<header class="article-header">
			<h1 class="page-title"><?php the_title(); ?></h1>
			<div class="vertical"><span class="icon icon-direction"></span> <span>  <?php $bread = archivebox(); ?>
				<a  href="/<?php echo $bread['pageSlug']?>/" ><?php echo $bread["sectionName"]?></a>   
				<span>  <span class="icon center icon-arrow-right"></span></span>
				<a class="nowrap" href="/category/<?php echo $bread["postCatSlug"]?>/" ><?php echo $bread["postCatName"] ?></a>  </span> 
				<span class="Commments right--r"><span class="icon icon-bubble "></span><a href="#comments"><?php comments_number( 'no comments yet', 'one comment', '% comments' ); ?></a></span>
			</div>
		</header> <!-- end article header -->
		<?php global $more;  $more=0; the_content(''); $more=1;

		 ?>
		<nav class="nav">
			<p> <i>Share this page - parents, teachers, anyone 13 years old or older</i></p>	
			<ul class="social-icons-horiz" >
				<li class="left"><a href="mailto:myfriend@change-this-email-address.com?subject=<?php echo $title; ?>&body=I've just been listening to <?php echo $title ?> on Storynory.  Here's the link: <?php echo get_permalink( ); ?>. I think you would love it too"><span class="icon icon-mail-send"></span></a></li>							
				<li class="left"><a target="target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink (); ?>&kidDirectedSite=1"><span class="icon icon-facebook"></span></a></li>
				<li class="left"><a target="target="_blank"  href="https://plus.google.com/share?url=<?php the_permalink (); ?>"><span class="icon icon-googleplus"></span></a></li>
				<li class="left"><a target="target="_blank" href="https://twitter.com/home?status=<?php the_permalink (); ?>"><span class="icon icon-twitter"></span></a></li>   
				<li class="left"><a target="target="_blank" href="http://pinterest.com/pinthis?url=<?php the_permalink (); ?>"><span class="icon icon-pinterest"></span></a></li>      							
			</ul>
		</nav>	
		<hr class="vertical" />
		<div id="main-content" class="drop">
<?php  //
the_content('', true); ?>
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