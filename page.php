<?php get_header();?>
<?php if (have_posts()) : while (have_posts()) : the_post(); 
$image = wp_get_attachment_image_src( get_post_thumbnail_id($p_query->ID),'true'); 
  ?>
 <!--  <div class="inr-ban">        
      <img class="img-fluid" src="<?php //echo bloginfo('template_url')?>/images/inr-ban.jpg" alt="" />
    </div> -->


    <section class="main-wrap">
      <div class="container">
        <h2 class="main-title"><?php the_title();?></h2>
       <!--  <p class="main-pera">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p> -->

        <div class="custom-bx mt-5">
          <div class="about-img">
              <img class="img-fluid" src="<?php echo $image[0]; ?>" alt="">
          </div>
          <div class="abt-txt">
               <?php the_content();?>
          </div>
        </div>
      </div>
    </section>



    
<?php endwhile; else: ?>
      <h1><?php _e('Not Found')?></h1>
      <p><?php _e('Sorry,no posts matched your criteria.'); ?></p>
      <?php endif; ?>


<?php get_footer();?>