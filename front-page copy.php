<?php get_header(); ?>
 <div class="banner">        
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
        	<?php
    $j = 0;
    $args = array('post_type' => 'banners', 'order' => 'ASC', 'posts_per_page' => -1);
    $myposts = get_posts($args);
    foreach ($myposts as $post) : setup_postdata($post);
      $bannersimage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'true');
    ?>

         <div class="carousel-item <?php if($j == 1){echo "active";}?>">
            <img src="<?php echo $bannersimage[0]; ?>" class="d-block w-100" alt="">
            <div class="carousel-caption">
              <?php the_content();?>
              <a href="<?php echo esc_url( home_url() ); ?>/services/" class="btn btn-info mt-5">Know More  <i class="fa fa-paper-plane"></i></a>
            </div>
          </div>
           <?php $j++;
    endforeach;
    wp_reset_postdata();
    ?>

          

        </div>
      </div>
    </div>

    <section class="main-wrap">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="abt-img v-wrap pr-4">
            
              <?php the_field('training_about_image'); ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="abt-txt">
              <h3><?php the_field('training_about_title'); ?></h3>
              <?php the_field('training_about_content'); ?>
              <a href="#step" class="btn btn-info mt-3 smoothScroll">Know More  <i class="fa fa-paper-plane"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="srvc-wrap">
      <div class="container">
        <h2 class="main-title">Our Services</h2>
<!--         <p class="main-pera clr-wht">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p> -->

        <div id="srvc-carousel" class="mt-5 owl-carousel owl-theme slide">
        	 <?php
    $args = array( 'post_type' => 'service', 'order' => 'ASC', 'posts_per_page' => -1 );
    $myposts = get_posts( $args );
    foreach ( $myposts as $post ) : setup_postdata( $post );
    $informationimage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'true');
    $content = get_the_content();
    $trimmed_content = wp_trim_words( $content, 20, NULL ); 
    ?>

          <div class="item">
            <div class="srvc-bx cstm-p-hgt">
              <div class="srvc-img">
                <img class="img-fluid" src="<?php echo $informationimage[0]; ?>" alt="">
              </div>
              <div class="p-5">
                <h3><?php the_title();?></h3>
               <?php the_content();?>
              <a href="https://dev1.myvtd.site/wordpress/kohparenting/services/" class="btn btn-info mt-4">Know More  <i class="fa fa-paper-plane"></i></a>
              </div>
            </div>
          </div>
<?php
    endforeach; 
    wp_reset_postdata();
    ?> 
          
        </div>

<!--         <div class="text-center mt-3">
          <a href="https://dev1.myvtd.site/wordpress/kohparenting/services/" class="btn btn-info mt-3">View More  <i class="fa fa-paper-plane"></i></a>
        </div> -->
      </div>
    </section>

    <section class="main-wrap">
      <div class="container">
        <div class="row align-items-center flex-row-reverse">
          <div class="col-md-6">
            <div class="abt-img pl-4">
              <img class="img-fluid" src="<?php the_field('why_choose_image'); ?>" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="abt-txt">
              <h3><?php the_field('why_choose_title'); ?></h3>
              <?php the_field('why_choose_content'); ?>
              <a href="<?php the_field('why_choose_koh-parenting_services_know_more_link'); ?>" class="btn btn-info mt-3">Know More  <i class="fa fa-paper-plane"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="video-sec">
      <div class="container">
        <h2 class="main-title clr-wht">KOH Learning Videos</h2>
<!--         <p class="main-pera clr-wht">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p> -->

        <div class="row mt-5">
        	<?php
    $args = array( 'post_type' => 'video_list', 'order' => 'ASC', 'posts_per_page' => 3);
    $myposts = get_posts( $args );
    foreach ( $myposts as $post ) : setup_postdata( $post );
    $informationimage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'true');
    $content = get_the_content();
    $trimmed_content = wp_trim_words( $content, 20, NULL ); 
    ?>

          <div class="col-md-4">
            <div class="vid-bx">
              <?php the_content();?>
            </div>
          </div>
 <?php
    endforeach; 
    wp_reset_postdata();
    ?> 
          
        </div>

        <h2 class="main-title clr-wht mt-5" id="step">Effective Coparenting: 5 Step Process</h2>
<!--         <p class="main-pera clr-wht">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p> -->

        <p><?php the_field('effective_coparenting:_5_step_process'); ?></p>
		  <?php
$file = get_field('view_pdf');
if( $file ): ?>
		  <div class="text-center mt-3">
          <a href="#step1" class="btn btn-light mt-5 smoothScroll"> View Our Free Guide and Get to Know More!  &nbsp<i class="fa fa-paper-plane"></i></a>
        </div>
<?php endif; ?>

        
      </div>
    </section>

    <section class="main-wrap">
      <div class="container">
        <h2 class="main-title">We offer two types of Coaching</h2>
<!--         <p class="main-pera">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p> -->
        
        <div class="row mt-5">
        	<?php if( have_rows('type_of_coaching') ): ?>
        <?php while( have_rows('type_of_coaching') ): the_row(); 
        $title = get_sub_field('title');
        $image = get_sub_field('image');
        $content = get_sub_field('content');
        ?>

          <div class="col-md-6">
            <div class="srvc-bx box-hght">
              <div class="srvc-img">
                <img class="img-fluid" src="<?php echo $image['url']; ?>" alt="">
              </div>
              <div class="p-5">
                 <h3> <?php echo $title; ?></h3>
                <p> <?php echo $content; ?></p>
               <!--  <a href="<?php //the_permalink(); ?>" class="btn btn-info mt-3">Know More  <i class="fa fa-paper-plane"></i></a> -->
              </div>
            </div>
          </div>
 <?php endwhile; ?>
        <?php endif; ?>
          

        </div>
      </div>
    </section>

    <section class="contact-wrap">
      <div class="container">
        <div class="row mt-5">
			<div class="col-12">
				  <div class="speaking-bx mb-5">
          <div class="client-img">
            <img class="img-fluid" src="<?php the_field('speaking_image'); ?>" alt="" />
          </div>
          <div class="client-txt p-5">
			  <h3>Speaking</h3>
            <?php the_field('speaking_content'); ?>
          </div>
        </div>
			  </div>
          <div class="col-12">
			  
			   <h3 class="faq-heading">Frequently Asked Questions</h3>
            <div class="accordion-prt">
              <div id="accordion">
              	<?php
						$i=1;
						if( have_rows('faq') ):
							while ( have_rows('faq') ) : the_row();
								$title = get_sub_field('title');
								$content = get_sub_field('content');
								?>

                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <button class="btn" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne"><?php echo $title;?> <i class="fa" aria-hidden="true"></i></button>
                                    </div>
                            
                                    <div id="collapse<?php echo $i; ?>" <?php if($i==1) { ?>class="collapse show"<?php }else{ ?>class="collapse" <?php } ?> aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                               <?php echo $content;?>
                                        </div>
                                    </div>
                                </div>
                        <?php
								$i++;
							endwhile;


						else :
							?>

							no rows found
							<?php
						endif;
						?>

                  
                 
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>
	<section class="main-wrap">
		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-md-2" id="step1">
            <div class="contact-form-bx">
              <h3 class="text-center cf-heading">Let’s Stay Connected</h3>
<!--               <p>Lorem Media is a full-service social media agency. We offer businesses innovative solutions that deliver.</p> -->
               <?php echo do_shortcode( '[contact-form-7 id="5" title="Contact form 1"]' ); ?>
            </div>
          </div>
			</div>
		</div>
	</section>
    
<?php get_footer(); ?>