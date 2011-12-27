
<?php get_header(); ?>

		<div id="content">
			<?php 
				$home_content = get_page_by_title('home');
				setup_postdata($home_content );
				get_template_part( 'content-page', 'page' );
			?>
		</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

