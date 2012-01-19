<?php

register_nav_menus( array( 'main_nav' => 'Main Navigation Menu'));

register_sidebar(array(
  	'name' => 'RightSideBar',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => "</aside>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
));

add_action('wp_login', 'onLoginAction', 1 );
add_action('wp_logout', 'onLogoutAction', 1 );
function onLoginAction($username) {
	$_SESSION['mssg-status'] = 'success';
	$_SESSION['mssg-content'] = 'logged in';
}

function onLogoutAction( ) {
	$_SESSION['mssg-status'] = 'success';
	$_SESSION['mssg-content'] = 'log out action';
	wp_redirect( home_url());
	exit;
}

function xac_authorisation() {
	if( is_single() ) {
		if( in_category( get_cat_ID('private'), get_the_ID() )  ) {
			xac_authorisation_check( ); 	
		}
	} else if( is_category() ) {
		foreach (get_the_category() as $category ){
			if( $category->name == 'private' )
			xac_authorisation_check();
		}
	} else if( is_page() ) {
		if( strtolower(get_the_title()) == "private" ) {
			xac_authorisation_check();
		}
	}
}

function xac_authorisation_check( $noRedirect = false ) {
	if( is_user_logged_in() ) {		// add roles check here
		return true;
	} else {
		if( $noRedirect ) {
			return false;
		} else {
			$_SESSION['mssg-status'] = 'error';
			$_SESSION['mssg-content'] = "private content only for logged in users";
			wp_redirect( home_url());
			exit;
		}
		//return false;
	}
}

/***************************************************************************************************************/
/** HELPER FUNCTIONS *******************************************************************************************/
function xac_nav_menu() {

	$menu_name = 'nav';
	$menu = get_term_by('name', 'nav', 'nav_menu');
	$menu_items = wp_get_nav_menu_items($menu->term_id);
	$menu_list = '<ul id="menu-' . $menu_name . '">';
	$floatRight= false;			// separator flag
	$flRightEls = array();
	$flLeftEls = array();
	
	foreach ( (array) $menu_items as $key => $menu_item ) {
		if( strtolower($menu_item->title) == "separator" ) {
			$floatRight = true;
		} else {
			/** do not show link to category "private" on header **/
			if( strtolower($menu_item->title) == "private" && !is_user_logged_in() ) {  continue; } 
			
			$title = $menu_item->title;
			if( strtolower($title) == 'private' || strtolower($title) == 'public' ) {
				$url = get_bloginfo('url') . '/category/' . strtolower( $title );			
			} else {
				$url = $menu_item->url;
			}
			
			if( $floatRight ) {
				$flRightEls[] = new FloatElement($title, $url ) ;
			} else {
				$flLeftEls[] = new FloatElement($title, $url );
			}
		}
	}
	
	/** right elements **/
	for( $i=0; $i < count($flLeftEls); $i++ ) {
		$menu_list .= '<li class="floatLeft';
		if( $i == 0 ) {
			$menu_list .= ' noLBorder ';
		} else if( $i == count($flLeftEls) - 1 ) {
			$menu_list .= ' noRBorder ';
		}
		$menu_list .= '"><a href="' . $flLeftEls[$i]->url . '">' . $flLeftEls[$i]->title . '</a></li>';
	}
	
	/** search form **/
	$menu_list .= '<li class="floatRight noBorder noHover">						
						<div id="search" action="'. get_bloginfo('url') .'">
							<form method="get" id="searchform" action="#">
								<button type="button" class="button" id="clearBtn"></button>
								<input type="text" class="field" name="s" id="s"
									placeholder="suche" />
								<button type="submit" class="submit" id="submitBtn"></button>
							</form>
						</div>
					</li>';
		
	/** left elements **/
	$flRightEls = array_reverse( $flRightEls );		// becouse of float right order
	for( $i=0; $i < count($flRightEls); $i++ ) {
		$menu_list .= '<li class="floatRight';
				if( $i == 0 ) {
			$menu_list .= ' noRBorder ';
		} else if( $i == count($flRightEls) - 1 ) {
			$menu_list .= ' noLBorder ';
		}
		$menu_list .= '"><a href="' . $flRightEls[$i]->url . '">' . $flRightEls[$i]->title . '</a></li>';
	}
	
	$menu_list .= '</ul>';
	echo $menu_list;
}

/** helper class for navigation elements **/
class FloatElement{
	public $title;
	public $url;
	public function FloatElement( $title, $url ) {
		$this->title = $title;
		$this->url = $url;
	}
}

	
function xac_get_post_categories( $post_id ) {
	$post_categories = wp_get_post_categories( $post_id );
	$cats = "";
	foreach($post_categories as $c){
		$cat = get_category( $c );
		if( $cat->slug != 'public' && $cat->slug != 'private') {
			$cats .= '<a href=\'/?cat='. $cat->cat_ID. '\'>' . $cat->name . '</a>';
		}
	}
	return $cats;
}

function xac_get_child_cats($catname) {
	$catId = get_cat_ID( $catname );
	$categories = get_categories( array('child_of' => $catId));
	$out = '<ul>';
	foreach($categories as $c){
		$cat = get_category( $c );
		$out .= '<li><a href=\'/?cat='. $cat->cat_ID. '\'>' . $cat->name . '</a></li>';
	}
	$out .= '</ul>';
	return $out;	
}

function xac_get_public_cats() {
	$catId = get_cat_ID('public');
	$categories = get_categories( array('child_of' => $catId));
}

function xac_get_private_cats() {
	$catId = get_cat_ID('private');
	$categories = get_categories( array('child_of' => $catId));
}
?>