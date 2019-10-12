;(function($){
	
	$(document).ready(function(){
		
        jQuery.fn.exists = function(){return this.length>0;}
        
        if( $("#ut-selfvideo-player").exists() ) {
            
            function ut_adjust_video_player() {
                
                var videoheight  = $("#ut-selfvideo-player").height(),
                    windowheight = $(window).height();
                    
                    if( videoheight > windowheight ) {
                        
                        $("#ut-selfvideo-player").css("top" , -( videoheight - windowheight ) / 2);
                        
                    } else {
                        
                        $("#ut-selfvideo-player").css("top" , 0);
                    
                    }
            
            }
               
            var $videoplayer = $("#ut-selfvideo-player")[0],
                playervolume = $("#ut-selfvideo-player").attr("volume") / 100;
                
            /* set volume */
            $videoplayer.volume=playervolume;
            
            $('.ut-video-control').click( function( event ) {
    
                if( $(this).hasClass("ut-unmute") ) {
                                    
                    $videoplayer.muted=false;
                    $(this).removeClass("ut-unmute").addClass("ut-mute");
            
                } else {
                                    
                    $videoplayer.muted=true;
                    $(this).removeClass("ut-mute").addClass("ut-unmute");
                    
                }
                
                event.preventDefault();
                
            });
                    
            		
            
            ut_adjust_video_player();
            
            $(window).utresize(function(){
                
                ut_adjust_video_player();
                
            });
            
        }
        
	});
	
})(jQuery);
 /* ]]> */