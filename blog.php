<?php /*Template Name: Layout: Blog*/ ?>


<?php get_header(); ?>
    
    <section class="main-wrap pt-0">
        <div class="container">
            <div class="row">
                <?php

                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array('post_type' => 'post', 'paged' => $paged, 'order' => 'DESC', 'posts_per_page' => 6);
                $wp_query = new WP_Query($args);
                while (have_posts()) : the_post();
                    $image = has_post_thumbnail($post->ID) ? wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium')[0] : null;
                    $time = get_post_time('F j, Y');
                    $title = substr(get_the_title(), 0, 50);
                    $excerpt = substr(get_the_excerpt(), 0, 150);
                    $permalink = get_permalink();
                    $author = get_the_author_meta('first_name').' '.get_the_author_meta('last_name');
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="srvc-bx cstm-p-hgt">
                            <div class="srvc-img">
                                <img class="img-fluid" src="<?php echo $image ?>" alt="<?php echo $title ?>">
                            </div>
                            <div class="p-5">
                                <div class="post-details mb-2"><i class="fa fa-user" aria-hidden="true"></i> &nbsp;<?php echo $author; ?></div>
                                <h3><?php echo $title ?></h3>
                                <p><?php echo $excerpt ?>...</p>

                                <div class="post-card-bottom">
                                    <div class="post-details"><?php echo $time ?></div>
                                    <a type="button" href="<?php echo $permalink ?>" class="btn btn-outline-primary">READ</a>

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
    <script>
        /**/
        const navLinks = document.getElementById('navigation-col').querySelector('.nav-links');
        const pageNumbers = navLinks.querySelectorAll('.page-numbers');
        const currentPage = navLinks.querySelector('.current');
        navLinks.classList.add('btn-group');
        currentPage.classList.add('btn-primary');
        pageNumbers.forEach(e => e.classList.add('btn', 'btn-outline-primary'))
    </script>
<?php get_footer(); ?>