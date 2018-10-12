<?php 
	
	// Option
	$options = array(
		
	
		
		array(
			'title' 	=> 'General',
			'options' 	=> array(
				array(
					'type' => 'text',
					'id' => 'null_price',
					'title' => 'Blank Price Text',
					'default' => 'POA',
					'description' => 'this text will be show when you leave price field as blank',
				),
				array(
					'type' => 'text',
					'id' => 'currency',
					'title' => 'Currency Symbol',
					'default' => '$',
					'description' => '',
				),
				array(
					'type' => 'radio',
					'id' => 'currency_position',
					'title' => 'Currency Position',
					'default' => 'before',
					'description' => '',
					'options' 		=> array(
						'before' 	=> 'Before',
						'after' => 'After',
					)
				),
				array(
					'type' => 'text',
					'id' => 'area',
					'title' => 'Area Unit',
					'default' => 'ft<sup>2</sup>',
					'description' => 'use '.htmlentities('<sup>2</sup>').' for square sign',
				),
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'favourite',
					'title' 		=> 'Favourite Button',
					'description' 	=> 'user can add property to their favourite list',
					'default'		=> 'on'
				),
				
			)
		),

		array(
			'title' 	=> 'Listing Page (Archive & Search Result)',
			'options' 	=> array(
				
				array(
					'type' 			=> 'radio',
					'id' 			=> 'layout',
					'title' 		=> 'Layout',
					'description' 	=> '',
					'default' 		=> 'full-width',
					'options' 		=> array(
						'full-width' 	=> 'Full Width',
						'sidebar-right' => 'Sidebar Right',
						'sidebar-left' => 'Sidebar Left'
					)
				),
				array(
					'type' => 'number',
					'id' => 'per_page',
					'title' => 'Properties per Page',
					'default' => '9',
					'description' => '<br />Leave blank to use default value (wp-admin > setting > reading > Blog pages show at most). <br /><br />Set to -1 to show all',
				),
				
			)
		),

		array(
			'title' 	=> 'Single Property Page',
			'options' 	=> array(
				
				array(
					'type' 			=> 'radio',
					'id' 			=> 'single_layout',
					'title' 		=> 'Layout',
					'description' 	=> '',
					'default' 		=> 'sidebar-left',
					'options' 		=> array(
						'full-width' 	=> 'Full Width',
						'sidebar' => 'Sidebar Right',
						'sidebar-left' => 'Sidebar Left'
					)
				),
				array(
					'type' 			=> 'range',
					'id' 			=> 'slide_timeout',
					'title' 		=> 'Slide Autoplay Timeout',
					'description' 	=> 'set to 0 to disable autoplay',
					'unit' 			=> 'ms',
					'default' 		=> '4000',
					'min' 			=> '0',
					'max' 			=> '10000',
					'step' 			=> '500'
				),
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'single_share',
					'title' 		=> 'Share Buttons',
					'description' 	=> 'turn on to show "Share Buttons"',
					'default' 		=> 'on',
				),
				
			)
		),

		array(
			'title' 	=> 'Contact',
			'options' 	=> array(
				
				array(
					'type' => 'textarea',
					'id' => 'contact_note',
					'title' => 'Contact Note',
					'default' => '',
					'description' => 'this content will be displayed beside property contact form',
				),
				array(
					'type' => 'text',
					'id' => 'contact_email',
					'title' => 'Contact Email',
					'default' => '',
					'description' => 'this Email will be used when send to Email is not specified',
				),
				
			)
		),
		

		array(
			'title' 	=> 'Submission',
			'options' 	=> array(
				
				array(
					'type' => 'on_off',
					'id' => 'submit_require_payment',
					'toggle' => 'toggle-require-payment',
					'default' => 'off',
					'title' => 'Require Payment',
					'description' => '',
				),
				array(
					'type' => 'radio',
					'id' => 'paypal_server',
					'toggle_group' => 'toggle-require-payment toggle-require-payment-on',
					'title' => 'Paypal Server',
					'default' => 'sandbox',
					'description' => '',
					'options' 		=> array(
						'sandbox' 	=> 'Sandbox',
						'production' => 'Production',
					)
				),
				array(
					'type' => 'text',
					'id' => 'paypal_merchant_id',
					'toggle_group' => 'toggle-require-payment toggle-require-payment-on',
					'title' => 'Paypal Merchant ID',
					'default' => '',
					'description' => '',
				),
				array(
					'type' => 'number',
					'id' => 'submission_price',
					'toggle_group' => 'toggle-require-payment toggle-require-payment-on',
					'title' => 'Submission Price (USD)',
					'default' => '0.99',
					'description' => '',
				),
			)
		),

		array(
			'title' 	=> 'Advance',
			'options' 	=> array(
				
				
				array(
					'type' => 'text',
					'id' => 'slug',
					'title' => 'slug',
					'default' => '',
					'description' => 'Custom slug for "property" post type. Leave blank to use default value.<br /><br />After update this value, please navigate to <a href="'.admin_url('/options-permalink.php').'">permalinks page</a> and click on "Save Changes" button.',
				),
				
			)
		),
		
	);
	
	$config = array(
		'title' 		=> 'Property',
		'group_id' 		=> 'property',
		'active_first' 	=> false
	);
	
	
return array( 'options' => $options, 'config' => $config );

?>