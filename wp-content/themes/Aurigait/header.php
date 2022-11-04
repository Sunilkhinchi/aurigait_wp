<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified JavaScript -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?php bloginfo('name'); ?>  <?php wp_title();  ?> | <?php if(is_front_page()){ bloginfo('description');} ?></title>
    <?php
  wp_head();
     ?>
</head>
<body <?php body_class(); ?>>
    <!-- <div class="menu-container">
        <a href="front-page.php"><img src="<?php bloginfo('template_directory') ?>/images/auriga.svg" alt=""></a>
        <div class="main-nav-bar">
           <?php wp_nav_menu(array('theme_location'=>'primary-menu','menu_class'=>'nav ')) ?> 
        </div>
    </div> -->


    <div class="container menu-container">
    <header class="d-flex align-items-center flex-wrap justify-content-center py-5  mb-4">
     
      <a href="/AurigaCus" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none"><img src="<?php bloginfo('template_directory') ?>/images/auriga.svg" alt=""></a>
      </a>
      <?php wp_nav_menu(
                    array('theme_location'=>'primary-menu',
                           'menu_class'=>'nav nav-pills ul-navbar',
                           'add_li_class'=> 'nav-item')) ?>
  
    </header>
  </div>