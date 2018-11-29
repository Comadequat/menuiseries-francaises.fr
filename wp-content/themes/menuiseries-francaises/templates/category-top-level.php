<?php
  $current_cat = get_queried_object();
  $child_categories = get_terms(array(
    'taxonomy'          => 'product-category',
    'parent'            => $current_cat->term_id,
    'hide_empty'        => false,
  ));
  if($child_categories && count($child_categories)):
    foreach($child_categories as $category):
      $category_image = get_field('image', 'product-category_'.$category->term_id);
      $category_description = get_field('description_list', 'product-category_'.$category->term_id);
      $category_products = get_posts(array(
        'post_type'           => 'product',
        'posts_per_page'      => -1,
        'product-category'    => $category->slug,
      ));
    ?>
<div class="category-list-item">
  <div class="row">
    <?php if($category_image): ?>
    <div class="col-sm-4">
      <div class="category-image">
        <a href="<?php echo get_term_link( $category ); ?>">
 
          <img src="<?php echo $category_image['sizes']['product_category_thumb_large']; ?>" alt="" class="img-responsive">
        </a>
      </div>
    </div>
    <?php endif;?>
    <div class="col-sm-<?php echo $category_image ? 8 : 12 ?>">
      <h3 class="category-name"><a href="<?php echo get_term_link( $category ); ?>"><?php echo $category->name; ?></a></h3>
      <?php echo $category_description; ?>
      <?php if($category_products && count($category_products)): ?>
        <?php $a=0; ?>
        <?php foreach($category_products as $product):
          if($logo = get_field('logo', $product->ID)): 
                if ($a==0){
                  echo "<h4>Gammes:</h4>";
                  $a=1;}
                    ?>
                <a href="<?php echo get_permalink( $product->ID ); ?>" class="gamme-logo">
                  <img src="<?php echo $logo['url']; ?>" alt="" class="img-responsive">
                </a>
          
          <?php endif;
        endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</div>
    <?php endforeach;
  endif;