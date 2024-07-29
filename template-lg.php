<?php
/* Template Name: LG */
?>
<?php get_header(); ?>

<!--HEAD-->
<?php get_page_header(); ?>



<section class="section">
    <div class="container">
        <?php
        if($cookie) {
            ?>
                
            <div class="row mb-5"></div>
            <?php
        }
        
        ?>
        <div class="row">
            <div class="col-12">
                <h1><strong>Learning Guides</strong></h1>
            </div>
        </div>
         <div class="row">
             <?php
             $args = array(
                 'post_type'   => 'learning-guide',
                 'order'       => 'DESC',
                 'posts_per_page'   => -1
             );
             $learningGuides = get_posts($args);

             foreach ($learningGuides as $learningGuide) {
                 //global $post;
                 setup_postdata($learningGuide);
                 $title = $learningGuide->post_title;
                 $thumbnail = get_image(get_field('thumbnail', $learningGuide->ID), 'src', 'medium');
                 $url = get_the_permalink($learningGuide->ID);
                 $excerpt = get_field('pdf_excerpt', $learningGuide->ID);
                 ?>
                 <div class="col-md-3">
                     <a title="<?php echo $title ?>" href="<?php echo $url ?>" title="<?php echo $title ?>" class="newsletter-file">
                         <img src="<?php echo $thumbnail ?>" alt="<?php echo $title ?>">
                         <h6><?php echo $title ?></h6>
                     </a>
                     <?php if($excerpt): ?>
                     <div class="subscription">
                         <a class="btn btn-primary colored-button" href="<?php echo $url ?>" title="<?php echo $title ?>">Premium Subscription</a>
                         <a class="btn btn-primary colored-button" href="<?php echo $excerpt; ?>" title="<?php echo $title; ?>" target="_blank">Preview Excerpt</a>
                     </div>
                     <?php endif; ?>
                 </div>

                 <?php
             }
             ?>
        </div>
    </div>
</section>
<style>
    /* Premium Subscription
	 ========================================================================== */
    .subscription {
        display: flex;
        flex-flow: column-reverse;
        gap: 1em;
        margin-bottom: 1.5rem;
    }
    .newsletter-file {
        margin-bottom: 1.5rem;
    }
    .pms-form {
        margin-bottom: 1em;
        max-width: 600px;
        display: flex;
        flex-flow: column;
        justify-content: center;
        align-items: center;
    }
    ul#pms-credit-card-information {
        width: 600px;
    }
    .pms-form > input[type=submit] {
        margin-right: 20px;
        background-image: url(../img/floating-form-bg.jpg) !important;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        --bs-btn-hover-border-color: transparent;
        --bs-btn-active-border-color: transparent;
        --bs-btn-border-color: transparent;
        --bs-btn-border-width: 0;
    }
</style>
<?php get_footer(); ?>