<?php
  // function evoinfo_register_styles(){
  //
  //      $version = wp_get_theme()->get( 'Version');
  //
  //      $filemtime = filemtime( get_template_directory() . '/assets/css/main.css' );
  //      wp_enqueue_style('evoinfo-style', get_template_directory_uri() ."/assets/css/main.css", array('evoinfo-bootstrap'), $filemtime, 'all' );
  //      wp_enqueue_style('evoinfo-font', "https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;700&display=swap", array(), '5.1.3', 'all' );
  //      wp_enqueue_style('evoinfo-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css", array(), '5.1.3', 'all' );
  //      wp_enqueue_style('evoinfo-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css", array(), '5.1.3', 'all' );
  //  }

   // add_action( 'wp_enqueue_scripts', 'evoinfo_register_styles');
   function evoinfo_register_scripts(){

       wp_enqueue_script('evoinfo-bootstrap', get_template_directory_uri() ."/assets/js/bootstrap.js", array(), '5.1.3', true );
       wp_enqueue_script('evoinfo-totop', get_template_directory_uri() ."/assets/js/jquery.js", array(), '1.0', true );
       wp_enqueue_script('evoinfo-site', get_template_directory_uri() ."/assets/js/site.js", array(), '1.0', true );
   }
  add_action( 'wp_enqueue_scripts', 'evoinfo_register_scripts');
  function evoinfo_custom_post_type(){
      $labels = [
          'name' => 'Mirakuu',
          'singular_name' => 'Mirakuu',
      ];
      $args = [
          'labels' => $labels,
          'public' => true,
          'has_archive' => true,
          'hierarchical' => false,
          'supports' => array('title'),
          'taxonomies'          => array( 'category' ),
      ];
      register_post_type('mirakuu', $args);
  }
  add_action('init', 'evoinfo_custom_post_type');

  function evoinfo_custom_taxonomy(){
      $labels = [
          'name' => 'Categories',
          'singular_name' => 'Category',
      ];
      $args = [
          'labels' => $labels,
          'public' => true,
          'hierarchical' => false,
      ];
      register_taxonomy('category', 'mirakuu', $args);
  }
  add_action('init', 'evoinfo_custom_taxonomy');

  function wpmudev_ninja_form_display_enqueue_scripts(){
  	if( wp_doing_ajax() ){
  		add_action( 'nf_display_enqueue_scripts', function(){
  			global $wp_scripts, $wp_styles;
  			$wp_scripts->do_items();
  			$wp_styles->do_items();
  		});
  	}
  }
  add_action( 'admin_init', 'wpmudev_ninja_form_display_enqueue_scripts' );
