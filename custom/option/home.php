<?php 
	
	// Option
	$options = array(
		
		// Type
		array(
			'title' 	=> 'Home Type',
			'options' 	=> array(
				
				array(
					'type' 			=> 'radio',
					'id' 			=> 'home_type',
					'toggle' 		=> 'toggle-home-type',
					'title' 		=> 'Type',
					'description' 	=> 'choose page type to set as home page',
					'default' 		=> 'page',
					'options' 		=> array(
						'page' 			=> 'Page',
						'app' 			=> 'Single Application',
						'blog' 			=> 'Blog'
					),
				),
				array(
					'type' 			=> 'select',
					'id' 			=> 'home_page',
					'toggle_group' 	=> 'toggle-home-type toggle-home-type-page',
					'title' 		=> 'Home Page',
					'description' 	=> 'this page will be displayed as a Home Page',
					'default' 		=> '0',
					'options'		=>	array(
						'0'			=>	'&mdash; Select &mdash;'
					),
					'source' 		=> array(
						'post_type' 	=> 'page'
					)
				),
				
				array(
					'type' 			=> 'select',
					'id' 			=> 'home_layout',
					'toggle_group' 	=> 'toggle-home-type toggle-home-type-page',
					'title' 		=> 'Layout',
					'description' 	=> 'choose layout of the home page, some element work nice only on full width layout',
					'default' 		=> 'full-width',
					'options' 		=> array(
						'full-width' 	=> 'Full Width',
						'sidebar-right' => 'Sidebar'
					)
				),
				
				
				array(
					'type' 			=> 'select',
					'id' 			=> 'home_app_page',
					'toggle_group' 	=> 'toggle-home-type toggle-home-type-app',
					'title' 		=> 'Application',
					'description' 	=> 'this page will be displayed as a Home Page',
					'default' 		=> '',
					'source' 		=> array(
						'post_type' 	=> 'app'
					)
				),
				
			)
		),
		
		// Slide & Apps Dock
		array(
			'title' 	=> 'Slide & Apps Dock',
			'options' 	=> array(
				
				
				array(
					'type' 			=> 'radio_img',
					'id' 			=> 'home_feature_style',
					'toggle' 		=> 'toggle-home-feature-style',
					'title' 		=> 'Style',
					'description' 	=> 'choose home page style',
					'default' 		=> 'imgs-slide',
					'options' 		=> array(
						'imgs-slide' 	=> 'Slide',
						'apps-slide' 	=> 'Apps Dock'
					),
					'images' => array(
						'imgs-slide' => 'home-style/img-slide.png',
						'apps-slide' => 'home-style/apps-slide.png'
					)
				),
				
				
				// Apps Slide
				array(
					'type' 			=> 'range',
					'id' 			=> 'apps_slide_number',
					'toggle_group' 	=> 'toggle-home-feature-style toggle-home-feature-style-apps-slide',
					'title' 		=> 'App Count',
					'description' 	=> 'amount of App to show each time',
					'unit' 			=> 'icon',
					'default' 		=> '4',
					'min' 			=> '1',
					'max' 			=> '5',
					'step' 			=> '1'
				),
				
				// IMGs Slide
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'img_slide_full_frame',
					'toggle_group' 	=> 'toggle-home-feature-style toggle-home-feature-style-imgs-slide',
					'title' 		=> 'Full Width',
					'description' 	=> 'Turn off if you want a 950px width & non-scaled slide',
					'default' 		=> 'on'
				),
				array(
					'type' 			=> 'select',
					'id' 			=> 'img_slide_effect',
					'toggle_group' 	=> 'toggle-home-feature-style toggle-home-feature-style-imgs-slide',
					'title' 		=> 'Slide Effect',
					'description' 	=> 'Choose slide effect',
					'default' 		=> 'slide',
					'options' 		=> array(
						'fade' 				=> 'Fade',
						'slide' 			=> 'Slide'
					)
				),
				array(
					'type' 			=> 'select',
					'id' 			=> 'img_slide_direction',
					'toggle_group' 	=> 'toggle-home-feature-style toggle-home-feature-style-imgs-slide',
					'title' 		=> 'Slide Direction',
					'description' 	=> 'Choose slide Direction',
					'default' 		=> 'horizontal',
					'options' 		=> array(
						'horizontal' 		=> 'Horizontal',
						'vertical' 			=> 'Vertical'
					)
				),
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'img_slide_auto',
					'toggle_group' 	=> 'toggle-home-feature-style toggle-home-feature-style-imgs-slide',
					'title' 		=> 'Auto Start',
					'description' 	=> 'Animate slider automatically',
					'default' 		=> 'on'
				),
				array(
					'type' 			=> 'range',
					'id' 			=> 'img_slide_pause',
					'toggle_group' 	=> 'toggle-home-feature-style toggle-home-feature-style-imgs-slide',
					'title' 		=> 'Pause Time',
					'description' 	=> '0.5 - 10 sec',
					'unit' 			=> 'sec',
					'default' 		=> '3',
					'min' 			=> '0.5',
					'max' 			=> '10',
					'step' 			=> '0.5'
				),
				array(
					'type' 			=> 'range',
					'id' 			=> 'img_slide_animate_speed',
					'toggle_group' 	=> 'toggle-home-feature-style toggle-home-feature-style-imgs-slide',
					'title' 		=> 'Animation Speed',
					'description' 	=> '0.1 - 3 sec',
					'unit' 			=> 'sec',
					'default' 		=> '0.5',
					'min' 			=> '0.1',
					'max' 			=> '3',
					'step' 			=> '0.1'
				),
				/*
				array(
					'type' 			=> 'range',
					'id' 			=> 'img_slide_width',
					'toggle_group' 	=> 'toggle-home-feature-style toggle-home-feature-style-imgs-slide',
					'title' 		=> 'Frame\'s Width',
					'description' 	=> '500 - 954 px',
					'unit' 			=> 'px',
					'default' 		=> '750',
					'min' 			=> '500',
					'max' 			=> '954',
					'step' 			=> '10'
				),
				*/
				array(
					'type' 			=> 'range',
					'id' 			=> 'img_slide_height',
					'toggle_group' 	=> 'toggle-home-feature-style toggle-home-feature-style-imgs-slide',
					'title' 		=> 'Frame\'s Height',
					'description' 	=> '200 - 400 px',
					'unit' 			=> 'px',
					'default' 		=> '300',
					'min' 			=> '200',
					'max' 			=> '400',
					'step' 			=> '10'
				),
				/*
				array(
					'type' 			=> 'range',
					'id' 			=> 'img_slide_border',
					'toggle_group' 	=> 'toggle-home-feature-style toggle-home-feature-style-imgs-slide',
					'title' 		=> 'Frame Border Size',
					'description' 	=> '0 - 15 px',
					'unit' 			=> 'px',
					'default' 		=> '3',
					'min' 			=> '0',
					'max' 			=> '15',
					'step' 			=> '1'
				),
				array(
					'type' 			=> 'color',
					'id' 			=> 'img_slide_border_color',
					'toggle_group' 	=> 'toggle-home-feature-style toggle-home-feature-style-imgs-slide',
					'title' 		=> 'Frame Color',
					'description' 	=> '',
					'default' 		=> '#FFFFFF'
				),
				*/
				array(
					'type' 			=> 'color',
					'id' 			=> 'img_slide_caption_title_bg_color',
					'toggle_group' 	=> 'toggle-home-feature-style toggle-home-feature-style-imgs-slide',
					'title' 		=> 'Caption Title BG Color',
					'description' 	=> '',
					'default' 		=> '#FF5400'
				),
				array(
					'type' 			=> 'color',
					'id' 			=> 'img_slide_caption_title_text_color',
					'toggle_group' 	=> 'toggle-home-feature-style toggle-home-feature-style-imgs-slide',
					'title' 		=> 'Caption Title Text Color',
					'description' 	=> 'Leave blank to let the theme automatically choose.',
					'default' 		=> '#FFFFFF'
				),
				
						
			)
		),
		
	);
	
	$config = array(
		'title' => 'Home',
		'group_id' => 'home',
	);
	
	
return array( 'options' => $options, 'config' => $config );

?>