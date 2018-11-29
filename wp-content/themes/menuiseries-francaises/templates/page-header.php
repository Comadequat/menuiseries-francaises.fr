<?php 
  use Roots\Sage\Titles;
  use Roots\Sage\Extras;
?>

<div class="page-header">
  <?php if(is_page() && !is_front_page()):
  global $post;
  if($post->post_parent) {
    $parents = array_reverse(get_post_ancestors( $post->ID ));
  }
  ?>
    <div class="breadcrumbs">
      <a href="<?php echo get_option('home'); ?>"><?php _e('Home', 'sage'); ?></a> &gt;
      <?php if($parents):
        foreach($parents as $p): ?>
        <a href="<?php echo get_permalink($p); ?>"><?php echo get_the_title($p); ?></a> &gt;
        <?php endforeach;
      endif; ?>
      <strong><?php the_title(); ?></strong>
    </div>
  <?php elseif(is_tax('product-category')):
    $cat = get_queried_object();
    $_category_parents = Extras\sage_get_category_parents($cat);
    
    if($_category_parents) {
      foreach(array_reverse($_category_parents) as $_cat) {
        $category_parents .= " &gt; <a href='".get_term_link($_cat)."'>".$_cat->name."</a>";
      }
    }
    else {
      $category_parents = "";
    }
    ?>
  <div class="breadcrumbs">
    <a href="<?php echo get_option('home'); ?>"><?php _e('Home', 'sage'); ?></a> &gt; <a href="<?php echo get_field('page_products', 'options'); ?>"><?php _e('Products', 'sage'); ?></a> <?php echo $category_parents; ?> &gt; <?php echo $cat->name; ?>
  </div>
  <?php elseif(is_singular('product')):
    $cat = wp_get_post_terms(get_the_ID(), 'product-category');
  
    if($cat && count($cat)) {
      $_category_parents = Extras\sage_get_category_parents($cat[0]); 
    }
    
    if($_category_parents) {
      foreach(array_reverse($_category_parents) as $_cat) {
        $category_parents .= " &gt; <a href='".get_term_link($_cat)."'>".$_cat->name."</a>";
      }
    }
    else {
      $category_parents = "";
    }
    ?>
  <div class="breadcrumbs">
    <a href="<?php echo get_option('home'); ?>"><?php _e('Home', 'sage'); ?></a> &gt; <a href="<?php echo get_field('page_products', 'options'); ?>"><?php _e('Products', 'sage'); ?></a> <?php echo $category_parents; ?><?php if($cat && count($cat)): ?> &gt; <a href="<?php echo get_term_link($cat[0]); ?>"><?php echo $cat[0]->name; ?></a><?php endif; ?> &gt; <?php echo get_the_title(); ?>
  </div>
  <?php endif; ?>
  
  <?php if(!is_singular('product')): ?>
  <h1><?= Titles\title(); ?></h1>
  <?php endif; ?>
</div>