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
                setup_postdata($learningGuide);
                $title = $learningGuide->post_title;
                $thumbnail = get_image(get_field('thumbnail', $learningGuide->ID), 'src', 'medium');
                $url = get_the_permalink($learningGuide->ID);
                ?>
                <div class="col-md-3">
                    <a title="<?php echo $title ?>" href="<?php echo $url ?>" title="<?php echo $title ?>" class="newsletter-file">
                        <img src="<?php echo $thumbnail ?>" alt="<?php echo $title ?>">
                        <h6><?php echo $title ?></h6>
                    </a>
                    <button>Subscribe</button>
                </div>

                <?php
                
            }
            
       ?>
        
        
        </div>
            
            
       
    </div>
</section>
<?php get_footer(); ?>