<?php
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

define( 'WP_ROCKET_ADVANCED_CACHE', true );
$rocket_cache_path = '/home/comadequ/sites-en-dev/menuiseries-francaises.fr/wp-content/cache/wp-rocket/';
$rocket_config_path = '/home/comadequ/sites-en-dev/menuiseries-francaises.fr/wp-content/wp-rocket-config/';

if ( file_exists( '/home/comadequ/sites-en-dev/menuiseries-francaises.fr/wp-content/plugins/wp-rocket/inc/front/process.php' ) ) {
	include '/home/comadequ/sites-en-dev/menuiseries-francaises.fr/wp-content/plugins/wp-rocket/inc/front/process.php';
} else {
	define( 'WP_ROCKET_ADVANCED_CACHE_PROBLEM', true );
}