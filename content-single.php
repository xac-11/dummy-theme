<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<?php the_title('<h1>', '</h1>'); ?>
			<?php the_content(); ?>
		</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
