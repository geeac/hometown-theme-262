<?php

$config = array(
	'title' => 'Hero Options',
	'group_id' => 'hero',
	'context' => 'normal',
	'priority' => 'core',
	'types' => array( 'page' )
);

$property_item_stack[] = array(
	'id' => 'property',
	'type' => 'stack_template',
	'title' => 'Property',
	'description' => '',
	'options' => array(
		array(
			'type' 			=> 'select',
			'id'			=> 'stack_title',
			'title' 		=> 'Property',
			'description'	=> '',
			'source'	=> array('post_type' => 'property')
		),
	)
);

$general_slide_item_stack[] = array(
	'id' => 'slide',
	'type' => 'stack_template',
	'title' => 'Slide',
	'description' => '',
	'options' => array(
		array(
			'type' 			=> 'text',
			'id'			=> 'stack_title',
			'title' 		=> 'Title',
			'description'	=> '',
		),
		array(
			'type' 			=> 'textarea',
			'id'			=> 'description',
			'title' 		=> 'Description',
			'description'	=> '',
		),
		array(
			'type' 			=> 'text',
			'id'			=> 'button',
			'title' 		=> 'Button Text',
			'description'	=> '',
		),
		array(
			'type' 			=> 'text',
			'id'			=> 'url',
			'title' 		=> 'URL',
			'description'	=> '',
		),
		array(
			'type' 			=> 'image',
			'id'			=> 'bg_image',
			'title' 		=> 'Background Image',
			'description'	=> '',
		),
		array(
			'type' 			=> 'radio',
			'id' 			=> 'element_style',
			'title' 		=> 'Element Style',
			'description' 	=> '',
			'default' 		=> 'element-dark',
			'options' 		=> array(
				'element-light' => 'Light (best for dark BG)',
				'element-dark'	=> 'Dark (best for light BG)'
			)
		),
	)
);

$options = array(


	array(
		'type' => 'radio',
		'id' => 'type',
		'toggle' => 'toggle-hero-type',
		'title' => 'Hero Type',
		'description' => '',
		'default' => '',
		'options' => array(
			'' => 'None',
			'map' => 'Map',
			'slide' => 'Property Slider',
			'general-slide' => 'General Slider',
			'rev-slide' => 'Revolution Slider',
		)
	),

	// array(
	// 	'type' => 'select',
	// 	'id' => 'properties',
	// 	'toggle_group' => 'toggle-hero-type toggle-hero-type-slide',
	// 	'title' => 'Properties',
	// 	'description' => 'to select multiple options<br />OSX: cmd + click<br />Window: ctrl + click',
	// 	'multiple'	=> 8,
	// 	'source'	=> array('post_type' => 'property')
	// ),

	array(
		'type' 			=> 'select',
		'id'			=> 'rev_slide',
		'toggle_group' => 'toggle-hero-type toggle-hero-type-rev-slide',
		'title' 		=> 'Revolution Slider',
		'description'	=> '',
		'source'	=> array('revslider' => true)
	),

	array(
		'type' 			=> 'range',
		'id' 			=> 'property_map_height',
		'toggle_group' => 'toggle-hero-type toggle-hero-type-map',
		'title' 		=> 'Map Height',
		'description' 	=> '',
		'unit' 			=> 'px',
		'default' 		=> '500',
		'min' 			=> '200',
		'max' 			=> '1000',
		'step' 			=> '10'
	),
	array(
		'type' 			=> 'range',
		'id' 			=> 'property_map_zoom',
		'toggle_group' => 'toggle-hero-type toggle-hero-type-map',
		'title' 		=> 'Map Zoom',
		'description' 	=> 'set to -1 for auto zoom',
		'unit' 			=> '',
		'default' 		=> '-1',
		'min' 			=> '-1',
		'max' 			=> '16',
		'step' 			=> '1'
	),


	array(
		'type' => 'radio',
		'id' => 'property_slide_style',
		'toggle_group' => 'toggle-hero-type toggle-hero-type-slide',
		'title' => 'Slide Style',
		'description' => '',
		'default' => '1',
		'options' => array(
			'1' => 'Style #1',
			'2' => 'Style #2',
		)
	),
	array(
		'type' 			=> 'range',
		'id' 			=> 'property_slide_height',
		'toggle_group' => 'toggle-hero-type toggle-hero-type-slide',
		'title' 		=> 'Slide Height',
		'description' 	=> 'adjust to change slide height',
		'unit' 			=> 'px',
		'default' 		=> '500',
		'min' 			=> '350',
		'max' 			=> '1000',
		'step' 			=> '10'
	),
	array(
		'type' 			=> 'range',
		'id' 			=> 'property_slide_timeout',
		'toggle_group' => 'toggle-hero-type toggle-hero-type-slide',
		'title' 		=> 'Autoplay Timeout',
		'description' 	=> 'set to 0 to disable autoplay',
		'unit' 			=> 'ms',
		'default' 		=> '4000',
		'min' 			=> '0',
		'max' 			=> '10000',
		'step' 			=> '500'
	),
	array(
		'type' 			=> 'stack',
		'id' 			=> 'properties',
		'toggle_group' => 'toggle-hero-type toggle-hero-type-slide',
		'title' 		=> 'Properties Slide',
		'description' 	=> '',
		'templates'		=> $property_item_stack,
		'stack_button'	=> 'Add Slide'
	),

	array(
		'type' 			=> 'range',
		'id' 			=> 'general_slide_padding',
		'toggle_group' => 'toggle-hero-type toggle-hero-type-general-slide',
		'title' 		=> 'Slide Vertical Padding',
		'description' 	=> 'adjust to change slide height',
		'unit' 			=> 'px',
		'default' 		=> '100',
		'min' 			=> '50',
		'max' 			=> '200',
		'step' 			=> '5'
	),
	array(
		'type' 			=> 'range',
		'id' 			=> 'general_slide_timeout',
		'toggle_group' => 'toggle-hero-type toggle-hero-type-general-slide',
		'title' 		=> 'Autoplay Timeout',
		'description' 	=> 'set to 0 to disable autoplay',
		'unit' 			=> 'ms',
		'default' 		=> '4000',
		'min' 			=> '0',
		'max' 			=> '10000',
		'step' 			=> '500'
	),
	array(
		'type' 			=> 'stack',
		'id' 			=> 'general_slide',
		'toggle_group' => 'toggle-hero-type toggle-hero-type-general-slide',
		'title' 		=> 'Slide',
		'description' 	=> '',
		'templates'		=> $general_slide_item_stack,
		'stack_button'	=> 'Add Slide'
	),


	array(
		'type' => 'on_off',
		'id' => 'property_search',
		'toggle' => 'toggle-hero-search',
		'title' => 'Property Search Box',
		'default' => 'off',
		'description' => '',
	),
	array(
		'type' => 'radio',
		'id' => 'property_search_style',
		'toggle_group' => 'toggle-hero-search toggle-hero-search-on',
		'title' => 'Search Box Style',
		'description' => '',
		'default' => 'full',
		'options' => array(
			'full' => 'Full',
			'compact' => 'Compact',
		)
	),
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
	// 	'id' => 'show_main_title',
	// 	'toggle' => 'toggle-show-title',
	// 	'title' => 'Show Title',
	// 	'default' => 'on',
	// 	'description' => 'turn off to hide title section',
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
	// array(
	// 	'type' 			=> 'radio',
	// 	'id' 			=> 'title_element_style',
	// 	'toggle_group' => 'toggle-show-title toggle-show-title-on',
	// 	'title' 		=> 'Title Element Style',
	// 	'description' 	=> '',
	// 	'default' 		=> '',
	// 	'options' 		=> array(
	// 		'' => 'Default',
	// 		'element-light' => 'Light (best for dark BG)',
	// 		'element-dark'	=> 'Dark (best for light BG)'
	// 	)
	// ),
	// array(
	// 	'type' 			=> 'color',
	// 	'id'			=> 'title_bg_color',
	// 	'toggle_group' => 'toggle-show-title toggle-show-title-on',
	// 	'title' 		=> 'Title BG Color',
	// 	'description'	=> '',
	// 	'default' 		=> '',
	// ),
	// array(
	// 	'type' 			=> 'image',
	// 	'id' 			=> 'title_bg_image',
	// 	'toggle_group' => 'toggle-show-title toggle-show-title-on',
	// 	'title' 		=> 'Title BG Image',
	// 	'description' 	=> ''
	// ),
	// array(
	// 	'type' 			=> 'radio',
	// 	'id'			=> 'title_bg_image_style',
	// 	'toggle_group' => 'toggle-show-title toggle-show-title-on',
	// 	'title' 		=> 'Title BG Image Style',
	// 	'description' 	=> '',
	// 	'default' 		=> '',
	// 	'options' 		=> array(
	// 		'' 	=> 'Default',
	// 		'cover' 	=> 'Cover',
	// 		'contain' 	=> 'Contain',
	// 		'repeat' 	=> 'Repeat',
	// 	),
	// ),

	
	
);
new nt_metaboxes_tool($config, $options);



?>