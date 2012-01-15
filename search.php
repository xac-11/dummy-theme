<?php get_header(); ?>

<div id="page">
			<div id="articles">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content-post', 'post' ); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div><!-- #articles -->
		</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>