<?php
global $wpdb, $post;
$post_id = $post->ID;
//---get author name-----//
$author_array = get_user_by('id', $post->post_author);
$author_name = $author_array->display_name;
//--------Show single post----//
while (have_posts()):
    the_post();
    $image1 = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'true');
    $title = get_the_title();
    $description = get_the_content();
    
    $description = $GLOBALS['valid_subscriber'] ? str_replace('restrict_after', '', $description) : explode('restrict_after', $description)[0];
    $author_id = get_post_meta(get_the_ID(), 'author_name', true);
    $user_info = get_userdata($author_id);
    $user_desig = get_user_meta($author_id, 'description', true);
    get_header();
    ?>

    <section class="blog-details-wraper <?php echo get_post()->post_type === 'team' ? 'team-member-wrapper' : '' ?>">
        <div class="container">
            
            <div class="row">
                <?php
                if (get_post()->post_type === 'team') {
                    ?>
                    <div class="col-xl-8 col-lg-7 col-md-6 order-2">
                        <div class="d-flex align-items-center h-100">
                            <div>
                                <h1 class="mb-0"><strong>
                                        <?php echo $title ?>
                                    </strong></h1>
                                <small class="mb-5 d-block">
                                    <?php echo get_field('title_profession', get_post()->ID) ?>
                                </small>
                                <div class="editor-text">
                                    <?php echo get_field('bio', get_post()->ID) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <div class="box shadow-light">
                            <img class="box-bg" src="<?php echo get_image(get_field('image', get_post()->ID)) ?>"
                                alt="<?php echo get_image(get_field('image', get_post()->ID), 'alt'); ?>">
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (get_post()->post_type === 'post') {
                    ?>
                    <div class="col-12 col-lg-8">
                        <div class="blog-single-wraper">
                            <h1 class="mt-0"><strong>
                                    <?php echo $title ?>
                                </strong></h1>
                            <div class="entry-meta">
                                <div class="post-details mb-2">
                                    <time>
                                        <?php echo get_post_time('F j, Y'); ?>
                                    </time>
                                    by
                                    <?php echo get_the_author(); ?>
                                </div>
                            </div>
                            <div class="blog-img">
                                <img class="img-fluid" src="<?php echo $image1[0]; ?>" alt="">
                                <div class="blog-date">
                                    <p>
                                        <?php the_time('F jS'); ?>
                                    </p>
                                    <p>
                                        <?php the_time('Y'); ?>
                                    </p>
                                </div>
                            </div>
                            <?php echo $description; ?>
                            <?php
                            if (!$GLOBALS['valid_subscriber']) {
                                include "inc/snippets/subscription-form.php";
                            }
                            ?>
                            <div class="about-author">
                                <p class="name">By
                                    <?php echo get_the_author(); ?>
                                </p>
                            </div>
                            <hr />

                            <div class="comment-respond">
                                <?php
                                comments_template();
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="latest-blog-posts side row">
                        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 mb-3">
                        <div class="card backlink-card">
                            <img src="<?php echo get_bloginfo('template_url')?>/assets/img/backlink-art-learning-guide.png">

                            <a title="Checkout Our Learning Guides" href="/learning-guides" class="btn btn-light mt-3">Checkout Learning Guides</a>
                        </div>
                    </div>
                        <div class="col-12"><hr></div>
                        <div class="col-12 mt-3"><h3 class="blog-sidebar-title mb-3">Latest Posts</h3></div>
                        <?php
                    $args = array(
                        'post_type' => 'post',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'post_status' => 'publish',
                        'posts_per_page' => 7,
                    );
                    $blog_query = new WP_Query($args);
                    if ($blog_query->have_posts()) {
                        $i = 1;
                        while ($blog_query->have_posts()) {
                            $blog_query->the_post();
                            if ($blog_query->post->ID != $post_id) {
                                setup_postdata($blog_query->post);
                                $featured_blog = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                                $content = get_the_content();
                                $trimmed_content = wp_trim_words($content, 20, NULL);
                                $image = has_post_thumbnail($post->ID) ? wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium')[0] : null;

                                ?>
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                  <div class="card blog-post-card mb-5">
                                        <img src="<?php echo $image ?>" class="card-img-top"
                                            alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE); ?>">
                                        <div class="card-body">
                                            <div class="card-body-inner">
                                            <a href="<?php echo get_permalink() ?>" title="<?php echo get_the_title() ?>">
                                            <h5 class="card-title">
                                                    <?php echo get_the_title() ?>
                                                </h5>
                                            </a>
                                               
                                                <p class="card-text">
                                                    <?php echo substr(get_the_excerpt(), 0, 120) . '[...]' ?>
                                                </p>
                                            </div>
                                            <div class="card-body-bottom">
                                                <small>
                                                    <?php echo get_the_date() ?>
                                                </small>
                                                <a href="<?php echo get_permalink() ?>" class="btn btn-primary btn-sm">READ</a>
                                            </div> 
                                        </div>
                                    </div>
                            </div>
                                <?php
                                $i++;
                            }


                        }
                        wp_reset_postdata();
                    } else {
                        echo "No result found";
                    }
                    ?>
                    
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (get_post()->post_type === 'newsletter') {
                    $pdfFile = wp_get_attachment_url(get_field('pdf_file', $post_id));
                    ?>
                    <div class="col-12">
                        <h1>
                            <strong>
                                <?php echo $title ?>
                            </strong>
                        </h1>

                    </div>
                    <div class="col-12">
                        <div class="pdf-reader" data-pdf="<?php echo $pdfFile ?>">
                            <span class="pagination">Page: <span id="page_num"></span> / <span id="page_count"></span></span>
                            <div class="buttons">
                                <span id="prev"><i class="fa-solid fa-arrow-left"></i></span>
                                <span id="next"><i class="fa-solid fa-arrow-right"></i></span>
                            </div>

                            <canvas id="the-canvas"></canvas>
                            <div class="links">
                                <h4>Links in this page:</h4>
                                <ul id="links-wrapper">

                                </ul>
                            </div>
                        </div>
                        <?php if($post->post_type === 'newsletter') {
                            ?>
                                <h4 class="mt-5 mb-3">Download This Newsletter</h4>
                                <a class="btn btn-primary" href="<?php echo $pdfFile ?>" target="_blank"><i class="fa-solid fa-file-pdf"></i> Download</a>
                            <?php
                        } ?>
                        
                    </div>

                    <?php
                }
                if(get_post()->post_type === 'learning-guide') {

                        $pdfFile = wp_get_attachment_url(get_field('pdf_file', $post_id));
                        ?>
                    <div class="col-12">
                        <h1>
                            <strong>
                                <?php echo $title ?>
                            </strong>
                        </h1>

                    </div>
                    <div class="col-12">
                        <div class="pdf-reader" data-pdf="<?php echo $pdfFile ?>">
                            <span class="pagination">Page: <span id="page_num"></span> / <span id="page_count"></span></span>
                            <div class="buttons">
                                <span id="prev"><i class="fa-solid fa-arrow-left"></i></span>
                                <span id="next"><i class="fa-solid fa-arrow-right"></i></span>
                            </div>

                            <canvas id="the-canvas"></canvas>
                            <div class="links">
                                <h4>Links in this page:</h4>
                                <ul id="links-wrapper">

                                </ul>
                            </div>
                        </div>
                        <?php if($post->post_type === 'newsletter') {
                            ?>
                                <h4 class="mt-5 mb-3">Download This Newsletter</h4>
                                <a class="btn btn-primary" href="<?php echo $pdfFile ?>" target="_blank"><i class="fa-solid fa-file-pdf"></i> Download</a>
                            <?php
                        } ?>
                        
                    </div>

                    <?php

                }
                ?>
            </div>
            <?php
            if (get_post()->post_type === 'post') {
                ?>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <h3 class="blog-sidebar-title mb-3">Share</h3>
                        <div class="social-share-wrapper mb-5">
                            <!--FACEBOOK-->
                            <button
                                data-href="https://www.facebook.com/login.php?skip_api_login=1&api_key=966242223397117&signed_next=1&next=https%3A%2F%2Fwww.facebook.com%2Fsharer%2Fsharer.php%3Fkid_directed_site%3D0%26sdk%3Djoey%26u%3D<?php echo get_permalink(get_the_ID()) ?>%252F%26display%3Dpopup%26ref%3Dplugin%26src%3Dshare_button&cancel_url=https%3A%2F%2Fwww.facebook.com%2Fdialog%2Fclose_window%2F%3Fapp_id%3D966242223397117%26connect%3D0%23_%3D_&display=popup&locale=en_EN&kid_directed_site=0"
                                title="Share on Facebook" type="button" id="facebook-share"
                                class="btn btn-primary fb-share-button">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </button>
                            <!--TWITTER-->
                            <?php
                            $tags = '';
                            if (get_the_tags()) {
                                for ($i = 0; $i < count(get_the_tags()); $i++) {
                                    $tags .= str_replace('-', '', get_the_tags()[$i]->name) . ($i < count(get_the_tags()) - 1 ? ',' : '');
                                }
                            }

                            ?>
                            <button title="Share on Twitter" type="button" id="twitter-share" class="btn btn-primary"
                                data-href="https://twitter.com/intent/tweet?hashtags=<?php echo $tags ?>&amp;original_referer=https%3A%2F%2Fdeveloper.twitter.com%2F&amp;ref_src=twsrc%5Etfw%7Ctwcamp%5Ebuttonembed%7Ctwterm%5Eshare%7Ctwgr%5E&amp;related=twitterapi%2Ctwitter&amp;text=<?php echo get_the_title() ?>&amp;url=<?php echo get_permalink(get_the_ID()) ?>">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </button>
                            <!--LINKEDIN-->
                            <button title="Share on Linkedin" type="button" id="linkedin-share" class="btn btn-primary"
                                data-href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(get_the_ID()) ?>&title=<?php echo get_the_title() ?>&source=<?php echo get_site_url() ?>">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </button>
                            <!--WHATSAPP-->
                            <button title="Share via Whatsapp" type="button" id="whatsapp-share" class="btn btn-primary"
                                data-href="https://wa.me/?text=<?php echo get_the_title() . ' ' . get_permalink(get_the_ID()) ?>">
                                <i class="fa fa-whatsapp" aria-hidden="true"></i></button>
                            <!--EMAIL-->
                            <button title="Send via email" type="button" id="email-share" class="btn btn-primary"
                                data-href="mailto:?subject=<?php echo get_the_title(); ?>&amp;body=Check out this post about <?php echo get_the_title(); ?> at <?php echo get_permalink(get_the_ID()) ?>">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </button>
                            <!--EMAIL-->
                            <button title="Copy link" type="button" id="copy-share" class="btn btn-primary"><i
                                    class="fa fa-clone" aria-hidden="true"></i>

                            </button>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </section>




<?php endwhile; ?>
<?php get_footer(); ?>