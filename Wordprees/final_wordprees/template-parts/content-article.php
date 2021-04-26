
	<div class="container mt-5">
		<div class="post_single">
		<div class="title_single"><b><i><?php the_title();?></i></b></div>
		<div class="date_single"><?php the_date(); ?></div>

	    <div class="img_single">
	    	<?php the_post_thumbnail('medium');?>
	    	</div>
	    	<div class="text_single">
	    <?php the_content();?>
	    <div class="tags_single"><?php the_tags(); ?></div><br>
	    
	    </div>
	    </div>
	</div>
</div>
</article>
<?php get_footer(); ?>

<style type="text/css">
	    body{
        background-color: #dbdbdb;
    }
.post_single{
	background-color: #ECECEC ;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
}

.img_single{
	padding: 20px;
	margin: 10px;
	display: flex !important;
	flex-direction: row !important;
	flex-wrap: wrap!important;
	justify-content: center !important;
	width: 100%;
}
	.title_single{
		display: block;
		margin: auto;
		color: red;
		font-size: 80px;
		text-shadow: 0 0 4px black;
		width: 100%;
		text-align: center;
	}

	.text_single{
	    display: block;
	    margin: auto;
		padding: 23px;;
		width: 80%;
	    position: relative;
	    text-align: left;

	}
	.date_single{
	text-align: center;
	font-style: italic;

	}

	.tags_single{
		text-align: center;
	}

@media screen and (max-width: 960px){
	    .text_single{
	    	width: 90%;
	    }
		.title_single{
			max-width: 100%;
			font-size: 30px;
			word-break: break-all;
			word-break: break-word;
		}
.img_single img{
	width: 100% !important;
}
}

</style>