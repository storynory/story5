<div class="notice">
	<?php
/*
The comments page for Bones
*/
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) { ?>
<div class="alert alert-help">
	<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments.", "bonestheme"); ?></p>
</div>
<?php
return;
}
?>
<!-- You can start editing here. -->
<?php if ( have_comments() ) : ?>
	<h3 id="comments" class="h2"><?php comments_number(__('<span>No</span> Responses', 'bonestheme'), __('<span>One</span> Response', 'bonestheme'), _n('<span>%</span> Response', '<span>%</span> Responses', get_comments_number(),'bonestheme') );?> to &#8220;<?php the_title(); ?>&#8221;</h3>
	<nav id="comment-nav">
		<ul class="clearfix">
			<li><?php previous_comments_link() ?></li>
			<li><?php next_comments_link() ?></li>
		</ul>
	</nav>
	<nav>
		<ul class="commentlist list-numbered">
			<?php wp_list_comments('type=comment&callback=bones_comments'); ?>
		</ul>
	</nav>
	<nav id="comment-nav">
		<ul class="clearfix">
			<li><?php previous_comments_link() ?></li>
			<li><?php next_comments_link() ?></li>
		</ul>
	</nav>
<?php else : // this is displayed if there are no comments so far ?>
	<?php if ( comments_open() ) : ?>
	<!-- If comments are open, but there are no comments. -->
<?php else : // comments are closed ?>
	<!-- If comments are closed. -->
	<!--p class="nocomments"><?php _e("Comments are closed.", "bonestheme"); ?></p-->
<?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
	<section id="respond" class="respond-form">
		<h3 id="comment-form-title" class="h2"><?php comment_form_title( __('Leave a Reply', 'bonestheme'), __('Leave a Reply to %s', 'bonestheme' )); ?></h3>
		<p>Did you like this story? Please write in English. Comments are moderated </p>
		<div id="cancel-comment-reply">
			<p class="small"><?php cancel_comment_reply_link(); ?></p>
		</div>
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<div class="alert alert-help">
			<p><?php printf( __('You must be %1$slogged in%2$s to post a comment.', 'bonestheme'), '<a href="<?php echo wp_login_url( get_permalink() ); ?>">', '</a>' ); ?></p>
		</div>
	<?php else : ?>
	<form class="form--stacked" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<?php if ( is_user_logged_in() ) : ?>
		<p class="comments-logged-in-as"><?php _e("Logged in as", "bonestheme"); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e("Log out of this account", "bonestheme"); ?>"><?php _e("Log out", "bonestheme"); ?> <?php _e("&raquo;", "bonestheme"); ?></a></p>
	<?php else : ?>
	<ul id="comment-form-elements" class="comments clearfix">
		<li>
			<label for="author"><?php _e("Name", "bonestheme"); ?> <?php if ($req) _e("(required)"); ?></label>
			<input class="input--text" type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" placeholder="<?php _e('Your First Name Only *', 'bonestheme'); ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
		</li>
	</ul>
<?php endif; ?>
<textarea class="comment" name="comment" id="comment" placeholder="<?php _e('Your Comment here...', 'bonestheme'); ?>" tabindex="4"></textarea>
<p>
	<input name="submit" type="submit" id="submit" class="btn full default submit" tabindex="5" value="<?php _e('Submit', 'bonestheme'); ?>" />
	<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; // If registration required and not logged in ?>
</section>
<?php endif; // if you delete this the sky will fall on your head ?>
</div>
                                                                                                                     