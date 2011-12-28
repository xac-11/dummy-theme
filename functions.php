<?php


function xac_nav_menu() {

	$floatRight= false;
	$menu_name = 'nav';
	$menu = get_term_by('name', 'nav', 'nav_menu');
	$menu_items = wp_get_nav_menu_items($menu->term_id);
	$menu_list = '<ul id="menu-' . $menu_name . '">';
	$flRightEls = array();
	
	foreach ( (array) $menu_items as $key => $menu_item ) {
		if( $menu_item->title == "separator" ) {
			$menu_list .= '<li class="separator"></li>';
			$floatRight = true;
		} else {
			$title = $menu_item->title;
			$url = $menu_item->url;
			if( $floatRight ) {
				//$menu_list .= '<li class="flRight"><a href="' . $url . '">' . $title . '</a></li>';
				$flRightEls[] = new flRightEl($title, $url) ;
			} else {
				$menu_list .= '<li class="flLeft"><a href="' . $url . '">' . $title . '</a></li>';
			}
		}
	}
	
	$flRightEls = array_reverse( $flRightEls );
	foreach( $flRightEls as $obj) {
		$menu_list .= '<li class="flRight"><a href="' . $obj->url . '">' . $obj->title . '</a></li>';
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
?>