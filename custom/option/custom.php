<?php 
	
// Option
$options = array(
	array(
		'title' 	=> 'Add your own custom option - <a href="#">Developer API</a>',
		'options' 	=> array(
		)
	),
);

$config = array(
	'title' 		=> 'Custom',
	'group_id' 		=> 'custom',
	'active_first' 	=> false
);

// Apply filter 'nt_page_builder'
$options = apply_filters('nt_custom_option', $options);

return array( 'options' => $options, 'config' => $config );

?>