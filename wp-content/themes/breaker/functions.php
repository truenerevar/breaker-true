<?php
/**
 * theme-template functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package theme-template
 */
/**
 * Clear wp_head()
 */
show_admin_bar( false );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_head', 'rel_canonical' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Enqueue scripts and styles.
 */
function custom_scripts() {
  wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
  wp_register_script( 'libs', get_template_directory_uri() . '/assets/js/libs.js', array( ), false, true );
  wp_enqueue_script( 'libs' );
  wp_register_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array( 'libs' ), false, true );
  wp_enqueue_script( 'main' );
}
add_action( 'wp_enqueue_scripts', 'custom_scripts' );


/**
 * Enable support for Post Thumbnails on posts and pages.
 */
add_theme_support( 'post-thumbnails' );

/*
 * Register navigation menus.
 */
register_nav_menus( array(
    'primary' => esc_html__( 'Primary', 'breaker' )
) );

/**
 * Register custom post-types
 */

function register_slogan() {
  $args = array(
      'public' => true,
      'label'  => 'slogan',
      'menu_icon' => 'dashicons-editor-spellcheck',
      'supports' => array( 'title', 'editor', 'thumbnail' )
  );
  register_post_type( 'slogan', $args );
}
add_action( 'init', 'register_slogan' );

function register_about() {
  $args = array(
      'public' => true,
      'label'  => 'about',
      'menu_icon' => 'dashicons-editor-textcolor',
      'supports' => array( 'editor')
  );
  register_post_type( 'about', $args );
}
add_action( 'init', 'register_about' );


function register_contact() {
  $args = array(
      'public' => true,
      'label'  => 'contact',
      'menu_icon' => 'dashicons-location-alt',
      'supports' => array( 'title', 'editor', 'thumbnail' )
  );
  register_post_type( 'contact', $args );
}
add_action( 'init', 'register_contact' );


function register_members() {
  $args = array(
      'public' => true,
      'label'  => 'members',
      'menu_icon' => 'dashicons-groups',
      'supports' => array( 'title', 'editor', 'thumbnail' )
  );
  register_post_type( 'members', $args );
}
add_action( 'init', 'register_members' );

function register_directors() {
  $args = array(
      'public' => true,
      'label'  => 'directors',
      'menu_icon' => 'dashicons-groups',
      'supports' => array( 'title', 'editor' , 'thumbnail' )
  );
  register_post_type( 'directors', $args );
}
add_action( 'init', 'register_directors' );

/**
 * Widgets
 */

function register_widgets() {
  register_sidebar( array(
      'name'          => __( 'Recent post', 'breaker' ),
      'id'            => 'recent_posts_1',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'register_widgets' );

require get_template_directory() . '/inc/widget-recent-posts.php';

/**
 * Including single page active menu
 */

include 'inc/single-page-active-menu.php';
?>

