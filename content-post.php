<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<a href="<?php the_permalink(); ?>"><?php the_title('<h1>', '</h1>'); ?></a>
			<?php 
			global $more;
        	$more = 0;
        	?>
			<?php the_content("read more >>"); ?>
			<?php //the_excerpt(); ?>
		</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
