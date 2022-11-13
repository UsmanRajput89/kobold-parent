(function($) {

//----------------------------------------
// Essentials
//----------------------------------------

// breakpoints
var $screen_xxs = 320;
var $screen_xs = 480;
var $screen_sm = 576;
var $screen_md = 768;
var $screen_lg = 991;
var $screen_xlg = 1200;


var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

// find out if is touch device
function is_touch_device() { 
 return (('ontouchstart' in window)
      || (navigator.MaxTouchPoints > 0)
      || (navigator.msMaxTouchPoints > 0));
 //navigator.msMaxTouchPoints for microsoft IE backwards compatibility
}

// equal heights
function matchH() {
	var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
	
	if (windowWidth < $screen_xxs) {
		$('.matchH-xxs').matchHeight({remove: true});
	}
	else {
		$('.matchH-xxs').matchHeight({byRow: true});
	}
	
	if (windowWidth < $screen_xs) {
		$('.matchH-xs').matchHeight({remove: true});
	}
	else {
		$('.matchH-xs').matchHeight({byRow: true});
	}
	
	if (windowWidth < $screen_sm) {
		$('.matchH-sm').matchHeight({remove: true});
	}
	else {
		$('.matchH-sm').matchHeight({byRow: true});
	}
	
	if (windowWidth < $screen_md) {
		$('.matchH-md').matchHeight({remove: true});
	}
	else {
		$('.matchH-md').matchHeight({byRow: true});
	}
	
	if (windowWidth < $screen_lg) {
		$('.matchH-lg').matchHeight({remove: true});
	}
	else {
		$('.matchH-lg').matchHeight({byRow: true});
	}
	
	if (windowWidth < $screen_xlg) {
		$('.matchH-xlg').matchHeight({remove: true}); 
	}
	else {
		$('.matchH-xlg').matchHeight({byRow: true});
	}
}

function cat_toggle() {
	$('.cat-item.has-children > button').on('click', function(){
		$(this).parent('.has-children').toggleClass('active');
		
		$(this).siblings('.children').slideToggle();
	});
}


/**
* Get YouTube ID from various YouTube URL
* @author: takien
* @url: http://takien.com
* For PHP YouTube parser, go here http://takien.com/864
*/

function YouTubeGetID(url){
  var ID = '';
  url = url.replace(/(>|<)/gi,'').split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
  if(url[2] !== undefined) {
    ID = url[2].split(/[^0-9a-z_\-]/i);
    ID = ID[0];
  }
  else {
    ID = url;
  }
    return ID;
}


/*
* Tested URLs:

var url = 'http://youtube.googleapis.com/v/4e_kz79tjb8?version=3';
url = 'https://www.youtube.com/watch?feature=g-vrec&v=Y1xs_xPb46M';
url = 'http://www.youtube.com/watch?feature=player_embedded&v=Ab25nviakcw#';
url = 'http://youtu.be/Ab25nviakcw';
url = 'http://www.youtube.com/watch?v=Ab25nviakcw';
url = '<iframe width="420" height="315" src="http://www.youtube.com/embed/Ab25nviakcw" frameborder="0" allowfullscreen></iframe>';
url = '<object width="420" height="315"><param name="movie" value="http://www.youtube-nocookie.com/v/Ab25nviakcw?version=3&amp;hl=en_US"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube-nocookie.com/v/Ab25nviakcw?version=3&amp;hl=en_US" type="application/x-shockwave-flash" width="420" height="315" allowscriptaccess="always" allowfullscreen="true"></embed></object>';
url = 'http://i1.ytimg.com/vi/Ab25nviakcw/default.jpg';
url = 'https://www.youtube.com/watch?v=BGL22PTIOAM&feature=g-all-xit';
url = 'BGL22PTIOAM';
*/

function video_bg(){
	if ($('.vbwrapper').length > 0) {
		$('.vbwrapper').each(function(){
			
			var wrapper = $(this);
			var videoWrapper = $(this).find('.video-background')
			var videoID = YouTubeGetID(videoWrapper.attr('video'));
			
			//init video
			videoWrapper.YTPlayer({
				width: wrapper.width(),
				fitToBackground: true,
				videoId: videoID,
				callback: function() {
					videoCallbackEvents();
				},
				playerVars: {
					playlist: videoID
				},
			});
			
			var videoCallbackEvents = function() {
				var player = videoWrapper.data('ytPlayer').player;
				
				player.addEventListener('onStateChange', function(event){
					//console.log("Player State Change", event);
					
					// OnStateChange Data
					if (event.data === 1) {
						videoWrapper.addClass('loaded');
					}
				});
			}
		});
	}

}

function video_responsive_wrap() {
	if ($("iframe[src*='youtube.com']").length || $("iframe[src*='vimeo.com']").length ) {
		$("iframe[src*='youtube.com'], iframe[src*='vimeo.com']").addClass("embed-responsive-item").wrap("<div class='embed-responsive embed-responsive-16by9'></div>");
	}
}

//reset iframes on hide to prevent videos from playing when modal is closed
$('.modal').on('hidden.bs.modal', function () {
  if ($(this).find('iframe').length > 0) {
	$(this).find('iframe').each(function(){
		$(this).after('<div class="temp"></div>');
		var temp = $(this).next('.temp');
		var clone = $(this).clone();
		$(this).remove();
		temp.after(clone);
		temp.remove();
	});
  }

}); 

// put all responsive functions here
function respond(){
	matchH();
}

//init bootstrap modules
$('[data-toggle="tooltip"]').tooltip();
$('[data-toggle="popover"]').popover();
	
//----------------------------------------
// DOM
//----------------------------------------


$(function(){
	cat_toggle();
	$('[data-slick]').slick();
	video_bg();
	video_responsive_wrap();
});


$(window).on('load', function(){
	$.fn.matchHeight._update();
	matchH();
});
	

var originalWindowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

$(window).on('resize', function(){
	respond();
});


$(window).on('scroll', function(){

});

} (jQuery));