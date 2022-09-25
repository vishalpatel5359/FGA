<?php

/*----------------------------------------------------------------------
Add metaboxes
------------------------------------------------------------------------*/
add_action( 'load-post.php', 'fga_business_meta_boxes_setup' );
add_action( 'load-post-new.php', 'fga_business_meta_boxes_setup' );

/*----------------------------------------------------------------------
Meta box setup function
------------------------------------------------------------------------*/
if( !function_exists( 'fga_business_meta_boxes_setup' ) ){
	function fga_business_meta_boxes_setup(){
		global $typenow;
		if( $typenow == 'fga_business' ){
			add_action( 'add_meta_boxes', 'fga_load_business_metaboxes' );
		}
	}
}

/*----------------------------------------------------------------------
Add business metaboxes
------------------------------------------------------------------------*/
if( !function_exists( 'fga_load_business_metaboxes' ) ){
	function fga_load_business_metaboxes(){
		add_meta_box( 'fga_business_metaboxes', esc_html__( 'Business Details', 'fga' ), 'fga_business_meta', array( 'fga_business' ), 'normal', 'default' );
	}
}

/*----------------------------------------------------------------------
Add business Meta boxes
------------------------------------------------------------------------*/
if( !function_exists( 'fga_business_meta' ) ){
	function fga_business_meta( $object, $box ){

		$business_name = $object->post_title;
		$first_name = get_post_meta( $object->ID, 'first_name', true );
		$last_name = get_post_meta( $object->ID, 'last_name', true );
		$cage = get_post_meta( $object->ID, 'cage', true );
		$message = get_post_meta( $object->ID, 'message', true );
		$duns = get_post_meta( $object->ID, 'duns', true );
		$status = get_post_meta( $object->ID, 'status', true ); ?>
		
		<div class="fga_meta_control">
			<p class="fga-inline-block-wrap"><span class="fga_meta_title"><?php esc_html_e( 'Business Name:', 'fga' ); ?></span></p>
			<div class="fga-inline-block-wrap">
				<strong><?php echo $business_name; ?></strong>
			</div>
		</div>

		<div class="fga_meta_control">
			<p class="fga-inline-block-wrap"><span class="fga_meta_title"><?php esc_html_e( 'First Name:', 'fga' ); ?></span></p>
			<div class="fga-inline-block-wrap">
				<strong><?php echo $first_name; ?></strong>
			</div>
		</div>

		<div class="fga_meta_control">
			<p class="fga-inline-block-wrap"><span class="fga_meta_title"><?php esc_html_e( 'Last Name:', 'fga' ); ?></span></p>
			<div class="fga-inline-block-wrap">
				<strong><?php echo $last_name; ?></strong>
			</div>
		</div>

		<div class="fga_meta_control">
			<p class="fga-inline-block-wrap"><span class="fga_meta_title"><?php esc_html_e( 'Cage:', 'fga' ); ?></span></p>
			<div class="fga-inline-block-wrap">
				<strong><?php echo $cage; ?></strong>
			</div>
		</div>

		<div class="fga_meta_control">
			<p class="fga-inline-block-wrap"><span class="fga_meta_title"><?php esc_html_e( 'Message:', 'fga' ); ?></span></p>
			<div class="fga-inline-block-wrap">
				<strong><?php echo $message; ?></strong>
			</div>
		</div>

		<div class="fga_meta_control">
			<p class="fga-inline-block-wrap"><span class="fga_meta_title"><?php esc_html_e( 'DUNS:', 'fga' ); ?></span></p>
			<div class="fga-inline-block-wrap">
				<strong><?php echo $duns; ?></strong>
			</div>
		</div>

		<div class="fga_meta_control">
			<p class="fga-inline-block-wrap"><span class="fga_meta_title"><?php esc_html_e( 'Status:', 'fga' ); ?></span></p>
			<div class="fga-inline-block-wrap">
				<strong><?php echo ucfirst($status); ?></strong>
			</div>
		</div><?php
	}
}

?>