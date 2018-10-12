<?php

if(function_exists('vc_set_as_theme')) {


  include('js_composer-param-icon.php');

  vc_set_as_theme(true);
  vc_disable_frontend();

  $dir = get_template_directory() . '/vc-template/';
  vc_set_template_dir($dir);

  vc_remove_element("vc_button2");
  vc_remove_element("vc_cta_button");
  vc_remove_element("vc_cta_button2");
  vc_remove_element("vc_pie");
  vc_remove_element("vc_progress_bar");
  vc_remove_element("vc_flickr");
  vc_remove_element("vc_wp_search");
  vc_remove_element("vc_wp_meta");
  vc_remove_element("vc_wp_recentcomments");
  vc_remove_element("vc_wp_calendar");
  vc_remove_element("vc_wp_pages");
  vc_remove_element("vc_wp_tagcloud");
  vc_remove_element("vc_wp_custommenu");
  vc_remove_element("vc_wp_text");
  vc_remove_element("vc_wp_posts");
  vc_remove_element("vc_wp_links");
  vc_remove_element("vc_wp_categories");
  vc_remove_element("vc_wp_archives");
  vc_remove_element("vc_wp_rss");
  vc_remove_element("vc_facebook");
  vc_remove_element("vc_tweetmeme");
  vc_remove_element("vc_googleplus");
  vc_remove_element("vc_pinterest");
  vc_remove_element("vc_message");
  vc_remove_element("vc_tour");
  vc_remove_element("vc_posts_slider");
  vc_remove_element("vc_posts_grid");
  vc_remove_element("vc_carousel");

  vc_remove_element("vc_icon");
  vc_remove_element("vc_media_grid");
  vc_remove_element("vc_masonry_media_grid");
  vc_remove_element("vc_basic_grid");
  vc_remove_element("vc_masonry_grid");

  // De-register post grid
  function nt_custom_unregister_theme_post_types() {
      global $wp_post_types;
      foreach( array( 'vc_grid_item' ) as $post_type ) {
          if ( isset( $wp_post_types[ $post_type ] ) ) {
              unset( $wp_post_types[ $post_type ] );
          }
      }
  }
  add_action( 'init', 'nt_custom_unregister_theme_post_types', 20 );

  // Custom Row Class
  add_filter('vc_shortcodes_css_class', 'custom_css_classes_for_vc_row_and_vc_column', 10, 2);
  function custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
    if ($tag=='vc_row' || $tag=='vc_row_inner') {
      // $class_string = str_replace('vc_row-fluid', '', $class_string);
      // $class_string = str_replace('vc_row', '', $class_string);
      // $class_string = str_replace('wpb_row', '', $class_string);
    }
    if ($tag=='vc_column' || $tag=='vc_column_inner') {
      // $class_string = str_replace('wpb_column', '', $class_string);
      // $class_string = str_replace('column_container', '', $class_string);
      $class_string = preg_replace('/vc_col-sm-(\d{1,2})/', 'vc_col-sm-$1 large-$1 columns', $class_string);
    }
    $class_string = trim($class_string);
    return $class_string;
  }

  // Un-Register Style & JS
  add_action( 'wp_enqueue_scripts', 'lt_unregister_js_composer_style_js' );
  function lt_unregister_js_composer_style_js() {
      wp_deregister_style('js_composer_front');
      wp_deregister_style('js_composer_custom_css');
      wp_deregister_script('wpb_composer_front_js');
  }

  // Standard Param
  $animate_attributes = array(
    'type' => 'dropdown',
    'heading' => "Animation",
    'param_name' => 'animate',
    'description' => "",
    "value" => Array(
      "None" => '',
      "Fade" => 's-fade',
      "Short from Left" => 's-left',
      "Short from Right" => 's-right',
      "Short from Top" => 's-top',
      "Short from Bottom" => 's-bottom',
    )
  );
  $el_class_attributes =array(
    'type' => 'textfield',
    'heading' => 'Extra class name',
    'param_name' => 'el_class',
    'description' => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
  );

  // Carousel
  vc_remove_param('vc_images_carousel', 'title');
  vc_remove_param('vc_images_carousel', 'img_size');
  vc_remove_param('vc_images_carousel', 'onclick');
  vc_remove_param('vc_images_carousel', 'custom_links');
  vc_remove_param('vc_images_carousel', 'custom_links_target');
  vc_remove_param('vc_images_carousel', 'mode');
  vc_remove_param('vc_images_carousel', 'speed');
  vc_remove_param('vc_images_carousel', 'slides_per_view');
  vc_remove_param('vc_images_carousel', 'autoplay');
  vc_remove_param('vc_images_carousel', 'hide_pagination_control');
  vc_remove_param('vc_images_carousel', 'hide_prev_next_buttons');
  vc_remove_param('vc_images_carousel', 'partial_view');
  vc_remove_param('vc_images_carousel', 'wrap');
  vc_remove_param('vc_images_carousel', 'el_class');
  $col_attributes = array(
    'type' => 'textfield',
    'heading' => "Slider speed",
    'param_name' => 'speed',
    'description' => "set to 0 to disable autoplay",
    "value" => '5000'
  );
  vc_add_param('vc_images_carousel', $col_attributes);
  $col_attributes = array(
    'type' => 'textfield',
    'heading' => "Items",
    'param_name' => 'items',
    'description' => "number of items displayed at a time",
    "value" => '5'
  );
  vc_add_param('vc_images_carousel', $col_attributes);
  $col_attributes = array(
    'type' => 'textfield',
    'heading' => "Margin",
    'param_name' => 'margin',
    'description' => "margin between item in px unit",
    "value" => '0'
  );
  vc_add_param('vc_images_carousel', $col_attributes);
  vc_add_param('vc_images_carousel', $el_class_attributes);

  // Button
  vc_remove_param('vc_button', 'color');
  vc_remove_param('vc_button', 'icon');
  vc_remove_param('vc_button', 'size');
  vc_remove_param('vc_button', 'el_class');
  $params = array(
    array(
      'type' => 'nt_icon',
      'heading' => 'Icon',
      'param_name' => 'icon',
      'description' => '',
      'default' => '',
    ),
    array(
      'type' => 'dropdown',
      'heading' => 'Icon Position',
      'param_name' => 'icon_position',
      'description' => '',
      'default' => 'left',
      'value' => Array('Left' => 'left', 'Right' => 'right')
    ),
    array(
      'type' => 'dropdown',
      'heading' => 'Style',
      'param_name' => 'style',
      'description' => '',
      'default' => 'primary',
      'value' => Array('Primary' => 'primary', 'Secondary' => 'secondary')
    ),
    array(
      'type' => 'colorpicker',
      'heading' => 'Color',
      'param_name' => 'color',
      'description' => '',
      'dependency'  => array('element' => 'style', 'value' => array('primary')),
      'default' => '',
      'value' => ''
    ),
    array(
      'type' => 'dropdown',
      'heading' => 'Alignment',
      'param_name' => 'align',
      'description' => '',
      'default' => 'left',
      'value' => Array('Left' => 'left', 'Center' => 'center', 'Right' => 'right')
    ),
    array(
      'type' => 'dropdown',
      'heading' => 'Size',
      'param_name' => 'size',
      'description' => '',
      'default' => 'regular',
      'value' => Array('Regular' => 'regular', 'Large' => 'large', 'Small' => 'small')
    ),

  );
  vc_add_params('vc_button', $params);
  vc_add_param('vc_button', $el_class_attributes);

  // Text Separator
  vc_remove_param('vc_text_separator', 'color');
  vc_remove_param('vc_text_separator', 'accent_color');
  vc_remove_param('vc_text_separator', 'style');
  vc_remove_param('vc_text_separator', 'el_width');
  vc_remove_param('vc_text_separator', 'el_class');
  $params = array(
    array(
      "type" => "textfield",
      "heading" => "Sub Title",
      "param_name" => "sub_title",
      "value" => '',
    ),
    array(
      "type" => "dropdown",
      "heading" => "Sub Title Position",
      "param_name" => "sub_title_position",
      'value' => Array('After Title' => 'after', 'Before Title' => 'before')
    ),
  );
  vc_add_params('vc_text_separator', $params);
  vc_add_param('vc_text_separator', $el_class_attributes);

  // Tabs
  vc_remove_param('vc_tabs', 'title');
  vc_remove_param('vc_tabs', 'interval');

  // Accordion
  vc_remove_param('vc_accordion', 'title');

  // Row
  vc_remove_param('vc_row', 'font_color');
  vc_remove_param('vc_row', 'parallax');
  vc_remove_param('vc_row', 'parallax_image');
  $params = array(
    array(
      "type" => "dropdown",
      "heading" => 'Layout',
      "param_name" => "layout",
      "value" => array(
                        "Boxed" => 'boxed',
                        "Stretch" => 'stretch',
                        "Stretch without Padding" => 'stretch no-padding'
                      ),
    ),
    array(
      "type" => "dropdown",
      "heading" => 'Element Color',
      "param_name" => "element_color",
      "value" => array(
                        "Dark (for light BG)" => '',
                        "Light (for dark BG)" => 'light'
                      ),
    ),
  );
  vc_add_params('vc_row', $params);

  // Image
  vc_remove_param('vc_single_image', 'style');
  vc_remove_param('vc_single_image', 'el_class');
  $params = array(
    array(
      "type" => "dropdown",
      "heading" => 'Style',
      "param_name" => "style",
      "value" => array(
                        "None" => '',
                        "Round" => 'round',
                        "Circle" => 'circle',
                        "Drop Shadow" => 'shadow'
                      ),
    ),
  );
  vc_add_params('vc_single_image', $params);
  vc_add_param('vc_single_image', $el_class_attributes);

  // Gallery
  vc_remove_param('vc_gallery', 'el_class');
  vc_remove_param('vc_gallery', 'title');
  vc_remove_param('vc_gallery', 'type');
  vc_remove_param('vc_gallery', 'interval');
  $params = array(
    array(
      "type" => "textfield",
      "heading" => 'Interval',
      "param_name" => "interval",
      "value" => '',
      "description"  => 'slide interval in milliseconds (leave blank to disable auto rotate)'
    ),
  );
  vc_add_params('vc_gallery', $params);
  vc_add_param('vc_gallery', $el_class_attributes);

  // Property
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
          "type" => "dropdown",
          "heading" => 'Type',
          "param_name" => "type",
          "value" => array(
                        "Latest" => 'latest',
                        "Featured" => 'featured',
                      ),
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

  // Post
  class WPBakeryShortCode_VC_Post extends WPBakeryShortCode {}
  vc_map( array(
     "name" => "Post",
     "base" => "vc_post",
     "description" => 'Post Listing',
     "class" => "",
     "category" => 'Content',
     "icon" => 'icon-wpb-application-icon-large',
     "params" => array(
        // array(
        //   "type" => "checkbox",
        //   "heading" => 'Include',
        //   "param_name" => "include",
        //   "value" => array(
        //                 "Grid" => 'grid',
        //                 "Carousel" => 'carousel',
        //               ),
        // ),
        array(
           "type" => "textfield",
           "class" => "",
           "heading" => "Post Limit",
           "param_name" => "limit",
           "value" => "",
           "description" => 'leave blank or set to 0 for unlimit post quantity'
        ),
        array(
           "type" => "checkbox",
           "class" => "",
           "heading" => "Show Excerpt",
           "param_name" => "show_excerpt",
           "value" => array('Enable'=>'true'),
           "description" => ''
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
                        "4" => '4',
                        "3" => '3',
                        "2" => '2',
                        "1" => '1',
                      ),
           "description" => 'number of item displayed per row'
        ),
     )
  ) );
  vc_add_param('vc_property', $el_class_attributes);

  // Icon Box
  class WPBakeryShortCode_VC_Icon_Box extends WPBakeryShortCode {}
  vc_map( array(
     "name" => "Icon Box",
     "description" => 'Icon Box',
     "base" => "vc_icon_box",
     "class" => "",
     "category" => 'Content',
     "icon" => 'icon-wpb-vc_carousel',
     "params" => array(
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => "Title",
           "param_name" => "title",
           "value" => "Title",
           "description" => ''
        ),
        array(
           "type" => "textarea",
           "class" => "",
           "heading" => "Content",
           "param_name" => "content",
           "value" => '',
           "description" => ''
        ),
        array(
          "type" => "dropdown",
          "heading" => 'Style',
          "param_name" => "style",
          "value" => array(
                        "Icon Top" => 'icon-top',
                        "Icon Left" => 'icon-left',
                      ),
        ),
        array(
           "type" => "nt_icon",
           "class" => "",
           "heading" => "Icon",
           "param_name" => "icon",
           "value" => '',
           "description" => ''
        ),
        array(
           "type" => "textfield",
           "class" => "",
           "heading" => "Button Text",
           "param_name" => "button_text",
           "value" => "",
           "description" => ''
        ),
        array(
           "type" => "vc_link",
           "class" => "",
           "heading" => "Button Link",
           "param_name" => "button_link",
           "value" => "",
           "description" => ''
        ),
     )
  ) );

  // Teaser Box
  class WPBakeryShortCode_VC_Teaser_Box extends WPBakeryShortCode {}
  vc_map( array(
     "name" => "Teaser Box",
     "description" => 'Teaser Box',
     "base" => "vc_teaser_box",
     "class" => "",
     "category" => 'Content',
     "icon" => 'icon-wpb-vc_carousel',
     "params" => array(
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => "Title",
           "param_name" => "title",
           "value" => "Title",
           "description" => ''
        ),
        array(
           "type" => "textarea",
           "class" => "",
           "heading" => "Content",
           "param_name" => "content",
           "value" => '',
           "description" => ''
        ),
        array(
           "type" => "attach_image",
           "class" => "",
           "heading" => "Image",
           "param_name" => "image",
           "value" => '',
           "description" => '',
        ),      
        array(
           "type" => "textfield",
           "class" => "",
           "heading" => "Button Text",
           "param_name" => "button_text",
           "value" => "",
           "description" => ''
        ),
        array(
           "type" => "vc_link",
           "class" => "",
           "heading" => "Button Link",
           "param_name" => "button_link",
           "value" => "",
           "description" => ''
        ),
     )
  ) );

  // Running
  class WPBakeryShortCode_VC_Stat extends WPBakeryShortCode {}
  vc_map( array(
     "name" => "Running Stat",
     "description" => 'Running Stat',
     "base" => "vc_stat",
     "icon" => "icon-wpb-vc_carousel",
     "category" => 'Content',
     "params" => array(
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => "Title",
           "param_name" => "title",
           "value" => "title"
        ),
        array(
           "type" => "textfield",
           "class" => "",
           "heading" => "Number",
           "param_name" => "number",
           "value" => "100"
        ),
        array(
           "type" => "textfield",
           "class" => "",
           "heading" => "Unit",
           "param_name" => "unit",
           "value" => ''
        ),
        array(
           "type" => "nt_icon",
           "class" => "",
           "heading" => "Icon",
           "param_name" => "icon",
           "value" => '',
           "description" => ''
        ),
        
     )
  ) );

  // Twitter
  class WPBakeryShortCode_NT_Twitter extends WPBakeryShortCode {}
  vc_map( array(
     "name" => "Twitter",
     "description" => 'Twitter Feed Box',
     "base" => "vc_twitter",
     "icon" => "icon-wpb-tweetme",
     "category" => 'Content',
     "params" => array(
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => "Twitter Account",
           "param_name" => "account",
           "value" => "twitter",
           "description" => ""
        )
     )
  ) );

  // Testimonial
  if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
      class WPBakeryShortCode_VC_Testimonial extends WPBakeryShortCodesContainer {
      }
  }
  vc_map( array(
      "name" => "Testimonial Container",
      "base" => "vc_testimonial",
      "as_parent" => array('only' => 'vc_testimonial_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
      "content_element" => true,
      'icon' => 'icon-wpb-atm',
      "show_settings_on_create" => false,
      "params" => array(
        // add params same as with any other content element
        array(
          "type" => "textfield",
          "heading" => 'Interval',
          "param_name" => "interval",
          "value" => '',
          "description"  => 'slide interval in milliseconds (leave blank to disable auto rotate)'
        ),
        array(
            "type" => "textfield",
            "heading" => "Extra class name",
            "param_name" => "el_class",
            "description" => "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file."
        )
      ),
      "js_view" => 'VcColumnView',
  ) );
  class WPBakeryShortCode_VC_Testimonial_Item extends WPBakeryShortCode {}
  vc_map( array(
      "name" => "Testimonial Item",
      "base" => "vc_testimonial_item",
      "content_element" => true,
      'icon' => 'icon-wpb-atm',
      "as_child" => array('only' => 'vc_testimonial'), // Use only|except attributes to limit parent (separate multiple values with comma)
      // "js_view" => 'VcIconListView',
      "params" => array(
          // add params same as with any other content element
          array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Name",
            "param_name" => "name",
            "description" => ''
          ),
          array(
            "type" => "textfield",
            // "holder" => "div",
            "heading" => "Meta",
            "param_name" => "meta",
            "description" => "job position, organization, etc."
          ),
          array(
            "type" => "dropdown",
            // "holder" => "div",
            "heading" => "Rating",
            "param_name" => "rating",
            "description" => "0-5",
            "value" => array(
              "5" => '5',
              "4" => '4',
              "3" => '3',
              "2" => '2',
              "1" => '1',
              "0" => '0',
              ),
          ),
          array(
            "type" => "textarea",
            "heading" => "Quote",
            "param_name" => "quote",
            "description" => ""
          ),
      ),
  ) );

  // Icon List
  if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
      class WPBakeryShortCode_VC_Icon_List extends WPBakeryShortCodesContainer {
      }
  }
  vc_map( array(
      "name" => "Icon List Container",
      "base" => "vc_icon_list",
      "as_parent" => array('only' => 'vc_icon_list_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
      "content_element" => true,
      'icon' => 'icon-wpb-atm',
      "show_settings_on_create" => false,
      "params" => array(
          // add params same as with any other content element
        array(
          "type" => "dropdown",
          "heading" => 'Style',
          "param_name" => "style",
          "default" => 'small',
          "value" => array(
                            "Small" => 'small',
                            "Big" => 'big',
                          ),
        ),
        array(
          "type" => "dropdown",
          "heading" => 'Icon Position',
          "param_name" => "icon_position",
          "default" => 'icon-left',
          "value" => array(
                            "Left" => 'icon-left',
                            "Right" => 'icon-right',
                          ),
        ),
        array(
            "type" => "textfield",
            "heading" => "Extra class name",
            "param_name" => "el_class",
            "description" => "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file."
        )
      ),
      "js_view" => 'VcColumnView'
  ) );
  if ( class_exists( 'WPBakeryShortCode' ) ) {
      class WPBakeryShortCode_VC_Icon_List_Item extends WPBakeryShortCode {
      }
  }
  vc_map( array(
      "name" => "Icon List Item",
      "base" => "vc_icon_list_item",
      "content_element" => true,
      'icon' => 'icon-wpb-atm',
      "as_child" => array('only' => 'vc_icon_list'), // Use only|except attributes to limit parent (separate multiple values with comma)
      "params" => array(
          // add params same as with any other content element
          array(
            "type" => "textarea",
            "holder" => "div",
            "heading" => "Content",
            "param_name" => "title",
          ),
          array(
             "type" => "nt_icon",
             "class" => "",
             "heading" => "Icon",
             "param_name" => "icon",
             "value" => '',
             "description" => ''
          ),
      )
  ) );

  // Animated Box
  if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
      class WPBakeryShortCode_VC_Animate_Box extends WPBakeryShortCodesContainer {
      }
  }
  vc_map( array(
      "name" => "Animate Container",
      "base" => "vc_animate_box",
      "as_parent" => array('only' => 'vc_single_image'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
      "content_element" => true,
      'icon' => 'icon-wpb-atm',
      "show_settings_on_create" => false,
      "params" => array(
        
        array(
            "type" => "textfield",
            "heading" => "Extra class name",
            "param_name" => "el_class",
            "description" => "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file."
        )
      ),
      "js_view" => 'VcColumnView'
  ) );

  return;
















  // Anchor
  class WPBakeryShortCode_VC_Anchor extends WPBakeryShortCode {}
  vc_map( array(
     "name" => "Anchor",
     "base" => "vc_anchor",
     "icon" => "icon-anchor",
     "category" => 'Content',
     "js_view" => 'VcGapView',
     "params" => array(
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => "ID",
           "param_name" => "id",
           "value" => '',
           "description" => "you can use this value as an anchor point"
        )
     )
  ) );












  //Register "container" content element. It will hold all your inner (child) content elements
  if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
      class WPBakeryShortCode_VC_Animate_Box extends WPBakeryShortCodesContainer {
      }
  }
  vc_map( array(
      "name" => "Animate Container",
      "base" => "vc_animate_box",
      "as_parent" => array('only' => 'vc_single_image'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
      "content_element" => true,
      'icon' => 'icon-image',
      "show_settings_on_create" => false,
      "params" => array(
        
        array(
            "type" => "textfield",
            "heading" => "Extra class name",
            "param_name" => "el_class",
            "description" => "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file."
        )
      ),
      "js_view" => 'VcColumnView'
  ) );


}