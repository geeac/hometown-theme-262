<?php
if(function_exists('vc_set_as_theme')) {

	// Property
	$property_status = array();
	$p_status = get_terms('status', 'hide_empty=false');
		if(is_array($p_status)) {
		foreach ($p_status as $ps) {
		  $property_status[$ps->name] = $ps->term_id;
		}
	}
	$property_type = array();
	$p_type = get_terms('type', 'hide_empty=false');
		if(is_array($p_type)) {
		foreach ($p_type as $pt) {
		  $property_type[$pt->name] = $pt->term_id;
		}
	}
	$property_location = array();
	$p_location = get_terms('location', 'hide_empty=false');
		if(is_array($p_location)) {
		foreach ($p_location as $pl) {
		  $property_location[$pl->name] = $pl->term_id;
		}
	}
	  class WPBakeryShortCode_VC_Property extends WPBakeryShortCode {}
	  vc_map( array(
	     "name" => "Property",
	     "base" => "vc_property",
	     "description" => 'Property Listing',
	     "class" => "",
	     "category" => 'Content',
	     // "js_view" => 'VcFeatureView',
	     "icon" => 'icon-wpb-application-icon-large',
	     "params" => array(
	         array(
	           "type" => "checkbox",
	           "class" => "",
	           "heading" => "Filter Location",
	           "param_name" => "location_in",
	           "value" => $property_location,
	           "description" => 'select status to be shown, choose none to show all'
	        ),
	          array(
	           "type" => "checkbox",
	           "class" => "",
	           "heading" => "Filter Type",
	           "param_name" => "type_in",
	           "value" => $property_type,
	           "description" => 'select status to be shown, choose none to show all'
	        ),
	        array(
	           "type" => "checkbox",
	           "class" => "",
	           "heading" => "Filter Status",
	           "param_name" => "status_in",
	           "value" => $property_status,
	           "description" => 'select status to be shown, choose none to show all'
	        ),
	        array(
	           "type" => "checkbox",
	           "class" => "",
	           "heading" => "Show Sort",
	           "param_name" => "sort",
	           "value" => array('show sort dropdown box' => true),
	           "description" => ''
	        ),
	        array(
	           "type" => "checkbox",
	           "class" => "",
	           "heading" => "Featured",
	           "param_name" => "featured",
	           "value" => array('show only featured property' => true),
	           "description" => ''
	        ),
	        array(
	           "type" => "checkbox",
	           "class" => "",
	           "heading" => "Random",
	           "param_name" => "random",
	           "value" => array('random order' => true),
	           "description" => ''
	        ),
	        array(
	           "type" => "textfield",
	           "class" => "",
	           "heading" => "Post Limit",
	           "param_name" => "limit",
	           "value" => "",
	           "description" => 'leave blank or set to 0 for unlimit post quantity'
	        ),
	        array(
	          "type" => "dropdown",
	          "holder" => "div",
	          "heading" => 'Style',
	          "param_name" => "style",
	          "value" => array(
	                        "Grid" => 'grid',
	                        "Carousel" => 'carousel',
	                      ),
	        ),
	        array(
	           "type" => "textfield",
	           "class" => "",
	           "heading" => "Interval",
	           "param_name" => "interval",
	           'dependency'  => array('element' => 'style', 'value' => array('carousel')),
	           "value" => "",
	           "description" => 'slide interval in milliseconds (leave blank to disable auto rotate)'
	        ),
	        array(
	           "type" => "dropdown",
	           "class" => "",
	           "heading" => "Items",
	           "param_name" => "items",
	           "value" => array(
	                        "3" => '3',
	                        "2" => '2',
	                        "1" => '1',
	                      ),
	           "description" => 'number of item displayed per row'
	        ),
	        
	     )
	  ) );
	  vc_add_param('vc_property', $el_class_attributes);

	  // Person
	  $posts = get_posts(array('post_type'=>'agent', 'posts_per_page'=>-1, 'suppress_filters'=>false));
	  // var_dump($posts);
	  if(is_array($posts)) {
		  foreach($posts as $post) {
		    $agents[$post->post_title] = $post->ID;
		  }
	  }
	  class WPBakeryShortCode_VC_Agent extends WPBakeryShortCode {}
	  vc_map( array(
	     "name" => "Agent",
	     "base" => "vc_agent",
	     "description" => 'Agent Listing',
	     "class" => "",
	     "category" => 'Content',
	     // "js_view" => 'VcFeatureView',
	     "icon" => 'icon-wpb-application-icon-large',
	     "params" => array(
	        array(
	           "type" => "checkbox",
	           "class" => "",
	           "heading" => "Filter Agent",
	           "param_name" => "post_in",
	           "value" => $agents,
	           "description" => 'select post to be shown, choose none to show all'
	        ),
	        array(
	           "type" => "textfield",
	           "class" => "",
	           "heading" => "Post Limit",
	           "param_name" => "limit",
	           "value" => "",
	           "description" => 'leave blank or set to 0 for unlimit post quantity'
	        ),
	        array(
	          "type" => "dropdown",
	          "holder" => "div",
	          "heading" => 'Style',
	          "param_name" => "style",
	          "value" => array(
	                        "Grid" => 'grid',
	                        "Carousel" => 'carousel',
	                      ),
	        ),
	        array(
	           "type" => "textfield",
	           "class" => "",
	           "heading" => "Interval",
	           "param_name" => "interval",
	           'dependency'  => array('element' => 'style', 'value' => array('carousel')),
	           "value" => "",
	           "description" => 'slide interval in milliseconds (leave blank to disable auto rotate)'
	        ),
	        array(
	           "type" => "dropdown",
	           "class" => "",
	           "heading" => "Items",
	           "param_name" => "items",
	           "value" => array(
	                        "1" => '1',
	                        "2" => '2',
	                        "3" => '3',
	                        "4" => '4',
	                      ),
	           "description" => 'number of item displayed per row'
	        ),
	        
	     )
	  ) );
	  vc_add_param('vc_agent', $el_class_attributes);

}