<?php

class NT_admin {
	
	var $theme;
	
	function init( $theme ) {
		
		$this->theme = $theme;
		
		// Add admin functions
		$this->functions();

		// Add Admin Menu
		add_action('admin_menu', array(&$this,'add_option_menu') );
		
		// Add custom post types
		$this->theme_types();
		
		// Add custom metas
		$this->theme_metas();
	}
	
	// Admin functions
	function functions() {
		require_once( THEME_FUNCTIONS_DIR . '/admin-enque.php');
		require_once( THEME_FUNCTIONS_DIR . '/input-tool.php' );
		require_once( THEME_FUNCTIONS_DIR . '/meta-tool.php' );
		require_once( THEME_FUNCTIONS_DIR . '/base-export.php' );
		require_once( THEME_FUNCTIONS_DIR . '/admin-ajax.php' );
	}
	
	// Theme options menu
	function add_option_menu() {
		// Add theme options under Appearrence
		add_theme_page( 'Theme Options', 'Theme Options', 'edit_theme_options', 'theme_options', array(&$this, 'option_page') );
	}

	function option_page() {
		// Setting page
		$sections = $this->theme->options;
		include_once( THEME_FUNCTIONS_DIR.'/admin-options-template.php' );
	}

	// Custom Post Types
	function theme_types() {
		foreach (new DirectoryIterator(THEME_TYPES_DIR) as $file){
		    if($file->isDot()) continue;

		    if($file->isDir()){
		        $register_file = THEME_TYPES_DIR.'/'.$file->getFilename().'/'.'register.php';
		        if(is_file($register_file)) {
		        	require_once( $register_file );
		        }
		        $manage_file = THEME_TYPES_DIR.'/'.$file->getFilename().'/'.'manage.php';
		        if(is_file($manage_file)) {
		        	require_once( $manage_file );
		        }
		        $content_file = THEME_TYPES_DIR.'/'.$file->getFilename().'/'.'meta.php';
		        if(is_file($content_file)) {
		        	require_once( $content_file );
		        }
		    }
		}
	}
	
	// Custom Meta
	function theme_metas() {
		foreach (new DirectoryIterator(THEME_METAS_DIR) as $file){
		    if($file->isDot()) continue;

		    if(pathinfo($file->getFilename(), PATHINFO_EXTENSION) != 'php') continue;

		    $register_file = THEME_METAS_DIR.'/'.$file->getFilename();
		    if(is_file($register_file)){

		        require_once( $register_file );
		    }
		}
	}

}
?>