$(document).ready(function(){
	$('.gform_wrapper label.gfield_label+div.ginput_container:has(select.gfield_select)').addClass('gfield_select_container');
	
	$('[data-toggle="tooltip"]').tooltip({html: true}); 
	
	$(function() {
		$('.lazy-image').lazy();
	});

	$('.owl-carousel#hero-owl-carousel').owlCarousel({loop:true,margin:0,nav:true,autoplay:true,autoplayTimeout:8000,autoplayHoverPause:true,animateOut: 'fadeOut',animateIn: 'fadeIn',responsive:{0:{items:1},600:{items:1},1000:{items:1}}});
});

function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1);
		if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
	}
	return "";
}

function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays*24*60*60*1000));
	var expires = "expires="+d.toUTCString();
	document.cookie = cname + "=" + cvalue + "; " + expires;
}

$.fn.stars = function() {
    return $(this).each(function() {
        // Get the value
        var val = parseFloat($(this).html());
		val = Math.round(val * 4) / 4;
        // Make sure that the value is in 0 - 5 range, multiply to get width
        var size = Math.max(0, (Math.min(5, val))) * 13;
        // Create stars holder
        var $span = $('<span />').width(size);
        // Replace the numerical value with stars
        $(this).html($span);
    });
}

// handle links with @href started with '#' only
$(document).on('click', 'a[href^="#"]', function(e) {
    // target element id
    var id = $(this).attr('href');

    // target element
    var $id = $(id);
    if ($id.length === 0) {
        return;
    }

    // prevent standard hash navigation (avoid blinking in IE)
    e.preventDefault();

    // top position relative to the document
    var pos = $(id).offset().top;

    // animated top scrolling
    $('body, html').animate({scrollTop: pos},2000);
});