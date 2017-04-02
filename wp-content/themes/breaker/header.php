<?php
/**
 * The header for theme-template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme-template
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">

  <title>Заголовок</title>
  <meta name="description" content="">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="shortcut icon" href="<?php echo (get_template_directory_uri()); ?>/assets/img/favicon/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="<?php echo (get_template_directory_uri()); ?>/assets/img/favicon/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo (get_template_directory_uri()); ?>/assets/img/favicon/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo (get_template_directory_uri()); ?>/assets/img/favicon/apple-touch-icon-114x114.png">

  <?php wp_head(); ?>
</head>
<header class="main-header">
      <nav class="primary-nav">
        <i class="menu-toggle fa fa-bars fa-2x" aria-hidden="true"></i>
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary' ) ); ?>
      </nav>
  <div class="slogan-wrap">
    <?php $query = new WP_Query( array(
        'post_type' => 'slogan',
        'order'   => 'ASC'
    ) );

    while ( $query->have_posts() ) {
    $query->the_post(); ?>
        <div class="header-image">
          <?php the_post_thumbnail() ?>
        </div>
    <h2 class="slogan"><?php the_title();?></h2>
    <div class="slider-content">
      <?php the_content();?>
    </div>
    <?php } wp_reset_postdata(); ?>
  </div>
</header>
<body>