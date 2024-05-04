<?php
/* Template Name:Course Page */
?>
<?php get_header();?>
 
<section class="main-wrap">
      <div class="container">
        <h2 class="main-title">Our Course</h2>
<!--         <p class="main-pera">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p> -->

        <div class="row mt-5">
			
             <?php
    $args = array( 'post_type' => 'product', 'order' => 'ASC', 'posts_per_page' => -1 );
    $myposts = get_posts( $args );
    foreach ( $myposts as $post ) : setup_postdata( $post );
    $informationimage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'true');
    $content = get_the_content();
    $trimmed_content = wp_trim_words( $content, 20, NULL ); 
    ?>

          <div class="col-md-4">
            <div class="srvc-bx cstm-p-hgt">
              <div class="srvc-img">
                <img class="img-fluid" src="<?php echo $informationimage[0]; ?>" alt="">
              </div>
              <div class="p-3">
                <h3><?php the_title();?></h3>
                <h3><?php the_content();?></h3>
                <?php $product = wc_get_product( get_the_ID() ); echo $product->get_price_html();?>
                <?php if ( is_user_logged_in() ) {
   ?>
   <a href="<?php echo esc_url( home_url() ); ?>/cart/?add-to-cart=<?php echo $post->ID ?>" class="btn btn-info mt-3">Add To Cart  <i class="fa fa-paper-plane"></i></a>

                

<?php
} else {
   ?>
                 <a href="<?php echo site_url('my-account-2'); ?>" class="btn btn-info mt-3">Add To Cart  <i class="fa fa-paper-plane"></i></a>
                <?php
} ?>

              </div>
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



  







