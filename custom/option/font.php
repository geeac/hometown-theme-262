<?php 
	
	// Option
	$options = array(
		
		array(
			'title' 	=> 'General',
			'options' 	=> array(
				
				array(
					'type' 			=> 'select',
					'id' 			=> 'general_family',
					'title' 		=> 'Font Family',
					'description' 	=> 'site wide font family',
					'default' 		=> 'Arial,Helvetica,Garuda,sans-serif',
					'options' 		=> array(
						"'Arial Black',Gadget,sans-serif"
						=> '"Arial Black",Gadget,sans-serif',
						'Arial,Helvetica,Garuda,sans-serif' 		
						=> 'Arial,Helvetica,Garuda,sans-serif',
						'Verdana,Geneva,Kalimati,sans-serif' 
						=> 'Verdana,Geneva,Kalimati,sans-serif',
						"'Lucida Sans Unicode','Lucida Grande',Garuda,sans-serif" 
						=> '"Lucida Sans Unicode","Lucida Grande",Garuda,sans-serif',
						"'Lucida Sans Unicode','Lucida Grande',Garuda,sans-serif" 
						=> '"Lucida Sans Unicode","Lucida Grande",Garuda,sans-serif',
						"Georgia,'Nimbus Roman No9 L',serif" 
						=> 'Georgia,"Nimbus Roman No9 L",serif',
						"'Palatino Linotype','Book Antiqua',Palatino,FreeSerif,serif" 
						=> '"Palatino Linotype","Book Antiqua",Palatino,FreeSerif,serif',
						'Tahoma,Geneva,Kalimati,sans-serif' 
						=> 'Tahoma,Geneva,Kalimati,sans-serif',
						"'Trebuchet MS',Helvetica,Jamrul,sans-serif" 
						=> '"Trebuchet MS",Helvetica,Jamrul,sans-serif',
						"'Times New Roman',Times,FreeSerif,serif" 
						=> '"Times New Roman",Times,FreeSerif,serif'
					)
				),

				array(
					'type' 			=> 'select',
					'id' 			=> 'google_web_font',
					'title' 		=> 'Google Web Font Family',
					'description' 	=> '<a href="http://www.google.com/fonts/" target="_blank">Google Web Font</a><br />internet connection required',
					'default' 		=> 'Raleway',
					'source'		=> array(
						'gfonts' 	=> ''
					)
				),
				array(
					'type' 			=> 'select',
					'id' 			=> 'apply_google_web_font',
					'title' 		=> 'Apply Google Web Font',
					'description' 	=> '',
					'default' 		=> 'all',
					'options'		=> array(
						'all' => 'All',
						'heading' => 'Only Heading'
					)
				),
				
				array(
					'type' 			=> 'range',
					'id' 			=> 'general_font_size',
					'title' 		=> 'Font Size',
					'description' 	=> 'site wide font size, heading text size will relative to this value',
					'unit' 			=> 'px',
					'default' 		=> '14',
					'min' 			=> '13',
					'max' 			=> '18',
					'step' 			=> '1'
				),
				array(
					'type' 			=> 'range',
					'id' 			=> 'nav_font_size',
					'title' 		=> 'Menu Font Size',
					'description' 	=> 'font size of primary menu',
					'unit' 			=> 'px',
					'default' 		=> '14',
					'min' 			=> '13',
					'max' 			=> '16',
					'step' 			=> '1'
				),
						
			)
		),
		
		// Heading
		// array(
		// 	'title' 	=> 'Heading',
		// 	'options' 	=> array(
				
		// 		array(
		// 			'type' 			=> 'range',
		// 			'id' 			=> 'h1_font_size',
		// 			'title' 		=> 'H1 font size',
		// 			'description' 	=> 'font size of h1 tag',
		// 			'unit' 			=> 'px',
		// 			'default' 		=> '32',
		// 			'min' 			=> '14',
		// 			'max' 			=> '32',
		// 			'step' 			=> '1'
		// 		),
		// 		array(
		// 			'type' 			=> 'range',
		// 			'id' 			=> 'h2_font_size',
		// 			'title' 		=> 'H2 font size',
		// 			'description' 	=> 'font size of h2 tag',
		// 			'unit' 			=> 'px',
		// 			'default' 		=> '28',
		// 			'min' 			=> '14',
		// 			'max' 			=> '32',
		// 			'step' 			=> '1'
		// 		),
		// 		array(
		// 			'type' 			=> 'range',
		// 			'id' 			=> 'h3_font_size',
		// 			'title' 		=> 'H3 font size',
		// 			'description' 	=> 'font size of h3 tag',
		// 			'unit' 			=> 'px',
		// 			'default' 		=> '26',
		// 			'min' 			=> '14',
		// 			'max' 			=> '32',
		// 			'step' 			=> '1'
		// 		),
		// 		array(
		// 			'type' 			=> 'range',
		// 			'id' 			=> 'h4_font_size',
		// 			'title' 		=> 'H4 font size',
		// 			'description' 	=> 'font size of h4 tag',
		// 			'unit' 			=> 'px',
		// 			'default' 		=> '24',
		// 			'min' 			=> '14',
		// 			'max' 			=> '32',
		// 			'step' 			=> '1'
		// 		),
		// 		array(
		// 			'type' 			=> 'range',
		// 			'id' 			=> 'h5_font_size',
		// 			'title' 		=> 'H5 font size',
		// 			'description' 	=> 'font size of h5 tag',
		// 			'unit' 			=> 'px',
		// 			'default' 		=> '20',
		// 			'min' 			=> '14',
		// 			'max' 			=> '32',
		// 			'step' 			=> '1'
		// 		),
		// 		array(
		// 			'type' 			=> 'range',
		// 			'id' 			=> 'h6_font_size',
		// 			'title' 		=> 'H6 font size',
		// 			'description' 	=> 'font size of h6 tag',
		// 			'unit' 			=> 'px',
		// 			'default' 		=> '16',
		// 			'min' 			=> '14',
		// 			'max' 			=> '32',
		// 			'step' 			=> '1'
		// 		),
				
		// 	)
		// ),
		
	);
	
	$config = array(
		'title' 	=> 'Font',
		'group_id' 	=> 'font',
	);
	
	
return array( 'options' => $options, 'config' => $config );

?>