<?php if(function_exists('icl_get_languages') && nt_get_option('header', 'show_wpml', 'on') == 'on'): 
	$languages = icl_get_languages('skip_missing=0&orderby=custom');
	// var_dump($languages);
?>
<ul class="nav-language menu type-<?php echo nt_get_option('header', 'wpml_switcher_type', 'text'); ?>">
<?php 
	foreach($languages as $l) {
		if(!$l['active']) {
            echo '<li><a href="'.esc_url($l['url']).'">';
        } else {
            echo '<li class="active"><a href="#">';
        }
        if(nt_get_option('header', 'wpml_switcher_type', 'text') == 'text') {
        	echo $l['language_code'];
        } else {
        	echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
        }
        echo '</a></li>';
	}
?>
</ul>
<?php endif; ?>