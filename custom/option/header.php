<?php 
	
$top_bar_item_stack[] = array(
	'id' => 'link',
	'type' => 'stack_template',
	'title' => 'Link',
	'description' => '',
	'options' => array(
		array(
			'type' 			=> 'text',
			'id'			=> 'stack_title',
			'title' 		=> 'Link',
			'description'	=> ''
		),
		array(
			'type' 			=> 'icon',
			'id'			=> 'icon',
			'title' 		=> 'Icon',
			'description' 	=> '',
			'default'		=> '',
		),
	)
);

// $top_bar_item_stack[] = array(
// 	'id' => 'top_bar_menu',
// 	'type' => 'stack_template',
// 	'title' => 'Menu',
// 	'description' => '',
// 	'options' => array(
// 		array(
// 			'type' 			=> 'select',
// 			'id'			=> 'stack_title',
// 			'title' 		=> 'Text',
// 			'description'	=> '',
// 			'source'		=> array(
// 				'nav-menu'	=> true
// 			),
// 			'default'	=> ''
// 		),
// 	)
// );

// $top_bar_item_stack[] = array(
// 	'id' => 'top_bar_search',
// 	'type' => 'stack_template',
// 	'title' => 'Search',
// 	'description' => '',
// 	'options' => array(
// 	)
// );

// $top_bar_item_stack[] = array(
// 	'id' => 'top_bar_wpml_language_switcher',
// 	'type' => 'stack_template',
// 	'title' => 'WPML Language Switcher',
// 	'description' => '',
// 	'options' => array(
// 	)
// );

// $top_bar_item_stack[] = array(
// 	'id' => 'top_bar_qts_language_switcher',
// 	'type' => 'stack_template',
// 	'title' => 'qTranslate Language Switcher',
// 	'description' => '',
// 	'options' => array(
// 	)
// );

// $top_bar_item_stack[] = array(
// 	'id' => 'top_bar_space',
// 	'type' => 'stack_template',
// 	'title' => 'Space',
// 	'description' => '',
// 	'options' => array(
// 	)
// );

// Option
$options = array(
	
	// Header
	array(
		'title' 	=> 'Style',
		'options' 	=> array(
			array(
				'type' 			=> 'radio',
				'id' 			=> 'header_type',
				'title' 		=> 'Header Type',
				'description' 	=> '',
				'default' 		=> 'logo-left',
				'options' 		=> array(
					'logo-left' => 'Logo Left',
					'logo-center'	=> 'Logo Center'
				)
			),
			array(
				'type' 			=> 'on_off',
				'id' 			=> 'sticky',
				'title' 		=> 'Sticky',
				'description' 	=> '',
				'default'		=> 'on'
			),
			array(
				'type' 			=> 'text',
				'id' 			=> 'height',
				'title' 		=> 'Header Height',
				'description' 	=> 'px unit',
				'default'		=> '100'
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
			array(
				'type' 			=> 'color',
				'id'			=> 'bg_color',
				'title' 		=> 'BG Color',
				'description'	=> '',
				'default' 		=> '#fff',
			),
			array(
				'type' 			=> 'image',
				'id' 			=> 'bg_image',
				'title' 		=> 'BG Image',
				'description' 	=> ''
			),
			array(
				'type' 			=> 'radio',
				'id'			=> 'bg_image_style',
				'title' 		=> 'BG Image Style',
				'description' 	=> '',
				'default' 		=> 'contain',
				'options' 		=> array(
					'contain' 	=> 'Contain',
					'cover' 	=> 'Cover',
					'repeat' 	=> 'Repeat',
				),
			),
			
		)
	),
	
	array(
		'title' 	=> 'Logo',
		'options' 	=> array(
			
			array(
				'type' 			=> 'image',
				'id' 			=> 'logo',
				'title' 		=> 'Image',
				'description' 	=> 'use @2x image size, recommended height is 60px',
			),
		)
	),

	array(
		'title' 	=> 'Top Bar',
		'options' 	=> array(
			array(
				'type' 			=> 'on_off',
				'id' 			=> 'show_topbar',
				'toggle'		=> 'toggle-show-topbar',
				'title' 		=> 'Show Top Bar',
				'description' 	=> '',
				'default'		=> 'on'
			),
			array(
				'type' 			=> 'text',
				'id' 			=> 'announce_text',
				'toggle_group'	=> 'toggle-show-topbar toggle-show-topbar-on',
				'title' 		=> 'Announce Text',
				'description' 	=> '',
			),
			array(
				'type' 			=> 'on_off',
				'id' 			=> 'show_search',
				'toggle_group'	=> 'toggle-show-topbar toggle-show-topbar-on',
				'title' 		=> 'Show Search Button',
				'description' 	=> '',
				'default'		=> 'on'
			),
			array(
				'type' 			=> 'on_off',
				'id' 			=> 'show_login',
				'toggle_group'	=> 'toggle-show-topbar toggle-show-topbar-on',
				'title' 		=> 'Show Loing Menu',
				'description' 	=> '',
				'default'		=> 'on'
			),
		)
	),

	array(
		'title' 	=> 'WPML & Polylang',
		'options' 	=> array(
			
			array(
				'type' 			=> 'on_off',
				'id' 			=> 'show_wpml',
				'toggle'		=>	'toggle-show-wpml',
				'title' 		=> 'Language Switcher',
				'description' 	=> '',
				'default'		=> 'on'
			),
			array(
				'type' 			=> 'radio',
				'id'			=> 'wpml_switcher_type',
				'toggle_group'	=> 'toggle-show-wpml toggle-show-wpml-on',
				'title' 		=> 'Switcher Style',
				'description' 	=> '',
				'default' 		=> 'text',
				'options' 		=> array(
					'text' 	=> 'Text',
					'flag' 	=> 'Flag',
				),
			),
		)
	),

	// array(
	// 	'title' 	=> 'Social',
	// 	'options' 	=> array(
			
	// 		array(
	// 			'type' 			=> 'stack',
	// 			'id' 			=> 'social_items',
	// 			'title' 		=> 'Social Links',
	// 			'description' 	=> '',
	// 			'templates'		=> $top_bar_item_stack,
	// 			'stack_button'	=> 'Add Links'
	// 		),
	// 	)
	// ),
	
);

$config = array(
	'title' 		=> 'Header',
	'group_id' 		=> 'header',
	'active_first' 	=> false
);
	
	
return array( 'options' => $options, 'config' => $config );

?>