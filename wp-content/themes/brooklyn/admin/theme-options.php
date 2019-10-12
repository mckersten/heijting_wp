<?php

add_action( 'admin_init', 'ut_theme_options' );

function ut_theme_options() {

  $saved_settings = get_option( 'option_tree_settings', array() );
  
  $ut_settings = array( 
    
	'contextual_help' => array( 
      'sidebar'       => ''
    ),
	
    'sections'        => array( 
      
	  array(
        'id'          => 'ut_general_settings',
        'title'       => 'General',
		'icon'		  => 'fa-globe'
      ),
	  
	  array(
        'id'          => 'ut_typography_settings',
        'title'       => 'Typography',
		'icon'		  => 'fa-font'
      ),
	  
      array(
        'id'          => 'ut_front_page_settings',
        'title'       => 'Front Page',
		'icon'		  => 'fa-home'
      ),
	  
	  array(
        'id'          => 'ut_blog_settings',
        'title'       => 'Blog',
		'icon'		  => 'fa-pencil'
      ),     
	  
	  array(
        'id'          => 'ut_video_settings',
        'title'       => 'Video',
		'icon'		  => 'fa-film '		
      ),
	  
	  array(
        'id'          => 'ut_csection_settings',
        'title'       => 'Contact',
		'icon'		  => 'fa-envelope-o '		
      ),
	  
	  array(
        'id'          => 'ut_advanced_settings',
        'title'       => 'Advanced',
		'icon'		  => 'fa-wrench'		
      )	  
			
    ),
    
	'settings'        => array(
	  
	  /*
	  |--------------------------------------------------------------------------
	  | Sub Section Touch Icons
	  |--------------------------------------------------------------------------
	  */ 
	  
	  array(
        'id'          	=> 'ut_touch_settings_menu',
		'subid'			=> 'ut_touch_settings',
        'label'       	=> 'Apple Touch Icons',
        'type'        	=> 'section_headline',
        'section'     	=> 'ut_general_settings',
      ),
	  
	  array(
        'id'          => 'ut_touch_setting_headline',
        'label'       => 'Apple Touch Icons',
        'desc'        => '<h2 class="section-headline">Apple Touch Icons</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_general_settings',
		'subsection'  => 'ut_touch_settings'
      ),
	  
	  array(
        'id'          	=> 'ut_favicon',
        'label'       	=> 'Favion',
        'desc'        	=> 'The dimension for the image must be 16x16 pixels or 32x32 pixels, using either 8-bit or 24-bit colors and the format must be one of PNG (a W3C standard), GIF, or ICO.',
        'type'        	=> 'upload',
        'section'     	=> 'ut_general_settings',
		'subsection'	=> 'ut_touch_settings'
      ),
	    
	  array(
        'id'          	=> 'ut_apple_touch_icon_iphone',
        'label'       	=> 'Apple Touch Icon IPhone',
        'desc'        	=> '57x57 pixel for iPhone and iPod touch. <br /> <strong>Recommended format must be one of PNG, GIF, or JPG.</strong>',
        'type'        	=> 'upload',
        'section'     	=> 'ut_general_settings',
		'subsection'	=> 'ut_touch_settings'
      ),
      
	  array(
        'id'          	=> 'ut_apple_touch_icon_ipad',
        'label'       	=> 'Apple Touch Icon IPad',
        'desc'        	=> '72 x 72 pixel for IPad. <br /> <strong>Recommended format must be one of PNG, GIF, or JPG.</strong>',
        'type'        	=> 'upload',
        'section'     	=> 'ut_general_settings',
		'subsection'	=> 'ut_touch_settings'
      ),
      
	  array(
        'id'          	=> 'ut_apple_touch_icon_iphone_retina',
        'label'       	=> 'Apple Touch Icon IPhone ( Retina )',
        'desc'       	=> '114 x 114 pixel for high-resolution iPhone and iPod touch. <br /> <strong>Recommended format must be one of PNG, GIF, or JPG.</strong>',
        'type'        	=> 'upload',
        'section'     	=> 'ut_general_settings',
		'subsection'	=> 'ut_touch_settings'
      ),
      
	  array(
        'id'          	=> 'ut_apple_touch_icon_ipad_retina',
        'label'       	=> 'Apple Touch Icon IPad ( Retina )',
        'desc'        	=> '144 x 144 pixel for high-resolution iPad. <br /> <strong>Recommended format must be one of PNG, GIF, or JPG.</strong>',
        'type'        	=> 'upload',
        'section'     	=> 'ut_general_settings',
		'subsection'	=> 'ut_touch_settings'
      ),
	   
	  /*
	  |--------------------------------------------------------------------------
	  | Header Skin
	  |--------------------------------------------------------------------------
	  */
	  
	  array(
        'id'          => 'ut_navigation_settings_menu',
		'subid'		  => 'ut_navigation_settings',
        'label'       => 'Navigation',
        'type'        => 'section_headline',
        'section'     => 'ut_general_settings'
      ),
	  
	  array(
        'id'          => 'ut_navigation_setting_headline',
        'label'       => 'Navigation',
        'desc'        => '<h2 class="section-headline">Navigation</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_general_settings',
		'subsection'  => 'ut_navigation_settings',
      ),
	   
	  array(
        'id'          => 'ut_navigation_skin',
        'label'       => 'Navigation Color Skin',
        'desc'        => '',
        'type'        => 'select',
        'section'     => 'ut_general_settings',
		'subsection'  => 'ut_navigation_settings',
		'std'		  => 'ut-header-light',
        'choices'     => array( 
		  array(
            'value'       => 'ut-header-dark',
            'label'       => 'Dark'
          ),
          array(
            'value'       => 'ut-header-light',
            'label'       => 'Light'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_navigation_width',
        'label'       => 'Navigation Width',
        'desc'        => '',
        'type'        => 'select',
        'section'     => 'ut_general_settings',
		'subsection'  => 'ut_navigation_settings',
		'std'		  => 'centered',
        'choices'     => array( 
		  array(
            'value'       => 'centered',
            'label'       => 'Centered'
          ),
          array(
            'value'       => 'fullwidth',
            'label'       => 'Fullwidth'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_navigation_font_weight',
        'label'       => 'Navigation Font Weight',
        'desc'        => '',
        'type'        => 'select',
        'section'     => 'ut_general_settings',
		'subsection'  => 'ut_navigation_settings',
		'std'		  => 'normal',
        'choices'     => array( 
		  array(
            'value'       => 'normal',
            'label'       => 'Normal'
          ),
          array(
            'value'       => 'bold',
            'label'       => 'Bold'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_navigation_state',
        'label'       => 'Always show navigation',
        'desc'        => 'This option makes the navigation visible all the time. If you choose "On (transparent)". The navigation will turn into the chosen skin when reaching the main content"',
        'type'        => 'select',
        'section'     => 'ut_general_settings',
		'subsection'  => 'ut_navigation_settings',
		'std'		  => 'off',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On (with chosen skin)'
          ),
		  array(
            'value'       => 'on_transparent',
            'label'       => 'On (transparent)'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
      
      array(
        'id'          => 'ut_navigation_level_one_color',
        'label'       => 'Navigation First Level Color',
        'desc'        => 'change the font color of the first navigation level',
        'type'        => 'colorpicker',
        'section'     => 'ut_general_settings',
		'subsection'  => 'ut_navigation_settings',
      ),
      
      array(
        'id'          => 'ut_navigation_level_one_icon_color',
        'label'       => 'Navigation First Level Dot Color',
        'desc'        => 'change the dot color of the first navigation level',
        'type'        => 'colorpicker',
        'section'     => 'ut_general_settings',
		'subsection'  => 'ut_navigation_settings',
      ),
      
	  
	  /*
	  |--------------------------------------------------------------------------
	  | Footer
	  |--------------------------------------------------------------------------
	  */
	  	  
	  array(
        'id'          => 'ut_footer_settings_menu',
		'subid'		  => 'ut_footer_settings',
        'label'       => 'Footer',
        'type'        => 'section_headline',
        'section'     => 'ut_general_settings'
      ),
	  
	  array(
        'id'          => 'ut_footer_setting_headline',
        'label'       => 'Footer',
        'desc'        => '<h2 class="section-headline">Footer</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_general_settings',
		'subsection'  => 'ut_footer_settings',
      ),
	  
	  array(
        'id'          => 'ut_footer_skin',
        'label'       => 'Footer Color Skin',
        'desc'        => '',
        'type'        => 'select',
        'section'     => 'ut_general_settings',
		'subsection'  => 'ut_footer_settings',
		'std'		  => 'ut-footer-light',
        'choices'     => array( 
		  array(
            'value'       => 'ut-footer-dark',
            'label'       => 'Dark'
          ),
          array(
            'value'       => 'ut-footer-light',
            'label'       => 'Light'
          )
        ),
      ),	  
	  	  
      array(
        'id'          => 'ut_site_copyright',
        'label'       => 'Copyright',
        'desc'        => 'Adds an additional copyright to the footer of this theme.',
        'type'        => 'textarea-simple',
        'section'     => 'ut_general_settings',
		'subsection'  => 'ut_footer_settings',
        'rows'        => '3'
      ),	 
	  
      
      array(
        'id'          => 'ut_footer_social_icons',
        'label'       => 'Social Icons',
        'type'        => 'list-item',
        'section'     => 'ut_general_settings',
		'subsection'  => 'ut_footer_settings',
        'settings'    => array( 
          array(
            'id'          => 'icon',
            'label'       => 'Icon',
            'type'        => 'select',
            'choices'     => array( 
                  array(
					'value'       => 'fa-facebook',
					'label'       => 'Facebook'
				  ),
				  array(
					'value'       => 'fa-twitter',
					'label'       => 'Twitter'
				  ),
				  array(
					'value'       => 'fa-google-plus',
					'label'       => 'Google Plus'
				  ),
				  array(
					'value'       => 'fa-github',
					'label'       => 'Github'
				  ),
				  array(
					'value'       => 'fa-skype',
					'label'       => 'Skype'
				  ),
				  array(
					'value'       => 'fa-dribbble',
					'label'       => 'Dribbble'
				  ),
				  array(
					'value'       => 'fa-dropbox',
					'label'       => 'Dropbox'
				  ),
				  array(
					'value'       => 'fa-flickr',
					'label'       => 'Flickr'
				  ),
				  array(
					'value'       => 'fa-xing',
					'label'       => 'Xing'
				  ),
				  array(
					'value'       => 'fa-youtube',
					'label'       => 'Youtube'
				  ),
                  array(
					'value'       => 'fa-vimeo-square',
					'label'       => 'Vimeo'
				  ),
                  array(
					'value'       => 'fa-linkedin',
					'label'       => 'LinkedIn'
				  ),
                  array(
					'value'       => 'fa-instagram',
					'label'       => 'Instagram'
				  )
            ),
          ),
		  array(
            'id'          => 'link',
            'label'       => 'Link',
            'type'        => 'text',
            'rows'        => '3'
          )
        )
      ),
      
      /*
	  |--------------------------------------------------------------------------
	  | Dynamic Sidebars
	  |--------------------------------------------------------------------------
	  */
      /*array(
        'id'          => 'ut_sidebar_settings_menu',
		'subid'		  => 'ut_sidebar_settings',
        'label'       => 'Sidebars',
        'type'        => 'section_headline',
        'section'     => 'ut_general_settings'
      ),
      
      array(
        'id'          => 'ut_sidebars',
        'label'       => 'Create Sidebar',
        'type'        => 'list-item',
        'section'     => 'ut_general_settings',
		'subsection'  => 'ut_sidebar_settings',
        'settings'    => array( 
          array(
            'id'          => 'ut_sidebardesc',
            'label'       => 'Sidebar Description',
            'type'        => 'text'
          )
        )
      ),*/
      
      /*
	  |--------------------------------------------------------------------------
	  | Cache Options
	  |--------------------------------------------------------------------------
	  */      
      array(
        'id'          => 'ut_cache_settings_menu',
		'subid'		  => 'ut_cache_settings',
        'label'       => 'One Page Cache',
        'type'        => 'section_headline',
        'section'     => 'ut_general_settings'
      ),
      
      array(
        'id'          => 'ut_cache_setting_headline',
        'label'       => 'One Page Cache',
        'desc'        => '<h2 class="section-headline">One Page Cache</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_general_settings',
		'subsection'  => 'ut_cache_settings',
      ),
      
      array(
        'id'          => 'ut_use_cache',
        'label'       => 'Use Cache',
        'desc'        => 'This option will cache your one page. We recommend to turn this option off when developing the site or adding new content.',
        'type'        => 'select',
        'section'     => 'ut_general_settings',
		'subsection'  => 'ut_cache_settings',
		'std'		  => 'off',
        'choices'     => array( 
		  array(
            'value'       => 'off',
            'label'       => 'off'
          ),
          array(
            'value'       => 'on',
            'label'       => 'on'
          )
        ),
      ),
      	
      array(
        'id'          => 'ut_cache_ltime',
        'label'       => 'Cache Lifetime',
        'desc'        => 'In Minutes, for example : 10',
        'type'        => 'text',
        'section'     => 'ut_general_settings',
		'subsection'  => 'ut_cache_settings',
      ),
      
	  /*
	  |--------------------------------------------------------------------------
	  | Typography - Body
	  |--------------------------------------------------------------------------
	  */
	  
	  array(
        'id'          => 'ut_global_body_menu',
		'subid'		  => 'ut_global_body_settings',
        'label'       => 'Body',
        'type'        => 'section_headline',
        'section'     => 'ut_typography_settings'
      ),
	  
	  array(
        'id'          => 'ut_global_body_headline',
        'label'       => 'Body Font Face',
        'desc'        => '<h2 class="section-headline">Body Font Face</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_body_settings',
      ),
	  
	  array(
        'id'          => 'ut_body_font_type',
        'label'       => 'Choose Font Source',
        'desc'        => '',
        'type'        => 'select_group',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_body_settings',
		'std'		  => 'ut-font',
        'choices'     => array( 
		  array(
            'value'       => 'ut-font',
			'for'         => 'ut_body_font_style',
            'label'       => 'Theme Font'
          ),
          array(
            'value'       => 'ut-google',
			'for'		  => 'ut_google_body_font_style',
            'label'       => 'Google Font'
          )
        ),
      ),	
	  
	  array(
        'id'          => 'ut_google_body_font_style',
        'label'       => 'Body Font Style',
        'type'        => 'googlefont',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_body_settings'
      ),
	  
	  array(
        'id'          => 'ut_body_font_style',
        'label'       => 'Body Font Style',
        'desc'        => '<strong>(optional)</strong> - default regular. <br /><br /><a href="#" class="ut-font-preview">Preview Theme Font Style</a>',
        'std'         => 'regular',
        'type'        => 'select',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_body_settings',
        'choices'     => array( 
          array(
            'value'       => 'extralight',

            'label'       => 'Extralight'
          ),
          array(
            'value'       => 'light',
            'label'       => 'Light'
          ),
          array(
            'value'       => 'regular',
            'label'       => 'Regular'
          ),
          array(
            'value'       => 'medium',
            'label'       => 'Medium'
          ),
          array(
            'value'       => 'semibold',
            'label'       => 'Semi Bold'
          ),
          array(
            'value'       => 'bold',
            'label'       => 'Bold'
          )
        ),
      ),
	  
	  /*
	  |--------------------------------------------------------------------------
	  | Typography - Blockquote
	  |--------------------------------------------------------------------------
	  */
	   
	  array(
        'id'          => 'ut_global_blockquote_menu',
		'subid'		  => 'ut_global_blockquote_settings',
        'label'       => 'Blockquotes',
        'type'        => 'section_headline',
        'section'     => 'ut_typography_settings'
      ),
	  
	  array(
        'id'          => 'ut_global_blockquote_headline',
        'label'       => 'Blockquotes Font Face',
        'desc'        => '<h2 class="section-headline">Blockquotes Font Face</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_blockquote_settings',
      ),
	  
	  array(
        'id'          => 'ut_blockquote_font_type',
        'label'       => 'Choose Font Source',
        'desc'        => '',
        'type'        => 'select_group',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_blockquote_settings',
		'std'		  => 'ut-font',
        'choices'     => array( 
		  array(
            'value'       => 'ut-font',
			'for'         => 'ut_blockquote_font_style',
            'label'       => 'Theme Font'
          ),
          array(
            'value'       => 'ut-google',
			'for'         => 'ut_google_blockquote_font_style',
            'label'       => 'Google Font'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_google_blockquote_font_style',
        'label'       => 'Blockquote Font Style',
        'type'        => 'googlefont',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_blockquote_settings'
      ),
	  
	  array(
        'id'          => 'ut_blockquote_font_style',
        'label'       => 'Blockquote Font Style',
        'desc'        => '<a href="#" class="ut-font-preview">Blockquote Font Styles</a>',
        'type'        => 'select',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_blockquote_settings',
        'choices'     => array( 
		  array(
            'value'       => 'extralight',
            'label'       => 'Extra Light'
          ),
          array(
            'value'       => 'light',
            'label'       => 'Light'
          ),
          array(
            'value'       => 'regular',
            'label'       => 'Regular'
          ),
          array(
            'value'       => 'medium',
            'label'       => 'Medium'
          ),
          array(
            'value'       => 'semibold',
            'label'       => 'Semi Bold'
          ),
          array(
            'value'       => 'bold',
            'label'       => 'Bold'
          )
        ),
      ),
	  
	  /*
	  |--------------------------------------------------------------------------
	  | Hero Front Font Style
	  |--------------------------------------------------------------------------
	  */
	  
	  array(
        'id'          => 'ut_front_hero_font_style_menu',
		'subid'		  => 'ut_front_hero_font_style_settings',
        'label'       => 'Front Page Hero',
        'type'        => 'section_headline',
        'section'     => 'ut_typography_settings'
      ),
	  
	  array(
        'id'          => 'ut_front_hero_font_style_headline',
        'label'       => 'Front Page Hero Font Face',
        'desc'        => '<h2 class="section-headline">Front Page Hero Font Face</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_front_hero_font_style_settings',
      ),
	  
	  array(
        'id'          => 'ut_front_hero_font_type',
        'label'       => 'Choose Font Source',
        'desc'        => '',
        'type'        => 'select_group',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_front_hero_font_style_settings',
		'std'		  => 'ut-font',
        'choices'     => array( 
		  array(
            'value'       => 'ut-font',
			'for'         => 'ut_front_page_hero_font_style',
            'label'       => 'Theme Font'
          ),
          array(
            'value'       => 'ut-google',
			'for'         => 'ut_google_front_page_hero_font_style',
            'label'       => 'Google Font'
          )
        ),
      ), 
	  
	 array(
        'id'          => 'ut_google_front_page_hero_font_style',
        'label'       => 'Hero Font Style',
        'type'        => 'googlefont',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_front_hero_font_style_settings'
      ),
	  
	  array(
        'id'          => 'ut_front_page_hero_font_style',
        'label'       => 'Hero Font Style',
        'desc'        => '<a href="#" class="ut-font-preview">Preview Font Styles</a>',
        'type'        => 'select',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_front_hero_font_style_settings',
        'choices'     => array( 
		  array(
            'value'       => 'extralight',
            'label'       => 'Extra Light'
          ),
          array(
            'value'       => 'light',
            'label'       => 'Light'
          ),
          array(
            'value'       => 'regular',
            'label'       => 'Regular'
          ),
          array(
            'value'       => 'medium',
            'label'       => 'Medium'
          ),
          array(
            'value'       => 'semibold',
            'label'       => 'Semi Bold'
          ),
          array(
            'value'       => 'bold',
            'label'       => 'Bold'
          )
        ),
      ),
	  
	  /*
	  |--------------------------------------------------------------------------
	  | Hero Blog Font Style
	  |--------------------------------------------------------------------------
	  */
	  
	  array(
        'id'          => 'ut_blog_font_style_menu',
		'subid'		  => 'ut_blog_font_style_settings',
        'label'       => 'Blog Hero',
        'type'        => 'section_headline',
        'section'     => 'ut_typography_settings'
      ),
	  
	  array(
        'id'          => 'ut_blog_font_style_headline',
        'label'       => 'Blog Hero Font Face',
        'desc'        => '<h2 class="section-headline">Blog Hero Font Face</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_blog_font_style_settings',
      ),
	   
	  array(
        'id'          => 'ut_blog_hero_font_type',
        'label'       => 'Choose Font Source',
        'desc'        => '',
        'type'        => 'select_group',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_blog_font_style_settings',
		'std'		  => 'ut-font',
        'choices'     => array( 
		  array(
            'value'       => 'ut-font',
			'for'         => 'ut_blog_hero_font_style',
            'label'       => 'Theme Font'
          ),
          array(
            'value'       => 'ut-google',
			'for'         => 'ut_google_blog_hero_font_style',
            'label'       => 'Google Font'
          )
        ),
      ), 
	  
	  array(
        'id'          => 'ut_google_blog_hero_font_style',
        'label'       => 'Hero Font Style',
        'type'        => 'googlefont',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_blog_font_style_settings'
      ),
	  
	  array(
        'id'          => 'ut_blog_hero_font_style',
        'label'       => 'Hero Font Style',
        'desc'        => '<a href="#" class="ut-font-preview">Preview Font Styles</a>',
        'type'        => 'select',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_blog_font_style_settings',
        'choices'     => array( 
          array(
            'value'       => 'extralight',
            'label'       => 'Extra Light'
          ),
          array(
            'value'       => 'light',
            'label'       => 'Light'
          ),
          array(
            'value'       => 'regular',
            'label'       => 'Regular'
          ),
          array(
            'value'       => 'medium',
            'label'       => 'Medium'
          ),
          array(
            'value'       => 'semibold',
            'label'       => 'Semi Bold'
          ),
          array(
            'value'       => 'bold',
            'label'       => 'Bold'
          )
        ),
      ),
	  
	  	   
	  /*
	  |--------------------------------------------------------------------------
	  | Global Header Typography and Styles
	  |--------------------------------------------------------------------------
	  */
	  
	  array(
        'id'          => 'ut_global_header_menu',
		'subid'		  => 'ut_global_header_settings',
        'label'       => 'Global Header Styles',
        'type'        => 'section_headline',
        'section'     => 'ut_typography_settings'
      ),
	  
	  array(
        'id'          => 'ut_global_header_styles_headline',
        'label'       => 'Global Header Styles',
        'desc'        => '<h2 class="section-headline">Global Header Styles</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_header_settings',
      ),
	  
	  array(
        'id'          => 'ut_global_headline_style',
        'label'       => 'Global Header Style',
        'desc'        => '<strong>(optional)</strong> - default "Style One". This option will affect section and single page headers. <br /> <strong>Keep in mind: You can change the header style individually for each page!</strong><br /><br /><a href="#" class="ut-header-preview">Preview Header Styles</a>',
        'type'        => 'select',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_header_settings',
        'choices'     => array( 
          
		  array(
            'value'       => 'pt-style-1',
            'label'       => 'Style One'
          ),
		  
          array(
            'value'       => 'pt-style-2',
            'label'       => 'Style Two'
          ),
		  
          array(
            'value'       => 'pt-style-3',
            'label'       => 'Style Three'
          ),
		  
          array(
            'value'       => 'pt-style-4',
            'label'       => 'Style Four'
          ),
		  
		  array(
            'value'       => 'pt-style-5',
            'label'       => 'Style Five'
          ),
		  
		  array(
            'value'       => 'pt-style-6',
            'label'       => 'Style Six'
          ),
		  
		  array(
            'value'       => 'pt-style-7',
            'label'       => 'Style Seven'
          )
		  
        ),
      ),
	  
	  array(
        'id'          => 'ut_global_header_font_headline',
        'label'       => 'Global Header Font Face',
        'desc'        => '<h2 class="section-headline">Global Header Font Face</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_header_settings',
      ),
	  
	  array(
        'id'          => 'ut_global_headline_font_type',
        'label'       => 'Choose Font Source',
        'desc'        => '',
        'type'        => 'select_group',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_header_settings',
		'std'		  => 'ut-font',
        'choices'     => array( 
		  array(
            'value'       => 'ut-font',
			'for'		  => 'ut_global_headline_font_style',
            'label'       => 'Theme Font'
          ),
          array(
            'value'       => 'ut-google',
			'for'		  => 'ut_global_google_headline_font_style',
            'label'       => 'Google Font'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_global_google_headline_font_style',
        'label'       => 'Global Header Font Style',
        'type'        => 'googlefont',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_header_settings'
      ), 
	  
	  array(
        'id'          => 'ut_global_headline_font_style',
        'label'       => 'Global Header Font Style',
        'desc'        => '<strong>(optional)</strong> - default semibold. This option will affect section and single page headers. <br /> <strong>Keep in mind: You can change the header font style individually for each page!</strong><br /><br /><a href="#" class="ut-font-preview">Preview Font Style</a>',
        'std'         => 'semibold',
        'type'        => 'select',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_header_settings',
        'choices'     => array( 
          array(
            'value'       => 'extralight',
            'label'       => 'Extralight'
          ),
          array(
            'value'       => 'light',
            'label'       => 'Light'
          ),
          array(
            'value'       => 'regular',
            'label'       => 'Regular'
          ),
          array(
            'value'       => 'medium',
            'label'       => 'Medium'
          ),
          array(
            'value'       => 'semibold',
            'label'       => 'Semi Bold'
          ),
          array(
            'value'       => 'bold',
            'label'       => 'Bold'
          )
        ),
      ),	  
	  
	  /*
	  |--------------------------------------------------------------------------
	  | Global Header Lead  Typography and Styles
	  |--------------------------------------------------------------------------
	  */
	   
	  array(
        'id'          => 'ut_global_lead_menu',
		'subid'		  => 'ut_global_lead_settings',
        'label'       => 'Global Header Slogan Styles',
        'type'        => 'section_headline',
        'section'     => 'ut_typography_settings'
      ),
	  
	  array(
        'id'          => 'ut_global_lead_headline',
        'label'       => 'Global Header Slogan Styles',
        'desc'        => '<h2 class="section-headline">Global Header Slogan Styles</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_lead_settings',
      ),
	  
	  array(
        'id'          => 'ut_global_lead_font_type',
        'label'       => 'Choose Font Source',
        'desc'        => '',
        'type'        => 'select_group',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_lead_settings',
		'std'		  => 'ut-font',
        'choices'     => array( 
		  array(
            'value'       => 'ut-font',
			'for'		  => 'ut_lead_font_style',
            'label'       => 'Theme Font'
          ),
          array(
            'value'       => 'ut-google',
			'for'		  => 'ut_google_lead_font_style',
            'label'       => 'Google Font'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_google_lead_font_style',
        'label'       => 'Global Header Slogan Font Style',
        'type'        => 'googlefont',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_lead_settings'
      ), 
	  
	  array(
        'id'          => 'ut_lead_font_style',
        'label'       => 'Global Header Slogan Font Style',
        'desc'        => '<a href="#" class="ut-font-preview">Global Header Slogan Font Style</a>',
        'type'        => 'select',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_lead_settings',
        'choices'     => array( 
		  array(
            'value'       => 'extralight',
            'label'       => 'Extra Light'
          ),
          array(
            'value'       => 'light',
            'label'       => 'Light'
          ),
          array(
            'value'       => 'regular',
            'label'       => 'Regular'
          ),
          array(
            'value'       => 'medium',
            'label'       => 'Medium'
          ),
          array(
            'value'       => 'semibold',
            'label'       => 'Semi Bold'
          ),
          array(
            'value'       => 'bold',
            'label'       => 'Bold'
          )
        ),
	  ),
	  
	  /*
	  |--------------------------------------------------------------------------
	  | Global Headline Font Styles
	  |--------------------------------------------------------------------------
	  */
	  array(
        'id'          => 'ut_global_htags_menu',
		'subid'       => 'ut_global_htags_settings',
        'label'       => 'Global Content Headlines',
        'type'        => 'section_headline',
        'section'     => 'ut_typography_settings'
      ),
	  
	  array(
        'id'          => 'ut_global_htags_headline_h1',
        'label'       => 'H1',
        'desc'        => '<h2 class="section-headline">H1</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings',
      ),
	  
	  array(
        'id'          => 'ut_global_h1_font_type',
        'label'       => 'Choose font source for H1 tags',
        'desc'        => '',
        'type'        => 'select_group',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings',
		'std'		  => 'ut-font',
        'choices'     => array( 
		  array(
            'value'       => 'ut-font',
			'for'		  => 'ut_h1_font_style',
            'label'       => 'Theme Font'
          ),
          array(
            'value'       => 'ut-google',
			'for'		  => 'ut_h1_google_font_style',
            'label'       => 'Google Font'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_h1_google_font_style',
        'label'       => 'Content H1 Font Style',
        'type'        => 'googlefont',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings'
      ), 
	  
	  array(
        'id'          => 'ut_h1_font_style',
        'label'       => 'Content H1 Font Style',
        'desc'        => '<strong>(optional)</strong> - default semibold. This option will affect content headlines. <br /><br /><a href="#" class="ut-font-preview">Preview Font Style</a>',
        'std'         => 'semibold',
        'type'        => 'select',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings',
        'choices'     => array( 
          array(
            'value'       => 'extralight',
            'label'       => 'Extralight'
          ),
          array(
            'value'       => 'light',
            'label'       => 'Light'
          ),
          array(
            'value'       => 'regular',
            'label'       => 'Regular'
          ),
          array(
            'value'       => 'medium',
            'label'       => 'Medium'
          ),
          array(
            'value'       => 'semibold',
            'label'       => 'Semi Bold'
          ),
          array(
            'value'       => 'bold',
            'label'       => 'Bold'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_global_htags_headline_h2',
        'label'       => 'H2',
        'desc'        => '<h2 class="section-headline">H2</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings',
      ),
	  	  
	  array(
        'id'          => 'ut_global_h2_font_type',
        'label'       => 'Choose font source for H2 tags',
        'desc'        => '',
        'type'        => 'select_group',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings',
		'std'		  => 'ut-font',
        'choices'     => array( 
		  array(
            'value'       => 'ut-font',
			'for'		  => 'ut_h2_font_style',
            'label'       => 'Theme Font'
          ),
          array(
            'value'       => 'ut-google',
			'for'		  => 'ut_h2_google_font_style',
            'label'       => 'Google Font'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_h2_google_font_style',
        'label'       => 'Content H2 Font Style',
        'type'        => 'googlefont',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings'
      ), 
	  
	  array(
        'id'          => 'ut_h2_font_style',
        'label'       => 'Content H2 Font Style',
        'desc'        => '<strong>(optional)</strong> - default semibold. This option will affect content headlines. <br /><br /><a href="#" class="ut-font-preview">Preview Font Style</a>',
        'std'         => 'semibold',
        'type'        => 'select',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings',
        'choices'     => array( 
          array(
            'value'       => 'extralight',
            'label'       => 'Extralight'
          ),
          array(
            'value'       => 'light',
            'label'       => 'Light'
          ),
          array(
            'value'       => 'regular',
            'label'       => 'Regular'
          ),
          array(
            'value'       => 'medium',
            'label'       => 'Medium'
          ),
          array(
            'value'       => 'semibold',
            'label'       => 'Semi Bold'
          ),
          array(
            'value'       => 'bold',
            'label'       => 'Bold'
          )
        ),
      ),
	 
	  array(
        'id'          => 'ut_global_htags_headline_h3',
        'label'       => 'H3',
        'desc'        => '<h2 class="section-headline">H3</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings',
      ),
	  	  
	  array(
        'id'          => 'ut_global_h3_font_type',
        'label'       => 'Choose font source for H3 tags',
        'desc'        => '',
        'type'        => 'select_group',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings',
		'std'		  => 'ut-font',
        'choices'     => array( 
		  array(
            'value'       => 'ut-font',
			'for'		  => 'ut_h3_font_style',
            'label'       => 'Theme Font'
          ),
          array(
            'value'       => 'ut-google',
			'for'		  => 'ut_h3_google_font_style',
            'label'       => 'Google Font'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_h3_google_font_style',
        'label'       => 'Content H3 Font Style',
        'type'        => 'googlefont',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings'
      ), 
	  
	  array(
        'id'          => 'ut_h3_font_style',
        'label'       => 'Content H3 Font Style',
        'desc'        => '<strong>(optional)</strong> - default semibold. This option will affect content headlines. <br /><br /><a href="#" class="ut-font-preview">Preview Font Style</a>',
        'std'         => 'semibold',
        'type'        => 'select',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings',
        'choices'     => array( 
          array(
            'value'       => 'extralight',
            'label'       => 'Extralight'
          ),
          array(
            'value'       => 'light',
            'label'       => 'Light'
          ),
          array(
            'value'       => 'regular',
            'label'       => 'Regular'
          ),
          array(
            'value'       => 'medium',
            'label'       => 'Medium'
          ),
          array(
            'value'       => 'semibold',
            'label'       => 'Semi Bold'
          ),
          array(
            'value'       => 'bold',
            'label'       => 'Bold'
          )
        ),
      ), 
	  
	  array(
        'id'          => 'ut_global_htags_headline_h4',
        'label'       => 'H4',
        'desc'        => '<h2 class="section-headline">H4</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings',
      ),
	  
	  array(
        'id'          => 'ut_global_h4_font_type',
        'label'       => 'Choose font source for H4 tags',
        'desc'        => '',
        'type'        => 'select_group',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings',
		'std'		  => 'ut-font',
        'choices'     => array( 
		  array(
            'value'       => 'ut-font',
			'for'		  => 'ut_h4_font_style',
            'label'       => 'Theme Font'
          ),
          array(
            'value'       => 'ut-google',
			'for'		  => 'ut_h4_google_font_style',
            'label'       => 'Google Font'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_h4_google_font_style',
        'label'       => 'Content H4 Font Style',
        'type'        => 'googlefont',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings'
      ), 
	  
	  array(
        'id'          => 'ut_h4_font_style',
        'label'       => 'Content H4 Font Style',
        'desc'        => '<strong>(optional)</strong> - default semibold. This option will affect content headlines. <br /><br /><a href="#" class="ut-font-preview">Preview Font Style</a>',
        'std'         => 'semibold',
        'type'        => 'select',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings',
        'choices'     => array( 
          array(
            'value'       => 'extralight',
            'label'       => 'Extralight'
          ),
          array(
            'value'       => 'light',
            'label'       => 'Light'
          ),
          array(
            'value'       => 'regular',
            'label'       => 'Regular'
          ),
          array(
            'value'       => 'medium',
            'label'       => 'Medium'
          ),
          array(
            'value'       => 'semibold',
            'label'       => 'Semi Bold'
          ),
          array(
            'value'       => 'bold',
            'label'       => 'Bold'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_global_htags_headline_h5',
        'label'       => 'H5',
        'desc'        => '<h2 class="section-headline">H5</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings',
      ),
	  	  
	  array(
        'id'          => 'ut_global_h5_font_type',
        'label'       => 'Choose font source for H5 tags',
        'desc'        => '',
        'type'        => 'select_group',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings',
		'std'		  => 'ut-font',
        'choices'     => array( 
		  array(
            'value'       => 'ut-font',
			'for'		  => 'ut_h5_font_style',
            'label'       => 'Theme Font'
          ),
          array(
            'value'       => 'ut-google',
			'for'		  => 'ut_h5_google_font_style',
            'label'       => 'Google Font'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_h5_google_font_style',
        'label'       => 'Content H5 Font Style',
        'type'        => 'googlefont',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings'
      ), 
	  
	  array(
        'id'          => 'ut_h5_font_style',
        'label'       => 'Content H5 Font Style',
        'desc'        => '<strong>(optional)</strong> - default semibold. This option will affect content headlines. <br /><br /><a href="#" class="ut-font-preview">Preview Font Style</a>',
        'std'         => 'semibold',
        'type'        => 'select',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings',
        'choices'     => array( 
          array(
            'value'       => 'extralight',
            'label'       => 'Extralight'
          ),
          array(
            'value'       => 'light',
            'label'       => 'Light'
          ),
          array(
            'value'       => 'regular',
            'label'       => 'Regular'
          ),
          array(
            'value'       => 'medium',
            'label'       => 'Medium'
          ),
          array(
            'value'       => 'semibold',
            'label'       => 'Semi Bold'
          ),
          array(
            'value'       => 'bold',
            'label'       => 'Bold'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_global_htags_headline_h6',
        'label'       => 'H6',
        'desc'        => '<h2 class="section-headline">H6</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings',
      ),
	  
	  array(
        'id'          => 'ut_global_h6_font_type',
        'label'       => 'Choose font source for H6 tags',
        'desc'        => '',
        'type'        => 'select_group',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings',
		'std'		  => 'ut-font',
        'choices'     => array( 
		  array(
            'value'       => 'ut-font',
			'for'		  => 'ut_h6_font_style',
            'label'       => 'Theme Font'
          ),
          array(
            'value'       => 'ut-google',
			'for'		  => 'ut_h6_google_font_style',
            'label'       => 'Google Font'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_h6_google_font_style',
        'label'       => 'Content H6 Font Style',
        'type'        => 'googlefont',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings'
      ), 
	  
	  array(
        'id'          => 'ut_h6_font_style',
        'label'       => 'Content H6 Font Style',
        'desc'        => '<strong>(optional)</strong> - default semibold. This option will affect content headlines. <br /><br /><a href="#" class="ut-font-preview">Preview Font Style</a>',
        'std'         => 'semibold',
        'type'        => 'select',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_global_htags_settings',
        'choices'     => array( 
          array(
            'value'       => 'extralight',
            'label'       => 'Extralight'
          ),
          array(
            'value'       => 'light',
            'label'       => 'Light'
          ),
          array(
            'value'       => 'regular',
            'label'       => 'Regular'
          ),
          array(
            'value'       => 'medium',
            'label'       => 'Medium'
          ),
          array(
            'value'       => 'semibold',
            'label'       => 'Semi Bold'
          ),
          array(
            'value'       => 'bold',
            'label'       => 'Bold'
          )
        ),
      ),
	  
	  /*
	  |--------------------------------------------------------------------------
	  | Contact Section Header Font Style
	  |--------------------------------------------------------------------------
	  */
	  array(
        'id'          => 'ut_csection_header_font_menu',
		'subid'       => 'ut_csection_header_font_setting',
        'label'       => 'Contact Section Header',
        'type'        => 'section_headline',
        'section'     => 'ut_typography_settings'
      ),
	  
	  array(
        'id'          => 'ut_csection_header_font_headline',
        'label'       => 'Contact Section Header',
        'desc'        => '<h2 class="section-headline">Contact Section Header</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_csection_header_font_setting',
      ),
	  
	  array(
        'id'          => 'ut_csection_header_font_type',
        'label'       => 'Choose font source for Header',
        'desc'        => '',
        'type'        => 'select_group',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_csection_header_font_setting',
		'std'		  => 'ut-font',
        'choices'     => array( 
		  array(
            'value'       => 'ut-font',
			'for'		  => 'ut_csection_header_font_style',
            'label'       => 'Theme Font'
          ),
          array(
            'value'       => 'ut-google',
			'for'		  => 'ut_csection_header_google_font_style',
            'label'       => 'Google Font'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_csection_header_google_font_style',
        'label'       => 'Header Font Style',
        'type'        => 'googlefont',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_csection_header_font_setting'
      ), 
	  
	  array(
        'id'          => 'ut_csection_header_font_style',
        'label'       => 'Header Font Style',
        'desc'        => '<strong>(optional)</strong> - default : Typography -> Global Header Font Style <br /><br /><a href="#" class="ut-font-preview">Preview Font Styles</a>',
        'type'        => 'select',
        'section'     => 'ut_typography_settings',
		'subsection'  => 'ut_csection_header_font_setting',
        'choices'     => array( 
          
		  array(
            'label'       => 'Default',
            'value'       => 'global'
          ),
		  
		  array(
            'value'       => 'extralight',
            'label'       => 'Extra Light'
          ),
          array(
            'value'       => 'light',
            'label'       => 'Light'
          ),
          array(
            'value'       => 'regular',
            'label'       => 'Regular'
          ),
          array(
            'value'       => 'medium',
            'label'       => 'Medium'
          ),
          array(
            'value'       => 'semibold',
            'label'       => 'Semi Bold'
          ),
          array(
            'value'       => 'bold',
            'label'       => 'Bold'
          )
        ),
      ),
	  
	  /*
	  |--------------------------------------------------------------------------
	  | Hero Front Settings
	  |--------------------------------------------------------------------------
	  */
      array(
        'id'          => 'ut_front_hero_setting_menu',
		'subid'		  => 'ut_front_hero_settings',
        'label'       => 'Hero Settings',
        'type'        => 'section_headline',
        'section'     => 'ut_front_page_settings',
      ),
	  
	  array(
        'id'          => 'ut_front_hero_setting_headline',
        'label'       => 'Hero Settings',
        'desc'        => '<h2 class="section-headline">Hero Settings</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_settings',
      ),
	  
	  array(
        'id'          => 'ut_front_custom_slogan',
        'label'       => 'Custom Hero HTML',
        'desc'        => 'This field appears above the front header caption slogan',
        'type'        => 'textarea',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_settings',
        'rows'        => '10'
      ),
	  
      array(
        'id'          => 'ut_front_expertise_slogan',
        'label'       => 'Hero Caption Slogan',
        'desc'        => 'This field appears above the Hero Caption',
        'type'        => 'textarea-simple',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_settings',
        'rows'        => '5'
      ),
      
	  array(
        'id'          => 'ut_front_company_slogan',
        'label'       => 'Hero Caption Title',
        'desc'        => 'This field also accepts HTML tags and shortcodes such as word rotator for example',
        'type'        => 'textarea-simple',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_settings',
        'rows'        => '5'
      ),
	  
      array(
        'id'          => 'ut_front_company_slogan_color',
        'label'       => 'Color',
        'desc'        => '<strong>(optional)</strong> - set\'s an alternative for front header slogan',
        'type'        => 'colorpicker',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_settings'
      ),
	  
      array(
        'id'          => 'ut_front_catchphrase',
        'label'       => 'Hero Caption Description',
        'desc'        => 'This field appears beneath the Hero Caption',
        'type'        => 'textarea-simple',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_settings',
        'rows'        => '5'
      ),
	  
	  array(
        'id'          => 'ut_front_expertise_slogan_color',
        'label'       => 'Color',
        'desc'        => '<strong>(optional)</strong> - set\'s an alternative for front header description',
        'type'        => 'colorpicker',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_settings'
      ),      
      
	  array(
        'id'          => 'ut_front_scroll_to_main',
        'label'       => 'Scroll to Content Text',
        'desc'        => 'Enter your desired text or leave this field empty to hide the scroll to button',
        'type'        => 'text',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_settings'
      ),
	  
	  array(
        'id'          => 'ut_front_scroll_to_main_target',
        'label'       => 'Scroll to Content Target',
        'desc'        => 'Select the page, section you like to scroll to. Leave empty to scroll to the first section.',
        'type'        => 'section-select',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_settings'
      ),
	  
	  /*array(
        'id'          => 'ut_front_scroll_to_main_style',
        'label'       => 'Choose button style ( requires unitedthemes shortcode plugin )',
        'desc'        => '',
        'type'        => 'select',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_settings',
		'std'		  => 'ut-font',
        'choices'     => array( 
		  array(
            'value'       => 'red',
            'label'       => 'Red'
          ),
          array(
            'value'       => 'turquoise',
            'label'       => 'Turquoise'
          ),
		  array(
            'value'       => 'green',
            'label'       => 'Green'
          ),
		  array(
            'value'       => 'blue',
            'label'       => 'Blue'
          ),
		  array(
            'value'       => 'mid-blue',
            'label'       => 'Mid Blue'
          ),
		  array(
            'value'       => 'yellow',
            'label'       => 'Yellow'
          ),
		  array(
            'value'       => 'purple',
            'label'       => 'Purple'
          ),
		  array(
            'value'       => 'orange',
            'label'       => 'Orange'
          ),
		  array(
            'value'       => 'theme-btn',
            'label'       => 'Theme Button'
          )
		  
        ),
      ),*/
	  
	  /*
	  |--------------------------------------------------------------------------
	  | Hero Styling
	  |--------------------------------------------------------------------------
	  */
	  
	  array(
        'id'          => 'ut_front_hero_styling_menu',
		'subid'		  => 'ut_front_hero_styling_settings',
        'label'       => 'Hero Styling',
        'type'        => 'section_headline',
        'section'     => 'ut_front_page_settings',
      ),
	  
	  array(
        'id'          => 'ut_front_hero_styling_headline',
        'label'       => 'Hero Styling',
        'desc'        => '<h2 class="section-headline">Hero Styling</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_styling_settings',
      ),
	  
	  array(
        'id'          => 'ut_front_page_hero_style',
        'label'       => 'Hero Style',
        'desc'        => 'Choose between 10 different hero header styles. If you are using a slider as your desired header type, you can define an individual style for each slide.<br /><br /><a href="#" class="ut-hero-preview">Preview Hero Styles</a>',
        'type'        => 'select',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_styling_settings',
        'choices'     => array( 
          array(
            'value'       => 'ut-hero-style-1',
            'label'       => 'Style One',
            'src'         => ''
          ),
          array(
            'value'       => 'ut-hero-style-2',
            'label'       => 'Style Two'
          ),
          array(
            'value'       => 'ut-hero-style-3',
            'label'       => 'Style Three'
          ),
          array(
            'value'       => 'ut-hero-style-4',
            'label'       => 'Style Four'
          ),
          array(
            'value'       => 'ut-hero-style-5',
            'label'       => 'Style Five'
          ),
          array(
            'value'       => 'ut-hero-style-6',
            'label'       => 'Style Six'
          ),
          array(
            'value'       => 'ut-hero-style-7',
            'label'       => 'Style Seven'
          ),
          array(
            'value'       => 'ut-hero-style-8',
            'label'       => 'Style Eight'
          ),
          array(
            'value'       => 'ut-hero-style-9',
            'label'       => 'Style Nine'
          ),
          array(
            'value'       => 'ut-hero-style-10',
            'label'       => 'Style Ten'
          ),
          array(
            'value'       => 'ut-hero-style-11',
            'label'       => 'Style Eleven'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_front_page_hero_align',
        'label'       => 'Choose Hero Alignment',
        'type'        => 'select',
		'desc'		  => '',
		'std'		  => 'center',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_styling_settings',
        'choices'     => array( 
          array(
            'value'       => 'center',
            'label'       => 'Center'
          ),
          array(
            'value'       => 'left',
            'label'       => 'Left'
          ),
		  array(
            'value'       => 'right',
            'label'       => 'Right'
          )
        ),
      ),
	  
      array(
        'id'          => 'ut_front_page_overlay',
        'label'       => 'Activate Overlay',
        'desc'        => '<strong>(optional)</strong>',
        'std'         => 'on',
        'type'        => 'select',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_styling_settings',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	  
      array(
        'id'          => 'ut_front_page_overlay_pattern',
        'label'       => 'Activate Overlay Pattern',
        'desc'        => '<strong>(optional)</strong>',
        'std'         => 'on',
        'type'        => 'select',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_styling_settings',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_front_page_overlay_pattern_style',
        'label'       => 'Overlay Pattern Style',
        'desc'        => '<strong>(optional)</strong>',
        'std'         => 'style_one',
        'type'        => 'select',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_styling_settings',
        'choices'     => array( 
          array(
            'value'       => 'style_one',
            'label'       => 'Style One'
          ),
          array(
            'value'       => 'style_two',
            'label'       => 'Style Two'
          )
        ),
      ),
	  
      array(
        'id'          => 'ut_front_page_overlay_color',
        'label'       => 'Overlay Color',
        'desc'        => '<strong>(optional)</strong>',
        'type'        => 'colorpicker',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_styling_settings',
      ),
	  
      array(
        'id'          => 'ut_front_page_overlay_color_opacity',
        'label'       => 'Color Opacity',
        'desc'        => '<strong>(optional)</strong>',
        'type'        => 'numeric-slider',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_styling_settings',
        'min_max_step'=> '0,1,0.1'
      ),	  
	  
	  /*
	  |--------------------------------------------------------------------------
	  | Hero Type
	  |--------------------------------------------------------------------------
	  */
	  
	  array(
        'id'          => 'ut_front_hero_background_menu',
		'subid'       => 'ut_front_hero_background_settings',
        'label'       => 'Hero Type',
        'type'        => 'section_headline',
        'section'     => 'ut_front_page_settings'
      ),
	  
	  array(
        'id'          => 'ut_front_hero_background_headline',
        'label'       => 'Hero Type',
        'desc'        => '<h2 class="section-headline">Hero Type</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_background_settings',
      ),
	  
	  array(
        'id'          => 'ut_front_page_header_type',
        'label'       => 'Choose Hero Type',
        'type'        => 'select',
		'desc'		  => 'If you choose "Video Header / Background", please make sure you have set a background video inside the "Video" tab',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_background_settings',
        'choices'     => array( 
          array(
            'value'       => 'image',
            'label'       => 'Single Background Image'
          ),
		  array(
            'value'       => 'animatedimage',
            'label'       => 'Animated Single Background Image'
          ),
          array(
            'value'       => 'slider',
            'label'       => 'Background Image Slider'
          ),
          array(
            'value'       => 'transition',
            'label'       => 'Fancy Image Slider'
          ),
		  array(
            'value'       => 'tabs',
            'label'       => 'Tablet Slider'
          ),
          array(
            'value'       => 'video',
            'label'       => 'Video Header / Background'
          ),
		  array(
            'value'       => 'custom',
            'label'       => 'Custom Shortcode'
          ),
		  array(
            'value'       => 'dynamic',
            'label'       => 'Dynamic Hero ( dynamic height )'
          )
        ),
      ),
	  
	  /*
	  | Image Type
	  */
	  
	  array(
        'id'          => 'ut_front_header_parallax',
        'label'       => 'Activate Parallax',
        'type'        => 'select',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_background_settings',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_front_header_rain',
        'label'       => 'Activate Rain Effect',
        'type'        => 'select',
        'section'     => 'ut_front_page_settings',
		'std'		  => 'off',
		'subsection'  => 'ut_front_hero_background_settings',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_front_header_rain_sound',
        'label'       => 'Activate Rain Sound',
        'type'        => 'select',
        'section'     => 'ut_front_page_settings',
		'std'		  => 'off',
		'subsection'  => 'ut_front_hero_background_settings',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	   
	  array(
        'id'          => 'ut_front_header_image',
        'label'       => 'Background Image',
        'desc'        => 'Keep in mind, that you are not able to set a background position or attachment if the parallax option above has been set to "on"',
        'type'        => 'background',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_background_settings',
      ),
	  
	  /*
	  | Animated Image Type
	  */
	  array(
        'id'          => 'ut_front_header_animatedimage',
        'label'       => 'Animated Background Image',
        'desc'        => '',
        'type'        => 'upload',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_background_settings',
      ),
	  
	  /*
	  | Slider Type
	  */
	  
	  array(
        'id'          => 'front_animation_speed',
        'label'       => 'Animation Speed',
        'desc'        => 'set the speed of animations, in milliseconds',
        'type'        => 'text',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_background_settings',
      ),
	  
	  array(
        'id'          => 'front_slideshow_speed',
        'label'       => 'Slideshow Speed',
        'desc'        => 'set the speed of the slideshow cycling, in milliseconds',
        'type'        => 'text',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_background_settings',
      ),
	  
	  array(
        'id'          => 'ut_front_page_slider',
        'label'       => 'Slider',
        'type'        => 'list-item',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_background_settings',
        'settings'    => array( 
          array(
            'id'          => 'image',
            'label'       => 'Image',
            'type'        => 'upload',
          ),
          array(
            'id'          => 'style',
            'label'       => 'Caption / Hero Style',
            'type'        => 'select',
            'choices'     => array( 
                   array(
					'value'       => 'ut-hero-style-1',
					'label'       => 'Style One'
				  ),
				  array(
					'value'       => 'ut-hero-style-2',
					'label'       => 'Style Two'
				  ),
				  array(
					'value'       => 'ut-hero-style-3',
					'label'       => 'Style Three'
				  ),
				  array(
					'value'       => 'ut-hero-style-4',
					'label'       => 'Style Four'
				  ),
				  array(
					'value'       => 'ut-hero-style-5',
					'label'       => 'Style Five'
				  ),
				  array(
					'value'       => 'ut-hero-style-6',
					'label'       => 'Style Six'
				  ),
				  array(
					'value'       => 'ut-hero-style-7',
					'label'       => 'Style Seven'
				  ),
				  array(
					'value'       => 'ut-hero-style-8',
					'label'       => 'Style Eight'
				  ),
				  array(
					'value'       => 'ut-hero-style-9',
					'label'       => 'Style Nine'
				  ),
				  array(
					'value'       => 'ut-hero-style-10',
					'label'       => 'Style Ten'
				  ),
                  array(
                    'value'       => 'ut-hero-style-11',
                    'label'       => 'Style Eleven'
                  )
            ),
          ),
		  array(
			'id'          => 'font_style',
			'label'       => 'Caption / Hero Font Style',
			'desc'		  => 'Setting this option to default will load the hero font style ( which has been set under Front Page Settings -> Hero Settings).',
			'type'        => 'select',
			'std'		  => 'global',
			'choices'     => array( 
		   	  array(
				'value'       => 'global',
				'label'       => 'Default'
			  ),
			  array(
				'value'       => 'extralight',
				'label'       => 'Extra Light'
			  ),
			  array(
				'value'       => 'light',
				'label'       => 'Light'
			  ),
			  array(
				'value'       => 'regular',
				'label'       => 'Regular'
			  ),
			  array(
				'value'       => 'medium',
				'label'       => 'Medium'
			  ),
			  array(
				'value'       => 'semibold',
				'label'       => 'Semi Bold'
			  ),
			  array(
				'value'       => 'bold',
				'label'       => 'Bold'
			  )
			),
		  ),
		  array(
            'id'          => 'direction',
            'label'       => 'Caption Direction Animation',
			'std'		  => 'top',
            'type'        => 'select',
            'choices'     => array( 
                  
				  array(
					'value'       => 'top',
					'label'       => 'Top'
				  ),
				  array(
					'value'       => 'left',
					'label'       => 'Left'
				  ),
				  array(
					'value'       => 'right',
					'label'       => 'Right'
				  ),
				  array(
					'value'       => 'bottom',
					'label'       => 'Bottom'
				  )
				 
            ),
          ),
		  array(
            'id'          => 'expertise',
            'label'       => 'Header Caption Slogan',
            'type'        => 'textarea-simple',
            'rows'        => '3'
          ),
          array(
            'id'          => 'description',
            'label'       => 'Header Caption',
            'type'        => 'textarea-simple',
            'rows'        => '3'
          ),
          array(
            'id'          => 'catchphrase',
            'label'       => 'Header Caption Description',
            'type'        => 'textarea-simple',
            'rows'        => '3'
          ),
		  array(
            'id'          => 'link',
            'label'       => 'Link',
            'type'        => 'text',
            'rows'        => '3'
          ),
		  array(
            'id'          => 'link_description',
            'label'       => 'Link Button Text',
            'type'        => 'text'
		  )
        )
      ),	
	  
      /*
	  | Fancy Slider
	  */
      
      array(
        'id'          => 'ut_front_page_fancy_slider',
        'label'       => 'Fancy Slider',
        'type'        => 'list-item',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_background_settings',
        'settings'    => array( 
          array(
            'id'          => 'image',
            'label'       => 'Image',
            'type'        => 'upload',
          ),
          array(
            'id'          => 'style',
            'label'       => 'Caption / Hero Style',
            'type'        => 'select',
            'choices'     => array( 
                   array(
					'value'       => 'ut-hero-style-1',
					'label'       => 'Style One'
				  ),
				  array(
					'value'       => 'ut-hero-style-2',
					'label'       => 'Style Two'
				  ),
				  array(
					'value'       => 'ut-hero-style-3',
					'label'       => 'Style Three'
				  ),
				  array(
					'value'       => 'ut-hero-style-4',
					'label'       => 'Style Four'
				  ),
				  array(
					'value'       => 'ut-hero-style-5',
					'label'       => 'Style Five'
				  ),
				  array(
					'value'       => 'ut-hero-style-6',
					'label'       => 'Style Six'
				  ),
				  array(
					'value'       => 'ut-hero-style-7',
					'label'       => 'Style Seven'
				  ),
				  array(
					'value'       => 'ut-hero-style-8',
					'label'       => 'Style Eight'
				  ),
				  array(
					'value'       => 'ut-hero-style-9',
					'label'       => 'Style Nine'
				  ),
				  array(
					'value'       => 'ut-hero-style-10',
					'label'       => 'Style Ten'
				  ),
                  array(
                    'value'       => 'ut-hero-style-11',
                    'label'       => 'Style Eleven'
                  )
            ),
          ),
		  array(
			'id'          => 'font_style',
			'label'       => 'Caption / Hero Font Style',
			'desc'		  => 'Setting this option to default will load the hero font style ( which has been set under Front Page Settings -> Hero Settings ).',
			'type'        => 'select',
			'std'		  => 'global',
			'choices'     => array( 
		   	  array(
				'value'       => 'global',
				'label'       => 'Default'
			  ),
			  array(
				'value'       => 'extralight',
				'label'       => 'Extra Light'
			  ),
			  array(
				'value'       => 'light',
				'label'       => 'Light'
			  ),
			  array(
				'value'       => 'regular',
				'label'       => 'Regular'
			  ),
			  array(
				'value'       => 'medium',
				'label'       => 'Medium'
			  ),
			  array(
				'value'       => 'semibold',
				'label'       => 'Semi Bold'
			  ),
			  array(
				'value'       => 'bold',
				'label'       => 'Bold'
			  )
			),
		  ),
           array(
            'id'          => 'align',
            'label'       => 'Choose Caption Alignment',
            'type'        => 'select',
            'std'		  => 'left',
            'choices'     => array( 
              array(
                'value'       => 'center',
                'label'       => 'Center'
              ),
              array(
                'value'       => 'left',
                'label'       => 'Left'
              ),
              array(
                'value'       => 'right',
                'label'       => 'Right'
              )
            ),
          ),
		  array(
            'id'          => 'expertise',
            'label'       => 'Header Caption Slogan',
            'type'        => 'textarea-simple',
            'rows'        => '3'
          ),
          array(
            'id'          => 'description',
            'label'       => 'Header Caption',
            'type'        => 'textarea-simple',
            'rows'        => '3'
          ),
          array(
            'id'          => 'catchphrase',
            'label'       => 'Header Caption Description',
            'type'        => 'textarea-simple',
            'rows'        => '3'
          ),
		  array(
            'id'          => 'link',
            'label'       => 'Link',
            'type'        => 'text',
            'rows'        => '3'
          ),
          array(
            'id'          => 'scroll_to_target',
            'label'       => 'Scroll to Content Target',
            'desc'        => 'Select the page, section you like to scroll to. Leave empty to scroll to the first section.',
            'type'        => 'section-select',
          ),
		  array(
            'id'          => 'link_description',
            'label'       => 'Link Button Text',
            'type'        => 'text'
		  )
        )
      ),
      
      array(
		'id'          => 'front_fancy_slider_effect',
		'label'       => 'Slide Effect',
		'desc'		  => '',
		'type'        => 'select',
		'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_background_settings',
		'std'		  => 'fxSoftScale',
		'choices'     => array( 
		  array(
			'value'       => 'fxSoftScale',
			'label'       => 'Soft scale'
		  ),
		  array(
			'value'       => 'fxPressAway',
			'label'       => 'Press away'
		  ),
		  array(
			'value'       => 'fxSideSwing',
			'label'       => 'Side Swing'
		  ),
		  array(
			'value'       => 'fxFortuneWheel',
			'label'       => 'Fortune wheel'
		  ),
		  array(
			'value'       => 'fxSwipe',
			'label'       => 'Swipe'
		  ),
		  array(
			'value'       => 'fxPushReveal',
			'label'       => 'Push reveal'
		  ),
		  array(
			'value'       => 'fxSnapIn',
			'label'       => 'Snap in'
		  ),
          array(
			'value'       => 'fxLetMeIn',
			'label'       => 'Let me in'
		  ),
          array(
			'value'       => 'fxStickIt',
			'label'       => 'Stick it'
		  ),
          array(
			'value'       => 'fxArchiveMe',
			'label'       => 'Archive me'
		  ),
          array(
			'value'       => 'fxVGrowth',
			'label'       => 'Vertical growth'
		  ),
          array(
			'value'       => 'fxSlideBehind',
			'label'       => 'Slide Behind'
		  ),
          array(
			'value'       => 'fxSoftPulse',
			'label'       => 'Soft Pulse'
		  ),
          array(
			'value'       => 'fxEarthquake',
			'label'       => 'Earthquake'
		  ),
          array(
			'value'       => 'fxCliffDiving',
			'label'       => 'Cliff diving'
		  )
          
		),
	  ),	
      
      
      array(
        'id'          => 'front_fancy_slider_height',
        'label'       => 'Slider Height',
        'desc'        => 'set the height of the slideshow in pixel e.g. 600px',
        'type'        => 'text',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_background_settings',
      ),
      
      /*
	  | Image Tab Slider
	  */
	  
	  array(
        'id'          => 'ut_front_page_tabs_headline',
        'label'       => 'Tablet Headline',
        'type'        => 'text',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_background_settings',
      ),
	  
	  array(
		'id'          => 'ut_front_page_tabs_headline_style',
		'label'       => 'Tablet Headline Font Style',
		'desc'		  => '',
		'type'        => 'select',
		'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_background_settings',
		'std'		  => 'global',
		'choices'     => array( 
		  array(
			'value'       => 'global',
			'label'       => 'Default'
		  ),
		  array(
			'value'       => 'extralight',
			'label'       => 'Extra Light'
		  ),
		  array(
			'value'       => 'light',
			'label'       => 'Light'
		  ),
		  array(
			'value'       => 'regular',
			'label'       => 'Regular'
		  ),
		  array(
			'value'       => 'medium',
			'label'       => 'Medium'
		  ),
		  array(
			'value'       => 'semibold',
			'label'       => 'Semi Bold'
		  ),
		  array(
			'value'       => 'bold',
			'label'       => 'Bold'
		  )
		),
	  ),	  
	  
	  array(
        'id'          => 'ut_front_page_tabs',
        'label'       => 'Manage Tablet Images',
        'type'        => 'list-item',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_background_settings',
        'settings'    => array( 
          
		  array(
            'id'          => 'image',
            'label'       => 'Image',
            'type'        => 'upload',
          ),
         		 
          array(
            'id'          => 'description',
            'label'       => 'Image Description',
            'type'        => 'textarea-simple',
            'rows'        => '3'
          ),
		  
		  array(
            'id'          => 'link_one_url',
            'label'       => 'Left Button URL',
            'type'        => 'text'
		  ),
		  
		  array(
            'id'          => 'link_one_text',
            'label'       => 'Left Button Text',
            'type'        => 'text'
		  ),
		  
		    array(
            'id'          => 'link_two_url',
            'label'       => 'Right Button URL',
            'type'        => 'text'
		  ),
		  
		  array(
            'id'          => 'link_two_text',
            'label'       => 'Right Button Text',
            'type'        => 'text'
		  )
		  
        )
      ),
	  
	  /*
	  | Custom Shortcode
	  */
	  
	  array(
        'id'          => 'front_hero_custom_shortcode',
        'label'       => 'Custom Shortcode',
        'desc'        => '',
        'type'        => 'text',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_background_settings',
      ),
	  
	  /*
	  | Dynamic
	  */
	  
	  array(
        'id'          => 'front_hero_dynamic_content',
        'label'       => 'Custom Hero Content',
        'desc'        => '',
        'type'        => 'textarea',
        'section'     => 'ut_front_page_settings',
		'subsection'  => 'ut_front_hero_background_settings',
      ),
	  
	  /*
	  |--------------------------------------------------------------------------
	  | Hero Blog Setting
	  |--------------------------------------------------------------------------
	  */ 
	  
	  array(
        'id'          => 'ut_blog_hero_settings_menu',
		'subid'		  => 'ut_blog_hero_settings',
        'label'       => 'Hero Settings',
        'desc'        => '<h2 class="section-headline">Hero Settings</h2>',
        'type'        => 'section_headline',
        'section'     => 'ut_blog_settings'
      ),
	  
	  array(
        'id'          => 'ut_blog_hero_settings_headline',
        'label'       => 'Hero Settings',
        'desc'        => '<h2 class="section-headline">Hero Settings</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_settings',
      ),
	  
	  array(
        'id'          => 'ut_blog_custom_slogan',
        'label'       => 'Custom Hero HTML',
        'desc'        => 'This field appears above the front header caption slogan',
        'type'        => 'textarea',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_settings',
        'rows'        => '10'
      ),
	  
	  array(
        'id'          => 'ut_blog_expertise_slogan',
        'label'       => 'Caption Slogan',
        'desc'        => 'This field appears above the Hero Caption',
        'type'        => 'textarea-simple',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_settings',
        'rows'        => '5'
      ),
      
      array(
        'id'          => 'ut_blog_company_slogan',
        'label'       => 'Hero Caption',
        'desc'        => 'This field also accepts HTML tags and shortcodes such as word rotator for example',
        'type'        => 'textarea-simple',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_settings',
        'rows'        => '5'
	  ),
	  
      array(
        'id'          => 'ut_blog_company_slogan_color',
        'label'       => 'Color',
        'desc'        => '<strong>(optional)</strong>',
        'type'        => 'colorpicker',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_settings',
      ),
	  
      array(
        'id'          => 'ut_blog_catchphrase',
        'label'       => 'Caption Description',
        'desc'        => 'This field appears beneath the Hero Caption',
        'type'        => 'textarea-simple',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_settings',
        'rows'        => '5'
      ),
	  
      array(
        'id'          => 'ut_blog_expertise_slogan_color',
        'label'       => 'Color',
        'desc'        => '<strong>(optional)</strong>',
        'type'        => 'colorpicker',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_settings',
      ),
      
      array(
        'id'          => 'ut_blog_scroll_to_main',
        'label'       => 'Scroll to Blog Text',
        'desc'        => 'Enter your desired text or leave this field empty to hide the scroll to button',
        'type'        => 'text',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_settings',
      ),
	  
	  /*array(
        'id'          => 'ut_blog_scroll_to_main_style',
        'label'       => 'Choose button style ( requires unitedthemes shortcode plugin )',
        'desc'        => '',
        'type'        => 'select',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_settings',
		'std'		  => 'ut-font',
        'choices'     => array( 
		  array(
            'value'       => 'red',
            'label'       => 'Red'
          ),
          array(
            'value'       => 'turquoise',
            'label'       => 'Turquoise'
          ),
		  array(
            'value'       => 'green',
            'label'       => 'Green'
          ),
		  array(
            'value'       => 'blue',
            'label'       => 'Blue'
          ),
		  array(
            'value'       => 'mid-blue',
            'label'       => 'Mid Blue'
          ),
		  array(
            'value'       => 'yellow',
            'label'       => 'Yellow'
          ),
		  array(
            'value'       => 'purple',
            'label'       => 'Purple'
          ),
		  array(
            'value'       => 'orange',
            'label'       => 'Orange'
          ),
		  array(
            'value'       => 'theme-btn',
            'label'       => 'Theme Button'
          )
		  
        ),
      ),*/
	  
	  /*
	  |--------------------------------------------------------------------------
	  | Hero Blog Styling
	  |--------------------------------------------------------------------------
	  */
	  
	  array(
        'id'          => 'ut_blog_hero_styling_menu',
		'subid'		  => 'ut_blog_hero_styling_settings',
        'label'       => 'Hero Styling',
        'type'        => 'section_headline',
        'section'     => 'ut_blog_settings',
      ),
	  
	  array(
        'id'          => 'ut_blog_hero_styling_headline',
        'label'       => 'Hero Styling',
        'desc'        => '<h2 class="section-headline">Hero Styling</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_styling_settings',
      ),
	  
	  array(
        'id'          => 'ut_blog_hero_style',
        'label'       => 'Hero Style',
        'desc'        => 'Choose between 10 different hero header styles. If you are using a slider as your desired header type, you can define an individual style for each slide.<br /><br /><a href="#" class="ut-hero-preview">Preview Hero Styles</a>',
        'type'        => 'select',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_styling_settings',
        'choices'     => array( 
          array(
            'value'       => 'ut-hero-style-1',
            'label'       => 'Style One'
          ),
          array(
            'value'       => 'ut-hero-style-2',
            'label'       => 'Style Two'
          ),
          array(
            'value'       => 'ut-hero-style-3',
            'label'       => 'Style Three'
          ),
          array(
            'value'       => 'ut-hero-style-4',
            'label'       => 'Style Four'
          ),
          array(
            'value'       => 'ut-hero-style-5',
            'label'       => 'Style Five'
          ),
          array(
            'value'       => 'ut-hero-style-6',
            'label'       => 'Style Six'
          ),
          array(
            'value'       => 'ut-hero-style-7',
            'label'       => 'Style Seven',
            'src'         => ''
          ),
          array(
            'value'       => 'ut-hero-style-8',
            'label'       => 'Style Eight'
          ),
          array(
            'value'       => 'ut-hero-style-9',
            'label'       => 'Style Nine'
          ),
          array(
            'value'       => 'ut-hero-style-10',
            'label'       => 'Style Ten'
          ),
          array(
            'value'       => 'ut-hero-style-11',
            'label'       => 'Style Eleven'
          )
        ),
      ),
     
	  array(
        'id'          => 'ut_blog_hero_align',
        'label'       => 'Choose Hero Alignment',
        'type'        => 'select',
		'desc'		  => '',
		'std'		  => 'center',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_styling_settings',
        'choices'     => array( 
          array(
            'value'       => 'center',
            'label'       => 'Center'
          ),
          array(
            'value'       => 'left',
            'label'       => 'Left'
          ),
		  array(
            'value'       => 'right',
            'label'       => 'Right'
          )
        ),
      ),
	  
	  
	   array(
        'id'          => 'ut_blog_overlay',
        'label'       => 'Activate Overlay',
        'desc'        => '<strong>(optional)</strong>',
        'type'        => 'select',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_styling_settings',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	  
      array(
        'id'          => 'ut_blog_overlay_pattern',
        'label'       => 'Activate Overlay Pattern',
        'desc'        => '<strong>(optional)</strong>',
        'type'        => 'select',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_styling_settings',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	  
   	  array(
        'id'          => 'ut_blog_overlay_pattern_style',
        'label'       => 'Overlay Pattern Style',
        'desc'        => '<strong>(optional)</strong>',
		'std'		  => 'style_one',
        'type'        => 'select',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_styling_settings',
        'choices'     => array( 
          array(
            'value'       => 'style_one',
            'label'       => 'Style One'
          ),
          array(
            'value'       => 'style_two',
            'label'       => 'Style Two'
          )
        ),
      ),
	  
      array(
        'id'          => 'ut_blog_overlay_color',
        'label'       => 'Overlay Color',
        'desc'        => '<strong>(optional)</strong>',
        'type'        => 'colorpicker',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_styling_settings',
      ),
	  
      array(
        'id'          => 'ut_blog_overlay_color_opacity',
        'label'       => 'Color Opacity',
        'desc'        => '<strong>(optional)</strong>',
        'type'        => 'numeric-slider',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_styling_settings',
        'min_max_step'=> '0,1,0.1'
      ),
	  
	  /*
	  |--------------------------------------------------------------------------
	  | Hero Blog Type
	  |--------------------------------------------------------------------------
	  */
	  array(
        'id'          => 'ut_blog_hero_background_menu',
		'subid'       => 'ut_blog_hero_background_settings',
        'label'       => 'Hero Type',
        'type'        => 'section_headline',
        'section'     => 'ut_blog_settings'
      ),
	  
	  array(
        'id'          => 'ut_blog_hero_background_headline',
        'label'       => 'Hero Type',
        'desc'        => '<h2 class="section-headline">Hero Type</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_background_settings',
      ),
	  
	  array(
        'id'          => 'ut_blog_header_type',
        'label'       => 'Header Type',
		'desc'		  => 'If you choose "Video Header / Background", please make sure you have set a background video inside the "Video" tab.',
        'type'        => 'select',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_background_settings',
        'choices'     => array( 
          array(
            'value'       => 'image',
            'label'       => 'Single Background Image'
          ),
		  array(
            'value'       => 'animatedimage',
            'label'       => 'Animated Single Background Image'
          ),
          array(
            'value'       => 'slider',
            'label'       => 'Background Image Slider'
          ),
          array(
            'value'       => 'transition',
            'label'       => 'Fancy Transition Slider'
          ),
		  array(
            'value'       => 'tabs',
            'label'       => 'Tablet Slider'
          ),
          array(
            'value'       => 'video',
            'label'       => 'Video Header / Background'
          ),
		  array(
            'value'       => 'custom',
            'label'       => 'Custom Shortcode'
          ),
		  array(
            'value'       => 'dynamic',
            'label'       => 'Dynamic Hero ( dynamic height )'
          )
        ),
      ),
	  
	  /*
	  | Image Type
	  */
	  
	  array(
        'id'          => 'ut_blog_header_parallax',
        'label'       => 'Activate Parallax',
        'type'        => 'select',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_background_settings',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_blog_header_rain',
        'label'       => 'Activate Rain Effect',
        'type'        => 'select',
        'section'     => 'ut_blog_settings',
		'std'		  => 'off',
		'subsection'  => 'ut_blog_hero_background_settings', 
		'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_blog_header_rain_sound',
        'label'       => 'Activate Rain Sound',
        'type'        => 'select',
        'section'     => 'ut_blog_settings',
		'std'		  => 'off',
		'subsection'  => 'ut_blog_hero_background_settings',
		'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	  
	  
      array(
        'id'          => 'ut_blog_header_image',
        'label'       => 'Header Image',
        'desc'        => 'Keep in mind, that you are not able to set a background position or attachment if the parallax option above has been set to "on"',
        'type'        => 'background',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_background_settings'
      ),
	  
	  /*
	  | Animated Image Type
	  */
	  
	  array(
        'id'          => 'ut_blog_header_animatedimage',
        'label'       => 'Header Image',
        'desc'        => '',
        'type'        => 'upload',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_background_settings'
      ),
	  
	  /*
	  | Slider Type
	  */
	  
	   /*array(
        'id'          => 'blog_animation',
        'label'       => 'Slide Effect',
        'type'        => 'select',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_background_settings',
        'choices'     => array( 
          array(
            'value'       => 'fade',
            'label'       => 'Fade'
          ),
          array(
            'value'       => 'slide',
            'label'       => 'Slide'
          )
        ),
      ),*/
	  
      array(
        'id'          => 'blog_slideshow_speed',
        'label'       => 'Slideshow Speed',
        'desc'        => 'Set the speed of the slideshow cycling, in milliseconds',
        'type'        => 'text',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_background_settings'
      ),
	  
      array(
        'id'          => 'blog_animation_speed',
        'label'       => 'Animation Speed',
        'desc'        => 'Set the speed of animations, in milliseconds',
        'type'        => 'text',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_background_settings'
      ),
	  
	  array(
        'id'          => 'ut_blog_slider',
        'label'       => 'Blog Slider',
        'type'        => 'list-item',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_background_settings',
        'settings'    => array( 
          array(
            'id'          => 'image',
            'label'       => 'Image',
            'type'        => 'upload',
          ),
          array(
            'id'          => 'style',
            'label'       => 'Caption Style',
            'type'        => 'select',
            'choices'     => array( 
                  array(
					'value'       => 'ut-hero-style-1',
					'label'       => 'Style One',
					'src'         => ''
				  ),
				  array(
					'value'       => 'ut-hero-style-2',
					'label'       => 'Style Two'
				  ),
				  array(
					'value'       => 'ut-hero-style-3',
					'label'       => 'Style Three'
				  ),
				  array(
					'value'       => 'ut-hero-style-4',
					'label'       => 'Style Four'
				  ),
				  array(
					'value'       => 'ut-hero-style-5',
					'label'       => 'Style Five'
				  ),

				  array(
					'value'       => 'ut-hero-style-6',
					'label'       => 'Style Six'
				  ),
				  array(
					'value'       => 'ut-hero-style-7',
					'label'       => 'Style Seven'
				  ),
				  array(
					'value'       => 'ut-hero-style-8',
					'label'       => 'Style Eight'
				  ),
				  array(
					'value'       => 'ut-hero-style-9',
					'label'       => 'Style Nine'
				  ),
				  array(
					'value'       => 'ut-hero-style-10',
					'label'       => 'Style Ten'
				  ),
                  array(
                    'value'       => 'ut-hero-style-11',
                    'label'       => 'Style Eleven'
                  )
            ),
          ),
		  array(
			'id'          => 'font_style',
			'label'       => 'Caption Font Style',
			'desc'		  => 'Setting this option to default will load the hero font style ( which has been set under Blog Settings -> Hero Settings).',
			'type'        => 'select',
			'choices'     => array( 
			  array(
				'value'       => 'global',
				'label'       => 'Default'
			  ),
			  array(
				'value'       => 'extralight',
				'label'       => 'Extra Light'
			  ),
			  array(
				'value'       => 'light',
				'label'       => 'Light'
			  ),
			  array(
				'value'       => 'regular',
				'label'       => 'Regular'
			  ),
			  array(
				'value'       => 'medium',
				'label'       => 'Medium'
			  ),
			  array(
				'value'       => 'semibold',
				'label'       => 'Semi Bold'
			  ),
			  array(
				'value'       => 'bold',
				'label'       => 'Bold'
			  )
			),
		  ),
		  array(
            'id'          => 'direction',
            'label'       => 'Caption Direction Animation',
			'std'		  => 'top',
            'type'        => 'select',
            'choices'     => array( 
                  
				  array(
					'value'       => 'top',
					'label'       => 'Top'
				  ),
				  array(
					'value'       => 'left',
					'label'       => 'Left'
				  ),
				  array(
					'value'       => 'right',
					'label'       => 'Right'
				  ),
				  array(
					'value'       => 'bottom',
					'label'       => 'Bottom'
				  )
				 
            ),
          ),
		  array(
            'id'          => 'expertise',
            'label'       => 'Header Caption Slogan',
            'type'        => 'textarea-simple',
            'rows'        => '3'
          ),
          array(
            'id'          => 'description',
            'label'       => 'Header Caption',
            'type'        => 'textarea-simple',
            'rows'        => '3'
          ),
          array(
            'id'          => 'catchphrase',
            'label'       => 'Header Caption Description',
            'type'        => 'textarea-simple',
            'rows'        => '3'
          ),
		  array(
            'id'          => 'link',
            'label'       => 'Link',
            'type'        => 'text'
          ),
		  array(
            'id'          => 'link_description',
            'label'       => 'Link Button Text',
            'type'        => 'text'
		  )
        )
      ),	
	  
      /*
	  | Fancy Slider
	  */
      
      array(
        'id'          => 'ut_blog_fancy_slider',
        'label'       => 'Fancy Slider',
        'type'        => 'list-item',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_background_settings',
        'settings'    => array( 
          array(
            'id'          => 'image',
            'label'       => 'Image',
            'type'        => 'upload',
          ),
          array(
            'id'          => 'style',
            'label'       => 'Caption / Hero Style',
            'type'        => 'select',
            'choices'     => array( 
                   array(
					'value'       => 'ut-hero-style-1',
					'label'       => 'Style One'
				  ),
				  array(
					'value'       => 'ut-hero-style-2',
					'label'       => 'Style Two'
				  ),
				  array(
					'value'       => 'ut-hero-style-3',
					'label'       => 'Style Three'
				  ),
				  array(
					'value'       => 'ut-hero-style-4',
					'label'       => 'Style Four'
				  ),
				  array(
					'value'       => 'ut-hero-style-5',
					'label'       => 'Style Five'
				  ),
				  array(
					'value'       => 'ut-hero-style-6',
					'label'       => 'Style Six'
				  ),
				  array(
					'value'       => 'ut-hero-style-7',
					'label'       => 'Style Seven'
				  ),
				  array(
					'value'       => 'ut-hero-style-8',
					'label'       => 'Style Eight'
				  ),
				  array(
					'value'       => 'ut-hero-style-9',
					'label'       => 'Style Nine'
				  ),
				  array(
					'value'       => 'ut-hero-style-10',
					'label'       => 'Style Ten'
				  ),
                  array(
                    'value'       => 'ut-hero-style-11',
                    'label'       => 'Style Eleven'
                  )
            ),
          ),
		  array(
			'id'          => 'font_style',
			'label'       => 'Caption / Hero Font Style',
			'desc'		  => 'Setting this option to default will load the hero font style ( which has been set under Front Page Settings -> Hero Settings ).',
			'type'        => 'select',
			'std'		  => 'global',
			'choices'     => array( 
		   	  array(
				'value'       => 'global',
				'label'       => 'Default'
			  ),
			  array(
				'value'       => 'extralight',
				'label'       => 'Extra Light'
			  ),
			  array(
				'value'       => 'light',
				'label'       => 'Light'
			  ),
			  array(
				'value'       => 'regular',
				'label'       => 'Regular'
			  ),
			  array(
				'value'       => 'medium',
				'label'       => 'Medium'
			  ),
			  array(
				'value'       => 'semibold',
				'label'       => 'Semi Bold'
			  ),
			  array(
				'value'       => 'bold',
				'label'       => 'Bold'
			  )
			),
		  ),
		  array(
            'id'          => 'expertise',
            'label'       => 'Header Caption Slogan',
            'type'        => 'textarea-simple',
            'rows'        => '3'
          ),
          array(
            'id'          => 'description',
            'label'       => 'Header Caption',
            'type'        => 'textarea-simple',
            'rows'        => '3'
          ),
          array(
            'id'          => 'catchphrase',
            'label'       => 'Header Caption Description',
            'type'        => 'textarea-simple',
            'rows'        => '3'
          ),
		  array(
            'id'          => 'link',
            'label'       => 'Link',
            'type'        => 'text',
            'rows'        => '3'
          ),
		  array(
            'id'          => 'link_description',
            'label'       => 'Link Button Text',
            'type'        => 'text'
		  )
        )
      ),
      
      array(
		'id'          => 'blog_fancy_slider_effect',
		'label'       => 'Slide Effect',
		'desc'		  => '',
		'type'        => 'select',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_background_settings',
		'std'		  => 'fxSoftScale',
		'choices'     => array( 
		  array(
			'value'       => 'fxSoftScale',
			'label'       => 'Soft scale'
		  ),
		  array(
			'value'       => 'fxPressAway',
			'label'       => 'Press away'
		  ),
		  array(
			'value'       => 'fxSideSwing',
			'label'       => 'Side Swing'
		  ),
		  array(
			'value'       => 'fxFortuneWheel',
			'label'       => 'Fortune wheel'
		  ),
		  array(
			'value'       => 'fxSwipe',
			'label'       => 'Swipe'
		  ),
		  array(
			'value'       => 'fxPushReveal',
			'label'       => 'Push reveal'
		  ),
		  array(
			'value'       => 'fxSnapIn',
			'label'       => 'Snap in'
		  ),
          array(
			'value'       => 'fxLetMeIn',
			'label'       => 'Let me in'
		  ),
          array(
			'value'       => 'fxStickIt',
			'label'       => 'Stick it'
		  ),
          array(
			'value'       => 'fxArchiveMe',
			'label'       => 'Archive me'
		  ),
          array(
			'value'       => 'fxVGrowth',
			'label'       => 'Vertical growth'
		  ),
          array(
			'value'       => 'fxSlideBehind',
			'label'       => 'Slide Behind'
		  ),
          array(
			'value'       => 'fxSoftPulse',
			'label'       => 'Soft Pulse'
		  ),
          array(
			'value'       => 'fxEarthquake',
			'label'       => 'Earthquake'
		  ),
          array(
			'value'       => 'fxCliffDiving',
			'label'       => 'Cliff diving'
		  )
          
		),
	  ),	
      
      
      array(
        'id'          => 'blog_fancy_slider_height',
        'label'       => 'Slider Height',
        'desc'        => 'set the height of the slideshow in pixel e.g. 600px',
        'type'        => 'text',
         'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_background_settings',
      ),
      
	  /*
	  | Image Tab Slider
	  */
	  
	  array(
        'id'          => 'ut_blog_tabs_headline',
        'label'       => 'Tablet Headline',
        'type'        => 'text',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_background_settings',
      ),
	  
	  array(
		'id'          => 'ut_blog_tabs_headline_style',
		'label'       => 'Tablet Headline Font Style',
		'desc'		  => '',
		'type'        => 'select',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_background_settings',
		'std'		  => 'global',
		'choices'     => array( 
		  array(
			'value'       => 'global',
			'label'       => 'Default'
		  ),
		  array(
			'value'       => 'extralight',
			'label'       => 'Extra Light'
		  ),
		  array(
			'value'       => 'light',
			'label'       => 'Light'
		  ),
		  array(
			'value'       => 'regular',
			'label'       => 'Regular'
		  ),
		  array(
			'value'       => 'medium',
			'label'       => 'Medium'
		  ),
		  array(
			'value'       => 'semibold',
			'label'       => 'Semi Bold'
		  ),
		  array(
			'value'       => 'bold',
			'label'       => 'Bold'
		  )
		),
	  ),	  
	  
	  array(
        'id'          => 'ut_blog_tabs',
        'label'       => 'Manage Tablet Images',
        'type'        => 'list-item',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_background_settings',
        'settings'    => array( 
          
		  array(
            'id'          => 'image',
            'label'       => 'Image',
            'type'        => 'upload',
          ),
         		 
          array(
            'id'          => 'description',
            'label'       => 'Image Description',
            'type'        => 'textarea-simple',
            'rows'        => '3'
          ),
		  
		  array(
            'id'          => 'link_one_url',
            'label'       => 'Left Button URL',
            'type'        => 'text'
		  ),
		  
		  array(
            'id'          => 'link_one_text',
            'label'       => 'Left Button Text',
            'type'        => 'text'
		  ),
		  
		    array(
            'id'          => 'link_two_url',
            'label'       => 'Right Button URL',
            'type'        => 'text'
		  ),
		  
		  array(
            'id'          => 'link_two_text',
            'label'       => 'Right Button Text',
            'type'        => 'text'
		  )
		  
        )
      ),
	  
	  /*
	  | Custom Shortcode
	  */
	  
	  array(
        'id'          => 'blog_hero_custom_shortcode',
        'label'       => 'Custom Shortcode',
        'desc'        => '',
        'type'        => 'text',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_background_settings'
      ),
	  
	  /*
	  | Dynamic
	  */
	  
	  array(
        'id'          => 'blog_hero_dynamic_content',
        'label'       => 'Custom Hero Content',
        'desc'        => '',
        'type'        => 'textarea',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_hero_background_settings'
      ),
	  
	  
	  /*
	  |--------------------------------------------------------------------------
	  | Blog Sidebar
	  |--------------------------------------------------------------------------
	  */
	  array(
        'id'          => 'ut_blog_sidebar_menu',
		'subid'       => 'ut_blog_sidebar_setting',
        'label'       => 'Sidebar Setting',
        'type'        => 'section_headline',
        'section'     => 'ut_blog_settings'
      ),
	  
	  array(
        'id'          => 'ut_blog_sidebar_headline',
        'label'       => 'Sidebar Align',
        'desc'        => '<h2 class="section-headline">Sidebar Align</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_sidebar_setting',
      ),
	  
	  array(
        'id'          => 'ut_sidebar_align',
        'label'       => 'Sidebar Align',
        'type'        => 'select',
        'section'     => 'ut_blog_settings',
		'subsection'  => 'ut_blog_sidebar_setting',
        'choices'     => array( 
          array(
            'value'       => 'left',
            'label'       => 'left'
          ),
          array(
            'value'       => 'right',
            'label'       => 'right'
          )
        ),
      ),
	  
	  /*
	  |--------------------------------------------------------------------------
	  | Front Background Video
	  |--------------------------------------------------------------------------
	  */
	  	  
	  array(
        'id'          => 'ut_front_video_setting_menu',
		'subid'       => 'ut_front_video_setting',
        'label'       => 'Front Page Video',
        'desc'        => '<h2 class="section-headline">Front Page Video</h2>',
        'type'        => 'section_headline',
        'section'     => 'ut_video_settings'
      ),
	  
	  array(
        'id'          => 'ut_front_video_setting_headline',
        'label'       => 'Front Page Video',
        'desc'        => '<h2 class="section-headline">Front Page Video</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_front_video_setting',
      ),
	  
	  array(
        'id'          => 'ut_front_video_setting_description',
        'label'       => 'Video',
        'desc'        => 'At the current stage the theme only supports youtube videos. If a mobile or tablet device is visiting the site, the video background support will be dropped and the theme will display a poster image instead. The main reason for this behavior is, that most mobile and tablet devices do not support the video backgrounds. By default the video background will be displayed inside the following elements:
							<ul>
								<li>- <strong>Front Page Header</strong></li>
								<li>- <strong>Blog Header</strong></li>
								<li>- <strong>Contact Section on all pages</strong></li>
								<li>- <strong>Front Page Sections</strong></li>
							</ul>
							Keep in mind, that the video will only appear on sections which don\'t have a background color, background image or slider.
						  ',
        'type'        => 'textblock',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_front_video_setting'
      ),
	  
	  array(
        'id'          => 'ut_front_video_state',
        'label'       => 'Activate Video Background for front page?',
        'desc'        => '<strong>(optional)</strong>. Background videos on single pages are only displaying inside the contact section.',
        'std'         => 'on',
        'type'        => 'select',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_front_video_setting',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
      
      array(
        'id'          => 'ut_page_video_state',
        'label'       => 'Activate Video Background for Pages?',
        'desc'        => '<strong>(optional)</strong>. Background videos on single pages are only displaying inside the contact section.',
        'std'         => 'on',
        'type'        => 'select',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_front_video_setting',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_front_video_sound',
        'label'       => 'Activate video sound after page is loaded?',
        'desc'        => '<strong>(optional)</strong>. Play sound directly when page is loaded.',
        'std'         => 'off',
        'type'        => 'select',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_front_video_setting',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	  
	  array(
        'id'          	=> 'ut_video_mute_button',
		'label'       	=> 'Show / Hide Mute Button',
		'desc'        	=> '',
		'type'        	=> 'select',
		'section'    	=> 'ut_video_settings',
		'subsection'    => 'ut_front_video_setting',
        'choices'     	=> array(
          
		  array(
            'label'       => 'show',
            'value'       => 'show'
          ),
          array(
            'label'       => 'hide',
            'value'       => 'hide'
          )
		  
        ),
        'std'         	=> 'hide'
      ),
	  
	  array(
        'id'          => 'ut_front_video_volume',
        'label'       => 'Video Volume',
        'desc'        => '1-100 - default 5',
        'std'         => '5',
        'type'        => 'numeric-slider',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_front_video_setting',
        'min_max_step'=> '0,100,1'
      ),	  
	  
	  array(
        'id'          => 'ut_front_video_source',
        'label'       => 'Video Source',
        'desc'        => '',
        'type'        => 'select',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_front_video_setting',
		'std'		  => 'youtube',
        'choices'     => array( 
          array(
            'value'       => 'youtube',
            'label'       => 'Youtube'
          ),
		  array(
            'value'       => 'selfhosted',
            'label'       => 'Selfthosted'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_front_video',
        'label'       => 'Video URL for front and single pages',
        'desc'        => 'please insert the url only e.g. http://youtu.be/gvt_YFuZ8LA . Please do not insert the complete embedded code! This video will be displayed on the front page as well as all pages.',
        'type'        => 'text',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_front_video_setting'

      ),
	  
      array(
        'id'          => 'ut_front_video_mp4',
        'label'       => 'MP4',
        'desc'        => '',
        'type'        => 'upload',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_front_video_setting'

      ),
	  
	   array(
        'id'          => 'ut_front_video_ogg',
        'label'       => 'OGG',
        'desc'        => '',
        'type'        => 'text',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_front_video_setting'

      ),
	  
	   array(
        'id'          => 'ut_front_video_webm',
        'label'       => 'WEBM',
        'desc'        => '',
        'type'        => 'text',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_front_video_setting'

      ),
      
	  array(
        'id'          => 'ut_front_video_poster',
        'label'       => 'Poster Image',
        'desc'        => 'this image will be displayed instead of the video on mobile devices',
        'type'        => 'upload',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_front_video_setting'

      ),
      
	  /*
	  |--------------------------------------------------------------------------
	  | Blog Background Video
	  |--------------------------------------------------------------------------
	  */
	  	  
	  array(
        'id'          => 'ut_blog_video_setting_menu',
		'subid'       => 'ut_blog_video_setting',
        'label'       => 'Blog Video',
        'desc'        => '<h2 class="section-headline">Blog Page Video</h2>',
        'type'        => 'section_headline',
        'section'     => 'ut_video_settings'
      ),
	  
	  array(
        'id'          => 'ut_blog_video_setting_headline',
        'label'       => 'Blog Video',
        'desc'        => '<h2 class="section-headline">Blog Video</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_blog_video_setting',
      ),
	  
	  array(
        'id'          => 'ut_blog_video_setting_description',
        'label'       => 'Video',
        'desc'        => 'At the current stage the theme only supports youtube videos. If a mobile or tablet device is visiting the site, the video background support will be dropped and the theme will display a poster image instead. The main reason for this behavior is, that most mobile and tablet devices do not support the video backgrounds. By default the video background will be displayed inside the following elements:
							<ul>
								<li>- <strong>Blog header</strong></li>
								<li>- <strong>Blog single pages inside the contact section</strong></li>
							</ul>
						  ',
        'type'        => 'textblock',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_blog_video_setting'
      ),
	  
	  array(
        'id'          => 'ut_blog_video_state',
        'label'       => 'Activate Video Background for blog?',
        'desc'        => '<strong>(optional)</strong>. Background videos on single posts are only displaying inside the contact section.',
        'std'         => 'on',
        'type'        => 'select',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_blog_video_setting',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_single_video_state',
        'label'       => 'Activate Video Background for single posts?',
        'desc'        => '<strong>(optional)</strong>. Background videos on single posts are only displaying inside the contact section.',
        'std'         => 'on',
        'type'        => 'select',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_blog_video_setting',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_blog_video_sound',
        'label'       => 'Activate video sound after page is loaded?',
        'desc'        => '<strong>(optional)</strong>. Background videos on single pages are only displaying inside the contact section.',
        'std'         => 'off',
        'type'        => 'select',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_front_video_setting',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_blog_video_sound',
        'label'       => 'Activate video sound after page is loaded?',
        'desc'        => '<strong>(optional)</strong>. Play sound directly when page is loaded.',
        'std'         => 'off',
        'type'        => 'select',
		'section'     => 'ut_video_settings',
		'subsection'  => 'ut_blog_video_setting',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	  
	  array(
        'id'          	=> 'ut_video_mute_button_blog',
		'label'       	=> 'Show / Hide Mute Button',
		'desc'        	=> '',
		'type'        	=> 'select',
		'section'    	=> 'ut_video_settings',
		'subsection'  	=> 'ut_blog_video_setting',
        'choices'     	=> array(
          
		  array(
            'label'       => 'show',
            'value'       => 'show'
          ),
          array(
            'label'       => 'hide',
            'value'       => 'hide'
          )
		  
        ),
        'std'         	=> 'hide'
      ),
	  
	  array(
        'id'          => 'ut_blog_video_volume',
        'label'       => 'Video Volume',
        'desc'        => '1-100 - default 5',
        'std'         => '5',
        'type'        => 'numeric-slider',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_blog_video_setting',
        'min_max_step'=> '0,100,1'
      ),	
	  
	  array(
        'id'          => 'ut_blog_video_source',
        'label'       => 'Video Source',
        'desc'        => '',
        'type'        => 'select',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_blog_video_setting',
		'std'		  => 'youtube',
        'choices'     => array( 
          array(
            'value'       => 'youtube',
            'label'       => 'Youtube'
          ),
		  array(
            'value'       => 'selfhosted',
            'label'       => 'Selfthosted'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_blog_video',
        'label'       => 'Video URL for blog and blog single pages',
        'desc'        => 'please insert the url only e.g. http://youtu.be/gvt_YFuZ8LA . Please do not insert the complete embedded code! This video will be displayed on the blog page as well as all single post pages.',
        'type'        => 'text',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_blog_video_setting',
      ),
	  
      array(
        'id'          => 'ut_blog_video_mp4',
        'label'       => 'MP4',
        'desc'        => '',
        'type'        => 'upload',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_blog_video_setting'

      ),
	  
	   array(
        'id'          => 'ut_blog_video_ogg',
        'label'       => 'OGG',
        'desc'        => '',
        'type'        => 'text',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_blog_video_setting'

      ),
	  
	   array(
        'id'          => 'ut_blog_video_webm',
        'label'       => 'WEBM',
        'desc'        => '',
        'type'        => 'text',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_blog_video_setting'

      ),
      
	  array(
        'id'          => 'ut_blog_video_poster',
        'label'       => 'Poster Image',
        'desc'        => 'this image will be displayed instead of the video on mobile devices',
        'type'        => 'upload',
        'section'     => 'ut_video_settings',
		'subsection'  => 'ut_blog_video_setting',
      ),
	  	  
	  /*
	  |--------------------------------------------------------------------------
	  | Contact Section Content
	  |--------------------------------------------------------------------------
	  */
	  array(
        'id'          => 'ut_csection_content_menu',
		'subid'       => 'ut_csection_content_setting',
        'label'       => 'Content',
        'type'        => 'section_headline',
        'section'     => 'ut_csection_settings'
      ),
	  
	  array(
        'id'          => 'ut_csection_content_headline',
        'label'       => 'Contact Section Content',
        'desc'        => '<h2 class="section-headline">Contact Section Content</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_content_setting',
      ),
	  
	  
	  array(
        'id'          => 'ut_activate_csection',
        'label'       => 'Activate Contact Section',
        'type'        => 'select',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_content_setting',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	  
      array(
        'id'          => 'ut_csection_header_slogan',
        'label'       => 'Contact Header Slogan',
        'type'        => 'textarea-simple',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_content_setting',
        'rows'        => '5'
      ),
	  
      array(
        'id'          => 'ut_csection_header_expertise_slogan',
        'label'       => 'Contact Header Expertise Slogan',
        'type'        => 'textarea-simple',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_content_setting',
        'rows'        => '5'
      ),
	  
      array(
        'id'          => 'ut_left_csection_content_area',
        'label'       => 'Left Content Area',
        'desc'        => '<p> for example : create a contact form with your desired form generator and insert the shortcode in here. We recommend to make use of Contact Form 7. P.S. This field is also a good place to place a Google map shortcode! Leave empty to hide this complete box </p>',
        'type'        => 'textarea',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_content_setting',
        'rows'        => '15'
      ),
	  
      array(
        'id'          => 'ut_right_csection_content_area',
        'label'       => 'Right Content Area',
        'desc'        => '<p> for example : create a contact form with your desired form generator and insert the shortcode in here. We recommend to make use of Contact Form 7. P.S. This field is also a good place to place a Google map shortcode! Leave empty to hide this complete box </p>',
        'type'        => 'textarea',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_content_setting',
        'rows'        => '15'
      ), 
	  
	  /*
	  |--------------------------------------------------------------------------
	  | Contact Section Background
	  |--------------------------------------------------------------------------
	  */
	  
	  array(
        'id'          => 'ut_csection_background_headline',
		'subid'       => 'ut_csection_background_setting',
        'label'       => 'Background',
        'type'        => 'section_headline',
        'section'     => 'ut_csection_settings'
      ),
	  
	  array(
        'id'          => 'ut_contact_background_setting_headline',
        'label'       => 'Contact Section Background',
        'desc'        => '<h2 class="section-headline">Contact Section Background</h2>',
        'type'        => 'section_headline',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_background_setting'
      ),
	  
	  array(
        'id'          => 'ut_csection_background_type',
        'label'       => 'Choose Background Type',
        'desc'        => '',
        'type'        => 'select_group',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_background_setting',
		'std'		  => 'image',
        'choices'     => array( 
		  array(
            'value'       => 'image',
			'for'         => 'ut_csection_background_image',
            'label'       => 'Image'
          ),
          array(
            'value'       => 'map',
			'for'		  => 'ut_csection_map',
            'label'       => 'Google Map'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_csection_background_image',
        'label'       => 'Contact Section Background Image',
        'desc'        => 'Keep in mind, that you are not able to set a background position or attachment if the parallax option for this section has been set to "on"',
        'type'        => 'background',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_background_setting'
      ),
	  
	  array(
        'id'          => 'ut_csection_map',
        'label'       => 'Google Map Shortcode',
        'desc'        => 'we recommend to use the Maps Marker plugin to display maps! Placing a shortcode will overwrite the background image. Also keep in mind, that activating the parallax effect does not work with maps.',
        'type'        => 'text',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_background_setting'
      ),

	  array(
        'id'          => 'ut_csection_parallax',
        'label'       => 'Activate Parallax',
        'desc'        => 'only available for background images',
        'std'         => 'off',
        'type'        => 'select',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_background_setting',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_contact_overlay_setting_headline',
        'label'       => 'Background Overlay',
        'desc'        => '<h2 class="section-headline">Background Overlay</h2>',
        'type'        => 'section_headline',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_background_setting'
      ),
	  
	  array(
        'id'          => 'ut_csection_overlay',
        'label'       => 'Overlay',
        'desc'        => 'only available if background image has been set',
        'type'        => 'select',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_background_setting',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	  
      array(
        'id'          => 'ut_csection_overlay_pattern',
        'label'       => 'Overlay Pattern',
        'type'        => 'select',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_background_setting',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_csection_overlay_pattern_style',
        'label'       => 'Overlay Pattern Style',
        'type'        => 'select',
		'std'		  => 'style_one',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_background_setting',
        'choices'     => array( 
          array(
            'value'       => 'style_one',
            'label'       => 'Style One'
          ),
          array(
            'value'       => 'style_two',
            'label'       => 'Style Two'
          )
        ),
      ),
      
	  array(
        'id'          => 'ut_csection_overlay_color',
        'label'       => 'Overlay Color',
        'desc'        => '<strong>(optional)</strong>',
        'type'        => 'colorpicker',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_background_setting'
      ),
      
	  array(
        'id'          => 'ut_csection_overlay_opacity',
        'label'       => 'Overlay Color Opacity',
        'desc'        => '<strong>(optional)</strong> - default 0.8',
        'std'         => '0.8',
        'type'        => 'numeric-slider',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_background_setting',
        'min_max_step'=> '0,1,0.1'
      ),
	  
	  
	  
	  /*
	  |--------------------------------------------------------------------------
	  | Contact Section Styling
	  |--------------------------------------------------------------------------
	  */
	  
	  array(
        'id'          => 'ut_csection_styling_headline',
		'subid'       => 'ut_csection_styling_setting',
        'label'       => 'Styling',
        'type'        => 'section_headline',
        'section'     => 'ut_csection_settings'
      ),
	  
	  array(
        'id'          => 'ut_contact_header_setting_headline',
        'label'       => 'Contact Section Header Style',
        'desc'        => '<h2 class="section-headline">Contact Section Header Style</h2>',
        'type'        => 'section_headline',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_styling_setting'
      ),
	  
	  array(
        'id'          => 'ut_csection_header_style',
        'label'       => 'Header Style',
        'desc'        => '<strong>(optional)</strong> - default : Typography -> Global Header Styles <br/><br/><a href="#" class="ut-header-preview">Preview Header Styles</a>',
        'type'        => 'select',
		'std'		  => 'global',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_styling_setting',
        'choices'     => array( 
          
		  array(
            'label'       => 'Default',
            'value'       => 'global'
          ),		  
		  
		  array(
            'value'       => 'pt-style-1',
            'label'       => 'Style One'
          ),
		  
          array(
            'value'       => 'pt-style-2',
            'label'       => 'Style Two'
          ),
		  
          array(
            'value'       => 'pt-style-3',
            'label'       => 'Style Three'
          ),
		  
          array(
            'value'       => 'pt-style-4',
            'label'       => 'Style Four'
          ),
		  
		  array(
            'value'       => 'pt-style-5',
            'label'       => 'Style Five'
          ),
		  
		   array(
            'value'       => 'pt-style-6',
            'label'       => 'Style Six'
          ),
		  
		  array(
            'value'       => 'pt-style-7',
            'label'       => 'Style Seven'
          )
		 
        ),
      ),
	  
	  
	  array(
        'id'          => 'ut_contact_padding_setting_headline',
        'label'       => 'Contact Section Padding',
        'desc'        => '<h2 class="section-headline">Contact Section Padding</h2>',
        'type'        => 'section_headline',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_styling_setting'
      ),
	  
      array(
        'id'          => 'ut_csection_padding_top',
        'label'       => 'Contact Section Padding Top',
        'desc'        => '<strong>(optional)</strong> - default 80px',
        'type'        => 'text',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_styling_setting'
      ),
	  
      array(
        'id'          => 'ut_csection_padding_bottom',
        'label'       => 'Contact Section Padding Bottom',
        'desc'        => '<strong>(optional)</strong> - default 40px',
        'type'        => 'text',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_styling_setting'
      ),	
	    
	  array(
        'id'          => 'ut_contact_color_headline',
        'label'       => 'Color Settings',
        'desc'        => '<h2 class="section-headline">Color Settings</h2>',
        'type'        => 'section_headline',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_styling_setting'
      ),
	  
	  array(
        'id'          => 'ut_csection_skin',
		'label'       => 'Section Color Skin',
        'type'        => 'select',
        'desc'        => 'If you are planing to use light background images or colors use the dark skin and vice versa. If these skins to not match your requirements, you can define your own colors beneath. The Dark skin has been made fir pure white background in this case.',
		'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_styling_setting',
        'choices'     => array(
          array(
            'label'     => 'Light',
            'value'     => 'light'
          ),
          array(
            'label'     => 'Dark',
            'value'     => 'dark'
          )
        ),
        'std'         	=> 'dark',
      ),
	  
	  array(
        'id'          => 'ut_csection_header_slogan_color',
        'label'       => 'Section Title Color',
        'desc'        => '<strong>(optional)</strong> - will overwrite the default css',
        'type'        => 'colorpicker',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_styling_setting'
      ),
	  
      array(
        'id'          => 'ut_csection_header_expertise_slogan_color',
        'label'       => 'Section Slogan Color',
        'desc'        => '<strong>(optional)</strong> - will overwrite the default css',
        'type'        => 'colorpicker',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_styling_setting'
      ),
	  
      array(
        'id'          => 'ut_csection_background_color',
        'label'       => 'Contact Section Background Color',
        'desc'        => '<strong>(optional)</strong> - will overwrite the default css',
        'type'        => 'colorpicker',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_styling_setting'
      ),
	  
      array(
        'id'          => 'ut_left_csection_content_area_color',
        'label'       => 'Left Content Area Background Color',
        'desc'        => '<strong>(optional)</strong> - will overwrite the default css',
        'type'        => 'colorpicker',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_styling_setting'
      ),
	  
      array(
        'id'          => 'ut_left_csection_content_area_opacity',
        'label'       => 'Color Opacity',
        'desc'        => '<strong>(optional)</strong> - will overwrite the default css. Opacity for left content area background color',
        'std'         => '0.8',
        'type'        => 'numeric-slider',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_styling_setting',
        'min_max_step'=> '0,1,0.1'
      ),
	  
      array(
        'id'          => 'ut_right_csection_content_area_color',
        'label'       => 'Right Content Area Background Color',
        'desc'        => '<strong>(optional)</strong> - will overwrite the default css',
        'type'        => 'colorpicker',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_styling_setting',
      ),
	  
      array(
        'id'          => 'ut_right_csection_content_area_opacity',
        'label'       => 'Color Opacity',
        'desc'        => '<strong>(optional)</strong> - will overwrite the default css. Opacity for right content area background color',
        'std'         => '0.8',
        'type'        => 'numeric-slider',
        'section'     => 'ut_csection_settings',
		'subsection'  => 'ut_csection_styling_setting',
        'min_max_step'=> '0,1,0.1'
      ),
	  
	  
	  /*
	  |--------------------------------------------------------------------------
	  | Advanced Settings
	  |--------------------------------------------------------------------------
	  */
	  
	  /*
	  | Section Animation
	  */
	  
	  array(
        'id'          => 'ut_sanimation_setting_menu',
		'subid'		  => 'ut_sanimation_settings',
        'label'       => 'Section Animation',
        'desc'        => '<h2 class="section-headline">Section Animation</h2>',
        'type'        => 'section_headline',
        'section'     => 'ut_advanced_settings'
      ),
	 	 
	  array(
        'id'          => 'ut_sanimation_setting_headline',
        'label'       => 'Section Animation',
        'desc'        => '<h2 class="section-headline">Section Animation</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_advanced_settings',
		'subsection'  => 'ut_sanimation_settings',
      ),
	  
	  array(
        'id'          => 'ut_scrollto_effect',
        'label'       => 'Scroll to Section Effect',
        'desc'        => 'This option will activate / deactivate the section fade animation',
        'type'        => 'easing',
        'section'     => 'ut_advanced_settings',
		'subsection'  => 'ut_sanimation_settings',
		'std'		  => 'easeInOutExpo'
      ),
	  
	  array(
        'id'          => 'ut_scrollto_speed',
        'label'       => 'Scroll to Section Effect Speed',
        'desc'        => '<strong>(optional)</strong> - value in ms , default: 650',
        'type'        => 'text',
        'section'     => 'ut_advanced_settings',
		'subsection'  => 'ut_sanimation_settings',
      ),
	  
	  array(
        'id'          => 'ut_animate_sections',
        'label'       => 'Animate Sections',
        'desc'        => 'This option will activate / deactivate the section fade animation',
        'type'        => 'select',
        'section'     => 'ut_advanced_settings',
		'subsection'  => 'ut_sanimation_settings',
		'std'		  => 'on',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_animate_sections_timer',
        'label'       => 'Section Animation Timer',
        'desc'        => '<strong>(optional)</strong> - value in ms , default: 1600',
        'type'        => 'text',
        'section'     => 'ut_advanced_settings',
		'subsection'  => 'ut_sanimation_settings',
      ),
	 	 
	  /*
	  | Pre Loader
	  */
	  
	  array(
        'id'          => 'ut_loader_setting_menu',
		'subid'		  => 'ut_loader_settings',
        'label'       => 'Manage Preloader',
        'desc'        => '<h2 class="section-headline">Manage Preloader</h2>',
        'type'        => 'section_headline',
        'section'     => 'ut_advanced_settings'
      ),
	  
	  array(
        'id'          => 'ut_loader_setting_headline',
        'label'       => 'Manage Preloader',
        'desc'        => '<h2 class="section-headline">Manage Preloader</h2>',
		'type'        => 'section_headline',
        'section'     => 'ut_advanced_settings',
		'subsection'  => 'ut_loader_settings',
      ),
	  
	  array(
        'id'          => 'ut_use_image_loader',
        'label'       => 'Use Image Preloader',
        'desc'        => 'This option will activate a JavaScript based preloader.',
        'type'        => 'select',
        'section'     => 'ut_advanced_settings',
		'subsection'  => 'ut_loader_settings',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_use_image_loader_on',
        'label'       => 'Use Image Preloader for',
        'desc'        => '',
        'type'        => 'checkbox',
        'section'     => 'ut_advanced_settings',
		'subsection'  => 'ut_loader_settings',
        'choices'     => array( 
          array(
            'value'       => 'is_front_page',
            'label'       => 'Home'
          ),
          array(
            'value'       => 'is_home',
            'label'       => 'Blog'
          ),
		   array(
            'value'       => 'is_page',
            'label'       => 'Single Pages'
          ),
          array(
            'value'       => 'is_single',
            'label'       => 'Single Posts'
          )
        ),
      ),
	  
	  array(
        'id'          	=> 'ut_image_loader_logo',
        'label'       	=> 'Logo',
        'desc'        	=> 'Custom Logo for Preloader',
        'type'        	=> 'upload',
        'section'       => 'ut_advanced_settings',
		'subsection'    => 'ut_loader_settings'
      ),
	  
	  array(
        'id'          => 'ut_image_loader_color',
        'label'       => 'Preloader Text Color',
        'desc'        => '<strong>(optional)</strong> - default: accentcolor. If you leave this field empty, the system will use the accentcolor which has been defined inside the theme customizer.',
        'type'        => 'colorpicker',
        'section'     => 'ut_advanced_settings',
		'subsection'  => 'ut_loader_settings'
      ),
	  
	  array(
        'id'          => 'ut_image_loader_background',
        'label'       => 'Preloader Backgroundcolor',
        'desc'        => '<strong>(optional)</strong>',
        'type'        => 'colorpicker',
        'section'     => 'ut_advanced_settings',
		'subsection'  => 'ut_loader_settings',
      ),
	  
	  array(
        'id'          => 'ut_show_loader_bar',
        'label'       => 'Display Loader Bar',
        'desc'        => '',
		'std'		  => 'on',
        'type'        => 'select',
        'section'     => 'ut_advanced_settings',
		'subsection'  => 'ut_loader_settings',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On'
          ),
          array(
            'value'       => 'off',
            'label'       => 'Off'
          )
        ),
      ),
	  
	  array(
        'id'          => 'ut_image_loader_bar_color',
        'label'       => 'Preloader Bar Color',
        'desc'        => '<strong>(optional)</strong> - default: accentcolor. If you leave this field empty, the system will use the accentcolor which has been defined inside the theme customizer.',
        'type'        => 'colorpicker',
        'section'     => 'ut_advanced_settings',
		'subsection'  => 'ut_loader_settings',
      ),
	  
	  array(
        'id'          => 'ut_image_loader_barheight',
		'label'		  => 'Bar Height',	
        'desc'        => '<strong>(optional)</strong> - default: 3. Please insert integers only',
        'type'        => 'text',
        'section'     => 'ut_advanced_settings',
		'subsection'  => 'ut_loader_settings',
      ),	 
	  
	  /*
	  | Custom CSS
	  */
	  
	  array(
        'id'          	=> 'ut_custom_css_headline',
		'subid'			=> 'ut_custom_css_settings',
        'label'       	=> 'Custom CSS',
        'desc'        	=> '<h2 class="section-headline">Custom CSS</h2>',
        'type'        	=> 'section_headline',
        'section'     	=> 'ut_advanced_settings',
      ),
	  
      array(
        'id'          => 'ut_custom_css',
        'label'       => 'Custom CSS',
        'desc'        => 'Insert your custom CSS code right in here if you are not planing to use the delivered child theme. This custom CSS will be directly hooked into the wp head right after all other Stylesheets.',
        'type'        => 'textarea-simple',
        'section'     => 'ut_advanced_settings',
		'subsection'  => 'ut_custom_css_settings'
      ),
	    
	  /*
	  | SEO
	  */
	  
	  array(
        'id'          	=> 'ut_seo_headline',
		'subid'			=> 'ut_seo_settings',
        'label'       	=> 'SEO',
        'desc'        	=> '<h2 class="section-headline">SEO</h2>',
        'type'        	=> 'section_headline',
        'section'     	=> 'ut_advanced_settings',
      ),
	  
	  array(
        'id'          => 'ut_google_analytics',
        'label'       => 'Google Analytics ID',
        'desc'        => 'Enter your Google Analytics ID here to track your site with Google Analytics.',
        'type'        => 'text',
        'section'     => 'ut_advanced_settings',
		'subsection'  => 'ut_seo_settings'
      ),
	  
	  /*
	  | Theme Info
	  */
	  
	  /*array(
        'id'          	=> 'ut_theme_info_headline',
		'subid'			=> 'ut_theme_info_settings',
        'label'       	=> 'Theme Info',
        'desc'        	=> '<h2 class="section-headline">Theme Info</h2>',
        'type'        	=> 'section_headline',
        'section'     	=> 'ut_advanced_settings',
      ), */
	  
	  
    )
  );
  
  /* allow settings to be filtered before saving */
  $ut_settings = apply_filters( 'option_tree_settings_args', $ut_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $ut_settings ) {
    update_option( 'option_tree_settings', $ut_settings ); 
  }
  
}