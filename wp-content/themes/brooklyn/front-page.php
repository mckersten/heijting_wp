<?php get_header(); ?>
    
    <?php if( is_home() ) : ?>
   	
    <?php /* start output for classic blog , search , category tag or archive page */ ?>

            <div class="grid-container">
            
            <?php $grid = is_active_sidebar('blog-widget-area') ? 'grid-75 tablet-grid-75 mobile-grid-100' : 'grid-100 tablet-grid-100 mobile-grid-100'; ?>
            
            <div id="primary" class="grid-parent <?php echo $grid; ?>">
            
                        <?php if ( have_posts() ) : ?>
            
                            <?php /* Start the Loop */ ?>
                        
                            <?php while ( have_posts() ) : the_post(); ?>
                        
                            <?php
                                
                                /* Include the Post-Format-specific template for the content.
                                 * If you want to overload this in a child theme then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                 
                                get_template_part( 'partials/content', get_post_format() );
                            ?>
                        
                            <?php endwhile; ?>
            
                        <?php else : ?>
                
                            <?php get_template_part( 'no-results', 'index' ); ?>
                
                    <?php endif; ?>
             
           </div><!-- primary --> 
            
           <?php get_sidebar(); ?>
           
           </div><!-- grid-container --> 
       
        
        <?php if( $wp_query->max_num_pages > 1 ) : ?>
        <div id="ut-blog-navigation">
            <div class="grid-container">
                <div class="grid-100 mobile-grid-100 tablet-grid-100">
                <?php if ( have_posts() ) : ?>
                    <?php unitedthemes_content_nav( 'nav-below' ); ?>
                <?php endif; ?>
                </div><!-- .grid-100 -->
            </div><!-- .grid-container -->
        </div><!-- #ut-blog-navigation -->
        <?php endif; ?> 
    
    <?php /* end output for classic blog , search , category tag or archive page */ ?>
    
    
    <?php else: 

	/* needed variables ( we need this variable inside the loop, so we need to store it */
	$is_front_page = is_front_page(); 
    
	/* check if primary navigation has been created and set */
	if ( has_nav_menu( 'primary' ) ) :
		
        $transName = 'ut_front_page_query';
        
        if( ot_get_option('ut_use_cache' , 'off') == 'on') {        
            
            $cacheTime = ot_get_option('ut_cache_ltime' , '10');
            $pagequery = get_transient( $transName );
                    
            /* retrieve query arguements */
            if ( false === $pagequery ) {
                                
                $pagequery = ut_prepare_front_query();
                
                if( !empty( $pagequery ) ) {
                            
                    /* start query */
                    query_posts( $pagequery );
                    
                    /* set cache */ 
                    set_transient($transName, $pagequery, 60 * $cacheTime);
                    
                } 
                
                
            } else {
            
                query_posts( $pagequery );
            
            }
        
        } else {
            
            /* run query */
            $pagequery = ut_prepare_front_query();
                            
            if( !empty( $pagequery ) ) {
                        
                /* start query */
                query_posts( $pagequery );
                
                /* delete cache */ 
                delete_transient($transName);
                
            } 
        
        }        
		
	endif; 
	
	?>
        
    <?php if ( have_posts() ) : ?>
        		
			<?php while ( have_posts() ) : the_post(); ?>
                                
				<?php 
								
				/* needed variables */
				$postID = get_the_ID();
				$post_name = $post->post_name;
				$extraStyle = $extraStyleHeader = 'style="';
				$template_name = get_post_meta( $postID , '_wp_page_template', true );
								
				/* get section settings*/
                $ut_display_section_header = get_post_meta( $postID , 'ut_display_section_header' , true );
				$ut_section_slogan = get_post_meta( $postID , 'ut_section_slogan' , true );
				$ut_parallax_section = get_post_meta( $postID , 'ut_parallax_section' , true);			
				$ut_overlay_section = get_post_meta( $postID , 'ut_overlay_section' , true);
				$ut_section_skin = get_post_meta( $postID , 'ut_section_skin' , true);
				$ut_section_shadow = get_post_meta( $postID , 'ut_section_shadow' , true);
				$ut_section_class = get_post_meta( $postID , 'ut_section_class' , true);
				$ut_section_header_style = get_post_meta( $postID , 'ut_section_header_style', true );
				$ut_section_header_style = ( !empty($ut_section_header_style) && $ut_section_header_style != 'global' ) ? $ut_section_header_style : ot_get_option('ut_global_headline_style'); 
								
				/* section  width */
				$data_width = $ut_section_width = get_post_meta( $postID , 'ut_section_width' , true); 
				$ut_section_width_class = NULL;
				
				if( $ut_section_width == 'split' ) {
					$data_width = 'centered';
					$ut_section_width_class = 'ut-split-screen';
				}
				
				
				/* section shadow */ 
				$shadow = ( $ut_section_shadow == 'on' ) ? 'ut-section-shadow' : '';
				
				/* section post parent */
				$first_parent = array_reverse( get_post_ancestors( $postID ) );
				if( !empty( $first_parent[0] ) ) {
					
					$first_parent = get_page($first_parent[0]);
					$post_parent = 'data-parent="section-' . $first_parent->post_name . '"';
					
				} else {
					
					$post_parent = NULL;
				
				}
				
				/* section header style */
				$ut_section_header_style = !empty($ut_section_header_style) ? $ut_section_header_style : 'pt-style-1';
					
				/* fallback if there is no entry or if someone switched from another theme */
				$ut_section_width = empty($ut_section_width) ? 'centered' : $ut_section_width; 
				
				/* get parallax settings*/
				$ut_parallax_image = get_post_meta( get_the_ID() , 'ut_parallax_image' , true );
				if( is_array($ut_parallax_image) && !empty( $ut_parallax_image['background-image'] ) ) {
					
					$ut_parallax_image = $ut_parallax_image['background-image'];
				
				} elseif( !is_array($ut_parallax_image) && !empty($ut_parallax_image) ) {
					
					$ut_parallax_image = $ut_parallax_image;
				
				} else {
					
					$ut_parallax_image = NULL;
					
				}?>
                
                	
				<?php 
                /*
                |--------------------------------------------------------------------------
                | Output for Parallax Section
                |--------------------------------------------------------------------------
                */
                ?>                        
                
                <?php if( $ut_parallax_section == 'on') : ?>
                	    
                    <section id="<?php echo $post_name; ?>" data-effect="fadeIn" data-width="<?php echo $data_width; ?>" class="page-id-<?php echo $post->ID; ?> entry-content parallax-background parallax-banner parallax-section <?php echo $ut_section_width_class; ?> <?php echo $ut_section_skin; ?> <?php echo $ut_section_class; ?> <?php echo $shadow; ?>">
                	
                    <a class="ut-offset-anchor" <?php echo $post_parent; ?> id="section-<?php echo $post_name; ?>"></a>
                    	
                        <?php if( $ut_overlay_section == 'on') : ?>
                       		
                            <?php $ut_overlay_pattern = get_post_meta( $postID , 'ut_overlay_pattern' , true); ?>
                            <?php $ut_overlay_pattern = $ut_overlay_pattern == 'on' ? 'parallax-overlay-pattern' : ''; ?>
                            <?php $ut_overlay_pattern_style = get_post_meta( $postID , 'ut_overlay_pattern_style' , true); ?>
                            
                            <div class="parallax-overlay <?php echo $ut_overlay_pattern; ?> <?php echo $ut_overlay_pattern_style; ?>">
                            
                        <?php endif; ?>
                        	
                        <?php /* Output Split Content */ ?> 
                        
						<?php if( $ut_section_width == 'split' ) : ?>
                        	
                            <?php /* Content Align Left */ ?> 
                            
                            <?php $ut_split_content_align = get_post_meta( $postID , 'ut_split_content_align' , true); ?>
                            <?php $poster_image = wp_get_attachment_url( get_post_thumbnail_id( $postID ) ); ?>
                            
                            <?php if( $ut_split_content_align == 'left' ) : ?>                            
                        	
                                <div class="grid-40 prefix-5 suffix-5 tablet-grid-40 tablet-prefix-5 tablet-suffix-5 mobile-grid-100 ut-split-content-left">
                                
                                        <?php if( $ut_display_section_header == 'show' ) : ?>
                                
                                               <header class="<?php echo empty($ut_parallax_image)  ? 'section-header' : 'parallax-header'; ?> <?php echo $ut_section_header_style; ?>">
                                                    <h2 class="<?php echo empty($ut_parallax_image) ? 'section-title' : 'parallax-title'; ?>"><span><?php the_title(); ?></span></h2>
                                                    
                                                    <?php if(!empty($ut_section_slogan)) : ?>
                                                        
                                                        <p class="lead"><?php echo do_shortcode( ut_translate_meta($ut_section_slogan) ); ?></p>
                                                        
                                                    <?php endif; ?>
                                                    
                                                </header>
                                        
                                        <?php endif; /* end $ut_display_section_header == 'show' */ ?>
                                        
                                        <?php $content = get_the_content(); ?>
                                        
                                        <?php if( !empty($content) || $template_name == 'templates/template-team.php' ) : ?>
                                            
                                            <div class="section-content">
                                                
                                                <?php the_content(); ?>
                                                
                                                <?php if( $template_name == 'templates/template-team.php' ) : ?>
                        
                                                    <?php get_template_part( 'templates/template' , 'team' ); ?> 
                                                        
                                                <?php endif; /* $template_name == 'templates/template-team.php' */ ?>
                                                
                                            </div>
                                        
                                        <?php endif; ?>
                                    
                                </div> <!-- end /grid-40 prefix-5 -->
                                
                                <div class="grid-50 <?php echo (!empty($poster_image)) ? 'tablet-grid-50 mobile-grid-100' : 'hide-on-tablet hide-on-mobile'; ?> tablet-grid-50 mobile-grid-100 ut-split-screen-poster" data-posterparent="<?php echo $post_name; ?>"></div>
                            
                            <?php /* Content Align Right */ ?> 
                            
                            <?php else :?>
                                                
                                <div class="grid-50 <?php echo (!empty($poster_image)) ? 'tablet-grid-50 mobile-grid-100' : 'hide-on-tablet hide-on-mobile'; ?> tablet-grid-50 mobile-grid-100 ut-split-screen-poster" data-posterparent="<?php echo $post_name; ?>"></div>
                                
                                <div class="grid-40 prefix-5 suffix-5 tablet-grid-40 tablet-prefix-5 tablet-suffix-5 mobile-grid-100 ut-split-content-right">
                                
                                        <?php if( $ut_display_section_header == 'show' ) : ?>
                                
                                               <header class="<?php echo empty($ut_parallax_image)  ? 'section-header' : 'parallax-header'; ?> <?php echo $ut_section_header_style; ?>">
                                                    
                                                    <h2 class="<?php echo empty($ut_parallax_image) ? 'section-title' : 'parallax-title'; ?>"><span><?php the_title(); ?></span></h2>
                                                    
                                                    <?php if(!empty($ut_section_slogan)) : ?>
                                                        
                                                        <p class="lead"><?php echo do_shortcode( ut_translate_meta($ut_section_slogan) ); ?></p>
                                                        
                                                    <?php endif; ?>
                                                    
                                                </header>
                                        
                                        <?php endif; /* end $ut_display_section_header == 'show' */ ?>
                                        
                                        <?php $content = get_the_content(); ?>
                                        
                                        <?php if( !empty($content) || $template_name == 'templates/template-team.php' ) : ?>
                                            
                                            <div class="section-content">
                                                
                                                <?php the_content(); ?>
                                                
                                                <?php if( $template_name == 'templates/template-team.php' ) : ?>
                        
                                                    <?php get_template_part( 'templates/template' , 'team' ); ?> 
                                                        
                                                <?php endif; /* $template_name == 'templates/template-team.php' */ ?>
                                                
                                            </div>
                                        
                                        <?php endif; ?>
                                    
                                </div> <!-- end /grid-40 prefix-5 -->
                        	
                            <?php endif; ?>
                            
                        <?php /* Output for Centered or FullWidth Section */ ?> 
                            
                        <?php else : ?>                            
                                                        
							<?php if( $ut_display_section_header == 'show' ) : ?>
                            
                                <div class="grid-container parallax-content section-header-holder">  
                                
                                    <!-- parallax header -->
                                    <div class="grid-70 prefix-15 mobile-grid-100 tablet-grid-100">
                                        <header class="parallax-header <?php echo $ut_section_header_style; ?>">
                                            <h2 class="parallax-title"><span><?php the_title(); ?></span></h2>
                                            
                                            <?php if(!empty($ut_section_slogan)) : ?>
                                            
                                                <p class="lead"><?php echo do_shortcode( ut_translate_meta($ut_section_slogan) ); ?></p>
                                            
                                            <?php endif; ?>
                                                
                                        </header>
                                    </div>
                                    <!-- close parallax header -->
                                
                                </div>
                            	
                                <div class="clear"></div>
                                 
                            <?php endif; ?>
                                                    	
                            <?php $content = get_the_content(); if( !empty($content) || $template_name == 'templates/template-team.php' ) : ?>
							
								<?php if( $ut_section_width == 'centered' ) : ?>
                                
                                <div class="grid-container section-content">
                                
                                    <div class="grid-100 mobile-grid-100 tablet-grid-100">
                                    
									<?php else : ?>
                                    
                                    <div class="section-content">
                                    
                                    <?php endif; ?>
                                    
                                        <?php the_content(); ?>
                                        
                                        <?php if( $template_name == 'templates/template-team.php' ) : ?>
                
                                            <?php get_template_part( 'templates/template' , 'team' ); ?> 
                                                
                                        <?php endif; ?>
                                    
                                    <?php if( $ut_section_width == 'centered' ) : ?>
                                    
                                    </div>
                                
                                </div>
                                
								<?php else : ?>
                                
                                </div>
                                
                                <?php endif; ?>
                            
                            <?php endif; ?>
                    
                    <?php endif; ?> 
                	
                    <?php if( $ut_overlay_section == 'on') : ?>

                    	<div class="clear"></div></div>
                            
                    <?php endif; ?>
                    
                    <div class="ut-scroll-up-waypoint" data-section="section-<?php echo $post_name; ?>" <?php echo $post_parent; ?>></div>                                
                    
                    </section>
                    
                    <div class="clear"></div>
                    
                <?php 
                /*
                |--------------------------------------------------------------------------
                | Output for Normal Section
                |--------------------------------------------------------------------------
                */
                ?>
                               
                <?php else : ?>

                <section id="<?php echo $post_name; ?>" data-effect="fadeIn" data-width="<?php echo $ut_section_width; ?>" class="page-id-<?php echo $post->ID; ?> entry-content normal-background <?php echo $ut_section_width_class; ?> <?php echo $ut_section_skin; ?> <?php echo $ut_section_class; ?> <?php echo $shadow; ?>">
                
                <a class="ut-offset-anchor" <?php echo $post_parent; ?> id="section-<?php echo $post_name; ?>"></a>
                	
						 <?php if( $ut_overlay_section == 'on') : ?>
                                
                            <?php $ut_overlay_pattern = get_post_meta( $postID , 'ut_overlay_pattern' , true); ?>
                            <?php $ut_overlay_pattern = $ut_overlay_pattern == 'on' ? 'parallax-overlay-pattern' : ''; ?>
                            <?php $ut_overlay_pattern_style = get_post_meta( $postID , 'ut_overlay_pattern_style' , true); ?>
                            
                            <div class="parallax-overlay <?php echo $ut_overlay_pattern; ?> <?php echo $ut_overlay_pattern_style; ?>">
                            
                        <?php endif; ?>
                                                                        
                        <?php /* Output Split Content */ ?> 
                        
						<?php if( $ut_section_width == 'split' ) : ?>
                        	
                            <?php /* Content Align Left */ ?> 
                            
                            <?php $ut_split_content_align = get_post_meta( $postID , 'ut_split_content_align' , true); ?>
                            <?php $poster_image = wp_get_attachment_url( get_post_thumbnail_id( $postID ) ); ?>
                            
                            <?php if( $ut_split_content_align == 'left' ) : ?>                            
                        	
                                <div class="grid-40 prefix-5 suffix-5 tablet-grid-40 tablet-prefix-5 tablet-suffix-5 mobile-grid-100 ut-split-content-left">
                                
                                        <?php if( $ut_display_section_header == 'show' ) : ?>
                                
                                               <header class="<?php echo empty($ut_parallax_image)  ? 'section-header' : 'parallax-header'; ?> <?php echo $ut_section_header_style; ?>">
                                                    <h2 class="<?php echo empty($ut_parallax_image) ? 'section-title' : 'parallax-title'; ?>"><span><?php the_title(); ?></span></h2>
                                                    
                                                    <?php if(!empty($ut_section_slogan)) : ?>
                                                        
                                                        <p class="lead"><?php echo do_shortcode( ut_translate_meta($ut_section_slogan) ); ?></p>
                                                        
                                                    <?php endif; ?>
                                                    
                                                </header>
                                        
                                        <?php endif; /* end $ut_display_section_header == 'show' */ ?>
                                        
                                        <?php $content = get_the_content(); ?>
                                        
                                        <?php if( !empty($content) || $template_name == 'templates/template-team.php' ) : ?>
                                            
                                            <div class="section-content">
                                                
                                                <?php the_content(); ?>
                                                
                                                <?php if( $template_name == 'templates/template-team.php' ) : ?>
                        
                                                    <?php get_template_part( 'templates/template' , 'team' ); ?> 
                                                        
                                                <?php endif; /* $template_name == 'templates/template-team.php' */ ?>
                                                
                                            </div>
                                        
                                        <?php endif; ?>
                                    
                                </div> <!-- end /grid-40 prefix-5 -->
                                
                                <div class="grid-50 <?php echo (!empty($poster_image)) ? 'tablet-grid-50 mobile-grid-100' : 'hide-on-tablet hide-on-mobile'; ?> ut-split-screen-poster" data-posterparent="<?php echo $post_name; ?>"></div>
                            
                            <?php /* Content Align Right */ ?> 
                            
                            <?php else :?>
                                                
                                <div class="grid-50 <?php echo (!empty($poster_image)) ? 'tablet-grid-50 mobile-grid-100' : 'hide-on-tablet hide-on-mobile'; ?> tablet-grid-50 mobile-grid-100 ut-split-screen-poster" data-posterparent="<?php echo $post_name; ?>"></div>
                                
                                <div class="grid-40 prefix-5 suffix-5 tablet-grid-40 tablet-prefix-5 tablet-suffix-5 mobile-grid-100 ut-split-content-right">
                                
                                        <?php if( $ut_display_section_header == 'show' ) : ?>
                                
                                               <header class="<?php echo empty($ut_parallax_image)  ? 'section-header' : 'parallax-header'; ?> <?php echo $ut_section_header_style; ?>">
                                                    
                                                    <h2 class="<?php echo empty($ut_parallax_image) ? 'section-title' : 'parallax-title'; ?>"><span><?php the_title(); ?></span></h2>
                                                    
                                                    <?php if(!empty($ut_section_slogan)) : ?>
                                                        
                                                        <p class="lead"><?php echo do_shortcode( ut_translate_meta($ut_section_slogan) ); ?></p>
                                                        
                                                    <?php endif; ?>
                                                    
                                                </header>
                                        
                                        <?php endif; /* end $ut_display_section_header == 'show' */ ?>
                                        
                                        <?php $content = get_the_content(); ?>
                                        
                                        <?php if( !empty($content) || $template_name == 'templates/template-team.php' ) : ?>
                                            
                                            <div class="section-content">
                                                
                                                <?php the_content(); ?>
                                                
                                                <?php if( $template_name == 'templates/template-team.php' ) : ?>
                        
                                                    <?php get_template_part( 'templates/template' , 'team' ); ?> 
                                                        
                                                <?php endif; /* $template_name == 'templates/template-team.php' */ ?>
                                                
                                            </div>
                                        
                                        <?php endif; ?>
                                    
                                </div> <!-- end /grid-40 prefix-5 -->
                        	
                            <?php endif; ?>
                            
                        <?php /* Output for Centered or FullWidth Section */ ?> 
                            
                        <?php else : ?>
                                            
							<?php if( $ut_display_section_header == 'show' && !empty( $pagequery ) ) : ?>
                            
                                <div class="grid-container section-header-holder">
                                
                                    <!-- section header -->
                                    <div class="grid-70 prefix-15 mobile-grid-100 tablet-grid-100">
                                        
                                        <header class="<?php echo empty($ut_parallax_image) ? 'section-header' : 'parallax-header'; ?> <?php echo $ut_section_header_style; ?>">
                                            <h2 class="<?php echo empty($ut_parallax_image) ? 'section-title' : 'parallax-title'; ?>"><span><?php the_title(); ?></span></h2>
                                            
                                            <?php if(!empty($ut_section_slogan)) : ?>
                                                
                                                <p class="lead"><?php echo do_shortcode( ut_translate_meta($ut_section_slogan) ); ?></p>
                                                
                                            <?php endif; ?>
                                            
                                        </header>
                                    </div>
                                    <!-- close section header -->
                            
                                </div>
                                
                                <div class="clear"></div>
                            
                           	<?php endif; /* end $ut_display_section_header == 'show' */ ?>
                        	
                            <?php if( empty( $pagequery ) ) : ?>

                            <div class="grid-container section-content">
                            
                                <div class="grid-100 mobile-grid-100 tablet-grid-100">
                                        
                                <div class="section-content">
                                	<div class="ut-install-note">
                                    
                                    <h2><?php _e( 'Setup Information' , 'unitedthemes' ); ?></h2>
                                    
                                    <p>
                                    <?php _e( 'Thank you for purchasing our theme. We hope you enjoy our product! If you have any questions that are beyond the scope of the help file, please feel free to contact us on our Support Forum at.' , 'unitedthemes' ); ?>
                                    <a href="http://support.unitedthemes.com/">http://support.unitedthemes.com</a>
                                    </p>
                                    
                                    <p>
                                    <?php _e( 'Information: There are no Pages are assigned to the menu yet or the assigned pages are not set to menutype "Section"! Please read the delivered documentation carefully. We recommend to start with the "Start from Scratch Setup" documentation part.' , 'unitedthemes' ); ?> <br />
                                    </p>
                                    
                                    <p><strong><?php _e( 'Useful links to start with:' , 'unitedthemes' ); ?></strong></p>
                                    
                                    <ul>
                                        <li><a href="<?php echo home_url(); ?>/wp-admin/themes.php?page=install-required-plugins"><?php _e( 'Install required plugins', 'unitedthemes' ); ?></a></li>
                                        <li><a href="<?php echo home_url(); ?>/wp-admin/customize.php"><?php _e( 'Customize Theme', 'unitedthemes' ); ?></a></li>
                                        <li><a href="<?php echo home_url(); ?>/wp-admin/themes.php?page=ot-theme-options"><?php _e( 'Theme Options', 'unitedthemes' ); ?></a></li>
                                        <li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php _e( 'Set Up Your Menu', 'unitedthemes' ); ?></a></li>
                                    </ul>
                                	</div>
                                    
                                </div>
                                
                            </div>
                             
                            <?php endif; ?>
                            
                       		<?php $content = get_the_content(); 
														
							if( !empty($content) && !empty( $pagequery ) || $template_name == 'templates/template-team.php' ) : ?>						

							<?php if( $ut_section_width == 'centered' ) : ?>
                            
                            <div class="grid-container section-content">
                            
                                <div class="grid-100 mobile-grid-100 tablet-grid-100">
                                    
                             <?php else : ?>
                                    
                             <div class="section-content">
                                    
                             <?php endif; ?>                                    

                                    <?php the_content(); ?>
                                    
                                    <?php if( $template_name == 'templates/template-team.php' ) : ?>
            
                                        <?php get_template_part( 'templates/template' , 'team' ); ?> 
                                            
                                    <?php endif; ?>
                                
                                <?php if( $ut_section_width == 'centered' ) : ?>
                                    
                                </div>
                            
                            </div>
                        	
                            <?php else : ?>
                            
                            </div>
                            
                        <?php endif; ?>
                        
                        <?php endif; ?>
                	
                    <?php endif; ?>         
                
                <?php if( $ut_overlay_section == 'on') : ?>

                    <div class="clear"></div></div>
                        
                <?php endif; ?>
                        
                <div class="ut-scroll-up-waypoint" data-section="section-<?php echo $post_name; ?>" <?php echo $post_parent; ?>></div>      
                
                </section>
                    
                <div class="clear"></div> 
 
				<?php endif; ?>
                                    
            <?php endwhile; ?>

	<?php else : ?>
    
    	<?php get_template_part( 'no-results', 'index' ); ?>
    
	<?php endif; ?>                        

<?php wp_reset_query(); ?>

<?php endif; ?>
		       
<?php get_footer(); ?>