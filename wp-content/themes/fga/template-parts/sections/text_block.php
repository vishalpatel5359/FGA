<?php

$status = get_sub_field( 'text_block_display_status' );

$sub_title = get_sub_field( 'text_block_sub_title' );
$title = get_sub_field( 'text_block_title' );
$content = get_sub_field( 'text_block_content' );

$id = get_sub_field( 'text_block_id' );
$extra_class = get_sub_field( 'text_block_extra_class' );

$section_id = '';
if( !empty($id) ){
	$section_id = 'id="'.$id.'"';
}

if( $status == 'show' ){ ?>
	<section <?php echo $section_id; ?> class="page-welcome-title <?php echo esc_attr($extra_class); ?>"><?php
		if( !empty($sub_title) || !empty($title) ){ ?>
	        <h1 class="page-welcome-title__heading"><?php
	        	if( !empty($sub_title) ){ ?>
	            	<span class="page-welcome-title__heading-alt-sm"><?php echo fga_remove_empty_p( $sub_title ); ?></span><?php
	            }

	            if( !empty($title) ){ ?>
	            	<span class="page-welcome-title__heading-lg"><?php echo fga_remove_empty_p( $title ); ?></span><?php
	            } ?>
	        </h1><?php
	    }

	    if( !empty($content) ){
        	echo apply_filters( 'the_content', fga_remove_empty_p( $content ) );
        } ?>
    </section><?php
}

?>