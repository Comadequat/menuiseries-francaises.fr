<?php
use Roots\Sage\Wrapper;
?>

<div class="container">
  <?php get_template_part('templates/page', 'header'); ?>
  
  <div class="row">
    <div class="col-sm-8 col-md-9">
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('templates/content', 'page'); ?>
      <?php endwhile; ?>
    </div>
    
    <div class="col-sm-4 col-md-3">
      <?php include Wrapper\sidebar_path(); ?>
    </div>
  </div>
</div>