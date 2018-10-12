<?php 
	
// Option
$options = array(
	
	// Background
	array(
		'title' 	=> 'Layout & Background',
		'options' 	=> array(
			
			// array(
			// 	'type' 			=> 'on_off',
			// 	'id' 			=> 'text_rtl',
			// 	'title' 		=> 'RTL text direction',
			// 	'description' 	=> 'turn on for language that read from right to left',
			// 	'default' 		=> 'off'
			// ),
			array(
				'type' 			=> 'on_off',
				'id' 			=> 'page_load',
				'title' 		=> 'Page Load Overlay',
				'description' 	=> '',
				'default' 		=> 'on'
			),
			array(
				'type' 			=> 'on_off',
				'id' 			=> 'smooth_scroll',
				'title' 		=> 'Smooth Scroll',
				'description' 	=> '',
				'default' 		=> 'on'
			),
			array(
				'type' 			=> 'radio',
				'id' 			=> 'site_layout',
				'title'		 	=> 'Layout',
				'description' 	=> 'site layout',
				'toggle'		=>	'toggle-site-layout',
				'default' 		=> 'full-width',
				'options' 		=> array(
					'full-width' 	=> 'Full Width',
					'boxed' 		=> 'Boxed',
				)
			),
			array(
				'type' 			=> 'radio',
				'id' 			=> 'looks_feels',
				'title'		 	=> 'Looks & Feels',
				'description' 	=> '',
				'default' 		=> 'element-round',
				'options' 		=> array(
					'element-round' 	=> 'Round',
					// 'element-semi-round' 		=> 'Semi-Round',
					'element-crisp' 		=> 'Crisp',
				)
			),

			array(
				'type' 			=>	'color',
				'id' 			=>	'site_color',
				'title' 		=>	'Accent Color',
				'description' 	=>	'this color will be used sitewide',
				'default' 		=>	'#bc0054',
			),

			
			array(
				'type' 			=>	'color',
				'id' 			=>	'bg_color',
				'title' 		=>	'Background Color',
				'description' 	=>	'choose color to use as background',
				'default' 		=>	'#eee',
				
			),
			

			array(
				'type' 			=> 'image',
				'id' 			=> 'bg_image',
				'title' 		=> 'Background Image',
				'description' 	=> 'choose image to use as background',
				
			),
			array(
				'type' 			=> 'radio',
				'id' 			=> 'bg_style',
				'title' 		=> 'Background Style',
				'description' 	=> '',
				'default' 		=> 'cover',
				'options' 		=> array(
					'contain' 		=> 'Contain',
					'cover' 		=> 'Cover',
					'repeat' 	=> 'Repeat',
				),
				
			),		
					
		)
	),


	// Background
	// array(
	// 	'title' 	=> 'Page Load Overlay',
	// 	'options' 	=> array(
			
				
	// 		array(
	// 			'type' 			=> 'on_off',
	// 			'id' 			=> 'page_load',
	// 			'title' 		=> 'Page Load',
	// 			'description' 	=> '',
	// 			'default' 		=> 'on'
	// 		),

					
	// 	)
	// ),
	
);

$config = array(
	'title'			=> 'Appearance',
	'group_id' 		=> 'appearance',
	'active_first' 	=> false
);
	
	
return array( 'options' => $options, 'config' => $config );

?>