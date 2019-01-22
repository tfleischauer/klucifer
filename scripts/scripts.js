/*
Theme Name: Klucifer
Script Description: Scripts for main navigation, FlexSlider, FooGallery captions, and video posts
Author: Troy Fleischauer
Author URI: http://www.portfolio.troyfleischauer.com
*/

$(window).load(function() { // when the window loads...

  // START NAV-MAIN TOGGLE FUNCTION
  $("#toggle").click(function() { // when toggle is clicked
	  $("nav#nav-main").slideToggle(); // open or close navigation
	  return false; // disable anchor text target
  }); // end when toggle is clicked
  // END NAV-MAIN TOGGLE FUNCTION

  // START HIDE/SHOW NAV-MAIN @860px
  var loadWidth = window.innerWidth; // save window load width as a variable
  
  $(window).resize(function() { // when the window is resized...
	  if (loadWidth !== window.innerWidth) { // trigger for width only
		  if (window.innerWidth <= 860) { // if width is less than or equal to 860px
			  $("nav#nav-main").hide(); // hide main navigation items
		  } else {
			  $("nav#nav-main").show(); // show main navigation items
		  } 
	  } // end if - trigger for width only	
   }); // end window.resize
   // END HIDE/SHOW NAV-MAIN @860px
   
   // START ACTIVATE FLEXSLIDER FOR FRONT-PAGE.PHP
   $('.flexslider').flexslider({
		animation: "fade",
		slideshow: true,
		smoothHeight: true,
		slideshowSpeed: 7000,  // Integer: Set the speed of the slideshow cycling, in milliseconds
		animationSpeed: 500    // Integer: Set the speed of animations, in milliseconds
	});
	// END ACTIVATE FLEXSLIDER FOR FRONT-PAGE.PHP
 
	// START RESPONSIVE FLEXSLIDER SIZING FOR FRONT-PAGE.PHP	
	var loadWidth2 = window.innerWidth; // save window load width as a variable
	
	$(window).resize(function() { // when the window is resized...
		if (loadWidth2 !== window.innerWidth) { // trigger for width only
			if (window.innerWidth < 725) { // if width is less than 725px
				$('flex-active-slide').removeProp('width');
			} else {
				// $(".about-content section div.wp-caption").addClass("alignright");
			} 
		} // end if - trigger for width only
	}); // end window.resize
	// END RESPONSIVE FLEXSLIDER SIZING FOR FRONT-PAGE.PHP
  
}); // ...end window load


$(document).ready(function() {
	showFooGalleryCaptions(); 
	removeFeaturedImageCaptions();
});

$(window).resize(showFooGalleryCaptions);

// START: For FooGallery (Version 1.4.30). Adds a caption to galleries on gateway pages. Avoids Mystery Meat navigation on
//  devices that don't typically use a mouse (such as phones and tablets). Larger screen devices get mouse-over caption labelling.
//  This function assumes that FooGallery > Gallery Settings > Hover Effects > Caption Visibility is set to "On Hover".
function showFooGalleryCaptions() {
	if ($(window).width() <= 1024) {
		$(".page-template-page-portfolio-gateway .foogallery").removeClass("fg-caption-hover").addClass("fg-caption-always");
	} else if ($(window).width() >= 1024) {
		$(".page-template-page-portfolio-gateway .foogallery").addClass("fg-caption-hover").removeClass("fg-caption-always");
	}
}
// END: For FooGallery (Version 1.4.30). Adds a caption to galleries on gateway pages...

function removeFeaturedImageCaptions() {
	$(".page-template-page-video .wp-caption.aligncenter").remove();
}

jQuery(document).ready(function($) {
	var caption = document.querySelectorAll( '.wp-caption' );
		if ( caption && caption.length ) {
		for ( var i = 0; i < caption.length; i++ ) {
		var c = caption[i];
		if ( c && !c.querySelector( 'img' )) {
		c.remove();
		}
		}
		}
});
