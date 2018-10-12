<?php

$nt_config = array(	

	// Theme Post Format
	'theme_post_format' => array(),
	
	// Theme Menus
	'theme_menus' => array(
		'primary' => 'Primary',
		'primary-left' => 'Primary Left (for center logo layout)',
		'primary-right' => 'Primary Right (for center logo layout)',
		'top-right' => 'Top Right',
	),

	// Libs
	'theme_libs' => array(),

	// Plugins
	'theme_plugins' => array(
		array(
			'name' 		=> 'WPBakery Visual Composer',
			'slug' 		=> 'js_composer',
			'version'	=> '4.5.1',
			'source'	=> get_template_directory() . '/plugin/js_composer.zip',
			'required' 	=> true
		),
		array(
			'name' 		=> 'Revolution Slider',
			'slug' 		=> 'revslider',
			'version'	=> '4.6.93',
			'source'	=> get_template_directory() . '/plugin/revslider.zip',
			'required' 	=> false
		),
		array(
			'name' 		=> 'Contact Form 7',
			'slug' 		=> 'contact-form-7',
			'version'	=> '4.0.3',
			'source'	=> 'https://downloads.wordpress.org/plugin/contact-form-7.4.0.3.zip',
			'required' 	=> false
		),
		array(
			'name' 		=> 'oAuth Twitter Feed for Developers',
			'slug' 		=> 'oauth-twitter-feed-for-developers',
			'version'	=> '2.2.1',
			'source'	=> 'https://downloads.wordpress.org/plugin/oauth-twitter-feed-for-developers.2.2.1.zip',
			'required' 	=> false
		),
	),
	
	// Theme Sidebar
	'theme_sidebars' => array(
		array(
			'id' => 'blog',
			'name' => 'Blog - Sidebar',
			'description' => 'Blog - Sidebar Widget Area',
			'before_title' => '<div class="widget-title">',
			'after_title' => '</div>',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>'
		),
		array(
			'id' => 'page',
			'name' => 'Page - Sidebar',
			'description' => 'Page - Sidebar Widget Area',
			'before_title' => '<div class="widget-title">',
			'after_title' => '</div>',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>'
		),
		array(
			'id' => 'property',
			'name' => 'Property - Sidebar',
			'description' => 'Property - Sidebar Widget Area',
			'before_title' => '<div class="widget-title">',
			'after_title' => '</div>',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>'
		),
		array(
			'id' => 'agent',
			'name' => 'Agent - Sidebar',
			'description' => 'Agent - Sidebar Widget Area',
			'before_title' => '<div class="widget-title">',
			'after_title' => '</div>',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>'
		),
		array(
			'id' => 'member',
			'name' => 'Member - Sidebar',
			'description' => 'Member - Sidebar Widget Area',
			'before_title' => '<div class="widget-title">',
			'after_title' => '</div>',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>'
		),
		array(
			'id' => 'dsidxpress',
			'name' => 'dsIDXpress - Sidebar',
			'description' => 'dsIDXpress - Sidebar Widget Area',
			'before_title' => '<div class="widget-title">',
			'after_title' => '</div>',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>'
		),
		array(
			'id' => 'footer-1',
			'name' => 'Footer #1',
			'description' => 'Footer #1 - Sidebar Widget Area',
			'before_title' => '<div class="widget-title">',
			'after_title' => '</div>',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>'
		),
		array(
			'id' => 'footer-2',
			'name' => 'Footer #2',
			'description' => 'Footer #2 - Sidebar Widget Area',
			'before_title' => '<div class="widget-title">',
			'after_title' => '</div>',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>'
		),
		array(
			'id' => 'footer-3',
			'name' => 'Footer #3',
			'description' => 'Footer #3 - Sidebar Widget Area',
			'before_title' => '<div class="widget-title">',
			'after_title' => '</div>',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>'
		),
		array(
			'id' => 'footer-4',
			'name' => 'Footer #4',
			'description' => 'Footer #4 - Sidebar Widget Area',
			'before_title' => '<div class="widget-title">',
			'after_title' => '</div>',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>'
		),
	),
	
	// Theme Options
	'theme_options' => array(
		'setup' 		=> array( 'name' => 'Setup', 'icon' => 'nt-icon-cog'),
		'branding' 		=> array( 'name' => 'Branding', 'icon' => 'nt-icon-user'),
		'appearance' 	=> array( 'name' => 'Appearance', 'icon' => 'nt-icon-pencil'),
		'font' 			=> array( 'name' => 'Font', 'icon' => 'nt-icon-doc'),
		'header' 		=> array( 'name' => 'Header', 'icon' => 'nt-icon-calendar'),
		'footer' 		=> array( 'name' => 'Footer', 'icon' => 'nt-icon-calendar'),
		'page' 		=> array( 'name' => 'Page', 'icon' => 'nt-icon-calendar'),
		
		// 'agent' 			=> array( 'name' => 'Agent', 'icon' => 'nt-icon-photo'),
		'blog' 		=> array( 'name' => 'Blog', 'icon' => 'nt-icon-calendar'),
		'page' 		=> array( 'name' => 'Page', 'icon' => 'nt-icon-calendar'),
		'property' 			=> array( 'name' => 'Property', 'icon' => 'nt-icon-shop'),
		// 'dsidxpress' 		=> array( 'name' => 'dsIDXpress', 'icon' => 'nt-icon-calendar'),
		'advance' 		=> array( 'name' => 'Advance', 'icon' => 'nt-icon-beaker'),
		// 'custom' 		=> array( 'name' => 'Custom', 'icon' => 'nt-icon-params')
	),
	
);

