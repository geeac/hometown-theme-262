<?php

class LT_Widget_Property_Search extends WP_Widget {

	function lt_widget_property_search() {
		$widget_ops = array('classname' => 'widget-property-search', 'description' => 'Property Search Form' );
		$this->WP_Widget('property-search', FRAMEWORK_NAME.' - '.'Property Search Form', $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

		$type = $instance['type'];

		$search_pages = get_pages(array(
		    'meta_key' => '_wp_page_template',
		    'meta_value' => 'template-property-search.php'
		));
		if($search_pages) {
			$search_page_url = get_permalink($search_pages[0]->ID);
		} else {
			$search_page_url = get_post_type_archive_link('property');
		}

		ob_start();
		?>
<form method="post" action="<?php echo esc_url($search_page_url); ?>" class="property-search-form">
<input type="hidden" name="property-search" value="true" />
<div class="row">

	<div class="columns large-12 search-location">
		<label><?php _e('Property Location', 'theme_front'); ?></label>
		<select class="select-box" name="s-location">
			<option value=""><?php _e('Any', 'theme_front'); ?></option>
			<?php 
			$terms = get_terms( 'location', array('orderby' => 'none', 'hide_empty' => 1));
			$terms_sorted = array();
			nt_sort_terms_hierarchicaly($terms, $terms_sorted);
			foreach($terms_sorted as $term):
			?>
			<option value="<?php echo esc_attr($term->term_id); ?>" <?php if(nt_get_request('s-location') == $term->term_id) echo 'selected="selected"'; ?>><?php echo $term->name; ?></option>
				<?php foreach($term->children as $term_child): ?>
					<option value="<?php echo esc_attr($term_child->term_id); ?>" <?php if(nt_get_request('s-location') == $term_child->term_id) echo 'selected="selected"'; ?>>- <?php echo $term_child->name; ?></option>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="columns large-12 search-status">
		<label><?php _e('Property Status', 'theme_front'); ?></label>
		<select class="select-box" name="s-status">
			<option value=""><?php _e('Any', 'theme_front'); ?></option>
			<?php 
			$terms = get_terms( 'status', array('orderby' => 'none', 'hide_empty' => 1));
			$terms_sorted = array();
			nt_sort_terms_hierarchicaly($terms, $terms_sorted);
			foreach($terms_sorted as $term):
			?>
			<option value="<?php echo esc_attr($term->term_id); ?>" <?php if(nt_get_request('s-status') == $term->term_id) echo 'selected="selected"'; ?>><?php echo $term->name; ?></option>
				<?php foreach($term->children as $term_child): ?>
					<option value="<?php echo esc_attr($term_child->term_id); ?>" <?php if(nt_get_request('s-status') == $term_child->term_id) echo 'selected="selected"'; ?>>- <?php echo $term_child->name; ?></option>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="columns large-12 search-type">
		<label><?php _e('Property Type', 'theme_front'); ?></label>
		<select class="select-box" name="s-type">
			<option value=""><?php _e('Any', 'theme_front'); ?></option>
			<?php 
			$terms = get_terms( 'type', array('orderby' => 'none', 'hide_empty' => 1));
			$terms_sorted = array();
			nt_sort_terms_hierarchicaly($terms, $terms_sorted);
			foreach($terms_sorted as $term):
			?>
			<option value="<?php echo esc_attr($term->term_id); ?>" <?php if(nt_get_request('s-type') == $term->term_id) echo 'selected="selected"'; ?>><?php echo $term->name; ?></option>
				<?php foreach($term->children as $term_child): ?>
					<option value="<?php echo esc_attr($term_child->term_id); ?>" <?php if(nt_get_request('s-type') == $term_child->term_id) echo 'selected="selected"'; ?>>- <?php echo $term_child->name; ?></option>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</select>
	</div>
	
	<?php if($type == 'full'): ?>
	<div class="columns large-12 search-price">
		<?php 
			$meta = nt_get_meta_values('_meta_price', 'property');
			if(!$meta) $meta = array(0);

			// Remove non numeric value
			foreach($meta as $key => $m) {
				if(!is_numeric($m)) unset($meta[$key]);
			}

			$max = ceil(max($meta));
			$min = floor(min($meta));
			$exp = strlen($max-$min)-2;
			if($exp < 0) $exp = 0;
			$step = pow(10, $exp);
			$step = 10;
			$cur_min = nt_get_request('l-price');
			$cur_max = nt_get_request('u-price');
			if(!$cur_min) $cur_min = $min;
			if(!$cur_max) $cur_max = $max;
		?>
		<label><?php _e('Price', 'theme_front'); ?> <small class="right"><span class="lower"><?php echo nt_currency($cur_min); ?></span> - <span class="upper"><?php echo nt_currency($cur_max); ?></span></small></label>
		<div class="rangeSlider" data-min="<?php echo esc_attr($min); ?>" data-max="<?php echo esc_attr($max); ?>" data-cmin="<?php echo esc_attr($cur_min); ?>" data-cmax="<?php echo esc_attr($cur_max); ?>" data-step="<?php echo esc_attr($step); ?>" data-margin="<?php echo esc_attr($step); ?>"></div>
		<input type="hidden" name="l-price" class="lower" />
		<input type="hidden" name="u-price" class="upper" />
	</div>
	<div class="columns large-12 search-area">
		<?php 
			$meta = nt_get_meta_values('_meta_area', 'property');
			if(!$meta) $meta = array(0);

			// Remove non numeric value
			foreach($meta as $key => $m) {
				if(!is_numeric($m)) unset($meta[$key]);
			}
			
			$max = ceil(max($meta));
			$min = floor(min($meta));
			$exp = strlen($max-$min)-2;
			if($exp < 0) $exp = 0;
			$step = pow(10, $exp);
			$step = 10;
			$cur_min = nt_get_request('l-area');
			$cur_max = nt_get_request('u-area');
			if(!$cur_min) $cur_min = $min;
			if(!$cur_max) $cur_max = $max;
		?>
		<label><?php _e('Area', 'theme_front'); ?> <small class="right"><span class="lower"><span><?php echo number_format($cur_min); ?></span> <?php echo nt_get_option('property', 'area'); ?></span> - <span class="upper"><span><?php echo number_format($cur_max); ?></span> <?php echo nt_get_option('property', 'area'); ?></span> </small></label>
		<div class="rangeSlider" data-min="<?php echo esc_attr($min); ?>" data-max="<?php echo esc_attr($max); ?>" data-cmin="<?php echo esc_attr($cur_min); ?>" data-cmax="<?php echo esc_attr($cur_max); ?>" data-step="<?php echo esc_attr($step); ?>" data-margin="<?php echo esc_attr($step); ?>"></div>
		<input type="hidden" name="l-area" class="lower" />
		<input type="hidden" name="u-area" class="upper" />
	</div>
	<?php endif; ?>
	<div class="columns large-12 search-submit">
		<label class="hidden"><?php _e('Search', 'theme_front'); ?></label>
		<input type="submit" value="<?php _e('Search', 'theme_front'); ?>" class="lt-button primary" />
	</div>
</div>
</form>

		<?php
		$output = ob_get_clean();
		
		if ( !empty( $output ) ) {
			echo $before_widget;
			if ( $title )
				echo $before_title . $title . $after_title;
			echo $output;
			echo $after_widget;
		}
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['type'] = strip_tags($new_instance['type']);
		return $instance;
	}

	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$type = isset($instance['type']) ? esc_attr($instance['type']) : 'latest';
		
?>
		<p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo 'Title'; ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo esc_attr($this->get_field_id('type')); ?>">Type</label>
			<select id="<?php echo esc_attr($this->get_field_id('type')); ?>" name="<?php echo esc_attr($this->get_field_name('type')); ?>" class="widefat"> 
				<option value="compact" <?php echo ($type == 'compact') ? 'selected="selected"' : ''; ?>>Compact</option>
				<option value="full" <?php echo ($type == 'full') ? 'selected="selected"' : ''; ?>>Full</option>
			</select>
		</p>

		

<?php
	}
}
register_widget('lt_widget_property_search');