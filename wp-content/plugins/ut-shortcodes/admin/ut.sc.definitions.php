<?php
global $ut_shortcodes;
#-----------------------------------------------------------------
# Column Layouts
#-----------------------------------------------------------------

//Thirds
$ut_shortcodes['headline_1'] 	= array( 'type'  	=>	's', 
										 'title'	=>	__('Column Shortcodes', 'ut_shortcodes' ));

$ut_shortcodes['ut_one_sixth'] 	= array( 'type'  	=>'c', 'title'=>__('One Sixth Column', 'ut_shortcodes' ), 
										 'attr'  	=> array( 'class' 	=> 	array( 	'type'  	=>	'input' , 
																					'title' 	=>	__('Optional Class','ut_shortcodes')
																				 ),
															  'last'	=>	array(  'type'		=> 	'custom', 
																					'title'		=> 	__('Last Column','ut_shortcodes')
																				 ),
															  'effect'  => array( 	'type'  	=> 'effect' , 
															  						'title'  	=> __('Optional Animation Effect','ut_shortcodes')
																				 )
															 )
										);

$ut_shortcodes['ut_one_fifth'] 	= array( 'type'  	=>'c', 'title'=>__('One Fifth Column', 'ut_shortcodes' ), 
										 'attr'  	=> array( 'class' 	=> 	array( 	'type'  	=>	'input' , 
																					'title' 	=>	__('Optional Class','ut_shortcodes')
																				 ),
															  'last'	=>	array(  'type'		=> 	'custom', 
																					'title'		=> 	__('Last Column','ut_shortcodes')
																				 ),
															  'effect'  => array( 	'type'  	=> 'effect' , 
															  						'title'  	=> __('Optional Animation Effect','ut_shortcodes')
																				 )
															 )
										);
										 
$ut_shortcodes['ut_one_third'] 	= array( 'type'  	=>'c', 'title'=>__('One Third Column', 'ut_shortcodes' ), 
										 'attr'  	=> array( 'class' 	=> 	array( 	'type'  	=>	'input' , 
																					'title' 	=>	__('Optional Class','ut_shortcodes')
																				 ),
															  'last'	=>	array(  'type'		=> 	'custom', 
																					'title'		=> 	__('Last Column','ut_shortcodes')
																				 ),
															  'effect'  => array( 	'type'  	=> 'effect' , 
															  						'title'  	=> __('Optional Animation Effect','ut_shortcodes')
																				 )
															 )
										);
										
$ut_shortcodes['ut_two_thirds'] = array( 'type'  =>'c', 'title'=>__('Two Thirds Column', 'ut_shortcodes' ), 
											 'attr'  => array( 'class' 	=> 	array( 	'type'  	=>	'input' , 
																					'title' 	=>	__('Optional Class','ut_shortcodes')
																				),
																'last'	=>	array(  'type'		=> 	'custom', 
																					'title'		=> 	__('Last Column','ut_shortcodes')
																				),
															    'effect'  => array( 	'type'  	=> 'effect' , 
															  						'title'  	=> __('Optional Animation Effect','ut_shortcodes')
																				 )
															 )
											);

//Half
$ut_shortcodes['ut_one_half'] 	= array( 'type'  =>'c', 'title'=>__('One Half Column', 'ut_shortcodes' ), 
										 'attr'  => array( 'class' 	=> 	array( 	'type'  	=>	'input' , 
																				'title' 	=>	__('Optional Class','ut_shortcodes')
																			),
															'last'	=>	array(  'type'		=> 	'custom', 
																				'title'		=> 	__('Last Column','ut_shortcodes')
																			),
															'effect'  => array( 'type'  	=> 'effect' , 
															  					'title'  	=> __('Optional Animation Effect','ut_shortcodes')
																			)
														 )
										);
										
//Fourth
$ut_shortcodes['ut_one_fourth'] = array( 'type'  =>'c', 'title'=>__('One Fourth Column', 'ut_shortcodes' ), 
										 'attr'  => array( 'class' 	=> 	array( 	'type'  	=>	'input' , 
																				'title' 	=>	__('Optional Class','ut_shortcodes')
																				),
														   'last'	=>	array(  'type'		=> 	'custom', 
																				'title'		=> 	__('Last Column','ut_shortcodes')
																				),
														   'effect'  => array( 	'type'  	=> 'effect' , 
															  					'title'  	=> __('Optional Animation Effect','ut_shortcodes')
																				 )
															 )
											);

$ut_shortcodes['ut_three_fourths'] 	= array( 'type'  =>'c', 'title'=>__('Three Fourths Column', 'ut_shortcodes' ), 
											 'attr'  => array( 'class' 	=> 	array( 	'type'  	=>	'input' , 
																					'title' 	=>	__('Optional Class','ut_shortcodes')
																				),
															   'last'	=>	array(  'type'		=> 	'custom', 
																					'title'		=> 	__('Last Column','ut_shortcodes')
																				),
															   'effect'  => array( 'type'  	=> 'effect' , 
															  					   'title'  	=> __('Optional Animation Effect','ut_shortcodes')
																				 )
															 )
											);

#-----------------------------------------------------------------
# Elements like Tabs & Toggle or Callout
#-----------------------------------------------------------------

$ut_shortcodes['headline_2'] = array( 	'type'	=>	's', 
										'title'	=>	__('Elements', 'ut_shortcodes' ));
										
										
//Toggles
$ut_shortcodes['ut_blog'] = array( 'type'=>'s', 'title'=>__('Blog Excerpt', 'ut_shortcodes' ), 'attr' => array(      			'buttontext'       	  => array( 'type'  => 'input'  	, 'title'  => __('Button Text' , 'ut_shortcodes') 	 , 'desc' => __('Text for link to main blog' , 'ut_shortcodes') ) ,
																																'excerpt'       	  => array( 'type'  => 'input'  	, 'title'  => __('Excerpt Length' , 'ut_shortcodes') , 'desc' => __('(optional)' , 'ut_shortcodes') ) ,
																																'cat'       	  	  => array( 'type'  => 'input'  	, 'title'  => __('Show Posts by Category <br />ID' , 'ut_shortcodes') 	 , 'desc' => __('Show Posts From Several Categories <br />by Category ID ( separate by comma for multiple IDs )' , 'ut_shortcodes') ) ,
																																'category_name'       => array( 'type'  => 'input'  	, 'title'  => __('Show Posts by Category <br />Slug' , 'ut_shortcodes') 	 , 'desc' => __('Show Posts From Several Categories <br />by Category Slug ( separate by comma for multiple Slugs )' , 'ut_shortcodes') ) ,
																																'class'     		  => array( 'type'  => 'input'  	, 'title'  => __('Optional Class','ut_shortcodes')) 
                                                                                                                     ));
																																							
//Service Box
$ut_shortcodes['ut_service_box'] = array( 'type'=>'c', 'title'=>__('Icon Box', 'ut_shortcodes' ), 'attr' => array(     			'color'	  	  		  => array( 'type'  => 'colorpicker' , 'title' => __('Icon Color' , 'ut_shortcodes') ) ,
                                                                                                                                'background'          => array( 'type'  => 'colorpicker' , 'title' => __('Icon Background Color' , 'ut_shortcodes')) ,
																																'opacity'        	  => array( 'type'  => 'range'  	 , 'title'  => __('Background Opacity' , 'ut_shortcodes')) ,
																																'icon'      		  => array( 'type'  => 'icon'   , 'title'  => __('Icon' , 'ut_shortcodes')) ,
                                                                                                                           		'headline'        	  => array( 'type'  => 'input'  , 'title'  => __('Headline' , 'ut_shortcodes')) ,
																																'width' 		  	  => array( 'type'  => 'select' , 'title'  => __('Box Width' , 'ut_shortcodes') , 'values' => array( "third" , "half" ) ),
																																'effect'     		  => array( 'type'  => 'effect' , 'title'  => __('Optional Animation Effect','ut_shortcodes')),
																																'last' 		  	 	  => array( 'type'  => 'select' , 'title'  => __('Last in row' , 'ut_shortcodes') , 'values' => array( "true" , "false") ),
																																'class'     		  => array( 'type'  => 'input'  , 'title'  => __('Optional Class','ut_shortcodes')) 
                                                                                                                     ));

//Service Icon Box
$ut_shortcodes['ut_service_icon_box'] = array( 'type'=>'c', 'title'=>__('Service Icon Box', 'ut_shortcodes' ), 'attr' => array( 'color'	  	  		  => array( 'type'  => 'colorpicker' , 'title' => __('Color' , 'ut_shortcodes') ),
																																'hovercolor'	  	  => array( 'type'  => 'colorpicker' , 'title' => __('Hover Color' , 'ut_shortcodes') ),
                                                                                                                                'icon'      		  => array( 'type'  => 'icon'   , 'title'  => __('Icon' , 'ut_shortcodes')) ,
																																'url'     	  	  	  => array( 'type'  => 'input'  , 'title'  => __('Link' , 'ut_shortcodes') , 'desc' => __('Don\'t forget to put "http://" in front of your url' , 'ut_shortcodes') ) , 
                                                                                                                           		'target' 		  	  => array( 'type'  => 'select' , 'title' => __('Target' , 'ut_shortcodes') , 'values' => array( "_blank" , "_self" ) ),
																																'headline'        	  => array( 'type'  => 'input'  , 'title'  => __('Headline' , 'ut_shortcodes') , 'desc' => __('Box Headline' , 'ut_shortcodes' )) ,
																																'width' 		  	  => array( 'type'  => 'select' , 'title'  => __('Box Width' , 'ut_shortcodes') , 'values' => array( "third" , "fourth" , "half" ) ),
																																'effect'     		  => array( 'type'  => 'effect' , 'title'  => __('Optional Animation Effect','ut_shortcodes')),
																																'last' 		  	 	  => array( 'type'  => 'select' , 'title'  => __('Last in row' , 'ut_shortcodes') , 'values' => array( "true" , "false") ),
																																'class'     		  => array( 'type'  => 'input'  , 'title'  => __('Optional Class','ut_shortcodes')) 
                                                                                                                     ));


//Service Column
$ut_shortcodes['ut_service_column'] = array( 'type'=>'c', 'title'=>__('Service Column Horizontal', 'ut_shortcodes' ), 'attr' => array(     	'color'	  	  		  => array( 'type'  => 'colorpicker' , 'title' => __('Icon Color' , 'ut_shortcodes') ),
																																			'background' 		  => array( 'type'  => 'colorpicker' , 'title' => __('Background Icon Color' , 'ut_shortcodes') ),	
																																			'icon'      		  => array( 'type'  => 'icon'   , 'title'  => __('Icon' , 'ut_shortcodes')) ,
																																			'shape' 		  	  => array( 'type'  => 'select' , 'title'  => __('Icon Shape' , 'ut_shortcodes') , 'values' => array( "normal" , "round") ),
																																			'headline'        	  => array( 'type'  => 'input'  , 'title'  => __('Headline' , 'ut_shortcodes') , 'desc' => __('Column Headline' , 'ut_shortcodes' )) ,
																																			'align' 		  	  => array( 'type'  => 'select' , 'title'  => __('Alignment' , 'ut_shortcodes') , 'values' => array( "left" , "right" ) ),
																																			'width' 		  	  => array( 'type'  => 'select' , 'title'  => __('Box Width' , 'ut_shortcodes') , 'values' => array( "third" , "fourth" , "half" , "full" ) ),
																																			'margin_bottom'    	  => array( 'type'  => 'input'  , 'title'  => __('Margin Bottom' , 'ut_shortcodes') , 'desc' => __('value in px , eg "20"' , 'ut_shortcodes' ) ),
																																			'effect'     		  => array( 'type'  => 'effect' , 'title'  => __('Optional Animation Effect','ut_shortcodes')),
																																			'last' 		  	 	  => array( 'type'  => 'select' , 'title'  => __('Last in row' , 'ut_shortcodes') , 'values' => array( "true" , "false") ),
																																			'class'     		  => array( 'type'  => 'input'  , 'title'  => __('Optional Class','ut_shortcodes')) 
                                                                                                                     ));

// Vertical Service Column
$ut_shortcodes['ut_service_column_vertical'] = array( 'type'=>'c', 'title'=>__('Service Column Vertical', 'ut_shortcodes' ), 'attr' => array(   'color'	  	  		  => array( 'type'  => 'colorpicker' , 'title' => __('Icon Color' , 'ut_shortcodes') ),
																																				'icon'      		  => array( 'type'  => 'icon'   , 'title'  => __('Icon' , 'ut_shortcodes')) ,
																																				'shape' 		  	  => array( 'type'  => 'select' , 'title'  => __('Icon Shape' , 'ut_shortcodes') , 'values' => array( "normal" , "round") ),
																																				'background' 		  => array( 'type'  => 'colorpicker' , 'title' => __('Background Icon Color' , 'ut_shortcodes') , 'desc' => __('( only for shape round )' , 'ut_shortcodes')),
																																				'headline'        	  => array( 'type'  => 'input'  , 'title'  => __('Headline' , 'ut_shortcodes')) ,
																																				'width' 		  	  => array( 'type'  => 'select' , 'title'  => __('Box Width' , 'ut_shortcodes') , 'values' => array( "third" , "fourth" , "half" , "full" ) ),
																																				'margin_bottom'    	  => array( 'type'  => 'input'  , 'title'  => __('Margin Bottom' , 'ut_shortcodes') , 'desc' => __('value in px , eg "20"' , 'ut_shortcodes' ) ),
																																				'effect'     		  => array( 'type'  => 'effect' , 'title'  => __('Optional Animation Effect','ut_shortcodes')),
																																				'last' 		  	 	  => array( 'type'  => 'select' , 'title'  => __('Last in row' , 'ut_shortcodes') , 'values' => array( "true" , "false") ),
																																				'class'     		  => array( 'type'  => 'input'  , 'title'  => __('Optional Class','ut_shortcodes')) 
                                                                                                                     ));

//Image Animation
$ut_shortcodes['ut_animate_image'] = array( 'type'=>'s', 'title'=>__('Animated Image', 'ut_shortcodes' ), 'attr' => array(      'image'	  			  => array( 'type'  => 'mediaacess'  , 'title' => __('Image' , 'ut_shortcodes') ),		
																																'effect'   			  => array( 'type'  => 'select' , 'title'  => __('Animation Effect' , 'ut_shortcodes') , 'values' => array("fadeIn" , "slideInRight" , "slideInLeft") ),
																																'align'   			  => array( 'type'  => 'select' , 'title'  => __('Alignment' , 'ut_shortcodes') , 'values' => array("left" , "center" , "right") ),
																																'alt'	  			  => array( 'type'  => 'input'  , 'title'  => __('Image alt','ut_shortcodes')),
																																'margin_top'     	  => array( 'type'  => 'input'  , 'title'  => __('Margin Top' , 'ut_shortcodes') , 'desc' => __('value in px , eg "20"' , 'ut_shortcodes' ) ),
																																'margin_bottom'    	  => array( 'type'  => 'input'  , 'title'  => __('Margin Bottom' , 'ut_shortcodes') , 'desc' => __('value in px , eg "20"' , 'ut_shortcodes' ) ),
																																'class'     		  => array( 'type'  => 'input'  , 'title'  => __('Optional Class','ut_shortcodes')) 
                                                                                                                     ));

//Counter
$ut_shortcodes['ut_count_up'] = array( 'type'=>'c', 'title'=>__('Count Up Box', 'ut_shortcodes' ), 'attr' => array(      		'color'	  	  		  => array( 'type'  => 'colorpicker' , 'title'  => __('Counter Color' , 'ut_shortcodes') ) ,
																																'desccolor'			  => array( 'type'  => 'colorpicker' , 'title'  => __('Counter Description Color' , 'ut_shortcodes') ) ,
																																'to'	  			  => array( 'type'  => 'input'  	 , 'title'  => __('Count up to this value','ut_shortcodes')),
																																'background'          => array( 'type'  => 'colorpicker' , 'title'  => __('Counter Background Color' , 'ut_shortcodes')) ,
																																'opacity'        	  => array( 'type'  => 'range'  	 , 'title'  => __('Counter Background Opacity' , 'ut_shortcodes')) ,
																																'icon'      		  => array( 'type'  => 'icon'   	 , 'title'  => __('Icon' , 'ut_shortcodes')) ,
																																'width' 		  	  => array( 'type'  => 'select' 	 , 'title'  => __('Box Width' , 'ut_shortcodes') , 'values' => array( "third" , "fourth" , "half" ) ),
																																'last' 		  	 	  => array( 'type'  => 'select' 	 , 'title'  => __('Last in row' , 'ut_shortcodes') , 'values' => array( "true" , "false") ),																														
																																'class'     		  => array( 'type'  => 'input'  	 , 'title'  => __('Optional Class','ut_shortcodes')) 
                                                                                                                     ));

//Social Media Icons
$ut_shortcodes['ut_social_media'] = array( 'type'=>'m', 'title'=>__('Social Media Icon List', 'ut_shortcodes' ), 'attr' => array(	'socialmedia' 	  => array( 'type'  => 'custom' ),
																																	'class'     	  => array( 'type'  => 'input'  	 	, 'title'  => __('Optional Class','ut_shortcodes') )
																													
																													));

//Single Testimonial
$ut_shortcodes['ut_single_quote'] = array( 'type'=>'c', 'title'=>__('Single Quote', 'ut_shortcodes') 	, 	'attr' => array( 		'author'  => array( 'type'  => 'input'  , 'title'  => __('Author','ut_shortcodes')),
																																	'company' => array( 'type'  => 'input'  , 'title'  => __('Company','ut_shortcodes')),	
																																	'title'   => array( 'type'  => 'input'  , 'title'  => __('Title','ut_shortcodes')),
																																	'avatar'  => array( 'type'  => 'mediaacess'  , 'title' => __('Avatar' , 'ut_shortcodes') ),
                                                                                                                                    'date'    => array( 'type'  => 'input'  , 'title'  => __('Date of Quote','ut_shortcodes')),
                                                                                                                                    'rating'  => array( 'type'  => 'select' , 'title'  => __('Rating' , 'ut_shortcodes') , 'values' => array( "one" , "two" , "three" , "four" , "five" ) ),
																																	'width'   => array( 'type'  => 'select' , 'title'  => __('Box Width' , 'ut_shortcodes') , 'values' => array( "third" , "fourth" , "half" ) ),
																																	'last' 	  => array( 'type'  => 'select' , 'title'  => __('Last in row' , 'ut_shortcodes') , 'values' => array( "true" , "false") ),
																																	'effect'  => array( 'type'  => 'effect' , 'title'  => __('Optional Animation Effect','ut_shortcodes')),
																																	'margin_bottom' => array( 'type'  => 'input'  , 'title'  => __('Margin Bottom' , 'ut_shortcodes') , 'desc' => __('value in px , eg "20"' , 'ut_shortcodes' ) ),
																																	'class'   => array( 'type'  => 'input' , 'title'   => __('Optional Class','ut_shortcodes'))
																											));

//Testimonials with Avatar
$ut_shortcodes['ut_quote_rotator'] = array( 'type'=>'m', 'title'=>__('Quote Rotator ( with Avatar )', 'ut_shortcodes' ), 		'attr'				  => array( 'quoterotator' => array( 'type'  => 'custom' ),
																																'speed'	  			  => array( 'type'  	   => 'input'  , 'title'  => __('Rotation Speed in ms','ut_shortcodes')),
																																'autoplay' 		  	  => array( 'type'  	   => 'select' , 'title'  => __('Autoplay' , 'ut_shortcodes') , 'values' => array( "on" , "off" ) ),
																																'randomize' 		  => array( 'type'  	   => 'select' , 'title'  => __('Randomize' , 'ut_shortcodes') , 'values' => array( "on" , "off" ) ),
																																'width' 		  	  => array( 'type'  	   => 'select' , 'title'  => __('Rotator Width' , 'ut_shortcodes') , 'values' => array( "half" , "fullwidth" ) ),
																																'last' 		  	 	  => array( 'type'  	   => 'select' , 'title'  => __('Last in row' , 'ut_shortcodes') , 'values' => array( "true" , "false") ),
																													));

//Testimonials without Avatar
$ut_shortcodes['ut_quote_rotator_alt'] = array( 'type'=>'m', 'title'=>__('Quote Rotator (without Avatar)', 'ut_shortcodes' ), 	'attr'				  => array( 'quoterotator_alt'  => array( 'type'  => 'custom' ),
																																'speed'	  			  => array( 'type'  	   => 'input'  , 'title'  => __('Rotation Speed in ms','ut_shortcodes')),
																																'autoplay' 		  	  => array( 'type'  	   => 'select' , 'title'  => __('Autoplay' , 'ut_shortcodes') , 'values' => array( "on" , "off" ) ),
																																'randomize' 		  => array( 'type'  	   => 'select' , 'title'  => __('Randomize' , 'ut_shortcodes') , 'values' => array( "on" , "off" ) ),
																																'width' 		  	  => array( 'type'  	   => 'select' , 'title'  => __('Rotator Width' , 'ut_shortcodes') , 'values' => array( "half" , "fullwidth" ) ),
																																'last' 		  	 	  => array( 'type'  	   => 'select' , 'title'  => __('Last in row' , 'ut_shortcodes') , 'values' => array( "true" , "false") ),
																													));

if( ut_is_plugin_active('ut-twitter/ut.twitter.php') ) {
																													
	//Twitter Rotator
	$ut_shortcodes['ut_twitter_rotator'] = array( 'type'=>'m', 'title'=>__('Twitter Rotator', 'ut_shortcodes' ), 'attr' => array(   'count'	  			  => array( 'type'  => 'input'  , 'title'  => __('Tweets to display','ut_shortcodes')),
																																	'avatar' 		  	  => array( 'type'  => 'select' , 'title'  => __('Show Avatar' , 'ut_shortcodes') , 'values' => array( "on" , "off") ),
																																	'speed'	  			  => array( 'type'  => 'input'  , 'title'  => __('Rotation Speed in ms','ut_shortcodes')),
																																	'width' 		  	  => array( 'type'  => 'select'	, 'title'  => __('Rotator Width' , 'ut_shortcodes') , 'values' => array( "half" , "fullwidth" ) ),
																																	'last' 		  	 	  => array( 'type'  => 'select' , 'title'  => __('Last in row' , 'ut_shortcodes') , 'values' => array( "true" , "false") ),
																																	'class'     		  => array( 'type'  => 'input'  , 'title'  => __('Optional Class','ut_shortcodes')) 
																														 ));																												
}


//Toggles
$ut_shortcodes['ut_togglegroup'] = array( 'type'=>'m', 'title'=>__('Accordion / Toggle', 'ut_shortcodes' ), 					'attr'				  => array( 'togglegroup' => array( 'type' => 'custom' ),
																																'width' 		  	  => array( 'type'  	  => 'select' 	 , 'title'  => __('Toggle Width' , 'ut_shortcodes') , 'values' => array( "third" , "fourth" , "half" ) ),
																																'last' 		  	 	  => array( 'type'  	  => 'select' 	 , 'title'  => __('Last in row' , 'ut_shortcodes') , 'values' => array( "true" , "false") ),
																													));
//Tabs
$ut_shortcodes['ut_tabgroup'] = array( 'type'=>'m', 'title'=>__('Tabs', 'ut_shortcodes' ), 										'attr'				  => array( 'tabgroup'  => array( 'type' => 'custom' ),
																																'width' 		  	  => array( 'type'  	=> 'select' 	 , 'title'  => __('Tab Width' , 'ut_shortcodes') , 'values' => array( "third" , "fourth" , "half" ) ),
																																'last' 		  	 	  => array( 'type'   	=> 'select' 	 , 'title'  => __('Last in row' , 'ut_shortcodes') , 'values' => array( "true" , "false") ),
																													));


//Clientgroup
$ut_shortcodes['ut_client_group'] = array( 'type'=>'m', 'title'=>__('Clients', 'ut_shortcodes' ), 								'attr'				  => array( 'clientgroup'   => array( 'type'  => 'custom' ),
                                                                                                                                'carousel'  	 	  => array( 'type'   	    => 'select' , 'title'  => __('Display as Carousel' , 'ut_shortcodes') , 'values' => array( "on" , "off") ),
                                                                                                                                'class'     		  => array( 'type'          => 'input'  , 'title'  => __('Optional Class','ut_shortcodes'))
																													));

//Title Divider
$ut_shortcodes['ut_title_divider'] = array( 'type'=>'c', 'title'=>__('Title Divider', 'ut_shortcodes') , 'attr' => array( 	'margin_top'     	  => array( 'type'  => 'input'  	 , 'title'  => __('Margin Top' , 'ut_shortcodes') , 'desc' => __('value in px , eg "20"' , 'ut_shortcodes' ) ),	
																															'class'     		  => array( 'type'  => 'input'  	 , 'title'  => __('Optional Class','ut_shortcodes') )  
																													));

//Blockquote
$ut_shortcodes['ut_blockquote_left'] = array( 'type'=>'c', 'title'=>__('Blockquote (left)', 'ut_shortcodes' ));

//Blockquote
$ut_shortcodes['ut_blockquote_right'] = array( 'type'=>'c', 'title'=>__('Blockquote (right)', 'ut_shortcodes' ));


//Dropcap
$ut_shortcodes['ut_dropcap'] = array( 'type'=>'c', 'title'=>__('Dropcap', 'ut_shortcodes'), 'attr'=>array( 'style' 		=> array( 'type'=>'radio' , 'title'=>'Style', 'def'=>'one', 'opt' => array('one'=>'Style One', 'two' => 'Style Two')),
																										   'class'      => array( 'type'  => 'input'  	 , 'title'  => __('Optional Class','ut_shortcodes') )
																											));


//Parallax Quote
$ut_shortcodes['ut_parallax_quote'] = array( 'type'=>'c', 'title'=>__('Parallax Quote', 'ut_shortcodes') , 'attr' => array( 		'cite'  => array( 'type'  => 'input' , 'title'  => __('Cite','ut_shortcodes')),
																																	'class' => array( 'type'  => 'input' , 'title'  => __('Optional Class','ut_shortcodes'))
																											));

//Highlight
$ut_shortcodes['ut_highlight'] = array( 'type'=>'c', 'title'=>__('Highlight', 'ut_shortcodes') , 'attr' => array( 		'color'		=> array( 'type'  => 'colorpicker' , 'title'  => __('Font Color' , 'ut_shortcodes') ),
																														'bgcolor'	=> array( 'type'  => 'colorpicker' , 'title'  => __('Background Color' , 'ut_shortcodes') )  
																											));

//Alerts
$ut_shortcodes['ut_alert'] = array( 'type'=>'c', 'title'=>__('Message Box', 'ut_shortcodes'), 'attr' => array(			'color'		=> array('type'	  =>'radio', 'title'=>'Color', 'def'=>'info', 'opt' => array('white'=>'White', 'grey' => 'Grey' , 'themecolor'=>'Themecolor')),
																														'effect'     		  => array( 'type'  => 'effect' , 'title'  => __('Optional Animation Effect','ut_shortcodes')),
																											));

$ut_shortcodes['ut_probar'] = array( 'type'=>'s', 'title'=>__('Single Progress Bar', 'ut_shortcodes'), 'attr' => array(    'width'     => array( 'type'  => 'input' , 'title' => __('Percentage ( required )' , 'ut_shortcodes')) ,
                                                                                                                           'info'      => array( 'type'  => 'input' , 'title' => __('Info Text','ut_shortcodes')) , 
																														   'color'	   => array( 'type'  => 'colorpicker' , 'title' => __('Bar Color' , 'ut_shortcodes') , 'desc' => __('optional : default themecolor' , 'ut_shortcodes') ),
                                                                                                                           'class'     => array( 'type'  => 'input' , 'title' => __('Optional Class','ut_shortcodes'))
                                                                                                                           
                                                                                                                     ));

																											 
//Word Rotator
$ut_shortcodes['ut_rotate_words'] = array( 'type'=>'c', 'title'=>__('Word Rotator (comma seperated words) ', 'ut_shortcodes' ) , 'attr' => array( 'timer' => array( 'type'  => 'input' , 'title' => __('Animation Speed' , 'ut_shortcodes') ) , 'class' => array( 'type'  => 'input' , 'title' => __('Optional Class','ut_shortcodes')) ));

//Fancy Link
$ut_shortcodes['ut_fancy_link'] = array( 'type'=>'c', 'title'=>__('Fancy Link', 'ut_shortcodes' ),  'attr' => array(      		'url'     		  	  => array( 'type'  => 'input'  	 , 'title'  => __('Link','ut_shortcodes')),
																																'class'     		  => array( 'type'  => 'input'  	 , 'title'  => __('Optional Class','ut_shortcodes')) 
                                                                                                                     ));

//Vimeo Video
$ut_shortcodes['ut_video_vimeo'] = array( 'type'=>'s', 'title'=>__('Vimeo Video', 'ut_shortcodes' ), 'attr' => array(      		'id'     		  	  => array( 'type'  => 'input'  	 , 'title'  => __('Video ID','ut_shortcodes') , 'desc' => __('only the video ID , eg "23237102"' , 'ut_shortcodes') ),
																																'class'     		  => array( 'type'  => 'input'  	 , 'title'  => __('Optional Class','ut_shortcodes')) 
                                                                                                                     ));

//Youtube Video
$ut_shortcodes['ut_video_youtube'] = array( 'type'=>'s', 'title'=>__('Youtube Video', 'ut_shortcodes' ), 'attr' => array(      	'id'     		  	  => array( 'type'  => 'input'  	 , 'title'  => __('Video ID','ut_shortcodes') , 'desc' => __('only the video ID , eg "gvt_YFuZ8LA"' , 'ut_shortcodes') ),
																																'class'     		  => array( 'type'  => 'input'  	 , 'title'  => __('Optional Class','ut_shortcodes')) 
                                                                                                                     ));																													 																													 
//simple clear
$ut_shortcodes['ut_clear'] = array( 'type'=>'s', 'title'=>__('Clear', 'ut_shortcodes' ));																													 