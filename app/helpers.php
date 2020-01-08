<?php

function get_menu_bar()
{
	$menu_item = array();
	$menu_item['Home'] = url('/');
	$categories = \App\Category::all();
	foreach ($categories as $key => $value) {
		$name = $value['category_name'];
		$category_menu[$name] = url('category/'.$value['id']);
	}

	$menu_item['Products'] = $category_menu;
	$pages = \App\Page::all();
	foreach ($pages as $key => $value) {
		$menu_item[$value['page_name']] = url('page/'.$value['id']);
	}
	$menu_item['Contact'] = url('contact');
	return $menu_item;

}

function get_sidebar()
{
	$categories = \App\Category::all();
	foreach ($categories as $key => $value) {
		$name = $value['category_name'];
		$category_menu[$name] = url('category/'.$value['id']);
	}
	return $category_menu;
}

function get_categories()
{
	$categories = \App\Category::all();
	return $categories;
}

?>