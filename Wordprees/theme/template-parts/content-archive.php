 <div class="post">
     <div class="title">
         <?php the_title(); ?>
     </div>
     <div class="postim_individual">
         <div class="photo">
             <?php
                the_post_thumbnail('thumbnail');
                //the_post_thumbnail('medium');
                //the_post_thumbnail('medium_large');
                //the_post_thumbnail('large');
                //the_post_thumbnail('full');
                //the_post_thumbnail(array(100,100));
                ?>
                
             <!-- <img src="<?php //the_post_thumbnail_url('thumnail')  
                            ?>"> -->
         </div>

         <div class="text">
             <br>
             <?php the_excerpt(); ?>
             <a href="<?php the_permalink(); ?>">read more</a>
         </div>
     </div>

     <hr>
     <div class="tagi">
         <i><?php the_tags(); ?></i>
     </div>

 </div>