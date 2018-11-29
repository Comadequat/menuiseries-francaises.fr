<?php
use Roots\Sage\Wrapper;
?>

<div class="container">
  <?php get_template_part('templates/page', 'header'); ?>
  
  <div class="row">
    <div class="col-sm-8 col-md-9">
      <?php get_template_part('templates/content-single', get_post_type()); ?>
    </div>
    
    <div class="col-sm-4 col-md-3">
      <?php include Wrapper\sidebar_path(); ?>
    </div>
  </div>
</div>
