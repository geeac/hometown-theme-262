<?php
$post_id = get_queried_object_id();	
$search_pages = get_pages(array(
    'meta_key' => '_wp_page_template',
    'meta_value' => 'template-property-search.php'
));
if($search_pages) {
	$search_page_id = $search_pages[0]->ID;
}


$search_layout = get_post_meta( $post_id, '_hero_property_search_style', true );;
?>
<div class="property-search-box-wrap">
<div class="row">
<div class="columns large-12">
<div class="property-search-box">
<form method="get" action="<?php echo home_url(); ?>" class="property-search-form">

<?php if(isset($search_page_id)): ?>
	<input type="hidden" name="page_id" value="<?php echo $search_page_id; ?>" />
<?php else: ?>
	<input type="hidden" name="post_type" value="<?php echo nt_get_option('property', 'slug', 'property'); ?>" />
<?php endif; ?>

<input type="hidden" name="property-search" value="true" />
<div class="row">
	
	<?php if($search_layout != 'compact'): ?>
	<div class="columns large-2 medium-4 search-id">
		<label><?php _e('Property ID', 'theme_front'); ?></label>
		<input type="text" name="property-id" placeholder="<?php _e('Any', 'theme_front'); ?>" value="<?php echo esc_attr(nt_get_request('property-id')); ?>" />
	</div>
	<?php endif; ?>

	<div class="columns large-4 medium-4 search-location">
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
	<div class="columns large-3 medium-4 small-6 search-status">
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
	<div class="columns large-3 medium-4 small-6 search-type">
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
	
	<?php if($search_layout != 'compact'): ?>
	<div class="vspace show-for-large-up"></div>
	<?php endif; ?>

	<?php if($search_layout != 'compact'): ?>
	<div class="columns large-2 medium-4 small-6 search-bed">
		<label><?php _e('Min Beds', 'theme_front'); ?></label>
		<select class="select-box" name="min-bed">
			<option value=""><?php _e('Any', 'theme_front'); ?></option>
			<?php 
				$meta = nt_get_meta_values('_meta_bedroom', 'property');
				$max = floor(max($meta));
				for($i=1; $i<=$max; $i++): 
			?>
				<option value="<?php echo esc_attr($i); ?>" <?php if(nt_get_request('min-bed') == $i) echo 'selected="selected"'; ?>><?php echo $i; ?></option>
			<?php endfor; ?>
		</select>
	</div>
	<?php endif; ?>

	<?php if($search_layout != 'compact'): ?>
	<div class="columns large-2 medium-4 small-6 search-bath">
		<label><?php _e('Min Baths', 'theme_front'); ?></label>
		<select class="select-box" name="min-bath">
			<option value=""><?php _e('Any', 'theme_front'); ?></option>
			<?php 
				$meta = nt_get_meta_values('_meta_bathroom', 'property');
				$max = floor(max($meta));
				for($i=1; $i<=$max; $i++): 
			?>
				<option value="<?php echo esc_attr($i); ?>" <?php if(nt_get_request('min-bath') == $i) echo 'selected="selected"'; ?>><?php echo $i; ?></option>
			<?php endfor; ?>
		</select>
	</div>
	<?php endif; ?>

	<?php if($search_layout != 'compact'): ?>
	<div class="columns large-3 medium-6 search-price">
		<?php 
			$meta = nt_get_meta_values('_meta_price', 'property');
			if(!$meta) $meta = array(0,100);

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
	<?php endif; ?>

	<?php if($search_layout != 'compact'): ?>
	<div class="columns large-3 medium-6 search-area">
		<?php 
			$meta = nt_get_meta_values('_meta_area', 'property');
			if(!$meta) $meta = array(0,100);
			
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
		<label><?php _e('Area', 'theme_front'); ?> <small class="right"><span class="lower"><span></span> <?php echo nt_get_option('property', 'area'); ?></span> - <span class="upper"><span></span> <?php echo nt_get_option('property', 'area'); ?></span> </small></label>
		<div class="rangeSlider" data-min="<?php echo esc_attr($min); ?>" data-max="<?php echo esc_attr($max); ?>" data-cmin="<?php echo esc_attr($cur_min); ?>" data-cmax="<?php echo esc_attr($cur_max); ?>" data-step="<?php echo esc_attr($step); ?>" data-margin="<?php echo esc_attr($step); ?>" ></div>
		<input type="hidden" name="l-area" class="lower" />
		<input type="hidden" name="u-area" class="upper" />
	</div>
	<?php endif; ?>

	<div class="columns large-2 search-submit">
		<label class="hidden"><?php _e('Search', 'theme_front'); ?></label>
		<input type="submit" value="<?php _e('Search', 'theme_front'); ?>" class="lt-button primary" />
	</div>
</div>
</form>
</div>
</div>
</div>
</div>