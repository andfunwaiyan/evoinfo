<?php

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
