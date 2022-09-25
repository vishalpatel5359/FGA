<?php

$status = get_sub_field( 'icon_block_display_status' );

$icon_block = get_sub_field( 'icon_block_icon_block' );

$id = get_sub_field( 'icon_block_id' );
$extra_class = get_sub_field( 'icon_block_extra_class' );

$section_id = '';
if( !empty($id) ){
	$section_id = 'id="'.$id.'"';
}

if( $status == 'show' ){ ?>
	<section <?php echo $section_id; ?> class="reg-choices <?php echo esc_attr($extra_class); ?>"><?php
		if( have_rows( 'icon_block_icon_block' ) ):
            while( have_rows('icon_block_icon_block') ) : the_row();
                
                $icon = get_sub_field('icon');
                $title = get_sub_field('title');
                $content = get_sub_field('content');
                $button = get_sub_field('button'); ?>
                 
				<div class="reg-choices__renew"><?php
                 	if( !empty($icon) ){
                        echo wp_get_attachment_image( $icon, 'full', '', array( 'class' => 'reg-choices__image' ) );
                    }

                    if( !empty($title) ){ ?>
		            	<h2 class="reg-choices__name"><?php echo fga_remove_empty_p( $title ); ?></h2><?php
		            }

		            if( !empty($content) ){
			        	echo apply_filters( 'the_content', fga_remove_empty_p( $content ) );
			        }

			        $button_attr = fga_acf_link( $button, 'reg-choices__button' );
					if( $button_attr['status'] ){ ?>
						<a <?php echo $button_attr['attributes']; ?>><?php echo $button_attr['title']; ?></a><?php
                    } ?>
                </div><?php
            endwhile;
        endif; ?>
    </section><?php
}

?>