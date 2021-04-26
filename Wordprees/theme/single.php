<?php get_header(); ?>
<article>
	<?php
	echo "<div class='previous_post_link'>";

	echo "<div class='previous btn btn-secondary'>";
	previous_post_link();
	echo "</div>";
	echo  " ";

	echo "<div class='next btn btn-secondary'>";
	next_post_link();
	echo "</div>";


	echo "</div>";
	echo "</div>";

	if (have_posts()) {

		while (have_posts()) {
			the_post();
			get_template_part('template-parts/content', 'article');
		}
	}

	?>

	<style type="text/css">
		.previous_post_link {
			width: 310px;
			margin-left: 50px;
		}

		.previous_post_link a {
			text-decoration: none;
			color: red;
			font-weight: bold;
			font-style: italic;
		}
	</style>