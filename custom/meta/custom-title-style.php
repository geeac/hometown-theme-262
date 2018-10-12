<?php

$config = array(
	'title' => 'Title Options',
	'group_id' => 'general',
	'context' => 'normal',
	'priority' => 'core',
	'types' => array( 'agent', 'property' )
);
$options = array(


	// array(
	// 	'type' => 'radio',
	// 	'id' => 'page_layout',
	// 	'toggle' => 'toggle-page-layout',
	// 	'title' => 'Page Layout',
	// 	'description' => '',
	// 	'default' => 'default',
	// 	'options' => array(
	// 		'default' => 'Default',
	// 		'full-width' => 'Full Width',
	// 		'sidebar' => 'Sidebar Right',
	// 		'sidebar-left' => 'Sidebar Left',
	// 	)
	// ),
	// array(
	// 	'type' => 'select',
	// 	'id' => 'custom_sidebar',
	// 	'toggle_group' => 'toggle-page-layout toggle-page-layout-sidebar toggle-page-layout-sidebar-left',
	// 	'title' => 'Custom Sidebar',
	// 	'description' => 'leave blank to use default sidebar',
	// 	'default' => '',
	// 	'source' => array( 
	// 		'option-custom-sidebar' => ''
	// 	),
	// 	'options' => array(
	// 		'' => 'choose ...'
	// 	)
	// ),

	// array(
	// 	'type' => 'on_off',
	// 	'id' => 'custom_title',
	// 	'toggle' => 'toggle-custom-title',
	// 	'title' => 'Custom Title Style',
	// 	'default' => 'off',
	// 	'description' => 'turn on to override sidewide configuration',
	// ),
	// array(
	// 	'type' => 'text',
	// 	'id' => 'custom_main_title',
	// 	'toggle_group' => 'toggle-show-title toggle-show-title-on',
	// 	'title' => 'Custom Title',
	// 	'description' => 'this text will override the normal page/post title',
	// ),
	// array(
	// 	'type' => 'text',
	// 	'id' => 'custom_sub_title',
	// 	'toggle_group' => 'toggle-show-title toggle-show-title-on',
	// 	'title' => 'Custom Sub Title',
	// 	'description' => 'this text will be placed below Title',
	// ),
	array(
		'type' 			=> 'radio',
		'id' 			=> 'title_element_style',
		// 'toggle_group' => 'toggle-custom-title toggle-custom-title-on',
		'title' 		=> 'Title Element Style',
		'description' 	=> '',
		'default' 		=> '',
		'options' 		=> array(
			'' => 'Default',
			'element-light' => 'Light (best for dark BG)',
			'element-dark'	=> 'Dark (best for light BG)'
		)
	),
	array(
		'type' 			=> 'color',
		'id'			=> 'title_bg_color',
		// 'toggle_group' => 'toggle-custom-title toggle-custom-title-on',
		'title' 		=> 'Title BG Color',
		'description'	=> '',
		'default' 		=> '',
	),
	array(
		'type' 			=> 'image',
		'id' 			=> 'title_bg_image',
		// 'toggle_group' => 'toggle-custom-title toggle-custom-title-on',
		'title' 		=> 'Title BG Image',
		'description' 	=> ''
	),
	array(
		'type' 			=> 'radio',
		'id'			=> 'title_bg_image_style',
		// 'toggle_group' => 'toggle-custom-title toggle-custom-title-on',
		'title' 		=> 'Title BG Image Style',
		'description' 	=> '',
		'default' 		=> '',
		'options' 		=> array(
			'' 	=> 'Default',
			'cover' 	=> 'Cover',
			'contain' 	=> 'Contain',
			'repeat' 	=> 'Repeat',
		),
	),

	
	
);
new nt_metaboxes_tool($config, $options);



?>