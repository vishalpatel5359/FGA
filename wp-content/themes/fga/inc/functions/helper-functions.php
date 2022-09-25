<?php

/*----------------------------------------------------------------------
Get theme options
------------------------------------------------------------------------*/
if( ! function_exists( 'fga_theme_option' ) ){
    
    function fga_theme_option( $field, $for = '' ){
        
        $output = get_field( $field, 'option' );
        
        if( !empty($for) ){
            if( !empty($output) ){
                $output = $output[$for];
            }
        }
        return $output;
    }
}

/*----------------------------------------------------------------------
Remove empty <p> of Visual composer content element
------------------------------------------------------------------------*/
if( !function_exists( 'fga_remove_empty_p' ) ){
    
    function fga_remove_empty_p($content){
        $content = force_balance_tags($content);
        return preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
    }
}

/*----------------------------------------------------------------------
Disable TinyMCE from removing span tags
------------------------------------------------------------------------*/
if( !function_exists( 'fga_override_mce_options' ) ){
    
    function fga_override_mce_options($initArray){
        $opts = '*[*]';
        $initArray['valid_elements'] = $opts;
        $initArray['extended_valid_elements'] = $opts;
        return $initArray;
    }
    add_filter( 'tiny_mce_before_init', 'fga_override_mce_options' );
}

/*----------------------------------------------------------------------
Get attachment caption using attachment url
------------------------------------------------------------------------*/
if( ! function_exists( 'fga_attachment_caption' ) ){
    
    function fga_attachment_caption( $attachment_id ){

        if( !empty($attachment_id) ){
            if( is_numeric($attachment_id) ){
                $output = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
                if( empty($output) ){
                    $output = get_the_title( $attachment_id );
                }
            } else {
                $new_id = attachment_url_to_postid( $attachment_id );
                $output = get_post_meta( $new_id, '_wp_attachment_image_alt', true );
                if( empty($output) ){
                    $output = get_the_title( $new_id );
                }
            }
        } else {
            $output = '';
        }
        
        return $output;
    }
}

/*----------------------------------------------------------------------
Get ACF element link
------------------------------------------------------------------------*/
if( !function_exists( 'fga_acf_link' ) ){

    function fga_acf_link( $a_attr = array(), $class = '' ){

        $a_detail = $a_attributes = array();
        $a_use_link = false;
        $a_title = '';

        if( !empty($a_attr) ){
            
            $a_link = $a_attr;
            
            if( strlen( $a_link['url'] ) > 0 ){
                $a_use_link = true;
                
                $a_href = $a_link['url'];

                if( !empty($a_link['url']) ){
                    $a_href_array = explode( 'tel:+', $a_link['url'] );
                    if( !empty($a_href_array) && is_array($a_href_array) && in_array( 'tel:', $a_href_array ) ){
                        $a_href_number = str_replace( ' ', '', $a_href_array[1] );
                        $a_href = 'tel:00'.$a_href_number;
                    } else {
                        $a_href = apply_filters( 'vc_btn_a_href', $a_href );
                    }
                }
                
                $a_title = $a_link['title'];
                
                $a_target = $a_link['target'];
                
                $a_attributes[] = 'href="'.trim( $a_href ).'"';
                $a_attributes[] = 'title="'.esc_attr( trim( $a_title ) ).'"';
                
                if ( ! empty( $a_target ) ) {
                    $a_attributes[] = 'target="'.esc_attr( trim( $a_target ) ).'"';
                }
                
                if ( ! empty( $a_rel ) ) {
                    $a_attributes[] = 'rel="'.esc_attr( trim( $a_rel ) ).'"';
                }

                $a_attributes[] = 'class="'.$class.'"';
                
                $a_attributes = implode( ' ', $a_attributes );
            }
            $a_detail['status'] = $a_use_link;
            $a_detail['title'] = $a_title;
            $a_detail['attributes'] = $a_attributes;

            return $a_detail;
        } else {
            $a_detail[] = $a_use_link;
            $a_detail[] = $a_title;
            $a_detail[] = $a_attributes;

            return $a_detail;
        }
    }
}

/*----------------------------------------------------------------------
Register business custom post type
------------------------------------------------------------------------*/
if( !function_exists( 'fga_register_business_post_type' ) ){
        
    function fga_register_business_post_type() {
        $labels = array(
            'name'                  => esc_html__( 'Business', 'fga' ),
            'singular_name'         => esc_html__( 'Business', 'fga' ),
            'menu_name'             => esc_html__( 'Business', 'fga' ),
            'name_admin_bar'        => esc_html__( 'Business', 'fga' ),
            'add_new'               => esc_html__( 'Add Business', 'fga' ),
            'add_new_item'          => esc_html__( 'Add New Business', 'fga' ),
            'new_item'              => esc_html__( 'New Business', 'fga' ),
            'edit_item'             => esc_html__( 'Edit Business', 'fga' ),
            'view_item'             => esc_html__( 'View Business', 'fga' ),
            'all_items'             => esc_html__( 'All Business', 'fga' ),
            'search_items'          => esc_html__( 'Search Business', 'fga' ),
            'parent_item_colon'     => esc_html__( 'Parent Business:', 'fga' ),
            'not_found'             => esc_html__( 'No business found.', 'fga' ),
            'not_found_in_trash'    => esc_html__( 'No business found in Trash.', 'fga' ),
            'featured_image'        => esc_html__( 'Business Featured Image', 'fga' ),
            'set_featured_image'    => esc_html__( 'Set featured image', 'fga' ),
            'remove_featured_image' => esc_html__( 'Remove featured image', 'fga' ),
            'use_featured_image'    => esc_html__( 'Use as featured image', 'fga' ),
            'archives'              => esc_html__( 'Business archives', 'fga' ),
            'insert_into_item'      => esc_html__( 'Insert into business', 'fga' ),
            'uploaded_to_this_item' => esc_html__( 'Uploaded to this business', 'fga' ),
            'filter_items_list'     => esc_html__( 'Filter business list', 'fga' ),
            'items_list_navigation' => esc_html__( 'Business list navigation', 'fga' ),
            'items_list'            => esc_html__( 'Business list', 'fga' ),
        );
     
        $args = array(
            'labels'                => $labels,
            'public'                => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'show_in_menu'          => true,
            'show_in_admin_bar'     => true,
            'show_ui'               => true,
            'query_var'             => true,
            'capability_type'       => 'post',
            'hierarchical'          => true,
            'menu_icon'             => 'dashicons-list-view',
            'menu_position'         => null,
            'supports'              => array( 'title' ),
            'can_export'            => true,
            'rewrite'               => array( 'slug' => 'business' )
        );
     
        register_post_type( 'fga_business', $args );
    }
}
add_action( 'init', 'fga_register_business_post_type' );

/*----------------------------------------------------------------------
Add business
------------------------------------------------------------------------*/
if( ! function_exists('fga_add_business') ){
    
    function fga_add_business(){

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $business_name = $_POST['business_name'];
        $cage = $_POST['cage'];
        $message = $_POST['message'];
        $redirect_to = $_POST['redirect_to'];
        $error_message = $_POST['error_message'];

        check_ajax_referer( 'fga_add_business_nonce', 'fga_add_business_security' );

        if( empty($first_name) || empty($last_name) || empty($business_name) || empty($cage) || empty($message) ){
            echo json_encode( array( 'success' => false, 'type' => 'empty', 'msg' => $error_message ) );
            wp_die();
        }

        $new_business = array(
            'post_type' => 'fga_business'
        );

        $new_business['post_title'] = sanitize_text_field( $_POST['business_name'] );
        $new_business['post_status'] = 'publish';

        $business_id = wp_insert_post( $new_business );
        if( $business_id > 0 ){
            
            $duns = current_time( 'timestamp' );
            add_post_meta( $business_id, 'first_name', sanitize_text_field( $first_name ) );
            add_post_meta( $business_id, 'last_name', sanitize_text_field( $last_name ) );
            add_post_meta( $business_id, 'cage', sanitize_text_field( $cage ) );
            add_post_meta( $business_id, 'message', sanitize_text_field( $message ) );
            add_post_meta( $business_id, 'duns', $duns );
            add_post_meta( $business_id, 'status', 'active' );

            $admin_email = get_option('admin_email');

            $headers = array();
            $headers[] = 'From: No Reply <noreply@'.$_SERVER['HTTP_HOST'].'>';
            
            $subject = sprintf( esc_html__( 'New Business submission on %s', 'fga' ), get_option('siteurl') ) . "\r\n\r\n";

            $email_message = esc_html__( 'Hi there,', 'fga' ) . "\r\n\r\n";
            $email_message .= sprintf( esc_html__( 'You have a new Business submission on %s!', 'fga' ), get_option('siteurl') ) . "\r\n\r\n";
            $email_message .= sprintf( esc_html__( 'First Name: %s', 'fga' ), $first_name ) . "\r\n";
            $email_message .= sprintf( esc_html__( 'Last Name: %s', 'fga' ), $last_name ) . "\r\n";
            $email_message .= sprintf( esc_html__( 'Business Name: %s', 'fga' ), $business_name ) . "\r\n";
            $email_message .= sprintf( esc_html__( 'Case: %s', 'fga' ), $cage ) . "\r\n";
            $email_message .= sprintf( esc_html__( 'Message: %s', 'fga' ), $message ) . "\r\n";
            $email_message .= sprintf( esc_html__( 'DUNS: %s', 'fga' ), $duns ) . "\r\n";
            $email_message .= sprintf( esc_html__( 'Status: %s', 'fga' ), 'Active' ) . "\r\n\r\n";
            $email_message .= esc_html__( 'Thank you!', 'fga' ) . "\r\n\r\n";
            
            wp_mail( $admin_email, wp_specialchars_decode( $subject ), $email_message, $headers );

            echo json_encode( array( 'success' => true, 'redirect_to' => $redirect_to ) );
            wp_die();
        } else {
            echo json_encode( array( 'success' => false, 'msg' => esc_html__( 'Anything wrong, Please try again.', 'fga' ) ) );
            wp_die();
        }
    }
}
add_action( 'wp_ajax_fga_add_business', 'fga_add_business' );
add_action( 'wp_ajax_nopriv_fga_add_business', 'fga_add_business' );