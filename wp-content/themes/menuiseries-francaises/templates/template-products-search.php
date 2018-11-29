<?php
/**
 * Template Name: Products Search Template
 */
?>
<?php
  $args = array(
    'post_type'       => 'product',
    'posts_per_page'  => -1,
    'meta_query'      => array(
      'relation'        => 'AND'
    ),
  );
  
  if(isset($_REQUEST['type']) && strlen($_REQUEST['type'])) {
    $args = array_merge($args, array('product-category'    => $_REQUEST['type']));
  }
  
  if(isset($_REQUEST['material']) && count($_REQUEST['material'])) {
    $args['meta_query'][] = array(
        'key'               => 'material',
        'value'             => $_REQUEST['material'],
        'compare'           => 'IN',
        'type'              => 'CHAR',
    );
  }
  
  if(isset($_REQUEST['style']) && strlen($_REQUEST['style'])) {
    $args['meta_query'][] = array(
        'key'               => 'style',
        'value'             => $_REQUEST['style'],
        'compare'           => '=',
        'type'              => 'CHAR',
    );
  }
  
  if(isset($_REQUEST['gamme']) && strlen($_REQUEST['gamme'])) {
    $args['post__in'] = array($_REQUEST['gamme']);
  }

  $products = get_posts($args);
  
  
?>

<div class="container">
  <div class="row">
    <div class="col-sm-8 col-md-9 col-sm-push-4 col-md-push-3">
      <?php if($products && count($products)): ?>
      <h2><?php _e('Search results:', 'sage'); ?> <?php echo sprintf( _nx('%s product found', '%s products found', count($products), 'search results count', 'sage'), count($products) ); ?></h2>
      
      <div class="category-products-list">
        <?php foreach($products as $product): ?>
        <div class="product-box">
          <div>
            <?php if(has_post_thumbnail( $product->ID ) || $images = get_field('images', $product->ID)): ?>
            <div class="product-image">
              <a href="<?php echo get_permalink( $product->ID ); ?>">
                <?php if(has_post_thumbnail( $product->ID )): ?>
                <?php echo get_the_post_thumbnail( $product->ID, 'product_thumb', array('class' => 'img-responsive' )); ?>
                <?php else: ?>
                <img src="<?php echo $images[0]['sizes']['product_thumb']; ?>" alt="" class="img-responsive">
                <?php endif; ?>
              </a>
            </div>
            <?php endif; ?>
            <div class="product-title">
              <a href="<?php echo get_permalink( $product->ID ); ?>"><?php echo get_the_title( $product->ID ); ?></a>
            </div>
            <div class="product-description">
              <?php echo get_field( 'intro_text', $product->ID ); ?>
              <div class="text-right">
                <a class="read-more-link" href="<?php echo get_permalink( $product->ID ); ?>"><?php _e('Read more...', 'sage'); ?></a>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <?php else: ?>
      <div class="alert alert-info">
        <h3>Aucun produit n'a été trouvé avec vos critères de recherche</h3>
      </div>
      <?php endif; ?>
    </div>
    
    <div class="col-sm-4 col-md-3 col-sm-pull-8 col-md-pull-9">
      <?php get_template_part('templates/products-filter'); ?>
    </div>
  </div>
</div>