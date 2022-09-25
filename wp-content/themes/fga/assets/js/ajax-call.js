jQuery(document).ready( function($) {
    'use strict';

    if( typeof fga_ajax_vars !== 'undefined' ){

	    var ajaxurl = fga_ajax_vars.admin_url+ 'admin-ajax.php';
	    
	    jQuery('#fga-add-business-btn').on('click', function(e){
	        e.preventDefault();
	        var currnt = jQuery(this);
	        fga_add_business( currnt );
	    });

	    var fga_add_business = function(currnt){

	    	var $form = currnt.parents('form');
	        var $submit_label = $form.find('#fga-add-business-btn').val();
	        var $messages = jQuery('#fga-add-business-messages');
	        
	        jQuery.ajax({
	            type: 'post',
	            url: ajaxurl,
	            dataType: 'json',
	            data: $form.serialize(),
	            beforeSend: function(){
	            	$form.find('#fga-add-business-btn').val('Submitting...');
	            	$messages.empty();
	            },
	            complete: function(){
	                $form.find('#fga-add-business-btn').html($submit_label);
	            },
	            success: function(response){
	                if( response.success ){
	                    window.location.replace( response.redirect_to );
	                } else {
	                	$form.find('#fga-add-business-btn').val($submit_label);
	                	if( response.type == 'empty' ){
	                		jQuery('form[name="list-your-business"] input, textarea').blur();
	                	} else {
	                		$messages.empty().append('<span class="wpcf7-not-valid-tip">'+ response.msg +'</span>');
	                	}
	                }
	            },
	            error: function(xhr, status, error) {
	                var err = eval("(" + xhr.responseText + ")");
	                console.log(err.Message);
	            }
	        });
	    }

	    var fga_add_business_validation = function(){
		    jQuery('form[name="list-your-business"] input, textarea').on( 'blur keyup', function(){
				if( !jQuery(this).val() ){
						jQuery(this).next('.wpcf7-not-valid-tip').remove();
						jQuery(this).addClass('wpcf7-not-valid');
						jQuery('<span class="wpcf7-not-valid-tip">'+jQuery('form[name="list-your-business"] input[name="error_message"]').val()+'</span>').insertAfter(jQuery(this));
				} else {
					jQuery(this).removeClass('wpcf7-not-valid');
					jQuery(this).next('.wpcf7-not-valid-tip').remove();
				}
			});
		}
		fga_add_business_validation();
	}
});