(function($) {
	$('.menu-mobile-menu').on('click', function(e){
		e.preventDefault();
	});
	
	$('.close-overlay').on('click', function(){
		disableSearchOverlay();
		disableMenuOverlay();
	});

	$(".search-utility a").on('click', function(){
		enableSearchOverlay();
		return false;	// disable <a> tag
	});

	$(".search-m-button").on('click', function(){

		if($('.search-overlay').is(':hidden')) {
			disableMenuOverlay();
			enableSearchOverlay();			
		} else {
			disableSearchOverlay();
		}

		return false;	// disable <a> tag
	});

	$(".menu-m-button").on('click', function(){
		if($('.mobile-menu-overlay').is(':hidden')) {
			disableSearchOverlay();
			enableMenuOverlay();
		} else {
			disableMenuOverlay();
		}
 		
		return false;	// disable <a> tag
	});

	function disableSearchOverlay() {
		$('.search-overlay').animate({
			opacity: 0
		}, 100, function() {
			// anim complete
			$('.search-overlay').css('display', 'none');
		});
		enableScroll();
	}

	function enableSearchOverlay() {
		$('.search-overlay').css('display', 'block');
		$('.search-overlay').animate({
			opacity: 1
		}, 100, function() {
			// anim complete
			disableScroll();
		});
	}

	function disableMenuOverlay() {
		$('.mobile-menu-container').removeClass('open');
		$('.mobile-menu-overlay').animate({
			opacity: 0
		}, 100, function() {
			// anim complete
			$('.mobile-menu-overlay').css('display', 'none');
		});
		enableScroll();
	}

	function disableScroll() {
		// disable scroll
		$('html, body').addClass("no-scroll"); 
	}

	function enableScroll() {
		$('html, body').removeClass("no-scroll");
	}

	function enableMenuOverlay() {
		$('.mobile-menu-container').addClass('open');
		$('.mobile-menu-overlay').css('display', 'block');
		$('.mobile-menu-overlay').animate({
			opacity: 1
		}, 100, function() {
			// anim complete
			disableScroll();
		});
	}
	
	function sticky_nav_spacer(){
		var mh = $('.main-header').height();
		
		if ($('.main-header').css('display') == "none") {
			mh = $('.mobile-fixed-buttons').outerHeight();
		}
		else {
			$('.sticky-nav-spacer').height($('.main-header').height());
		}
		
	}
	
	$(function(){
		
	});
	
	$(window).on('load', function(){
		sticky_nav_spacer();
	});
	
	$( window ).on('resize', function(){
		disableSearchOverlay();
		disableMenuOverlay();
		sticky_nav_spacer();
	});
	
	$( window ).on('scroll', function(){
		var t = $(document).scrollTop();
		if (t >= 80) { //mobile header height
			$('body').addClass('scrolled');
		}
		else {
			$('body').removeClass('scrolled');
		}
	});

	$(document).on('keyup', function(e){
		if (e.keyCode === 27) { // on esc key press
			disableSearchOverlay();
			disableMenuOverlay();
		}
	});
	
	$('.mobile-menu-container .main-menu').smartmenus();

})(jQuery);