<?php

use Roots\Sage\Extras;

function p($val, $die = 1)
{
  echo '<pre>';
  var_dump($val);
  echo '</pre>';
  if ($die != 0) {
    die;
  }
}

// Get product parent category

$cat = wp_get_post_terms(get_the_ID(), 'product-category');

if ($cat && count($cat)) {
  $cat = $cat[0];
  $parent_cat = $cat;

  if ($parent_cat->parent) {
    $_category_parents = Extras\sage_get_category_parents($parent_cat);
    if ($_category_parents && count($_category_parents)) {
      $parent_cat = $_category_parents[0];
    }
  }

  $cat_title = get_field('custom_title', 'product-category_' . $cat->term_id);

  if ($cat_title) {
    $cat_title = explode(PHP_EOL, $cat_title);
    $cat_title[0] = "<span class='red'>" . $cat_title[0] . "</span>";
    $cat_title = implode("<br>", $cat_title);
  }
  $catalog = get_field('catalog', 'product-category_' . $cat->term_id);
  $news    = get_field('news', 'product-category_' . $cat->term_id);

  if (!$catalog):
    $catalog = get_field('catalog', 'product-category_' . $parent_cat->term_id);
  endif;

  if (!$news):
    $news = get_field('news', 'product-category_' . $parent_cat->term_id);
  endif;

}
$logo = get_field('logo');
$images = get_field('images');
$small_logos = get_field('small_logos');
$show_produits = get_field('show_produits');

if ($show_produits) {
  $produits = get_field('produits');
}

$show_plus_produits = get_field('show_plus_produits');
if ($show_plus_produits) {
  $plus_produits_text = get_field('plus_produits_text');
}

$show_accessoires = get_field('show_accessoires');
if ($show_accessoires) {
  $accessoires_text = get_field('accessoires_text');
}

$show_descriptif_technique = get_field('show_descriptif_technique');
if ($show_descriptif_technique) {
  $descriptif_technique_text = get_field('descriptif_technique_text');
}

$show_performances = get_field('show_performances');
if ($show_performances) {
  $performances_text = get_field('performances_text');
}

$show_finitions = get_field('show_finitions');
if ($show_finitions) {
  $finitions = get_field('finitions');
}

$show_videos = get_field('show_videos');
if ($show_videos) {
  $videos = get_field('videos');
}

$show_notices = get_field('show_notices');
if ($show_notices) {
  $notices = get_field('notices');
}

// Page id
$idContact = 17;
$idDevis = 159;
$idCatalog = 146;

$imageData = wp_get_attachment_image_src(get_post_thumbnail_id ( $post_ID ), 'large');
?>

<?php while (have_posts()) : the_post(); ?>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <?php //get_template_part('templates/page-header'); ?>

        <div class="new-product-top">
          <div class="row">
            <div class="col-md-4" style="padding-right: 0px;">
              <div class="container-product-title">
                  <img src="<?= get_stylesheet_directory_uri(); ?>/dist/images/logo-tempo.png" class="img-responsive" />
                  <?php if ($parent_cat): ?>
                    <h2><?php echo $parent_cat->name; ?></h2>
                  <?php endif; ?>
              </div>
              <div class="container-product-description">
                <h2><?php the_title(); ?></h2>
                <?php if ($cat_title): ?>
                  <h1><?php echo $cat_title; ?></h1>
                <?php endif; ?>

                <div class="product-description"><?php the_content(); ?></div>
                <?php if ($logo): ?>
                 <!-- <div class="product-logo">
                    <img src="<?php echo $logo['sizes']['large']; ?>" alt="" class="img-responsive">
                  </div> -->
                <?php endif; ?>
              </div>
          </div>
            <div class="col-md-8 container-images">
              <div class="product-images">
                <?php if ($images): ?>
                  <div class="big-image-slideshow">
                    <?php foreach ($images as $image): ?>
                      <div class="slide">
                        <img src="<?php echo $image['sizes']['large']; ?>" alt=""
                           class="img-responsive">
                      </div>
                    <?php endforeach; ?>
                  </div>
                <?php else: ?>
                  <?php the_post_thumbnail('large'); ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="new-container-logos">
          <div class="col-md-12">
              <?php if ($small_logos): ?>
                <div class="row">
                    <?php foreach ($small_logos as $_logo): ?>
                      <div class="col-sm-6 col-md-4">
                          <img src="<?php echo $_logo['sizes']['medium']; ?>" alt="<?= $_logo['alt']; ?>"
                             class="img-responsive">
                             <span><?= !empty($_logo['title']) ? $_logo['title'] : ''; ?></span>
                       </div>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>
          </div>
          
          <?php /* if ($news): ?>
            <a href="<?php echo $news['url']; ?>" target="_blank"><?php _e('News', 'sage'); ?></a>
          <?php endif;  */?>
        </div>
        <?php if ($show_plus_produits): ?>
          <div class="container-product-description">
            <div class="col-md-8 container-images container-image-2">

              <?php the_post_thumbnail('large'); ?>
            </div>
            <div class="col-md-4 container-description-new-look">
              <div class="title-new-look">Les + Produits</div>
              <div class="description-new-look">
                <?php echo $plus_produits_text; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
        <div class="container-more-information">
          <div class="col-md-12">
            <div class="row container-more-information-title">
                <div class="title-new-look">En savoir + sur le produit</div>
                <ul class="nav nav-tabs" role="tablist">
                  <?php if ($show_descriptif_technique): ?>
                    <li role="presentation" class="active">
                      <a href="#tab-descriptif-technique" role="tab" data-toggle="tab">Descriptif Technique</a>
                    </li>
                  <?php endif; ?>
                  <?php if ($show_accessoires): ?>
                    <li role="presentation">
                      <a href="#tab-accessoires" role="tab" data-toggle="tab">Accessoires</a>
                    </li>
                  <?php endif; ?>

                  <?php if ($show_performances): ?>
                    <li role="presentation"><a href="#tab-performances" role="tab" data-toggle="tab">Performances</a>
                    </li>
                  <?php endif; ?>

                  <?php if ($show_finitions): ?>
                    <li role="presentation"><a href="#tab-finitions" role="tab" data-toggle="tab">Finitions</a>
                    </li>
                  <?php endif; ?>
		
		<?php if ($show_videos): ?>
                    <li role="presentation"><a href="#tab-videos" role="tab" data-toggle="tab">Vidéos</a>
                    </li>
                  <?php endif; ?>

<?php if ($show_notices): ?>
                    <li role="presentation"><a href="#tab-notices" role="tab" data-toggle="tab">Notices de pose</a>
                    </li>
                  <?php endif; ?>


                </ul>
              </div>
          </div>
          <div class="contianer-tab">
            <div class="tab-content">
              <?php if ($show_descriptif_technique): ?>
                <div role="tabpanel" class="tab-pane active" id="tab-descriptif-technique">
                  <?php echo $descriptif_technique_text; ?>
                </div>
              <?php endif; ?>
              <?php if ($show_accessoires): ?>
                <div role="tabpanel" class="tab-pane" id="tab-accessoires">
                  <?php echo $accessoires_text; ?>
                </div>
              <?php endif; ?>

              <?php if ($show_performances): ?>
                <div role="tabpanel" class="tab-pane" id="tab-performances">
                  <?php echo $performances_text; ?>
                </div>
              <?php endif; ?>

              <?php if ($show_finitions): ?>
                <div role="tabpanel" class="tab-pane" id="tab-finitions">
                  <?php if ($finitions && count($finitions)): ?>
                    <div class="finitions">
                      <?php foreach ($finitions as $finition): ?>
                        <?php if ($finition['description']): ?>
                          <div class="finitions-description"><?php echo $finition['description']; ?></div>
                        <?php endif; ?>
                        <?php if ($finition['items'] && count($finition['items'])): ?>
                          <div class="finitions-items">
                            <?php foreach ($finition['items'] as $item): ?>
                              <div class="finition-box">
                                <div>
                                  <img src="<?php echo $item['image']['sizes']['thumbnail']; ?>"
                                     alt="" class="img-responsive">
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

		<?php if ($show_videos): ?>
                <div role="tabpanel" class="tab-pane" id="tab-videos">
                  <?php if ($videos && count($videos)): ?>
                    <div class="videos">
                      <?php foreach ($videos as $video): ?>
                          <?php if ($video['url_video'] && count($video['url_video'])): ?>
                          <div class="videos-items">
                           	<div class="video-container">
 					<iframe src="<?php echo $video['url_video']; ?>" frameborder="0" width="650" height="327"></iframe> 
				</div>
                          </div>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>



<?php if ($show_notices): ?>
                <div role="tabpanel" class="tab-pane" id="tab-notices">
                  <?php if ($notices && count($notices)): ?>
                    <div class="notices">
<p>Téléchargez ci-dessous la ou les notices de pose associée(s) au produit :</p>
                      <?php foreach ($notices as $notice): ?>
                          <?php if ($notice['url_notice'] && count($notice['url_notice'])): ?>
                          <div class="notices-items">

                           	<div class="notice-container">
					
 					<a href="<?php echo $notice['url_notice']; ?>" target="_blank" class="btn-color" style="margin:5px;"><?php echo $notice['nom_notice']; ?></a> 
				</div>
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
        <?php if ($show_produits): ?>
          <div class="contianer-new-products">
              <div class="title-new-look">les <?= count($produits); ?> produits <?= the_title(); ?></div>
              <div class="container-products-item-new">
                <?php foreach ($produits as $product): ?>
                  <div class="col-sm-4 col-md-2 new-product-item">
                    <img src="<?= $product['image']['sizes']['medium']; ?>" alt="<?= $product['image']['alt']; ?>" class="img-responsive" />
                    <div class="new-product-title">
                      <span class="dashicons dashicons-plus-alt"></span> <?= $product['title']; ?>
                    </div>
                    <div class="new-product-description">
                      <span class="dashicons dashicons-plus-alt"></span> <?= !empty($product['text']) ? $product['text'] : ''; ?>
                    </div>
                  </div>
                <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="container-footer-top">
            <div class="row">
              <div class="col-sm-4 col-md-4">
                <a href="<?= get_page_link($idContact); ?>">
                  <img src="<?= get_stylesheet_directory_uri(); ?>/dist/images/logo-contact.png" class="img-responsive">
                  Demande de contact
                </a>
              </div>
              <div class="col-sm-4 col-md-4">
                <a href="<?= get_page_link($idDevis); ?>">
                  <img src="<?= get_stylesheet_directory_uri(); ?>/dist/images/logo-devis.png" class="img-responsive">
                  Demande de devis
                </a>
              </div>
              <div class="col-sm-4 col-md-4">
                <a href="<?= get_page_link($idCatalog); ?>" target="_blank">
                  <img src="<?= get_stylesheet_directory_uri(); ?>/dist/images/logo-catalogue.png" class="img-responsive">
                  Télécharger le catalogue
                </a>
              </div>
            </div>
        </div>
      </div>
      <?php /*
      <div class="col-sm-4 col-md-3 col-sm-pull-8 col-md-pull-9">
        <?php get_template_part('templates/products-filter'); ?>
      </div> 
      */ ?>
    </div>
  </div>
<?php endwhile; ?>