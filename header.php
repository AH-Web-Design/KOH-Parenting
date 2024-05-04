

<!doctype html>

<?php
$noMenu = false;
$less = false;
$dev = false;
$title = get_the_title() === 'Home' ? get_bloginfo('name') : get_bloginfo('name') .' | '. get_the_title();
$robots = get_field('robotstxt');
$noIndex = get_field('no_index');
get_parents();
/*if($GLOBALS['cookie']) {
  $iconTitle = '';
  $iconColor = '';
  if($GLOBALS['cookie']) {
    $iconTitle = "Email address ".$GLOBALS['email']." confirmed";
    $iconColor = "#22CC7D";
  } else if($GLOBALS['emailCookie']) {
    $iconTitle = "Waiting for you to confirm your email address ".$GLOBALS['email'];
    $iconColor = "red";
  }
}*/
?>
<html lang="en">

<head>
  <?php /*DEV SITE TAGS START*/ ?>
  <?php if($dev || $noIndex) {
    echo '<meta name="googlebot" content="noindex, nofollow">';
  } else {
    ?>
        <!-- Google Tag Manager -->
        <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
              'gtm.start':
                new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
              j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
          })(window, document, 'script', 'dataLayer', 'GTM-WB592TX');</script>
        <!-- End Google Tag Manager -->
    <?php
  } ?>
  <?php /*DEV SITE TAGS END*/ ?>
  <?php
    if(!$robots) {
      echo '<meta name="robots" content="/robots.txt" />';
    }
  ?>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo get_field('page_details')['description'] ?? str_replace('[&hellip;]', '...', get_the_excerpt()) ?? get_bloginfo('description') ?>">
  <meta name="keywords" content="<?php echo (get_post_type() === 'page' ? get_field('page_details')['keywords'] : (loop_tags() ?? get_field('tags'))) ?>">
  <meta name="Content-Language" content="en" />
  <meta name="Copyright" content="Copyright © <?php echo date('Y') . ' ' . get_bloginfo('name') ?>" />
  <meta name="author" content="/author.txt">
  <?php /*GENERAL OG*/?>
  <meta property="og:title" content="<?php echo $title ?>" />
  <meta property="og:type" content="Web Page" />
  <meta property="og:url" content="<?php echo home_url(add_query_arg(array(), $wp->request)); ?>" />
  <meta property="og:image" content="<?php echo home_url() ?>/koh-parenting-services.jpg" />
  <?php /*FACEBOOK OG*/?>
  <meta name="facebook:card" content="summary">
  <meta name="facebook:site" content="KohParenting">
  <meta name="facebook:title" content="<?php echo $title ?>">
  <meta name="facebook:description" content="<?php echo get_field('page_details')['description'] ?? get_bloginfo('description') ?>">
  <meta name="facebook:creator" content="<?php echo get_bloginfo('name') ?>">
  <meta name="facebook:image" content="<?php echo home_url() ?>/koh-parenting-services.jpg">
  <?php /*LINKEDIN OG*/?>
  <meta name="linkedin:card" content="summary">
  <meta name="linkedin:site" content="KohParenting">
  <meta name="linkedin:title" content="<?php echo $title ?>">
  <meta name="linkedin:description" content="<?php echo get_field('page_details')['description'] ?? get_bloginfo('description') ?>">
  <meta name="linkedin:creator" content="<?php echo get_bloginfo('name') ?>">
  <meta name="linkedin:image" content="<?php echo home_url() ?>/koh-parenting-services.jpg">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/vendor/bootstrap@5.3.0-alpha1/bootstrap.min.css">
  <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="<?php bloginfo('template_url') ?>/vendor/swiper@9/swiper-bundle.min.css">
  <noscript>
        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/vendor/swiper@9/swiper-bundle.min.css">
    </noscript>

  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo bloginfo('template_url')?>/assets/img/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo bloginfo('template_url')?>/assets/img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo bloginfo('template_url')?>/assets/img/favicon-16x16.png">
  <link rel="manifest" href="<?php echo bloginfo('template_url')?>/assets/img/site.webmanifest">
  <link rel="mask-icon" href="<?php echo bloginfo('template_url')?>/assets/img/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#2d89ef">
  <meta name="theme-color" content="#ffffff">



  <title>
    <?php echo $title ?>
  </title>
  <?php //wp_head();?>
  <?php if (get_the_title() === 'Home') {
    echo $less ? '<link rel="stylesheet/less" href="'.get_bloginfo('template_url').'/assets/less/pages/front-page.less">' : '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/assets/css/front-page.css?v='.$GLOBALS['version'].'">';
  } else if (get_post_type() === 'post' || get_post_type() === 'team' || get_post_type() === 'newsletter' || get_post_type() === 'learning-guide') {
    echo $less ? '<link rel="stylesheet/less" href="'.get_bloginfo('template_url').'/assets/less/pages/single.less">' : '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/assets/css/single.css?v='.$GLOBALS['version'].'">';
  } else {
    echo $less ? '<link rel="stylesheet/less" href="'.get_bloginfo('template_url').'/assets/less/pages/inner-page.less">' : '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/assets/css/inner-page.css?v='.$GLOBALS['version'].'">';
  } ?>

  <style>
    #wpadminbar {
      display: none !important;
    }

    html {
      margin-top: 0 !important;
    }
  </style>
</head>

<body <?php body_class(); ?>>
<?php
if(!$dev) {
  ?>
      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WB592TX" height="0" width="0"
          style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->
  <?php
}
?>
<?php
/*if($GLOBALS['emailCookie']){
  ?>
    <div class="toast-container p-3 start-50 translate-middle-x position-fixed">
  <div id="liveToast" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" style="--bs-toast-max-width:500px; -webkit-backdrop-filter: blur(25px) saturate(180%);-moz-backdrop-filter: blur(25px) saturate(180%);backdrop-filter: blur(25px) saturate(180%);">
    <div class="toast-header">
      <img width="24" height="24" src="<?php echo bloginfo('template_url')?>/assets/img/email.png" class="rounded me-2" alt="Email Confirmation">
      <strong class="me-auto">Email Confirmation</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      We've sent you a confirmation email. Please check your inbox of <strong><?php echo $email ?></strong> and confirm your email.
    </div>
  </div>
</div>
  <?php
}*/
?>
  
<?php
  if(!$noMenu) {
    ?>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light">
    <div class="container">
      <a title="<?php echo get_bloginfo('name') ?>" class="navbar-brand" href="/"><img height="70"
                  src="<?php bloginfo('template_url') ?>/assets/img/logo.png" alt="<?php echo get_bloginfo('name') ?>"></a>

                
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <?php
                  $menuItems = wp_get_nav_menu_items('koh-menu');
                  foreach ($menuItems as $menuItem) {
                    if ($menuItem->post_status = 'publish') {
                      echo '<li class="nav-item"><a title="' . $menuItem->title . '" class="nav-link" href="' . $menuItem->url . '">' . $menuItem->title . '</a></li>';
                    }
                  }
                  ?>
                  <li class="nav-item ms-lg-4"><a title="View Our Learning Guides" class="btn btn-primary colored-button"
                      href="/learning-guides/">View Our Learning Guides</a></li>

                      <?php
                      /*if($GLOBALS['cookie'] || $GLOBALS['emailCookie']) {
                        
                        ?>
                      <li class="nav-item ms-lg-4 desktop-user-tooltip-icon">
                        <a class="nav-link" href="javascript:void();" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $iconTitle ?>" style="color: <?php echo $iconColor ?> !important;">
                          <i class="fa-solid fa-user"></i>
                        </a>
                      </li>
                        <?php
                      }*/
                      ?>

                     
                </ul>
              </div>
            </div>
          </nav>
    <?php
  }
?>
