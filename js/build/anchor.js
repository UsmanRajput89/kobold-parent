!function($){function anchorH(){$("#anchor-point").length&&(anchorHeight=anchorBarSection.length?anchorBarSection.height():0,anchorOuter.css({height:anchorHeight+"px"}))}function anchorAdj(){anchorBarH=anchorBar.outerHeight(),anchorBarCont.css({"min-height":anchorBarH+"px"}),$("#anchor-point").length&&(targetOffset=$("#anchor-point").offset().top),$("#wpadminbar").length&&(wpHeaderHeight=$("#wpadminbar").outerHeight(),targetOffset-=wpHeaderHeight),(window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth)>=768&&$("header.main-header").length&&(mainHeaderHeight=$("header.main-header").outerHeight(),targetOffset-=mainHeaderHeight)}function scrollPos(){var wpHeaderHeight,topPos=0;$("#wpadminbar").length&&(wpHeaderHeight=$("#wpadminbar").outerHeight(),topPos+=wpHeaderHeight),(window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth)>=768&&$("header.main-header").length&&(mainHeaderHeight=$("header.main-header").outerHeight(),topPos+=mainHeaderHeight),$(window).scrollTop()>targetOffset?(anchorBarSection.css({top:topPos,position:"fixed",left:0}),anchorBGCont.addClass("anchor-bg")):(anchorBarSection.css({position:"relative",top:"auto"}),anchorBGCont.removeClass("anchor-bg"))}var targetOffset,anchorBar=$(".anchor-container"),anchorOuter=$(".anchor-section"),anchorBarSection=$(".anchor-fixed-container"),anchorBGCont=$(".anchor-bg-container"),anchorBarCont=$(".content-block-anchors"),anchorHeight=0;$("#anchor-point").length&&(targetOffset=$("#anchor-point").offset().top),$('a[href*="#"]:not([data-toggle])').not('[href="#"]').not('[href="#0"]').not('[role="button"]').on("click",function(event){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")||location.hostname==this.hostname){var target=$(this.hash);if(target=target.length?target:$("[name="+this.hash.slice(1)+"]"),target.length){event.preventDefault();return(window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth)<768?$("html,body").animate({scrollTop:target.offset().top-$(".main-header").height()},700):$("html,body").animate({scrollTop:target.offset().top-anchorHeight},700),!1}}}),$(function(){anchorAdj(),anchorH()}),$(window).on("load",function(){anchorAdj()}),$(window).on("resize",function(){anchorAdj(),anchorH()}),$(window).on("scroll",function(){scrollPos(),anchorH()})}(jQuery);