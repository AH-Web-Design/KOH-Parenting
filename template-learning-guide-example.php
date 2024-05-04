<?php
/* Template Name: Learning Guide Example */
?>
<?php get_header(); ?>

<!--HEAD-->
<?php get_page_header(); ?>


<?php
$title = get_the_title();
?>

<div class="floating-subscription-form" data-cookie="<?php echo $GLOBALS['subscriber_session_cookie'] ?>">
    <?php include 'inc/snippets/subscription-form.php' ?>
</div>

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
            <?php $pdfFile = wp_get_attachment_url(get_field('pdf_file', $post_id)); ?>
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
                                <h5>Links in this page:</h4>
                                <ul id="links-wrapper">

                                </ul>
                            </div>
                        </div>
                       
                        
                    </div>

           
        </div>
    </div>
    </div>
    </div>
</section>
<script>
    document.getElementById('newsletterFormEmail').placeholder = 'you@youremail.com'
    document.getElementById('newsletterFormName').placeholder = 'Your name'
</script>
<?php get_footer(); ?>