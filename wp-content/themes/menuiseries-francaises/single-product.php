<?php
  use Roots\Sage\Extras;

  if(get_the_ID() <>0) {
      include 'single-product-new.php';
  } else {

  

  // Get product parent category

  $cat = wp_get_post_terms(get_the_ID(), 'product-category');

  

  if($cat && count($cat)) {

    $cat = $cat[0];

    $parent_cat = $cat;

    

    if($parent_cat->parent) {

      $_category_parents = Extras\sage_get_category_parents($parent_cat); 

      if($_category_parents && count($_category_parents)) {

        $parent_cat = $_category_parents[0];

      }

    }

    

    $cat_title = get_field('custom_title', 'product-category_'.$cat->term_id);

    if($cat_title) {

      $cat_title = explode(PHP_EOL, $cat_title);

      $cat_title[0] = "<span class='red'>".$cat_title[0]."</span>";

      $cat_title = implode("<br>", $cat_title);

    }

    

    $catalog = get_field('catalog', 'product-category_'.$cat->term_id);
    $news = get_field('news', 'product-category_'.$cat->term_id);

 	if(!$catalog): 
    $catalog = get_field('catalog', 'product-category_'.$parent_cat->term_id);

	endif;


        if(!$news): 
    $news = get_field('news', 'product-category_'.$parent_cat->term_id);
	 endif; 


  }

  

  $logo = get_field('logo');

  $images = get_field('images');

  $small_logos = get_field('small_logos');

  

  $show_produits = get_field('show_produits');

  if($show_produits) {

    $produits = get_field('produits');

  }

  

  $show_plus_produits = get_field('show_plus_produits');

  if($show_plus_produits) {

    $plus_produits_text = get_field('plus_produits_text');

  }

  

  $show_accessoires = get_field('show_accessoires');

  if($show_accessoires) {

    $accessoires_text = get_field('accessoires_text');

  }

  

  $show_descriptif_technique = get_field('show_descriptif_technique');

  if($show_descriptif_technique) {

    $descriptif_technique_text = get_field('descriptif_technique_text');

  }

  

  $show_performances = get_field('show_performances');

  if($show_performances) {

    $performances_text = get_field('performances_text');

  }

  

  $show_finitions = get_field('show_finitions');

  if($show_finitions) {

    $finitions = get_field('finitions');

  }

?>



<?php while (have_posts()) : the_post(); ?>

<div class="container">

  <div class="row">

    <div class="col-sm-8 col-md-9 col-sm-push-4 col-md-push-3">

      <?php get_template_part('templates/page-header'); ?>

      

      <div class="product-top">

        <div class="row">

          <div class="col-md-4">

            <div class="product-images">

            <?php if($images): ?>

              <div class="big-image-slideshow">

                <?php foreach($images as $image): ?>

                <div class="slide">

                  <img src="<?php echo $image['sizes']['product_large']; ?>" alt="" class="img-responsive">

                </div>

                <?php endforeach; ?>

              </div>

              

              <?php if(count($images) > 1): ?>

              <div class="thumbs-slideshow">

                <?php foreach($images as $image): ?>

                <div class="slide">

                  <img src="<?php echo $image['sizes']['product_thumb_small']; ?>" alt="" class="img-responsive">

                </div>

                <?php endforeach; ?>

              </div>

              <?php endif; ?>

            <?php else: ?>

              <?php the_post_thumbnail('large'); ?>

            <?php endif; ?>

            </div>

          </div>

          

          <div class="col-md-8">

            <?php if($parent_cat): ?>

            <h2 class="parent-category-title cat-color-<?php echo $parent_cat->slug; ?>"><?php echo $parent_cat->name; ?></h2>

            <?php endif; ?>

            

            <?php if($cat_title): ?>

            <h1 class="product-category-title hide-<?php echo $produits[0]['image']['id']; ?>"><?php echo $cat_title; ?></h1>

            <?php endif; ?>

            

            <h2 class="product-title"><?php the_title(); ?></h2>

            

            <div class="product-description"><?php the_content(); ?></div>

            

            <?php if($logo): ?>

            <div class="product-logo">

              <img src="<?php echo $logo['sizes']['large']; ?>" alt="" class="img-responsive">

            </div>

            <?php endif; ?>

            

            <div class="row">

              <?php if($small_logos): ?>

              <div class="product-small-logos">

                <?php foreach($small_logos as $_logo): ?>

                <img src="<?php echo $_logo['sizes']['medium']; ?>" alt="" class="img-responsive">

                <?php endforeach; ?>

              </div>

              <?php endif; ?>

              

              <div class="product-cat-links">

                <?php if($catalog): ?>

                <a href="<?php echo $catalog['url']; ?>" target="_blank"><?php _e('Catalog', 'sage'); ?></a>

                <?php endif; ?>


                <?php if($news): ?>

                <a href="<?php echo $news['url']; ?>" target="_blank"><?php _e('News', 'sage'); ?></a>

                <?php endif; ?>

              </div>

            </div>

          </div>

        </div>

      </div>

      

      <div class="product-tabs">

        <ul class="nav nav-tabs" role="tablist">

          <?php if($show_produits): ?>

          <li role="presentation" class="active"><a href="#tab-produits" role="tab" data-toggle="tab">Produits</a></li>

          <?php endif; ?>

          

          <?php if($show_plus_produits): ?>

          <li role="presentation"><a href="#tab-plus-produits" role="tab" data-toggle="tab">Plus Produits</a></li>

          <?php endif; ?>

          

          <?php if($show_accessoires): ?>

          <li role="presentation"><a href="#tab-accessoires" role="tab" data-toggle="tab">Accessoires</a></li>

          <?php endif; ?>

          

          <?php if($show_descriptif_technique): ?>

          <li role="presentation"><a href="#tab-descriptif-technique" role="tab" data-toggle="tab">Descriptif Technique</a></li>

          <?php endif; ?>

          

          <?php if($show_performances): ?>

          <li role="presentation"><a href="#tab-performances" role="tab" data-toggle="tab">Performances</a></li>

          <?php endif; ?>

          

          <?php if($show_finitions): ?>

          <li role="presentation"><a href="#tab-finitions" role="tab" data-toggle="tab">Finitions</a></li>

          <?php endif; ?>

        </ul>

        

        <div class="tab-content">

          <?php if($show_produits): ?>

          <div role="tabpanel" class="tab-pane active" id="tab-produits">

            <?php if($produits && count($produits)): ?>

           

            <div id="carousel-example-generic" class="carousel-inner carousel slide" data-ride="carousel"> 
              <?php $prd = 0; foreach($produits as $product): ?>
              <div class="item  <?php if ($prd==0) echo 'active'; ?>">
                <div class="row">
                  <div class="col-sm-8">
                    <?php if($product['title']): ?>
                    <div class="prod-title"><?php echo $product['title']; ?></div>
                    <?php endif; ?>
                    <?php echo $product['text']; ?>
                  </div>
                  <div class="col-sm-4">
                    <?php if($product['image']): ?>
                    <div class="prod-image">
                      <img src="<?php echo $product['image']['sizes']['large']; ?>" alt="" class="img-responsive">
                    </div>
                    <?php endif; ?>

                  </div>
                    <?php $prd++ ; ?> 

                </div>
                 
              </div>

              <?php endforeach; ?>
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </div>

            <?php endif; ?>

          </div>

          <?php endif; ?>

          

          <?php if($show_plus_produits): ?>

          <div role="tabpanel" class="tab-pane" id="tab-plus-produits">

            <?php echo $plus_produits_text; ?>

          </div>

          <?php endif; ?>

          

          <?php if($show_accessoires): ?>

          <div role="tabpanel" class="tab-pane" id="tab-accessoires">

            <?php echo $accessoires_text; ?>

          </div>

          <?php endif; ?>

          

          <?php if($show_descriptif_technique): ?>

          <div role="tabpanel" class="tab-pane" id="tab-descriptif-technique">

            <?php echo $descriptif_technique_text; ?>

          </div>

          <?php endif; ?>

          

          <?php if($show_performances): ?>

          <div role="tabpanel" class="tab-pane" id="tab-performances">

            <?php echo $performances_text; ?>

          </div>

          <?php endif; ?>

          

          <?php if($show_finitions): ?>

          <div role="tabpanel" class="tab-pane" id="tab-finitions">

            <?php if($finitions && count($finitions)): ?>

            <div class="finitions">

              <?php foreach($finitions as $finition): ?>

                <?php if($finition['description']): ?>

                <div class="finitions-description"><?php echo $finition['description']; ?></div>

                <?php endif; ?>



                <?php if($finition['items'] && count($finition['items'])): ?>

                <div class="finitions-items">

                  <?php foreach($finition['items'] as $item): ?>

                    <div class="finition-box">

                      <div>

                        <img src="<?php echo $item['image']['sizes']['thumbnail']; ?>" alt="" class="img-responsive">

                        <span class="finition-title"><?php echo $item['title']; ?></span>

                      </div>

                    </div>

                  <?php endforeach; ?>

                </div>

                <?php endif; ?>

              <?php endforeach; ?>

            </div>

            <?php endif; ?>

          </div>

          <?php endif; ?>

        </div>

      </div>

    </div>
    

    <div class="col-sm-4 col-md-3 col-sm-pull-8 col-md-pull-9">

      <?php get_template_part('templates/products-filter'); ?>

    </div>

  </div>

</div>

<?php endwhile; ?>
<?php } ?>