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

<div class="inr-ban">        
       <img class="img-fluid" src="<?php echo bloginfo('template_url')?>/images/inr-ban.jpg" alt="" />
    </div>

<main>
    <section class="main-wrap">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="abt-img">
              <img src="<?php echo $image1[0];?>" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="abt-txt">
              <h3><?php echo $title;?></h3>
              <p><?php echo $description;?></p>            
            </div>
          </div>
        </div>

      </div>
    </section>
</main>


<?php endwhile; ?>
<?php get_footer(); ?>



