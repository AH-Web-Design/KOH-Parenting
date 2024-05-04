<?php
/* Template Name:Feedback Page */
?>
<?php get_header();?>
<!-- <div class="inr-ban">        
      <img class="img-fluid" src="<?php //echo bloginfo('template_url')?>/images/inr-ban.jpg" alt="" />
    </div> -->

    <section class="main-wrap">
      <div class="container">
        <h2 class="main-title">Client Feedback</h2>
<!--         <p class="main-pera">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p> -->
        <div class="text-center my-5">
		      <a href="#" class="btn btn-info" data-toggle="modal" data-target="#storiesmodel">Share Client Feedback </a>
        </div>

        <div class="row mt-5 auto-size">

<?php
    $args = array( 'post_type' => 'testinomial', 'order' => 'ASC', 'posts_per_page' => -1 );
    $myposts = get_posts( $args );
    foreach ( $myposts as $post ) : setup_postdata( $post );
    $informationimage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'true');
    $content = get_the_content();
    $trimmed_content = wp_trim_words( $content, 20, NULL ); 
    ?>
          <div class="col-md-6 masonry-item">
            <div class="testi-bx">
<!--               <div class="client-img2">
                <img src="<?php //echo $informationimage[0]; ?>" alt="">
              </div> -->
              <h3><?php the_title();?></h3>
<!--               <img src="<?php //echo bloginfo('template_url')?>/images/star.png" alt="" /> -->
              <p><?php the_content();?></p>
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



  







