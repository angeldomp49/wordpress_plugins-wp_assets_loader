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

Dependencies::loadPluginAssets();
AdminConfigs::registerOptionsNames();
AdminConfigs::makeOptionsPage();
Loader::insertUserAssets();
