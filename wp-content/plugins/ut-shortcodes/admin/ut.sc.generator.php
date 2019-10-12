<?php

/* 
Description: The Main Shortcode Generator
Author: UnitedThemes 
Version: 1.0 
Author URI: http://www.unitedthemes.com 
License: GNU General Public License version 3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];

// Access to WordPress
require_once( $path_to_wp . '/wp-load.php' );
$themepath = get_template_directory_uri();

//get definitions
require_once( 'ut.sc.definitions.php' );
require_once( 'ut.sc.functions.php' );

?>

<!DOCTYPE html>
<html lang="en-US">
<head>
<title><?php _e( 'Insert Shortcode' , 'ut_shortcodes' ); ?></title>

<link rel="stylesheet" href="<?php echo plugins_url( 'css/ut.style.css' , __FILE__ ); ?>" />
<link rel="stylesheet" href="<?php echo plugins_url( 'css/ut.chosen.css' , __FILE__ ); ?>" />
<link rel="stylesheet" href="<?php echo plugins_url( 'css/ut.jqueryui.css' , __FILE__ ); ?>" />

<link rel="stylesheet" href="<?php echo plugins_url( '../css/font-awesome.css' , __FILE__ ); ?>" />
<link rel="stylesheet" href="<?php echo get_option('siteurl') ?>/wp-admin/css/color-picker.css" />

<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo plugins_url( 'js/ut.chosen.jquery.min.js' , __FILE__ ); ?>"></script>

<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/ui/jquery.ui.core.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/ui/jquery.ui.widget.min.js"></script>

<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/ui/jquery.ui.mouse.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/ui/jquery.ui.draggable.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/ui/jquery.ui.slider.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/jquery.ui.touch-punch.js"></script>

<script type='text/javascript'>
/* <![CDATA[ */
var wpColorPickerL10n = { "clear":"Clear" , "defaultString" : "Default" , "pick" : "Select Color" };
/* ]]> */
</script>

<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-admin/js/iris.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-admin/js/color-picker.min.js"></script>

<script type="text/javascript">
/* <![CDATA[ */
(function($){
	
	$('#TB_window').css('opacity',0);
	
    $(document).ready(function(){
		
		/*
		|--------------------------------------------------------------------------
		| Fix Ajax Content
		|--------------------------------------------------------------------------
		*/
		function calcTB_Pos() {
			$('#TB_window').css({
			   'height': ($('#TB_ajaxContent').outerHeight() + 30) + 'px',
			   'width': ( $('#TB_ajaxContent').outerWidth() ) + 'px',
			   'top' : (($(window).height() + $(window).scrollTop())/2 - (($('#TB_ajaxContent').outerHeight()-$(window).scrollTop()) + 30)/2) + 'px',
			   'opacity' : 1
			});
		}
		
		setTimeout(calcTB_Pos,10);
		setTimeout(calcTB_Pos,100);
		
		$(window).resize(calcTB_Pos);
		
		
		/*
		|--------------------------------------------------------------------------
		| Editor Functions
		|--------------------------------------------------------------------------
		*/
		
		/* get selected content */
		var editor = tinyMCE.activeEditor,
			content = editor.selection.getContent();
				
		
		/* set selected content */	
		$('#sc-content textarea').val( content );
		
		
		/* send shortcode back to wordpress */  
		$('#insert-shortcode').click(function(){
		   
			editor.selection.setContent( $('#shortcode-preview-o').text() + $('#shortcode-preview-m').text() + $('#shortcode-preview-c').text() );
			tb_remove();
			return false;
			
		});
	
		/*
		|--------------------------------------------------------------------------
		| Media Access
		|--------------------------------------------------------------------------
		*/
		
		var input = '',
			datagroup = '';
			
		$(document).on("click", ".ut-upload-button", function(event){ 

			event.preventDefault();
			
			input = '';
			datagroup = '';
			
			var button = $(this);
			input  = $(this).parent().find('input:text').first();
			datagroup = $(input).data('group');
			
			if ( typeof(ut_file_frame)!=="undefined" ) {
				
				ut_file_frame.on( "select", function() {
				
					var attachment = ut_file_frame.state().get("selection").first().toJSON();
					$(input).val(attachment.url);
							
					/* update preview */
					create_group_item( datagroup );
					preview_shortcode();
					
				});
				
				ut_file_frame.open();
				return;
			}
			
			ut_file_frame = null;

			// Create the media frame.
			ut_file_frame = wp.media.frames.customHeader = wp.media({
				title       : button.data( 'uploader_title' ),
				multiple    : false,
				library     : { type : button.data( 'limit_type' )},
				button      : { text : button.data( 'uploader_button_text' ) }
			});

			ut_file_frame.on( "select", function() {
				
				var attachment = ut_file_frame.state().get("selection").first().toJSON();
				$(input).val(attachment.url);
								
				/* update preview */
				create_group_item( datagroup );
				preview_shortcode();
				
				
			});
				
			ut_file_frame.open();
			return;
			
		});
		
		
		/*
		|--------------------------------------------------------------------------
		| Icon Modal
		|--------------------------------------------------------------------------
		*/
		
		var iconbutton = '',
			iconinput  = '';
		
		$(document).on("click", ".open-ut-modal", function(event){ 
			
			event.preventDefault();
			
			iconbutton = $(this),
			iconinput  = $(this).siblings('input:text').first();
			
			$(".ut-modal").fadeIn();
			
		});
		
		
		$(document).on("click", ".close-ut-modal", function(event){ 
			
			event.preventDefault();
			
			$(".ut-modal").fadeOut();
			
		});
		
		$(document).on("click", ".ut-glyphicon", function(event){ 
			
			var icon = $(this).data('icon');
			
			$(iconinput).val(icon);
			$(".ut-modal").fadeOut();
			
			/* update preview */
			preview_shortcode();
		
		});
		
		
		/*
		|--------------------------------------------------------------------------
		| Create Range Slider
		|--------------------------------------------------------------------------
		*/
		$( ".ut-range-slider" ).slider({
				
			min: 0,
			max: 1,
			step: 0.1,
			value: 0.8,
			slide: function( event, ui ) {
	
				$(this).parent().find('.ut-hidden-range-input').val( ui.value );
				$(this).parent().find('.ut-range-value').text( ui.value );
				
				/* update preview */
				preview_shortcode();
				
			}
		
		});
		
		/*
		|--------------------------------------------------------------------------
		| Create Color Picker
		|--------------------------------------------------------------------------
		*/
		$('.ut-color-picker').wpColorPicker({
			
			change: function(event, ui){
				
				$(this).val( ui.color.toString() );
				
				/* update preview */
				preview_shortcode();
				
			}
		
		});
		
		
		/*
		|--------------------------------------------------------------------------
		| Shortcode Change Box
		|--------------------------------------------------------------------------
		*/
		
		/* create nice dropdown*/
		$("#ut-shortcodes").chosen();
		
		/* main change function */
		$( '#ut-shortcodes' ).change(function(){
			
			$( '.sc-options' ).hide();
			$( '#options-' + $(this).val() ).show();
			$( '.sc-settings' ).show();
			
			var datatype = $('#options-'+$(this).val()).attr('data-type');
			
			if( datatype == 'e' || datatype == 'c' ){
				
				$('#sc-content').show().find('textarea').val( content );
				
				if($(this).children('option:selected').attr('data-clabel')!='' ) {
					$('#clabel').html( $(this).children('option:selected').attr('data-clabel')+':' );
				} else {
					$('#clabel').html( 'Content:' );
				}
				
			} else {
				$('#sc-content textarea').val('').parent().hide();
			}
			
			/* update preview */
			preview_shortcode();
			
		});		
		
		
		/*
		|--------------------------------------------------------------------------
		| Button Group
		|--------------------------------------------------------------------------
		*/
		$(document).on("click", '.btn-group .btn', function(e){ 
        
			$(this).parent().find('.btn').removeClass('active');
			$(this).addClass('active');
			$(this).parent().find('input').val( $(this).data('value') );
			
		});
	
		
		/*
		|--------------------------------------------------------------------------
		| Shortcode : Progress Bars
		|--------------------------------------------------------------------------
		*/
		$(document).on("click", ".remove-bar-item", function(e){ 
		
			$(this).parent().remove();
			create_group_item( $(this).data('group') );
			return false;
			
		});
    
		$('.add-bar-item').click(function(e){
			
			e.preventDefault();
			
			// parent element
			group_parent  = $(this).parent();
			
			// item to copy        
			item_to_copy  = group_parent.find('.sc-to-copy').clone();
			
			// activate item
			group_parent.find('.sc-to-copy').removeClass('sc-to-copy');
			
			// search for last item
			fieldLocation = group_parent.find('.sc-bars:last');
			
			// create hidden copy
			item_to_copy.insertAfter( fieldLocation );
			
		});

		$(document).on("keyup", ".sc-bar-width, .sc-bar-text", function(e){ 
			create_group_item( $(this).data('group') );
		})
		
		$(document).on("input propertychange", ".sc-bar-width, .sc-bar-text", function(e){ 
			create_group_item( $(this).data('group') );
		})
		
		$(document).on("click", ".sc-bar-btn", function(e){ 
			create_group_item( $(this).data('group') );
		});
    	
	
		/*
		|--------------------------------------------------------------------------
		| Input, Select or Radio Change Functions
		|--------------------------------------------------------------------------
		*/
		
		/* main textarea for shortcode content */
		$('#sc-content textarea').bind('keyup', function(){ 
        
			/* update preview */
			preview_shortcode();
			
		}).bind('input propertychange', function(){ 
			
			/* update preview */
			preview_shortcode();
			
		});
		
		/* delete group item */		
		$(document).on("click", ".remove-group-item", function(e){ 
        
			$(this).parent().remove();
			create_group_item( $(this).data('group') );
			return false;
			
		});
		
		
		$(document).on("keyup", ".propertychange", function(e){ 
			create_group_item( $(this).data('group') );
		});
		
		$(document).on("input propertychange", ".propertychange", function(e){ 
			create_group_item( $(this).data('group') );
		});
		
		$(document).on("change", ".sc-select-control", function(e){ 
        
			/* update preview */
			preview_shortcode();
		
		});
		
		$(document).on("change", ".sc-select-live", function(e){ 
        
			/* update preview */
			create_group_item( $(this).data('group') );
		
		});
		
		$(document).on("keyup click", ".sc-options input.attr", function(e){ 
			
			/* update preview */
			preview_shortcode();
			
		}).bind('input propertychange', function(){ 
			
			/* update preview */
			preview_shortcode();
			
		});
		
		$(document).on("click", ".lastcolumn", function(e){ 
        
			if( $(this).is(':checked') ) {
				
				/* update preview */
				preview_shortcode( '_last' );
				
			} else {
				
				/* update preview */
				preview_shortcode();
				
			}
	
		});
		
		
		/*
		|--------------------------------------------------------------------------
		| Add Group Items
		|--------------------------------------------------------------------------
		*/
		
		/* tabs */
		$('.add-list-item').click(function(){
			
			$(this).prevAll('div').append( '<div class="sc-lister well-white"><div class="ut-option-field"><label>Title: </label></div><div class="ut-option-value"><input type="text" value="" name="" class="sc-list-item form-control propertychange" data-group="tabgroup"></div><div class="hr"></div><div class="ut-option-field"><label>Tab Content: </label></div><div class="ut-option-value"><textarea name="" type="text" class="sc-list-text form-control propertychange" data-group="tabgroup"></textarea></div><button class="btn btn-danger btn-xs remove-group-item" type="button" data-group="tabgroup"><i class="icon-trash"></i></button></div>' );
			return false;
			
		});
		
		/* toggles */
		$('.add-toggle-item').click(function(){
			
			$(this).prevAll('div').append( '<div class="sc-toggles well-white"><div class="ut-option-field"><label>Title: </label></div><div class="ut-option-value"><input type="text" value="" name="" class="sc-toggle-item form-control propertychange" data-group="togglegroup"></div><div class="hr"></div><div class="ut-option-field"><label>Content: </label></div><div class="ut-option-value"><textarea name="" type="text" class="sc-toggle-text form-control propertychange" data-group="togglegroup"></textarea></div><div class="ut-option-field"><label>State: </label></div><div class="ut-option-value"><select class="sc-social-icon" data-group="socialgroup"><option value="closed">closed</option><option value="open">open</option></select></div><button class="btn btn-danger btn-xs remove-group-item" type="button" data-group="togglegroup"><i class="fa fa-trash-o"></i></button></div>' );
			return false;
			
		});
		
		/* quotes */
		$('.add-quote-item').click(function(){
			
			$(this).prevAll('div').append( '<div class="sc-quotes well-white"><div class="ut-option-field"><label>Author: </label></div><div class="ut-option-value"><input type="text" value="" name="" class="sc-quote-item form-control quote-author propertychange" data-group="quotegroup"></div><div class="hr"></div><div class="ut-option-field"><label>Avatar: </label></div><div style="margin-bottom:10px;" class="ut-option-value ut-media-access"><input type="text" value="" class="sc-quote-item form-control quote-avatar propertychange" data-group="quotegroup"><a data-limit_type="" data-uploader_button_text="Insert" data-uploader_title="Site Files" class="ut-upload-button btn btn-primary btn-sm" href="#"><i class="icon-picture icon-white"></i> Add Avatar</a></div><div class="hr"></div><div class="ut-option-field"><label>Quote: </label></div><div class="ut-option-value"><textarea name="" type="text" class="sc-quote-text form-control propertychange" data-group="quotegroup"></textarea></div><button class="btn btn-danger btn-xs remove-group-item" type="button" data-group="quotegroup"><i class="icon-trash"></i></button></div>' );
			return false;
			
		});
		
		/* quotes alt */
		$('.add-quote-alt-item').click(function(){
			
			$(this).prevAll('div').append( '<div class="sc-quotes-alt well-white"><div class="ut-option-field"><label>Author: </label></div><div class="ut-option-value"><input type="text" value="" name="" class="sc-quote-alt-item form-control quote-alt-author propertychange" data-group="quote-alt-group"></div><div class="hr"></div><div class="ut-option-field"><label>Quote: </label></div><div class="ut-option-value"><textarea name="" type="text" class="sc-quote-alt-text form-control propertychange" data-group="quote-alt-group"></textarea></div><button class="btn btn-danger btn-xs remove-group-alt-item" type="button" data-group="quote-alt-group"><i class="fa fa-trash-o"></i></button></div>' );
			return false;
			
		});
		
		/* clients */
		$('.add-client-item').click(function(){
			
			$(this).prevAll('div').append( '<div class="sc-clients well-white"><div class="ut-option-field"><label>Client Name: </label></div><div class="ut-option-value"><input type="text" value="" name="" class="sc-client-item form-control client-name propertychange" data-group="clientgroup"></div><div class="ut-option-field"><label>Client URL: </label></div><div class="ut-option-value"><input type="text" value="" name="" class="sc-client-item form-control client-url propertychange" data-group="clientgroup"></div><div class="ut-option-field"><label>Logo: </label></div><div style="margin-bottom:10px;" class="ut-option-value ut-media-access"><input type="text" value="" class="sc-client-item form-control client-logo propertychange" data-group="clientgroup"><a data-limit_type="" data-uploader_button_text="Insert" data-uploader_title="Site Files" class="ut-upload-button btn btn-primary btn-sm" href="#"><i class="fa fa-picture fa-inverse"></i> Add Logo</a></div><button class="btn btn-danger btn-xs remove-group-item" type="button" data-group="clientgroup"><i class="fa fa-trash-o"></i></button></div>' );
			return false;
			
		});
        
        /* irotator */
		$('.add-irotator-item').click(function(){
			
			$(this).prevAll('div').append( '<div class="sc-irotator well-white"><div class="ut-option-field"><label>Link: </label></div><div class="ut-option-value"><input type="text" value="" name="" class="sc-irotator-item form-control irotator-url propertychange" data-group="irotatorgroup" kl_virtual_keyboard_secure_input="on"></div><div class="ut-option-field"><label>Upload Image: </label></div><div style="margin-bottom:10px;" class="ut-option-value ut-media-access"><input type="text" value="" class="sc-irotator-item form-control irotator-logo propertychange" data-group="irotatorgroup" kl_virtual_keyboard_secure_input="on"><a data-limit_type="" data-uploader_button_text="Insert" data-uploader_title="Site Files" class="ut-upload-button btn btn-primary btn-sm" href="#"><i class="fa fa-picture fa-inverse"></i> Add Image</a></div><button class="btn btn-danger btn-xs remove-group-item" type="button" data-group="irotatorgroup"><i class="fa fa-trash-o"></i></button></div>' );
			return false;
			
		});
		
		/* social icons */
		$('.add-social-item').click(function(){
			
			$(this).prevAll('div').append( '<div class="sc-socials well-white"><div class="ut-option-field"><label>Profile Title: </label></div><div class="ut-option-value"><input type="text" value="" name="" class="sc-social-title form-control propertychange" data-group="socialgroup"></div><div class="hr"></div><div class="ut-option-field"><label>Link to Profile: </label></div><div class="ut-option-value"><input type="text" value="" name="" class="sc-social-link form-control propertychange" data-group="socialgroup"></div><div class="hr"></div><div class="ut-option-field"><label>Icon: </label></div><div class="ut-option-value"><select class="sc-social-icon" data-group="socialgroup"><option value="fa-adn">adn</option><option value="fa-android">android</option><option value="fa-apple">apple</option><option value="fa-bitbucket">bitbucket</option><option value="fa-bitcoin">bitcoin</option><option value="fa-btc">btc</option><option value="fa-css3">css3</option><option value="fa-dribbble">dribbble</option><option value="fa-dropbox">dropbox</option><option value="fa-facebook">facebook</option><option value="fa-flickr">flickr</option><option value="fa-foursquare">foursquare</option><option value="fa-github">github</option><option value="fa-gittip">gittip</option><option value="fa-google-plus">google-plus</option><option value="fa-html5">html5</option><option value="fa-instagram">instagram</option><option value="fa-linkedin">linkedin</option><option value="fa-linux">linux</option><option value="fa-maxcdn">maxcdn</option><option value="fa-pinterest">pinterest</option><option value="fa-renren">renren</option><option value="fa-skype">skype</option><option value="fa-stack-exchange">stackexchange</option><option value="fa-trello">trello</option><option value="fa-tumblr">tumblr</option><option value="fa-twitter">twitter</option><option value="fa-vk">vk</option><option value="fa-weibo">weibo</option><option value="fa-windows">windows</option><option value="fa-xing">xing</option><option value="fa-youtube">youtube</option></select></div><div class="hr"></div><div class="ut-option-field"><label>Content: </label></div><div class="ut-option-value"><textarea name="" type="text" class="sc-social-text form-control propertychange" data-group="socialgroup"></textarea></div><button class="btn btn-danger btn-xs remove-group-item" type="button" data-group="socialgroup"><i class="fa fa-trash-o"></i></button></div>' );
		return false;
			
		});

	
    	/*
		|--------------------------------------------------------------------------
		| Process Group Item
		|--------------------------------------------------------------------------
		*/
		function create_group_item( groupname ){
		   
			var code = '';
			var tabid = '1';
			
			if('tabgroup' == groupname ) {
				
				$('.sc-list-item').each(function(){
				   if( $(this).val() != '' ) {
						
						var tabcontent = $(this).parent().parent().find('.sc-list-text').val();
						
						code += ' [ut_tab title="' + $(this).val() + '" id="t' + tabid + '"] '+ tabcontent + ' [/ut_tab] '; 
						tabid++;
					}
				});
				
			}
			
			if('quotegroup' == groupname ) {
				
				$('.sc-quotes').each(function(){
				   
				   var	author 		 = $(this).find('.quote-author').val(),
						avatar 		 = $(this).find('.quote-avatar').val(),
						quotecontent = $(this).find('.sc-quote-text').val();
	
						code += ' [ut_quote author="' + author + '" avatar="' + avatar + '"] ' + quotecontent + ' [/ut_quote] '; 
										   
				});
				
			}
			
			if('quote-alt-group' == groupname ) {
				
				$('.sc-quotes-alt').each(function(){
				   
				   var	author 		 = $(this).find('.quote-alt-author').val(),
						quotecontent = $(this).find('.sc-quote-alt-text').val();
	
						code += ' [ut_quote_alt author="' + author + '"] ' + quotecontent + ' [/ut_quote_alt] '; 
										   
				});
				
			}
			
			if('clientgroup' == groupname ) {
				
				$('.sc-clients').each(function(){
				   
				   var	client 		 = $(this).find('.client-name').val(),
				   		url 		 = $(this).find('.client-url').val(),
						logo 		 = $(this).find('.client-logo').val();
	
						code += ' [ut_client url="' + url + '" name="' + client + '" logo="' + logo + '"][/ut_client] '; 
										   
				});
				
			}
            
            if('irotatorgroup' == groupname ) {
				
				$('.sc-irotator').each(function(){
				   
				   var	url 		 = $(this).find('.irotator-url').val(),
						logo 		 = $(this).find('.irotator-image').val();
	
						code += ' [ut_irotator url="' + url + '" image="' + logo + '"][/ut_irotator] '; 
										   
				});
				
			}
			
			if('socialgroup' == groupname ) {
				
				$('.sc-socials').each(function(){
				   
				   var	title		  = $(this).find('.sc-social-title').val(),
				   		url 		  = $(this).find('.sc-social-link').val(),
						icon 		  = $(this).find('.sc-social-icon').val(),
						socialcontent = $(this).find('.sc-social-text').val();
	
						code += ' [ut_social title="' + title + '" url="' + url + '" icon="' + icon + '"] ' + socialcontent + ' [/ut_social] '; 
										   
				});
				
			}
			
			if('togglegroup' == groupname ) {
				
				$('.sc-toggle-item').each(function(){
				   if( $(this).val() != '' ) {
						
						var togglecontent = $(this).parent().parent().find('.sc-toggle-text').val(),
							togglestate   = $(this).parent().parent().find('.sc-toggle-state').val();
						
						code += ' [ut_toggle title="'+$(this).val()+'" state="'+togglestate+'"] '+ togglecontent +' [/ut_toggle] '; 
						
				   }
				});
				
			}
			
			if('probars' == groupname ) {
				
				$('.sc-bar-width').each(function(){
				   
				   $this = $(this);
				   
				   if( $this.val() != '' ) {
						
						var bartext    = $this.parent().parent('.sc-bars').find('.sc-bar-text').val();                    
						var barstyle   = $this.parent().parent('.sc-bars').find('.sc-bar-style').val();
											
						code += ' [bar width="'+$this.val()+'" style="' + barstyle + '"] ' +bartext+ ' [/bar] '; 
						
				   }
				   
				});
				
			}
			
			$('#shortcode-preview-m').html( code );
			
		}
    
		
		
		/*
		|--------------------------------------------------------------------------
		| Shortcode Preview
		|--------------------------------------------------------------------------
		*/
		function preview_shortcode( add ){
		
			name = $('#ut-shortcodes').val();
			add  = add||'';        
			if(( name=='num' || name=='h' ) && add=='') add='1';
	
			var code = ' ['+name;
			if( $('#options-'+name).attr('data-type')=='c' ){
				if( $('#options-'+name+' input.lastcolumn').is(':checked') )
				add = '_last';
			}
			code += add;
			
			$('#options-'+name+' input.attr').each(function(){
				
				$this = $(this);
	
				switch( $this.attr('type') ){
				
				case 'text':
					if( $this.val() )
					code += ' '+$this.attr('data-attrname')+'="'+$this.val()+'"';
					break;
					
				case 'radio':
				case 'checkbox':
					if( $this.is(':checked') )
					code += ' '+$this.attr('data-attrname')+'="'+$this.parent().data("value")+'"';
					break;
				}
				
			});
			
			$('#options-'+name+' select.sc-select-control').each(function(){
				
				$this = $(this);
				
				if( $this.val() ) {
					code += ' '+$this.attr('data-attrname')+'="'+$this.val()+'"';
				}
				
			});
			
			code += '] ';
	
			datatype = $('#options-'+name).attr('data-type');
			
			if( datatype=='s' ){
				$('#shortcode-preview-m').html( '' );
			} else {
				if( datatype!='m' )
				$('#shortcode-preview-m').text(  $('#sc-content textarea').val() );
			}
			
			$('#shortcode-preview-o').html( code );
			
			if( $('#options-'+name).attr('data-type') != 's' ) {
				$('#shortcode-preview-c').html( ' [/'+name+add+'] ' );
			} else {
				$('#shortcode-preview-c').html( '' );
			}
		}		
    
	});

})(jQuery);
 /* ]]> */	
</script>



</head>
    <body>
    
        <div id="ut-scgenerator-dialog" class="ut-admin">
        	
            <header>
                <h2><span><i class="icon-cogs"></i> <?php _e('Shortcode Generator', 'ut_shortcodes' ); ?></span></h2>
            </header>
            
			<?php echo ut_generate_sc_select(); ?>
            <?php echo ut_generate_sc_box(); ?>
            
            <div class="shortcode-content">
				
                <h4 class="sc-clabel" id="clabel" for="sc-content"><?php _e('Content' , 'ut_shortcodes'); ?></h4>
                
                <div id="sc-content" class="well">
                
                    <textarea class="form-control"></textarea>
                	                    
                </div>
                
				<h4 class="sc-preview"><?php _e('Shortcode Preview:', 'ut_shortcodes' ); ?></h4>
                
				<div class="well">
                
                    <code class="shortcode_prev">
                        <span id="shortcode-preview-o" style=""><?php _e('Select a Shortcode above' , 'ut_shortcodes' ); ?></span>
                        <span id="shortcode-preview-m"></span>
                        <span id="shortcode-preview-c" style=""></span>
                    </code>
                
                </div>
                
            </div>
            
            <p><a class="btn btn-primary btn-sm btn-block" id="insert-shortcode"><?php _e('Insert Shortcode', 'ut_shortcodes' ); ?></a></p>
            
        </div>
    	
        <div class="ut-modal">
        	<div class="ut-modal-box ut-admin">
            	
                <div class="ut-modal-header">
                	<div class="inner">
                    	<h2><?php _e( 'Choose Icon' , 'ut_shortcodes' ); ?></h2>
                    </div>
                </div>
                
                <div class="ut-modal-body">
                	<div class="inner">
                        <ul class="ut-glyphicons">
                        
                        <?php foreach( ut_recognized_icons() as $key => $icon) {
                                                
                            $icondisplay = ($icon == 'icon-noicon') ? 'no icon' : '<i class="fa '.$icon.'"></i>';
                            
                            echo '<li><span data-icon="'.$icon.'" class="ut-glyphicon">'.$icondisplay.'</span></li>';
                        
                        } ?>
                        
                        </ul>
                    </div>
                </div>
                
                <div class="ut-modal-footer">
                	<div class="inner">
                    	<a href="#" class="close-ut-modal"><?php _e( 'Close' , 'ut_shortcodes' ); ?></a>
                    </div>
                </div>
                
            </div>
        </div>
        
    </body>
</html>