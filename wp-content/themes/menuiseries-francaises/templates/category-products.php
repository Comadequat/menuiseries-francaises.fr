<?php
  $current_cat = get_queried_object();
  
  $category_products = get_posts(array(
    'post_type'           => 'product',
    'posts_per_page'      => -1,
    'product-category'    => $current_cat->slug,
  ));
?>
<div class="category-list-item">

  	<?php if($category_products && count($category_products)):
    	foreach($category_products as $product): ?>
  <div class="row" style="margin:5px 0px 5px 0px;">
  	<div class="col-sm-6" >

      	<?php if(has_post_thumbnail( $product->ID ) || $images = get_field('images', $product->ID)): ?>
      
        <a href="<?php echo get_permalink( $product->ID ); ?>">
          
	 <?php if(has_post_thumbnail( $product->ID )): ?>
          <?php echo get_the_post_thumbnail( $product->ID, 'large', array('class' => 'img-responsive' )); ?>
          <?php else: ?>
          <img src="<?php echo $images[0]['sizes']['large']; ?>" alt="" class="img-responsive" style="height:auto;">
          <?php endif; ?>
        </a>
 	 </div>
      	<?php endif; ?>
   	
 	<div class="col-sm-6">
      
         <h3 class="category-name"><a href="<?php echo get_permalink( $product->ID ); ?>"><?php echo get_the_title( $product->ID ); ?></a></h3>
      
        <?php echo get_field( 'intro_text', $product->ID ); ?>
        <div class="text-right">
          <a class="read-more-link" href="<?php echo get_permalink( $product->ID ); ?>"><?php _e('Voir le produit...', 'sage'); ?></a>
        </div>


 	 </div>
	</div>
  	<?php endforeach;
 	 endif; ?>

</div>





