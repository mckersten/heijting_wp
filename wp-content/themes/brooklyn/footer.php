<?php global $detect; ?>
	
    </div><!-- close main-content-background -->
    
    <div class="clear"></div>
    
    <?php ut_before_footer_hook(); // action hook, see inc/ut-theme-hooks.php ?>
    
    <?php 
	
	/* check if contact section is active */		
	$ut_activate_csection = ot_get_option('ut_activate_csection' , 'off'); 
	
	if( $ut_activate_csection == 'on' ) {
			
		/* contact section headline */ 
		$ut_csection_header_expertise_slogan = ot_get_option('ut_csection_header_expertise_slogan') ;
		$ut_csection_header_slogan = ot_get_option('ut_csection_header_slogan') ;
		$ut_csection_header_style = ot_get_option('ut_csection_header_style' , 'pt-style-1');
		$ut_csection_header_style = $ut_csection_header_style == 'global' ? ot_get_option('ut_global_headline_style') : $ut_csection_header_style;
				
		/* contact section background and overlay */
		$ut_csection_background_type = ot_get_option('ut_csection_background_type' , 'image');
		$ut_csection_parallax = ( ot_get_option('ut_csection_parallax' , 'off') == 'on' ) ? 'parallax-background parallax-section' : '';
		$ut_csection_overlay = ot_get_option( 'ut_csection_overlay' , 'on' );
		$ut_csection_overlay_pattern = ot_get_option( 'ut_csection_overlay_pattern' , 'on' );		
		$ut_csection_overlay_pattern = $ut_csection_overlay_pattern == 'on' ? 'parallax-overlay-pattern' : '';
		$ut_csection_overlay_pattern_style = ot_get_option( 'ut_csection_overlay_pattern_style' , 'style_one' );
		$ut_csection_map = ot_get_option( 'ut_csection_map' );
		$contact_map_class = ($ut_csection_map && $ut_csection_background_type == 'map') ? 'contact-map' : '';
				
		/* contact section skin */
		$ut_csection_skin = ot_get_option( 'ut_csection_skin' );
		
		/* contact section areas */
		$ut_left_csection_content_area = ot_get_option('ut_left_csection_content_area');
		$ut_right_csection_content_area = ot_get_option('ut_right_csection_content_area');
		
		$ut_left_csection_content_area_width = !empty($ut_right_csection_content_area) ? 'grid-45 suffix-5' : 'grid-70 prefix-15 mobile-grid-100 tablet-grid-100';
		$ut_right_csection_content_area_width = !empty($ut_left_csection_content_area) ? 'grid-50' : 'grid-70 prefix-15 mobile-grid-100 tablet-grid-100';
		
	}
	
	?>
    
    <?php if( $ut_activate_csection == 'on' ) : ?>
    
    <section id="contact-section" data-effect="fadeIn" class="animated contact-section <?php echo $ut_csection_parallax; ?> <?php echo $ut_csection_skin; ?> <?php echo $contact_map_class; ?>">   		
    
    <a class="ut-offset-anchor" id="section-contact"></a> 
        
        <?php if( $ut_csection_map && $ut_csection_background_type == 'map' ) : ?>       
        
        <div class="background-map"><?php echo apply_filters( 'the_content' , $ut_csection_map ); ?></div>
        
        <?php endif; ?>
        
        <?php if( $ut_csection_overlay == 'on' ) : ?>
        
        <div class="parallax-overlay <?php echo $ut_csection_overlay_pattern; ?> <?php echo $ut_csection_overlay_pattern_style; ?>">
		
        <?php endif; ?>
        
        <div class="grid-container parallax-content">
        	
            <?php if( !empty($ut_csection_header_slogan) || !empty($ut_csection_header_expertise_slogan) ) : ?>
            
            <!-- parallax header -->
            <div class="grid-70 prefix-15 mobile-grid-100 tablet-grid-100">
                <header class="parallax-header <?php echo $ut_csection_header_style; ?>">
                    
                    <?php if( !empty($ut_csection_header_slogan) ) : ?>
                    	<h2 class="parallax-title"><span><?php echo do_shortcode( ut_translate_meta($ut_csection_header_slogan) ); ?></span></h2>
                    <?php endif; ?>
                    
                    <?php if( !empty($ut_csection_header_expertise_slogan) ) : ?>
                    	<p class="lead"><?php echo do_shortcode( ut_translate_meta($ut_csection_header_expertise_slogan) ); ?></p>
                    <?php endif; ?>
                    
                </header>
            </div>
            <!-- close parallax header -->
            
            <div class="clear"></div>
            
            <?php endif; ?>
        
        </div>
        <div class="grid-container section-content">
            
            <!-- contact wrap -->
            <div class="grid-100 mobile-grid-100 tablet-grid-100">
                <div class="contact-wrap">
                
                    <?php if( !empty($ut_left_csection_content_area) ) : ?>
                    
                    <!-- contact message -->
                    <div class="<?php echo $ut_left_csection_content_area_width; ?>">
                        <div class="ut-left-footer-area clearfix">
                            
                            <?php echo apply_filters( 'the_content' , ot_get_option('ut_left_csection_content_area') ); ?>
                            
                        </div>
                    </div><!-- close contact message -->
                    
                    <?php endif; ?>
                    
                    <?php if( !empty($ut_right_csection_content_area) ) :?>
                    
                    <!-- contact form-holder -->
                    <div class="<?php echo $ut_right_csection_content_area_width; ?>">
                        <div class="ut-right-footer-area clearfix">
                        	
                            <?php echo apply_filters( 'the_content' , ot_get_option('ut_right_csection_content_area') ); ?>
                                
                        </div>
                    </div><!-- close contact-form-holder -->
                	
                    <?php endif; ?>                    
                    
                </div>
            </div><!-- close contact wrap -->
            
            
		</div><!-- close container -->
        
        <?php if( $ut_csection_overlay == 'on' ) : ?>
        
        </div><!-- parallax overlay -->
		
        <?php endif; ?>
        
	</section>
    
    <div class="clear"></div>
    
    <?php endif; //#ut_activate_csection ?>
    
    
    <?php $footerwidgets = is_active_sidebar('first-footer-widget-area') + is_active_sidebar('second-footer-widget-area') + is_active_sidebar('third-footer-widget-area') + is_active_sidebar('fourth-footer-widget-area'); ?>
    
        
        
	<!-- Footer Section -->
    <footer class="footer <?php echo ot_get_option('ut_footer_skin' , 'ut-footer-light'); ?>">
        
        <?php get_sidebar( 'footer' ); ?>
        
        <a href="#top" class="toTop"><i class="fa fa-angle-double-up"></i></a>
    	
        <div class="footer-content">        
            
            <div class="grid-container">
                
                <div class="grid-70 prefix-15 mobile-grid-100 tablet-grid-100">
                
                    <?php echo ot_get_option('ut_site_copyright'); ?>
                        
                    <?php 
                        
                        $social = ot_get_option('ut_footer_social_icons');
                        
                        if( is_array( $social ) && !empty( $social ) ) {
                            
                            echo '<ul class="ut-footer-so">';    
                                
                                foreach( $social as $icon => $value) {
                                    
                                    $link  = !empty($value["link"]) ? $value["link"] : '#' ;
                                    $title = !empty($value["title"]) ? 'title="'.$value["title"].'"' : '' ;
                                    
                                    echo '<li>';
                                        echo '<a '.$title.' href="'.$link.'"><i class="fa '.$value["icon"].' fa-lg"></i></a>';
                                    echo '</li>';
                                    
                                }
                            
                            echo '</ul>';    
                        
                        } 
                    ?>
                        
                   <span class="copyright">
                        Met passie gerealiseerd door <a href="https://www.wearecodebreakers.com/" target="_blank" title="Webdesign Nijmegen">Codebreakers</a>
                    </span>
                        
                </div>
                    
            </div><!-- close container -->        
        </div><!-- close footer content -->
        
	</footer><!-- close footer -->
        
   	<?php ut_after_footer_hook(); // action hook, see inc/ut-theme-hooks.php ?>
	
    <?php wp_footer(); ?>
    
	<script type="text/javascript">
    /* <![CDATA[ */        
        
		<?php ut_java_footer_hook(); // action hook, see inc/ut-theme-hooks.php ?> 
		
		<?php if( ot_get_option('ut_google_analytics') ) : ?>
		  
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', '<?php echo stripslashes( ot_get_option('ut_google_analytics') ); ?>']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		  
		<?php endif; ?>
		     
     /* ]]> */
    </script> 
    
    </div><!-- close #main-content -->
	
    <?php echo ut_create_bg_videoplayer(); // video player ?>
        
    </body>
</html>