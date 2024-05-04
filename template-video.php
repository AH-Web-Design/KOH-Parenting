<?php
/* Template Name:Video Page */
?>
<?php get_header();?>
<!-- <div class="inr-ban">        
      <img class="img-fluid" src="<?php //echo bloginfo('template_url')?>/images/inr-ban.jpg" alt="" />
    </div> -->

    <section class="main-wrap">
      <div class="container">
        <h2 class="main-title">Learning Videos</h2>
<!--         <p class="main-pera">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p> -->

        <div class="row mt-5">
			<?php
    $args = array( 'post_type' => 'video_list', 'order' => 'ASC', 'posts_per_page' => -1 );
    $myposts = get_posts( $args );
    foreach ( $myposts as $post ) : setup_postdata( $post );
    $informationimage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'true');
    $content = get_the_content();
    $trimmed_content = wp_trim_words( $content, 20, NULL ); 
    ?>

			
          <div class="col-md-4">
            <div class="vid-bx">
              <!-- <img class="img-fluid" src="<?php //echo $informationimage[0]; ?>" alt="" /> -->
              <h4><?php the_title();?></h4> 
              <?php the_content();?>
            </div>
          </div>
			 <?php
    endforeach; 
    wp_reset_postdata();
    ?> 
			
          
			
        </div>
      </div>
    </section>



<?php get_footer();?>



  







