<?php


function xac_nav_menu() {

	$floatRight= false;
	$menu_name = 'nav';
	$menu = get_term_by('name', 'nav', 'nav_menu');
	$menu_items = wp_get_nav_menu_items($menu->term_id);
	$menu_list = '<ul id="menu-' . $menu_name . '">';
	$flRightEls = array();
	
	$firstLeft = true;
	$lastLeft = false;
	$firstRight = false;
	$lastRight = true;
	
	foreach ( (array) $menu_items as $key => $menu_item ) {
		if( $menu_item->title == "separator" ) {
			//$menu_list .= '<li class="separator"></li>';
			$floatRight = true;
			$lastLeft = true;
		} else {
			$title = $menu_item->title;
			$url = $menu_item->url;
			if( $floatRight ) {
				$flRightEls[] = new flRightEl($title, $url) ;
			} else {
				$menu_list .= '<li class="floatLeft';
				if($firstLeft ){ $firstLeft = !$firstLeft; $menu_list .= ' noLBorder '; }
				$menu_list .= '"><a href="' . $url . '">' . $title . '</a></li>';
			}
		}
	}
	
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
		
	$flRightEls = array_reverse( $flRightEls );
	foreach( $flRightEls as $obj) {
		$menu_list .= '<li class="floatRight';
			if($lastRight){ $lastRight = !$lastRight; $menu_list .= ' noRBorder '; }
		$menu_list .= '"><a href="' . $obj->url . '">' . $obj->title . '</a></li>';
	}
	
	
	$menu_list .= '</ul>';
	echo $menu_list;
}

	class flRightEl{
		public $title;
		public $url;
		public function flRightEl($title, $url) {
			$this->title = $title;
			$this->url = $url;			
		}
	}
	
	register_nav_menus( array( 'main_nav' => 'Main Navigation Menu'));
	
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
?>