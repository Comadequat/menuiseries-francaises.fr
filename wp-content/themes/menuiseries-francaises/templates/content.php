<article <?php post_class(); ?>>
  <div class="row">
    <div class="col-sm-3">
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
    </div>
    <div class="col-sm-9">
      <header>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php get_template_part('templates/entry-meta'); ?>
      </header>
      <div class="entry-summary">
        <?php the_excerpt(); ?>
      </div>
    </div>
  </div>
</article>
