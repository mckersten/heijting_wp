<?php
 
add_action( 'admin_init', 'ut_one_page_settings' );

function ut_one_page_settings() {
  
  $ut_one_page_settings = array(
    'id'          => 'ut_one_page_settings',
    'title'       => 'Page & Section Settings',
    'desc'        => '',
    'pages'       => array( 'page' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      
	  array(
        'label'       	=> 'Page Settings',
        'id'          	=> 'ut_page_settings',
        'type'        	=> 'textblock',
        'desc'        	=> '<h2><span>Page /</span> Settings</h2> <br /> Page settings are affecting single pages as well as page which are sections on the front page.',
		'section_class'	=> 'ut-settings-heading',
        'class'       	=> ''
      ),
	  
	  array(
        'id'          	=> 'ut_section_slogan',
        'label'       	=> 'Page Slogan',
        'desc'        	=> 'You can also insert shortcodes or HTML too',
        'type'        	=> 'textarea',
		'rows'			=> '2',
        'class'       	=> ''
      ),
	  
	  array(
        'label'       => 'Header Style',
        'id'          => 'ut_section_header_style',
        'desc'		  => 'Choose between these nice header styles',
		'type'        => 'select',
        'desc'        => '',
        'choices'     => array(
          
		  array(
            'label'       => 'Default (Theme Options)',
            'value'       => 'global'
          ),
		  
		  array(
            'label'       => 'Style One',
            'value'       => 'pt-style-1'
          ),
		  
          array(
            'label'       => 'Style Two',
            'value'       => 'pt-style-2'
          ),
		  
		  array(
            'label'       => 'Style Three',
            'value'       => 'pt-style-3'
          ),
		  
		  array(
            'label'       => 'Style Four',
            'value'       => 'pt-style-4'
          ),
		  
		  array(
            'label'       => 'Style Five',
            'value'       => 'pt-style-5'
          ),
		  
		  array(
            'label'       => 'Style Six',
            'value'       => 'pt-style-6'
          ),
		  
		  array(
            'label'       => 'Style Seven',
            'value'       => 'pt-style-7'
          )
		  
        ),
        
		'std'         	=> 'global'
			
      ),
	  
	  array(
        'label'       => 'Header Font Style',
        'id'          => 'ut_section_header_font_style',
		'type'        => 'select',
        'desc'        => '',
        'choices'     => array(
          
		  array(
            'label'       => 'Default (Theme Options)',
            'value'       => 'global'
          ),
		  
		  array(
            'label'       => 'Extralight',
            'value'       => 'extralight'
          ),
		  
          array(
            'label'       => 'Light',
            'value'       => 'light'
          ),
		  
		  array(
            'label'       => 'Regular',
            'value'       => 'regular'
          ),
		  
		  array(
            'label'       => 'Medium',
            'value'       => 'medium'
          ),
		  
		   array(
            'label'       => 'Semi Bold',
            'value'       => 'semibold'
          ),
		  
		   array(
            'label'       => 'Bold',
            'value'       => 'bold'
          ),
		  
        ),
        
		'std'         	=> 'global'
			
      ),
	  
	  array(
        'label'       	=> 'Section Settings',
        'id'          	=> 'ut_section_settings',
        'type'        	=> 'textblock',
        'desc'        	=> '<h2><span>Section /</span> Settings</h2> <br /> Section settings are only affecting pages which are sections on the front page.',
		'section_class'	=> 'ut-settings-heading',
        'class'       	=> ''
      ),
	  
	  	  
	  array(
        'label'       => 'Section Header',
        'id'          => 'ut_display_section_header',
        'desc'		  => 'show / hide the section header',
		'type'        => 'select',
        'desc'        => '',
        'choices'     => array(
          array(
            'label'       => 'Show',
            'value'       => 'show'
          ),
          array(
            'label'       => 'Hide',
            'value'       => 'hide'
          )
        ),
        'std'         	=> 'show',
        'rows'        	=> '',
        'class'       	=> 'ut-section-header-state',
		'section_class' => ''
      ),
	  
	  
	  array(
        'id'           	=> 'ut_section_slogan_padding',
        'label'        	=> 'Section Header Padding Bottom',
        'desc'         	=> '(optional) -  include "px" in your string. e.g. 150px (default: 30px)',
        'type'        	=> 'text',
		'section_class'	=> 'ut-section-header-opt',
		'class'       	=> '',
		
      ),

	  array(
        'label'       => 'Section Width / Style',
        'id'          => 'ut_section_width',
        'type'        => 'select_group',
        'desc'        => 'Decide if your content is centered or fullwidth. For refular content we recommend to use the centered width and for portfolios or googlemaps the fullwidth. If you use the "Split Section" use the featured image to display the poster image',
        'choices'     => array(
          array(
            'label'       => 'Centered Content',
			'for'		  => '',
            'value'       => 'centered'
          ),
          array(
            'label'       => 'Fullwidth Content',
			'for'		  => '',
            'value'       => 'fullwidth'
          ),
		  array(
            'label'       => 'Split Content',
			'for'		  => 'ut_split_content_align',
            'value'       => 'split'
          )
        ),
        'std'         	=> 'centered',
        'rows'        	=> '',
        'class'       	=> '',
		'section_class' => ''
      ),
	  
	  array(
        'label'       => 'Split Content Align',
        'id'          => 'ut_split_content_align',
        'type'        => 'select',
        'choices'     => array(
          array(
            'label'     => 'left',
            'value'     => 'left'
          ),
          array(
            'label'     => 'right',
            'value'     => 'right'
          )
        ),
        'std'         	=> 'right',
        'class'       	=> '',
		'section_class' => ''
      ),
	  
	  array(
        'label'       => 'Section Shadow',
        'id'          => 'ut_section_shadow',
        'type'        => 'select',
        'desc'        => 'Creates a smooth shadow for this section',
        'choices'     => array(
          array(
            'label'     => 'On',
            'value'     => 'on'
          ),
          array(
            'label'     => 'Off',
            'value'     => 'off'
          )
        ),
        'std'         	=> 'off',
        'class'       	=> '',
		'section_class' => ''
      ),
	  
	  array(
        'id'          	=> 'ut_section_padding_top',
        'label'       	=> 'Section Padding Top',
        'desc'        	=> '(optional) -  include "px" in your string. e.g. 150px (default : 80px)',
        'std'         	=> '',
        'type'        	=> 'text',
        'min_max_step'	=> '',
        'class'       	=> '',
		'section_class' => ''
      ),
	  
	  array(
        'id'          	=> 'ut_section_padding_bottom',
        'label'       	=> 'Section Padding Bottom',
        'desc'        	=> '(optional) -  include "px" in your string. e.g. 130px (default : 60px)',
        'std'         	=> '',
        'type'        	=> 'text',
        'min_max_step'	=> '',
        'class'       	=> '',
		'section_class' => ''
      ),
	  
	  
	  array(
        'label'       	=> 'Color Settings',
        'id'          	=> 'ut_color_section',
        'type'        	=> 'textblock',
        'desc'        	=> '<h2><span>Color /</span> Settings</h2> <br /> Color settings are only affecting pages which are sections on the front page.',
        'std'         	=> '',
        'rows'        	=> '',
        'class'       	=> '',
		'section_class' => 'ut-settings-heading'
      ),
	  
	  
	  array(
        'label'       => 'Section Color Skin',
        'id'          => 'ut_section_skin',
        'type'        => 'select',
        'desc'        => 'If you are planing to use light background images or colors use the dark skin and vice versa. If these skins to not match your requirements, you can define your own colors beneath or add your own class inside the class field at the very bottom of this option set.',
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
        'class'       	=> '',
		'section_class' => ''
      ),
	  
	  
	  array(
        'label'       	=> 'Section Title Color',
        'id'          	=> 'ut_section_title_color',
        'type'        	=> 'colorpicker',
        'desc'       	=> '(optional)',
        'std'         	=> '',
        'rows'        	=> '',
        'class'       	=> '',
		'section_class' => ''
      ),
	  
	  
	  array(
        'label'       => 'Section Slogan Color',
        'id'          => 'ut_section_slogan_color',
        'type'        => 'colorpicker',
        'desc'        => '(optional)',
        'std'         => '',
        'rows'        => '',
        'class'       => '',
		'section_class' => ''
      ),
	  
	  
	  array(
        'label'       	=> 'Section Text Color',
        'id'         	=> 'ut_section_text_color',
        'type'        	=> 'colorpicker',
        'desc'        	=> '(optional)',
        'std'         	=> '',
        'rows'        	=> '',
        'class'       	=> '',
		'section_class' => ''
      ),
	  
	  
	  array(
        'label'       => 'Section Content Headlines Color',
        'id'          => 'ut_section_heading_color',
        'type'        => 'colorpicker',
        'desc'        => '(optional)',
        'std'         => '',
        'rows'        => '',
        'class'       => '',
		'section_class' => ''
      ),
	  
	  
	  array(
        'label'       	=> 'Section Background Color',
        'id'          	=> 'ut_section_background_color',
        'type'       	=> 'colorpicker',
        'desc'        	=> 'Change the background color of this section, keep in mind that if you are planing to use a parallax background, this color is not visible anymore.',
        'std'         	=> '',
        'rows'        	=> '',
        'class'       	=> '',
		'section_class' => ''
      ),
	  
	  
	  array(
        'label'       	=> 'Parallax Settings',
        'id'          	=> 'ut_parallax_section_head',
        'type'        	=> 'textblock',
        'desc'       	=> '<h2><span>Parallax</span> Settings</h2>',
        'std'         	=> '',
        'rows'        	=> '',
        'class'       	=> '',
		'section_class' => 'ut-settings-heading'
      ),
	  
	  
	  array(
        'label'       => 'Paralaxx',
        'id'          => 'ut_parallax_section',
        'type'        => 'select',
        'desc'        => '',
        'choices'     => array(
          array(
            'label'       => 'On',
            'value'       => 'on'
          ),
          array(
            'label'       => 'Off',
            'value'       => 'off'
          )
        ),
        'std'         	=> 'off',
        'rows'        	=> '',
        'class'       	=> 'ut-section-parallax-state',
		'section_class' => ''
      ),
	  
	  
	  array(
        'id'          	=> 'ut_parallax_image',
        'label'       	=> 'Upload Section Background Image',
        'desc'        	=> 'Keep in mind, that you are not able to set a background position or attachment if the parallax option above has been set to "on"',
        'std'         	=> '',
        'type'        	=> 'background',
        'rows'        	=> '',
        'min_max_step'	=> '',
        'section_class' => 'ut-section-parallax-opt'
      ),
	  
	  
	  array(
        'label'       	=> 'Overlay Settings',
        'id'         	=> 'ut_overlay_setting',
        'type'        	=> 'textblock',
        'desc'        	=> '<h2><span>Overlay /</span> Settings</h2>',
        'std'         	=> '',
        'rows'        	=> '',
        'section_class' => 'ut-settings-heading ut-section-parallax-opt'
      ),
	  
	  
	  array(
        'label'       => 'Overlay',
        'id'          => 'ut_overlay_section',
        'type'        => 'select',
        'desc'        => '',
        'choices'     => array(
          array(
            'label'       => 'On',
            'value'       => 'on'
          ),
          array(
            'label'       => 'Off',
            'value'       => 'off'
          )
        ),
        'std'         	=> 'off',
        'rows'        	=> '',
        'class'       	=> 'ut-section-overlay-state',
		'section_class' => 'ut-section-parallax-opt'
      ),
	  
	  
	  array(
        'label'       	=> 'Overlay Pattern',
        'id'          	=> 'ut_overlay_pattern',
        'section_class'	=> 'ut-section-overlay-opt',
		'type'        	=> 'select',
        'desc'        	=> '',
        'choices'     	=> array(
          array(
            'label'       => 'On',
            'value'       => 'on'
          ),
          array(
            'label'       => 'Off',
            'value'       => 'off'
          )
        ),
        'std'         	=> 'off',
        'rows'        	=> '',
        'class'         => '',
		'section_class' => 'ut-section-parallax-opt ut-section-overlay-opt'
      ),
	  
	  array(
        'label'       	=> 'Overlay Pattern Style',
        'id'          	=> 'ut_overlay_pattern_style',
        'section_class'	=> 'ut-section-overlay-opt',
		'type'        	=> 'select',
        'desc'        	=> '',
        'choices'     	=> array(
          array(
            'label'       => 'Style One',
            'value'       => 'style_one'
          ),
          array(
            'label'       => 'Style Two',
            'value'       => 'style_two'
          )
        ),
        'std'         	=> 'style_one',
        'rows'        	=> '',
        'class'         => '',
		'section_class' => 'ut-section-parallax-opt ut-section-overlay-opt'
      ),
	  
	  
	  array(
        'label'       	=> 'Section Overlay Color',
        'id'          	=> 'ut_overlay_color',
        'type'        	=> 'colorpicker',
        'section_class'	=> 'ut-section-overlay-opt',
		'desc'        	=> '(optional)',
        'std'         	=> '',
        'rows'        	=> '',
        'class'       	=> '',
		'section_class' => 'ut-section-parallax-opt ut-section-overlay-opt'
      ),
	  
	  
	  array(
        'label'       	=> '',
		'id'          	=> 'ut_overlay_color_opacity',
        'desc'        	=> 'Overlay Color Opacity',
        'section_class'	=> 'ut-section-overlay-opt',
		'std'        	 => '',
        'type'       	 => 'numeric-slider',
        'rows'       	 => '',
        'post_type'   	=> '',
        'taxonomy'    	=> '',
        'min_max_step'	=> '0,1,0.1',
        'class'       	=> '',
		'section_class' => 'ut-section-parallax-opt ut-section-overlay-opt'
      ),
	  	  
	  array(
        'label'       	=> 'Team Management',
        'id'         	=> 'ut_team_section',
        'type'        	=> 'textblock',
        'desc'        	=> '<h2><span>Team /</span> Management</h2>',
        'std'         	=> '',
        'rows'        	=> '',
        'section_class' => 'ut-settings-heading ut-team-section'
      ),
	  	  	  
	  array(
        'label'       	=> 'Team member per row',
        'id'          	=> 'ut_member_in_row',
		'type'        	=> 'select',
        'desc'        	=> '',
        'choices'     	=> array(
          
		  array(
            'label'       => '1',
            'value'       => 'one'
          ),
          array(
            'label'       => '2',
            'value'       => 'two'
          ),
		  array(
            'label'       => '3',
            'value'       => 'three'
          ),
		  array(
            'label'       => '4',
            'value'       => 'four'
          )          
		  
        ),
        'std'         	=> 'three',
        'rows'        	=> '',
        'class'         => '',
		'section_class'	=> 'ut-team-section'
      ),
	  
	  array(
        'label'       	=> 'Team Box Layout',
        'id'          	=> 'ut_member_box_layout',
		'type'        	=> 'select',
        'desc'        	=> '',
        'choices'     	=> array(
          
		  array(
            'label'       => 'Style One',
            'value'       => 'style_one'
          ),
          array(
            'label'       => 'Style Two',
            'value'       => 'style_two'
          ),
		  array(
            'label'       => 'Style Three',
            'value'       => 'style_three'
          ),
		  array(
            'label'       => 'Style Four',
            'value'       => 'style_four'
          )
		  
        ),
        'std'         	=> '',
        'rows'        	=> '',
        'class'         => '',
		'section_class'	=> 'ut-team-section'
      ),
	  
	  /*array(
        'label'       	=> 'Team Member Box Size',
        'id'          	=> 'ut_member_box_size',
		'type'        	=> 'select',
        'desc'        	=> '',
        'choices'     	=> array(
          
		  array(
            'label'       => 'Small',
            'value'       => 'ut-m-small'
          ),
          array(
            'label'       => 'Large',
            'value'       => 'ut-m-big'
          )
		  
        ),
        'std'         	=> 'smal',
        'rows'        	=> '',
        'class'         => '',
		'section_class'	=> 'ut-team-section'
      ),*/
	  
	  
	  array(
        'label'       	=> 'Manager your Team Members',
        'id'          	=> 'ut_team_member',
        'type'        	=> 'list-item',
		'section_class'	=> 'ut-team-section',
        'desc'       	=> '',
        'settings'    	=> array(
         
		 array(
            'label'       => 'Upload',
            'id'          => 'ut_member_pic',
            'type'        => 'upload',
            'desc'        => 'Member Avatar',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
          
          array(
            'label'       => 'Upload',
            'id'          => 'ut_member_pic_alt',
            'type'        => 'upload',
            'desc'        => 'Alternate Member Avatar ( only for style four )',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
          
		  /*array(
			'label'       	=> 'Avatar Style',
			'id'          	=> 'ut_avatar_style',
			'type'        	=> 'select',
			'choices'     	=> array(
			  
			  array(
				'label'       => 'Square',
				'value'       => 'ut-square'
			  ),
			  
			  array(
				'label'       => 'Rounded',
				'value'       => 'ut-rounded'
			  ),
			  
			  array(
				'label'       => 'Circle',
				'value'       => 'ut-circle'
			  ),
			  
			),
			'std'         	=> 'square',
			'rows'        	=> '',
			'class'         => ''
		  ),*/
		  
		  array(
            'label'       => 'Member Name',
            'id'          => 'ut_member_name',
            'type'        => 'text',
            'desc'        => '',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
		  
		  array(
            'label'       => 'Member Title',
            'id'          => 'ut_member_title',
            'type'        => 'text',
            'desc'        => '',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
		  
		  array(
            'label'       => 'Description',
            'id'          => 'ut_member_description',
            'type'        => 'textarea-simple',
            'desc'        => 'this field also accepts shortcodes, for example skillbar shortcode',
            'std'         => '',
            'rows'        => '5',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
		  
		  array(
            'label'       => 'Facebook',
            'id'          => 'ut_member_facebook',
            'type'        => 'text',
            'class'       => ''
          ),
		  
		  array(
            'label'       => 'Twitter',
            'id'          => 'ut_member_twitter',
            'type'        => 'text',
            'class'       => ''
          ),
		  
		  array(
            'label'       => 'Google',
            'id'          => 'ut_member_google',
            'type'        => 'text',
            'class'       => ''
          ),
		  
		  array(
            'label'       => 'Github',
            'id'          => 'ut_member_github',
            'type'        => 'text',
            'class'       => ''
          ),
		  
		  array(
            'label'       => 'Skype',
            'id'          => 'ut_member_skype',
            'type'        => 'text',
            'class'       => ''
          ),
		  
		  array(
            'label'       => 'Dribbble',
            'id'          => 'ut_member_dribbble',
            'type'        => 'text',
            'class'       => ''
          ),
		  
		  array(
            'label'       => 'Dropbox',
            'id'          => 'ut_member_dropbox',
            'type'        => 'text',
            'class'       => ''
          ),
		  
		  array(
            'label'       => 'Flickr',
            'id'          => 'ut_member_flickr',
            'type'        => 'text',
            'class'       => ''
          ),
		  
		  array(
            'label'       => 'Xing',
            'id'          => 'ut_member_xing',
            'type'        => 'text',
            'class'       => ''
          ),
		  
		  array(
            'label'       => 'Youtube',
            'id'          => 'ut_member_youtube',
            'type'        => 'text',
            'class'       => ''
          ),
		  
		  array(
            'label'       => 'Vimeo',
            'id'          => 'ut_member_vimeo',
            'type'        => 'text',
            'class'       => ''
          ),
		  
		  array(
            'label'       => 'LinkedIn',
            'id'          => 'ut_member_linkedin',
            'type'        => 'text',
            'class'       => ''
          ),
		  
		  array(
            'label'       => 'Instagram',
            'id'          => 'ut_member_instagram',
            'type'        => 'text',
            'class'       => ''
          ),
          
        ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => 'ut-team-manager'
	  ),
	  
	  array(
        'label'       	=> 'Misc Settings',
        'id'         	=> 'ut_misc_setting',
        'type'        	=> 'textblock',
        'desc'        	=> '<h2><span>Misc /</span> Settings</h2>',
        'std'         	=> '',
        'rows'        	=> '',
		'section_class'	=> 'ut-settings-heading'
      ),
	  
	  array(
        'id'          => 'ut_section_class',
        'label'       => 'Optional Class',
        'desc'        => 'Optional CSS Class',
        'std'         => '',
        'type'        => 'text',
        'min_max_step'=> '',
        'class'       => ''
      )
	  
  	)
  );
  
  ot_register_meta_box( $ut_one_page_settings );

}