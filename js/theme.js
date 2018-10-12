jQuery(document).ready(function($) {
	'use strict';

	// Page Loading
	NProgress.start();
	NProgress.set(0.5);
	(function($){  
		$(window).load(function(){
			NProgress.done();
			$('.pageload-mask').addClass('inactive');
		})
	})(jQuery);
	
	// Search
	$('.header-top .search-button').click(function(e){
		e.preventDefault();
		$('.search-box').toggleClass('active');
		if($('.search-box').hasClass('active')) {
			$('.search-box input').focus();
		}
	});
	$('.search-box .close-button').click(function(e){
		e.preventDefault();
		$('.search-box').removeClass('active');
	});

	// Message Mask
	$('.message-mask i').click(function(e){
		e.preventDefault();
		$(this).parents('.message-mask').addClass('inactive');
	});

	// Sticky
	$('.header-wrap.sticky-on').sticky({topSpacing:$('.header-top').outerHeight()*-1});

	// Match Height
	$('.card, .mega-menu > .sub-menu > li').matchHeight(true);

	// Swipe Box
	$('.swipebox').swipebox();

	// Wrap Input Submit
	$('input[type="submit"].lt-button').wrap('<span class="lt-button-wrap"></span>');

	// Property Compare
	$('.property-compare-form select').change(function(e){
		$(this).parents('form').submit();
	});

	// DSIDX
	$('.dsidx-widget select, .dsidx-sorting-control select').addClass('select-box');
	$('.dsidx-controls a').click(function(e){
		e.preventDefault();
		$(this).siblings('a').removeClass('active');
		$(this).addClass('active');
	});	

	// Mobile
	$('header .menu-toggle').click(function(e){
		$('.layout-wrap').toggleClass('mobile-menu-active');
		$(this).toggleClass('active');
	});
	$('.mobile-menu li.menu-item-has-children > a').append('<i class="toggle flaticon-angle1"></i>');
	$('.mobile-menu li i.toggle').click(function(e){
		e.preventDefault();
		$(this).parents('a').siblings('ul').toggle();
	});

	// Image Upload
	$('.upload-img .remove-bt').click(function(e){
		e.preventDefault();
		$(this).parents('.upload-img').remove();
	});
	$('.repeat-field-bt').click(function(e){
		e.preventDefault();
		$(this).siblings('.clone').before($(this).siblings('.clone').clone().show().removeClass('clone'));
	});

	// Location Picker
	$('.location-picker').each(function(){
		$(this).locationpicker({
			location: {latitude: $(this).data('latitude'), longitude: $(this).data('longitude')},
			scrollwheel: false,
			enableAutocomplete: true,
			radius: 0,
			inputBinding: {
		    	latitudeInput: $(this).parent().find('.latitude'),
		    	longitudeInput: $(this).parent().find('.longitude'),
		    	radiusInput: null,
		    	locationNameInput: $(this).parent().find('.location')
		    },
		});
	});

	// Wish List
	$('.add-wish-list').click(function(e){
		e.preventDefault();
		var current = $(this);
		var data = {
			action: 'do_favourite',
			params: $(this).data()
		};
		$.post(ajaxurl, data, function(response) {
		    if('ok' == response.result){
		    	$(current).toggleClass('active');
		    }
		}, 'json');
	});

	// Numberic
	$('.numeric').numeric();

	// Select Box
	$('.select-box').selectBox({
		mobile: true
	});
	$('.selectBox-arrow').append('<i class="flaticon-angle1"></i>');

	// Range Slider
	var inputFormat = wNumb({
		decimals: 0
	});
	var viewFormat = wNumb({
		decimals: 0,
		thousand: ','
	});
	var defaults = {
		start: [ 0, 9999999],
		range: {
			'min': 0,
			'max': 100
		},
		connect: true
	};
	$('.rangeSlider').each(function(){
		var options = $.extend({}, defaults, $(this).data());
		if($(this).data('min') >= 0) options['range']['min'] = $(this).data('min');
		if($(this).data('max') >= 0) options['range']['max'] = $(this).data('max');
		if($(this).data('cmin') >= 0) options['start'][0] = $(this).data('cmin');
		if($(this).data('cmax') >= 0) options['start'][1] = $(this).data('cmax');
		$(this).noUiSlider(options);
		$(this).Link('lower').to($(this).siblings('.lower'), null, inputFormat);
		$(this).Link('upper').to($(this).siblings('.upper'), null, inputFormat);
		$(this).Link('lower').to($(this).siblings('label').find('.lower span'), null, viewFormat);
		$(this).Link('upper').to($(this).siblings('label').find('.upper span'), null, viewFormat);
	});

	// Primary Nav Left & Right
	if ($('#primary-nav-left').length && $('#primary-nav-right').length) {
		if($('#primary-nav-left').width() < $('#primary-nav-right').width()) {
			$('#primary-nav-left').width($('#primary-nav-right').width());
		} else {
			$('#primary-nav-right').width($('#primary-nav-left').width());
		}
	}
	

	// Mega menu position
	$('.header-main .primary-nav li.mega-menu > ul').each(function(){
		var parentOffset = $(this).parents('li.mega-menu').offset();
		var parentWidth = $(this).parents('li.mega-menu').outerWidth();
		var containerOffset = $(this).parents('.columns').offset();
		var containerWidth = $(this).parents('.columns').width();
		var containerPadding = parseInt($(this).parents('.columns').css('padding-left').replace('px', ''));
		var dif = (parentOffset.left+parentWidth)-(containerOffset.left+containerPadding+containerWidth);
		$(this).css('right', Math.round(dif)+'px');
	});

	// 3rd level menu position
	$('.primary-nav > ul > li').mouseover(function(){
		$('.sub-menu .sub-menu', $(this)).each(function(){
			$(this).css('left', $(this).parents('.sub-menu').outerWidth()-2);
		});
	});

	// NAV
	$('#primary-nav .bt-menu-trigger').click(function(e){
		e.preventDefault();
		if($(this).hasClass('bt-menu-open')) {
			$(this).removeClass('bt-menu-open');
			$('#primary-nav').removeClass('active');
			$('#primary-nav ul.menu').slideUp('fast');
		} else {
			$(this).addClass('bt-menu-open');
			$('#primary-nav').addClass('active');
			$('#primary-nav ul.menu').slideDown('fast');
		}
	});

	// Form
	$('.validate-form').each(function(){
		if( $(this).is('form') ) {
			var curForm = $(this);
		} else {
			var curForm = $('form', $(this));
		}
		$(curForm).validate({
			errorPlacement: function(error, element) {
				if( !$('.form-response label', curForm).is(':visible') ){
					$('.form-response', curForm).html(error).fadeIn();
				}
			}
		});
	});

	// Modal
	$('.modal-link').click(function(e){
		e.preventDefault();
		$('.modal-mask').addClass('active');
		$('.modal-mask').find('.'+$(this).data('modal')).addClass('active');
		$('.modal-mask').find('.'+$(this).data('modal')).find('.tab-list li:first-child a').trigger('click');
	});
	$('.modal-mask .close-bt').click(function(e){
		e.preventDefault();
		$(this).parents('.modal-mask').removeClass('active');
		$(this).parents('.modal').removeClass('active');
	});

	// Carousel
	var defaults = {
			navigationText: ['<i class="nt-icon-angle-left"></i>','<i class="nt-icon-angle-right"></i>']
		};
	imagesLoaded( $('.carousel'), function( instance ) {
	  	$('.carousel').each(function(){
			var options = $.extend({}, defaults, $(this).data());
			options.responsive = {
				0: {items:$(this).data('s-items')},
				640: {items:$(this).data('m-items')},
				1025: {items:$(this).data('items')}
			}

			if(options.loop && $(this).children().length == 1) {
				options.loop = false;
			}

			$(this).owlCarousel(options);
			if($(this).data('link')) {
				$(this).on('changed.owl.carousel', function(event){
					var index = event.item.index;
					if(options.loop) index = (index - 2) % event.item.count;
					$($(this).data('link')).trigger('to.owl.carousel', [index, null, true]);
				});
			}
		});

	  	$('.carousel').on('changed.owl.carousel', function(event){
	  		if($(this).siblings('.thumbnail-carousel').length){
	  			console.log(event.item.index);
	  			$(this).siblings('.thumbnail-carousel').find('.owl-item').eq(event.item.index).trigger('click');
	  		}
	  	});
	  	$('.thumbnail-carousel .owl-item:first-child').addClass('colored');
		$('.thumbnail-carousel .owl-item').click(function(){
			var index = $(this).index();
			$(this).parents('.thumbnail-carousel').trigger('to.owl.carousel', [index-1, null, true]);
			$(this).parents('.thumbnail-carousel').siblings('.carousel').trigger('to.owl.carousel', [index, null, true]);
			$(this).addClass('colored');
			$(this).siblings('.colored').removeClass('colored');
		});
	});
	

	

	// Accordion
	$('.wpb_accordion').each(function(){
		if($(this).data('active-tab')) {
			$('.wpb_accordion_section:eq('+($(this).data('active-tab')-1)+')', $(this)).addClass('active');
		}
	});
	$('.wpb_accordion_header').click(function(){
		if($(this).parents('.wpb_accordion_section').hasClass('active')) {
			if($(this).parents('.wpb_accordion').data('collapsible') == 'no' && $(this).parents('.wpb_accordion').find('.wpb_accordion_section.active').length <= 1)
				return;

			$(this).parents('.wpb_accordion_section').removeClass('active');
			$(this).parents('.wpb_accordion_section').find('.wpb_accordion_content').slideUp(250);
		} else {
			$(this).parents('.wpb_accordion').find('.wpb_accordion_section.active').removeClass('active');

			$(this).parents('.wpb_accordion_section').addClass('active');
			$(this).parents('.wpb_accordion_section').find('.wpb_accordion_content').slideDown(250);
		}
	});
	// Tab
	$('.wpb_tabs').each(function(){
		$('.wpb_tab', $(this)).first().addClass('active');
		$('.wpb_tabs_nav li:first-child').addClass('active');
	});
	$('.wpb_tabs_nav li').click(function(e){
		e.preventDefault();
		if(!$(this).hasClass('active')) {
			var index = $(this).index();
			$(this).addClass('active');
			$(this).siblings('li.active').removeClass('active');
			$('.wpb_tab', $(this).parents('.wpb_tabs')).removeClass('active');
			$('.wpb_tab:eq('+index+')', $(this).parents('.wpb_tabs')).addClass('active');
		}
	});
	$('.tab-list a').click(function(e){
		e.preventDefault();
		$(this).parents('.tab-list').find('li').removeClass('active');
		$(this).parents('li').addClass('active');
		$(this).parents('.tab-list').siblings('.pane').removeClass('active');
		$(this).parents('.tab-list').siblings('.pane.'+$(this).data('pane')).addClass('active');
	});

	// Transition Animate
	$('.wpb_animate_when_almost_visible').one('inview', function(){
		var delay = 150+(600*$(this).prevAll('.wpb_animate_when_almost_visible').length);
		// $(this).addClass('animate-active');
		$(this).delay(delay).queue(function(){
		    // $(this).removeClass("error").dequeue();
		    $(this).addClass('animate-active').dequeue();
		});
	});

	// Animate Number
	$('.animate-number').html('0');
	var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',');
	$('.animate-number').one('inview', function() {
		var start = $(this).data('to')-100;
		if(start<0) start = 0;
		$(this).prop('number', start).animateNumber({
			number: $(this).data('to'),
    		numberStep: comma_separator_number_step,
    		easing: 'easeOutQuad'
		}, 1000);
	});

	// Toggle
	$('.wpb_toggle').click(function(e){
		e.preventDefault();
		$(this).toggleClass('active');
		$(this).next('.wpb_toggle_content').toggleClass('active');
	});

	// Trigger Form
	$('.property-view-form select').change(function(e){
		window.location.href = $(this).val();
	});
	
	// Map
	var maps = [];
	$('.map-wrap').each(function() {
		$(this).attr('id', 'map-'+Math.floor(Math.random() * 100));
		var markers = $(this).children();
		var latlng = new google.maps.LatLng(-34.397, 150.644);
		var defaults = {
			center: latlng,
			zoomControl : true,
			scaleControl: false,
			streetViewControl: false,
			panControl : false,
			mapTypeControl: false,
			overviewMapControl: false,
			scrollwheel: false,
			zoom: 5,
			zoomControlOptions: {
		        style: google.maps.ZoomControlStyle.SMALL
			}
		};
		var options = $.extend({}, defaults, $(this).data());
		var map = new google.maps.Map($(this).get(0), options);
		maps[$(this).attr('id')] = map;
		google.maps.event.addListener( map, 'idle', function(){
	        $('.gm-style').removeClass('gm-style');
	    });

		// Marker
		var mks = [];
		var latlngbounds = new google.maps.LatLngBounds();
		for (var i = 0; i < markers.length; i++) {
			var marker_data = $(markers[i]).data();
			var latlng = new google.maps.LatLng(marker_data.latitude, marker_data.longitude);
			var marker_content = '<div class="marker center-marker" data-lat="'+marker_data.latitude+'" data-lng="'+marker_data.longitude+'"><div class="dot"></div></div>';
			if(marker_data.content) marker_content = '<div class="marker" data-lat="'+marker_data.latitude+'" data-lng="'+marker_data.longitude+'"><div class="dot"></div></div><div class="info-box '+marker_data.active+'">'+marker_data.content+'</div>';
			var richMarker = new RichMarker({
				position: latlng,
				flat: true,
				anchor: RichMarkerPosition.MIDDLE,
				map: map,
				content: marker_content
			});
			latlngbounds.extend(latlng);
			mks.push(richMarker);
		}
		var markerCluster = new MarkerClusterer(map, mks);
		map.fitBounds(latlngbounds);
		// map.setZoom(options['zoom']);

		google.maps.event.addListenerOnce(map, "idle", function() { 
		  console.log(options['zoom']);
		  if (options['zoom'] >= 0) map.setZoom(options['zoom']);
		});

		var styles = [
		{
			stylers: [
			  { saturation: -50 }
			]
		}];
		// map.setOptions({styles: styles});
	});

	$(document).on('click touchstart', '.marker', function(){
		if($(this).hasClass('center-marker')) return;
		if(!$(this).siblings('.info-box').hasClass('active')) {
			$('.map-wrap .info-box.active').removeClass('active');

			var map = maps[$(this).parents('.map-wrap').attr('id')];
			var center = new google.maps.LatLng($(this).data('lat'), $(this).data('lng'));
			map.panTo(center);
			map_recenter(center, 0, -120, map);
		} 
		$(this).siblings('.info-box').toggleClass('active');
	});
	


	// Sharrre
	$('.share-box .facebook').sharrre({
	  share: {
	    facebook: true
	  },
	  template: '<a class="box facebook" href="#"><i class="nt-icon-facebook"></i><span class="count" href="#">{total}</span></a>',
	  enableHover: false,
	  enableTracking: true,
	  click: function(api, options){
	    api.simulateClick();
	    api.openPopup('facebook');
	  }
	});
	$('.share-box .twitter').sharrre({
	  share: {
	    twitter: true
	  },
	  template: '<a class="box twitter" href="#"><i class="nt-icon-twitter"></i><span class="count" href="#">{total}</span></a>',
	  enableHover: false,
	  enableTracking: true,
	  click: function(api, options){
	    api.simulateClick();
	    api.openPopup('twitter');
	  }
	});
	var urlCurl = $('.share-box .googleplus').data('urlCurl');
	$('.share-box .googleplus').sharrre({
	  urlCurl: urlCurl,
	  share: {
	    googlePlus: true
	  },
	  template: '<a class="box googleplus" href="#"><i class="nt-icon-gplus"></i><span class="count" href="#">{total}</span></a>',
	  enableHover: false,
	  enableTracking: true,
	  click: function(api, options){
	    api.simulateClick();
	    api.openPopup('googlePlus');
	  }
	});
	$('.share-box .pinterest').sharrre({
	  urlCurl: urlCurl,
	  share: {
	    pinterest: true
	  },
	  template: '<a class="box pinterest" href="#"><i class="nt-icon-pinterest-circled"></i><span class="count" href="#">{total}</span></a>',
	  enableHover: false,
	  enableTracking: true,
	  click: function(api, options){
	    api.simulateClick();
	    api.openPopup('pinterest');
	  }
	});

});

function map_recenter(latlng,offsetx,offsety, map) {
    var point1 = map.getProjection().fromLatLngToPoint(
        (latlng instanceof google.maps.LatLng) ? latlng : map.getCenter()
    );
    var point2 = new google.maps.Point(
        ( (typeof(offsetx) == 'number' ? offsetx : 0) / Math.pow(2, map.getZoom()) ) || 0,
        ( (typeof(offsety) == 'number' ? offsety : 0) / Math.pow(2, map.getZoom()) ) || 0
    );  
    map.panTo(map.getProjection().fromPointToLatLng(new google.maps.Point(
        point1.x - point2.x,
        point1.y + point2.y
    )));
}

