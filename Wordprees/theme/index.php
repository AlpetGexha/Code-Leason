      <?php get_header();?>
<article>
	<div class="container mt-5">
		<div class="col1">
<?php
global $wp_query;

/*
$args = [
'post_type' => 'post',
// 'cat' => '14,18, - 48',
//'category_in' => array("14","15", - "16"),
'orderby' => 'name',
'order' => 'asc', //desc
'post_per_page' => 10
];

$wp_query = new wp_query($args);

if ($wp_query-> have_posts()) {
	while ($wp_query-> have_posts()) {
		$wp_query -> the_post();
		echo apply_filters('the_title',$wp_query -> post->post_title);
		echo apply_filters('the_content',$wp_query -> post->post_content);
	}
}
*/

if (have_posts()){
	while (have_posts()){
		the_post();//postimet
		/*
		the_title();//titullat
		the_tags();//tagat
		the_content();
		*/
		get_template_part('template-parts/content','archive');
	 }
echo "<br>";
echo "<br>";
	// posts_nav_link();
  
 }
?>



<?php 
/*
$args = array (
'post_type' => 'movies',
'posts_per_page' => 10
);

$the_query = new WP_Query($args);

if ($the_query -> have_posts() ) {
	while ($the_query -> have_posts()) {
		$the_query  -> the_post();
		get_template_part('template-parts/content','archive-movies');
	}
}
*/
?>


<?php the_posts_pagination();?>
</div>
<div class="col2">
<?php 
dynamic_sidebar('sidebar-1');
?>
</div>


</div>
</article>
<?php get_footer();?>

<style type="text/css">
	.nav-links{
		padding: 20px;
		height: 15%;

	}
	.page-numbers{
		justify-content: center;
		width: auto;
		height: auto;
		background-color: #478fff;
		border: solid black 1px;
		border-radius: 4px;
		padding: 15px;
		text-decoration: none;
		color: black;
	}
	.current{
		font-weight: bold;
		background-color: #2379FF;
	}
</style>