<?php get_header(); ?>

		<div id="content">
			
			<?php  //echo "cat id: " . get_cat_ID('private');
				if( get_the_title() == "public" ) {
					$catId = get_cat_ID('public');
					
					$args = array('category' => $catId );
					$postslist = get_posts( $args );
					foreach ($postslist as $post) {
						/*
						echo "<pre>";
						var_dump($post);
						echo "</pre>";
						*/
						setup_postdata($post);
						get_template_part( 'content-post', 'post' );
					}
					wp_reset_postdata();
					
				} else if( get_the_title() == "private") {
					$catId = get_cat_ID('private');
					$args = array('category' => $catId );
					$postslist = get_posts( $args );
					foreach ($postslist as $post) {
						setup_postdata($post);
						get_template_part( 'content-post', 'post');
					}
					wp_reset_postdata();
					
				} else {
					if ( have_posts() ) {
						while ( have_posts() ) { 
							the_post();
							get_template_part( 'content-page', 'page' );
						}
					}
					
				}
			?>
		</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>