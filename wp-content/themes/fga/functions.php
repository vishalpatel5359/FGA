<?php

define( 'FGA_THEME_NAME', 'FGA' );
define( 'FGA_THEME_SLUG', 'fga' );
define( 'FGA_THEME_VERSION', '1.0.0' );

define( 'ALLOW_UNFILTERED_UPLOADS', true );
define( 'IMAGE_ASSETS_URL', get_template_directory_uri().'/assets/img' );

/*----------------------------------------------------------------------
Theme setup
------------------------------------------------------------------------*/
function fga_setup(){

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Add support for post thumbnails.
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'woocommerce' );

	// Set port default thumbnails
	set_post_thumbnail_size( 150, 150 );
	
	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// Remove gallery style css
	add_filter( 'use_default_gallery_style', '__return_false' );

}
add_action( 'after_setup_theme', 'fga_setup' );

// ACF theme options
if( function_exists('acf_add_options_page') ){
	acf_add_options_page( array(
		'page_title' 	=> esc_html__( 'Theme Options', 'fga' ),
		'menu_title'	=> esc_html__( 'Theme Options', 'fga' ),
		'menu_slug' 	=> esc_html__( 'fga_option', 'fga' ),
		'capability'	=> esc_html__( 'edit_posts', 'fga' ),
		'redirect'		=> false
	) );
}

// Enqueue scripts, styles and fonts.
require_once( get_template_directory() . '/inc/include/style-script-font.php' );

// Helper functions
require_once( get_template_directory() . '/inc/functions/helper-functions.php' );

// Metaboxes functions
require_once( get_template_directory() . '/inc/functions/metaboxes.php' );

/*----------------------------------------------------------------------
Allow SVG upload
------------------------------------------------------------------------*/
function fga_svg_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$new_filetypes['svgz'] = 'image/svg+xml';
    $new_filetypes['exe'] = 'application/exe';
	$file_types = array_merge( $file_types, $new_filetypes );
	return $file_types;
}
add_action( 'upload_mimes', 'fga_svg_uploads' );

/*----------------------------------------------------------------------
Disable gutenberg editor
------------------------------------------------------------------------*/
add_filter( 'use_block_editor_for_post', '__return_false' );

?>