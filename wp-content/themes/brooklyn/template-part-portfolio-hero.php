<?php

/* page slogan */
$portfolioslogan = get_post_meta( get_the_ID() , 'ut_page_slogan' , true ); 

/* post format */
$post_format = get_post_format();
$style = NULL;

/* featured image only for standard and audio format */ 
if ( empty( $post_format ) || $post_format == 'audio' ) :
    
    $fullsize   = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); 
    $fullsizeID = ut_get_attachment_id_from_url( $fullsize );
    
    $style = 'style="background: url(' . $fullsize . ');"';
    
endif;

/* image caption */
$ut_portfolio_show_caption  = get_post_meta( $post->ID , 'ut_portfolio_show_caption' , true );
$ut_portfolio_show_caption  = !empty($ut_portfolio_show_caption) ? $ut_portfolio_show_caption : 'off';
$ut_portfolio_caption_align = get_post_meta( $post->ID , 'ut_portfolio_caption_align' , true ); 
$ut_portfolio_caption_align = !empty($ut_portfolio_caption_align['align']) ? $ut_portfolio_caption_align['align'] : 'left';

/* hero style */
$ut_hero_style = ( function_exists('ot_get_option') ) ? ot_get_option('ut_front_page_hero_style' , 'ut-hero-style-1') : NULL;

/* needed variables */
$content = $the_content = NULL; ?>

<?php if ( have_posts() ) : ?>
                
    <?php while ( have_posts() ) : the_post(); ?>

        <!-- hero section -->
        <section id="ut-hero" class="<?php echo ($post_format == 'video') ? 'ut-single-video' : ''; ?> hero ha-waypoint parallax-section parallax-background" data-animate-up="ha-header-hide" data-animate-down="ha-header-hide" <?php echo $style; ?>>
            
            <?php if ( ( empty( $post_format ) || $post_format == 'audio' ) && $ut_portfolio_show_caption == 'on' ) :  ?>
            
                <div class="grid-container">
                    
                    <!-- hero holder -->
                    <div class="hero-holder grid-100 mobile-grid-100 tablet-grid-100 <?php echo $ut_hero_style; ?>">
                        <div class="hero-inner" style="text-align:<?php echo $ut_portfolio_caption_align; ?>">
                            
                            <?php $thumbnaildetails = get_posts(array('p' => $fullsizeID, 'post_type' => 'attachment')); ?>
                                            
                            <?php if( !empty($thumbnaildetails[0]->post_excerpt) ) : ?>
                                  <div class="hdh"><span class="hero-description"><?php echo $thumbnaildetails[0]->post_excerpt; ?></span></div>
                            <?php endif; ?>
                                
                            <?php if( !empty($thumbnaildetails[0]->post_title) ) : ?>
                                <div class="hth"><h1 class="hero-title"><?php echo $thumbnaildetails[0]->post_title; ?></h1></div>
                            <?php endif; ?>
                            
                        </div>
                    </div><!-- close hero-holder -->
                    
                </div>
            
            <?php elseif( $post_format == 'video' ) :                 
                
                /* try to catch video url */
                $video_url = ut_get_portfolio_format_video_content( get_the_content() );
                        
                if( !empty($video_url) ) :             
        
                    /* video output */    
                    echo wp_oembed_get( $video_url );
                    
                endif;     
            
            elseif( $post_format == 'gallery' && function_exists('ut_portfolio_extract_gallery_images_ids') ) : 
            
                $ut_gallery_images = ut_portfolio_extract_gallery_images_ids(); ?>                
                
                <?php if ( !empty( $ut_gallery_images ) && is_array( $ut_gallery_images )  ) : ?>                
                
                    <!-- slider -->
                    <div id="ut-hero-slider" class="ut-hero-slider flexslider">
                          
                          <ul class="slides">
                                
                              <?php foreach ( $ut_gallery_images as $ID => $imagedata ) : 
                                    
                                    if( isset( $imagedata->guid ) && !empty($imagedata->guid) ) {
                                    
                                        $image = $imagedata->guid; // fallback to older wp versions
                                        
                                    } else {
                                        
                                        $image = wp_get_attachment_image_src($imagedata , 'single-post-thumbnail');					
                                        
                                    }
                              
                                    if( !empty($image[0]) ) :
                                        
                                        echo '<li style="background:url(' . $image[0] . ')"></li>';                                                                    
                                        
                                    endif; 
                             
                              endforeach; ?>
              
                          </ul>
                          
                    </div>
                    <!-- close slider -->
                    
                    <!-- controls -->
                    <a class="ut-flex-control next"></a>
                    <a class="ut-flex-control prev"></a>
                    <!-- !controls -->
                    
                    <div id="ut-hero-captions" class="ut-hero-captions flexslider">
                        
                        <ul class="slides">
                            
                            <?php foreach ( $ut_gallery_images as $ID => $imageID ) : ?>
                            <li>
                                  
                                  <div class="grid-container">
                                      
                                      <!-- hero holder -->
                                      <div class="hero-holder grid-100 mobile-grid-100 tablet-grid-100 <?php echo $ut_hero_style; ?>" data-animation="top">
                                          <div class="hero-inner" style="text-align:<?php echo $ut_portfolio_caption_align; ?>">
                                            
                                            <?php if( $ut_portfolio_show_caption == 'on' ) : ?>
                                            
                                                <?php $thumbnaildetails = get_posts(array('p' => $imageID, 'post_type' => 'attachment')); ?>
                                                
                                                <?php if( !empty($thumbnaildetails[0]->post_excerpt) ) : ?>
                                                      <div class="hdh"><span class="hero-description"><?php echo $thumbnaildetails[0]->post_excerpt; ?></span></div>
                                                <?php endif; ?>
                                                    
                                                <?php if( !empty($thumbnaildetails[0]->post_title) ) : ?>
                                                    <div class="hth"><h1 class="hero-title"><?php echo $thumbnaildetails[0]->post_title; ?></h1></div>
                                                <?php endif; ?>
                                            
                                            <?php endif; ?>
                                                
                                          </div>
                                      </div>
                                      <!-- close hero-holder -->
                                      
                                  </div>
                                  
                            </li>
                            <?php endforeach; ?>
                            
                        </ul>
                        
                  </div>
                  <!-- close captions -->
                
                <?php endif; ?>
            
            <?php endif; ?>
                
            <div data-section="top" class="ut-scroll-up-waypoint"></div>
        
        </section><!-- close hero section -->
        
    <?php endwhile; // end of the loop. ?>
    			
<?php endif; ?>