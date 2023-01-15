<?php
function ngoclam_theme_support() {
	//Add dynamic title tag support
	add_theme_support( "title-tag");
	add_theme_support( "custom-logo");
	add_theme_support( "post-thumbnails");
}
add_action("after_setup_theme", "ngoclam_theme_support" );

function ngoclam_menus(){
	$locations = array(
		"primary" => "Menu show in the left sidebar",
		"footer" => "Menu show in the footer",
	);
	register_nav_menus($locations);
}

add_action("init", "ngoclam_menus");

function ngoclam_register_styles() {
	$version = wp_get_theme()->get("version");
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'tailwindCSS', get_template_directory_uri() . '/wp-tailwind.css', array(), '1.1', 'all' );
	wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/css/style.css', array(), $version, 'all' );
	wp_enqueue_style( 'bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all' );
	wp_enqueue_style( 'font-awesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all' );
	
}

function ngoclam_register_scripts() {
	$version = wp_get_theme()->get("version");
	wp_enqueue_script("jquery", "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), "3.4.1", false);
	wp_enqueue_script("popper", "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), "1.16.0", false);
	wp_enqueue_script("bootstrap", "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), "4.4.1", true);
	wp_enqueue_script("custom-js", get_template_directory_uri() . '/assets/js/main.js', array(), $version, true);
}

add_action( 'wp_enqueue_scripts', 'ngoclam_register_styles' );
add_action( 'wp_enqueue_scripts', 'ngoclam_register_scripts' );

function ngoclam_widget_areas() {
	register_sidebar(
		array(
			"id"=> "sidebar-1",
			"name" => "Sidebar area",
			"description" => "this setting for left sidebar",
		)
	);
	register_sidebar(
		array(
			"id"=> "footer-1",
			"name" => "Footer area",
			"description" => "this setting for footer area",
		)
	);
}

add_action("widgets_init", "ngoclam_widget_areas");

?>