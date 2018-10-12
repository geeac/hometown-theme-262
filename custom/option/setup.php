<?php 
	
// Option
$options = array(
	
	// Background
	array(
		'title' 	=> 'Setup',
		'options' 	=> array(
			
			array(
				'type' 			=> 'content',
				'id' 			=> 'plugin',
				'title' 		=> '1. Install Required Plugins',
				'description' 	=> '',
				'default'	=> '',
				'value'	=> 'Click <a href="'.admin_url('themes.php?page=install-required-plugins').'">here</a> to install required plugins.'
			),
			array(
				'type' 			=> 'import_content',
				'id' 			=> 'import_demo_content',
				'title' 		=> '2. Import Demo Content',
				'description' 	=> '<br />must <strong>activate all required plugin</strong> before import demo content<br /><br />recommended to perform on fresh installation<br /><br />all content will be deleted',
				'options' 		=> array(
					'demo-1' 	=> 'Demo #1',
					'demo-2' 	=> 'Demo #2',
				)
			),
			
					
		)
	),
	
);

$config = array(
	'title'			=> 'Setup',
	'group_id' 		=> 'setup',
	'active_first' 	=> true
);
	
	
return array( 'options' => $options, 'config' => $config );

?>