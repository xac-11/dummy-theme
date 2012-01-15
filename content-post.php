<article id="post-<?php the_ID();?>" <?php post_class();?>>
	<a href="<?php echo get_permalink( ) ?>"><?php the_title('<h1>', '</h1>');?></a>
	<?php
	global $more;
	$more = 0;

	?>
	<?php //the_content("...");?>
	<div class="date_wrapper">
		<div class="date">
			<div class="day"><?php the_time('j' ) ?></div>
			<div class="month"><?php the_time('M' ) ?></div>
			<div class="year"><?php the_time('Y' ) ?></div>
		</div>
	</div>
	<div class="content_wrapper">
		<div class="content"><?php the_content('', false, '');//the_excerpt();?></div>
		<div class="meta">
			<div class="category"><?php //the_category(', ') 
				echo xac_get_post_categories( $post->ID );
				?></div>
			<?php the_tags('<div class="tags">', ', ', '</div>'); ?>
			<div class="comments"><a href="<?php comments_link(); ?>"><?php  comments_number('keine Kommentare', '1 Kommentar', '% Kommentare') ?></a></div>
			<a href="<?php echo get_permalink( ) ?>"><button>weiter</button></a>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
