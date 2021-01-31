<?php
/*
Plugin Name: Assets Loader
Plugin URI: https://makechtecnology.com/assets-loader
Description: Carga CDN de estilos y scripts js con la configuración de wordpress
Author: Makech Tecnology
Version: 1.0.0
Author URI:https://makechtecnology.com
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/
use MakechTec\AssetsLoader\Loader;
use MakechTec\AssetsLoader\AdminConfigs;

$includes = 'includes/';

include( $includes . 'Loader.php' );
include( $includes . 'AdminConfigs.php' );
include( $includes . 'Dependencies.php' );

add_action( 'admin_init', 'MakechTec\AssetsLoader\AdminConfigs::registerSettings' );

add_action( 'admin_enqueue_scripts', 'MakechTec\AssetsLoader\Dependencies::loadScripts' );
add_action( 'wp_enqueue_scripts', 'MakechTec\AssetsLoader\Loader::enqueueScripts');
add_action( 'wp_enqueue_styles', 'MakechTec\AssetsLoader\Loader::enqueueStyles' );

add_action( 'admin_menu', 'MakechTec\AssetsLoader\AdminConfigs::menu' );








