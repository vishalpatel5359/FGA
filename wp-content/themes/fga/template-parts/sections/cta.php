<?php

$status = get_sub_field( 'cta_display_status' );

$title = get_sub_field( 'cta_title' );
$content = get_sub_field( 'cta_content' );

$id = get_sub_field( 'cta_id' );
$extra_class = get_sub_field( 'cta_extra_class' );

$section_id = '';
if( !empty($id) ){
	$section_id = 'id="'.$id.'"';
}

if( $status == 'show' ){ ?>
	<section <?php echo $section_id; ?> class="help-box <?php echo esc_attr($extra_class); ?>"><?php
		if( !empty($title) ){ ?>
        	<h2 class="help-box__heading"><?php echo fga_remove_empty_p( $title ); ?></h2><?php
        } ?>
        
        <hr class="help-box__seperator"><?php

        if( !empty($content) ){
        	echo apply_filters( 'the_content', fga_remove_empty_p( $content ) );
        } ?>
    </section><?php
}

?>