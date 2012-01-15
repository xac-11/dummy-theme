<div id="comments">
	<?php 
	if ( have_comments() ){
		$args = array(
			'post_id' => $post->ID
		);
		$comments = get_comments( $args );
			foreach($comments as $comment) : ?>
				<div class="comment">
					<div class="avatar"><?php  userphoto_the_author_thumbnail(); ?></div>
						<div class="meta">
							<div class="author"><?php echo $comment->comment_author;?></div>
							<div class="date"><?php echo $comment->comment_date;?></div>	
						</div>
						
						<div class="content"><?php echo $comment->comment_content;?></div>
				</div>
			<?php endforeach;
	} 
	?>

	<?php //comment_form(); ?>
	<!--
	<div id="respond">
		<form action="http://wp.local/wp-comments-post.php" method="post" id="commentform">
			<p class="logged-in-as">
				Logged in as <a href="http://wp.local/wp-admin/profile.php">admin</a>.
				<a href="http://wp.local/wp-login.php?action=logout&amp;redirect_to=http%3A%2F%2Fwp.local%2F%3Fp%3D176&amp;_wpnonce=fca2ede4be" 
					title="Log out of this account">
					Log out?
				</a>
			</p>
		<p class="comment-form-comment">
			<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
		</p>
		<p class="form-submit">
			<input name="submit" type="submit" id="submit" value="Post Comment">
			<input type="hidden" name="comment_post_ID" value="176" id="comment_post_ID">
			<input type="hidden" name="comment_parent" id="comment_parent" value="0">
			</p>
			<input type="hidden" id="_wp_unfiltered_html_comment" name="_wp_unfiltered_html_comment" value="76a803ede6">					</form>
	</div>
-->

</div><!-- #comments -->