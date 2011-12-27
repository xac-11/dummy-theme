<?php get_header(); ?>

		<div id="content">
		<?php 
			if ( have_posts() ) {
				while ( have_posts() ) { 
					the_post();
					get_template_part( 'content-post', 'post' );
				}
			}
		?>
		</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>