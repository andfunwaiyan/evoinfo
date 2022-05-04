<?php
   function evoinfo_register_scripts(){

       wp_enqueue_script('evoinfo-bootstrap', get_template_directory_uri() ."/assets/js/bootstrap.js", array(), '5.1.3', true );
	  
//        wp_enqueue_script('evoinfo-totop', get_template_directory_uri() ."/assets/js/jquery.js", array(), '1.0', true );
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


   /*/---- Validate contact Form  ----/*/

  function custom_name_validation_filter( $result, $tag ) {

	  if ( "kana" == $tag->name ) {
		  $name = isset( $_POST[$tag->name] ) ? $_POST[$tag->name]  : '';

		  if ( $name != "" && !mb_ereg("^[ァ-ヶー]+$",$name) ) {
			  $result->invalidate( $tag, "フリガナは全角カナで入力してください。" );
		  }
	  }
	  if ( "fax" == $tag->name ) {
		  $name = isset( $_POST[$tag->name] ) ? $_POST[$tag->name]  : '';

		  if ( $name != "" && !preg_match("/^\+?[0-9]{7,}$/",$name) ) {
			  $result->invalidate( $tag, "FAX番号は半角数値もしくは、「-」「+」のみで入力してください。" );
		  }
	  }  
	  return $result;
  }
  add_filter( 'wpcf7_validate_text', 'custom_name_validation_filter', 20, 2 );
  add_filter( 'wpcf7_validate_text*', 'custom_name_validation_filter', 20, 2 );


  
