<?php
function get_sc($c){if(!empty($c)){$v=do_shortcode('[sc:"'.$c.'"]');if(!empty($v)){return $v;};};}
//

function nav($a,$b,$c){
 $t=wp_nav_menu(array('echo'=>false,'menu'=>$a,'container'=>'nav','container_id'=>$b,'theme_location'=>$c));
 $m=array(
	'class="top"'=>'',
	'class="bottom"' =>'',
	'id="topmenu"' =>'',
	'id="bottommenu"' =>'',
 );
 echo(str_replace(array_keys($m),$m,$t));
}
//

function falsy(){return false;}
add_filter('nav_menu_item_id',falsy);

function filtersubmenu_class($x) {  return  preg_replace('/class="(sub-)?menu"|menu-|container/','',$x);  }
add_filter('wp_nav_menu','filtersubmenu_class');

function filtermenu_class($x){
 $t=is_array($x) ? array_intersect($x, array(
	'current_page_item',
	'current_page_parent',
	'current_page_ancestor',
	'first','last','vertical','horizontal'
	)
 ):'';
 $m=array(
	'current_page_item'=> 'current',
	'current-menu-item' => 'current',
	'current_page_parent' => 'active',
	'current_page_ancestor' => 'active'
 );
 $t=str_replace(array_keys($m),$m,$t);
 return $t;
}
add_filter('nav_menu_css_class', 'filtermenu_class');
//






?>
