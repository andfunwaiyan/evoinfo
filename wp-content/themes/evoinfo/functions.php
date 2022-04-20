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
          'supports' => array('title','editor','thumbnail'),
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
