<?php

namespace LMF\CustomPostTypes;

// Register Custom Post Type
function custom_post_types() {
  
  $args = array(
    'public' => true,
    'label' => __('Products', 'sage'),
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions' ),
    'taxonomies' => array('post_tag'),
    'rewrite' => array(
      'with_front'  => false,
      'slug'  => 'produits',
    ),
  );
  register_post_type('product', $args);
  
  register_taxonomy(
		'product-category',
		'product',
		array(
			'label' => __( 'Categories', 'sage' ),
			'rewrite' => array( 'with_front' => false, 'hierarchical' => false, 'slug' => 'categorie-produits' ),
			'hierarchical' => true,
			'show_admin_column' => true,
		)
	);
}

add_action('init', __NAMESPACE__ . '\\custom_post_types', 10);


//Add custom column for Products
add_filter('manage_edit-product_columns', __NAMESPACE__ . '\\sage_product_columns');
function sage_product_columns($defaults) {
  unset($defaults['date']);
  unset($defaults['comments']);
  
  $defaults['logo'] = __('Logo', 'sage');
  $defaults['material'] = __('Material', 'sage');
  $defaults['style'] = __('Style', 'sage');
  $defaults['comments'] = '<span class="vers comment-grey-bubble" title="' . esc_attr__( 'Comments' ) . '"><span class="screen-reader-text">' . __( 'Comments' ) . '</span></span>';
  $defaults['date'] = __('Date');
  
  return $defaults;
}


add_action('manage_product_posts_custom_column', __NAMESPACE__ . '\\sage_product_posts_custom_column', 10, 2);
function sage_product_posts_custom_column($column, $post_id) {
  switch ( $column ) {
    case 'logo':
      if($logo = get_field('logo', $post_id)) {
        echo "<img src='".$logo['sizes']['medium']."' alt='' width='100'>";
      }
    break;
    
    case 'style':
      echo get_field('style', $post_id);
    break;
    
    case 'material':
      echo get_field('material', $post_id);
    break;
  }
}