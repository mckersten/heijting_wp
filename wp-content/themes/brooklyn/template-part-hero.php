<?php 

$extraClass = $prefix = NULL;



if( is_front_page() ) { 
	
    /*
    |--------------------------------------------------------------------------
    | front page header images etc from option tree
    |--------------------------------------------------------------------------
    */
    
	$ut_custom_slogan 			= ot_get_option('ut_front_custom_slogan');
	$ut_expertise_slogan 		= ot_get_option('ut_front_expertise_slogan');
	$ut_company_slogan 	 		= ot_get_option('ut_front_company_slogan');
    $ut_catchphrase 		    = ot_get_option('ut_front_catchphrase');
	$ut_scroll_to_main 	 		= ot_get_option('ut_front_scroll_to_main');
	$ut_scroll_to_main_target	= ot_get_option('ut_front_scroll_to_main_target');
	
	if( !empty( $ut_scroll_to_main_target ) ) {
		$ut_scroll_to_main_target = '#section-' . ut_get_the_slug($ut_scroll_to_main_target);
	} else {
		$ut_scroll_to_main_target	= '#ut-to-first-section';
	}
	
	$ut_hero_overlay	 		= ot_get_option('ut_front_page_overlay');
	$ut_hero_style	 			= ot_get_option('ut_front_page_hero_style' , 'ut-hero-style-1');
	$ut_hero_align   			= ot_get_option('ut_front_page_hero_align' , 'center');
	$ut_hero_font_style			= ot_get_option('ut_front_page_hero_font_style' , 'semibold');
	$ut_hero_overlay_pattern 	= ot_get_option('ut_front_page_overlay_pattern' , 'on');
	$ut_hero_dynamic_content 	= ot_get_option('front_hero_dynamic_content');
	$pattern = ( $ut_hero_overlay_pattern == 'on' ) ? 'parallax-overlay-pattern' : '';
	$patternstyle = ot_get_option('ut_front_page_overlay_pattern_style' , 'style_one');
}


if( is_home() ) { 
	
    /*
    |--------------------------------------------------------------------------
    | blog header images etc from option tree
    |--------------------------------------------------------------------------
    */
    
	$ut_custom_slogan 			= ot_get_option('ut_blog_custom_slogan');
	$ut_expertise_slogan 		= ot_get_option('ut_blog_expertise_slogan');
	$ut_company_slogan 	 		= ot_get_option('ut_blog_company_slogan');
    $ut_catchphrase 		    = ot_get_option('ut_blog_catchphrase');
	$ut_scroll_to_main 	 		= ot_get_option('ut_blog_scroll_to_main');
	$ut_scroll_to_main_target	= '#ut-to-first-section';
	$ut_hero_overlay	 		= ot_get_option('ut_blog_overlay');
	$ut_hero_style	 			= ot_get_option('ut_blog_hero_style' , 'ut-hero-style-1');
	$ut_hero_align   			= ot_get_option('ut_blog_hero_align' , 'center');
	$ut_hero_font_style			= ot_get_option('ut_blog_hero_font_style' , 'semibold');
	$ut_hero_overlay_pattern 	= ot_get_option('ut_blog_overlay_pattern' , 'on');
	$ut_hero_dynamic_content 	= ot_get_option('blog_hero_dynamic_content');
	$pattern = ( $ut_hero_overlay_pattern == 'on' ) ? 'parallax-overlay-pattern' : '';
	$patternstyle = ot_get_option('ut_blog_overlay_pattern_style' , 'style_one');
	
}

/* header settings type slider */
if( ( is_front_page() && ot_get_option('ut_front_page_header_type') == 'slider') || ( is_home() && ot_get_option('ut_blog_header_type') == 'slider' ) ) {
	
	$extraClass = 'slider';
	
} ?>

    
    <?php
    /*
    |--------------------------------------------------------------------------
    | output for: dynamic hero with custom content
    |--------------------------------------------------------------------------
    */
    
    if( ( is_front_page() && ot_get_option('ut_front_page_header_type') == 'dynamic') || ( is_home() && ot_get_option('ut_blog_header_type') == 'dynamic' ) ) : ?>
    	
        <!-- hero section -->
        <section class="ha-waypoint" data-animate-up="ha-header-hide" data-animate-down="ha-header-hide">
        
        	 <?php echo apply_filters( 'the_content' , $ut_hero_dynamic_content ); ?>
        
        </section>
    
    
    <?php
    /*
    |--------------------------------------------------------------------------
    | output for: fancy transition fancy image slider header
    |--------------------------------------------------------------------------
    */
    
    elseif( is_front_page() && ot_get_option('ut_front_page_header_type') == 'transition' || is_home() && ot_get_option('ut_blog_header_type') == 'transition' ) : ?>
        
        <?php
        
        /* transition slider settings */        
        $effect = is_front_page() ? ot_get_option('front_fancy_slider_effect' , 'fxSoftScale') : ot_get_option('blog_fancy_slider_effect' , 'fxSoftScale');
        $slides = is_front_page() ? ot_get_option('ut_front_page_fancy_slider') : ot_get_option('ut_blog_fancy_slider');
        $slidecount = 1;
        
        ?>
          
        <!-- hero section -->
        <section class="ha-waypoint" data-animate-up="ha-header-hide" data-animate-down="ha-header-hide">
            
            <?php if( !empty($slides) && is_array($slides) ) : ?>
                
            <!-- slider -->
            <div id="ut-fancy-slider" class="ut-fancy-slider ut-fancy-slider-fullwidth <?php echo $effect; ?>">
                
                <ul class="ut-fancy-slides">
                    
                    <?php foreach( $slides as $slide ) : ?>
                    
                        <li <?php echo $slidecount==1 ? 'class="current"' : ''; ?>>
                                
                            <?php 
                            
                            /* single caption settings */
                            $style = ( !empty($slide['style']) && $slide['style'] != 'global') ? $slide['style'] : $ut_hero_style;
                            $fontstyle = ( !empty($slide['font_style']) && $slide['font_style'] != 'global') ? $slide['font_style'] : $ut_hero_font_style;
                            $link_description = !empty($slide['link_description']) ? $slide['link_description'] : '';
                            
                            if( !empty( $slide['scroll_to_target'] ) ) {
                                                                
                                $slidelink = '#section-' . ut_get_the_slug($slide['scroll_to_target']);  
                                                              
                            } elseif( !empty($link_description) ) {  
                                                          
                                $slidelink = !empty($slide['link']) ? $slide['link'] : '#ut-to-first-section';  
                                                          
                            }
                            
                            ?>                
                                                                            
                            <div class="grid-container">
                                <!-- hero holder -->
                                <div class="hero-holder grid-100 mobile-grid-100 tablet-grid-100 <?php echo $style; ?>">
                                    <div class="hero-inner" style="text-align:<?php echo $slide['align']; ?>">                
                                        
                                        <?php if( !empty($slide['expertise']) ) : ?>
                                            <div class="hdh"><span class="hero-description"><?php echo do_shortcode( ut_translate_meta($slide['expertise']) ); ?></span></div>
                                        <?php endif; ?>
                                                        
                                        <?php if( !empty($slide['description']) ) : ?>
                                            <div class="hth"><h1 class="hero-title <?php echo $fontstyle; ?>"><?php echo do_shortcode( ut_translate_meta($slide['description']) ); ?></h1></div>
                                        <?php endif; ?>
                                        
                                        <?php if( !empty($slide['catchphrase']) ) : ?>
                                            <div class="hdb"><span class="hero-description-bottom"><?php echo do_shortcode( ut_translate_meta($slide['catchphrase']) ); ?><span></div>
                                        <?php endif; ?>
                                        
                                        <?php if( !empty($link_description) ) : ?>
                                            <span class="hero-btn-holder"><a target="_blank" href="<?php echo $slidelink; ?>" class="hero-btn hero-slider-button"><?php echo ut_translate_meta($link_description); ?></a></span>
                                        <?php endif; ?>    
                                                                       
                                    </div>
                                </div><!-- close hero-holder -->
                            </div>
                            
                            <img alt="<?php echo !empty($slide['title']) ? $slide['title'] : ''; ?>" src="<?php echo $slide['image']; ?>">

                        </li>
                    
                    <?php $slidecount++; endforeach; ?>
                    
                </ul>
                
                <nav>
                    <a class="prev" href="#">Previous item</a>
                    <a class="next" href="#">Next item</a>
                </nav>
                
            </div>
            
        	<?php endif; ?>
        
        </section>
    
    <?php
    /*
    |--------------------------------------------------------------------------
    | output for: image slider header
    |--------------------------------------------------------------------------
    */
    
    elseif( ( is_front_page() && ot_get_option('ut_front_page_header_type') == 'slider') || ( is_home() && ot_get_option('ut_blog_header_type') == 'slider' ) ) :  ?>
          
          <!-- hero section -->
          <section id="ut-hero" class="<?php echo $extraClass; ?> hero ha-waypoint parallax-section parallax-background" data-animate-up="ha-header-hide" data-animate-down="ha-header-hide">
          
          <?php if( $ut_hero_overlay == 'on') : ?>
            
               <div class="parallax-overlay <?php echo $pattern; ?> <?php echo $patternstyle; ?>" style="position:absolute;"></div> 
            
          <?php endif; ?> 
                            
          <?php if( is_front_page() ) {
              
              /* get front page slides */
              $slides = ot_get_option('ut_front_page_slider');
              
          } ?>
          
          <?php if( is_home() ) {
              
              /* get blog slides */
              $slides = ot_get_option('ut_blog_slider');
              
          } ?>
          
          <?php if( !empty($slides) && is_array($slides) ) : ?>
          
              <!-- slider -->
              <div id="ut-hero-slider" class="ut-hero-slider flexslider">
                  
                  <ul class="slides">
      
                      <?php foreach($slides as $slide) : ?>
                                      
                          <li style="background:url(<?php echo $slide['image'] ; ?>)"></li>
                      
                      <?php endforeach; ?>
      
                  </ul>
                  
              </div>
              <!-- close slider -->
              
              <!-- controls -->
              <a class="ut-flex-control next"></a>
              <a class="ut-flex-control prev"></a>
              <!-- !controls -->
              
              <!-- caption -->
              <div id="ut-hero-captions" class="ut-hero-captions flexslider">
                  <ul class="slides">
                      
                          <?php foreach($slides as $slide) : ?>
                          
                              <?php 
                              
                              /* single caption settings */
                              $style = ( !empty($slide['style']) && $slide['style'] != 'global') ? $slide['style'] : $ut_hero_style;
                              $fontstyle = ( !empty($slide['font_style']) && $slide['font_style'] != 'global') ? $slide['font_style'] : $ut_hero_font_style;
                              $animation_direction = !empty($slide['direction']) ? $slide['direction'] : 'top'; 
                              
                              $slidelink = !empty($slide['link']) ? $slide['link'] : '#ut-to-first-section';
                              $link_description = !empty($slide['link_description']) ? $slide['link_description'] : '';
                              
                              ?>                
                          
                              <li>
                                  
                                  <div class="grid-container">
                                      <!-- hero holder -->
                                      <div class="hero-holder grid-100 mobile-grid-100 tablet-grid-100 <?php echo $style; ?>" data-animation="<?php echo $animation_direction; ?>">
                                          <div class="hero-inner">                
                                              
                                              <?php if( !empty($slide['expertise']) ) : ?>
                                                  <div class="hdh"><span class="hero-description"><?php echo do_shortcode( ut_translate_meta($slide['expertise']) ); ?></span></div>
                                              <?php endif; ?>
                                                              
                                              <?php if( !empty($slide['description']) ) : ?>
                                                  <div class="hth"><h1 class="hero-title <?php echo $fontstyle; ?>"><?php echo do_shortcode( ut_translate_meta($slide['description']) ); ?></h1></div>
                                              <?php endif; ?>
                                              
                                              <?php if( !empty($slide['catchphrase']) ) : ?>
                                                   <div class="hdb"><span class="hero-description-bottom"><?php echo do_shortcode( ut_translate_meta($slide['catchphrase']) ); ?><span></div>
                                              <?php endif; ?>
                                              
                                              <?php if( !empty($link_description) ) : ?>
                                                  <?php $slide['link_description'] = !empty($slide['link_description']) ? $slide['link_description'] : __('Read more' , 'unitedthemes'); ?>
                                                  <span class="hero-btn-holder"><a target="_blank" href="<?php echo $slidelink; ?>" class="hero-btn hero-slider-button"><?php echo ut_translate_meta($link_description); ?></a></span>
                                              <?php endif; ?>    
                                                                             
                                          </div>
                                      </div><!-- close hero-holder -->
                                  </div>
                                  
                              </li>
                          
                          <?php endforeach; ?>
                                      
                  </ul>
              </div>
              <!-- close captions -->
          
          <?php endif; ?> 
          
          </section>
          
    <?php else : ?>
    
        <!-- hero section -->
        <section id="ut-hero" class="<?php echo $extraClass; ?> hero ha-waypoint parallax-section parallax-background" data-animate-up="ha-header-hide" data-animate-down="ha-header-hide">
                
            <?php if( $ut_hero_overlay == 'on') : ?>
            
            <div class="parallax-overlay <?php echo $pattern; ?> <?php echo $patternstyle; ?>">
            
            <?php endif; ?>
            
            <?php
            /*
            |--------------------------------------------------------------------------
            | output for: image header
            |--------------------------------------------------------------------------
            */
            
            if( ( is_front_page() && ot_get_option('ut_front_page_header_type') == 'image') || ( is_home() && ot_get_option('ut_blog_header_type') == 'image' ) ) : ?>
            	
                
                <?php /* rain effect for hero */ ?>
                
                <?php if( ( is_front_page() && ot_get_option('ut_front_header_rain' , 'off') == 'on' ) || ( is_home() && ot_get_option('ut_blog_header_rain' , 'off') == 'on' ) ) : ?>
                	
                    <?php /* needed image */ ?>                    
                    <?php $background = ( is_front_page() || is_page() ) ? ot_get_option('ut_front_header_image' , false , true ) : ot_get_option('ut_blog_header_image' , false , true ); ?>                    
                    <img id="ut-rain-background" src="<?php echo $background['background-image']; ?>" alt="rain" />
                    
                <?php endif; ?>
                
                <div class="grid-container">
                    <!-- hero holder -->
                    <div class="hero-holder grid-100 mobile-grid-100 tablet-grid-100 <?php echo $ut_hero_style; ?>">
                        <div class="hero-inner" style="text-align:<?php echo $ut_hero_align; ?>;">                
                            
                            <?php if( !empty($ut_custom_slogan) ) : ?>
                                <?php echo do_shortcode( ut_translate_meta($ut_custom_slogan) ); ?>
                            <?php endif; ?>
                            
                            <?php if( !empty($ut_expertise_slogan) ) : ?>
                                <div class="hdh"><span class="hero-description"><?php echo do_shortcode( ut_translate_meta($ut_expertise_slogan) ); ?></span></div>
                            <?php endif; ?>
                                            
                            <?php if( !empty($ut_company_slogan) ) : ?>
                                <div class="hth"><h1 class="hero-title"><?php echo do_shortcode( ut_translate_meta($ut_company_slogan) ); ?></h1></div>
                            <?php endif; ?>
                            
                            <?php if( !empty($ut_catchphrase) ) : ?>
                                <div class="hdb"><span class="hero-description-bottom"><?php echo do_shortcode( ut_translate_meta($ut_catchphrase) ); ?><span></div>
                            <?php endif; ?>
                            
                            <?php if( !empty($ut_scroll_to_main) ) : ?>
                                <span class="hero-btn-holder"><a id="to-about-section" href="<?php echo $ut_scroll_to_main_target; ?>" class="hero-btn <?php echo $ut_scroll_to_main_style; ?>"><?php echo ut_translate_meta($ut_scroll_to_main); ?></a></span>
                            <?php endif; ?>
                            
                        </div>
                    </div><!-- close hero-holder -->
                </div>
            	
                <?php /* rain sound effect for hero */ ?>
                
                <?php if( ( is_front_page() && ot_get_option('ut_front_header_rain' , 'off') == 'on' ) || ( is_home() && ot_get_option('ut_blog_header_rain' , 'off') == 'on' ) ) : ?>
                
                    <?php if( ( is_front_page() && ot_get_option('ut_front_header_rain_sound' , 'off') == 'on' ) || ( is_home() && ot_get_option('ut_blog_header_rain_sound' , 'off') == 'on' ) ) : ?>
                        
                        <div id="ut-hero-audio" class="hero-audio-holder">
                            <?php echo do_shortcode('[audio mp3="' . THEME_WEB_ROOT . '/sounds/heavyrain.mp3" wav="' . THEME_WEB_ROOT . '/sounds/heavyrain.wav" loop="on" autoplay=""]'); ?>
                        </div>
                        
                        <a href="#ut-hero-audio" class="ut-audio-control ut-unmute">Unmute</a>
                    
                    <?php endif; ?>
                
                <?php endif; ?>
                    
            <?php endif; ?>
            
            
            <?php
            /*
            |--------------------------------------------------------------------------
            | output for: animated image header
            |--------------------------------------------------------------------------
            */
            
            if( ( is_front_page() && ot_get_option('ut_front_page_header_type') == 'animatedimage') || ( is_home() && ot_get_option('ut_blog_header_type') == 'animatedimage' ) ) : ?>
            	
                <div class="grid-container">
                    <!-- hero holder -->
                    <div class="hero-holder grid-100 mobile-grid-100 tablet-grid-100 <?php echo $ut_hero_style; ?>">
                        <div class="hero-inner" style="text-align:<?php echo $ut_hero_align; ?>;">                
                            
                            <?php if( !empty($ut_custom_slogan) ) : ?>
                                <?php echo do_shortcode( ut_translate_meta($ut_custom_slogan) ); ?>
                            <?php endif; ?>
                            
                            <?php if( !empty($ut_expertise_slogan) ) : ?>
                                <div class="hdh"><span class="hero-description"><?php echo do_shortcode( ut_translate_meta($ut_expertise_slogan) ); ?></span></div>
                            <?php endif; ?>
                                            
                            <?php if( !empty($ut_company_slogan) ) : ?>
                                <div class="hth"><h1 class="hero-title"><?php echo do_shortcode( ut_translate_meta($ut_company_slogan) ); ?></h1></div>
                            <?php endif; ?>
                            
                            <?php if( !empty($ut_catchphrase) ) : ?>
                                <div class="hdb"><span class="hero-description-bottom"><?php echo do_shortcode( ut_translate_meta($slide['catchphrase']) ); ?><span></div>
                            <?php endif; ?>
                            
                            <?php if( !empty($ut_scroll_to_main) ) : ?>
                                <span class="hero-btn-holder"><a id="to-about-section" href="<?php echo $ut_scroll_to_main_target; ?>" class="hero-btn <?php echo $ut_scroll_to_main_style; ?>"><?php echo ut_translate_meta($ut_scroll_to_main); ?></a></span>
                            <?php endif; ?>
                            
                        </div>
                    </div><!-- close hero-holder -->
                </div>
            	
            <?php endif; ?>
            
            <?php
            /*
            |--------------------------------------------------------------------------
            | output for: video header
            |--------------------------------------------------------------------------
            */
            
            if( ( is_front_page() && ot_get_option('ut_front_page_header_type') == 'video') || ( is_home() && ot_get_option('ut_blog_header_type') == 'video' ) ) : ?>
            
            <div class="grid-container">
                <!-- hero holder -->
                <div class="hero-holder grid-100 mobile-grid-100 tablet-grid-100 <?php echo $ut_hero_style; ?>">
                    <div class="hero-inner" style="text-align:<?php echo $ut_hero_align; ?>;">                
                        
                        <?php if( !empty($ut_custom_slogan) ) : ?>
                            <?php echo do_shortcode( ut_translate_meta($ut_custom_slogan) ); ?>
                        <?php endif; ?>
                        
                        <?php if( !empty($ut_expertise_slogan) ) : ?>
                            <div class="hdh"><span class="hero-description"><?php echo do_shortcode( ut_translate_meta($ut_expertise_slogan) ); ?></span></div>
                        <?php endif; ?>
                                        
                        <?php if( !empty($ut_company_slogan) ) : ?>
                            <div class="hth"><h1 class="hero-title"><?php echo do_shortcode( ut_translate_meta($ut_company_slogan) ); ?></h1></div>
                        <?php endif; ?>
                        
                        <?php if( !empty($ut_catchphrase) ) : ?>
                            <div class="hdb"><span class="hero-description-bottom"><?php echo do_shortcode( ut_translate_meta($slide['catchphrase']) ); ?><span></div>
                        <?php endif; ?>
                        
                        <?php if( !empty($ut_scroll_to_main) ) : ?>
                            <span class="hero-btn-holder"><a id="to-about-section" href="<?php echo $ut_scroll_to_main_target; ?>" class="hero-btn"><?php echo ut_translate_meta($ut_scroll_to_main); ?></a></span>
                        <?php endif; ?>
                        
                    </div>
                </div><!-- close hero-holder -->
            </div>
            
                <?php if( ( is_front_page() && ot_get_option('ut_video_mute_button' , 'hide') == 'show' ) || ( is_home() && ot_get_option('ut_video_mute_button_blog' , 'hide') == 'show' ) ) : ?>
                	
                    <?php $mute_setting = ( is_front_page() || is_page() ) ? ot_get_option('ut_front_video_sound' , 'off') : ot_get_option('ut_blog_video_sound' , 'off'); ?>
                    <?php $mute = ( $mute_setting == "on" ) ? 'ut-mute' : 'ut-unmute'; ?>
                                        
                    <a href="#" class="ut-video-control <?php echo $mute; ?>">Unmute</a>
                
                <?php endif; ?>
            
            <?php endif; ?>
            
            
            <?php
            /*
            |--------------------------------------------------------------------------
            | output for: tab image header
            |--------------------------------------------------------------------------
            */
            
            if( ( is_front_page() && ot_get_option('ut_front_page_header_type') == 'tabs') || ( is_home() && ot_get_option('ut_blog_header_type') == 'tabs' ) ) : ?>
            
            <div class="grid-container">
                
                <?php /* front page settings */ ?>
                    
                <?php if( is_front_page() ) {
                    
                    $tabs_headline = ot_get_option('ut_front_page_tabs_headline');
                    $tabs = ot_get_option('ut_front_page_tabs');
                    
                } ?>
                
                <?php /* blog settings */ ?>
                
                <?php if( is_home() ) {
                    
                    $tabs_headline = ot_get_option('ut_blog_tabs_headline');
                    $tabs = ot_get_option('ut_blog_tabs');
                    
                } ?>
                
                <!-- hero holder -->
                <div class="hero-holder ut-half-height grid-100 mobile-grid-100 tablet-grid-100 <?php echo $ut_hero_style; ?>">
                    <div class="hero-inner" style="text-align:<?php echo $ut_hero_align; ?>;">                
                        
                        <?php if( !empty($ut_expertise_slogan) ) : ?>
                            <div class="hdh"><span class="hero-description"><?php echo do_shortcode( ut_translate_meta($ut_expertise_slogan) ); ?></span></div>
                        <?php endif; ?>
                                        
                        <?php if( !empty($ut_company_slogan) ) : ?>
                            <div class="hth"><h1 class="hero-title"><?php echo do_shortcode( ut_translate_meta($ut_company_slogan) ); ?></h1></div>
                        <?php endif; ?>
                        
                        <?php if( !empty($ut_catchphrase) ) : ?>
                            <div class="hdb"><span class="hero-description-bottom"><?php echo do_shortcode( ut_translate_meta($slide['catchphrase']) ); ?><span></div>
                        <?php endif; ?>
                        
                        <?php if( !empty($ut_scroll_to_main) ) : ?>
                            <span class="hero-btn-holder"><a id="to-about-section" href="<?php echo $ut_scroll_to_main_target; ?>" class="hero-btn"><?php echo ut_translate_meta($ut_scroll_to_main); ?></a></span>
                        <?php endif; ?>
                        
                    </div>
                </div><!-- close hero-holder -->
                
                <div class="ut-tablet-holder ut-half-height hide-on-mobile">
                    
                    <div class="ut-tablet-inner">
                        
                        <div class="grid-40 suffix-5 mobile-grid-100 tablet-grid-40 tablet-suffix-5">
                            
                            <?php if( !empty( $tabs_headline ) ) : ?>
                                
                                <h2 class="ut-tablet-title"><?php echo ut_translate_meta( $tabs_headline ); ?></h2>
                                
                            <?php endif;?>
                                                
                            <?php if( !empty($tabs) && is_array($tabs) ) : ?>
                                
                                <ul class="ut-tablet-nav">
                                    
                                <?php $counter = 1; foreach($tabs as $tab) : ?>
                                            
                                    <li class="<?php echo ($counter == 1) ? 'selected' : ''; ?>"><a href="#"><?php echo $tab['title']; ?></a></li>
                            
                                <?php $counter++; endforeach; ?>
                                
                                </ul>
                            
                            <?php endif; ?>
                                
                        </div>
                        
                        <div class="grid-55 mobile-grid-100 tablet-grid-55">
                            
                            <?php if( !empty($tabs) && is_array($tabs) ) : ?>
                                
                                <ul class="ut-tablet">
                                    
                                <?php $counter = 1; foreach($tabs as $tab) : ?>
                                            
                                    <li class="<?php echo ($counter == 1) ? 'show' : ''; ?>">
                                        
                                        <?php $tab_image = ut_resize( ut_translate_meta( $tab['image'] ) , '800' , '800', true , true , true ); ?>
                                        
                                        <img src="<?php echo $tab_image; ?>" alt="<?php echo $tab['title']; ?>">
                                        
                                        <div class="ut-tablet-overlay">
                                            <div class="ut-tablet-overlay-content">
                                            <?php if( !empty( $tab['title'] ) ) : ?>
                                            
                                                <h2 class="ut-tablet-single-title"><?php echo ut_translate_meta( $tab['title'] ); ?></h2>
                                            
                                            <?php endif; ?>
                                            
                                            <?php if( !empty( $tab['description'] ) ) : ?>
                                                
                                                <p class="ut-tablet-desc"><?php echo ut_translate_meta( $tab['description'] ); ?></p>
                                                
                                            <?php endif; ?>
                                            
                                            <?php if( !empty( $tab['link_one_text'] ) ) : ?>
                                                
                                                <a class="ut-btn ut-left-tablet-button theme-btn small round" href="<?php echo ut_translate_meta( $tab['link_one_url'] ); ?>"><?php echo ut_translate_meta( $tab['link_one_text'] ); ?></a>
                                                
                                            <?php endif; ?>
                                            
                                            <?php if( !empty( $tab['link_two_text'] ) ) : ?>
                                                
                                                <a class="ut-btn ut-right-tablet-button theme-btn small round" href="<?php echo ut_translate_meta( $tab['link_two_url'] ); ?>"><?php echo ut_translate_meta( $tab['link_two_text'] ); ?></a>
                                                
                                            <?php endif; ?>
                                            </div>
                                        </div>
                                    
                                    </li>
                            
                                <?php $counter++; endforeach; ?>
                                
                                </ul>
                                
                            <?php endif; ?>
                            
                        </div>
                
                    </div>
                    
                </div>
                
            </div>
            
            <?php endif; ?>
                     
            <?php
            /*
            |--------------------------------------------------------------------------
            | output for: custom header
            |--------------------------------------------------------------------------
            */
            
            if( ( is_front_page() && ot_get_option('ut_front_page_header_type') == 'custom') || ( is_home() && ot_get_option('ut_blog_header_type') == 'custom' ) ) : ?>
                
                 <?php if( is_front_page() ) {
                    
                    echo do_shortcode( ot_get_option('front_hero_custom_shortcode') );
                    
                } ?>
                
                <?php if( is_home() ) {
                    
                    echo do_shortcode( ot_get_option('blog_hero_custom_shortcode') );
                    
                } ?>
            
            <?php endif; ?>
            
            <?php if( $ut_hero_overlay == 'on') : ?>
            
            </div> 
            
            <?php endif; ?>
            
            <div data-section="top" class="ut-scroll-up-waypoint"></div>
            
        </section><!-- close hero section -->
    
    <?php endif; ?>