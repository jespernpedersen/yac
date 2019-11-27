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
	
	register_sidebar( array(
        'name'          => 'Social Media Header',
        'id'            => 'social-media-header',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="title">',
        'after_title'   => '</h2>',
	) );
	register_sidebar( array(
        'name'          => 'Single Post Sidebar',
        'id'            => 'single-post-sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'jnp_widgets_init' );


function jnp_create_events_custom_post() {
	register_post_type('event', 
		array(
		'labels' => array(
			'name' => __('Events', 'events'),
		),
		'menu_icon'    => 'dashicons-schedule',
		'public'       => true,
		'hierarchical' => true,
		'supports'     => array(
			'title',
			'editor',
			'excerpt',
			'custom-fields',
			'thumbnail',
		), 
		'taxonomies'   => array(
				'post_tag',
				'category'
		) 
	));
}


add_action('init', 'jnp_create_events_custom_post');  




// Modify comments header text in comments
add_filter( 'genesis_title_comments', 'child_title_comments');
function child_title_comments() {
    return __(comments_number( '<h3>No Responses</h3>', '<h3>1 Response</h3>', '<h3>% Responses...</h3>' ), 'genesis');
}
 
// Unset URL from comment form
function crunchify_move_comment_form_below( $fields ) { 
    $comment_field = $fields['comment']; 
    unset( $fields['comment'] ); 
    $fields['comment'] = $comment_field; 
    return $fields; 
} 
add_filter( 'comment_form_fields', 'crunchify_move_comment_form_below' ); 
 
// Add placeholder for Name and Email
function modify_comment_form_fields($fields){
    $fields['author'] = '<p class="comment-form-author">' . '<input id="author" placeholder="Name" name="author" type="text" value="' .
                esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.
                ( $req ? '<span class="required">*</span>' : '' )  .
                '</p>';
    $fields['email'] = '<p class="comment-form-email">' . '<input id="email" placeholder="Email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30"' . $aria_req . ' />'  .
                ( $req ? '<span class="required">*</span>' : '' ) 
                 .
				'</p>';
	$fields['url'] = '';
    
    return $fields;
}
add_filter('comment_form_default_fields','modify_comment_form_fields');