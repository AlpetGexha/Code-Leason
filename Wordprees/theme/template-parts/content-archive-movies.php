	<div class="container mt-5">
		<div class="post_movie">
			<div class="titulli"><?php the_title(); ?></div><br>
			<div class="body"> <?php the_excerpt(); ?></div>
			<a href="<?php the_permalink(); ?>">Read more</a>
		</div>

	</div>
<style type="text/css">
body {
	background-color: #FFB3AB;
}

.nav-links {
	padding: 20px;
	height: 15%;

}

.page-numbers {
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

.current {
	font-weight: bold;
	background-color: #2379FF;
}

.titulli {
	font-weight: bold;
	text-shadow: 2px 2px 1px red;
	font-size: 41px;
}

.body {
	font-style: italic;
	font-weight: bold;
	padding: 10px;
	font-size: 22px;

}

.post_movie {
	background-color: #C64949;
	display: flex;
	flex-direction: row;
	flex-wrap: wrap;
	justify-content: center;
	padding: 23px;
	border: solid black 1px;
	border-radius: 5px;
	position: relative;
	-webkit-box-shadow: 5px 5px 12px 5px rgba(205, 0, 0, 0.77);
	box-shadow: 5px 5px 12px 5px rgba(205, 0, 0, 0.77);
}
</style>