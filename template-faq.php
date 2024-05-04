<?php
/* Template Name:FAQ Page*/
?>
<?php get_header(); ?>

<!--HEAD-->
<?php get_page_header(); ?>

<!--CONTENT-->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><strong>Frequently Asked Questions</strong></h1>
            </div>
            <div class="mb-5"></div>
            <div class="col-12 faq">
                <?php
                $faq = get_field('questions_answers');
                for ($i = 0; $i < count($faq); $i++) {
                    $q = $faq[$i]['question'];
                    $a = $faq[$i]['answer'];
                    ?>
                    <?php echo $i > 0 ? '<hr />' : '' ?>
                    <div class="faq-item mb-3">
                        <p><strong>
                                <?php echo $q ?>
                            </strong></p>
                        <p>
                            <?php echo $a ?>
                        </p>
                    </div>

                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>