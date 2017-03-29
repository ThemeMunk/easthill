// JavaScript Document
jQuery(function($) { // DOM is now ready and jQuery's $ alias sandboxed
		$(window).load(function() {
			$('.flexslider').flexslider({
			  animation: "slide",
			  controlNav: false,
			});
		});
	
		jQuery('.main-navigation').meanmenu({
			meanScreenWidth: 991,
			meanRevealPosition: "center"
		});

});		
