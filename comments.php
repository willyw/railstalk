<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>


<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number('No Comments', 'One Comment', '% Comments' );?></h3>



	<ol class="commentlist">
		<?php wp_list_comments('type=comment&avatar_size=50&callback=railstalk_comment'); ?>
	</ol>

<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div id="respond">

<h3><?php comment_form_title( 'Post Your Comment', 'Leave a Reply to %s' ); ?></h3>

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

<?php else : ?>


	<div class="input-left">
		<input class="comment-particulars" type="text" name="author" id="author" 
					value='Name <?php if ($req) echo "(required)"; ?>' 
					size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> 
					onblur="if (this.value == '')  
						{this.value = 'Name <?php if ($req) echo "(required)"; ?>';}"  
					onfocus="if (this.value == 'Name <?php if ($req) echo "(required)"; ?>')  
						{this.value = '';}" 
			/>
		<div class="input-right"></div>
	</div>
	
	


	<div class="input-left">
		<input class="comment-particulars" type="text" name="email" id="email" 
			value='Mail <?php if ($req) echo "(required)"; ?>'
			size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> 
			onblur="if (this.value == '')  
				{this.value = 'Mail <?php if ($req) echo "(required)"; ?>';}"  
			onfocus="if (this.value == 'Mail <?php if ($req) echo "(required)"; ?>')  
				{this.value = '';}"
		/>
		<div class="input-right"></div>
	</div>


	<div class="input-left">
		<input class="comment-particulars" type="text" name="url" id="url" 
			value="Website" 
			size="22" tabindex="3" 
			onblur="if (this.value == '')  
				{this.value = 'Website';}"  
			onfocus="if (this.value == 'Website')  
				{this.value = '';}"
		/>
		<div class="input-right"></div>
	</div>



<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<div class='text-left'>
	<textarea name="comment" id="comment" 
	cols="58" rows="10" tabindex="4"
	onblur="if (this.value == '')  
		{this.value = 'Comment';}"  
	onfocus="if (this.value == 'Comment')  
		{this.value = '';}"
	></textarea>
	
	<div class="text-right"></div>
</div>

<div class="submit-comment">
	<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
	<span></span>
</div>
<?php comment_id_fields(); ?>
<?php do_action('comment_form', $post->ID); ?>
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
