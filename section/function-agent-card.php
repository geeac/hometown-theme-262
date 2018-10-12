<?php
function nt_agent_card($post_id) {
	$role = get_post_meta( $post_id, '_meta_role', true );
?>
<div class="card">
<div class="img-wrap">
	<a href="<?php echo get_the_permalink($post_id); ?>"><?php echo get_the_post_thumbnail($post_id, 'card'); ?></a>
</div>
<div class="content-wrap align-center">
<div class="title"><a href="<?php echo get_the_permalink($post_id); ?>"><?php echo get_the_title($post_id); ?></a></div>
<ul class="meta-list">
<li><?php echo wp_kses_data($role); ?></li>
</ul>
</div>
</div>
<?php } ?>