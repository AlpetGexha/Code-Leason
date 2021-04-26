<div class="post">
        <div class="title">
             <?php the_title(); ?>
            </div>
		<div class="postim_individual">

            <div class="photo">
            <?php
            the_post_thumbnail('thumbnail');
            ?>
    </div>

             <div class="text">
                <br>
            <?php the_excerpt(); ?>
            <div class="read_more"></div>
            <a href="<?php the_permalink();?>">read more</a>
            </div>
            </div>
 
			<hr><div class="tagi">
		       <i><?php the_tags(); ?></i>
               </div>

		
	</div>


<style type="text/css">
    body{
        background-color: #dbdbdb;
    }
    .post{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        border : solid 1px black;
        position: relative;
        width: auto;
        height: auto;
        padding: 10px;
        background-color: white;
        border-radius: 5px;
    }
    .postim_individual{
        display: flex;
        flex-direction: row; 
        justify-content:center;
        flex-wrap: wrap;

    }
    .text{
        display: block;
        margin: auto;
        padding: 10px;
    }
    .title{
        font-size: 32px;
        font-weight: bold;
        font-style: italic;
    }
    .photo{
        border: solid 1px black;
        margin: auto;
    }
    @media screen and (max-width: 640px){
        .post{
            width: 100% !important;
        }.col1{
            width: 100% !important;
        }
    }
</style>