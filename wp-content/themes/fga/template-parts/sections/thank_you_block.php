<?php

$status = get_sub_field( 'thank_you_block_display_status' );

$title = get_sub_field( 'thank_you_block_title' );
$content = get_sub_field( 'thank_you_block_content' );

$id = get_sub_field( 'thank_you_block_id' );
$extra_class = get_sub_field( 'thank_you_block_class' );

$section_id = '';
if( !empty($id) ){
	$section_id = 'id="'.$id.'"';
}

if( $status == 'show' ){ ?>
    <section <?php echo $section_id; ?> class="page-welcome-title thank-you <?php echo esc_attr($extra_class); ?>"><?php
        if( !empty($title) ){ ?>
            <h1 class="page-welcome-title__heading-md"><?php echo fga_remove_empty_p( $title ); ?></h1><?php
        } ?>
        
        <hr class="help-box__seperator"><?php

        if( !empty($content) ){
            echo apply_filters( 'the_content', fga_remove_empty_p( $content ) );
        } ?>
    </section>
    <script type="text/javascript">
        jQuery('.content-wrapper__column').addClass('content-middle');
    </script><?php
}

?>