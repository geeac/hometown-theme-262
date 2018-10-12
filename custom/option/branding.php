<?php 
	
	// Option
	$options = array(
		
		// Branding
		array(
				'title' 	=> 'Branding',
				'options' 	=> array(
					
					array(
						'type' 			=> 'image',
						'id' 			=> 'branding_favicon',
						'extensions' 	=> 'ico',
						'title' 		=> 'Favicon',
						'description' 	=> 'must be "png" file with 1:1 ratio<br />32 x 32 pixel is recomended'
					),
					array(
						'type' 			=> 'image',
						'id' 			=> 'branding_admin_logo',
						'title' 		=> 'WP Login Logo',
						'description' 	=> 'logo to be shown on WP-Admin Login Page<br />recomend image width 320px+'
					)
					
				)
			),
		
	);
	
	$config = array(
		'title'			=> 'Branding',
		'group_id' 		=> 'branding',
		'active_first' 	=> false
	);
	
	
return array( 'options' => $options, 'config' => $config );

?>