<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>><?php

    $header_logo = fga_theme_option( 'header_site_logo' );
    $rating_logo = fga_theme_option( 'header_rating_logo' ); ?>
        
    <header class="header"><?php
        if( !empty($header_logo) || !empty($rating_logo) ){ ?>
            <div class="header__wrapper"><?php
                if( !empty($header_logo) ){ ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <span class="header__logo-wrapper"><?php echo wp_get_attachment_image( $header_logo, 'full', false, array( 'class' => '', 'loading' => false ) ); ?></span>
                    </a><?php
                }

                if( have_rows( 'header_rating_logo', 'option' ) ): ?>
                    <span class="header__badges"><?php
                        while( have_rows('header_rating_logo', 'option') ) : the_row();
                            $logo = get_sub_field('logo');
                            if( !empty($logo) ){ ?>
                                <img src="<?php echo esc_url($logo); ?>" alt="<?php echo fga_attachment_caption($logo); ?>"><?php
                            }
                        endwhile; ?>
                    </span><?php
                endif; ?>
            </div><?php
        } ?>
    </header>
    <div class="content-wrapper">
        <div class="content-wrapper__column">