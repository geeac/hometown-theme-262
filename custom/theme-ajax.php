<?php

add_action( 'wp_ajax_nopriv_do_favourite', 'do_favourite' );
add_action( 'wp_ajax_do_favourite', 'do_favourite' );
function do_favourite(){
	// var_dump($_REQUEST);
	$property_id = $_REQUEST['params']['propertyId'];
	$user_id = get_current_user_id();

	$favourites = (array)get_post_meta($property_id, '_meta_favourites', true );
	if(in_array($user_id, $favourites)) {
		unset($favourites[array_search($user_id, $favourites)]);
	} else {
		array_push($favourites, $user_id);
	}
	update_post_meta($property_id, '_meta_favourites', $favourites);

	$result = array('result' => 'ok');
	die( json_encode($result) );
}


?>