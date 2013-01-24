<?php
/**

 Functions
 
 */
 
 
//.................. BASIC FUNCTIONS .................. //

/* language include.*/
$lang = TEMPLATE_PATH . '/languages';
load_theme_textdomain('cebolang', $lang);

//.................. BASIC FUNCTIONS .................. //

/* Below is an include to default custom fields for the posts.*/
include(TEMPLATEPATH . '/library/simple_functions.php');


/* Include Super Furu Custom Options Panel*/
require_once(TEMPLATEPATH .  '/options/options_panel.php');


 /* ................. CUSTOM POST TYPES .................... */
/* Below is an include to a default custom post type.*/
include(TEMPLATEPATH . '/library/post_types.php');


/* .................. CUSTOM FIELDS FOR POSTS/PAGES ......... */
/* Below is an include to default custom fields for the posts.*/
include(TEMPLATEPATH . '/library/custom_fields.php');

/* .................. CUSTOM FIELDS FOR POSTS/PAGES ......... */
/* Below is an include to default custom fields for the posts.*/
include(TEMPLATEPATH . '/library/videobox.php');

/* Woo commerce*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);
 
function my_theme_wrapper_start() {
  echo '<div class="pageheader">';
}
 
function my_theme_wrapper_end() {
  echo '</div>';
}
?>