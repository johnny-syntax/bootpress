<!DOCTYPE html>
  <!-- dynamic language attribute -->
<html <?php language_attributes(); ?>>
  <head>
      <!-- dynamic character set -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- dynamic description -->
    <meta name="description" content="<?php bloginfo('description'); ?>">
      <!-- dynamic title: shows website name and site desciption or page title -->
    <title> <?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(); ?> </title>
      <!-- css -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
      <!-- javascript -->
    <script src="<?php bloginfo('template_url'); ?>/js/jquery-3.4.1.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
  </head>
  <body>
    <main>
      <h1 class="d-none"> <?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(); ?> </h1>

      <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="<?php bloginfo('url'); ?>"> <?php bloginfo('name'); ?> </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-main" aria-controls="navbar-main" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-main">
          <?php
            wp_nav_menu( array(
              'theme_location'    => 'primary',
              'depth'             => 2,
              'container'         => false,
              'menu_class'        => 'nav navbar-nav mr-auto mt-2 mt-md-0',
              'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
              'walker'            => new WP_Bootstrap_Navwalker(),
            ) );
          ?>

          <form class="form-inline my-2 my-md-0" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <label for="navbar-search" class="sr-only"> <?php _e('Search', 'textdomain'); ?> </label>
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="s" id="navbar-search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> <?php _e('Search', 'textdomain'); ?> </button>
          </form>
        </div>
      </nav>
