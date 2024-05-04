<?php
/* Template Name:Blogs Page*/
?>
<?php get_header(); ?>

<!--HEAD-->
<?php get_page_header(); ?>

<section class="section">
    <div class="container">
        <div class="row">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array('post_type' => 'post', 'paged' => $paged, 'order' => 'DESC', 'posts_per_page' => 6, 'post_status' => 'publish');
            $wp_query = new WP_Query($args);
            while (have_posts()):
                the_post();
                $image = has_post_thumbnail($post->ID) ? wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium')[0] : null;
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card blog-post-card mb-5">
                    <img src="<?php echo get_the_post_thumbnail_url() ?>" class="card-img-top" title="<?php echo get_the_title(get_post_thumbnail_id()) ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE); ?>">

                        <div class="card-body">
                            <div class="card-body-inner">
                                <h5 class="card-title">
                                    <?php echo get_the_title() ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo substr(get_the_excerpt(), 0, 120) . '[...]' ?>
                                </p>
                            </div>
                            <div class="card-body-bottom">
                                <small>
                                    <?php echo get_the_date() ?>
                                </small>
                                <a title="<?php echo get_the_title() ?>" href="<?php echo get_permalink() ?>" class="btn btn-primary btn-sm">READ</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <div class="col-12" id="navigation-col">
                <?php the_posts_pagination(); ?>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>