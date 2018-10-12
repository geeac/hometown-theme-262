<?php

// ENQUEUE JS

// WP Native Scripts
wp_enqueue_script('jquery');
wp_enqueue_script('common');
wp_enqueue_script( 'jquery-form' );

if( is_single() ) {
	wp_enqueue_script( 'comment' );
	wp_enqueue_script( 'comment-reply' );
}

// Support IE
if( nt_is_ie() && nt_is_ie() <= 8 ) {
	wp_enqueue_script('lt-html5', THEME_URI . '/js/html5.js', null, THEME_VERSION, false );
	wp_enqueue_script('lt-respond', THEME_URI . '/js/respond.min.js', false, THEME_VERSION, false );
}

if( nt_get_option('appearance', 'smooth_scroll') == 'on' )
	wp_enqueue_script('smoothscroll', THEME_URI . '/js/jquery.smoothscroll.js', false, THEME_VERSION, true );

wp_enqueue_script('lt-fitvids', THEME_URI . '/js/jquery.fitvids.js', false, THEME_VERSION, true );
wp_enqueue_script('lt-animate-number', THEME_URI . '/js/jquery.animateNumber.min.js', false, THEME_VERSION, true );

wp_enqueue_script('lt-sticky', THEME_URI . '/js/jquery.sticky.js', false, THEME_VERSION, true );
// wp_enqueue_script('lt-sticky-kit', THEME_URI . '/js/jquery.sticky-kit.min.js', false, THEME_VERSION, true );

wp_enqueue_script('lt-swipe-box', THEME_URI . '/js/jquery.swipebox.min.js', false, THEME_VERSION, true );
wp_enqueue_script('lt-matchHeight', THEME_URI . '/js/jquery.matchHeight-min.js', false, THEME_VERSION, true );


wp_enqueue_script('lt-inview', THEME_URI . '/js/jquery.inview.min.js', false, THEME_VERSION, true );

wp_enqueue_script('lt-owl-carousel', THEME_URI . '/js/owl.carousel.min.js', false, THEME_VERSION, true );
wp_enqueue_script('lt-google-maps', "http://maps.google.com/maps/api/js?sensor=false&libraries=places", false, THEME_VERSION, true );

// Map
wp_enqueue_script('lt-markerclusterer', THEME_URI . '/js/markerclusterer_compiled.js', false, THEME_VERSION, true );
wp_enqueue_script('lt-richmarker', THEME_URI . '/js/richmarker-compiled.js', false, THEME_VERSION, true );

// Location Picker
wp_enqueue_script('lt-locationpicker', THEME_FRAMEWORK_ASSETS_URI . '/js/locationpicker.jquery.js', false, THEME_VERSION, true);

// Validate
wp_enqueue_script('lt-validate', THEME_URI . '/js/jquery.validate.min.js', false, THEME_VERSION, true );
wp_enqueue_script('lt-metadata', THEME_URI . '/js/jquery.metadata.js', false, THEME_VERSION, true );

wp_enqueue_script('lt-select-box', THEME_URI . '/js/jquery.selectBox.min.js', false, THEME_VERSION, true );
wp_enqueue_script('lt-nouislider', THEME_URI . '/js/jquery.nouislider.all.min.js', false, THEME_VERSION, true );

wp_enqueue_script('lt-numeric', THEME_URI . '/js/jquery.numeric.min.js', false, THEME_VERSION, true );
wp_enqueue_script('lt-nprogress', THEME_URI . '/js/nprogress.js', false, THEME_VERSION, true );

wp_enqueue_script('lt-imagesloaded', THEME_URI . '/js/imagesloaded.pkgd.min.js', false, THEME_VERSION, true );
wp_enqueue_script('lt-sharrre', THEME_URI . '/js/jquery.sharrre.min.js', false, THEME_VERSION, true );

wp_enqueue_script('lt-theme', THEME_URI . '/js/theme.js', false, THEME_VERSION, true );



// ENQUEUE CSS

// Custom Fontello Icon
$custom_icons = nt_get_option('advance', 'custom_icon');
$upload_dir = wp_upload_dir();
if(is_array($custom_icons)) {
	foreach( $custom_icons as $custom_icon ) {
		$custom_icon = explode('|', $custom_icon);
		$custom_icon_style_url = $upload_dir['baseurl'] .'/nt_custom_icon/'. $custom_icon[2].'/css/'.$custom_icon[1].'.css';
		wp_enqueue_style( 'lt-icon-'.$custom_icon[1], $custom_icon_style_url, true, THEME_VERSION );
	}
}

wp_enqueue_style( 'lt-icon', THEME_URI . '/font/flaticon.css' );
wp_enqueue_style( 'lt-foundation', THEME_URI . '/css/app.css' );
wp_enqueue_style( 'nt-icon', THEME_URI . '/css/nt-icon.css', true, THEME_VERSION );
wp_enqueue_style( 'lt-screen', THEME_URI . '/css/screen.css', true, THEME_VERSION );
wp_enqueue_style( 'lt-media-queries', THEME_URI . '/css/media-queries.css', true, THEME_VERSION );

// RTL
if( nt_get_option('appearance', 'text_rtl') == 'on' || isset($_REQUEST['rtl']) ) {
	wp_enqueue_style( 'lt-rtl', THEME_URI . '/css/rtl.css', false, THEME_VERSION );
}

// Customize
if( nt_get_option('advance', 'show_customize') == 'on' || isset($_REQUEST['customize']) ) {
	wp_enqueue_style( 'nt-customize-panel', THEME_URI . '/css/customize-panel.css', true, THEME_VERSION );
}

// Standard style.css for child-theme
wp_enqueue_style( 'lt-child', get_stylesheet_uri(), false, THEME_VERSION );

$google_font = nt_get_option('font', 'google_web_font');
if( $google_font != '' ){
	wp_enqueue_style( 'lt-google-webfont', 'http://fonts.googleapis.com/css?family='.str_replace( ' ', '+', $google_font ).':700,400,300', false, THEME_VERSION );
}