<?php
/**
 * Template Name: Home Template
 */

  $banner = get_field('banner');
  $banner_text = get_field('banner_text');
  $categories = get_field('categories');
  $quote_page = get_field('page_quote', 'options');
  $products_page = get_field('page_products', 'options');
?>
<div id="homepage-banner">
  <div class="slides">
    <?php if($banner): ?>
    <div class="slide" style="background-image: url('<?php echo $banner['url']; ?>');"></div>
    <?php endif; ?>
  </div>
  
  <?php if($banner_text): ?>
  <div class="banner-text">
    <div class="container">
      <div>
        <?php echo $banner_text; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
</div><!-- end homepage-banner -->

<?php if($categories):
  foreach($categories as $k => $category):
    $catalog = get_field('catalog', 'product-category_'.$category['category']->term_id);
    $news = get_field('news', 'product-category_'.$category['category']->term_id);
    $child_categories = get_terms(array(
      'taxonomy'        => 'product-category',
      'parent'          => $category['category']->term_id,
      'hide_empty'      => false,
    ));
  ?>
<div class="category-row <?php echo $k%2 == 1 ? 'row-even' : ''; ?>">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="row">
          <div class="col-sm-6">
            <div class="category-title">
              <?php if($category['icomoon_icon']): ?>
              <div class="category-icon">
                <i class="icomoon-<?php echo $category['icomoon_icon']; ?>"></i>
              </div>
              <?php endif; ?>
              
              <h2 class="color-title">
                <span><strong>Nos</strong> <?php echo strtolower($category['category']->name); ?></span>
                <span class="bg-color" style="background-color: <?php echo $category['title_color']; ?>"></span>
              </h2>
              
              <div class="breadcrumbs">
                <a href="<?php echo get_option('home'); ?>"><?php _e('Home', 'sage'); ?></a> &gt; <a href="<?php echo $products_page; ?>"><?php _e('Products', 'sage'); ?></a> &gt; <a href="<?php echo get_term_link($category['category']); ?>"><?php echo $category['category']->name; ?></a>
              </div>
            </div>
          </div>
          <?php if($category['image']): ?>
          <div class="col-sm-6">
            <div class="category-image">
              <img src="<?php echo $category['image']['url']; ?>" alt="" class="img-responsive">
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
      
      <div class="col-md-3">
        <div class="category-links">
          <?php if($catalog): ?>
          <a href="<?php echo $catalog['url']; ?>" target="_blank"><?php _e('Catalog', 'sage'); ?></a>
          <?php endif; ?>
          
          <?php if($news): ?>
          <a href="<?php echo $news['url']; ?>" target="_blank"><?php _e('News', 'sage'); ?></a>
          <?php endif; ?>
          
          <a href="<?php echo $quote_page; ?>"><?php _e('Request a quote', 'sage'); ?></a>
        </div>
      </div>
    </div>
    
    <?php if($child_categories): ?>
    <div class="child-categories">
      <div class="row">
        <?php foreach($child_categories as $cat):
          $cat_home_title = get_field('homepage_title', 'product-category_'.$cat->term_id);
          if($cat_home_title) {
            $cat_home_title = explode(PHP_EOL, $cat_home_title);
            if($cat_home_title[1]) {
              $cat_home_title[1] = "<span>".$cat_home_title[1]."</span>";
              $cat_home_title = implode("<br>", $cat_home_title);
            }
          }
          else {
            $cat_home_title = "Gamme<br><span>".$cat->name."</span>";
          }
//          $cat = get_term_by('id', $_cat, 'product-category');
        if($cat): ?>
        <div class="col-sm-6 col-md-3">
          <h3>
            <a href="<?php echo get_term_link($cat); ?>"><?php echo $cat_home_title; ?></a>
          </h3>
          <div class="category-description">
            <?php echo get_field('description', 'product-category_'.$cat->term_id); ?>
          </div>
        </div>
        <?php endif;
        endforeach; ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</div><!-- end category-row -->
  <?php endforeach;
endif;

$news = new WP_Query(array('posts_per_page' => 3));
if($news->have_posts()): ?>
<div id="recent-news">
  <div class="container">
    <h2 class="line-title"><?php _e('<span>Ne</span>ws', 'sage'); ?></h2>
    
    <div class="row news-grid">
      <?php while ($news->have_posts()) : $news->the_post(); ?>
      <div class="col-sm-4">
        <a href="<?php the_permalink(); ?>" class="article-image">
          <?php if(has_post_thumbnail()): ?>
            <?php the_post_thumbnail('blog_thumb', array('class' => 'img-responsive')); ?>
          <?php else: ?>
          <img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-blog.png" alt="" class="img-responsive">
          <?php endif; ?>

          <?php if($icon = get_field('icomoon_icon')): ?>
          <span class="icon">
            <span class="icomoon-<?php echo strtolower($icon); ?>"></span>
          </span>
          <?php endif; ?>
        </a>
        
        <div class="article-wrapper">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

          <time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>

          <?php the_excerpt(); ?>
        </div>
      </div>
      <?php endwhile; wp_reset_query() ?>
    </div>
  </div>
</div><!-- end recent-news -->
<?php endif;