<?php
  $products_page = get_field('page_products', 'options');
  $current_cat = get_queried_object();
?>

<div class="container">
  <div class="row">
    <div class="col-sm-8 col-md-9 col-sm-push-4 col-md-push-3">
      <?php get_template_part('templates/page-header'); ?>
      
      <?php
        $child_categories = get_terms(array(
          'taxonomy'          => 'product-category',
          'parent'            => $current_cat->term_id,
          'hide_empty'        => false,
        ));
      
        if($child_categories && count($child_categories)) {
          get_template_part('templates/category-top-level');
        }
        else {
          get_template_part('templates/category-products');
        }
      ?>
    </div>
    
    <div class="col-sm-4 col-md-3 col-sm-pull-8 col-md-pull-9">
      <?php get_template_part('templates/products-filter'); ?>
    </div>
  </div>
</div>