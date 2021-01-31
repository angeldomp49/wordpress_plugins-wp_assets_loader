<?php
/*
Plugin Name: Assets Loader
Plugin URI: http://makechtecnology.com
Description: Cargando scripst personalizados
Author: Neil Gee
Version: 1.3.2
Author URI:http://makechtecnology.com
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
Text Domain: assetsLoader
Domain Path: /languages/
*/
use MakechTec\PageManager\Template\Template;
use MakechTec\PageManager\Site;
use MakechTec\AssetsLoader\Loader;
use MakechTec\AssetsLoader\AdminConfigs;

$externalDependencies = 'vendor/MakechTec/PageManager/';
$includes = 'includes/';

include( $externalDependencies . 'Template/Template.php' );
include( $externalDependencies . 'Site.php' );
include( $includes . 'Loader.php' );
include( $includes . 'AdminConfigs.php' );
include( $includes . 'Dependencies.php' );

add_action( 'admin_init', 'MakechTec\AssetsLoader\AdminConfigs::registerSettings' );

add_action( 'admin_enqueue_scripts', 'MakechTec\AssetsLoader\Dependencies::loadScripts' );
add_action( 'wp_enqueue_scripts', 'MakechTec\AssetsLoader\Loader::enqueueScripts');
add_action( 'wp_enqueue_styles', 'MakechTec\AssetsLoader\Loader::enqueueStyles' );

add_action( 'admin_menu', 'MakechTec\AssetsLoader\AdminConfigs::menu' );








