!function(factory){"function"==typeof define&&define.amd?define(["jquery"],factory):"object"==typeof module&&"object"==typeof module.exports?module.exports=factory(require("jquery")):factory(jQuery)}(function($){function initMouseDetection(disable){var eNS=".smartmenus_mouse";if(mouseDetectionEnabled||disable)mouseDetectionEnabled&&disable&&($(document).unbind(eNS),mouseDetectionEnabled=!1);else{var firstTime=!0,lastMove=null;$(document).bind(getEventsNS([["mousemove",function(e){var thisMove={x:e.pageX,y:e.pageY,timeStamp:(new Date).getTime()};if(lastMove){var deltaX=Math.abs(lastMove.x-thisMove.x),deltaY=Math.abs(lastMove.y-thisMove.y);if((deltaX>0||deltaY>0)&&deltaX<=2&&deltaY<=2&&thisMove.timeStamp-lastMove.timeStamp<=300&&(mouse=!0,firstTime)){var $a=$(e.target).closest("a");$a.is("a")&&$.each(menuTrees,function(){if($.contains(this.$root[0],$a[0]))return this.itemEnter({currentTarget:$a[0]}),!1}),firstTime=!1}}lastMove=thisMove}],[touchEvents?"touchstart":"pointerover pointermove pointerout MSPointerOver MSPointerMove MSPointerOut",function(e){isTouchEvent(e.originalEvent)&&(mouse=!1)}]],eNS)),mouseDetectionEnabled=!0}}function isTouchEvent(e){return!/^(4|mouse)$/.test(e.pointerType)}function getEventsNS(defArr,eNS){eNS||(eNS="");var obj={};return $.each(defArr,function(index,value){obj[value[0].split(" ").join(eNS+" ")+eNS]=value[1]}),obj}var menuTrees=[],IE=!!window.createPopup,mouse=!1,touchEvents="ontouchstart"in window,mouseDetectionEnabled=!1,requestAnimationFrame=window.requestAnimationFrame||function(callback){return setTimeout(callback,1e3/60)},cancelAnimationFrame=window.cancelAnimationFrame||function(id){clearTimeout(id)};return $.SmartMenus=function(elm,options){this.$root=$(elm),this.opts=options,this.rootId="",this.accessIdPrefix="",this.$subArrow=null,this.activatedItems=[],this.visibleSubMenus=[],this.showTimeout=0,this.hideTimeout=0,this.scrollTimeout=0,this.clickActivated=!1,this.focusActivated=!1,this.zIndexInc=0,this.idInc=0,this.$firstLink=null,this.$firstSub=null,this.disabled=!1,this.$disableOverlay=null,this.$touchScrollingSub=null,this.cssTransforms3d="perspective"in elm.style||"webkitPerspective"in elm.style,this.wasCollapsible=!1,this.init()},$.extend($.SmartMenus,{hideAll:function(){$.each(menuTrees,function(){this.menuHideAll()})},destroy:function(){for(;menuTrees.length;)menuTrees[0].destroy();initMouseDetection(!0)},prototype:{init:function(refresh){var self=this;if(!refresh){menuTrees.push(this),this.rootId=((new Date).getTime()+Math.random()+"").replace(/\D/g,""),this.accessIdPrefix="sm-"+this.rootId+"-",this.$root.hasClass("sm-rtl")&&(this.opts.rightToLeftSubMenus=!0);var eNS=".smartmenus";this.$root.data("smartmenus",this).attr("data-smartmenus-id",this.rootId).dataSM("level",1).bind(getEventsNS([["mouseover focusin",$.proxy(this.rootOver,this)],["mouseout focusout",$.proxy(this.rootOut,this)],["keydown",$.proxy(this.rootKeyDown,this)]],eNS)).delegate("a",getEventsNS([["mouseenter",$.proxy(this.itemEnter,this)],["mouseleave",$.proxy(this.itemLeave,this)],["mousedown",$.proxy(this.itemDown,this)],["focus",$.proxy(this.itemFocus,this)],["blur",$.proxy(this.itemBlur,this)],["click",$.proxy(this.itemClick,this)]],eNS)),eNS+=this.rootId,this.opts.hideOnClick&&$(document).bind(getEventsNS([["touchstart",$.proxy(this.docTouchStart,this)],["touchmove",$.proxy(this.docTouchMove,this)],["touchend",$.proxy(this.docTouchEnd,this)],["click",$.proxy(this.docClick,this)]],eNS)),$(window).bind(getEventsNS([["resize orientationchange",$.proxy(this.winResize,this)]],eNS)),this.opts.subIndicators&&(this.$subArrow=$("<span/>").addClass("sub-arrow"),this.opts.subIndicatorsText&&this.$subArrow.html(this.opts.subIndicatorsText)),initMouseDetection()}if(this.$firstSub=this.$root.find("ul").each(function(){self.menuInit($(this))}).eq(0),this.$firstLink=this.$root.find("a").eq(0),this.opts.markCurrentItem){var reDefaultDoc=/(index|default)\.[^#\?\/]*/i,reHash=/#.*/,locHref=window.location.href.replace(reDefaultDoc,""),locHrefNoHash=locHref.replace(reHash,"");this.$root.find("a").each(function(){var href=this.href.replace(reDefaultDoc,""),$this=$(this);href!=locHref&&href!=locHrefNoHash||($this.addClass("current"),self.opts.markCurrentTree&&$this.parentsUntil("[data-smartmenus-id]","ul").each(function(){$(this).dataSM("parent-a").addClass("current")}))})}this.wasCollapsible=this.isCollapsible()},destroy:function(refresh){if(!refresh){var eNS=".smartmenus";this.$root.removeData("smartmenus").removeAttr("data-smartmenus-id").removeDataSM("level").unbind(eNS).undelegate(eNS),eNS+=this.rootId,$(document).unbind(eNS),$(window).unbind(eNS),this.opts.subIndicators&&(this.$subArrow=null)}this.menuHideAll();var self=this;this.$root.find("ul").each(function(){var $this=$(this);$this.dataSM("scroll-arrows")&&$this.dataSM("scroll-arrows").remove(),$this.dataSM("shown-before")&&((self.opts.subMenusMinWidth||self.opts.subMenusMaxWidth)&&$this.css({width:"",minWidth:"",maxWidth:""}).removeClass("sm-nowrap"),$this.dataSM("scroll-arrows")&&$this.dataSM("scroll-arrows").remove(),$this.css({zIndex:"",top:"",left:"",marginLeft:"",marginTop:"",display:""})),0==($this.attr("id")||"").indexOf(self.accessIdPrefix)&&$this.removeAttr("id")}).removeDataSM("in-mega").removeDataSM("shown-before").removeDataSM("ie-shim").removeDataSM("scroll-arrows").removeDataSM("parent-a").removeDataSM("level").removeDataSM("beforefirstshowfired").removeAttr("role").removeAttr("aria-hidden").removeAttr("aria-labelledby").removeAttr("aria-expanded"),this.$root.find("a.has-submenu").each(function(){var $this=$(this);0==$this.attr("id").indexOf(self.accessIdPrefix)&&$this.removeAttr("id")}).removeClass("has-submenu").removeDataSM("sub").removeAttr("aria-haspopup").removeAttr("aria-controls").removeAttr("aria-expanded").closest("li").removeDataSM("sub"),this.opts.subIndicators&&this.$root.find("span.sub-arrow").remove(),this.opts.markCurrentItem&&this.$root.find("a.current").removeClass("current"),refresh||(this.$root=null,this.$firstLink=null,this.$firstSub=null,this.$disableOverlay&&(this.$disableOverlay.remove(),this.$disableOverlay=null),menuTrees.splice($.inArray(this,menuTrees),1))},disable:function(noOverlay){if(!this.disabled){if(this.menuHideAll(),!noOverlay&&!this.opts.isPopup&&this.$root.is(":visible")){var pos=this.$root.offset();this.$disableOverlay=$('<div class="sm-jquery-disable-overlay"/>').css({position:"absolute",top:pos.top,left:pos.left,width:this.$root.outerWidth(),height:this.$root.outerHeight(),zIndex:this.getStartZIndex(!0),opacity:0}).appendTo(document.body)}this.disabled=!0}},docClick:function(e){if(this.$touchScrollingSub)return void(this.$touchScrollingSub=null);(this.visibleSubMenus.length&&!$.contains(this.$root[0],e.target)||$(e.target).is("a"))&&this.menuHideAll()},docTouchEnd:function(e){if(this.lastTouch){if(this.visibleSubMenus.length&&(void 0===this.lastTouch.x2||this.lastTouch.x1==this.lastTouch.x2)&&(void 0===this.lastTouch.y2||this.lastTouch.y1==this.lastTouch.y2)&&(!this.lastTouch.target||!$.contains(this.$root[0],this.lastTouch.target))){this.hideTimeout&&(clearTimeout(this.hideTimeout),this.hideTimeout=0);var self=this;this.hideTimeout=setTimeout(function(){self.menuHideAll()},350)}this.lastTouch=null}},docTouchMove:function(e){if(this.lastTouch){var touchPoint=e.originalEvent.touches[0];this.lastTouch.x2=touchPoint.pageX,this.lastTouch.y2=touchPoint.pageY}},docTouchStart:function(e){var touchPoint=e.originalEvent.touches[0];this.lastTouch={x1:touchPoint.pageX,y1:touchPoint.pageY,target:touchPoint.target}},enable:function(){this.disabled&&(this.$disableOverlay&&(this.$disableOverlay.remove(),this.$disableOverlay=null),this.disabled=!1)},getClosestMenu:function(elm){for(var $closestMenu=$(elm).closest("ul");$closestMenu.dataSM("in-mega");)$closestMenu=$closestMenu.parent().closest("ul");return $closestMenu[0]||null},getHeight:function($elm){return this.getOffset($elm,!0)},getOffset:function($elm,height){var old;"none"==$elm.css("display")&&(old={position:$elm[0].style.position,visibility:$elm[0].style.visibility},$elm.css({position:"absolute",visibility:"hidden"}).show());var box=$elm[0].getBoundingClientRect&&$elm[0].getBoundingClientRect(),val=box&&(height?box.height||box.bottom-box.top:box.width||box.right-box.left);return val||0===val||(val=height?$elm[0].offsetHeight:$elm[0].offsetWidth),old&&$elm.hide().css(old),val},getStartZIndex:function(root){var zIndex=parseInt(this[root?"$root":"$firstSub"].css("z-index"));return!root&&isNaN(zIndex)&&(zIndex=parseInt(this.$root.css("z-index"))),isNaN(zIndex)?1:zIndex},getTouchPoint:function(e){return e.touches&&e.touches[0]||e.changedTouches&&e.changedTouches[0]||e},getViewport:function(height){var name=height?"Height":"Width",val=document.documentElement["client"+name],val2=window["inner"+name];return val2&&(val=Math.min(val,val2)),val},getViewportHeight:function(){return this.getViewport(!0)},getViewportWidth:function(){return this.getViewport()},getWidth:function($elm){return this.getOffset($elm)},handleEvents:function(){return!this.disabled&&this.isCSSOn()},handleItemEvents:function($a){return this.handleEvents()&&!this.isLinkInMegaMenu($a)},isCollapsible:function(){return"static"==this.$firstSub.css("position")},isCSSOn:function(){return"block"==this.$firstLink.css("display")},isFixed:function(){var isFixed="fixed"==this.$root.css("position");return isFixed||this.$root.parentsUntil("body").each(function(){if("fixed"==$(this).css("position"))return isFixed=!0,!1}),isFixed},isLinkInMegaMenu:function($a){return $(this.getClosestMenu($a[0])).hasClass("mega-menu")},isTouchMode:function(){return!mouse||this.opts.noMouseOver||this.isCollapsible()},itemActivate:function($a,focus){var $ul=$a.closest("ul"),level=$ul.dataSM("level");if(level>1&&(!this.activatedItems[level-2]||this.activatedItems[level-2][0]!=$ul.dataSM("parent-a")[0])){var self=this;$($ul.parentsUntil("[data-smartmenus-id]","ul").get().reverse()).add($ul).each(function(){self.itemActivate($(this).dataSM("parent-a"))})}if(this.isCollapsible()&&!focus||this.menuHideSubMenus(this.activatedItems[level-1]&&this.activatedItems[level-1][0]==$a[0]?level:level-1),this.activatedItems[level-1]=$a,!1!==this.$root.triggerHandler("activate.smapi",$a[0])){var $sub=$a.dataSM("sub");$sub&&(this.isTouchMode()||!this.opts.showOnClick||this.clickActivated)&&this.menuShow($sub)}},itemBlur:function(e){var $a=$(e.currentTarget);this.handleItemEvents($a)&&this.$root.triggerHandler("blur.smapi",$a[0])},itemClick:function(e){var $a=$(e.currentTarget);if(this.handleItemEvents($a)){if(this.$touchScrollingSub&&this.$touchScrollingSub[0]==$a.closest("ul")[0])return this.$touchScrollingSub=null,e.stopPropagation(),!1;if(!1===this.$root.triggerHandler("click.smapi",$a[0]))return!1;var subArrowClicked=$(e.target).is("span.sub-arrow"),$sub=$a.dataSM("sub"),firstLevelSub=!!$sub&&2==$sub.dataSM("level");if($sub&&!$sub.is(":visible")){if(this.opts.showOnClick&&firstLevelSub&&(this.clickActivated=!0),this.itemActivate($a),$sub.is(":visible"))return this.focusActivated=!0,!1}else if(this.isCollapsible()&&subArrowClicked)return this.itemActivate($a),this.menuHide($sub),!1;return!(this.opts.showOnClick&&firstLevelSub||$a.hasClass("disabled")||!1===this.$root.triggerHandler("select.smapi",$a[0]))&&void 0}},itemDown:function(e){var $a=$(e.currentTarget);this.handleItemEvents($a)&&$a.dataSM("mousedown",!0)},itemEnter:function(e){var $a=$(e.currentTarget);if(this.handleItemEvents($a)){if(!this.isTouchMode()){this.showTimeout&&(clearTimeout(this.showTimeout),this.showTimeout=0);var self=this;this.showTimeout=setTimeout(function(){self.itemActivate($a)},this.opts.showOnClick&&1==$a.closest("ul").dataSM("level")?1:this.opts.showTimeout)}this.$root.triggerHandler("mouseenter.smapi",$a[0])}},itemFocus:function(e){var $a=$(e.currentTarget);this.handleItemEvents($a)&&(!this.focusActivated||this.isTouchMode()&&$a.dataSM("mousedown")||this.activatedItems.length&&this.activatedItems[this.activatedItems.length-1][0]==$a[0]||this.itemActivate($a,!0),this.$root.triggerHandler("focus.smapi",$a[0]))},itemLeave:function(e){var $a=$(e.currentTarget);this.handleItemEvents($a)&&(this.isTouchMode()||($a[0].blur(),this.showTimeout&&(clearTimeout(this.showTimeout),this.showTimeout=0)),$a.removeDataSM("mousedown"),this.$root.triggerHandler("mouseleave.smapi",$a[0]))},menuHide:function($sub){if(!1!==this.$root.triggerHandler("beforehide.smapi",$sub[0])&&($sub.stop(!0,!0),"none"!=$sub.css("display"))){var complete=function(){$sub.css("z-index","")};this.isCollapsible()?this.opts.collapsibleHideFunction?this.opts.collapsibleHideFunction.call(this,$sub,complete):$sub.hide(this.opts.collapsibleHideDuration,complete):this.opts.hideFunction?this.opts.hideFunction.call(this,$sub,complete):$sub.hide(this.opts.hideDuration,complete),$sub.dataSM("ie-shim")&&$sub.dataSM("ie-shim").remove().css({"-webkit-transform":"",transform:""}),$sub.dataSM("scroll")&&(this.menuScrollStop($sub),$sub.css({"touch-action":"","-ms-touch-action":"","-webkit-transform":"",transform:""}).unbind(".smartmenus_scroll").removeDataSM("scroll").dataSM("scroll-arrows").hide()),$sub.dataSM("parent-a").removeClass("highlighted").attr("aria-expanded","false"),$sub.attr({"aria-expanded":"false","aria-hidden":"true"});var level=$sub.dataSM("level");this.activatedItems.splice(level-1,1),this.visibleSubMenus.splice($.inArray($sub,this.visibleSubMenus),1),this.$root.triggerHandler("hide.smapi",$sub[0])}},menuHideAll:function(){this.showTimeout&&(clearTimeout(this.showTimeout),this.showTimeout=0);for(var level=this.opts.isPopup?1:0,i=this.visibleSubMenus.length-1;i>=level;i--)this.menuHide(this.visibleSubMenus[i]);this.opts.isPopup&&(this.$root.stop(!0,!0),this.$root.is(":visible")&&(this.opts.hideFunction?this.opts.hideFunction.call(this,this.$root):this.$root.hide(this.opts.hideDuration),this.$root.dataSM("ie-shim")&&this.$root.dataSM("ie-shim").remove())),this.activatedItems=[],this.visibleSubMenus=[],this.clickActivated=!1,this.focusActivated=!1,this.zIndexInc=0,this.$root.triggerHandler("hideAll.smapi")},menuHideSubMenus:function(level){for(var i=this.activatedItems.length-1;i>=level;i--){var $sub=this.activatedItems[i].dataSM("sub");$sub&&this.menuHide($sub)}},menuIframeShim:function($ul){IE&&this.opts.overlapControlsInIE&&!$ul.dataSM("ie-shim")&&$ul.dataSM("ie-shim",$("<iframe/>").attr({src:"javascript:0",tabindex:-9}).css({position:"absolute",top:"auto",left:"0",opacity:0,border:"0"}))},menuInit:function($ul){if(!$ul.dataSM("in-mega")){$ul.hasClass("mega-menu")&&$ul.find("ul").dataSM("in-mega",!0);for(var level=2,par=$ul[0];(par=par.parentNode.parentNode)!=this.$root[0];)level++;var $a=$ul.prevAll("a").eq(-1);$a.length||($a=$ul.prevAll().find("a").eq(-1)),$a.addClass("has-submenu").dataSM("sub",$ul),$ul.dataSM("parent-a",$a).dataSM("level",level).parent().dataSM("sub",$ul);var aId=$a.attr("id")||this.accessIdPrefix+ ++this.idInc,ulId=$ul.attr("id")||this.accessIdPrefix+ ++this.idInc;$a.attr({id:aId,"aria-haspopup":"true","aria-controls":ulId,"aria-expanded":"false"}),$ul.attr({id:ulId,role:"group","aria-hidden":"true","aria-labelledby":aId,"aria-expanded":"false"}),this.opts.subIndicators&&$a[this.opts.subIndicatorsPos](this.$subArrow.clone())}},menuPosition:function($sub){var x,y,$a=$sub.dataSM("parent-a"),$li=$a.closest("li"),$ul=$li.parent(),level=$sub.dataSM("level"),subW=this.getWidth($sub),subH=this.getHeight($sub),itemOffset=$a.offset(),itemX=itemOffset.left,itemY=itemOffset.top,itemW=this.getWidth($a),itemH=this.getHeight($a),$win=$(window),winX=$win.scrollLeft(),winY=$win.scrollTop(),winW=this.getViewportWidth(),winH=this.getViewportHeight(),horizontalParent=$ul.parent().is("[data-sm-horizontal-sub]")||2==level&&!$ul.hasClass("sm-vertical"),rightToLeft=this.opts.rightToLeftSubMenus&&!$li.is("[data-sm-reverse]")||!this.opts.rightToLeftSubMenus&&$li.is("[data-sm-reverse]"),subOffsetX=2==level?this.opts.mainMenuSubOffsetX:this.opts.subMenusSubOffsetX,subOffsetY=2==level?this.opts.mainMenuSubOffsetY:this.opts.subMenusSubOffsetY;if(horizontalParent?(x=rightToLeft?itemW-subW-subOffsetX:subOffsetX,y=this.opts.bottomToTopSubMenus?-subH-subOffsetY:itemH+subOffsetY):(x=rightToLeft?subOffsetX-subW:itemW-subOffsetX,y=this.opts.bottomToTopSubMenus?itemH-subOffsetY-subH:subOffsetY),this.opts.keepInViewport){var absX=itemX+x,absY=itemY+y;if(rightToLeft&&absX<winX?x=horizontalParent?winX-absX+x:itemW-subOffsetX:!rightToLeft&&absX+subW>winX+winW&&(x=horizontalParent?winX+winW-subW-absX+x:subOffsetX-subW),horizontalParent||(subH<winH&&absY+subH>winY+winH?y+=winY+winH-subH-absY:(subH>=winH||absY<winY)&&(y+=winY-absY)),horizontalParent&&(absY+subH>winY+winH+.49||absY<winY)||!horizontalParent&&subH>winH+.49){var self=this;$sub.dataSM("scroll-arrows")||$sub.dataSM("scroll-arrows",$([$('<span class="scroll-up"><span class="scroll-up-arrow"></span></span>')[0],$('<span class="scroll-down"><span class="scroll-down-arrow"></span></span>')[0]]).bind({mouseenter:function(){$sub.dataSM("scroll").up=$(this).hasClass("scroll-up"),self.menuScroll($sub)},mouseleave:function(e){self.menuScrollStop($sub),self.menuScrollOut($sub,e)},"mousewheel DOMMouseScroll":function(e){e.preventDefault()}}).insertAfter($sub));var eNS=".smartmenus_scroll";$sub.dataSM("scroll",{y:this.cssTransforms3d?0:y-itemH,step:1,itemH:itemH,subH:subH,arrowDownH:this.getHeight($sub.dataSM("scroll-arrows").eq(1))}).bind(getEventsNS([["mouseover",function(e){self.menuScrollOver($sub,e)}],["mouseout",function(e){self.menuScrollOut($sub,e)}],["mousewheel DOMMouseScroll",function(e){self.menuScrollMousewheel($sub,e)}]],eNS)).dataSM("scroll-arrows").css({top:"auto",left:"0",marginLeft:x+(parseInt($sub.css("border-left-width"))||0),width:subW-(parseInt($sub.css("border-left-width"))||0)-(parseInt($sub.css("border-right-width"))||0),zIndex:$sub.css("z-index")}).eq(horizontalParent&&this.opts.bottomToTopSubMenus?0:1).show(),this.isFixed()&&$sub.css({"touch-action":"none","-ms-touch-action":"none"}).bind(getEventsNS([[touchEvents?"touchstart touchmove touchend":"pointerdown pointermove pointerup MSPointerDown MSPointerMove MSPointerUp",function(e){self.menuScrollTouch($sub,e)}]],eNS))}}$sub.css({top:"auto",left:"0",marginLeft:x,marginTop:y-itemH}),this.menuIframeShim($sub),$sub.dataSM("ie-shim")&&$sub.dataSM("ie-shim").css({zIndex:$sub.css("z-index"),width:subW,height:subH,marginLeft:x,marginTop:y-itemH})},menuScroll:function($sub,once,step){var diff,data=$sub.dataSM("scroll"),$arrows=$sub.dataSM("scroll-arrows"),end=data.up?data.upEnd:data.downEnd;if(!once&&data.momentum){if(data.momentum*=.92,(diff=data.momentum)<.5)return void this.menuScrollStop($sub)}else diff=step||(once||!this.opts.scrollAccelerate?this.opts.scrollStep:Math.floor(data.step));var level=$sub.dataSM("level");if(this.activatedItems[level-1]&&this.activatedItems[level-1].dataSM("sub")&&this.activatedItems[level-1].dataSM("sub").is(":visible")&&this.menuHideSubMenus(level-1),data.y=data.up&&end<=data.y||!data.up&&end>=data.y?data.y:Math.abs(end-data.y)>diff?data.y+(data.up?diff:-diff):end,$sub.add($sub.dataSM("ie-shim")).css(this.cssTransforms3d?{"-webkit-transform":"translate3d(0, "+data.y+"px, 0)",transform:"translate3d(0, "+data.y+"px, 0)"}:{marginTop:data.y}),mouse&&(data.up&&data.y>data.downEnd||!data.up&&data.y<data.upEnd)&&$arrows.eq(data.up?1:0).show(),data.y==end)mouse&&$arrows.eq(data.up?0:1).hide(),this.menuScrollStop($sub);else if(!once){this.opts.scrollAccelerate&&data.step<this.opts.scrollStep&&(data.step+=.2);var self=this;this.scrollTimeout=requestAnimationFrame(function(){self.menuScroll($sub)})}},menuScrollMousewheel:function($sub,e){if(this.getClosestMenu(e.target)==$sub[0]){e=e.originalEvent;var up=(e.wheelDelta||-e.detail)>0;$sub.dataSM("scroll-arrows").eq(up?0:1).is(":visible")&&($sub.dataSM("scroll").up=up,this.menuScroll($sub,!0))}e.preventDefault()},menuScrollOut:function($sub,e){mouse&&(/^scroll-(up|down)/.test((e.relatedTarget||"").className)||($sub[0]==e.relatedTarget||$.contains($sub[0],e.relatedTarget))&&this.getClosestMenu(e.relatedTarget)==$sub[0]||$sub.dataSM("scroll-arrows").css("visibility","hidden"))},menuScrollOver:function($sub,e){if(mouse&&!/^scroll-(up|down)/.test(e.target.className)&&this.getClosestMenu(e.target)==$sub[0]){this.menuScrollRefreshData($sub);var data=$sub.dataSM("scroll"),upEnd=$(window).scrollTop()-$sub.dataSM("parent-a").offset().top-data.itemH;$sub.dataSM("scroll-arrows").eq(0).css("margin-top",upEnd).end().eq(1).css("margin-top",upEnd+this.getViewportHeight()-data.arrowDownH).end().css("visibility","visible")}},menuScrollRefreshData:function($sub){var data=$sub.dataSM("scroll"),upEnd=$(window).scrollTop()-$sub.dataSM("parent-a").offset().top-data.itemH;this.cssTransforms3d&&(upEnd=-(parseFloat($sub.css("margin-top"))-upEnd)),$.extend(data,{upEnd:upEnd,downEnd:upEnd+this.getViewportHeight()-data.subH})},menuScrollStop:function($sub){if(this.scrollTimeout)return cancelAnimationFrame(this.scrollTimeout),this.scrollTimeout=0,$sub.dataSM("scroll").step=1,!0},menuScrollTouch:function($sub,e){if(e=e.originalEvent,isTouchEvent(e)){var touchPoint=this.getTouchPoint(e);if(this.getClosestMenu(touchPoint.target)==$sub[0]){var data=$sub.dataSM("scroll");if(/(start|down)$/i.test(e.type))this.menuScrollStop($sub)?(e.preventDefault(),this.$touchScrollingSub=$sub):this.$touchScrollingSub=null,this.menuScrollRefreshData($sub),$.extend(data,{touchStartY:touchPoint.pageY,touchStartTime:e.timeStamp});else if(/move$/i.test(e.type)){var prevY=void 0!==data.touchY?data.touchY:data.touchStartY;if(void 0!==prevY&&prevY!=touchPoint.pageY){this.$touchScrollingSub=$sub;var up=prevY<touchPoint.pageY;void 0!==data.up&&data.up!=up&&$.extend(data,{touchStartY:touchPoint.pageY,touchStartTime:e.timeStamp}),$.extend(data,{up:up,touchY:touchPoint.pageY}),this.menuScroll($sub,!0,Math.abs(touchPoint.pageY-prevY))}e.preventDefault()}else void 0!==data.touchY&&((data.momentum=15*Math.pow(Math.abs(touchPoint.pageY-data.touchStartY)/(e.timeStamp-data.touchStartTime),2))&&(this.menuScrollStop($sub),this.menuScroll($sub),e.preventDefault()),delete data.touchY)}}},menuShow:function($sub){if(($sub.dataSM("beforefirstshowfired")||($sub.dataSM("beforefirstshowfired",!0),!1!==this.$root.triggerHandler("beforefirstshow.smapi",$sub[0])))&&!1!==this.$root.triggerHandler("beforeshow.smapi",$sub[0])&&($sub.dataSM("shown-before",!0).stop(!0,!0),!$sub.is(":visible"))){var $a=$sub.dataSM("parent-a");if((this.opts.keepHighlighted||this.isCollapsible())&&$a.addClass("highlighted"),this.isCollapsible())$sub.removeClass("sm-nowrap").css({zIndex:"",width:"auto",minWidth:"",maxWidth:"",top:"",left:"",marginLeft:"",marginTop:""});else{if($sub.css("z-index",this.zIndexInc=(this.zIndexInc||this.getStartZIndex())+1),(this.opts.subMenusMinWidth||this.opts.subMenusMaxWidth)&&($sub.css({width:"auto",minWidth:"",maxWidth:""}).addClass("sm-nowrap"),this.opts.subMenusMinWidth&&$sub.css("min-width",this.opts.subMenusMinWidth),this.opts.subMenusMaxWidth)){var noMaxWidth=this.getWidth($sub);$sub.css("max-width",this.opts.subMenusMaxWidth),noMaxWidth>this.getWidth($sub)&&$sub.removeClass("sm-nowrap").css("width",this.opts.subMenusMaxWidth)}this.menuPosition($sub),$sub.dataSM("ie-shim")&&$sub.dataSM("ie-shim").insertBefore($sub)}var complete=function(){$sub.css("overflow","")};this.isCollapsible()?this.opts.collapsibleShowFunction?this.opts.collapsibleShowFunction.call(this,$sub,complete):$sub.show(this.opts.collapsibleShowDuration,complete):this.opts.showFunction?this.opts.showFunction.call(this,$sub,complete):$sub.show(this.opts.showDuration,complete),$a.attr("aria-expanded","true"),$sub.attr({"aria-expanded":"true","aria-hidden":"false"}),this.visibleSubMenus.push($sub),this.$root.triggerHandler("show.smapi",$sub[0])}},popupHide:function(noHideTimeout){this.hideTimeout&&(clearTimeout(this.hideTimeout),this.hideTimeout=0);var self=this;this.hideTimeout=setTimeout(function(){self.menuHideAll()},noHideTimeout?1:this.opts.hideTimeout)},popupShow:function(left,top){if(!this.opts.isPopup)return void alert('SmartMenus jQuery Error:\n\nIf you want to show this menu via the "popupShow" method, set the isPopup:true option.');if(this.hideTimeout&&(clearTimeout(this.hideTimeout),this.hideTimeout=0),this.$root.dataSM("shown-before",!0).stop(!0,!0),!this.$root.is(":visible")){this.$root.css({left:left,top:top}),this.menuIframeShim(this.$root),this.$root.dataSM("ie-shim")&&this.$root.dataSM("ie-shim").css({zIndex:this.$root.css("z-index"),width:this.getWidth(this.$root),height:this.getHeight(this.$root),left:left,top:top}).insertBefore(this.$root);var self=this,complete=function(){self.$root.css("overflow","")};this.opts.showFunction?this.opts.showFunction.call(this,this.$root,complete):this.$root.show(this.opts.showDuration,complete),this.visibleSubMenus[0]=this.$root}},refresh:function(){this.destroy(!0),this.init(!0)},rootKeyDown:function(e){if(this.handleEvents())switch(e.keyCode){case 27:var $activeTopItem=this.activatedItems[0];if($activeTopItem){this.menuHideAll(),$activeTopItem[0].focus();var $sub=$activeTopItem.dataSM("sub");$sub&&this.menuHide($sub)}break;case 32:var $target=$(e.target);if($target.is("a")&&this.handleItemEvents($target)){var $sub=$target.dataSM("sub");$sub&&!$sub.is(":visible")&&(this.itemClick({currentTarget:e.target}),e.preventDefault())}}},rootOut:function(e){if(this.handleEvents()&&!this.isTouchMode()&&e.target!=this.$root[0]&&(this.hideTimeout&&(clearTimeout(this.hideTimeout),this.hideTimeout=0),!this.opts.showOnClick||!this.opts.hideOnClick)){var self=this;this.hideTimeout=setTimeout(function(){self.menuHideAll()},this.opts.hideTimeout)}},rootOver:function(e){this.handleEvents()&&!this.isTouchMode()&&e.target!=this.$root[0]&&this.hideTimeout&&(clearTimeout(this.hideTimeout),this.hideTimeout=0)},winResize:function(e){if(this.handleEvents()){if(!("onorientationchange"in window)||"orientationchange"==e.type){var isCollapsible=this.isCollapsible();this.wasCollapsible&&isCollapsible||(this.activatedItems.length&&this.activatedItems[this.activatedItems.length-1][0].blur(),this.menuHideAll()),this.wasCollapsible=isCollapsible}}else if(this.$disableOverlay){var pos=this.$root.offset();this.$disableOverlay.css({top:pos.top,left:pos.left,width:this.$root.outerWidth(),height:this.$root.outerHeight()})}}}}),$.fn.dataSM=function(key,val){return val?this.data(key+"_smartmenus",val):this.data(key+"_smartmenus")},$.fn.removeDataSM=function(key){return this.removeData(key+"_smartmenus")},$.fn.smartmenus=function(options){if("string"==typeof options){var args=arguments,method=options;return Array.prototype.shift.call(args),this.each(function(){var smartmenus=$(this).data("smartmenus");smartmenus&&smartmenus[method]&&smartmenus[method].apply(smartmenus,args)})}var opts=$.extend({},$.fn.smartmenus.defaults,options);return this.each(function(){new $.SmartMenus(this,opts)})},$.fn.smartmenus.defaults={isPopup:!1,mainMenuSubOffsetX:0,mainMenuSubOffsetY:0,subMenusSubOffsetX:0,subMenusSubOffsetY:0,subMenusMinWidth:"10em",subMenusMaxWidth:"20em",subIndicators:!0,subIndicatorsPos:"prepend",subIndicatorsText:"+",scrollStep:30,scrollAccelerate:!0,showTimeout:0,hideTimeout:0,showDuration:150,showFunction:function($ul,complete){$ul.fadeIn(145,complete)},hideDuration:150,hideFunction:function($ul,complete){$ul.fadeOut(145,complete)},collapsibleShowDuration:0,collapsibleShowFunction:function($ul,complete){$ul.slideDown(200,complete)},collapsibleHideDuration:0,collapsibleHideFunction:function($ul,complete){$ul.slideUp(200,complete)},showOnClick:!1,hideOnClick:!0,noMouseOver:!1,keepInViewport:!0,keepHighlighted:!0,markCurrentItem:!1,markCurrentTree:!0,rightToLeftSubMenus:!1,bottomToTopSubMenus:!1,overlapControlsInIE:!0},$});