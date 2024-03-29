<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class UT_Portfolio {
	
    private $dir;
	private $file;
	private $assets_dir;
	private $assets_url;
	private $token;

	public function __construct( $file ) {
		
        $this->dir = dirname( $file );
		$this->file = $file;
		$this->assets_dir = trailingslashit( $this->dir ) . 'assets';
		$this->assets_url = esc_url( trailingslashit( plugins_url( '/assets/', $file ) ) );
		$this->token = 'portfolio';

		// Regsiter post type
		add_action( 'init' , array( &$this , 'register_post_type' ) );

		// Register taxonomy
		add_action('init', array( &$this , 'register_taxonomy' ) );
				
		if ( is_admin() ) {

			// Handle custom fields for post
			add_action( 'admin_menu', array( &$this, 'meta_box_setup' ), 20 );
			add_action( 'save_post', array( &$this, 'meta_box_save' ) );	

			// Modify text in main title text box
			add_filter( 'enter_title_here', array( &$this, 'enter_title_here' ) );

			// Display custom update messages for posts edits
			add_filter( 'post_updated_messages', array( &$this, 'updated_messages' ) );

			// Handle post columns
			add_filter( 'manage_edit-' . $this->token . '_columns', array( &$this, 'register_custom_column_headings' ), 10, 1 );
			add_action( 'manage_pages_custom_column', array( &$this, 'register_custom_columns' ), 10, 2 );
			
			// Custom CSS for Single Portfolio Admin Pages
			add_action('admin_print_styles-post.php' , array( &$this, 'register_portfolio_scripts' ));
			add_action('admin_print_styles-post-new.php' , array( &$this, 'register_portfolio_scripts' ));

		}

	}
	
	public function register_portfolio_scripts() {
	
		global $post_type;
		
		if( $post_type == 'portfolio' ) {
			
			wp_enqueue_style( 'ut-portfolio-single-css' 	, UT_PORTFOLIO_URL . 'assets/css/admin/ut.portfolio.single.css', 10, 2 );
			wp_enqueue_script('ut-portfolio-single-js'		, UT_PORTFOLIO_URL . 'assets/js/admin/ut.portfolio.single.js', array('jquery'), '1.0' , true );
			
		}
	
	}
	
	
	public function register_post_type() {
 
		$labels = array(
			'name' => _x( 'Portfolio', 'post type general name' , 'ut_portfolio_lang' ),
			'singular_name' => _x( 'Portfolio', 'post type singular name' , 'ut_portfolio_lang' ),
			'add_new' => _x( 'Add New', $this->token , 'ut_portfolio_lang' ),
			'add_new_item' => sprintf( __( 'Add New %s' , 'ut_portfolio_lang' ), __( 'Portfolio' , 'ut_portfolio_lang' ) ),
			'edit_item' => sprintf( __( 'Edit %s' , 'ut_portfolio_lang' ), __( 'Portfolio' , 'ut_portfolio_lang' ) ),
			'new_item' => sprintf( __( 'New %s' , 'ut_portfolio_lang' ), __( 'Portfolio' , 'ut_portfolio_lang' ) ),
			'all_items' => sprintf( __( 'All %s' , 'ut_portfolio_lang' ), __( 'Portfolios' , 'ut_portfolio_lang' ) ),
			'view_item' => sprintf( __( 'View %s' , 'ut_portfolio_lang' ), __( 'Portfolio' , 'ut_portfolio_lang' ) ),
			'search_items' => sprintf( __( 'Search %a' , 'ut_portfolio_lang' ), __( 'Portfolios' , 'ut_portfolio_lang' ) ),
			'not_found' =>  sprintf( __( 'No %s Found' , 'ut_portfolio_lang' ), __( 'Portfolios' , 'ut_portfolio_lang' ) ),
			'not_found_in_trash' => sprintf( __( 'No %s Found In Trash' , 'ut_portfolio_lang' ), __( 'Posts' , 'ut_portfolio_lang' ) ),
			'parent_item_colon' => '',
			'menu_name' => __( 'Portfolio' , 'ut_portfolio_lang' )
		);
		
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'rewrite' => array(
					'slug' => UT_PORTFOLIO_ITEM
			),
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'supports' => array( 'title' , 'editor' , 'thumbnail' , 'excerpt' , 'comments' , 'post_formats'  ),
			'menu_position' => 5,
			'menu_icon' => UT_PORTFOLIO_URL . '/assets/images/icons/portfolio.png'
		);

		register_post_type( $this->token, $args );
		
	}

	public function register_taxonomy() {

        $labels = array(
            'name' => __( 'Categories' , 'ut_portfolio_lang' ),
            'singular_name' => __( 'Category', 'ut_portfolio_lang' ),
            'search_items' =>  __( 'Search Categories' , 'ut_portfolio_lang' ),
            'all_items' => __( 'All Categories' , 'ut_portfolio_lang' ),
            'parent_item' => __( 'Parent Category' , 'ut_portfolio_lang' ),
            'parent_item_colon' => __( 'Parent Category:' , 'ut_portfolio_lang' ),
            'edit_item' => __( 'Edit Category' , 'ut_portfolio_lang' ),
            'update_item' => __( 'Update Category' , 'ut_portfolio_lang' ),
            'add_new_item' => __( 'Add New Category' , 'ut_portfolio_lang' ),
            'new_item_name' => __( 'New Category Name' , 'ut_portfolio_lang' ),
            'menu_name' => __( 'Categories' , 'ut_portfolio_lang' ),
        );

        $args = array(
            'public' => true,
            'hierarchical' => true,
            'rewrite' => true,
            'labels' => $labels
        );

        register_taxonomy( 'portfolio-category' , $this->token , $args );
    }

    public function register_custom_column_headings( $defaults ) {
		
		$new_columns = array(
			'custom-field' => __( 'Custom Field' , 'ut_portfolio_lang' )
		);
		
		$last_item = '';

		if ( isset( $defaults['date'] ) ) { unset( $defaults['date'] ); }

		if ( count( $defaults ) > 2 ) { 
			$last_item = array_slice( $defaults, -1 );

			array_pop( $defaults );
		}
		$defaults = array_merge( $defaults, $new_columns );
		
		if ( $last_item != '' ) {
			foreach ( $last_item as $k => $v ) {
				$defaults[$k] = $v;
				break;
			}
		}

		return $defaults;
	}

	public function register_custom_columns( $column_name, $id ) {
		
		switch ( $column_name ) {

			case 'custom-field':
				$data = get_post_meta( $id , '_custom_field' , true );
				echo $data;
			break;

			default:
			break;
		}

	}

	public function updated_messages( $messages ) {
	  
      global $post, $post_ID;

	  $messages[$this->token] = array(
	    0 => '', // Unused. Messages start at index 1.
	    1 => sprintf( __( 'Post updated. %sView post%s.' , 'ut_portfolio_lang' ), '<a href="' . esc_url( get_permalink( $post_ID ) ) . '">', '</a>' ),
	    2 => __( 'Custom field updated.' , 'ut_portfolio_lang' ),
	    3 => __( 'Custom field deleted.' , 'ut_portfolio_lang' ),
	    4 => __( 'Post updated.' , 'ut_portfolio_lang' ),
		
	    /* translators: %s: date and time of the revision */
	    5 => isset($_GET['revision']) ? sprintf( __( 'Post restored to revision from %s.' , 'ut_portfolio_lang' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
	    6 => sprintf( __( 'Post published. %sView post%s.' , 'ut_portfolio_lang' ), '<a href="' . esc_url( get_permalink( $post_ID ) ) . '">', '</a>' ),
	    7 => __( 'Post saved.' , 'ut_portfolio_lang' ),
	    8 => sprintf( __( 'Post submitted. %sPreview post%s.' , 'ut_portfolio_lang' ), '<a target="_blank" href="' . esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) . '">', '</a>' ),
	    9 => sprintf( __( 'Post scheduled for: %1$s. %2$sPreview post%3$s.' , 'ut_portfolio_lang' ), '<strong>' . date_i18n( __( 'M j, Y @ G:i' , 'ut_portfolio_lang' ), strtotime( $post->post_date ) ) . '</strong>', '<a target="_blank" href="' . esc_url( get_permalink( $post_ID ) ) . '">', '</a>' ),
	    10 => sprintf( __( 'Post draft updated. %sPreview post%s.' , 'ut_portfolio_lang' ), '<a target="_blank" href="' . esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) . '">', '</a>' ),
	  );

	  return $messages;
	}

	public function meta_box_setup() {		
		add_meta_box( 'post-data', __( 'Portfolio Details' , 'ut_portfolio_lang' ), array( &$this, 'meta_box_content' ), $this->token, 'normal', 'high' );
	}
    
    public function selected_array( $current , $key , $haystack ) {
												
		if( is_array($haystack) && isset($haystack[$key]) && $haystack[$key] == $current) {
			$current = $haystack = 1;
			return selected( $haystack, $current , false );
		}
		
	}
    
    public function checked_array( $current , $key , $haystack ) {
												
		if( is_array($haystack) && isset($haystack[$key]) && $haystack[$key] == $current) {
			$current = $haystack = 1;
			return checked( $haystack, $current , false );
		}
		
	}
    
	public function meta_box_content() {
		global $post_id;
		$fields = get_post_custom( $post_id );
		$field_data = $this->get_custom_fields_settings();

		$html = '';
		
		$html .= '<input type="hidden" name="' . $this->token . '_nonce" id="' . $this->token . '_nonce" value="' . wp_create_nonce( plugin_basename( $this->dir ) ) . '" />';
		
		if ( 0 < count( $field_data ) ) {
			
			$html .= '<table class="form-table">' . "\n";
			$html .= '<tbody>' . "\n";

			foreach ( $field_data as $k => $v ) {
				
				$data = $v['default'];
				
				if ( isset( $fields[$k] ) && isset( $fields[$k][0] ) ) {
					$data = $fields[$k][0];
				}
				
				if( $v['type'] == 'checkbox' ) {
					
					$html .= '<tr valign="top"><th scope="row">' . $v['name'] . '</th><td><input name="' . esc_attr( $k ) . '" type="checkbox" id="' . esc_attr( $k ) . '" ' . checked( 'on' , $data ) . ' /> <label for="' . esc_attr( $k ) . '"><span class="description">' . $v['description'] . '</span></label>' . "\n";
					$html .= '</td><tr/>' . "\n";
				
                } elseif( $v['type'] == 'ut_portfolio_show_caption' ) {
                    
                    /* data available */
					$data = maybe_unserialize( $data );
                                        
                    $html .= '<tr valign="top"><th scope="row">' . $v['name'] . '</th><td>';

                        $html .= '<div class="ut-checkbox"><input name="' . esc_attr( $k ) . '" type="checkbox" id="' . esc_attr( $k ) . '" ' . checked( 'on' , $data, false ) . ' /><label for="' . esc_attr( $k ) . '"></label></div>';
                        $html .= '<p class="description">' . __('turn image captions inside the hero section on or off. ( single portfolio pages only )' , 'ut_portfolio_lang') . '</p>';
                        
                    $html .= '</td><tr/>' . "\n";
                
                
                } elseif( $v['type'] == 'ut_portfolio_caption_align') {
                    
                    $html .= '<tr valign="top"><th scope="row">' . $v['name'] . '</th><td>';
                        
                        /* data available */
						$data = maybe_unserialize( $data );
                        
                        $html .= '<select name="' . esc_attr( $k ) . '[align]" id="' . esc_attr( $k ) . '_target">';
                            
                            $html .= '<option value="left" '  . $this->selected_array( 'left' , 'align' , $data ) . '>'  . __('left' , 'ut_portfolio_lang') . '</option>';
                            $html .= '<option value="right" ' . $this->selected_array( 'right' , 'align' , $data ) . '>' . __('right' , 'ut_portfolio_lang') . '</option>';
                            $html .= '<option value="center" ' . $this->selected_array( 'center' , 'align' , $data ) . '>' . __('center' , 'ut_portfolio_lang') . '</option>';

                        $html .= '</select>';  
                                              
                        $html .= '<p class="description">' . $v['description'] . '</p>' . "\n";
                        
                    $html .= '</td><tr/>' . "\n";
                
                } elseif( $v['type'] == 'select' ) {
                    
                    $html .= '<tr valign="top"><th scope="row">' . $v['name'] . '</th><td>';
                        
                        /* data available */
						$data = maybe_unserialize( $data );
                        
                        $html .= '<select name="' . esc_attr( $k ) . '[target]" id="' . esc_attr( $k ) . '_target">';
                            
                            $html .= '<option value="onepage" '  . $this->selected_array( 'onepage' , 'target' , $data ) . '>'  . __('as part of the One Page' , 'ut_portfolio_lang') . '</option>';
                            $html .= '<option value="internal" ' . $this->selected_array( 'internal' , 'target' , $data ) . '>' . __('on a separate portfolio page' , 'ut_portfolio_lang') . '</option>';
                            $html .= '<option value="external" ' . $this->selected_array( 'external' , 'target' , $data ) . '>' . __('on an external website' , 'ut_portfolio_lang') . '</option>';

                        $html .= '</select>';  
                                              
                        $html .= '<p class="description">' . $v['description'] . '</p>' . "\n";
                        
                    $html .= '</td><tr/>' . "\n";
                
				} elseif( $v['type'] == 'repeatable') {
					
					$html .= '<tr valign="top"><th scope="row">' . $v['name'] . '</th><td>';
						
						$c = 0;
						
						$html .= '<div id="ut-repeat-' . esc_attr( $k ) . '">';
						
						/* data available */
						$data = maybe_unserialize( $data );
												
						if( is_array($data) ) {
							
							if ( count( $data ) > 0 ) {
								
                                $html .= '<p style="display:none;"><input type="text" name="' . esc_attr( $k ) . '[0][title]" value="" /><input type="text" name="' . esc_attr( $k ) . '[0][value]" value="" /></p>';
                                
								foreach( $data as $key => $dataset ) {
									
                                    if( $key ) {
									    $html .= '<p> Title: <input type="text" name="' . esc_attr( $k ) . '['.$key.'][title]" value="' . $dataset['title'] . '" /> Description: <input type="text" name="' . esc_attr( $k ) . '['.$key.'][value]" value="' . $dataset['value'] . '" /><span class="button remove">' . __('X' , 'ut_portfolio_lang') . '</span></p>';
									    $c = $key;
                                    }
                                    
								}
								
							}
							
						} 
												
						$html.= '</div>';
					
					$html .= '</td><tr/>' . "\n";
					
					$html .= '<tr valign="top"><th scope="row"></th><td><span class="add button button-primary add-feature">' . __('Add Field' , 'ut_portfolio_lang') . '</span></td><tr/>';
					$html .= '<tr valign="top"><th scope="row"></th><td><p class="description">' . $v['description'] . '</p></td><tr/>';
					
					$script = '<script>
							    
								(function($){
								
									$(document).ready(function() {
										
										var count = '.$c.';
										
										$(".add").click(function() {
											
											count = count + 1;
								
											$(\'#ut-repeat-' . esc_attr( $k ) . '\').append(\'<p> Title: <input type="text" name="' . esc_attr( $k ) . '[\'+count+\'][title]" value="" /> Description: <input type="text" name="' . esc_attr( $k ) . '[\'+count+\'][value]" value="" /><span class="button remove">' . __('X' , 'ut_portfolio_lang') . '</span></p>\' );
											return false;
											
										});
										
										$(document).on("click", ".remove", function(event) { 
											
											$(this).parent().remove();
											
										});
										
									});
								
								})(jQuery);
								
							  </script>';
							  
					
					$html .= $script;
							
				
				} else {
					
					$html .= '<tr valign="top"><th scope="row"><label for="' . esc_attr( $k ) . '">' . $v['name'] . '</label></th><td><input name="' . esc_attr( $k ) . '" type="text" id="' . esc_attr( $k ) . '" class="regular-text" value="' . esc_attr( $data ) . '" />' . "\n";
					$html .= '<p class="description">' . $v['description'] . '</p>' . "\n";
					$html .= '</td><tr/>' . "\n";
					
				}

			}

			$html .= '</tbody>' . "\n";
			$html .= '</table>' . "\n";
			
		}
		
		echo $html;	
	}

	public function meta_box_save( $post_id ) {
		
        global $post, $messages;
		
		// Verify nonce
		if ( ( get_post_type() != $this->token ) || isset($_POST[ $this->token . '_nonce']) && ! wp_verify_nonce( $_POST[ $this->token . '_nonce'], plugin_basename( $this->dir ) ) ) {  
			return $post_id;  
		}

		// Verify user permissions
		if ( ! current_user_can( 'edit_post', $post_id ) ) { 
			return $post_id;
		}
		
		// Handle custom fields
		$field_data = $this->get_custom_fields_settings();
		$fields = array_keys( $field_data );
		
		foreach ( $fields as $f ) {
			
			if( isset( $_POST[$f] ) ) {
				
				if( !array( $_POST[$f] ) ) {
					
					${$f} = strip_tags( trim( $_POST[$f] ) );
				
				} else {
					
					${$f} = $_POST[$f];			
										
				}
				
			}

			// Escape the URLs.
			if ( 'url' == $field_data[$f]['type'] ) {
				${$f} = esc_url( ${$f} );
			}
			
			if ( empty(${$f}) ) { 
				
                delete_post_meta( $post_id , $f , get_post_meta( $post_id , $f , true ) );
                
			} elseif( isset(${$f}) ) {
                
				update_post_meta( $post_id , $f , ${$f} );
                
			}
		}

	}

	public function enter_title_here( $title ) {
		if ( get_post_type() == $this->token ) {
			$title = __( 'Enter the post title here' , 'ut_portfolio_lang' );
		}
		return $title;
	}

	public function get_custom_fields_settings() {
		$fields = array();

			$fields['ut_page_slogan'] = array(
				'name' => __( 'Portfolio Slogan:' , 'ut_portfolio_lang' ),
				'description' => __( ' Adds a slogan right beneath the page title ( single portfolio pages only ) .' , 'ut_portfolio_lang' ),
				'type' => 'text',
				'default' => '',
				'section' => 'plugin-data'
			);
			
            $fields['ut_portfolio_show_caption'] = array(
				'name' => __( 'Image Captions' , 'ut_portfolio_lang' ),
				'description' => __( 'display image title and caption inside hero ( single portfolio pages only ). You can change image title and caption inside the media library' , 'ut_portfolio_lang' ),
				'type' => 'ut_portfolio_show_caption',
				'default' => '',
				'section' => 'plugin-data'
			);
            
            $fields['ut_portfolio_caption_align'] = array(
				'name' => __( 'Caption Alignment' , 'ut_portfolio_lang' ),
				'description' => __( 'only available if "Image Captions" has been set to "On" ( single portfolio pages only ).' , 'ut_portfolio_lang' ),
				'type' => 'ut_portfolio_caption_align',
				'default' => '',
				'section' => 'plugin-data'
			);
            
			$fields['ut_portfolio_details'] = array(
				'name' => __( 'Portfolio Details:' , 'ut_portfolio_lang' ),
				'description' => __( 'Adds a nice portfolio description list to this portfolio' , 'ut_portfolio_lang' ),
				'type' => 'repeatable',
				'repeat_fields' => array( 'title' , 'description' ),
				'default' => '',
				'section' => 'plugin-data'
			);
			
            $fields['ut_portfolio_link_type'] = array(
				'name' => __( 'Show Portfolio Details' , 'ut_portfolio_lang' ),
				'description' => __( 'Choose how the portfolio details should display.' , 'ut_portfolio_lang' ),
				'type' => 'select',
				'default' => '',
				'section' => 'plugin-data'
			);
            
			$fields['ut_external_link'] = array(
				'name' => __( 'Project Link:' , 'ut_portfolio_lang' ),
				'description' => __( 'Redirect the portfolio thumbnail directly to an external site. Only available for standard post format.' , 'ut_portfolio_lang' ),
				'type' => 'text',
				'default' => '',
				'section' => 'plugin-data'
			);

		return $fields;
        
	}
		
}