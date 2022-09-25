<?php

/*----------------------------------------------------------------------
Add css and script
------------------------------------------------------------------------*/
function fga_add_css_script(){

    // Register Styles
    wp_enqueue_style( 'fga-styles-css', get_theme_file_uri( '/assets/css/styles.css' ), array(), FGA_THEME_VERSION, 'all' );
    wp_enqueue_style( 'fga-fga-style', get_stylesheet_uri(), array(), FGA_THEME_VERSION, 'all' );
    
    // Register Scripts
    wp_enqueue_script( 'fga-ajax', get_theme_file_uri( '/assets/js/ajax-call.js' ), array('jquery'), FGA_THEME_VERSION, true );
    wp_localize_script( 'fga-ajax', 'fga_ajax_vars',
        array(
            'admin_url' => get_admin_url()
        )
    );
}
add_action( 'wp_enqueue_scripts', 'fga_add_css_script' );

if( is_admin() ){
    function houzez_admin_scripts(){
        global $typenow;
        if( $typenow == 'fga_business' ){
            wp_enqueue_style( 'fga-admin-styles-css', get_theme_file_uri( '/assets/css/admin-styles.css' ), array(), FGA_THEME_VERSION, 'all' );
        }
    }
    add_action('admin_enqueue_scripts', 'houzez_admin_scripts');
}

?>