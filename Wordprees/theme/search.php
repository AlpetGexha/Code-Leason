<style type="text/css">
	.post_found {
		font-style: oblique;
		font-size: 25px;
	}
</style>

<?php get_header(); ?>
<div class="container mt-5">
	<article>

		<div class="post_found">
			U qetën <?php echo $total_results = $wp_query->have_posts(); ?> postime
		</div>
		<?php
		global $wp_query;
		if (have_posts()) {
			while (have_posts()) {
				the_post();
				get_template_part('template-parts/content', 'archive');
			}
		}
		?>
</div>
</article>
<?php get_footer(); ?>