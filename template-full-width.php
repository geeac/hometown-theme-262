<?php 
// Template Name: Full Width
get_header(); ?>

<div class="main-content">
<?php while ( have_posts() ) : the_post(); ?>
	<?php 
		if(strpos($post->post_content,'vc_row') !== false) {
			the_content();
		} else {
			echo '<div class="section"><div class="row"><div class="large-12 columns">';
			the_content();
			echo '</div></div></div>';
		}
	?>
<?php endwhile; ?>
</div><!-- #content -->

<?php get_footer(); ?>