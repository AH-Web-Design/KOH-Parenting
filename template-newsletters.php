<?php
/* Template Name:Newsletters */
?>
<?php get_header(); ?>

<!--HEAD-->
<?php get_page_header(); ?>



<section class="section">
    <div class="container">
        <?php
        if($cookie) {
            ?>
                <div class="row">
                <div class="col-12">
                    <section class="section gray p-5 inside text-center">
                    <div class="row">
                <div class="col-12">
                    <h1><strong>We are moving things around</strong></h1>
                    <p class="big-intro">Explore newsletters in a much more comfortable fashion. Anywhere, everywhere.</p>
                    <a title="Explore Our new Blog" class="btn btn-primary" href="/koh-parenting-blog">Explore Our new Blog</a>
                    </div>
            </div>
                    </section>
                    
                </div>
            </div>
            <div class="row mb-5"></div>
            <?php
        }
        
        ?>
        <div class="row">
            <div class="col-12">
                <h1><strong>Newsletter Archive</strong></h1>
            </div>
        </div>
        <?php
        
        if(!$GLOBALS['cookie']) {
            
            ?>
            
            <div class="row"><div class="col-12"><?php
            include "inc/snippets/subscription-form.php";
            ?></div></div><?php
        } else {
            ?>
            
            
        <div class="row">
            

            <?php 
            $args = array(
                'post_type'   => 'newsletter',
                'order'       => 'DESC',
				'posts_per_page'   => -1
              );
            $newsletters = get_posts($args);
            foreach($newsletters as $newsletter) {
                setup_postdata($newsletter);
                $title = $newsletter->post_title;
                $thumbnail = get_image(get_field('thumbnail', $newsletter->ID), 'src', 'medium');
                $date = get_field('date', $newsletter->ID);
                $url = get_the_permalink($newsletter->ID);
                ?>
                    <div class="col-md-3">
                    <a title="<?php echo $title ?>" href="<?php echo $url ?>" title="<?php echo $title ?>" class="newsletter-file">
                        <img src="<?php echo $thumbnail ?>" alt="<?php echo $title ?>">
                        <small><?php echo $date ?></small>
                        <h6><?php echo $title ?></h4>
                    </a>
                </div>
                <?php
            }
            
        } ?>
        
        
        
        </div>
    </div>
</section>
<?php get_footer(); ?>