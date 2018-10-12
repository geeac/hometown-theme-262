<?php

$config = array(
	'title' => 'Property Meta',
	'group_id' => 'meta',
	'context' => 'normal',
	'priority' => 'core',
	'types' => array( 'property' )
);

$property_detail_stack[] = array(
	'id' => 'detail',
	'type' => 'stack_template',
	'title' => 'Detail',
	'description' => '',
	'options' => array(
		array(
			'type' 			=> 'text',
			'id'			=> 'stack_title',
			'title' 		=> 'Title',
			'description'	=> ''
		),
		array(
			'type' 			=> 'textarea',
			'id'			=> 'detail',
			'title' 		=> 'Detail',
			'description' 	=> '',
			'default'		=> '',
		),
	)
);

$options = array(
	
	array(
		'type' => 'text',
		'id' => 'id',
		'title' => 'ID',
		'description' => '',
	),
	array(
		'type' => 'number',
		'id' => 'price',
		'title' => 'Price',
		'description' => 'number only<br /><br />you can define currency symbol at "appearance > theme options > property"<br /><br />leave blank to show default string which can be define at "appearance > theme options > property"',
	),
	array(
		'type' => 'text',
		'id' => 'per',
		'title' => 'Per',
		'description' => 'example: day, month, year',
	),
	array(
		'type' => 'number',
		'id' => 'area',
		'title' => 'Area',
		'description' => '',
	),
	array(
		'type' => 'number',
		'id' => 'bathroom',
		'title' => 'Bathroom',
		'description' => '',
	),
	array(
		'type' => 'number',
		'id' => 'bedroom',
		'title' => 'Bedroom',
		'description' => '',
	),
	array(
		'type' => 'number',
		'id' => 'garage',
		'title' => 'Garage',
		'description' => '',
	),
	array(
		'type' => 'on_off',
		'id' => 'featured',
		'title' => 'Featured',
		'description' => '',
		'default' => 'off'
	),
	array(
		'type' => 'images',
		'id' => 'gallery',
		'title' => 'Gallery',
		'description' => '',
	),
	array(
		'type' => 'location',
		'id' => 'location',
		'title' => 'Location',
		'description' => '',
	),
	array(
		'type' => 'select',
		'id' => 'agent',
		'title' => 'Agents',
		'description' => 'to select multiple options<br />OSX: cmd + click<br />Window: ctrl + click',
		'multiple'	=> 8,
		'source'	=> array('post_type' => 'agent')
	),
	array(
		'type' => 'stack',
		'id' => 'detail',
		'title' => 'Details',
		'description' => '',
		'templates'		=> $property_detail_stack,
		'stack_button'	=> 'Add Property Detail'
	),
	// array(
	// 	'type' => 'image',
	// 	'id' => 'cover_image',
	// 	'title' => 'Cover Image',
	// 	'description' => 'recommend 700 x 900 (or any height)',
	// ),
	// array(
	// 	'type' => 'text',
	// 	'id' => 'badge_text',
	// 	'title' => 'Badge Text',
	// 	'description' => 'leave blank to disable. ex: BEST SELLER',
	// ),
	// array(
	// 	'type' => 'color',
	// 	'id' => 'badge_color',
	// 	'title' => 'Badge Color',
	// 	'description' => '',
	// ),

	// array(
	// 	'type' => 'separator',
	// 	'id' => '',
	// 	'title' => 'Information',
	// 	'description' => '',
	// ),
	// array(
	// 	'type' => 'text',
	// 	'id' => 'book_title',
	// 	'title' => 'Book Title',
	// 	'description' => '',
	// ),
	// array(
	// 	'type' => 'image',
	// 	'id' => 'book_title_image',
	// 	'title' => 'Title Image',
	// 	'description' => 'set this if you want to use image instead of text',
	// ),
	// array(
	// 	'type' => 'textarea',
	// 	'id' => 'book_description',
	// 	'row' => 5,
	// 	'title' => 'Book Description',
	// 	'description' => '',
	// ),
	// array(
	// 	'type' => 'text',
	// 	'id' => 'book_price',
	// 	'title' => 'Price',
	// 	'description' => '',
	// ),
	// array(
	// 	'type' 			=> 'stack',
	// 	'id' 			=> 'book_buttons',
	// 	'show_detail'	=> true,
	// 	'title' 		=> 'Buttons',
	// 	'description' 	=> '',
	// 	'templates'		=> $button_stack,
	// 	'stack_button'	=> 'Add Button'
	// ),
	
);
new nt_metaboxes_tool($config, $options);

?>