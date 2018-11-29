<?php

namespace LMF\CustomFields;

add_filter( 'acf/settings/load_json', __NAMESPACE__ . '\\acf_json_load_point' );
add_filter( 'acf/settings/save_json', __NAMESPACE__ . '\\acf_json_save_point' );

/**
 * ACF Synchronized JSON location setup
 */
function acf_json_load_point( $paths ) {
  $paths = array();
  $paths[] = dirname(__FILE__) . '/acf-json';
  
  return $paths;
}
 
function acf_json_save_point( $path ) {
  $path = dirname(__FILE__) . '/acf-json';

  return $path;
}

//Enable ACF Options Page
if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page(array(
		'page_title' 	=> __('Theme settings', 'sage'),
		'capability'	=> 'manage_options',
	));
}

add_action('acf/input/admin_head', __NAMESPACE__ . '\\sage_head_input');
function sage_head_input()
{
	?>
	<style type="text/css">
    .acf-field.clear-left,
    .acf-field.clear-left[data-width] {
      clear: left !important;
    }
    
    .acf-field .thumbnail img {
      background: #eee;
    }
    
    .taxonomy-product-category .form-field.term-description-wrap {
      display: none;
    }
	</style>

	<script type="text/javascript">
	(function($){

		/* ... */

	})(jQuery);
	</script>
	<?php
}


function custom_icon_load_field( $field )
{
	$field['choices'] = [
    'fenetre' => 'Fenêtre',
    'porte' => 'Porte',
    'escaliers' => 'Escaliers',
    'blocs-portes' => 'Blocs-Portes',
    'fermetures' => 'Fermetures',
  ];
  
  return $field;
}

add_filter('acf/load_field/name=icomoon_icon', __NAMESPACE__ . '\\custom_icon_load_field');