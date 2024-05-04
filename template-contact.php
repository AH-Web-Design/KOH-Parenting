<?php
/*
template name: Contact
*/
get_header();
get_page_header();
?>
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mb-5">
        <h1 class="title1"><strong>Contact Us</strong></h3>
          <ul class="f-contact2">
            <li><img src="<?php echo bloginfo('template_url') ?>/assets/img/email.png" alt="Phone" /> <a
               title="Contact Us via Email" href="mailto:<?php echo get_theme_value("email"); ?>"><?php echo get_theme_value("email"); ?></a>
              <span>General Support</span></li>
            <?php /* <li><img src="<?php echo bloginfo('template_url') ?>/assets/img/email.png" alt="Email" /> <a
            title="Contact Us via Phone" href="tel:<?php echo get_theme_value("phone"); ?>"><?php echo get_theme_value("phone"); ?></a>
              <span>Call Us</span></li> */?>
            <li><img src="<?php echo bloginfo('template_url') ?>/assets/img/location.png" alt="address" /> <em>Our Office</em>
              <?php echo get_theme_value("address"); ?>
            </li>
          </ul>
          <div class="map-bx mt-5">
            <?php the_content(); ?>
          </div>
      </div>
      <div class="col-md-6 mb-5">
        <div class="contact-bx">
          <h1><strong>Consult with Our Expert Today</strong></h3>
            <?php echo do_shortcode('[contact-form-7 id="5" title="Contact form 1"]'); ?>
        </div>
      </div>
    </div>

  </div>
</section>

<?php
get_footer();
?>