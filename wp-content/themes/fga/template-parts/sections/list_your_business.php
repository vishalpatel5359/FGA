<?php

$status = get_sub_field( 'list_your_business_display_status' );

$title = get_sub_field( 'list_your_business_title' );
$redirect_to = get_sub_field( 'list_your_business_redirect_to' );

$lbl_first_name = get_sub_field( 'list_your_business_first_name' );
$lbl_last_name = get_sub_field( 'list_your_business_last_name' );
$lbl_business_name = get_sub_field( 'list_your_business_business_name' );
$lbl_cage = get_sub_field( 'list_your_business_cage' );
$lbl_message = get_sub_field( 'list_your_business_message' );
$lbl_error_message = get_sub_field( 'list_your_business_error_message' );
$lbl_submit = get_sub_field( 'list_your_business_submit' );
$lbl_recent_contacts = get_sub_field( 'list_your_business_recent_contacts' );

$id = get_sub_field( 'list_your_business_id' );
$extra_class = get_sub_field( 'list_your_business_extra_class' );

$section_id = '';
if( !empty($id) ){
	$section_id = 'id="'.$id.'"';
}

if( $status == 'show' ){ ?>
	<section <?php echo $section_id; ?> class="contact-us <?php echo esc_attr($extra_class); ?>"><?php
		if( !empty($title) ){ ?>
        	<h1 class="contact-us__heading"><?php echo fga_remove_empty_p( $title ); ?></h1><?php
        } ?>

        <form name="list-your-business" class="wpcf7-form init">
            <p>
                <label class="contact-form__label">
                    <?php echo $lbl_first_name; ?><br>
                    <span class="wpcf7-form-control-wrap">
                        <input type="text" name="first_name" id="first_name">
                    </span>
                </label>
            </p>
            <p>
                <label class="contact-form__label">
                    <?php echo $lbl_last_name; ?><br>
                    <span class="wpcf7-form-control-wrap">
                        <input type="text" name="last_name" id="last_name">
                    </span>
                </label>
            </p>
            <p>
                <label class="contact-form__label">
                    <?php echo $lbl_business_name; ?><br>
                    <span class="wpcf7-form-control-wrap">
                        <input type="text" name="business_name" id="business_name">
                    </span>
                </label>
            </p>
            <p>
                <label class="contact-form__label">
                    <?php echo $lbl_cage; ?><br>
                    <span class="wpcf7-form-control-wrap">
                        <input type="text" name="cage" id="cage">
                    </span>
                </label>
            </p>
            <div class="full-row">
                <label>
                    <?php echo $lbl_message; ?><br>
                    <span class="wpcf7-form-control-wrap">
                        <textarea name="message" id="message"></textarea>
                    </span>
                </label>
            </div>
            <div class="full-row">
                <?php wp_nonce_field( 'fga_add_business_nonce', 'fga_add_business_security' ); ?>
                <input type="hidden" name="redirect_to" value="<?php echo esc_url($redirect_to); ?>">
                <input type="hidden" name="error_message" value="<?php echo esc_attr($lbl_error_message); ?>">
                <input type="hidden" name="action" value="fga_add_business">
                <input type="submit" value="<?php echo esc_attr( $lbl_submit ); ?>" id="fga-add-business-btn" class="wpcf7-form-control has-spinner wpcf7-submit"><span class="wpcf7-spinner"></span>
            </div>
            <div id="fga-add-business-messages"></div>
        </form>
    </section>
    <section class="sam-search"><?php
        if( !empty($lbl_recent_contacts) ){ ?>
            <h2 class="contact-us__heading"><?php echo fga_remove_empty_p( $lbl_recent_contacts ); ?></h2><?php
        }

        $business_list = get_posts( array( 'post_type' => 'fga_business', 'post_status' => 'publish', 'posts_per_page' => -1 ) );
        if( !empty($business_list) ){ ?>
            <table class="sam-search__table">
                <thead class="sam-search__thead">
                    <tr class="sam-search__tr">
                        <th class="sam-search__th"><?php esc_html_e( 'Status', 'fga' ); ?></th>
                        <th class="sam-search__th"><?php esc_html_e( 'Business Name', 'fga' ); ?></th>
                        <th class="sam-search__th"><?php esc_html_e( 'CAGE', 'fga' ); ?></th>
                        <th class="sam-search__th"><?php esc_html_e( 'DUNS', 'fga' ); ?></th>
                        <th class="sam-search__th"></th>
                    </tr>
                </thead>
                <tbody class="sam-search__tbody"><?php
                    foreach( $business_list as $post ){
                        setup_postdata( $post );

                        $business_name = $post->post_title;
                        $first_name = get_post_meta( $post->ID, 'first_name', true );
                        $last_name = get_post_meta( $post->ID, 'last_name', true );
                        $cage = get_post_meta( $post->ID, 'cage', true );
                        $message = get_post_meta( $post->ID, 'message', true );
                        $duns = get_post_meta( $post->ID, 'duns', true );
                        $status = get_post_meta( $post->ID, 'status', true ); ?>
                
                        <tr class="sam-search__tr clickable-row" onclick='window.location="#"'>
                            <td class="sam-search__td">
                                <span class="mob-status"><?php esc_html_e( 'Status:', 'fga' ); ?></span>
                                <span class="status__<?php echo esc_attr($status); ?>"><?php echo ucfirst($status); ?></span>
                            </td>
                            <td class="sam-search__td full-with">
                                <span class="mob-status"><?php esc_html_e( 'Business Name:', 'fga' ); ?></span>
                                <?php echo $business_name; ?>
                            </td>
                            <td class="sam-search__td">
                                <span class="mob-status"><?php esc_html_e( 'CAGE:', 'fga' ); ?></span>
                                <?php echo $cage; ?>
                            </td>
                            <td class="sam-search__td">
                                <span class="mob-status"><?php esc_html_e( 'DUNS:', 'fga' ); ?></span>
                                <?php echo $duns; ?>
                            </td>
                            <td class="sam-search__td result-arrow">
                                <div class="result-arrow__img"></div>
                            </td>
                        </tr><?php
                    } ?>
                </tbody>
            </table><?php
        } else { ?>
            <p><br><?php esc_html_e( 'No business found!'); ?></p><?php
        }
        wp_reset_postdata(); ?>
    </section><?php
}

?>