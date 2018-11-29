<?php the_content(); ?>

<?php if($content = get_field('content')):
  foreach($content as $section): ?>
<div class="content-section content-section-<?php echo str_replace("_", "-", $section['acf_fc_layout']); ?>">
  <?php switch ($section['acf_fc_layout']):
    case 'two_columns': ?>
  <div class="row">
    <div class="col-sm-<?php echo $section['columns_layout']== '2_1' ? 8 : ($section['columns_layout']== '1_2' ? 4 : 6); ?>">
      <div class="column-left"><?php echo $section['column_left']; ?></div>
    </div>
    <div class="col-sm-<?php echo $section['columns_layout']== '2_1' ? 4 : ($section['columns_layout']== '1_2' ? 8 : 6); ?>">
      <div class="column-right"><?php echo $section['column_right']; ?></div>
    </div>
  </div>
    <?php break;
  
    case 'text_block': ?>
  <div class="text-block">
    <?php echo $section['text']; ?>
  </div>
    <?php break;
  
    case 'videos_list': ?>
  <div class="row videos-list">
    <?php if($section['videos']):
      foreach($section['videos'] as $video): ?>
    <div class="video-column col-md-3 col-sm-6 col-xs-6">
      <div class="video-box">
        <div class="video-image">
          <a href="<?php echo $video['link']; ?>" target="_blank">
            <img src="<?php echo $video['thumbnail']['sizes']['medium']; ?>" alt="" class="img-responsive">
          </a>
        </div>
        <div class="video-title">
          <a href="<?php echo $video['link']; ?>" target="_blank"><?php echo $video['title']; ?></a>
        </div>
        <?php if($video['description']): ?>
        <div class="video-description">
          <?php echo $video['description']; ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
      <?php endforeach;
    endif; ?>
  </div>
    <?php break;
  
    case 'video': ?>
  <div class="video-block">
    <div class="embed-responsive embed-responsive-<?php echo $section['aspect_ratio']; ?>">
      <?php echo $section['video_code']; ?>
    </div>
  </div>
    <?php break;
  
    case 'multiple_columns':
      switch(count($section['columns'])) {
        case 4:
          $class = "col-sm-6 col-md-3";
        break;
        case 3:
          $class = "col-sm-4";
        break;
        case 2:
          $class = "col-sm-6";
        break;
        default:
          $class = "col-sm-12";
        break;
      } ?>
  <div class="row">
      <?php foreach($section['columns'] as $column): ?>
    <div class="<?php echo $class ?>">
      <?php echo $column['text']; ?>
    </div>
      <?php endforeach; ?>
  </div>
    <?php break;
  endswitch; ?>
</div>
  <?php endforeach;
endif;
