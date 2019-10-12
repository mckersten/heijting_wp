<?php
/*
|--------------------------------------------------------------------------
| Admin Init
|--------------------------------------------------------------------------
*/
if ( ! function_exists( 'ut_admin_init' ) ) :

    function ut_admin_init() {
        	
		/*
		* Section Manager
		*/
		
		add_action('admin_print_styles-post.php', 'load_ut_section_manager_styles'); 
		add_action('admin_print_styles-post-new.php', 'load_ut_section_manager_styles');
		
		add_action('admin_print_scripts-appearance_page_ot-theme-options', 'load_ut_option_tree_styles'); 

		
    }

endif;


/*
|--------------------------------------------------------------------------
| Needed JS for Option Tree to make it more interactive
|--------------------------------------------------------------------------
*/
if ( ! function_exists( 'load_ut_option_tree_styles' ) ) :

	function load_ut_option_tree_styles() {
	
		wp_register_script('ut-option-tree-js', THEME_WEB_ROOT .'/admin/assets/js/ut-option-effects.js', array('jquery'));
		wp_enqueue_script('ut-option-tree-js');
		
		$popup_vars = array( 'pop_url' => THEME_WEB_ROOT . '/admin/' );
		wp_localize_script( 'ut-option-tree-js', 'ut_font_popup', $popup_vars );		
		
	}

endif;


/*
|--------------------------------------------------------------------------
| Needed CSS and JS
|--------------------------------------------------------------------------
*/
if ( ! function_exists( 'load_ut_section_manager_styles' ) ) :

	function load_ut_section_manager_styles() {
		
		wp_enqueue_style('ut-section-font'	 , THEME_WEB_ROOT . '/css/ut-fontface.css');
		wp_enqueue_style('ut-section-manager', THEME_WEB_ROOT . '/admin/assets/css/ut-section-manager.css');		
				
		wp_register_script('ut-section-manager-js', THEME_WEB_ROOT .'/admin/assets/js/ut-section-manager.js', array('jquery'));
		wp_enqueue_script( 'ut-section-manager-js' );
		
		
	}

endif;


/*
|--------------------------------------------------------------------------
| Add Action for Admin Init
|--------------------------------------------------------------------------
*/
if( is_admin() ){
    add_action('admin_init' , 'ut_admin_init');
	
}

?>