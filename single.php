<?php


get_header(); ?>

		<div id="page">

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content-single', 'single' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>