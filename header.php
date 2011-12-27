<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title></title>
	

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


</head>

<body <?php body_class(); ?>>
<div id="page">
	<header>
			<div id="branding">
				xac
			</div>
			<nav>
				<?php wp_nav_menu( ); ?>
				
				<div id="categories">
					<ul>
					<?php 
						if( get_the_title() == "public" || ( is_category() &&  cat_is_ancestor_of(get_cat_ID('public'),  $_GET['cat'] ) ) ) { 
							$catId = get_cat_ID('public');
							$args = array('child_of' => $catId );
							$categories=  get_categories( $args ); 
							foreach ($categories as $category) {
								$out = '<li><a href="';
								$out .= get_category_link( $category->term_id );
								$out .= '" title="' . sprintf( __( "View all posts in %s" ), $category->name ).'">';
								$out .= $category->cat_name;
								$out .= '</a></li>';
								echo $out;
							}
						} else if( get_the_title() == "private" || ( is_category() &&  cat_is_ancestor_of( get_cat_ID('private'),  $_GET['cat'] ) )) { 
							$catId = get_cat_ID('private');
							$args = array('child_of' => $catId );
							$categories=  get_categories( $args ); 
							foreach ($categories as $category) { 
								$out = '<li><a href="';
								$out .= get_category_link( $category->term_id );
								$out .= '" title="' . sprintf( __( "View all posts in %s" ), $category->name ).'">';
								$out .= $category->cat_name;
								$out .= '</a></li>';
								echo $out;
							}
						}	
					?>
					</ul>
				</div>
			</nav><!-- #access -->
			
			<div id="search">
				<?php get_search_form(); ?>
			</div>
	</header><!-- #branding -->


	<div id="main">