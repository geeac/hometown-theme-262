<?php 
	
// Option
$options = array(
	
	// Blog
	array(
		'title' 	=> 'Blog Page',
		'options' 	=> array(
			// array(
			// 	'type' 			=> 'on_off',
			// 	'id' 			=> 'show_full_post_content',
			// 	'title' 		=> 'Show Full Content',
			// 	'description' 	=> 'show full post content',
			// 	'default' 		=> 'off',
			// ),
			array(
				'type' 			=> 'text',
				'id' 			=> 'read_more_text',
				'title' 		=> 'Read More Text',
				'description' 	=> 'string for "read more" link.<br />leave blank to disable "read more" link.',
				'default' 		=> 'Continue Reading &rarr;'
			),
			
		)
	),
	
	// Single Blog Page
	array(
		'title' 	=> 'Single Blog Page',
		'options' 	=> array(
			array(
				'type' 			=> 'on_off',
				'id' 			=> 'single_featured_img',
				'title' 		=> 'Featured Image',
				'description' 	=> 'turn on to show "Featured Image"',
				'default' 		=> 'on',
			),
			array(
				'type' 			=> 'on_off',
				'id' 			=> 'single_author_box',
				'title' 		=> 'Author Box',
				'description' 	=> 'turn on to show "Author" box below post content',
				'default' 		=> 'on',
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
	
	// Meta Infos
	array(
		'title' 	=> 'Meta Infos',
		'options' 	=> array(
			array(
				'type' 			=> 'on_off',
				'id' 			=> 'meta_date',
				'title' 		=> 'Published Date',
				'description' 	=> 'show post\'s published date',
				'default' 		=> 'on',
			),
			array(
				'type' 			=> 'on_off',
				'id' 			=> 'meta_author',
				'title' 		=> 'Author',
				'description' 	=> 'show post\'s author',
				'default' 		=> 'on',
			),
			array(
				'type' 			=> 'on_off',
				'id' 			=> 'meta_category',
				'title' 		=> 'Category',
				'description' 	=> 'show post\'s category',
				'default' 		=> 'on',
			),
			array(
				'type' 			=> 'on_off',
				'id' 			=> 'meta_comment',
				'title' 		=> 'Comment',
				'description' 	=> 'show post\'s comment count',
				'default'		=> 'on',
			),
		)
	)
);

$config = array(
	'title' 	=> 'Blog',
	'group_id' 	=> 'blog'
);
	
return array( 'options' => $options, 'config' => $config );

?>