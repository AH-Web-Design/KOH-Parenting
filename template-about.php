<?php
/* Template Name:About */
?>
<?php get_header();?>

<!--HEAD-->
<?php get_page_header(); ?>

<!--OUR VISION-->
<?php
$ourVision = get_field('our_vision');
?>
<section class="section text-center">
  <div class="container">
  <div class="row">
      <div class="col-12">
          <h1><strong><?php echo $ourVision['title'] ?></strong></h1>
          <p class="me-auto ms-auto"><?php echo $ourVision['text'] ?></p>
      </div>
  </div>
  </div>
</section>

<!--FEATURES-->
<?php
$features = get_field('features');
?>
<section class="section gray text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><strong><?php echo $features['title'] ?></strong></h1>
                    <p class="me-auto ms-auto"><?php echo $features['text'] ?></p>
            </div>
        </div>
        <div class="row mb-5"></div>
        <div class="row">

          <?php
          for($i = 0; $i < count($features['features']); $i++){
            $feature = $features['features'][$i];
            $imageSrc = get_image($feature['icon']);
            $imageaAlt = get_image($feature['icon'], 'alt');
            ?>
              <div class="col-lg-4">
                <div class="feature-box">
                    <img src="<?php echo $imageSrc ?>" alt="<?php echo $imageaAlt ?>">
                    <div class="feature-title"><?php echo $feature['title'] ?></div>
                    <div class="feature-text"><p><?php echo $feature['text'] ?></p></div>
                </div>
            </div>
            <?php
          }
          ?>
            
        </div>
    </div>
</section>

<!--TESTIMONIALS-->
<?php
$testimonials = get_field('testimonials');
?>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><strong><?php echo $testimonials['title'] ?></strong></h1>
            </div>
        </div>
        <div class="row mb-3"></div>
        <div class="row">
            <div class="col-12">
                <div class="slider testimonials">
                    <div class="swiper testimonials">
                        <div class="swiper-wrapper">

                        <?php
                        $j = 1;
                        for($i = 0; $i < count($testimonials['testimonials']); $i++){
                            $testimonial = $testimonials['testimonials'][$i];
                            ?>
                              <div class="swiper-slide slide-bg-<?php echo $j ?>">
                              <div class="testimonial-inner-wrapper">
                               <div class="testimonial-text"><?php echo $testimonial['text'] ?></div>
                               <div class="testimonial-author">
                                    <div><small><strong><?php echo $testimonial['name'] ?></strong></small></div>
                               </div>
                            </div>
                            </div>
                            <?php
                            $j === 3 ? $j = 1 : $j++;
                        }
                        ?>
                            
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"><i class="fa-solid fa-arrow-right"></i></div>
                        <div class="swiper-button-next"><i class="fa-solid fa-arrow-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--FOUNDER-->
<?php
$founder = get_field('founder');
?>
<section class="section gray">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7 col-md-6 order-2">
                <div class="d-flex align-items-center h-100">
                    <div>
                        <h1><strong><?php echo $founder['title'] ?></strong></h1>
                        <div class="editor-text"><?php echo $founder['text'] ?></div>
                        <a title="<?php echo $founder['read_more_button']['label'] ?>" class="btn btn-primary mt-5 mb-5 colored-button" href="<?php echo $founder['read_more_button']['url'] ?>"><?php echo $founder['read_more_button']['label'] ?></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-6 order-1">
                <div class="box shadow-light">
                    <img class="box-bg" src="<?php echo get_image($founder['image'])?>" alt="<?php echo get_image($founder['image'], 'alt') ?>">
                </div>
            </div>
        </div>
    </div>
</section>
<!--TEAM-->
<?php
$teamMembers = get_field('team_members');
?>
<section class="section text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><strong><?php echo $teamMembers['title'] ?></strong></h1>
            </div>
        </div>
        <div class="row mb-5"></div>
        <div class="row">
            <?php
            $args = array(
                'post_type'   => 'team',
                'order'       => 'ASC',
              );
            $team = get_posts($args);
            if($team) {
                foreach($team as $teamMember) {
                    setup_postdata($teamMember);
                    ?>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                        
                        <a title="<?php echo $teamMember->post_title; ?>" href="<?php echo get_permalink($teamMember); ?>" class="team-member">
                            <img src="<?php echo get_image(get_field('image', $teamMember->ID), 'src', 'large') ?>" alt="<?php echo get_image(get_field('image', $teamMember->ID), 'alt') ?>">
                            <h5><?php echo $teamMember->post_title; ?></h5>
                            <small><?php echo get_field('title_profession', $teamMember->ID) ?></small>
                        </a>
                </div>
                    <?php
                }
            }
            ?>
            
        </div>
    </div>
</section>
<?php get_footer();?>



  







