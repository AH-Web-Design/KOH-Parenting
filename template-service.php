<?php
/* Template Name:Service Page */
?>
<?php get_header();?>
 <!-- <div class="inr-ban">        
      <img class="img-fluid" src="<?php //echo bloginfo('template_url')?>/images/inr-ban.jpg" alt="" />
    </div> -->

    


     <section class="main-wrap">
      <div class="container">
        <h2 class="main-title">About Us</h2>
<!--         <p class="main-pera">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p> -->

        <div class="row align-items-center mt-5">
          <div class="col-md-6">
            <div class="abt-img pr-4">
				<?php the_field('what_is_this_training_about_image',14); ?>
           
            </div>
          </div>
          <div class="col-md-6">
            <div class="abt-txt">
              <h3><?php the_field('what_is_this_training_about__title',14); ?></h3>
              <?php the_field('what_is_this_training_about_content',14); ?>
                <a href="#step" class="btn btn-info mt-3 smoothScroll">Know More  <i class="fa fa-paper-plane"></i></a>
             <!-- <a href="#" class="btn btn-info mt-3">Know More  <i class="fa fa-paper-plane"></i></a> -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="main-wrap">
      <div class="container">
        <div class="row align-items-center flex-row-reverse">
          <div class="col-md-6">
            <div class="abt-img pl-4">
              <img class="img-fluid" src="<?php the_field('why_choose_koh-parenting_services_image',14); ?>" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="abt-txt">
              <h3><?php the_field('why_choose_koh-parenting_services_title',14); ?></h3>
              <?php the_field('why_choose_koh-parenting_services_content',14); ?>
             <a href="#step" class="btn btn-info mt-3 smoothScroll">Know More  <i class="fa fa-paper-plane"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>

<section class="main-wrap" id="step">
      <div class="container">
        <h2 class="main-title">Our Services</h2>
<!--         <p class="main-pera">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p> -->

        <div class="row mt-5">
			
             <?php
    $args = array( 'post_type' => 'service', 'order' => 'ASC', 'posts_per_page' => -1 );
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
              <div class="p-5">
                <h3><?php the_title();?></h3>
                <?php the_content();?>
             <!--  <a href="<?php //the_permalink(); ?>" class="btn btn-info mt-3">Know More  <i class="fa fa-paper-plane"></i></a> -->
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



    <section class="main-wrap" id="step11111">
      <div class="container">
        <h2 class="main-title">Our Team</h2>
<!--         <p class="main-pera">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p> -->

        <div class="row mt-5">
			
             <?php
    $args = array( 'post_type' => 'client', 'order' => 'ASC', 'posts_per_page' => -1 );
    $myposts = get_posts( $args );
    foreach ( $myposts as $post ) : setup_postdata( $post );
    $informationimage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'true');
    $content = get_the_content();
    $trimmed_content = wp_trim_words( $content, 20, NULL ); 
    ?>

          <div class="col-md-3">
            <div class="srvc-bx cstm-p-hgt">
              <div class="srvc-img">
                <img class="img-fluid" src="<?php echo $informationimage[0]; ?>" alt="">
              </div>
              <div class="p-5">
                <h3><?php the_title();?></h3>
                <?php the_content();?>
             <!--  <a href="<?php //the_permalink(); ?>" class="btn btn-info mt-3">Know More  <i class="fa fa-paper-plane"></i></a> -->
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



  







