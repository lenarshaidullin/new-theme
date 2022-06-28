<?php

  // functions

  add_action('wp_enqueue_scripts', function() {
    wp_enqueue_script('jquery');
  });
  
  
  // https://wp-kama.ru/function/remove_menu_page
  add_action('admin_menu', 'remove_menus');
  function remove_menus() {
    // remove_menu_page( 'index.php' );                  // Консоль
    // remove_menu_page( 'edit.php' );                   // Записи
    // remove_menu_page( 'upload.php' );                 // Медиафайлы
    // remove_menu_page( 'edit.php?post_type=page' );    // Страницы
    remove_menu_page( 'edit-comments.php' );          // Комментарии
    // remove_menu_page( 'themes.php' );                 // Внешний вид
    // remove_menu_page( 'plugins.php' );                // Плагины
    // remove_menu_page( 'users.php' );                  // Пользователи
    // remove_menu_page( 'tools.php' );                  // Инструменты
    // remove_menu_page( 'options-general.php' );        // Параметры
  }
  
  
  // https://wp-kama.ru/id_4409/ubiraem-generatsiyu-kopiy-zagruzhaemyih-izobrazheniy-v-wordpress.html#kogda-nuzhno-ubirat-generatsiyu-kopij-izobrazhenij
  add_filter('intermediate_image_sizes', 'delete_intermediate_image_sizes');
  function delete_intermediate_image_sizes($sizes) {
    return array_diff($sizes, ['medium_large', 'large', '1536x1536', '2048x2048']);
  }
  add_filter('big_image_size_threshold', '__return_zero');
  
  
  // https://support.advancedcustomfields.com/forums/topic/shortcodes-in-text-field/
  add_filter('acf/format_value/type=textarea', 'do_shortcode');
  add_filter('acf/format_value/type=text', 'do_shortcode');
  add_filter('acf/format_value/type=acf_code_field', 'do_shortcode');
  
  
  // https://www.advancedcustomfields.com/resources/options-page/
  if( function_exists('acf_add_options_page') ) {
  
    acf_add_options_page(array(
      'page_title' 	=> 'Theme Settings',
      'menu_title'	=> 'Theme Settings',
      'menu_slug' 	=> 'theme-general-settings',
      'capability'	=> 'edit_posts',
      'redirect'		=> false
    ));
    
    acf_add_options_sub_page(array(
      'page_title' 	=> 'Header Settings',
      'menu_title'	=> 'Header',
      'parent_slug'	=> 'theme-general-settings',
    ));
    
    acf_add_options_sub_page(array(
      'page_title' 	=> 'Footer Settings',
      'menu_title'	=> 'Footer',
      'parent_slug'	=> 'theme-general-settings',
    ));
    
  }

  // functions end
  
?>