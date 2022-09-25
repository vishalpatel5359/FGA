            </div>
        </div>
        <footer class="footer"><?php
            $footer_logo = fga_theme_option( 'footer_site_logo' );
            if( !empty($footer_logo) ){ ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php echo wp_get_attachment_image( $footer_logo, 'full', '', array( 'class' => 'footer__logo' ) ); ?>
                </a><?php
            }

            $copyright_text_info = fga_theme_option( 'footer_copyright_text_info' );
            if( !empty($copyright_text_info) ){
                echo apply_filters( 'the_content', fga_remove_empty_p( $copyright_text_info ) );
            } ?>
        </footer>
    </div>
<?php wp_footer(); ?>

</body>
</html>