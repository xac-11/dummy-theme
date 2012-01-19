<?php 
	xac_authorisation();
	get_header(); 
?>
 		<div id="page">
			<div id="articles">
			<?php  
				/** define posts of the category to display **/
				if( strtolower(get_the_title()) == "public" ) {
					$catId = get_cat_ID('public');
					query_posts("cat=" . $catId );
				} else if( strtolower(get_the_title()) == "private") {
						$catId = get_cat_ID('private');
						query_posts("cat=" . $catId );
				} //else {}

				/** display posts **/
				$paged = (get_query_var('paged')) ? (int) get_query_var('paged') : 1;
				$page_link = get_permalink($id);

				if( have_posts()){
					while( have_posts() ) {
						the_post();		
						get_template_part( 'content', 'excerpt' );
					}
					wp_reset_postdata();
				}
			?>
			</div><!-- #articles -->
		</div><!-- #page -->
		
		

<?php get_sidebar(); ?>
<?php get_footer(); ?>