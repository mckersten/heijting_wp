<?php

/*
|--------------------------------------------------------------------------
| returns the potfolio like video
|--------------------------------------------------------------------------
*/


if ( ! function_exists( 'ut_get_portfolio_post' ) ) :

	function ut_get_portfolio_post() {
		
		/* get portfolio id */
		$portfolio_id = (int)$_POST[ 'portfolio_id' ];
		
		/* get post object */
		$portfolio = get_post( $portfolio_id , OBJECT );
		
		/* get post format */
		$post_format = get_post_format( $portfolio_id );	
		
		/* try to catch video url */
		$video_url = ut_get_portfolio_format_video_content( $portfolio->post_content );	
			
		/* get embed code */ 
		$embed_code = wp_oembed_get( $video_url );
		
        /* add high quality */
        if(strpos($embed_code, 'youtu.be') !== false || strpos($embed_code, 'youtube.com') !== false){
            $embed_code = preg_replace("@src=(['\"])?([^'\">\s]*)@", "src=$1$2&vq=hd720", $embed_code);
        }
        	
		echo $embed_code;
		
        die(1);
		
	}

endif;

add_action( 'wp_ajax_nopriv_ut_get_portfolio_post', 'ut_get_portfolio_post' );
add_action( 'wp_ajax_ut_get_portfolio_post', 'ut_get_portfolio_post' );


?>