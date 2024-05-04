<?php /* Template Name:Services Page */ ?>

<?php get_header();  ?>

<!--HEAD-->
<?php get_page_header();?>



<!--INTRODUCTION-->
<?php
    $introduction = get_field('introduction');
?>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="box shadow-light">
                    <img class="box-bg" src="<?php echo get_image($introduction['introduction_image']) ?>" alt="<?php echo get_image($introduction['introduction_image'], 'alt') ?>">
                </div>
            </div>
            <div class="col-xl-8 col-lg-7 col-md-6">
                <div class="d-flex align-items-center h-100">
                    <div>
                        <h1><strong><?php echo $introduction['introduction_title'] ?></strong></h1>
                        <p><?php echo $introduction['introduction_text'] ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!--TRAINING DETAILS-->
<?php
$trainingDetails = get_field('training_details');
?>
<section class="section gray">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><strong><?php echo $trainingDetails['title'] ?></h1>
            </div>
        </div>
        <div class="row mb-5"></div>
        <div class="row">
            <?php
                for($i = 0; $i < count($trainingDetails['cards']); $i++) {
                    $card = $trainingDetails['cards'][$i];
                    ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="icon-card">
                                <div class="icon-card-content">
                                    <h4><?php echo $card['title'] ?></h4>
                                    <p><?php echo $card['text'] ?></p>
                                </div>
                                <img src="<?php echo get_image($card['icon']) ?>" alt="<?php echo get_image($card['icon'], 'alt') ?>">
                            </div>
                        </div>
                    <?php
                }
            ?>     
        </div>
    </div>
</section>

<!--ROADMAP-->
<?php
$roadmap = get_field('roadmap');
?>
<section class="section text-center roadmap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><strong><?php echo $roadmap['title'] ?></strong></h1>
                <p class="me-auto ms-auto""><?php echo $roadmap['text'] ?></p>
            </div>
        </div>
        <div class="row mb-5"></div>
        <div class="row">
            <div class="col-12">
                <?php
                
                for($i = 0; $i < count($roadmap['roadmap_items']); $i++) {
                    $roadmapItem = $roadmap['roadmap_items'][$i];

                    ?>
                    <div class="roadmap-item">
                        <div class="roadmap-item-image">
                            <div class="roadmap-item-image-light"></div>
                            <img src="<?php echo get_image($roadmapItem['image']) ?>" alt="<?php echo get_image($roadmapItem['image'], 'alt') ?>">
                        </div>
                        <div class="roadmap-item-content">
                            <h4><?php echo $roadmapItem['small_title'] ?></h4>
                            <h1><?php echo $roadmapItem['big_title'] ?></h1>
                            <p><?php echo $roadmapItem['text'] ?></p>
                        </div>
                    </div>
                    <?php
                }

                ?>
                
            </div>
        </div>
    </div>
</section>

<!--TECHNIQUES USED-->
<?php
$outro = get_field('outro');
?>
<section class="section techniques">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="box shadow-light">
                    <img class="box-bg" src="<?php echo get_image($outro['image']) ?>" alt="<?php echo get_image($outro['image'], 'alt') ?>">
                </div>
            </div>
            <div class="col-xl-8 col-lg-7 col-md-6">
                <div class="d-flex align-items-center h-100">
                    <div>
                        <h1><strong><?php echo $outro['title'] ?></strong></h1>
                        <p><?php echo $outro['text'] ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<?php get_footer() ?>