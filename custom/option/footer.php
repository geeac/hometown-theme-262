<?php 
	
	// Option
	$options = array(
		array(
			'title' 	=> 'Footer',
			'options' 	=> array(
				
				array(
					'type' 			=> 'radio',
					'id' 			=> 'footer_element_style',
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
					'id'			=> 'footer_bg_color',
					'title' 		=> 'BG Color',
					'description'	=> '',
					'default' 		=> '#fafafa',
				),
				array(
					'type' 			=> 'image',
					'id' 			=> 'footer_bg_image',
					'title' 		=> 'BG Image',
					'description' 	=> ''
				),
				array(
					'type' 			=> 'radio',
					'id'			=> 'footer_bg_image_style',
					'title' 		=> 'BG Image Style',
					'description' 	=> '',
					'default' 		=> 'contain',
					'options' 		=> array(
						'contain' 	=> 'Contain',
						'cover' 	=> 'Cover',
						'repeat' 	=> 'Repeat',
					),
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'footer_text',
					'title' 		=> 'Footer Text',
					'description' 	=> '',
					'default'	=> 'Copyright &copy; 2014 Yoursite.com'
				),
				array(
					'type' 			=> 'stack',
					'id' 			=> 'social_items',
					'title' 		=> 'Social Links',
					'description' 	=> '',
					'templates'		=> $top_bar_item_stack,
					'stack_button'	=> 'Add Links'
				),
				
				
			)
		),
		
		array(
			'title' 	=> 'Pre Footer',
			'options' 	=> array(
				
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'footer_show',
					'toggle'		=> 'toggle-pre-footer',
					'title' 		=> 'Show',
					'description' 	=> 'turn off to hide',
					'default'		=> 'on'
				),
				array(
					'type' 			=> 'radio',
					'id' 			=> 'pre_footer_columns',
					'toggle_group'	=> 'toggle-pre-footer toggle-pre-footer-on',
					'title' 		=> 'Columns',
					'description' 	=> '',
					'default' 		=> '4-cols',
					'options' 		=> array(
						'4-cols' => '4 Coloumns',
						'3-cols'	=> '3 Columns'
					)
				),
				
				
			)
		),

	);

	
	
	$config = array(
		'title' 		=> 'Footer',
		'group_id' 		=> 'footer',
		'active_first' 	=> false
	);
	
	
return array( 'options' => $options, 'config' => $config );

?>