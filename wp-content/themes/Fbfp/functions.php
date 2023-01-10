<?php

add_action( 'wp_enqueue_scripts', function() {

  wp_enqueue_style('mon_style', get_template_directory_uri(). '/style.css', false);
  wp_enqueue_style('mon_footer', get_template_directory_uri(). '/css/footer.css', false);
  wp_enqueue_style('homepage', get_template_directory_uri(). '/css/homepage.css', false);
  wp_enqueue_style('animate', get_template_directory_uri(). '/css/animate.css', false);
  wp_enqueue_style('services', get_template_directory_uri(). '/css/services.css', false);
  wp_enqueue_style('realisations', get_template_directory_uri(). '/css/realisations.css', false);
  wp_enqueue_style('contact', get_template_directory_uri(). '/css/contact.css', false);
  
  wp_enqueue_style( 'boxicon','https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css', false);
  wp_enqueue_style( "font-awesome", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css", false);
  wp_enqueue_style( "myriad-pro", "https://fonts.cdnfonts.com/css/myriad-pro?styles=947,949,948,20533,946,945,952,953,950,951", false);
  wp_enqueue_style( "", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css", false);


});

add_action('wp_enqueue_script', function(){

  wp_enqueue_script('menu', get_template_directory_uri(). '/js/menu.js', false);

});

add_action( 'after_setup_theme', function() {
  register_nav_menu( 'main-menu', 'Menu principal' );
  add_theme_support( 'post-thumbnails' );
});
?>