<?php get_header(); ?>
<div class="container mt-5">
<div class="col1">
<?php 
if (have_posts()){
	while (have_posts()){
		the_post();
		get_template_part('template-parts/content','archive');
		echo "<br>";
	 } 
 }
?>
</div>
 
 <div class="col2">
<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>

</div>
<?php get_footer(); ?>



<style type="text/css">
	.container{
		display: flex;
		flex-wrap: wrap;
		flex-direction: row;
		justify-content: center;
	}

	
 .col1{
  width: 79%;
  height: 25%;
 }

.col2{
	display: flex;
	flex-direction: column;	
	justify-content: flex-start;
	flex-wrap: wrap;
	width:21%;
	padding-left: 50px;
	align-items: center;
	border :solid 1px black;
}
 .col2 img{
  width: 280px !important;
  height: 400px !important;
 }

</style>