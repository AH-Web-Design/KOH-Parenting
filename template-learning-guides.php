<?php
/* Template Name: Learning Guides */
?>
<?php get_header(); ?>

<!--HEAD-->
<?php get_page_header(); ?>


<?php
$introduction = get_field('introduction');
$learningGuides = get_field('learning_guides');
?>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><strong>
                        <?php echo $introduction['introduction_title']; ?>
                    </strong></h1>
                <p>
                    <?php echo $introduction['introduction_text']; ?>
                </p>
            </div>
        </div>
        <div class="row mb-5"></div>
        <div class="row">

            <?php
            for ($i = 0; $i < count($learningGuides); $i++) {
            
                ?>

                        <div class="col-md-3">
                            <a target="_blank" title="<?php echo $learningGuides[$i]['title'] ?>" href="<?php echo $learningGuides[$i]['file'] ?>" title="<?php echo $learningGuides[$i]['title'] ?>" class="newsletter-file">
                                <img src="<?php echo get_image($learningGuides[$i]['thumbnail'], 'src', 'medium'); ?>" alt="<?php echo $title ?>">
                                <h6><?php echo $learningGuides[$i]['title'] ?></h6>
                            </a>

                        </div>

                        <?php
                            if($i == 9) {
                                ?>
                                    <div class="col-md-6"></div>
                                <?php
                            }
                        ?>

                    <?php
            }
            ?>
       
        </div>
    </div>
    
</section>
<?php get_footer(); ?>