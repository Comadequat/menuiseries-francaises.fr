<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <!--<h1 class="entry-title"><?php the_title(); ?></h1>-->
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      <?php if(has_post_thumbnail()): ?>
      <div class="article-image">
        <?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>
        
        <?php if($icon = get_field('icomoon_icon')): ?>
        <span class="icon">
          <span class="icomoon-<?php echo strtolower($icon); ?>"></span>
        </span>
        <?php endif; ?>
      </div>
      <?php endif; ?>
      
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>

<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Retour au blog</a>
<?php endwhile; ?>