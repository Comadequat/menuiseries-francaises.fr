<?php

  $footer_main_column = get_field('footer_main_column', 'options');

  $footer_secondary_columns = get_field('footer_secondary_columns', 'options');

  $bottom_text = get_field('bottom_text', 'options');

?>

<footer id="footer">

  <div class="container">

    <h2>VOIR AUSSI</h2>

    

    <div class="row">

      <div class="col-md-4">

        <div class="footer-main-column">

          <?php echo $footer_main_column; ?>

        </div>

      </div>

      

      <div class="col-md-8">

        <div class="row">

          <?php if($footer_secondary_columns):

            foreach($footer_secondary_columns as $k => $column): ?>

          <div class="col-sm-<?php echo $k==0 ? 5 : ($k==2 ? 3 : 4); ?>">

            <div class="footer-secondary-column">

              <?php echo $column['text']; ?>

            </div>

          </div>

            <?php endforeach;

          endif; ?>

        </div>

      </div>

    </div>

  </div>

</footer>



<div id="bottom">

  <div class="container">

    <div class="bottom-text">

      <?php echo $bottom_text; ?>

    </div>

    

    <div class="st-gobain">

      <a href="https://www.saint-gobain.com/fr/groupe" target="_blank">

        <img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo-st-gobain.png" alt="SAINT GOBAIN" class="img-responsive">

      </a>

    </div>

  </div>

</div>
<script type="text/javascript">
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','__gaTracker');

	__gaTracker('create', 'UA-45394506-1', 'auto');
	__gaTracker('send','pageview');

</script>