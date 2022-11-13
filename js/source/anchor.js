(function($) {
	var anchorBar = $('.anchor-container');
	var anchorOuter = $('.anchor-section');
	var anchorBarSection = $('.anchor-fixed-container');
	var anchorBGCont = $('.anchor-bg-container');
	var anchorBarCont = $('.content-block-anchors');
	var targetOffset;
	var anchorHeight = 0;

	if($("#anchor-point").length) { // does anchor-point even exist?
		targetOffset = $("#anchor-point").offset().top;
	}

	function anchorH() {
		if($("#anchor-point").length) {
			if(anchorBarSection.length) {	
				anchorHeight = anchorBarSection.height();
				
			} else {
				anchorHeight = 0;
			}
			anchorOuter.css({
				'height': anchorHeight + "px"
			});
		}
	}

	function anchorAdj() {
		anchorBarH = anchorBar.outerHeight();
		anchorBarCont.css({
			"min-height": anchorBarH + "px"
		});

		if($("#anchor-point").length) { // does anchor-point even exist?
			targetOffset = $("#anchor-point").offset().top;
		}
		
		// account for wp top admin bar
		if($('#wpadminbar').length) {
			wpHeaderHeight = $('#wpadminbar').outerHeight();
			targetOffset -= wpHeaderHeight;
		}
		
		// account for sticky header
		var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
				
		if (windowWidth >= 768) {
			if($('header.main-header').length) {
				mainHeaderHeight = $('header.main-header').outerHeight();
				targetOffset -= mainHeaderHeight;
			}
		}
	}

	function scrollPos() {
		var wpHeaderHeight;
		var topPos = 0;

		// account for wp top admin bar
		if($('#wpadminbar').length) {
			wpHeaderHeight = $('#wpadminbar').outerHeight();
			topPos += wpHeaderHeight;
		}
		
		// account for sticky header
		var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
				
		if (windowWidth >= 768) {
			if($('header.main-header').length) {
				mainHeaderHeight = $('header.main-header').outerHeight();
				topPos += mainHeaderHeight;
			}
		}

		if ( $(window).scrollTop() > targetOffset ) {
			anchorBarSection.css( {
				"top": topPos,
				"position": "fixed",
				"left": 0
			});
			anchorBGCont.addClass('anchor-bg');
		} else {
			anchorBarSection.css( {
				"position": "relative",
				"top": "auto"
			});
			anchorBGCont.removeClass('anchor-bg');
		}
	};

	// smooth scroll anchor links
	$('a[href*="#"]:not([data-toggle])')
	// Remove links that don't actually link to anything
	.not('[href="#"]')
	.not('[href="#0"]')
	.not('[role="button"]') // for accordion
	.on('click', function(event){
		// On-page links
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
			|| location.hostname == this.hostname) {

			// Figure out element to scroll to
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			 // Does a scroll target exist?
			 if (target.length) {
				// Only prevent default if animation is actually gonna happen
				event.preventDefault();
				
				var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
				
				if (windowWidth < 768) {
					$('html,body').animate({
						scrollTop: target.offset().top - $('.main-header').height() //minus the sticky mobile nav
					}, 700);
				}
				else {
					$('html,body').animate({
						scrollTop: target.offset().top - anchorHeight
					}, 700);
				}
				
				return false;
			}
		}
    });


	$(function(){
		anchorAdj();
		anchorH();
	});

	$(window).on('load', function(){
		anchorAdj();
	});

	$(window).on('resize', function(){
		anchorAdj();
		anchorH();
	});

	$(window).on('scroll', function(){
		scrollPos();
		anchorH();
	});
} (jQuery));