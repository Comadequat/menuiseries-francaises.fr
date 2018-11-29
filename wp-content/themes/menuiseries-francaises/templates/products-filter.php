<?php
  $types = get_terms(array(
    'taxonomy'      => 'product-category',
    'parent'        => 0,
    'hide_empty'    => false,
  ));
  
  $materials = array(
    'Alu',
    'Bois-Métal',
    'Acier',
    'Bois',
    'PVC'
  );
  
  $styles = array(
    'Classique',
    'Contemporain',
  );
  
  $gammes = get_posts(array(
    'post_type'       => 'product',
    'posts_per_page'  => -1,
    'orderby'         => 'title',
    'order'           => 'ASC',
  ));
?>
<div class="products-filter">
  <form action="<?php echo get_permalink( get_page_by_title('recherche') ); ?>" method="get">
    <div class="filter-title"><?php _e('Search your products', 'sage'); ?></div>
    
    <div class="filter-box">
      <div class="filter-box-title"><?php _e('Products type', 'sage'); ?></div>
      <div class="filter-box-content">
        <select name="type">
          <option value=""><?php _e('All', 'sage'); ?></option>
          <?php foreach($types as $type): ?>
          <option value="<?php echo esc_attr($type->slug); ?>" <?php if(isset($_REQUEST['type']) && $_REQUEST['type'] == esc_attr($type->slug)): ?>selected="selected"<?php endif; ?>><?php echo $type->name; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    
    <div class="filter-box">
      <div class="filter-box-title"><?php _e('Material', 'sage'); ?></div>
      <div class="filter-box-content">
        <div class="checkboxes">
          <?php foreach($materials as $material): ?>
          <div>
            <input type="checkbox" name="material[]" value="<?php echo esc_attr($material); ?>" id="check-<?php echo esc_attr($material); ?>" <?php if(isset($_REQUEST['material']) && in_array(esc_attr($material), $_REQUEST['material'])): ?>checked="checked"<?php endif; ?>>
            <label for="check-<?php echo esc_attr($material); ?>"><?php echo $material; ?></label>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    
    <div class="filter-box">
      <div class="filter-box-title"><?php _e('Style', 'sage'); ?></div>
      <div class="filter-box-content">
        <select name="style">
          <option value=""><?php _e('All', 'sage'); ?></option>
          <?php foreach($styles as $style): ?>
          <option value="<?php echo esc_attr($style); ?>" <?php if(isset($_REQUEST['style']) && $_REQUEST['style'] == esc_attr($style)): ?>selected="selected"<?php endif; ?>><?php echo $style; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    
    <div class="filter-box">
      <div class="filter-box-title"><?php _e('Reference/Range', 'sage'); ?></div>
      <div class="filter-box-content">
        <select name="gamme">
          <option value=""><?php _e('All', 'sage'); ?></option>
          <?php foreach($gammes as $gamme): ?>
          <option value="<?php echo esc_attr($gamme->ID); ?>" <?php if(isset($_REQUEST['gamme']) && $_REQUEST['gamme'] == esc_attr($gamme->ID)): ?>selected="selected"<?php endif; ?>><?php echo get_the_title($gamme->ID); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    
    <div class="filter-submit">
      <button type="submit"><?php _e('Start the reseach', 'sage'); ?></button>
    </div>
  </form>
</div>