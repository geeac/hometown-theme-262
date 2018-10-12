<?php

// Support LESS
add_filter('style_loader_tag', 'nt_style_loader_tag_function');
function nt_style_loader_tag_function($tag){
	if(strpos($tag, '.less') !== FALSE) {
	  return str_replace('stylesheet','stylesheet/less',$tag);
	} else {
	  return $tag;
	}
}

// Favicon
add_action('wp_head', 'nt_favicon', 0);
add_action('admin_head', 'nt_favicon', 0);
add_action('login_head', 'nt_favicon', 0);
function nt_favicon() {
    $favicon = wp_get_attachment_image_src( nt_get_option('branding', 'branding_favicon') );
    if( $favicon ){
        echo '<link rel="icon" type="image/png" href="'.esc_url($favicon[0]).'" />';
    }
}

// Add ajaxurl on frontend
add_action('wp_head','nt_frontend_ajaxurl', 0);
function nt_frontend_ajaxurl() {
?>
  <script type="text/javascript">
  var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
  </script>
<?php
}

// Login Logo
add_action('login_head', 'nt_custom_login_logo' );
function nt_custom_login_logo() {
	$custom_login_logo = nt_get_option('branding', 'branding_admin_logo');

	if( $custom_login_logo != '' ) {
		$img = wp_get_attachment_image_src( $custom_login_logo, 'full' );
		if( $img[1] > 320 ) {
			echo '<style type="text/css">#login { width: '.$img[1].'px; }</style>';
		}
		echo '<style type="text/css">#login h1{ margin-bottom: 10px; margin-left: 8px; } #login h1 a { background-image:url('. wp_get_attachment_url( $custom_login_logo ) .') !important; background-position: center center; background-size: auto; height: '.$img[2].'px; width: 100%;</style>';
	}
}

// Site Title
add_filter( 'wp_title', 'nt_custom_title', 10, 2 );
function nt_custom_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'theme_front' ), max( $paged, $page ) );

	return $title;
}

function nt_icon_list($path = false) {
	WP_Filesystem();
	global $wp_filesystem;

	$pattern = '/\.((?:\w+(?:-)?)+):before\s+{\s*content:\s*\'(.+)\';\s+}/';
	if(!$path) $path = get_template_directory().'/css/nt-icon.css';
	$subject = $wp_filesystem->get_contents($path);
	
	preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);

	$icons = array();
  	$icons[] = '';
  	foreach($matches as $match){
	    $icons[] = $match[1];
	}
	return $icons;
}

// Theme Image
function nt_image($attachment_id, $size = 'full') {
	$src = wp_get_attachment_image_src($attachment_id, $size);
	$meta = wp_get_attachment_metadata($attachment_id);
    $ret = '<img src="'.$src[0].'" alt="'.$meta['image_meta']['title'].'" />';

    return $ret;
}
function nt_image_src($attachment_id, $size = 'full') {
	$src = wp_get_attachment_image_src($attachment_id, $size);
    return $src[0];
}

function nt_path_to_url( $path ) {
	$upload_dir = wp_upload_dir();
	return str_replace( $upload_dir['basedir'], $upload_dir['baseurl'], $path);
}

function nt_get_attachment_id_from_src( $image_src ) {
	global $wpdb;
    $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
    $id = $wpdb->get_var($query);
    return $id;
}
function nt_get_attachment_src_from_id( $id ) {
	$attachment = wp_get_attachment_image_src( $id, 'full' );
	return $attachment[0];
}



// Theme Option
function nt_get_option( $section = '', $field = '', $default = false ) {
	$options = get_option( THEME_SLUG . '_options' );
	if ( '' != $section && '' != $field ) {
		return ( isset( $options[$section][$field] ) && $options[$section][$field] ) ? $options[$section][$field] : $default;
	}
	elseif ( '' != $section ) {
		return ( isset( $options[$section] ) ) ? $options[$section] : $default;
	}
	else return $options;
}

// Get WPML post ID
function nt_get_wpml_object_id( $id, $type ){
	if( function_exists('icl_object_id') ) return icl_object_id($id, $type);
	else return $id;
}

// Convert Hex to RGB
function nt_hex2rgb ($hex, $format = 'rgb(%d, %d, %d)') {
    if (strlen($hex) === 3) {
        $rgb = sprintf($format,
            hexdec($hex[0]),
            hexdec($hex[1]),
            hexdec($hex[2]));
    } elseif (strlen($hex) === 6) {
        $rgb = sprintf($format,
            hexdec(substr($hex, 0, 2)),
            hexdec(substr($hex, 2, 2)),
            hexdec(substr($hex, 4, 2)));
    } elseif (strlen($hex) === 7) {
        $rgb = sprintf($format,
            hexdec(substr($hex, 1, 2)),
            hexdec(substr($hex, 3, 2)),
            hexdec(substr($hex, 5, 2)));
    } else {
        $rgb = false;
    }

    return $rgb;
}

// Check IE
function nt_is_ie() {
	preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches);
	if (count($matches)>1) {
		return $matches[1];
	} else {
		return false;
	}
}

// Save option after theme activatation
function nt_theme_activate($oldname, $oldtheme=false) {
	wp_redirect(admin_url('themes.php?page=theme_options&save=true'));
}
add_action('after_switch_theme', 'nt_theme_activate');



// nt_icon
add_shortcode( 'nt_icon', 'nt_icon_shortcode' );
function nt_icon_shortcode( $atts ) {
     extract( shortcode_atts( array(
	      'id' => '',
     ), $atts ) );
     return '<i class="'.$id.' nt-icon"></i>';
     if(strpos($id,'icon-') !== false) return '<span class="'.$id.'"></span>';
 	 if(strpos($id,'fa-') !== false) return '<span class="fa fa-fw '.$id.'"></span>';
}

// Upload Image
function nt_upload_user_file( $file = array() ) {

	require_once( ABSPATH . 'wp-admin/includes/admin.php' );

      $file_return = wp_handle_upload( $file, array('test_form' => false ) );

      if( isset( $file_return['error'] ) || isset( $file_return['upload_error_handler'] ) ) {
          return false;
      } else {

          $filename = $file_return['file'];

          $attachment = array(
              'post_mime_type' => $file_return['type'],
              'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
              'post_content' => '',
              'post_status' => 'inherit',
              'guid' => $file_return['url']
          );
          $attachment_id = wp_insert_attachment( $attachment, $filename );

          require_once(ABSPATH . 'wp-admin/includes/image.php');
          $attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
          wp_update_attachment_metadata( $attachment_id, $attachment_data );

          if( 0 < intval( $attachment_id ) ) {
          	return $attachment_id;
          }
      }

      return false;
}

// Re-Array File Upload
function nt_reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

