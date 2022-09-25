<?php

get_header();

while ( have_posts() ) : the_post(); ?>
	<section class="hero-banner hero-sub-banner pt-md-75 pb-md-110 pt-45 pb-60">
		<div class="vector-img-div-nineteen">
			<span class="triangle-icon" data-0="transform:translateY(0px);" data-top="transform:translateY(30px);"><img src="<?php echo IMAGE_ASSETS_URL; ?>/triangle_-_red.svg" alt="triangle" width="21" height="22"></span>
			<span  class="circle-icon" data-0="transform:translateY(0px);" data-top="transform:translateY(30px);"><img src="<?php echo IMAGE_ASSETS_URL; ?>/circle_-_green.svg" alt="circle-orange" width="15" height="15"></span>
			<span  class="dots-icon" data-0="transform:translateY(0px);" data-top="transform:translateY(30px);"><img src="<?php echo IMAGE_ASSETS_URL; ?>/dots_-_orange.svg" alt="dots-green" width="31" height="29"></span>
		</div>
		<div class="vector-img-div-twenty">
			<span class="triangle-icon" data-0="transform:translateY(0px);" data-top="transform:translateY(30px);"><img src="<?php echo IMAGE_ASSETS_URL; ?>/triangle_-_orange.svg" alt="triangle" width="21" height="22"></span>
			<span  class="circle-icon" data-0="transform:translateY(10px);" data-top="transform:translateY(30px);"><img src="<?php echo IMAGE_ASSETS_URL; ?>/circle_-_blue.svg" alt="circle-orange" width="15" height="15"></span>
			<span  class="dots-icon" data-0="transform:translateY(0px);" data-top="transform:translateY(30px);"><img src="<?php echo IMAGE_ASSETS_URL; ?>/dots_-_green.svg" alt="dots-green" width="31" height="29"></span>
		</div>
		<div class="container">
			<div class="content-title wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.5s">
				<div class="max-width-821"><?php
					$categories = get_the_category($post->ID);
					if( !empty($categories) ){
						$categories_name = array();
						foreach( $categories as $key => $value ){
							$categories_name[] = $value->name;
						}

						if( !empty($categories_name) ){ ?>
							<span class="sub-title font-24 mb-md-20 mb-10"><?php echo implode( '', $categories_name ); ?></span><?php
						}
					} ?>
					<h1 class="mb-md-30 mb-15"><?php the_title(); ?></h1>
					<span class="post-meta">
						<span class="post-date"><?php echo get_the_date( 'dS M y', $post->ID ); ?></span>
						<div class="a2a_kit a2a_default_style">
						    <a href="<?php echo get_the_permalink($post->ID); ?>" class="post-share a2a_dd"><img src="<?php echo IMAGE_ASSETS_URL; ?>/share.svg" alt="share" width="20" height="22"><?php esc_html_e( 'Share', 'fga' ); ?></a>
						</div>
					</span>
				</div>
			</div>
		</div>
	</section>
	<section class="content-part pt-md-15 pb-md-65 pb-30">
		<div class="container">
			<div class="content-img mobile-full-container wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.5s">
				<?php the_post_thumbnail( 'full',  array('class' => 'img-responsive' ) ); ?>
			</div>
		</div>
	</section>
	<section class="content-part pt-md-65 pt-30">
		<div class="container">
			<div class="content-title wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.5s">
				<div class="max-width-821"><?php
					if( have_rows( 'sections' ) ) :
					  	while( have_rows( 'sections' ) ): the_row();
					  		$section_name = get_row_layout();
					  		get_template_part( 'template-parts/sections/'.$section_name );
					  endwhile;
					endif; ?>
				</div>
			</div>
			<div class="post-meta-bottom mt-md-70 wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.5s">
				<span class="post-author"><?php the_author(); ?></span>
				<span class="post-date"><?php echo get_the_date( 'dS M y', $post->ID ); ?></span>
				<div class="a2a_kit a2a_default_style">
				    <a href="<?php echo get_the_permalink($post->ID); ?>" class="post-share a2a_dd"><img src="<?php echo IMAGE_ASSETS_URL; ?>/share.svg" alt="share" width="20" height="22"><?php esc_html_e( 'Share', 'fga' ); ?></a>
				</div>
			</div>
		</div>
	</section>
	<script async src="https://static.addtoany.com/menu/page.js"></script><?php

	$global_sections = fga_theme_option( 'news_global_sections' );
	if( !empty($global_sections) ){
		foreach( $global_sections as $key => $value ){
			if( have_rows( 'sections', $global_sections[$key]['section'] ) ) :
			  	while( have_rows( 'sections', $global_sections[$key]['section'] ) ): the_row();
			  		$section_name = get_row_layout();
			  		get_template_part( 'template-parts/sections/'.$section_name );
			  endwhile;
			endif;
		}
	}
endwhile;

get_footer();

?>