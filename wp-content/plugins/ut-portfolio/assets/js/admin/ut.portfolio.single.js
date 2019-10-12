/* <![CDATA[ */
(function($){
	
	"use strict";
	
    $(document).ready(function(){
        
		/* not supported post formats */		
		$('#post-format-quote').remove();
		$('.post-format-quote').next('br').remove();
		$('.post-format-quote').remove();
		
		$('#post-format-link').remove();
		$('.post-format-link').next('br').remove();
		$('.post-format-link').remove();
		
		$('#post-format-image').remove();
		$('.post-format-image').next('br').remove();
		$('.post-format-image').remove();	
        
    });
    
})(jQuery);
 /* ]]> */	