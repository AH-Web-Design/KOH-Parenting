<?php
global $wpdb,$post;
$post_id = $post->ID ;
//---get author name-----//
$author_array = get_user_by('id',$post->post_author);
$author_name = $author_array->display_name;
//--------Show single post----//
while ( have_posts() ) : the_post();
$image1= wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'true' );
$title = get_the_title();
$description = get_the_content();
$author_id = get_post_meta(get_the_ID(),'author_name',true);
$user_info  = get_userdata($author_id);
$user_name  = $user_info->display_name; 
$user_desig = get_user_meta( $author_id, 'description', true );  
get_header(); 
?>
<div class="inner-banner">
       <img src="<?php echo bloginfo('template_url')?>/images/technology-bg.jpg">
   </div>
   <section class="blog grid section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="single-main">
                                    <!-- News Head -->
                                    <div class="news-head">
                                        <img src="<?php echo $image1[0];?>" alt="#">
                                    </div>
                                    <!-- News Title -->
                                    <h1 class="news-title"><?php echo $title?></h1>
                                    
                                    <div class="news-text">
                                        <?php echo $description?>
                                        
                                    </div>
                                    
                                </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="main-sidebar">
                            <!-- Single Widget -->
                            <div class="single-widget search">
                                <div class="form">
                                    <input type="text" placeholder="Search Here..." kl_ab.original_type="email">
                                    <a class="button" href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <!--/ End Single Widget -->
                            <!-- Single Widget -->
                            <!-- <div class="single-widget category">
                                <h3 class="title">Categories</h3>
                                <ul class="categor-list">
                                    <li><a href="#">CONSTRUCTION SAFETY</a></li>
                                    <li><a href="#">FOOD SAFETY</a></li>
                                    <li><a href="#">HEALTH SAFETY</a></li>
                                    <li><a href="#">OTHM</a></li>
                                    <li><a href="#">AOSH</a></li>
                                </ul>
                            </div> -->
                            <!--/ End Single Widget -->
                            <!-- Single Widget -->
                            <div class="single-widget recent-post">
                                <h3 class="title">Recent post</h3>
                                <!-- Single Post -->
<?php
                                $args = array(
                                     'post_type'        => 'course',
                                     'orderby'          => 'date',
                                     'order'            => 'ASC',
                                     'post_status'      => 'publish',
                                     'posts_per_page'   => 3,
                                    );
                                     $blog_query = new WP_Query( $args );
                                      if ($blog_query->have_posts()){
                                        $i = 1;
                                        while ($blog_query->have_posts()){ 
                                          $blog_query->the_post();
                                          setup_postdata( $blog_query->post );
                                          $featured_blog = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                                          $content = get_the_content();
                                          $trimmed_content = wp_trim_words( $content, 20, NULL );                                          
                                ?>

                                <div class="single-post">
                                    <div class="image">
                                        <img src="<?php echo $featured_blog[0]; ?>" alt="#">
                                    </div>
                                    <div class="content">
                                        <h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                                        <ul class="comment">
                                            <li><i class="fa fa-calendar" aria-hidden="true"></i>Jan 11, 2021</li>
                                            <!-- <li><i class="fa fa-commenting-o" aria-hidden="true"></i>35</l i>-->
                                        </ul>
                                    </div>
                                </div>
                                <?php
                            $i++;
                            }
                            wp_reset_postdata();
                          }
                          else{
                            echo "No result found";
                          }
                          ?>


                                <!-- End Single Post -->
                            </div>
                            <!--/ End Single Widget -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </section> 


    


<?php endwhile; ?>
<?php get_footer(); ?>



