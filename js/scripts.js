!function(a){a.fn.viewportChecker=function(b){var c={classToAdd:"visible",offset:100,repeat:!1,callbackFunction:function(){},scrollHorizontal:!1};a.extend(c,b);var d=this,e=c.scrollHorizontal?a(window).width():a(window).height(),f=-1!=navigator.userAgent.toLowerCase().indexOf("webkit")?"body":"html";return this.checkElements=function(){if(c.scrollHorizontal)var b=a(f).scrollLeft(),g=b+e;else var b=a(f).scrollTop(),g=b+e;d.each(function(){var d=a(this),e={},f={};if(d.data("add")&&(f.classToAdd=d.data("add")),d.data("offset")&&(f.offset=d.data("offset")),d.data("repeat")&&(f.repeat=d.data("repeat")),d.data("scrollHorizontal")&&(f.scrollHorizontal=d.data("scrollHorizontal")),a.extend(e,c),a.extend(e,f),!d.hasClass(e.classToAdd)||e.repeat){var h=e.scrollHorizontal?Math.round(d.offset().left)+e.offset:Math.round(d.offset().top)+e.offset,i=h+d.height();g>h&&i>b?(d.addClass(e.classToAdd),e.callbackFunction(d,"add")):d.hasClass(e.classToAdd)&&e.repeat&&(d.removeClass(e.classToAdd),e.callbackFunction(d,"remove"))}})},a(window).bind("load scroll touchmove",this.checkElements),a(window).resize(function(a){e=c.scrollHorizontal?a.currentTarget.innerWidth:a.currentTarget.innerHeight}),this.checkElements(),this}}(jQuery);


$(document).ready(function() {
	$('.equalheight').matchHeight();
	
	$('li').addClass("garua-hidden").viewportChecker();

});


