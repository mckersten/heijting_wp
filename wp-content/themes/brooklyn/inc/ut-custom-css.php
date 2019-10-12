<?php

/*
 * Custom CSS from Option Panel
 * by www.unitedthemes.com
 */


/*
|--------------------------------------------------------------------------
| Custom CSS Minifier
|--------------------------------------------------------------------------
*/

add_filter( 'ut-custom-css' , 'ut_minify_css' );

if ( !function_exists( 'ut_minify_css' ) ) {
    
    function ut_minify_css($buffer) { 
        
        $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
        $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
        return $buffer;
        
    }
    
}


/*
|--------------------------------------------------------------------------
| Changes HEX to RGB
|--------------------------------------------------------------------------
*/
if( !function_exists('ut_hex_to_rgb') ) :

	function ut_hex_to_rgb($hex) {
		
		if( empty($hex) ) {
			return;
		}
				
		$hex = preg_replace("/#/", "", $hex);
		$color = array();
	 
		if(strlen($hex) == 3) {
			$color['r'] = hexdec(substr($hex, 0, 1) . $r);
			$color['g'] = hexdec(substr($hex, 1, 1) . $g);
			$color['b'] = hexdec(substr($hex, 2, 1) . $b);
		}
		else if(strlen($hex) == 6) {
			$color['r'] = hexdec(substr($hex, 0, 2));
			$color['g'] = hexdec(substr($hex, 2, 2));
			$color['b'] = hexdec(substr($hex, 4, 2));
		}
		
		$color = implode(',', $color);
		
		return $color;
	}

endif;


/*
|--------------------------------------------------------------------------
| Create Section Headline Style
|--------------------------------------------------------------------------
*/
if( !function_exists('create_section_headline_style') ) :

	function create_section_headline_style( $div = '',  $style = 'pt-style-1' , $color = '' ) {
		
		if( empty($div) || empty($color) ) {
			
			// nothing to do here, let's leave
			return;
			
		}
				
		switch ( $style ) {
			
			case 'pt-style-1':
				return;
			break;
			
			case 'pt-style-2':
				
				return '
				'.$div.' .pt-style-2 .page-title:after, 
				'.$div.' .pt-style-2 .parallax-title:after, 
				'.$div.' .pt-style-2 .section-title:after {
					background-color: ' . $color . ';
				}';
				
			break;
			
			case 'pt-style-3':
				
				return '
					'.$div.' .pt-style-3 .page-title span, 
					'.$div.' .pt-style-3 .parallax-title span, 
					'.$div.' .pt-style-3 .section-title span { 
						background:' . $color . ';			
						-webkit-box-shadow:0 0 0 3px' . $color . '; 
						-moz-box-shadow:0 0 0 3px' . $color . '; 
						box-shadow:0 0 0 3px' . $color . '; 
					}
				';				
				
			break;
			
			case 'pt-style-4':
				
				return '
				'.$div.' .pt-style-4 .page-title span, 
				'.$div.' .pt-style-4 .parallax-title span, 
				'.$div.' .pt-style-4 .section-title span {
					border:3px solid ' . $color . ';
				}';
				
			break;
			
			case 'pt-style-5':
				
				return '
				'.$div.' .pt-style-5 .page-title span, 
				'.$div.' .pt-style-5 .parallax-title span, 
				'.$div.' .pt-style-5 .section-title span {
					background:' . $color . ';			
					-webkit-box-shadow:0 0 0 3px' . $color . '; 
					-moz-box-shadow:0 0 0 3px' . $color . '; 
					box-shadow:0 0 0 3px' . $color . '; 
				}';
				
			break;
			
			
			case 'pt-style-6':
				
				return '
				'.$div.' .pt-style-6 .page-title:after, 
				'.$div.' .pt-style-6 .parallax-title:after, 
				'.$div.' .pt-style-6 .section-title:after {
					border-bottom: 1px dotted ' . $color . ';
				}';
			
			break;
			
			
		}
		
	}

endif;


/*
|--------------------------------------------------------------------------
| Create Custom Background
|--------------------------------------------------------------------------
*/

if ( !function_exists( 'ut_create_css_background' ) ) {
    
    function ut_create_css_background( $object , $background_settings ) { 
		
		/* no settings array or html object = leave here */	
		if( !is_array($background_settings) || empty($object) ) {
			return NULL;
		}
		
		$css = $object . '{';
		
		$key_exceptions = array( 'background-color' , 'background-image' , 'background-size' );
		
		foreach( $background_settings as $key => $value) {
			
			
			if( in_array( $key , $key_exceptions ) ) {
				
				switch( $key ) {
					
					case 'background-color' : $css .= 'background: '.$value.';';
					break;
					
					case 'background-image' : $css .= $key . ':' . 'url("'.$value.'");';
					break;
					
					case 'background-size' : $css .= $key . ':' . $value . ' !important;';
					
				}
				
			} else {
				
				$css .= $key . ':' . $value . ' !important;';
				
			}
			
		}
		
		$css .= '}';
		
		return $css;
			        
    }
    
}

/*
|--------------------------------------------------------------------------
| Create Global Headline Style ( Fallback Function )
|--------------------------------------------------------------------------
*/
if ( !function_exists( 'ut_create_global_headline_font_style' ) ) {

	function ut_create_global_headline_font_style( $object = '', $font_style = '' ) {
		
		if( empty($object) ) {
			return;
		}
	
		$font = NULL;
		$google_fonts = ut_recognized_google_fonts();
		$ut_recognized_font_styles = ut_recognized_font_styles();
		
        $font_styles = array(
			'regular' => 'normal',
			'normal'  => 'normal',
			'italic'  => 'italic'
		);
        
		if( !empty( $font_style ) && $font_style != 'global' ) {
		
			return $object . '{ font-family: ' . $ut_recognized_font_styles[$font_style] . ', "Helvetica Neue", Helvetica, Arial, sans-serif; }'. "\n";
		
		} else {
			
			if( ot_get_option('ut_global_headline_font_type' , 'ut-font') == 'ut-google' ) {
			
				$ut_global_google_headline_font_style = ot_get_option('ut_global_google_headline_font_style');				
				
				if( !empty($google_fonts[$ut_global_google_headline_font_style['font-id']]['family']) ) {
				
					$font .= $object . ' {';
						
						$font .= 'font-family:'.$google_fonts[$ut_global_google_headline_font_style['font-id']]['family'].', "Helvetica Neue", Helvetica, Arial, sans-serif;';					
						
						if( !empty($ut_global_google_headline_font_style['font-weight']) ) {
							$font .= ' font-weight: ' . $ut_global_google_headline_font_style['font-weight'] . ';';	
						}
						
						if( !empty($ut_global_google_headline_font_style['font-size']) ) {
							$font .= ' font-size: ' . $ut_global_google_headline_font_style['font-size'] . ';';	
						}
						
						if( !empty($ut_global_google_headline_font_style['font-style']) && isset($font_styles[$ut_global_google_headline_font_style['font-style']]) ) {
                            $font .= ' font-style: ' . $font_styles[$ut_global_google_headline_font_style['font-style']] . ';';	
						}
						
						if( !empty($ut_global_google_headline_font_style['line-height']) ) {
							$font .= ' line-height: ' . $ut_global_google_headline_font_style['line-height'] . ';';	
						}
						
						if( !empty($ut_global_google_headline_font_style['text-transform']) ) {
							$font .= ' text-transform: ' . $ut_global_google_headline_font_style['text-transform'] . ';';	
						}
						
					$font .= '}';
					
					return $font;
				
				} else {
					
					/* fallback if user has not chosen a google font yet */
					$font_style = ot_get_option('ut_global_headline_font_style' , 'semibold');
					return $object . '{ font-family: ' . $ut_recognized_font_styles[$font_style] . ', "Helvetica Neue", Helvetica, Arial, sans-serif; }'. "\n";
					
				}
				
			
			} else {
			
				$font_style = ot_get_option('ut_global_headline_font_style' , 'semibold');
				return $object . '{ font-family: ' . $ut_recognized_font_styles[$font_style] . ', "Helvetica Neue", Helvetica, Arial, sans-serif; }'. "\n";
			
			}
			
		}
		
	}

}

/*
|--------------------------------------------------------------------------
| Start Custom CSS
|--------------------------------------------------------------------------
*/
if ( !function_exists( 'unitedthemes_custom_css' ) ) {

	function unitedthemes_custom_css() {
        
		global $detect;
		
		/* some needed variables first */
        $accentcolor 	= get_option('ut_accentcolor' , '#F1C40F');
		$sitelogo 		= get_theme_mod( 'ut_site_logo' );
		$google_fonts 	= ut_recognized_google_fonts();
		$ut_recognized_font_styles = ut_recognized_font_styles();
		$font_styles = array(
			'regular' => 'normal',
			'normal'  => 'normal',
			'italic'  => 'italic'
		);
		
		/* styleswitcher */
		if( !empty( $_GET['color'] ) ) {
			$accentcolor = '#'.$_GET['color'];
		}
		
        /* start css */
        $css  = '<style type="text/css">'. "\n";
            
			/* sidebar align */
			if( is_single() || is_home() ) {
				
				$contentalign = ot_get_option('ut_sidebar_align' , 'right') == 'right' ? 'left' : 'right';
				$css .= '#primary { float: ' . $contentalign . '}';
				
			}
			
			/* linkcolor elements */	      			
			$css .= '::-moz-selection  { background: ' . $accentcolor . '; }' . "\n";
			$css .= '::selection { background:' . $accentcolor . '; }' . "\n" ;
			$css .= 'a, .ha-transparent #navigation ul li a:hover { color: ' . $accentcolor . '; }' . "\n";
			$css .= '.ut-language-selector a:hover { color: ' . $accentcolor . '; }' . "\n";
			$css .= '.ut-custom-icon-link:hover i { color: ' . $accentcolor . ' !important; }' . "\n";	
			$css .= '.ut-hide-member-details:hover, #ut-blog-navigation a:hover, .light .ut-hide-member-details, .ut-mm-button:hover:before, .ut-mm-trigger.active .ut-mm-button:before, .ut-mobile-menu a:after { color: ' . $accentcolor . '; }'. "\n";			
			$css .= 'p.lead span, .entry-title span, #cancel-comment-reply-link, .member-description-style-3 .ut-member-title,  .ut-twitter-rotator h2 a, .themecolor  { color: ' . $accentcolor . '; }'. "\n";			
			$css .= '.icons-ul i, .comments-title span, .member-social a:hover, .ut-parallax-quote-title span, .ut-member-style-2 .member-description .ut-member-title { color:' . $accentcolor . '; }'. "\n";		
			$css .= '.about-icon, .ut-skill-overlay, .ut-dropcap-one, .ut-dropcap-two, .ut-mobile-menu a:hover, .themecolor-bg, .ut-btn.ut-pt-btn:hover, .ut-btn.dark:hover { background:' . $accentcolor . '; }'. "\n";
			$css .= 'blockquote, div.wpcf7-validation-errors, .ut-hero-style-5 .hero-description, #navigation ul.sub-menu, .ut-member-style-3 .member-social a:hover { border-color:' . $accentcolor . '; }'. "\n";
			$css .= '.cta-section, .ut-btn.theme-btn, .ut-social-link:hover .ut-social-icon, .ut-member-style-2 .ut-so-link:hover { background:' . $accentcolor . ' !important; }'. "\n";
			$css .= '.ut-social-title, .ut-service-column h3 span, .ut-rq-icon  { color:' . $accentcolor . '; }'. "\n";
			$css .= '.count, .ut-icon-list i { color:' . $accentcolor . '; }'. "\n";
			$css .= '.client-section, .ut-portfolio-pagination.style_two a.selected:hover, .ut-portfolio-pagination.style_two a.selected, .ut-portfolio-pagination.style_two a:hover, .ut-pt-featured { background:' . $accentcolor . ' !important; }'. "\n";
			$css .= 'ins, mark, .ut-alert.themecolor, .ut-portfolio-menu.style_two li a:hover, .ut-portfolio-menu.style_two li a.selected { background:' . $accentcolor . '; }'. "\n";
			$css .= '.footer-content i { color:' . $accentcolor . '; }'. "\n";
			$css .= '.copyright a:hover, .footer-content a:hover, .toTop:hover, .ut-footer-dark a.toTop:hover, .hero-title span { color:' . $accentcolor . '; }'. "\n";
			$css .= 'blockquote span { color:' . $accentcolor . '; }'. "\n";
			$css .= '.entry-meta a:hover, #secondary a:hover, .page-template-templatestemplate-archive-php a:hover { color:' . $accentcolor . '; }'. "\n";
			$css .= 'h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, .ut-header-dark .site-logo .logo a:hover { color:' . $accentcolor . '; }'. "\n";	
			$css .= 'a.more-link:hover, .fa-ul li .fa  { color:' . $accentcolor . '; }'. "\n";	
			$css .= '.ut-pt-featured-table .ut-pt-info .fa-li  { color: ' . $accentcolor . ' !important; }' . "\n";			
			$css .= '.button, input[type="submit"], input[type="button"], .dark button, .dark input[type="submit"], .dark input[type="button"], .light .button, .light input[type="submit"], .light input[type="button"] { background:' . $accentcolor . '; }'. "\n";
			$css .= '.img-hover { background:rgb(' . ut_hex_to_rgb($accentcolor) . ');	background:rgba(' . ut_hex_to_rgb($accentcolor) . ', 0.85); }'. "\n";
			$css .= '.portfolio-caption { background:rgb(' . ut_hex_to_rgb($accentcolor) . ');	background:rgba(' . ut_hex_to_rgb($accentcolor) . ', 0.85); }'. "\n";
			$css .= '.team-member-details { background:rgba(' . ut_hex_to_rgb($accentcolor) . ', 0.85 ); }'. "\n";
			$css .= '.ut-avatar-overlay { background:rgb(' . ut_hex_to_rgb($accentcolor) . '); background:rgba(' . ut_hex_to_rgb($accentcolor) . ', 0.85 ); }'. "\n";
			$css .= '.mejs-controls .mejs-time-rail .mejs-time-current, .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current, .format-link .entry-header a { background:' . $accentcolor . ' !important; }'. "\n";
			
			$css .= '.light .ut-portfolio-menu li a:hover, .light .ut-portfolio-pagination a:hover, .light .ut-nav-tabs li a:hover, .light .ut-accordion-heading a:hover { border-color:' . $accentcolor . ' !important; }'. "\n";
			$css .= '.light .ut-portfolio-menu li a:hover, .light .ut-portfolio-pagination a:hover, .ut-portfolio-list li strong, .light .ut-nav-tabs li a:hover, .light .ut-accordion-heading a:hover, .ut-custom-icon a:hover i:first-child { color:' . $accentcolor . ' !important; }'. "\n";
			
			$css .= '.ut-portfolio-gallery-slider .flex-direction-nav a, .ut-gallery-slider .flex-direction-nav a, .ut-rotate-quote-alt .flex-direction-nav a, .ut-rotate-quote .flex-direction-nav a  { background:rgb(' . ut_hex_to_rgb($accentcolor) . ');	background:rgba(' . ut_hex_to_rgb($accentcolor) . ', 0.85); }'. "\n";
			
			$css .= '.light .ut-bs-wrap .entry-title a:hover, .light .ut-bs-wrap a:hover .entry-title  { color: ' . $accentcolor . '; }'. "\n";	
            
            $css .= '.ut-rated i { color: ' . $accentcolor . '; }'. "\n";
            $css .= '.ut-footer-area ul.sidebar a:hover { color: ' . $accentcolor . '; }'. "\n";  
            $css .= '.ut-footer-dark .ut-footer-area .widget_tag_cloud a:hover { color: ' . $accentcolor . '!important; }'. "\n";
            $css .= '.ut-footer-dark .ut-footer-area .widget_tag_cloud a:hover { border-color: ' . $accentcolor . '; }'. "\n";
            $css .= '.elastislide-wrapper nav span:hover { border-color: ' . $accentcolor . '; }'. "\n";
            $css .= '.elastislide-wrapper nav span:hover { color: ' . $accentcolor . '; }'. "\n";
            
            $css .= '.ut-footer-so li a:hover { border-color: ' . $accentcolor . '; }'. "\n";
            $css .= '.ut-footer-so li a:hover i { color: ' . $accentcolor . '!important; }'. "\n";
            
            
          
			
			/* section animation */
			if( !$detect->isMobile() && !$detect->isTablet() && ot_get_option('ut_animate_sections' , 'on') == 'on' ) :
			
					$css .= '
					.js #main-content section .section-content,
					.js #main-content section .section-header-holder {
						opacity:0;
					}';
					
			endif;
			
			/* main navigation font weight */
			if(  ot_get_option('ut_navigation_font_weight' , 'normal') == 'bold' ) {
			
				$css .= '#navigation { font-family: "ralewaysemibold", Helvetica, Arial, sans-serif !important; }';
				
			}
			
            /* custom colors for first level color */
            if( ot_get_option('ut_navigation_level_one_color') ) {
                $css .= '#navigation ul li a { color: ' . ot_get_option('ut_navigation_level_one_color') . ' }';
            }
            
            /* custom colors for first level dot color */
            if( ot_get_option('ut_navigation_level_one_icon_color') ) {
                $css .= '#navigation ul li a:after { color: ' . ot_get_option('ut_navigation_level_one_icon_color') . ' }';
            }
            
			/* main navigation light */
			$css .= '#navigation li a:hover { color:' . $accentcolor . '; }'. "\n";
			
			/* main navigation parents and ancestor */
			$css .= '#navigation .selected, 
					 #navigation ul li.current_page_parent a.active,
					 #navigation ul li.current-menu-ancestor a.active { color: ' . $accentcolor . '; }'. "\n";
					 	
			$css .= '#navigation ul li a:hover, 
					 #navigation ul.sub-menu li a:hover { color: ' . $accentcolor . '; }'. "\n";	  
			
			/* main navigation current page */
			$css .= '#navigation ul.sub-menu li > a { color: #999999; }';
			
			$css .= '#navigation ul li.current-menu-item:not(.current_page_parent) a,
					 #navigation ul li.current_page_item:not(.current_page_parent) a { color: ' . $accentcolor . '; }';
			
			$css .= '#navigation ul li.current-menu-item:not(.current_page_parent) .sub-menu li a { color: #999999; }';
			
			
			/* main navigation dark */
			$css .= '.ut-header-dark #navigation li a:hover { color:' . $accentcolor . '; }'. "\n";
			
			/* main navigation parents and ancestor */
			$css .= '.ut-header-dark #navigation .selected, 
					 .ut-header-dark #navigation ul li.current_page_parent a.active,
					 .ut-header-dark #navigation ul li.current-menu-ancestor a.active { color: ' . $accentcolor . '; }'. "\n";
					 	
			$css .= '.ut-header-dark #navigation ul li a:hover, 
					 .ut-header-dark #navigation ul.sub-menu li a:hover { color: ' . $accentcolor . '; }'. "\n";	  
			
			/* main navigation current page */
			$css .= '.ut-header-dark #navigation ul.sub-menu li > a { color: #999999; }';
			
			$css .= '.ut-header-dark #navigation ul li.current-menu-item:not(.current_page_parent) a,
					 .ut-header-dark #navigation ul li.current_page_item:not(.current_page_parent) a { color: ' . $accentcolor . '; }';
			
			$css .= '.ut-header-dark #navigation ul li.current-menu-item:not(.current_page_parent) .sub-menu li a { color: #999999; }';
			
			
			/* preloader */
			if( ot_get_option('ut_use_image_loader') == 'on' ) {			
				
				$css .= '.ut-loader-overlay { background: '.ot_get_option('ut_image_loader_background' , '#FFF').'}'. "\n";				
		
			}
			
			/* body font style */
			if( ot_get_option('ut_body_font_type' , 'ut-font') == 'ut-google' ) {
				
				$ut_google_body_font_style = ot_get_option('ut_google_body_font_style');
				
				if( !empty($google_fonts[$ut_google_body_font_style['font-id']]['family']) ) {
				
					$css .= 'body {';
						/* familiy */
						$css .= 'font-family:'.$google_fonts[$ut_google_body_font_style['font-id']]['family'].', "Helvetica Neue", Helvetica, Arial, sans-serif !important;';					
						
						if( !empty($ut_google_body_font_style['font-weight']) ) {
							$css .= ' font-weight: ' . $ut_google_body_font_style['font-weight'] . ';';	
						}
						
						if( !empty($ut_google_body_font_style['font-size']) ) {
							$css .= ' font-size: ' . $ut_google_body_font_style['font-size'] . ';';	
						}
						
						if( !empty($ut_google_body_font_style['font-style']) && isset($font_styles[$ut_google_body_font_style['font-style']]) ) {
							$css .= ' font-style: ' . $font_styles[$ut_google_body_font_style['font-style']] . ';';	
						}
						
						if( !empty($ut_google_body_font_style['line-height']) ) {
							$css .= ' line-height: ' . $ut_google_body_font_style['line-height'] . ';';	
						}
						
						if( !empty($ut_google_body_font_style['text-transform']) ) {
							$css .= ' text-transform: ' . $ut_google_body_font_style['text-transform'] . ';';	
						}
						
					$css .= '}';
				
				} else {
					
					/* fallback if user has not chosen a google font yet */
					$ut_body_font_style = ot_get_option('ut_body_font_style' , 'regular');
					$css .= 'body { font-family: ' . $ut_recognized_font_styles[$ut_body_font_style] . ', "Helvetica Neue", Helvetica, Arial, sans-serif; }'. "\n";
					
				}
				
			} else {
				
				/* out for theme font */
				$ut_body_font_style = ot_get_option('ut_body_font_style' , 'regular');
				$css .= 'body { font-family: ' . $ut_recognized_font_styles[$ut_body_font_style] . ', "Helvetica Neue", Helvetica, Arial, sans-serif; }'. "\n";
							
			}
			
			
			/* global headline font style */
			$headlines = array("h1","h2","h3","h4","h5","h6");
			
			foreach( $headlines as $headline ) {
				
				if( ot_get_option('ut_global_'.$headline.'_font_type' , 'ut-font') == 'ut-google' ) {
					
					$headline_style = ot_get_option('ut_'.$headline.'_google_font_style');
					
					if( !empty($google_fonts[$headline_style['font-id']]['family']) ) {
						
						$css .= $headline . ' {';
						
							/* familiy */
							$css .= 'font-family:'.$google_fonts[$headline_style['font-id']]['family'].', "Helvetica Neue", Helvetica, Arial, sans-serif;';					
						
						if( !empty($$headline_style['font-weight']) ) {
							$css .= ' font-weight: ' . $headline_style['font-weight'] . ';';	
						}
						
						if( !empty($headline_style['font-size']) ) {
							$css .= ' font-size: ' . $headline_style['font-size'] . ';';	
						}
						
						if( !empty($headline_style['font-style']) ) {
							$css .= ' font-style: ' . $font_styles[$headline_style['font-style']] . ';';	
						}
						
						if( !empty($headline_style['line-height']) ) {
							$css .= ' line-height: ' . $headline_style['line-height'] . ';';	
						}
						
						if( !empty($headline_style['text-transform']) ) {
							$css .= ' text-transform: ' . $headline_style['text-transform'] . ';';	
						}
						
						$css .= '}';
						
						
					} else {
						
						/* fallback if user has not chosen a google font yet */
						$headline_style = ot_get_option('ut_'.$headline.'_font_style' , 'semibold');
						$css .= $headline . ' { font-family: ' . $ut_recognized_font_styles[$headline_style] . ', "Helvetica Neue", Helvetica, Arial, sans-serif; }'. "\n";
						
					}
					
				
				} else {
					
					/* output for theme font */
					$headline_style = ot_get_option('ut_'.$headline.'_font_style' , 'semibold');
					$css .= $headline . ' { font-family: ' . $ut_recognized_font_styles[$headline_style] . ', "Helvetica Neue", Helvetica, Arial, sans-serif; }'. "\n";
				
				}
				
			}
						
			/* headlines for single pages */
			if( is_page() || is_singular('portfolio') ) {
				
				$ut_h1_font_style = get_post_meta( get_the_ID() , 'ut_section_header_font_style' , true );
				$css .= ut_create_global_headline_font_style('.page-title' , $ut_h1_font_style );
				
				$ut_section_header_style = get_post_meta( get_the_ID() , 'ut_section_header_style', true );
				$ut_section_header_style = ( !empty($ut_section_header_style) && $ut_section_header_style != 'global' ) ? $ut_section_header_style : ot_get_option('ut_global_headline_style');
				
				$ut_section_title_color = get_post_meta( get_the_ID() , 'ut_section_title_color' , true); 
				
				/* pt style 3 needs a fallback */
				if( empty($ut_section_title_color) && $ut_section_header_style == 'pt-style-3') {
					$ut_section_title_color = $accentcolor;
				}
				
				if( !empty($ut_section_title_color) ) {	
					
					$css.= create_section_headline_style( '.page-id-'.get_the_ID() , $ut_section_header_style , $ut_section_title_color );
					
				}
                
			}
			
			/* front page hero header styling */
			$ut_front_expertise_slogan_color = ot_get_option('ut_front_expertise_slogan_color');
			$ut_front_company_slogan_color = ot_get_option('ut_front_company_slogan_color');
			
			
			if( !empty( $ut_front_expertise_slogan_color ) && is_front_page() ) {
				
				$css.='.hero-description { color: ' . $ut_front_expertise_slogan_color . '}'. "\n";
				
			}
			
			if( !empty( $ut_front_company_slogan_color ) && is_front_page() ) {
				
				$css.='.hero-title { color: ' . $ut_front_company_slogan_color . ' }'. "\n";
				
			}
			
			
			/* header hero font style for front and blog */
			if( is_front_page() || is_singular('portfolio') ) {				
				
				if( ot_get_option('ut_front_hero_font_type' , 'ut-font') == 'ut-google' ) {
				
					$ut_google_front_page_hero_font_style = ot_get_option('ut_google_front_page_hero_font_style');
					
					if( !empty($google_fonts[$ut_google_front_page_hero_font_style['font-id']]['family']) ) {
					    
                        /* design exception for hero */
                        $ut_hero_style = ot_get_option('ut_front_page_hero_style' , 'ut-hero-style-1');
                        if( $ut_hero_style == 'ut-hero-style-11') {
                            $css.= '#ut-hero .hdh .hero-description,';
                        }
                        
						$css .= '.hero-title {';
							
							/* familiy */
							$css .= 'font-family:'.$google_fonts[$ut_google_front_page_hero_font_style['font-id']]['family'].', "Helvetica Neue", Helvetica, Arial, sans-serif;';					
							
							if( !empty($ut_google_front_page_hero_font_style['font-weight']) ) {
								$css .= ' font-weight: ' . $ut_google_front_page_hero_font_style['font-weight'] . ';';	
							}
							
							if( !empty($ut_google_front_page_hero_font_style['font-size']) ) {
								$css .= ' font-size: ' . $ut_google_front_page_hero_font_style['font-size'] . ';';	
							}
							
							if( !empty($ut_google_front_page_hero_font_style['font-style']) ) {
								$css .= ' font-style: ' . $font_styles[$ut_google_front_page_hero_font_style['font-style']] . ';';	
							}
							
							if( !empty($ut_google_front_page_hero_font_style['line-height']) ) {
								$css .= ' line-height: ' . $ut_google_front_page_hero_font_style['line-height'] . ';';	
							}
							
							if( !empty($ut_google_front_page_hero_font_style['text-transform']) ) {
								$css .= ' text-transform: ' . $ut_google_front_page_hero_font_style['text-transform'] . ';';	
							}
							
						$css .= '}';
					
					} else {
						
						/* fallback if user has not chosen a google font yet */
						$ut_header_hero_font_style = ot_get_option('ut_front_page_hero_font_style' , 'semibold');
						
                        /* design exception for hero */
                        $ut_hero_style = ot_get_option('ut_front_page_hero_style' , 'ut-hero-style-1');
                        if( $ut_hero_style == 'ut-hero-style-11') {
                            $css.= '#ut-hero .hdh .hero-description,';
                        }                        
                        
                        $css .= '.hero-title { font-family: ' . $ut_recognized_font_styles[$ut_header_hero_font_style] . ', "Helvetica Neue", Helvetica, Arial, sans-serif; }'. "\n";
						
					}
					
				} else {
					
					/* out for theme font */
					$ut_header_hero_font_style = ot_get_option('ut_front_page_hero_font_style' , 'semibold');
					
                    /* design exception for hero */
                    $ut_hero_style = ot_get_option('ut_front_page_hero_style' , 'ut-hero-style-1');
                    if( $ut_hero_style == 'ut-hero-style-11') {
                        $css.= '#ut-hero .hdh .hero-description,';
                    }
                    
                    $css .= '.hero-title { font-family: ' . $ut_recognized_font_styles[$ut_header_hero_font_style] . ', "Helvetica Neue", Helvetica, Arial, sans-serif; }'. "\n";
								
				}

				
			}
			
			if( is_home() ) {
				
				if( ot_get_option('ut_blog_hero_font_type' , 'ut-font') == 'ut-google' ) {
			
					$ut_google_blog_hero_font_style = ot_get_option('ut_google_blog_hero_font_style');
					
					if( !empty($google_fonts[$ut_google_blog_hero_font_style['font-id']]['family']) ) {
					    
                        /* design exception for hero */
                        $ut_hero_style = ot_get_option('ut_blog_hero_style' , 'ut-hero-style-1');
                        if( $ut_hero_style == 'ut-hero-style-11') {
                            $css.= '#ut-hero .hdh .hero-description,';
                        }
                        
						$css .= '.hero-title {';
							/* familiy */
							$css .= 'font-family:'.$google_fonts[$ut_google_blog_hero_font_style['font-id']]['family'].', "Helvetica Neue", Helvetica, Arial, sans-serif;';					
							
							if( !empty($ut_google_blog_hero_font_style['font-weight']) ) {
								$css .= ' font-weight: ' . $ut_google_blog_hero_font_style['font-weight'] . ';';	
							}
							
							if( !empty($ut_google_blog_hero_font_style['font-size']) ) {
								$css .= ' font-size: ' . $ut_google_blog_hero_font_style['font-size'] . ';';	
							}
							
							if( !empty($ut_google_blog_hero_font_style['font-style']) ) {
								$css .= ' font-style: ' . $font_styles[$ut_google_blog_hero_font_style['font-style']] . ';';	
							}
							
							if( !empty($ut_google_blog_hero_font_style['line-height']) ) {
								$css .= ' font-style: ' . $ut_google_blog_hero_font_style['line-height'] . ';';	
							}
							
							if( !empty($ut_google_blog_hero_font_style['text-transform']) ) {
								$css .= ' text-transform: ' . $ut_google_blog_hero_font_style['text-transform'] . ';';	
							}
							
						$css .= '}';
					
					} else {
						
						/* fallback if user has not chosen a google font yet */
						$ut_header_hero_font_style = ot_get_option('ut_blog_hero_font_style' , 'semibold');	
						$css .= '.hero-title { font-family: ' . $ut_recognized_font_styles[$ut_header_hero_font_style] . ', "Helvetica Neue", Helvetica, Arial, sans-serif; }'. "\n";
						
					}
					
				} else {
					
					/* out for theme font */
					$ut_header_hero_font_style = ot_get_option('ut_blog_hero_font_style' , 'semibold');	
					$css .= '.hero-title { font-family: ' . $ut_recognized_font_styles[$ut_header_hero_font_style] . ', "Helvetica Neue", Helvetica, Arial, sans-serif; }'. "\n";
								
				}

			}
			
			/* tabs headline font style for front and blog */
			if( is_front_page() ) {
				$ut_front_page_tabs_headline_style = ot_get_option('ut_front_page_tabs_headline_style' , 'semibold');
				$css .= ut_create_global_headline_font_style('.ut-tablets-title' , $ut_front_page_tabs_headline_style);
			}
			
			if( is_home() ) {
				$ut_blog_tabs_headline_style = ot_get_option('ut_blog_tabs_headline_style' , 'semibold');	
				$css .= ut_create_global_headline_font_style('.ut-tablets-title' , $ut_blog_tabs_headline_style);
			}
			
			
			/* hero header background image for tablet slider */
			if( ( is_front_page() && ot_get_option('ut_front_page_header_type') == 'tabs' ) || ( is_home() && ot_get_option('ut_blog_header_type') == 'tabs' ) ) {
				
				/* hero type tabs uses a different header image */			
				$css .= ut_create_css_background( '.hero' , ot_get_option('ut_front_header_image' , false , true ));
				
			}
			
			/* hero header background image for image hero */
			if( ( is_front_page() && ot_get_option('ut_front_page_header_type') == 'image') || ( is_home() && ot_get_option('ut_blog_header_type') == 'image' ) ) {
				
				if( is_front_page() ) { 
					$header_image = ot_get_option('ut_front_header_image');
				}
				
				if( is_home() ) { 
					$header_image = ot_get_option('ut_blog_header_image');
				}				
				
				if( is_array($header_image) && !empty( $header_image['background-image'] ) ) {
				    
                    /*no background if rain effect is active */
					$css .= ut_create_css_background( '.hero' , $header_image );
                    
				} elseif( !empty($header_image) && !is_array($header_image) ) {
					
					/* fallback to version 1.0 */
					$css .= '.hero { background-image: url(' . esc_url( $header_image ) . '); }'. "\n";
				
				}				
			
			}
			
			/* hero header background image for image hero */
			if( ( is_front_page() && ot_get_option('ut_front_page_header_type') == 'animatedimage') || ( is_home() && ot_get_option('ut_blog_header_type') == 'animatedimage' ) ) {
				
				if( is_front_page() ) { 
					$header_image = ot_get_option('ut_front_header_animatedimage');
				}
				
				if( is_home() ) { 
					$header_image = ot_get_option('ut_blog_header_animatedimage');
				}				
				
				/* get image ID by url*/
				$imageID = ut_get_image_id( $header_image );
				
				/* grab image imnformation */					
				$imageinfo = wp_get_attachment_image_src( $imageID , 'full' );					
									
				/* background */
				$css .= '.hero { 
						background-position: 0px 0px;
						background-repeat: repeat-x;
						background-image: url(' . esc_url( $header_image ) . '); 
						-webkit-animation: animatedBackground 60s linear infinite;
						-moz-animation: animatedBackground 60s linear infinite;
						animation: animatedBackground 60s linear infinite;
					}'. "\n";
				
				$css .= '@media screen and (max-width: 1024px) {
					
					.hero {
						-webkit-animation: none !important;
						-moz-animation: none !important;
						animation: none !important;
					}
					
				}';
				
				$css .= '@keyframes animatedBackground {
							from { background-position: 0 0; }
							to { background-position: '.$imageinfo[1].'px 0; }
						}
						@-webkit-keyframes animatedBackground {
							from { background-position: 0 0; }
							to { background-position: '.$imageinfo[1].'px 0; }
						}
						@-moz-keyframe animatedBackground {
							from { background-position: 0 0; }
							to { background-position: '.$imageinfo[1].'px 0; }
						}';
					
			}
			
			/* video poster */
			if( $detect->isMobile() || $detect->isTablet() ) :
			
				if( ( !is_front_page() && is_page() && ot_get_option('ut_page_video_state') == 'on' ) || ( is_front_page() && ot_get_option('ut_front_video_state') == 'on' ) || ( is_single() && ot_get_option('ut_single_video_state') == 'on' ) || ( is_home() && ot_get_option('ut_blog_video_state') == 'on' ) ) :
				
					/* video poster image for mobile devices */
    				$ut_video_poster  =  ( is_front_page() || is_page() ) ? ot_get_option('ut_front_video_poster') : '';
    				$ut_video_poster  =  ( is_home() || is_single() ) ? ot_get_option('ut_blog_video_poster') : $ut_video_poster;					
					
                    /* hero can be an image , so we need to check the hero type */
                    if((is_front_page() && ot_get_option('ut_front_page_header_type') == 'video') || ( is_home() && ot_get_option('ut_blog_header_type') == 'video')) {
					    $css .= '.hero { background-image: url(' . esc_url( $ut_video_poster ) . '); }'. "\n";					
                    }
                                        
                    $css .= '.ut-video-control {
						display:none !important;
					}';
					
				endif;
				
			endif;
			
            /* fancy slider */
            $fancy_slider_height = is_front_page() ? ot_get_option('front_fancy_slider_height' , '600px') : ot_get_option('blog_fancy_slider_height' , '600px');
            $css .= '.ut-fancy-slider-fullwidth { height: ' . $fancy_slider_height . '; }';
            $css .= '.ut-fancy-slider-fullwidth .hero-inner { height: ' . $fancy_slider_height . '; }';
            
            
			/* header overlay styling */
			if( is_front_page() ) {
				$ut_hero_overlay_color 			= ot_get_option('ut_front_page_overlay_color');
				$ut_hero_overlay_color_opacity	= ot_get_option('ut_front_page_overlay_color_opacity' , '0.8');
			}
			
			if( is_home() ) {
				$ut_hero_overlay_color 			= ot_get_option('ut_blog_overlay_color');
				$ut_hero_overlay_color_opacity	= ot_get_option('ut_blog_overlay_color_opacity' , '0.8');
			}
			
			if( !empty($ut_hero_overlay_color) ) {
				$css.= '.hero .parallax-overlay { background-color: rgba(' . ut_hex_to_rgb( $ut_hero_overlay_color ) . ' , ' . $ut_hero_overlay_color_opacity . ' ); }'. "\n";
			}
			
			
			/* blog hero header styling */
			$ut_blog_expertise_slogan_color = ot_get_option('ut_blog_expertise_slogan_color');
			$ut_blog_company_slogan_color 	= ot_get_option('ut_blog_company_slogan_color');
			
			if( !empty( $ut_blog_expertise_slogan_color ) && is_home() ) {
				
				$css.='.hero-description { color: ' . $ut_blog_expertise_slogan_color . '}'. "\n";
				
			}
			
			if( !empty( $ut_blog_company_slogan_color ) && is_home() ) {
				
				$css.='.hero-title { color: ' . $ut_blog_company_slogan_color . ' }'. "\n";
				
			}
			
			
			/* check if footer is active*/
			$ut_activate_csection = ot_get_option('ut_activate_csection' , 'off'); 
			
			/* only get footer styles if footer is active */
			if( $ut_activate_csection == 'on' ) {
										
				/* contact section header styling */
				$ut_csection_header_slogan_color = ot_get_option('ut_csection_header_slogan_color');
				$ut_csection_header_expertise_slogan_color = ot_get_option('ut_csection_header_expertise_slogan_color');
				
				$ut_csection_header_style = ot_get_option('ut_csection_header_style' , 'pt-style-1');
				$ut_csection_header_style = $ut_csection_header_style == 'global' ? ot_get_option('ut_global_headline_style') : $ut_csection_header_style;
				
				/* pt style 3 needs a fallback */
				if( empty($ut_csection_header_slogan_color) && $ut_csection_header_style == 'pt-style-3') {
					$ut_csection_header_slogan_color = $accentcolor;
				}
				
				if( !empty( $ut_csection_header_slogan_color ) ) {
					
					$css.='#contact-section .parallax-title { color: ' . $ut_csection_header_slogan_color . '}'. "\n";
					$css.= create_section_headline_style('#contact-section' , $ut_csection_header_style , $ut_csection_header_slogan_color);
					
				}
				
				if( !empty( $ut_csection_header_expertise_slogan_color ) ) {
					
					$css.='#contact-section .lead { color: ' . $ut_csection_header_expertise_slogan_color . ' }'. "\n";
					
				}
								
				/* contact section section styles */
					
				$csection_background = null;
			
				/* footer styling */
				$ut_csection_background_image = ot_get_option('ut_csection_background_image');
				
				if( is_array($ut_csection_background_image) && !empty($ut_csection_background_image['background-image'] ) ) {					
                    
					$csection_background .= ut_create_css_background( '#contact-section' , $ut_csection_background_image );						
				    $ut_csection_background_image = $ut_csection_background_image['background-image'];
                
				} elseif( !is_array($ut_csection_background_image) ) {
					
					$csection_background .= !empty( $ut_csection_background_image ) ? '#contact-section { background-image: url(' . esc_url( $ut_csection_background_image ) . '); }'. "\n" : '';						
				
				} else {
				
					
					/* video poster for section */
					if( $detect->isMobile() || $detect->isTablet() ) :
						
						if( ( is_page() && ot_get_option('ut_page_video_state') == 'on' ) || ( is_front_page() && ot_get_option('ut_front_video_state') == 'on' ) ) :
							
							/* check for bachround color */
							$ut_csection_background_color = ot_get_option('ut_csection_background_color');

							if( empty($ut_section_background_color) ) {
								
								/* video poster image for mobile devices */
								$ut_video_poster  =  ot_get_option('ut_front_video_poster');
								$csection_background .= '#contact-section { background-image: url(' . esc_url( $ut_video_poster ) . '); }'. "\n";
								
							}
							
						endif;
						
					endif;
				
				}
				
				/* there is no image, so we check if a background color has been set */
				$ut_csection_background_color = ot_get_option('ut_csection_background_color');
				if( empty( $ut_csection_background_image ) ) {
					
					$csection_background .= !empty( $ut_csection_background_color ) ? '#contact-section { background: ' . $ut_csection_background_color . '; }'. "\n" : '';
				
				}
									
                // add to CSS
                $css .= $csection_background;				
				
				
				/* contact section header font style */
				if( ot_get_option('ut_csection_header_font_type' , 'ut-font') == 'ut-google' ) :
			     
                        $ut_csection_header_google_font_style = ot_get_option('ut_csection_header_google_font_style');				
                    
                        if( !empty($google_fonts[ $ut_csection_header_google_font_style['font-id']]['family']) ) {
                        
                            $font = '#contact-section .parallax-title {';
                                
                                $font .= 'font-family:'.$google_fonts[$ut_csection_header_google_font_style['font-id']]['family'].', "Helvetica Neue", Helvetica, Arial, sans-serif;';					
                                
                                if( !empty( $ut_csection_header_google_font_style['font-weight']) ) {
                                    $font .= ' font-weight: ' .  $ut_csection_header_google_font_style['font-weight'] . ';';	
                                }
                                
                                if( !empty( $ut_csection_header_google_font_style['font-size']) ) {
                                    $font .= ' font-size: ' .  $ut_csection_header_google_font_style['font-size'] . ';';	
                                }
                                
                                if( !empty( $ut_csection_header_google_font_style['font-style']) && isset($font_styles[ $ut_csection_header_google_font_style['font-style']]) ) {
                                    $font .= ' font-style: ' . $font_styles[ $ut_csection_header_google_font_style['font-style']] . ';';	
                                }
                                
                                if( !empty( $ut_csection_header_google_font_style['line-height']) ) {
                                    $font .= ' line-height: ' .  $ut_csection_header_google_font_style['line-height'] . ';';	
                                }
                                
                                if( !empty( $ut_csection_header_google_font_style['text-transform']) ) {
                                    $font .= ' text-transform: ' .  $ut_csection_header_google_font_style['text-transform'] . ';';	
                                }
                                
                            $font .= '}';
                            
                            $css .= $font;
                        
                        } else {
                        
                            /* fallback if user has not chosen a google font yet */
                            $font_style = ot_get_option('ut_csection_header_font_style' , 'semibold');
                            $css .= '#contact-section .parallax-title { font-family: ' . $ut_recognized_font_styles[$font_style] . ', "Helvetica Neue", Helvetica, Arial, sans-serif;}'. "\n";
                        
                        }
                    
                else :
                    
                    $font_style = ot_get_option('ut_csection_header_font_style' , 'semibold');
                    $css .= '#contact-section .parallax-title { font-family: ' . $ut_recognized_font_styles[$font_style] . ', "Helvetica Neue", Helvetica, Arial, sans-serif;}'. "\n";                     
                    
                endif;
                
				/* contact section box styling */
				$ut_left_csection_content_area_color = ot_get_option('ut_left_csection_content_area_color');
				$ut_right_csection_content_area_color = ot_get_option('ut_right_csection_content_area_color');
				
				$ut_left_csection_content_area_opacity = ot_get_option('ut_left_csection_content_area_opacity' , '0.8' );
				$ut_right_csection_content_area_opacity = ot_get_option('ut_right_csection_content_area_opacity', '0.8' );
				
					$css .= !empty( $ut_left_csection_content_area_color )  ? '#contact-section .ut-left-footer-area { background: rgb(' . ut_hex_to_rgb( $ut_left_csection_content_area_color ) . ',' . $ut_left_csection_content_area_opacity . '); }'. "\n" : '';
					$css .= !empty( $ut_left_csection_content_area_color )  ? '#contact-section .ut-left-footer-area { background: rgba(' . ut_hex_to_rgb( $ut_left_csection_content_area_color ) . ',' . $ut_left_csection_content_area_opacity . '); }'. "\n" : '';
					$css .= !empty( $ut_right_csection_content_area_color ) ? '#contact-section .ut-right-footer-area { background: rgb(' . ut_hex_to_rgb( $ut_right_csection_content_area_color ) . ',' . $ut_right_csection_content_area_opacity . '); }'. "\n" : '';
					$css .= !empty( $ut_right_csection_content_area_color ) ? '#contact-section .ut-right-footer-area { background: rgba(' . ut_hex_to_rgb( $ut_right_csection_content_area_color ) . ',' . $ut_right_csection_content_area_opacity . '); }'. "\n" : '';
				
				/* contact section overlay color */
				$ut_csection_overlay = ot_get_option( 'ut_csection_overlay' , 'on' );
				$ut_csection_overlay_color = ot_get_option('ut_csection_overlay_color');
				$ut_csection_overlay_opacity = ot_get_option('ut_csection_overlay_opacity' , '0.8');
				
					$css .= !empty( $ut_csection_overlay_color )  ? '#contact-section .parallax-overlay { background: rgb(' . ut_hex_to_rgb( $ut_csection_overlay_color ) . ',' . $ut_csection_overlay_opacity . '); }'. "\n" : '';
					$css .= !empty( $ut_csection_overlay_color )  ? '#contact-section .parallax-overlay { background: rgba(' . ut_hex_to_rgb( $ut_csection_overlay_color ) . ',' . $ut_csection_overlay_opacity . '); }'. "\n" : '';
				
				/* contact section section padding */
				$ut_csection_padding_top = ot_get_option('ut_csection_padding_top');
				$ut_csection_padding_bottom = ot_get_option('ut_csection_padding_bottom');
				
					/* fallback if there is no entry */
					$ut_csection_padding_top = empty($ut_csection_padding_top) ? '80px' : $ut_csection_padding_top;
					$ut_csection_padding_bottom = empty($ut_csection_padding_bottom) ? '60px' : $ut_csection_padding_bottom;
					
					if( $ut_csection_overlay == 'on' ) {
					
						$css .= '#contact-section .parallax-overlay { padding-top:' . $ut_csection_padding_top . '; padding-bottom:' . $ut_csection_padding_bottom . '; }'. "\n";
					
					} else {
						
						$css .= '#contact-section { padding-top:' . $ut_csection_padding_top . '; padding-bottom:' . $ut_csection_padding_bottom . '; }'. "\n";
						$css .= '#contact-section .ut-offset-anchor { top:-' . ( 79 + str_replace("px" , "" , $ut_csection_padding_top) ) . 'px; }'. "\n";
						
					}
					
				
			} /* end $ut_activate_csection */
			
			
			/* theme options misc settings */
			if( ot_get_option('ut_blockquote_font_type' , 'ut-font') == 'ut-google' ) {
			
					$ut_google_blockquote_font_style = ot_get_option('ut_google_blockquote_font_style');
					
					if( !empty($google_fonts[$ut_google_blockquote_font_style['font-id']]['family']) ) {
					
						$css .= 'blockquote {';
							/* familiy */
							$css .= 'font-family:'.$google_fonts[$ut_google_blockquote_font_style['font-id']]['family'].', "Helvetica Neue", Helvetica, Arial, sans-serif;';					
							
							if( !empty($ut_google_blockquote_font_style['font-weight']) ) {
								$css .= ' font-weight: ' . $ut_google_blockquote_font_style['font-weight'] . ';';	
							}
							
							if( !empty($ut_google_blockquote_font_style['font-size']) ) {
								$css .= ' font-size: ' . $ut_google_blockquote_font_style['font-size'] . ';';	
							}
							
							if( !empty($ut_google_blockquote_font_style['font-style']) ) {
								$css .= ' font-style: ' . $font_styles[$ut_google_blockquote_font_style['font-style']] . ';';	
							}
							
							if( !empty($ut_google_blockquote_font_style['text-transform']) ) {
								$css .= ' text-transform: ' . $ut_google_blockquote_font_style['text-transform'] . ';';	
							}
							
						$css .= '}';
					
					} else {
						
						/* fallback if user has not chosen a google font yet */
						$ut_blockquote_font_style = ot_get_option('ut_blockquote_font_style' , 'semibold');	
						$css .= 'blockquote { font-family: ' . $ut_recognized_font_styles[$ut_blockquote_font_style] . ', "Helvetica Neue", Helvetica, Arial, sans-serif; }'. "\n";
						
					}
					
				} else {
					
					/* out for theme font */
					$ut_blockquote_font_style = ot_get_option('ut_blockquote_font_style' , 'semibold');	
					$css .= 'blockquote { font-family: ' . $ut_recognized_font_styles[$ut_blockquote_font_style] . ', "Helvetica Neue", Helvetica, Arial, sans-serif; }'. "\n";
								
			}
			
			if( ot_get_option('ut_global_lead_font_type' , 'ut-font') == 'ut-google' ) {
			
					$ut_google_lead_font_style = ot_get_option('ut_google_lead_font_style');
					
					if( !empty($google_fonts[$ut_google_lead_font_style['font-id']]['family']) ) {
					
						$css .= 'p.lead, .taxonomy-description {';
							/* familiy */
							$css .= 'font-family:'.$google_fonts[$ut_google_lead_font_style['font-id']]['family'].', "Helvetica Neue", Helvetica, Arial, sans-serif;';					
							
							if( !empty($ut_google_lead_font_style['font-weight']) ) {
								$css .= ' font-weight: ' . $ut_google_lead_font_style['font-weight'] . ';';	
							}
							
							if( !empty($ut_google_lead_font_style['font-size']) ) {
								$css .= ' font-size: ' . $ut_google_lead_font_style['font-size'] . ';';	
							}
							
							if( !empty($ut_google_lead_font_style['font-style']) ) {
								$css .= ' font-style: ' . $font_styles[$ut_google_lead_font_style['font-style']] . ';';	
							}
							
							if( !empty($ut_google_lead_font_style['text-transform']) ) {
								$css .= ' text-transform: ' . $ut_google_lead_font_style['text-transform'] . ';';	
							}
							
						$css .= '}';
					
					} else {
						
						/* fallback if user has not chosen a google font yet */
						$ut_lead_font_style = ot_get_option('ut_lead_font_style' , 'semibold');	
						$css .= 'p.lead, .taxonomy-description { font-family: ' . $ut_recognized_font_styles[$ut_lead_font_style] . ', "Helvetica Neue", Helvetica, Arial, sans-serif; }'. "\n";
						
					}
					
				} else {
					
					/* out for theme font */
					$ut_lead_font_style = ot_get_option('ut_lead_font_style' , 'semibold');	
					$css .= 'p.lead, .taxonomy-description { font-family: ' . $ut_recognized_font_styles[$ut_lead_font_style] . ', "Helvetica Neue", Helvetica, Arial, sans-serif; }'. "\n";
								
			}
			
			/* loader logo */
			$ut_site_logo = get_theme_mod( 'ut_site_logo' );
			$loader_logo = ot_get_option('ut_image_loader_logo' , $ut_site_logo );
			
			if ( !empty($loader_logo) ) {
				$css .= '#ut-loader-logo { background-image: url(' . esc_url( $loader_logo ) . '); background-position: center center; background-repeat: no-repeat; }'. "\n";
			}

				
			/* individual section styles , only run this query for front page */
			
			if( is_front_page() ) {
				
				/* retrieve query arguements */
				$pagequery = ut_prepare_front_query();							
				
				if( !empty( $pagequery ) ) {
			
					$css_query = new WP_Query( $pagequery );
					
					if ( $css_query->have_posts() ) :
					
						while ( $css_query->have_posts() ) : $css_query->the_post();
							
							global $detect;
							
							/* 
							 * split section
							 */
								$ut_section_width = get_post_meta( $css_query->post->ID , 'ut_section_width' , true);
								if( $ut_section_width == 'split' ) {
									
									/* try to get featured image */
									$fullsize = wp_get_attachment_url( get_post_thumbnail_id( $css_query->post->ID ) );
									
									if( !empty( $fullsize ) ) {
										$css .= '#' . $css_query->post->post_name . ' .ut-split-screen-poster{ background: url("' . $fullsize . '") }';
									}
									
								}
							
							
							/* 
							 * section padding
							 */
								
								/* get overlay settings */
								$ut_overlay_section = get_post_meta( $css_query->post->ID , 'ut_overlay_section' , true);								
								
								/* padding settings */
								$ut_section_padding_top = get_post_meta( $css_query->post->ID , 'ut_section_padding_top' , true);
								$ut_section_padding_bottom = get_post_meta( $css_query->post->ID , 'ut_section_padding_bottom' , true);
								$ut_section_slogan_padding = get_post_meta( $css_query->post->ID , 'ut_section_slogan_padding' , true );
						
								/* fallback if there is no entry */
								$ut_section_padding_top = empty($ut_section_padding_top) ? '80px' : $ut_section_padding_top;
								$ut_section_padding_bottom = empty($ut_section_padding_bottom) ? '60px' : $ut_section_padding_bottom;
								$ut_section_slogan_padding = empty($ut_section_slogan_padding) ? '30px' : $ut_section_slogan_padding;	
								
								// add to CSS
								if($ut_overlay_section == 'on') {
									
									$css .= '#' . $css_query->post->post_name . ' .parallax-overlay { padding-top:' . $ut_section_padding_top . '; padding-bottom:' . $ut_section_padding_bottom . '; }'. "\n";
																	
								} else {
									
									$css .= '#' . $css_query->post->post_name . '{ padding-top:' . $ut_section_padding_top . '; padding-bottom:' . $ut_section_padding_bottom . '; }'. "\n";
									$css .= '#' . $css_query->post->post_name . ' .ut-offset-anchor { top:-' . ( 79 + str_replace("px" , "" , $ut_section_padding_top) ) . 'px; }'. "\n";
									
									
								}
								
								$css .= '#' . $css_query->post->post_name . ' .parallax-header { padding-bottom:' . $ut_section_slogan_padding . '; }'. "\n";
								$css .= '#' . $css_query->post->post_name . ' .section-header { padding-bottom:' . $ut_section_slogan_padding . '; }'. "\n";									
							
							/* 
							 * section header font
							 */
								
								/* get font style */
								$ut_section_header_font_style = get_post_meta( $css_query->post->ID , 'ut_section_header_font_style' , true );
								
								/* fallback if there is no entry */
								$ut_section_header_font_style = empty($ut_section_header_font_style) ? 'semibold' : $ut_section_header_font_style;
								
								//add to CSS
								$css .= ut_create_global_headline_font_style('#' . $css_query->post->post_name . ' .parallax-title' , $ut_section_header_font_style);
								$css .= ut_create_global_headline_font_style('#' . $css_query->post->post_name . ' .section-title' , $ut_section_header_font_style);
								
							
							/* 
							 * section parallax image
							 */
								
								/* get parallax settings*/
								$ut_parallax_image = get_post_meta( $css_query->post->ID , 'ut_parallax_image' , true );
								$ut_parallax_section = get_post_meta( $css_query->post->ID , 'ut_parallax_section' , true);
								
									/* image fallback to version 1.0 */
									if( is_array($ut_parallax_image) && !empty($ut_parallax_image['background-image'] ) ) {
										
										if( !empty( $ut_parallax_image ) && $ut_parallax_section == 'on' ) {
											
											$css .= ut_create_css_background( '#' . $css_query->post->post_name . '.parallax-section' , $ut_parallax_image );
											
										} else {
											
											$css .= ut_create_css_background( '#' . $css_query->post->post_name , $ut_parallax_image );
											
										}
																	
									} elseif( !is_array($ut_parallax_image) ) {
									
										if( !empty( $ut_parallax_image ) && $ut_parallax_section == 'on' ) { 
											
											$css .= '#' . $css_query->post->post_name . '.parallax-section { background-image: url(' . esc_url( $ut_parallax_image ) . '); }'. "\n";
										
										} else {  
											
											$css .= '#' . $css_query->post->post_name . ' { background-image: url(' . esc_url( $ut_parallax_image ) . '); }'. "\n";
										
										}; 
									
									} else {
									
									/* video poster for section */
									if( $detect->isMobile() || $detect->isTablet() ) :
										
										if( ( is_page() && ot_get_option('ut_page_video_state') == 'on' ) || ( is_front_page() && ot_get_option('ut_front_video_state') == 'on' ) ) :
											
											/* check for bachround color */
											$ut_section_background_color = get_post_meta( $css_query->post->ID , 'ut_section_background_color' , true);
											
											
											if( empty($ut_section_background_color) ) {
												
												/* video poster image for mobile devices */	
												$ut_video_poster  =  ot_get_option('ut_front_video_poster');
												$css .= '#' . $css_query->post->post_name . ' { background-image: url(' . esc_url( $ut_video_poster ) . '); }'. "\n";
												
											}
											
										endif;
										
									endif;
									
									}
														
							/* 
							 * section background color 
							 */							
							$ut_section_background_color = get_post_meta( $css_query->post->ID , 'ut_section_background_color' , true);
							
							/* fallback color if no color has been set */
							$ut_section_background_color = empty($ut_section_background_color) ? '' : $ut_section_background_color;
							
							// add to CSS
							$css.= '#' . $css_query->post->post_name . '{ background-color: ' . $ut_section_background_color . '; }'. "\n";
							$css.= '#' . $css_query->post->post_name . ' .section-header.pt-style-1 .section-title span  { background-color: ' . $ut_section_background_color . '; }'. "\n";							
							
							
							/* 
							 * section title , text , heading and lead color 
							 */
							
							$ut_section_text_color = get_post_meta( $css_query->post->ID , 'ut_section_text_color' , true);
							if( !empty($ut_section_text_color) ) {
								
								// add to CSS
								$css.= '#' . $css_query->post->post_name . ' .section-content { color: ' . $ut_section_text_color . '; }'. "\n"; 
								
							}
							
							$ut_section_heading_color = get_post_meta( $css_query->post->ID , 'ut_section_heading_color' , true);
							if( !empty($ut_section_heading_color) ) {
								
								// add to CSS
								$css.= '#' . $css_query->post->post_name . ' .section-content h1 { color: ' . $ut_section_heading_color . ' !important; }'. "\n";
								$css.= '#' . $css_query->post->post_name . ' .section-content h2 { color: ' . $ut_section_heading_color . ' !important; }'. "\n"; 
								$css.= '#' . $css_query->post->post_name . ' .section-content h3 { color: ' . $ut_section_heading_color . ' !important; }'. "\n"; 
								$css.= '#' . $css_query->post->post_name . ' .section-content h4 { color: ' . $ut_section_heading_color . ' !important; }'. "\n"; 
								$css.= '#' . $css_query->post->post_name . ' .section-content h5 { color: ' . $ut_section_heading_color . ' !important; }'. "\n"; 
								$css.= '#' . $css_query->post->post_name . ' .section-content h6 { color: ' . $ut_section_heading_color . ' !important; }'. "\n";  
							}  

							$ut_section_header_style = get_post_meta( $css_query->post->ID , 'ut_section_header_style', true );
							$ut_section_header_style = ( !empty($ut_section_header_style) && $ut_section_header_style != 'global' ) ? $ut_section_header_style : ot_get_option('ut_global_headline_style');							 
							
							$ut_section_title_color = get_post_meta( $css_query->post->ID , 'ut_section_title_color' , true); 
							
							/* pt style 3 needs a fallback */
							if( empty($ut_section_title_color) && $ut_section_header_style == 'pt-style-3') {
								$ut_section_title_color = $accentcolor;
							}
							
							if( !empty($ut_section_title_color) ) {
								
								// add to CSS
								$css.= '#' . $css_query->post->post_name . ' .parallax-title { color: ' . $ut_section_title_color . '; }'. "\n";
								$css.= '#' . $css_query->post->post_name . ' .section-title { color: ' . $ut_section_title_color . '; }'. "\n";
								

								$css.= create_section_headline_style( '#'.$css_query->post->post_name , $ut_section_header_style , $ut_section_title_color );
			 
							}
							 
							$ut_section_slogan_color = get_post_meta( $css_query->post->ID , 'ut_section_slogan_color' , true);
							if( !empty($ut_section_slogan_color) ) {
								$css.= '#' . $css_query->post->post_name . ' p.lead { color: ' . $ut_section_slogan_color . '; }'. "\n"; 
							}
							
							/* 
							 * overlay color
							 */
							 
							if( $ut_overlay_section == 'on') {
								
								$ut_overlay_color = get_post_meta( $css_query->post->ID , 'ut_overlay_color' , true);
								$ut_overlay_color_opacity = get_post_meta( $css_query->post->ID , 'ut_overlay_color_opacity' , true);
								$ut_overlay_color_opacity = !empty($ut_overlay_color_opacity) ? $ut_overlay_color_opacity : '0.8';

								
								// add to CSS
								$css.= '#' . $css_query->post->post_name . ' .parallax-overlay { background-color: rgb(' . ut_hex_to_rgb($ut_overlay_color) . '); }'. "\n";
								$css.= '#' . $css_query->post->post_name . ' .parallax-overlay { background-color: rgba(' . ut_hex_to_rgb($ut_overlay_color) . ' , ' . $ut_overlay_color_opacity . ' ); }'. "\n";
								
							}
														
						endwhile;
					
					endif;
					
					wp_reset_postdata();
					
				}
			
			} /* end front page styling */
			
			$css .= '.parallax-overlay-pattern.style_one { background-image: url(" '. THEME_WEB_ROOT .'/images/overlay-pattern.png") !important; }'. "\n";
			$css .= '.parallax-overlay-pattern.style_two { background-image: url(" '. THEME_WEB_ROOT .'/images/overlay-pattern2.png") !important; }'. "\n";
			
			/* custom css from theme option panel */
			$css .= ot_get_option('ut_custom_css');
			
			
        /* end css */    
        $css .= '</style>';
        
        echo apply_filters( 'ut-custom-css', $css );
        
    }
    
    add_action('wp_head', 'unitedthemes_custom_css' );
	
} 

?>