<?php
/* Template Name: gallery
*/
?>
<?php get_header() ?>
<style>
/* some basic styling */

h1 {font-size:20px;}

#galvidcontainer {
  width:940px;
  margin:0 auto;
}

.galvidpre {
  width:300px;
  height:325px;
  float:left;
  margin:5px;
  background-color:#ccc;
}

.galvidprevid {
  width:300px;
}

.galvidpretext {
  width:280px;
  padding:10px;
}

</style>

<div id="galvidcontainer">
<h1>Videos</h1>

     <?php /* Loop the stuff from the videos post type */
          $args = array( 'post_type' => 'videos', 'posts_per_page' => 10 );
          $loop = new WP_Query( $args );
          while ( $loop->have_posts() ) : $loop->the_post();?>
          <div class="galvidpre">
               <div class="galvidprevid">
               <?php
               /* Set variables and create if stament */
				$videosite = get_post_meta($post->ID, 'Video Site', single);
				$videoid = get_post_meta($post->ID, "Video ID", single);
				if ($videosite == vemio) {	
  				echo '<iframe src="http://player.vimeo.com/video/'.$videoid.'" width="300" height="190" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
				} else if ($videosite == youtube) {
  				echo '<iframe width="300" height="190" src="http://www.youtube.com/embed/'.$videoid.'" frameborder="0" allowfullscreen></iframe>';
				} else {
  				echo 'Please Select Video Site Via the CMS';
				}
				?>
               </div>
               <div class="galvidpretext">
                    <h1><?php the_title() ?></h1>
                    <p>
                    <?php /* this is just a limit on characters displayed */
                    $words = explode(" ",strip_tags(get_the_content()));
                    $content = implode(" ",array_splice($words,0,20));
                    echo $content; ?>
                    </p>
               </div>
          </div>
         
     <?php endwhile;?>
    
</div>

<?php get_footer() ?>