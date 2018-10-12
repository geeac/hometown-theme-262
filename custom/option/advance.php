<?php 
	
	// Option
	$options = array(

		// Google Analytic
		array(
			'title' 	=> 'Google Analytic',
			'options' 	=> array(
				array(
					'type' 			=> 'text',
					'id' 			=> 'analytic_ua',
					'title' 		=> 'Google Analytic Tracking ID',
					'description' 	=> 'UA-XXXXXXXX-X',
					'default' 		=> ''
				),
			)
		),

		// MailChimp
		// array(
		// 	'title' 	=> 'MailChimp',
		// 	'options' 	=> array(
		// 		array(
		// 			'type' 			=> 'text',
		// 			'id' 			=> 'mailchimp_api',
		// 			'title' 		=> 'MailChimp API Key',
		// 			'description' 	=> 'find it at: '.'<a href="http://kb.mailchimp.com/article/where-can-i-find-my-api-key" target="_blank">Link</a>',
		// 			'default' 		=> ''
		// 		),
		// 	)
		// ),

		// Twitter API
		// array(
		// 	'title' 	=> 'Twitter App <small><a href="https://dev.twitter.com/apps" target="_blank">get them here</a></small>',
		// 	'options' 	=> array(
		// 		array(
		// 			'type' 			=> 'text',
		// 			'id' 			=> 'twitter_consumer_key',
		// 			'title' 		=> 'Consumer key',
		// 			'description' 	=> '',
		// 			'default' 		=> ''
		// 		),
		// 		array(
		// 			'type' 			=> 'text',
		// 			'id' 			=> 'twitter_consumer_secret',
		// 			'title' 		=> 'Consumer secret',
		// 			'description' 	=> '',
		// 			'default' 		=> ''
		// 		),
		// 		array(
		// 			'type' 			=> 'text',
		// 			'id' 			=> 'twitter_user_token',
		// 			'title' 		=> 'Access token',
		// 			'description' 	=> '',
		// 			'default' 		=> ''
		// 		),
		// 		array(
		// 			'type' 			=> 'text',
		// 			'id' 			=> 'twitter_user_secret',
		// 			'title' 		=> 'Access token secret',
		// 			'description' 	=> '',
		// 			'default' 		=> ''
		// 		),
		// 	)
		// ),
		
		// reCAPTCHAR
		array(
			'title' 	=> 'reCAPTCHA',
			'options' 	=> array(
				
				array(
					'type' 			=> 'text',
					'id' 			=> 'recaptchar_site_key',
					'title' 		=> 'Site Key',
					'description' 	=> 'you can get one <a href="https://www.google.com/recaptcha/intro/index.html" target="_blank">here</a>',
					'default' 		=> '',
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'recaptchar_secret_key',
					'title' 		=> 'Secret Key',
					'description' 	=> 'you can get one <a href="https://www.google.com/recaptcha/intro/index.html" target="_blank">here</a>',
					'default' 		=> '',
				),
				
			)
		),

		// Misc
		array(
			'title' 	=> 'Misc',
			'options' 	=> array(
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'open_external_link',
					'title' 		=> 'Open External Link in new tab',
					'description' 	=> 'link outside the site domain will be opened in new tab',
					'default' 		=> 'off'
				),
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'show_customize',
					'title' 		=> 'Show Customize Panel',
					'description' 	=> 'show customize panel on frontend, should turn off in live site.',
					'default' 		=> 'off'
				),
				array(
					'type' 			=> 'textarea',
					'id' 			=> 'custom_css',
					'row'			=> 10,
					'title' 		=> 'Custom CSS',
					'description' 	=> '',
					'default' 		=> ''
				),
				array(
					'type' 			=> 'textarea',
					'id' 			=> 'custom_js',
					'row'			=> 10,
					'title' 		=> 'Custom JS',
					'description' 	=> '',
					'default' 		=> ''
				),
			)
		),
		
		// Custom Icon
		array(
			'title' 	=> 'Custom Icon',
			'options'	=> array(
				array(
					'type' 			=> 'custom_icon',
					'id' 			=> 'custom_icon',
					'title' 		=> 'Custom Icon Pack',
					'description' 	=> 'you can generate custom icon pack at <a href="http://fontello.com/" target="_blank">http://fontello.com/</a>',
					'default' 		=> ''
				),
			)
		),

		// Save & Load Configuration
		array(
			'title' 	=> 'Save & Load Configuration',
			'options'	=> array(
				array(
					'type' 			=> 'export_options',
					'id' 			=> 'theme_export_options',
					'title' 		=> 'Export Option',
					'description' 	=> 'backup options as .txt file',
					'default' 		=> ''
				),
				array(
					'type' 			=> 'import_options',
					'id' 			=> 'theme_import_options',
					'title' 		=> 'Import Option',
					'description' 	=> 'import options from .txt file',
					'default' 		=> ''
				),
			)
		),
		
	);
	
	$config = array(
		'title' => 'Advance',
		'group_id' => 'advance',
		'active_first' => false
	);
	
	
return array( 'options' => $options, 'config' => $config );

?>