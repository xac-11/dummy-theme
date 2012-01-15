<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title></title>
	
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<?php 
		wp_deregister_script( 'jquery' );
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
		wp_register_script('modernizr', 'http://www.modernizr.com/downloads/modernizr-2.0.6.js');
		wp_enqueue_script('modernizr');
	?>

</head>

<body <?php body_class(); ?>>
<div id="container">
	<header>
			<div id="branding">
				xacTheme version: 0.1
			</div>

			<nav>
				<?php xac_nav_menu(); //wp_nav_menu( );?>
			</nav>
			 <!--
				<div id="search">
					<?php //get_search_form(); ?>
				</div>
			-->
			<!--  
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
				-->
	</header><!-- #branding -->


	<div id="main">