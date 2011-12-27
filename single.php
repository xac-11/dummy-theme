<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="content">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content-single', 'single' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>