<?php get_header(); ?>

<?php
echo "<div class='previous_post_link'>";

echo "<div class='previous btn btn-dark'>";
previous_post_link();
echo "</div>";
echo  " ";

echo "<div class='next btn btn-dark'>";
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

<?php get_footer(); ?>

<style type="text/css">
	/* 222D32 */
	body {
		background-color: #FFB3AB;
	}

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

	.commnets_inner {
		display: none;
	}

	.comments {
		display: none;
	}

	.text_single {
		background-color: #C64949;
		color: black;
		font-style: italic;
	}

	.date_single {
		font-weight: bold;
	}
</style>