jQuery(document).ready(function($) {

	"use strict";

	// Tabs

	//When page loads...
	$('.tabs-wrapper').each(function() {
		$(this).find(".tab_content").hide(); //Hide all content
		$(this).find("ul.tabs li:first").addClass("active").show(); //Activate first tab
		$(this).find(".tab_content:first").show(); //Show first tab content
	});
	
	//On Click Event
	$("ul.tabs li").click(function(e) {
		$(this).parents('.tabs-wrapper').find("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(this).parents('.tabs-wrapper').find(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(this).parents('.tabs-wrapper').find(activeTab).fadeIn(); //Fade in the active ID content
		
		e.preventDefault();
	});
	
	$("ul.tabs li a").click(function(e) {
		e.preventDefault();
	})
	
	/** Mobile specific */
	if( $('body.responsive').length ) {

		// Mobile menu
		jQuery(document).ready(function () {
			jQuery('#navigation').meanmenu({
			meanScreenWidth: "960",
			meanRevealPosition: "left"
			});
		});
		
	}
	
	/*** Gallery ***/
    jQuery('a.post-gallery').colorbox({rel:"gallery-group"});

    // Flex Slider
    jQuery(window).load(function($){
    	
		if(hick.is_single) {
		jQuery('.flexslider').flexslider({
			animation: "slide",
			controlNav: 'thumbnails',
		});
		} else {
		jQuery('.main-slider').flexslider({
			animation: "slide",
			controlNav: false,
		});
		}
		
		jQuery('.short-slider').flexslider({
			animation: "slide",
			directionNav: true,
			controlNav: true,
		});
		
	});

	// Google Plus Button
	var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	po.src = 'https://apis.google.com/js/plusone.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	
	// Search
	
	$('#top_search a').on('click', function ( e ) {
		e.preventDefault();
    	$('.show-search').slideToggle('fast');
    });
	
});