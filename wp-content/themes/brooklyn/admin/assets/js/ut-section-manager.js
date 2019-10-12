/* <![CDATA[ */
(function($){
	
	"use strict";
		
    $(document).ready(function(){
		
		/* ui select groups */
		$(".option-tree-ui-group-select").each(function(){
			
			var current_for = $(this).find(':selected').data('for');
			
			$(this).children("option").each(function() {
                
				/* hide other elements */
				if( $(this).data("for") !== 'current_for') {
					$("#setting_"+ $(this).data("for") ).hide();
				}
				
            });
			
			$("#setting_"+ current_for ).show();
			
		});
		
		$(".option-tree-ui-group-select").change(function(){
			
			var current_for = $(this).find(':selected').data('for');
			
			$(this).children("option").each(function() {
                
				/* hide other elements */
				if( $(this).data("for") !== 'current_for') {
					$("#setting_"+ $(this).data("for") ).hide();
				}
				
            });
			
			$("#setting_"+ current_for ).show();
			
		});
		
				
		var current_template = $("#page_template").val();
		
		/* display or hide team manager */		
		if(current_template == 'templates/template-team.php') {
			$('.ut-team-section').show();
		} else {
			$('.ut-team-section').hide();
		}
		
		/* display or hide team manager on template change */	
		$("#page_template").change(function() { 
			
			var chosen_template = $(this).val();
			
			/* display or hide team manager */		
			if(chosen_template == 'templates/template-team.php') {
				$('.ut-team-section').show();
			} else {
				$('.ut-team-section').hide();
			}			
		
		});
		
		/* disable background settings of parallax is active */
		var parallax_status = $("#ut_parallax_section").val();
				
		if( parallax_status === 'on' ) {
			
			$("#ut_parallax_image-attachment").prop('selectedIndex', 0);
			$("#ut_parallax_image-attachment").attr("disabled", true ).wrap('<div class="disabled" />');
			
			$("#ut_parallax_image-position").prop('selectedIndex', 0);
			$("#ut_parallax_image-position").attr("disabled", true ).wrap('<div class="disabled" />');
		
		}
		
		$("#ut_parallax_section").change(function() { 
		
			parallax_status = $(this).val();
			
			if( parallax_status === 'on' ) {
				
				$("#ut_parallax_image-attachment").prop('selectedIndex', 0).trigger("change");
				$("#ut_parallax_image-attachment").attr("disabled", true ).parent().wrap('<div class="disabled" />');
				
				$("#ut_parallax_image-position").prop('selectedIndex', 0).trigger("change");
				$("#ut_parallax_image-position").attr("disabled", true ).parent().wrap('<div class="disabled" />');
							
			} else {
				
				$("#ut_parallax_image-attachment").attr("disabled", false ).parent().unwrap();				
				$("#ut_parallax_image-position").attr("disabled", false ).parent().unwrap();			
			
			}			
		
		});
		
	});

})(jQuery);
 /* ]]> */	