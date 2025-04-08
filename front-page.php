<?php get_header();

$banner = get_field('banner');
$introduction = get_field('introduction');
$features = get_field('features');
$call_to_action = get_field('call_to_action');






?>
 <!--HEAD-->
    <section id="<?php echo $banner['id'] ?>" class="head jarallax" style="background-image: url(<?php echo bloginfo('template_url') ?>/assets/img/head-bg.jpg)">

    <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="d-flex align-items-center h-100">
                        <div>
                            <h1><strong><?php echo $banner['banner_heading']; ?></strong></h1>
                            <p><?php echo $banner['banner_sub_heading'] ?></p>
                            <?php
                                if($banner['button_1']['active']){
                                    echo '<a title="'.$banner['button_1']['button_label'].'" href="'.$banner['button_1']['button_url'].'" class="btn btn-light me-2 mb-3"><i class="fa-solid fa-newspaper"></i> '.$banner['button_1']['button_label'].'</a>';
                                }
                                if($banner['button_2']['active']){
                                    echo '<a title="'.$banner['button_2']['button_label'].'" href="'.$banner['button_2']['button_url'].'" class="btn btn-success btn-shadow mb-3"><i class="fa-solid fa-arrow-right"></i> '.$banner['button_2']['button_label'].'</a>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php 
                    $videoUrl = $banner['banner_video']['banner_youtube_video_address'];
                    $videoId = substr($videoUrl, strpos($videoUrl, 'embed/')+6);
                    $videoThumbnailId = $banner['banner_video']['banner_youtube_video_thumbnail'];
                    $videoThumbnailSrc = get_image($videoThumbnailId);
                    $videoThumbnailSrc = $videoThumbnailSrc ? $videoThumbnailSrc : 'https://img.youtube.com/vi/'.$videoId.'/maxresdefault.jpg';
                    $videoThumbnailAlt = get_image($videoThumbnailId, 'alt');
                    ?>
                    <div data-bs-toggle="modal" data-bs-target="#youtube-modal" id="head-video-thumbnail" class="box shadow-dark">
                        <div class="play-button-wrapper">
                            <img src="<?php echo bloginfo('template_url') ?>/assets/img/play-button.svg" alt="Play Video">
                        </div>
                        <img class="box-bg" src="<?php echo $videoThumbnailSrc ?>" alt="<?php echo $videoThumbnailAlt ?>">
                    </div>
                </div>
            </div>
        </div>
    </section>
     
    <!--WHAT IS THIS TRAINING ABOUT-->
     <section id="<?php echo $introduction['id'] ?>" class="section">
        <div class="container">
            
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6">
                    <div class="box shadow-light">
                        <img class="box-bg" src="<?php echo get_image($introduction['introduction_image']) ?>" alt="<?php echo get_image($introduction['introduction_image'], 'alt') ?>">
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 col-md-6">
                    <div class="d-flex align-items-center h-100">
                        <div>
                            <h1><strong><?php echo $introduction['introduction_title'] ?></strong></h1>
                            <p><?php echo $introduction['introduction_text'] ?></p>
                            <?php
                            if($introduction['introduction_button']['introduction_button_active']){
                                ?>
                                    <a title="<?php echo $introduction['introduction_button']['introduction_button_label'] ?>" href="<?php echo $introduction['introduction_button']['introduction_button_url'] ?>" class="btn btn-primary"><i class="fa-solid fa-arrow-right"></i> <?php echo $introduction['introduction_button']['introduction_button_label'] ?></a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!--WHY KOH-PARENTING-->
     <section id="<?php echo $features['id'] ?>" class="section text-center why-koh-parenting-section jarallax" style="background-image:url(<?php echo $features['features_background_image']['url'] ?>)">
        <div class="content">
            <div class="container text-center">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-white"><strong><?php echo $features['features_title'] ?></strong></h1>
                        <p class="text-white mb-5"><?php echo $features['features_text'] ?></p>
                    </div>
                </div>
                <div class="row mb-5"></div>
                

                <?php
                for($i=0; $i < count($features['features_features']); $i++){
                    $feature = $features['features_features'][$i];
                    $iconId = $feature['features_features_feature']['features_features_feature_icon'];

                    if($i === 0) {
                        echo '<div class="row mb-5 features-second-row">';
                    };
                    ?>
                        <div class="col-lg-4">
                            <a title="<?php echo $feature['features_features_feature']['features_features_feature_title'] ?>" href="<?php echo $feature['features_features_feature']['features_features_feature_url'] ?>" class="feature-box">
                                <img loading="lazy" src="<?php echo get_image($iconId) ?>" alt="<?php echo get_image($iconId, 'alt') ?>">
                                <div class="feature-title text-white"><?php echo $feature['features_features_feature']['features_features_feature_title'] ?></div>
                                <p class="feature-text"><?php echo $feature['features_features_feature']['features_features_feature_text'] ?></p>
                            </a>
                        </div>
                    <?php
                    if($i > 0 && fmod($i+1, 3) == 0 && $i+1 < count($features['features_features'])){
                        echo '</div><div class="row mb-5 margin-row"></div><div class="row mb-5 features-second-row">';
                    };
                };
                ?>
                </div>
                <?php
                if($features['features_button']['features_button_active']){
                    ?>
                    <div class="row">
                        <div class="col-12">
                            <a title="<?php echo $features['features_button']['features_button_label'] ?>" href="<?php echo $features['features_button']['features_button_url'] ?>" class="btn btn-light"><i class="fa-solid fa-arrow-right"></i> <?php echo $features['features_button']['features_button_label'] ?></a>
                        </div>
                    </div>
                    <?php
                }
                ?>
                
            </div>
        </div>
        <div class="section-bg-color"></div>
    </section>

     <!--LET'S GET YOU STARTED-->
     <section id="<?php echo $call_to_action['id'] ?>" class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><strong><?php echo $call_to_action['call_to_action_title'] ?></strong></h1>
                    <p><?php echo $call_to_action['call_to_action_text'] ?></p>
                </div>
            </div>
            <div class="row">
                <?php
                $videos = $call_to_action['call_to_action_video_slider'];
                if(count($videos) > 0){
                    ?>
                    <div class="col-lg-4">
                    <div class="slider">
                        <div class="swiper generic">
                            <div class="swiper-wrapper">
                                <?php
                                    for($i = 0; $i < count($videos); $i++){
                                        $videoSlide = $videos[$i]['call_to_action_video_slider_slide'];
                                        $videoUrl = $videoSlide['call_to_action_video_slider_slide_youtube_video_url'];
                                        $videoId = explode('=', $videoUrl)[1];
                                        $thumbnail = get_image($videoSlide['call_to_action_video_slider_slide_video_thumbnail']);
                                        $thumbnail = $thumbnail ? $thumbnail : 'https://img.youtube.com/vi/'.$videoId.'/maxresdefault.jpg';
                                        $title = $videoSlide['call_to_action_video_slider_slide_video_title'];
                                        $thumnnailAlt = get_image($videoSlide['call_to_action_video_slider_slide_video_thumbnail'], 'alt');
                                        ?>
                                        <div class="swiper-slide" style="background-image:url(<?php echo $thumbnail ?>)">
                                            <a title="<?php echo $title ?>" href="<?php echo $videoUrl ?>" class="slide-content blue">
                                                <div class="slide-content-inner">
                                                    <h4><strong><?php echo $title ?></strong></h4>
                                                    <?php /*echo '<small>VIDEO</small>'*/ ?>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                ?>
                                
                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-prev"><i class="fa-solid fa-arrow-right"></i></div>
                            <div class="swiper-button-next"><i class="fa-solid fa-arrow-right"></i></div>
                        </div>
                    </div>
                </div>
                    <?php
                }
                ?>
                
                <?php
                    $learning_guides = $call_to_action['call_to_action_learning_guide_slider'];
                    if(count($learning_guides) > 0){
                        ?>
                        <div class="col-lg-4">
                            <div class="slider">
                                <div class="swiper generic">
                                    <div class="swiper-wrapper">
                                        <?php
                                            for($i = 0; $i < count($learning_guides); $i++){
                                                $learning_guide = $learning_guides[$i]['call_to_action_learning_guide_slider_slide'];
                                                $url = $learning_guide['call_to_action_learning_guide_slider_slide_learning_guide_url'];
                                                $title = $learning_guide['call_to_action_video_slider_slide_video_title'];
                                                $thumbnail = get_image($learning_guide['learning_guide_slider_slide_learning_guide_thumbnail']);
                                                $thumnailAlt = get_image($learning_guide['learning_guide_slider_slide_learning_guide_thumbnail'], 'alt');
                                                ?>
                                                <div class="swiper-slide" style="background-image:url(<?php echo $thumbnail ?>)">
                                                    <a target="_blank" title="<?php echo $title ?>" href="<?php echo $url ?>" class="slide-content yellow">
                                                        <div class="slide-content-inner">
                                                            <h4><strong><?php echo $title ?></strong></h4>
                                                            <?php /*echo '<small>LEARNING GUIDE</small>'*/ ?>
                                                        </div>
                                                    </a>
                                                </div>
                                                <?php
                                            }
                                        ?>
                                        
                                    </div>
                                    <div class="swiper-pagination"></div>
                                    <div class="swiper-button-prev"><i class="fa-solid fa-arrow-right"></i></div>
                                    <div class="swiper-button-next"><i class="fa-solid fa-arrow-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                ?>
                
                <?php
                    $callToActionMini = get_field('call_to_action')['call_to_action_mini'];
                    $callToActionMiniIconSrc = get_image($callToActionMini['icon']);
                    $callToActionMiniIconAlt = get_image($callToActionMini['icon'], 'alt');
                ?>
                <div class="col-lg-4">
                    <div class="call-to-action">
                        <img loading="lazy" src="<?php echo $callToActionMiniIconSrc ?>" alt="<?php echo $callToActionMiniIconAlt ?>">
                        <h4><strong><?php echo $callToActionMini['text'] ?></strong></h4>
                        <a title="<?php echo $callToActionMini['button']['label'] ?>" href="<?php echo $callToActionMini['button']['url'] ?>" class="btn btn-light"><i class="fa-solid fa-arrow-right"></i> <?php echo $callToActionMini['button']['label'] ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
      
    <!--NEWSLETTER FORM-->
    <?php include "inc/snippets/subscription-form.php" ?>
   <!--BLOG-->
   <?php
   $blogs = get_field('blogs');
   ?>
   <section id="<?php echo $blogs['id'] ?>" class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><strong><?php echo $blogs['title'] ?></strong></h1>
                    <p><?php echo $blogs['text'] ?></p>
                </div>
            </div>
            <div class="row  mb-5">

                            <?php
                            // the query
                            $the_query = new WP_Query(
                                array(
                                    'posts_per_page' => 3,
                                )
                            );
                            ?>
                            
                            <?php if ($the_query->have_posts()): ?>
                                <?php while ($the_query->have_posts()):
                                    $the_query->the_post(); ?>
                            
                                    <div class="col-lg-4">
                                        <div class="card blog-post-card">
                                            <img loading="lazy" src="<?php echo get_the_post_thumbnail_url() ?>" class="card-img-top" title="<?php echo get_the_title(get_post_thumbnail_id()) ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE); ?>">
                                            <div class="card-body">
                                                <div class="card-body-inner">
                                                    <h5 class="card-title"><?php echo get_the_title() ?></h5>
                                                    <p class="card-text"><?php echo substr(get_the_excerpt(), 0, 120).'[...]'  ?></p>
                                                </div>
                                                <div class="card-body-bottom">
                                                    <small><?php echo get_the_date() ?></small>
                                                    <a title="<?php echo get_the_title() ?>" href="<?php echo get_permalink() ?>" class="btn btn-primary btn-sm">READ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                                    <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            
                            <?php else: ?>
                               
                            <?php endif; ?>

                
            </div>
            <div class="row mb-3"></div>
            <div class="row">
                <div class="col-12">
                    <a title="All Blog" href="<?php echo home_url().'/koh-parenting-blog' ?>" class="btn btn-primary d-table m-auto"><i class="fa-solid fa-arrow-right"></i> All Blog</a>
                </div>
            </div>
        </div>
   </section>

    <!--YOUTUBE MODAL-->
   <div class="modal fade" id="youtube-modal" tabindex="-1" aria-labelledby="youtube-modal" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-body">
            <iframe id="iframe" class="youtube-video-iframe" width="100%" height="100%" data-src="<?php echo $banner['banner_video']['banner_youtube_video_address'] ?>" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="closeModal">Closes</button>
        </div>
      </div>
    </div>
  </div>
    <?php get_footer(); ?>