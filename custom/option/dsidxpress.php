<?php 
	
	// Option
	$options = array(
		array(
			'title' 	=> 'Layout',
			'options' 	=> array(
				
				array(
					'type' 			=> 'radio',
					'id' 			=> 'default_layout',
					'title' 		=> 'Default Layout',
					'description' 	=> 'choose page default layout',
					'default' 		=> 'sidebar-right',
					'options' 		=> array(
						'full-width' 	=> 'Full Width',
						'sidebar-right' => 'Sidebar Right',
						'sidebar-left' => 'Sidebar Left'
					)
				)
				
			)
		),

		array(
			'title' 	=> 'Page Title',
			'options' 	=> array(
				
				array(
					'type' 			=> 'radio',
					'id' 			=> 'element_style',
					'title' 		=> 'Element Style',
					'description' 	=> '',
					'default' 		=> 'element-light',
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
					'default' 		=> '#bc0054',
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
					'default' 		=> 'cover',
					'options' 		=> array(
						'cover' 	=> 'Cover',
						'contain' 	=> 'Contain',
						'repeat' 	=> 'Repeat',
					),
				),
				
			)
		),

	);
	
	$config = array(
		'title' 		=> 'dsIDXpress',
		'group_id' 		=> 'dsidxpress',
		'active_first' 	=> false
	);
	
return array( 'options' => $options, 'config' => $config );

?>