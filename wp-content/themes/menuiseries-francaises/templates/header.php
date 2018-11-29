<header id="header" class="<?php echo is_front_page() ? 'over-banner dark' : ''; ?>">

  <div class="container">

    <div class="navbar-header">

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation" aria-expanded="false">

        <span class="sr-only">Menu</span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

      </button>

      

      <a class="brand" href="<?= esc_url(home_url('/')); ?>">

      <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/logo.png" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="img-responsive">

    </a>

    </div>

    

    <nav id="navigation">

      <?php

      if (has_nav_menu('primary_navigation')) :

        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);

      endif;

      ?>

    </nav>

    

    <a class="brand-club hidden-sm hidden-xs" href="http://www.clubdesmenuisierspros.fr/" target="_blank">

      <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/logo-club.png" alt="Le Club" class="img-responsive">

    </a>
          <a class="brand-club hidden-sm hidden-xs brand-facebook" href="https://www.facebook.com/lesmenuiseriesfrancaises/" target="_blank">

      <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/facebook.png" alt="Facebook" class="img-responsive">

    </a>
    <a class="brand-club hidden-sm hidden-xs brand-youtube" href="https://www.youtube.com/channel/UCqA1f96GBhDacp3Vizej4jg" target="_blank">

      <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/youtube.png" alt="Youtube" class="img-responsive">

    </a>

  </div>

</header>

