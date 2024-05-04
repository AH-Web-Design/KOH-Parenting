<?php get_header(); ?>
<div class="inr-ban">     
      <img class="img-fluid" src="<?php echo bloginfo('template_url')?>/images/inr-ban.jpg" alt="" />
    </div>
    <div class="clearfix"></div>
    <section class="main-wrap">
      <div class="container">
          <h2 class="main-title">Search For </h2>
            
            <div class="row mt-5">
 <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 

              <div class="col-lg-3 col-md-6">
                    <div class="product-bx">
                        <figure class="pro-img">
                            <img src="<?php echo the_post_thumbnail_url(); ?>" alt="" class="img-fluid">
                           <!--  <span class="tag-new">New</span> -->
                            <div class="btn-grp">
                                <a href="<?php the_permalink(); ?>">View Details</a>
                                <!-- <a href="<?php //the_permalink(); ?>">Add To Cart</a> -->
                                <!-- <a href="http://localhost/meshmask/cart/?add_to_cart=<?php //echo $post->ID ?>" class="grn">Add To Cart</a> -->
                            </div>
                        </figure>
                        <h4><?php echo get_the_title(); ?></h4>
                        <h5><?php $product = wc_get_product( get_the_ID() ); echo $product->get_price_html();?></h5>
                    </div>
                </div>
               <?php endwhile; else: ?> 
                            <div class="col-md-12 text-center">  

              <h3><?php _e('Not Found') ?></h3>   



              <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>    

                <?php endif; ?>    

            </div> 
                
                

            </div>
        </div>
    </section>

<?php get_footer(); ?>