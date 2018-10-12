<?php

$config = array(
	'title' => 'Agent Meta',
	'group_id' => 'meta',
	'context' => 'normal',
	'priority' => 'core',
	'types' => array( 'agent' )
);

$button_stack[] = array(
	'id' => 'button',
	'type' => 'stack_template',
	'title' => 'Button',
	'description' => '',
	'options' => array(
		array(
			'type' 			=> 'text',
			'id'			=> 'stack_title',
			'title' 		=> 'Text',
			'description'	=> ''
		),
		array(
			'type' 			=> 'text',
			'id'			=> 'link',
			'title' 		=> 'Link',
			'description' 	=> '',
			'default'		=> '',
		),
		array(
			'type' 			=> 'color',
			'id'			=> 'color',
			'title' 		=> 'Color',
			'description' 	=> 'leave blank to use standard color',
			'default'		=> '',
		),
		array(
			'type' 			=> 'icon',
			'id'			=> 'icon',
			'title' 		=> 'Icon',
			'description' 	=> '',
			'default'		=> '',
		),

	)
);

$options = array(
	
	array(
		'type' => 'text',
		'id' => 'role',
		'title' => 'Role',
		'description' => '',
	),
	array(
		'type' => 'text',
		'id' => 'phone',
		'title' => 'Phone Number',
		'description' => '',
	),
	array(
		'type' => 'text',
		'id' => 'email',
		'title' => 'Email',
		'description' => '',
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