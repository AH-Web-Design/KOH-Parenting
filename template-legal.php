<?php
/* Template Name:Legal Page*/
?>
<?php get_header(); ?>



<section class="section mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><strong><?php echo get_the_title(); ?></strong></h1>
                <p class="legal-text"><?php echo get_field('text') ?></p>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>