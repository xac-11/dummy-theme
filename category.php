<?php 
	xac_authorisation();
	get_header(); 
?>
		<div id="page">
			<div id="articles">
			<?php
				
				if( have_posts()){
					while( have_posts() ) {
						the_post();	
						get_template_part( 'content', 'excerpt' );
					}
				}
			?>
			</div><!-- #articles -->
			
			<?php if(function_exists('wp_paginate')) {
			    wp_paginate('range=4&anchor=2&nextpage=Next&previouspage=Previous');
			} ?>

		</div><!-- #page -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>