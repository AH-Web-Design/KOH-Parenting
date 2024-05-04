<footer class="footer">
  <div class="container">
    <div class="f-top">
      <div class="row">
        <div class="col-md-3 mb-4">
          <h4 class="footer-title">Quick Links</h4>
          <ul class="f-menu">
            <?php wp_nav_menu(
              array(
                'menu' => 'koh-menu-footer',

              )
            ); ?>


          </ul>
        </div>
        <div class="col-md-4 mb-4">
          <h4 class="footer-title">Contact Us</h4>
          <ul class="f-contact">
            <li><img loading="lazy" src="<?php echo bloginfo('template_url') ?>/assets/img/telephone.png" alt="Phone" /> <a
                title="Contact Us via Phone" href="tel:<?php echo get_theme_value("phone"); ?>"><?php echo get_theme_value("phone"); ?></a></li>
            <li><img loading="lazy" src="<?php echo bloginfo('template_url') ?>/assets/img/email.png" alt="Email" /> <a
                title="Contact Us via Email" href="mailto:<?php echo get_theme_value("email"); ?>"><?php echo get_theme_value("email"); ?></a></li>
            <li><img loading="lazy" src="<?php echo bloginfo('template_url') ?>/assets/img/location.png" alt="Address" /> <a
                title="Our Address" href="">
                <?php echo get_theme_value("address"); ?>
              </a></li>
          </ul>
        </div>
        <div class="col-md-5 mb-4">
          <h4 class="footer-title">FOLLOW US ON SOCIAL MEDIA</h4>


          <div class="subscribe-box">

            <div class="social-lst">
              <ul>
                <?php
                $socialLinks = get_field('social_media_links', get_page_by_path('home')->ID);

                for ($i = 0; $i < count($socialLinks); $i++) {
                  echo '<li><a title="' . getSocialInfo($socialLinks[$i]['url'])['title'] . '" href="' . $socialLinks[$i]['url'] . '" target="_blank">' . getSocialInfo($socialLinks[$i]['url'])['icon'] . '</a></li>';
                }
                ?>
              </ul>
            </div>
          </div>


        </div>
      </div>
    </div>
    <div class="f-bttm d-flex align-items-center justify-content-between flex-row-reverse">
      <ul class="terms-condition">
        <li><a title="Terms of Use" href="<?php echo esc_url(home_url()); ?>/terms-of-use/">Terms of Use</a></li>
        <li><a title="Privacy  Policy" href="<?php echo esc_url(home_url()); ?>/privacy-policy/">Privacy Policy</a>
        </li>
      </ul>
      <p class="copyright">Copyright ©
        <?php echo date('Y') . ' ' . get_bloginfo('name') ?>
      </p>
    </div>
  </div>
</footer>


<script src="<?php bloginfo('template_url') ?>/vendor/jquery-3.6.3/jquery-3.6.3.min.js"></script>
<script src="<?php bloginfo('template_url') ?>/vendor/bootstrap@5.3.0-alpha1/popper.min.js"></script>
<script src="<?php bloginfo('template_url') ?>/vendor/bootstrap@5.3.0-alpha1/bootstrap.bundle.min.js"></script>
<script defer src="<?php bloginfo('template_url') ?>/vendor/swiper@9/swiper-bundle.min.js"></script>
<script defer src="<?php bloginfo('template_url') ?>/vendor/fontawesome-6.0/fontawesome-6.0-vfs.js"></script>
<script defer src="<?php bloginfo('template_url') ?>/vendor/jarallax/jarallax.min.js"></script>
<script src="<?php bloginfo('template_url') ?>/assets/js/main.js?v=<?php echo $GLOBALS['version']; ?>"></script>
<?php
if (get_the_title() === 'Home') {
  ?>
  <script src="<?php bloginfo('template_url') ?>/assets/js/home.js?v=<?php echo $GLOBALS['version']; ?>"></script>
  <?php
}
if (get_the_title() === 'About') {
  ?>
  <script src="<?php bloginfo('template_url') ?>/assets/js/about.js?v=<?php echo $GLOBALS['version']; ?>"></script>
  <?php
}
if (get_post()->post_type === 'post') {
  ?>

  <script>
    const commentForm = document.getElementById('commentform');
    const inputs = commentForm.querySelectorAll('input');
    const textarea = commentForm.querySelector('textarea');
    const p = commentForm.querySelectorAll('p');
    const comments = document.querySelectorAll('.comment');
    const commentBody = document.querySelectorAll('.comment-body');
    const replyButtons = document.querySelectorAll('.comment-reply-link');
    const facebookShare = document.getElementById('facebook-share');
    const twitterShare = document.getElementById('twitter-share');
    const linkedinShare = document.getElementById('linkedin-share');
    const whatsappShare = document.getElementById('whatsapp-share');
    const emailShare = document.getElementById('email-share');
    const copyShare = document.getElementById('copy-share');
    inputs.forEach(e => {
      if (e.type === 'text') {
        e.classList.add('form-control')
      } else if (e.type === 'submit') {
        e.classList.add('btn', 'btn-primary');
      }
    });
    textarea.classList.add('form-control');
    textarea.rows = 4;
    p.forEach(p => {
      if (p.querySelector('input[type=text]')) {
        p.prepend(p.querySelector('label'));
      }
      if (p.querySelector('textarea')) {
        p.innerHTML += '<label for="comment"><small>Your comment</small></label>';
        p.prepend(p.querySelector('label'));
      }
    });

    commentBody.forEach(c => {
      const fn = c.querySelector('.comment-meta').querySelector('.fn');
      const metadata = c.querySelector('.comment-metadata');
      fn.innerHTML = '<div class="author-name">' + fn.querySelector('a').innerHTML + '</div>'
      fn.append(metadata.querySelector('a').querySelector('time'));
      metadata.querySelector('a').remove();
    });

    replyButtons.forEach(r => {
      r.classList.add('btn', 'btn-outline-primary', 'btn-sm');
      r.innerHTML = 'Reply <i class="fa fa-reply" aria-hidden="true"></i>'
    });

    commentForm.querySelector('[name=url]').parentNode.remove();

    //TODO check facebook share
    facebookShare.addEventListener('click', () => {
      console.log('Facebok Clicked');
      window.open(facebookShare.dataset.href, 'Share on Facebook', 'directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=800,height=600');
      return false;
    });
    twitterShare.addEventListener('click', () => {
      window.open(twitterShare.dataset.href, 'Share on Twitter', 'directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=800,height=600');
      return false;
    });
    linkedinShare.addEventListener('click', () => {
      window.open(linkedinShare.dataset.href, 'Share on Linkedin', 'directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=800,height=600');
      return false;
    });
    whatsappShare.addEventListener('click', () => {
      window.open(whatsappShare.dataset.href, 'Share via Whatsapp', 'directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=800,height=600');
      return false;
    });
    emailShare.addEventListener('click', () => {
      window.open(emailShare.dataset.href, 'Send via Email', 'directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=800,height=600');
      return false;
    });
    copyShare.addEventListener('click', async () => {
      try {
        //TODO for live environment
        await navigator.clipboard.writeText('<?php echo get_permalink(get_the_ID()); ?>');
        document.body.innerHTML += '<div class="position-absolute" style="top: ' + copyShare.offset.top + '; left: ' + copyShare.offset.left + ';">Copied to clipboard</div>';
      } catch (err) {
        console.error('Failed to copy: ', err);
      }
    });

  </script>

  <?php
}
if (get_post()->post_type === 'newsletter' || get_post()->post_type === 'learning-guide' || get_post()->ID === 1162 /* <-- 1162 is Example Learning Guide */) {
  ?>
  <script src="<?php echo bloginfo('template_url')?>/vendor/pdfjs/build/pdf.js"></script>

  <script>
    // If absolute URL from the remote server is provided, configure the CORS
    // header on that server.
    
    pdfReader = document.querySelector('.pdf-reader');
    if(pdfReader) {
    // Loaded via <script> tag, create shortcut to access PDF.js exports.
    //var pdfjsLib = window['pdfjs-dist/build/pdf.worker'];
      var { pdfjsLib } = globalThis;


    // The workerSrc property shall be specified.
    pdfjsLib.GlobalWorkerOptions.workerSrc = '<?php echo bloginfo('template_url')?>/vendor/pdfjs/build/pdf.worker.js';

    var pdfDoc = null,
      pageNum = 1,
      pageRendering = false,
      pageNumPending = null,
      scale = 3,
      canvas = document.getElementById('the-canvas'),
      ctx = canvas.getContext('2d'),
      
      linksWrapper =document.getElementById('links-wrapper'),
      urls = [],
      linksParent =document.querySelector('.links');
      url = pdfReader.dataset.pdf;
      console.log(url);
      annoatationLayer =document.getElementById('annotation-layer');
      delete pdfReader.dataset.pdf;
      canvas.addEventListener('contextmenu', event => event.preventDefault());




    /**
     * Get page info from document, resize canvas accordingly, and render page.
     * @param num Page number.
     */
    function renderPage(num) {
      pageRendering = true;
     
      // Using promise to fetch the page
      pdfDoc.getPage(num).then(function (page) {
        var viewport = page.getViewport({ scale: scale });
        canvas.height = viewport.height;
        canvas.width = viewport.width;
        page.getAnnotations().then(response => {
          linksWrapper.innerHTML = '';
          urls = [];
          response.forEach(r => {
            if(!r.url.includes('mailchi.mp')) {
              if(!r.url.includes('kohparenting.com')){
                urls.push(r.url);
              } else {
                if(r.url.length > 'https://kohparenting.com/'.length) {
                  urls.push(r.url);
                }
              }
            } else {
              urls.push(window.location.origin+'#subscriptionSection');
            }
          });

          if(urls.length > 0) {
          urls = [...new Set(urls)];
          urls.forEach(url => {
            linksWrapper.innerHTML += '<li><a href="'+url+'" target="_blank">'+url+'</a></li>';
          })
          linksParent.style.display = 'block';
        } else {
          linksParent.style.display = 'none';
        }
        });

        

        
        // Render PDF page into canvas context
        var renderContext = {
          canvasContext: ctx,
          viewport: viewport,
          annotationMode: 1,
          annotationCanvasMap:annoatationLayer
        };
        var renderTask = page.render(renderContext);

        // Wait for rendering to finish
        renderTask.promise.then(function () {
          pageRendering = false;
          if (pageNumPending !== null) {
            // New page rendering is pending
            renderPage(pageNumPending);
            pageNumPending = null;
          }
        });

      });

      // Update page counters
      document.getElementById('page_num').textContent = num;
    }

    /**
     * If another page rendering in progress, waits until the rendering is
     * finised. Otherwise, executes rendering immediately.
     */
    function queueRenderPage(num) {
      if (pageRendering) {
        pageNumPending = num;
      } else {
        renderPage(num);
      }
      //window.scroll(0,0);
    }

    /**
     * Displays previous page.
     */
    function onPrevPage() {
      if (pageNum <= 1) {
        
        return;
      }
      pageNum--;
      queueRenderPage(pageNum);
    }
    document.getElementById('prev').addEventListener('click', onPrevPage);

    /**
     * Displays next page.
     */
    function onNextPage() {
      if (pageNum >= pdfDoc.numPages) {
        return;
      }
      pageNum++;
      queueRenderPage(pageNum);
    }
    document.getElementById('next').addEventListener('click', onNextPage);


  


    /**
     * Asynchronously downloads PDF.
     */
    pdfjsLib.getDocument(url).promise.then(function (pdfDoc_) {
      pdfDoc = pdfDoc_;
      document.getElementById('page_count').textContent = pdfDoc.numPages;

      // Initial/first page rendering
      renderPage(pageNum);
      
    });

  }
  </script>
  <?php
}

?>
<!--LESS PROCESS-->
<?php if ($less) {
  ?>
  <script>less = { env: 'development' };</script>
  <script src="<?php echo bloginfo('template_url') ?>/vendor/less/less.js"></script>
  <script>less.watch();</script>
  <?php
}
?>



<?php wp_footer(); ?>
</body>

</html>