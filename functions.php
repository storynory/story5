<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/
This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/
/************* INCLUDE NEEDED FILES ***************/
/*
1. library/bones.php
- head cleanup (remove rsd, uri links, junk css, ect)
- enqueueing scripts & styles
- theme support functions
- custom menu output & fallbacks
- related post function
- page-navi function
- removing <p> from around images
- customizing the post excerpt
- custom google+ integration
- adding custom fields to user profiles
*/
require_once('library/bones.php'); // if you remove this, bones will break
/*
2. library/custom-post-type.php
- an example custom post type
- example custom taxonomy (like categories)
- example custom taxonomy (like tags)
*/
require_once('library/custom-post-type.php'); // you can disable this if you like
/*
3. library/admin.php
- removing some default WordPress dashboard widgets
- an example custom dashboard widget
- adding custom login css
- changing text in footer of admin
*/
//require_once('library/admin.php'); // this comes turned off by default
/*
4. library/translation/translation.php
- adding support for other languages
*/
// require_once('library/translation/translation.php'); // this comes turned off by default
//* Basic SEO
//	require_once('library/seo.php'); // you can disable this if you like
require_once('library/gallery-tad.php'); // you can disable this if you like
//Title in header format
require_once('library/audio-player.php'); // audio player plugin
require_once('library/email-form.php'); // audio player plugin
/**
* Filters wp_title to print a neat <title> tag based on what is being viewed.
*
* @param string $title Default title text for current view.
* @param string $sep Optional separator.
* @return string The filtered title.
*/
function theme_name_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}
	global $page, $paged;
// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );
// Add the blog description for the home/front page.
//$site_description = get_bloginfo( 'description', 'display' );
//if ( $site_description && ( is_home() || is_front_page() ) ) {
//	$title .= " $sep $site_description";
//}
// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
	}
	return $title;
}
add_filter( 'wp_title', 'theme_name_wp_title', 10, 2 );
add_theme_support( 'post-thumbnails' );
remove_filter('term_description','wpautop');
function catch_that_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches [1] [0];
if(empty($first_img)){ //Defines a default image
	$first_img = "/images/default.jpg";
}
return $first_img;
}
//get the first image array attached to the current post 
//$img = hf_get_post_image('medium'); $src = $img[0]; $width = $img[1]; $width = $img[2]
function hf_get_post_image($size = 'thumbnail') {
	global $post;
	$photos = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
	if ($photos) {
		$photo = array_shift($photos);
		$img= wp_get_attachment_image_src($photo->ID, $size);
		return $img;
	}
	return false;
}
// add excerpts to pages
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
/************* THUMBNAIL SIZE OPTIONS *************/
// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.
To call a different size, simply change the text
inside the thumbnail function.
For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>
You can change the names and dimensions to whatever
you like. Enjoy!
*/
/************* ACTIVE SIDEBARS ********************/
// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __('Sidebar 1', 'bonestheme'),
		'description' => __('The first (primary) sidebar.', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
		));
/*
to add more sidebars or widgetized areas, just copy
and edit the above sidebar code. In order to call
your new sidebar just use the following code:
Just change the name to whatever your new
sidebar's id is, for example:
register_sidebar(array(
'id' => 'sidebar2',
'name' => __('Sidebar 2', 'bonestheme'),
'description' => __('The second (secondary) sidebar.', 'bonestheme'),
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h4 class="widgettitle">',
'after_title' => '</h4>',
));
To call the sidebar in your template, you can just copy
the sidebar.php file and rename it to your sidebar's name.
So using the above example, it would be:
sidebar-sidebar2.php
*/
} // don't remove this bracket!
/******  remove jump link in more tag ******/
function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );
/****allow html in category descriptions ****/
foreach ( array( 'pre_term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_filter_kses' );
}
foreach ( array( 'term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_kses_data' );
}
/************* COMMENT LAYOUT *********************/
// Comment Layout
function bones_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix media comment">
			<?php
// create variable
			$bgauthemail = get_comment_author_email();
			$random = rand(1, 6);
			if ( $random == 1 ) {
				$face = "icon-happy";
			}
			else if ( $random == 2 ) {
				$face = "icon-happy2";
			}
			else if ( $random == 3 ) {
				$face = "icon-cool";
			}
			else if ( $random == 4 ) {
				$face = "icon-cool2";
			}
			else if ( $random == 5 ) {
				$face = "icon-smiley";
			}
			else {
				$face = "icon-wink";
			}
			?>
			<?php if ( $bgauthemail == "bertie@storynory.com") { ?>
			<img class="left" src="/wp-content/themes/story5/library/img/bertie.svg" width=100 height=100 />
			<?php } 
			else if ( $bgauthemail == "natasha@storynory.com"){
				?>	
				<img class="left" src="/wp-content/themes/story5/library/img/beatrice.svg" width=100 height=100 />
				<?php }
				else  { ?>
				<span class="img icon icon-comment <?php echo $face ?>"></span> 	
				<?php } ?>
				<figcaption>
					<!-- custom gravatar call -->
					<figcaption>
						<!-- end custom gravatar call -->
						<?php printf(__('<cite class="fn">%s</cite>', 'bonestheme'), get_comment_author()) ?>
						<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__('F jS, Y', 'bonestheme')); ?> </a></time>
						<?php edit_comment_link(__('(Edit)', 'bonestheme'),'  ','') ?>
						<?php if ($comment->comment_approved == '0') : ?>
						<div class="alert alert-info">
							<p><?php _e('Your comment is awaiting moderation.', 'bonestheme') ?></p>
						</div>
					<?php endif; ?>
					<section class="comment_content">
						<?php comment_text() ?>
					</section>
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</figcaption>
			</article>
			<!-- </li> is added by WordPress automatically -->
			<?php
} // don't remove this bracket!

/************* BreadCrumb *********************/
function archivebox () { 
	$id = $GLOBALS['post']->ID;
	if (is_category() || is_single () ) {
		if (get_post_meta($id, "Series", true)) {
			$category = get_post_meta($id, "Series", true) ;
		} 
		else {
			$category="stories";
		}
	}
	if( term_exists($category) ) {
$cat = get_term_by( 'slug',$category, 'category' ); // this gets an array with category object
}
else {
$cat = get_term_by( 'slug','bertie-stories', 'category' ); // this gets an array with category object
}
$parent = $cat->parent;
$parent = get_term_by( 'id',$parent, 'category' ); // this gets an array with category object
if (isset($parent->slug)) {
	$section = $parent->slug;
	$sectionName = $parent->name;
}
else {
	$section = "original";
	$sectionName = "Original";	
}
if 
	( $cat->term_id == 107 ) {
		$pageSlug = "archives";
	}
	elseif ( $cat->term_id  == 105 ){
		$pageSlug = "classic-authors-for-children";
	}
	elseif ( $cat->term_id  == 8 ){
		$pageSlug = "fairy-tales";
	}
	elseif ( $cat->term_id  == 106 ){
		$pageSlug = "educational-stories";
	}
	else 	{
		$pageSlug = "archives";
	}	
	$path = array(
		'postCatName'     =>$cat->name,
		'postCatcount'    => $cat->count,
		'postCatDescrip'  => $cat->description,
		'postCatId'       => $cat->term_id,
		'postCatSlug'	    => $cat->slug,
		'pageSlug'        => $pageSlug,
		'postCatParent'   => $cat->parent,
		'section'         => $section, 
		'sectionName'      => $sectionName
		);
	return $path;   
};
function thumb () {
	$id = $GLOBALS['post']->ID;
// If WordPress 2.9 or above and a Post Thumbnail has been specified
	if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'single-post-thumbnail' ); 
		$thumb = $thumb[0];
	}
	else {
		$thumb = get_post_meta($id, 'thumb', $single = true);
	} 
	$thumb= str_replace("storynory.dev", "storynory.com", $thumb);
	$thumb= str_replace("static.storynory.com", "storynory.com", $thumb);  
	$thumb= str_replace("hughfraser.co.uk", "storynory.com", $thumb);
	if($thumb !== '') { ?>
	<a class="img" href="<?php the_permalink() ?>"><img class="img--left thumb" src="<?php echo $thumb; ?>" alt="<?php echo the_title(); ?>" width="100" height="100" /></a>
	<?php } 
	else { echo '<img height=100 width=100 src="/wp-content/themes/story5/library/img/bertie.svg" />'; 
}
}



?>