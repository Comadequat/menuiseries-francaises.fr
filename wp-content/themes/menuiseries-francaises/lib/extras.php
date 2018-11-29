<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }
  
  if(!is_front_page()) {
    $classes[] = 'inner-page';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return '';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

function excerpt_read_more_link($output) {
  global $post;
  return $output . '<br><a class="read-more-link" href="' . get_permalink() . '">&gt; ' . __('Read more...', 'sage') . '</a>';
}
add_filter('the_excerpt', __NAMESPACE__ . '\\excerpt_read_more_link');


function custom_excerpt_length( $length ) {
	return is_front_page() ? 15 : 50;
}
add_filter( 'excerpt_length', __NAMESPACE__ . '\\custom_excerpt_length', 10 );


function sage_get_category_parents($term) {
  $terms = array();
  
  while($term->parent) {
    $parent = get_term($term->parent);
    $terms[] = $parent;
    $term = $parent;
  }
  
  return $terms;
}


add_filter('nav_menu_css_class', __NAMESPACE__ . '\\sage_nav_menu_css_class', 10, 2);
function sage_nav_menu_css_class($classes, $item) {
  if((is_singular('product') || is_tax('product-category')) && in_array($item->title, array('Products', 'Produits'))) {
    $classes[] = 'active';
  }
  
  return $classes;
}