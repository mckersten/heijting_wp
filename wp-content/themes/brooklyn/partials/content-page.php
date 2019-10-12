<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package unitedthemes
 */
 
$pageslogan   = get_post_meta( get_the_ID() , 'ut_section_slogan' , true ); 
$header_style = get_post_meta( get_the_ID() , 'ut_section_header_style' , true ); 
$header_style = ( !empty($header_style) && $header_style != 'global' ) ? $header_style : ot_get_option('ut_global_headline_style'); 

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="grid-70 prefix-15 mobile-grid-100 tablet-grid-100">
		<header class="page-header <?php echo $header_style;?>">
            <h1 class="page-title"><span><?php the_title(); ?></span></h1> 
            <?php if( !empty($pageslogan) ) : ?>
                <p class="lead"><?php echo $pageslogan; ?></p>
            <?php endif; ?>
                
            <div class="entry-meta">
                <?php edit_post_link( __( 'Edit', 'unitedthemes' ), '<span class="edit-link"><i class="fa fa-pencil-square-o"></i>', '</span>' ); ?>
            </div>                                  
		</header><!-- .page-header -->
    </div>
	
    <div class="grid-100 mobile-grid-100 tablet-grid-100">
    <div class="entry-content clearfix">	
        <?php the_content(); ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'unitedthemes' ),
                'after'  => '</div>',
            ) );
        ?>    			         		          
    </div><!-- .entry-content -->
    </div>
</div><!-- #post -->