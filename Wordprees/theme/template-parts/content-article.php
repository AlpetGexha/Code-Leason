<div class="container mt-5">
	<div class="title_single"><b><i><?php the_title(); ?></i></b>
	</div>
	<div class="img_single">
		<?php the_post_thumbnail('large'); ?>
	</div>
	<div class="text_single">
		<?php the_content(); ?>
		<div class="tags_single"><?php the_tags(); ?></div><br>
		<div class="date_single"><?php the_date(); ?></div>
	</div>

	<?php comments_template(); ?>
	<div class="commnets_inner">
		<?php
		wp_list_comments(array(
			'avatar_size' => '20',
			'style' => 'div'
		));
		?>
	</div>
</div>
</article>
<?php get_footer(); ?>

<style type="text/css">
#submit {
	background-color: lightblue;
	border-radius: 7px;
}

.reply {
	width: 5%;
	background: #00FFFF;
	border-radius: 4px;
	padding: 7px;
}

textarea {
	padding: 12px 20px;
	margin: 2px 0;
	box-sizing: border-box;
}

.commnets_inner {
	width: 100%;
	background-color: lightblue;
	padding: 10px;
	position: relative;
}

.comment {
	border: solid 1px black;
	border-radius: 5px;
	padding: 10px;
}

.img_single {
	padding: 20px;
	margin: 10px;
	display: flex !important;
	flex-direction: row !important;
	flex-wrap: wrap !important;
	justify-content: center !important;
	width: 100%;
}

.title_single {
	display: block;
	margin: auto;
	color: red;
	font-size: 80px;
	text-shadow: 0 0 4px black;
	width: 100%;
	text-align: center;
}

.text_single {
	display: block;
	margin: auto;
	background-color: lightblue;
	padding: 23px;
	border: solid black 1px;
	border-radius: 5px;
	width: 80%;
	position: relative;

}


.date_single {
	position: absolute;
	right: 20px;
	bottom: 17px;
}


@media screen and (max-width: 960px) {
	.text_single {
		width: 90%;
	}

	.title_single {
		max-width: 100%;
		font-size: 30px;
		word-break: break-all;
		word-break: break-word;
	}

	.img_single img {
		width: 100% !important;
	}
}
</style>