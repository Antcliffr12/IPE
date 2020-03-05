<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=no" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Interprofessional Practice and Education Center</title>
    <?php wp_head(); ?>

    <script src="<?= THEME_PATH ?>/assets/scripts/modernizr.min.js"></script>

  
  </head>

  <body <?php body_class(@$extra_body_classes); ?> x-ms-format-detection="none">
  <div class="search">
    <div class="rvt-container rvt-container--freshman rvt-container--center">
      <div class="wrap">
        <div class="search-test">
          <input type="text" class="searchTerm" placeholder="Search">
          <button type="submit" class="searchButton">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </div>   
  </div>
  <!-- search -->
    <header id="header">
      <?= render_component('top-nav'); ?> 
      <?= render_component('bottom-nav'); ?> 

    </header>
