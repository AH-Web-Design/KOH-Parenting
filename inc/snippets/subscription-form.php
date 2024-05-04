<?php
        $homeId = $front_page_id = get_option('page_on_front');
        $subscription = get_field('subscription_section', $homeId);
        $postType = get_post_type();
        $subscriptionTitle = $postType === 'post' ? $subscription['title_for_single_post'] : $subscription['title'];
        $subscriptionText = $postType === 'post' ? $subscription['text_for_single_post'] : $subscription['text'];
    ?>
    <section id="<?php echo $subscription['id'] ?>" class="section newsletter-form-section">
    <i id="close-popup" class="fa-solid fa-xmark"></i>
        <div class="loading d-none" id="loading">
            <img src="<?php echo get_template_directory_uri().'/assets/img/loading.svg' ?>" alt="Loading">
            <p>Loading</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 d-none" id="afterEmailRegister">
                    <i id="afterEmailRegisterIcon" class="fa-solid fa-circle-check"></i>
                    <h1><strong id="afterEmailRegisterTitle">Thank you for joining our<br>Koh-Parenting Community!</strong></h1>
                    <p id="afterEmailRegisterText">We are registering your email address. Please don't leave this page. You will be redirected in less than <strong>10 seconds.</strong><span class="d-none" id="emailSlot"></span></p>
                </div>
                <div class="col-12" id="beforeEmailRegister">
                    <h1><strong><?php echo $subscriptionTitle ?></strong></h1>
                    <p><?php echo $subscriptionText ?></p>
                    <?php echo '<div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <div class="mb-3">
                                          <label for="newsletterFormName" class="form-label">Your Name</label>
                                          <input type="name" class="form-control" id="newsletterFormName" aria-describedby="newsletterFormNameHelp">
                                          <div id="newsletterFormNameHelp" class="form-text" data-empty="Please enter your name!"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="newsletterFormEmail" class="form-label">Email address</label>
                                            <input type="email" class="form-control" id="newsletterFormEmail" aria-describedby="newsletterFormEmailHelp">
                                            <div id="newsletterFormEmailHelp" class="form-text" data-empty="Please enter your email address!"></div>
                                        </div>
                                        <!--<div class="mb-3 form-check ms-auto me-auto d-flex align-items-center justify-content-center">
                                            <input style="flex:none;" type="checkbox" class="form-check-input mt-0 me-1" id="agree-terms" required>
                                            <label class="form-check-label" for="agree-terms">By checking this box, you are agreeing to our <a href="javascript:void();" data-bs-toggle="modal" data-bs-target="#exampleModal">terms of service.</a></span></label>
                                        </div>-->
                                        
                                    </div>
                                </div>'
                    ?>
                    <a id="newsletterFormSubmit" title="<?php echo $subscription['button']['label'] ?>" href="<?php echo $subscription['button']['url'] ?>" class="btn btn-primary ms-auto me-auto d-table"><i class="fa-solid fa-arrow-right"></i> <?php echo $subscription['button']['label'] ?></a>
                    <small class="text-center">We will never share your information with anyone else.</small>
                  </div>
            </div>
            
        </div>
   </section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Koh-Parenting Services LLC. Terms of Service Agreement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>