<?php

class LT_Base {
	
	var $theme_config;
	var $types;
	var $settings;
	var $sidebars;
	var $widgets;
	var $menus;
	var $options;
	var $plugins;
	
	// Constructer
	function lt_base($theme_config) {
		$this->theme_config = $theme_config;
		add_action('after_setup_theme', array( &$this, 'init'), 0);
	}

	// Initialize theme.
	function init() {
		
		// Define theme's constants.
		$this->theme_config( $this->theme_config );
		
		// Load base's core.
		$this->base_functions();

		// Language support.
		add_action( 'after_setup_theme', array( &$this, 'theme_language' ) );
		
		// Theme support.
		add_action( 'after_setup_theme', array( &$this, 'theme_support' ) );
		
		// Theme's widgets.
		add_action( 'widgets_init', array( &$this, 'theme_widgets' ) );
		
		// Theme's sidebars
		$this->theme_sidebars();
		
		// Theme's types
		$this->theme_types();
		
		// Theme's AJAX.
		require_once( THEME_CUSTOM_DIR . '/theme-ajax.php' );
		
		// Frontend Enqueue
		add_action( 'wp_enqueue_scripts', array( &$this, 'theme_enqueue' ) );
		
		// Custom 
		add_action(	'wp_head', array(&$this, 'theme_header'));
		$this->theme_function();

		// Theme's admin.
		$this->theme_admin();

		// Theme's plugins.
		$this->theme_custom_libs();

		// Theme's JS composer
		add_action( 'init', array( &$this, 'theme_js_composer' ), 1000 );

		// Theme's custom function
		$this->theme_custom_functions();
	}
	
	// Custom JS Composer
	function theme_js_composer() {
		include( THEME_FRAMEWORK_DIR . '/vc/custom.php');
		include( THEME_CUSTOM_DIR . '/vc/custom.php');
	}

	function theme_config( $options ) {
	
		$this->menus = $options['theme_menus'];
		$this->post_format = $options['theme_post_format'];
		$this->sidebars = $options['theme_sidebars'];
		$this->options = $options['theme_options'];
		$this->libs = $options['theme_libs'];
		$this->plugins = $options['theme_plugins'];
		
		// Get Theme Data from style.css
		$theme_data = wp_get_theme();
		
		// Core
		define( 'FRAMEWORK_NAME', 'LT' );
		define( 'THEME_NAME', $theme_data->Name );
		define( 'THEME_SLUG', strtolower( trim( str_ireplace( 'child', '', $theme_data->Name ) ) ) );
		define( 'THEME_VERSION', $theme_data->Version );

		define( 'THEME_URI', get_template_directory_uri() );
		define( 'THEME_DIR', get_template_directory() );

		define( 'THEME_FRAMEWORK_URI', THEME_URI.'/framework' );
		define( 'THEME_FRAMEWORK_DIR', THEME_DIR.'/framework' );
		
		define( 'THEME_FRAMEWORK_ASSETS_URI', THEME_FRAMEWORK_URI.'/asset' );
		define( 'THEME_FRAMEWORK_ASSETS_DIR', THEME_FRAMEWORK_DIR.'/asset' );

		define( 'THEME_FUNCTIONS_URI', THEME_FRAMEWORK_URI.'/function' );
		define( 'THEME_FUNCTIONS_DIR', THEME_FRAMEWORK_DIR.'/function' );

		define( 'THEME_LIBS_URI', THEME_FRAMEWORK_URI.'/lib' );
		define( 'THEME_LIBS_DIR', THEME_FRAMEWORK_DIR.'/lib' );

		// Custom
		define( 'THEME_CUSTOM_URI', THEME_URI.'/custom' );
		define( 'THEME_CUSTOM_DIR', THEME_DIR.'/custom' );
		
		define( 'THEME_CUSTOM_ASSETS_URI', THEME_FRAMEWORK_URI.'/custom/assets' );
		define( 'THEME_CUSTOM_ASSETS_DIR', THEME_FRAMEWORK_DIR.'/custom/assets' );

		define( 'THEME_TYPES_URI', THEME_CUSTOM_URI.'/cpt' );
		define( 'THEME_TYPES_DIR', THEME_CUSTOM_DIR.'/cpt' );

		define( 'THEME_METAS_URI', THEME_CUSTOM_URI.'/meta' );
		define( 'THEME_METAS_DIR', THEME_CUSTOM_DIR.'/meta' );

		define( 'THEME_WIDGETS_URI', THEME_CUSTOM_URI.'/widget' );
		define( 'THEME_WIDGETS_DIR', THEME_CUSTOM_DIR.'/widget' );

		define( 'THEME_CUSTOM_FUNCTIONS_URI', THEME_CUSTOM_URI.'/function' );
		define( 'THEME_CUSTOM_FUNCTIONS_DIR', THEME_CUSTOM_DIR.'/function' );

		define( 'THEME_OPTIONS_URI', THEME_CUSTOM_URI.'/option' );
		define( 'THEME_OPTIONS_DIR', THEME_CUSTOM_DIR.'/option' );

		define( 'THEME_LANGUAGES_URI', THEME_CUSTOM_URI.'/languages' );
		define( 'THEME_LANGUAGES_DIR', THEME_CUSTOM_DIR.'/languages' );

		define( 'THEME_CUSTOM_LIBS_URI', THEME_CUSTOM_URI.'/lib' );
		define( 'THEME_CUSTOM_LIBS_DIR', THEME_CUSTOM_DIR.'/lib' );
	}
	
	function theme_language() {
		load_theme_textdomain( 'theme_front', THEME_DIR.'/languages' );
	}
	
	function theme_support() {
		// Editor style
		add_editor_style();

		// Post Thumbnail
		add_theme_support( 'post-thumbnails' );


		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );

		if ( ! isset( $content_width ) )
		$content_width = 600;

		// WordPress Navigation Menu
		register_nav_menus( $this->menus );

		// Post Format
		// add_theme_support( 'post-formats', $this->post_format );

		// WooCommerce
		add_theme_support( 'woocommerce' );
	}
	
	function base_functions() {
		require_once( THEME_FUNCTIONS_DIR . '/base-functions.php' );
	}
	
	function theme_custom_libs() {
		foreach ( $this->libs as $plugin ) {
			require_once( THEME_CUSTOM_LIBS_DIR . $libs );
		}
		require_once( THEME_LIBS_DIR . '/class-tgm-plugin-activation.php' );
		add_action( 'tgmpa_register', array( &$this, 'theme_required_plugins' ) );

		
		require_once( THEME_LIBS_DIR . '/menu-item-custom-fields.php' );
		require_once( THEME_LIBS_DIR . '/menu-item-custom-fields-example.php' );
	}

	function theme_required_plugins() {
		$config = array(
			'id'				=> 'tgmpa',
			'default_path' 		=> '',
			'menu' 				=> 'tgmpa-install-plugins', 
			'parent_slug' 		=> 'themes.php',
			'capability'        => 'edit_theme_options',
			'has_notices'      	=> true, 
			'is_automatic'    	=> true,
			'dismissable'		=> false
		);
		tgmpa( $this->plugins, $config );
	}
	
	function theme_widgets() {
		foreach (new DirectoryIterator(THEME_WIDGETS_DIR) as $file){
			if(pathinfo($file->getFilename(), PATHINFO_EXTENSION) != 'php') continue;

		    if($file->isFile()){
		    	require_once( THEME_WIDGETS_DIR.'/'.$file->getFilename() );
		    }
		}
	}

	function theme_custom_functions() {
		foreach (new DirectoryIterator(THEME_CUSTOM_FUNCTIONS_DIR) as $file){
			if(pathinfo($file->getFilename(), PATHINFO_EXTENSION) != 'php') continue;

		    if($file->isFile()){
		    	require_once( THEME_CUSTOM_FUNCTIONS_DIR.'/'.$file->getFilename() );
		    }
		}
	}
	
	function theme_sidebars() {
		$custom_sidebars = nt_get_option('sidebar', 'custom_sidebars');
		if($custom_sidebars) {
			foreach ($custom_sidebars as $custom_sidebar){
				$sidebar_name = $custom_sidebar['stack_title'];
				$sidebar_desc = 'Custom Sidebar Widget Area';
				register_sidebar(array(
					'id' => preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower( $sidebar_name )) ),
					'name' =>  $sidebar_name . ' (custom)',
					'description' => $sidebar_desc,
					'before_title' => '<div class="widget-title">',
					'after_title' => '</div>',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
				));
			}
		}
		foreach( $this->sidebars as $theme_sidebar ){
			register_sidebar($theme_sidebar);
		}
	}
	
	function theme_types() {
		do_action('lt_cpt_init');
	}
	
	function theme_enqueue() {
		include( THEME_CUSTOM_DIR . '/theme-enqueue.php' );
	}
	
	function theme_header() {
		include( THEME_CUSTOM_DIR . '/theme-header.php' );
	}
	
	function theme_function() {
		include( THEME_CUSTOM_DIR . '/theme-functions.php' );
	}
	
	

	function theme_admin() {
		if ( is_admin() ) {
			require_once( THEME_FUNCTIONS_DIR . '/admin.php' );
			$admin = new NT_admin();
			$admin->init( $this );
		}
	}

}

?>