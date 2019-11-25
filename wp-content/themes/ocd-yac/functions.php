<?php
/**
 * Functions and definitions
 *
 */

/*
 * Let WordPress manage the document title.
 */
add_theme_support( 'title-tag' );

/*
 * Enable support for Post Thumbnails on posts and pages.
 */
add_theme_support( 'post-thumbnails' );

/*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
add_theme_support( 'html5', array(
	'search-form',
	'comment-form',
	'comment-list',
	'gallery',
	'caption',
) );

/** 
 * Include primary navigation menu
 */
function jnp_nav_init() {
	register_nav_menus( array(
		'menu-1' => 'Primary Menu',
	) );
	register_nav_menus( array(
		'menu-2' => 'Footer Menu',
	) );
}
add_action( 'init', 'jnp_nav_init' );

/**
 * Enqueue scripts and styles.
 */
function jnp_scripts() {
	wp_enqueue_style( 'jnp-style', get_stylesheet_uri() );
	wp_enqueue_style( 'jnp-custom-style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'jnp-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
}
add_action( 'wp_enqueue_scripts', 'jnp_scripts' );

/**
 * Register widget area.
 *
 */
function jnp_widgets_init() {
	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar-1',
		'description'   => 'Add widgets',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'jnp_widgets_init' );
