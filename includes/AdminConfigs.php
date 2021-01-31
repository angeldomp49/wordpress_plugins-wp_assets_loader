<?php
namespace MakechTec\AssetsLoader;
use MakechTec\AssetsLoader\Loader;
use MakechTec\AssetsLoader\OptionsPage;

include( 'OptionsPage.php' );

class AdminConfigs{
    public static function makeOptionsPage(){
        add_action( 'admin_menu', 'MakechTec\AssetsLoader\AdminConfigs::addMenuItem' );
    }
    public static function addMenuItem(){
        add_options_page( 'Assets Loader', 'Assets Loader', 'manage_options', 'Assets Loader', 'MakechTec\AssetsLoader\OptionsPage::render' );
    }
    public static function registerOptionsNames(){
        add_action( 'admin_init', 'MakechTec\AssetsLoader\AdminConfigs::registerSettings' );
    }
    public static function registerSettings(){
        register_setting( 'mt_al_options', 'mt_al_stocked_urls_scripts', 'MakechTec\AssetsLoader\AdminConfigs::deleteEmptyFields' );
        register_setting( 'mt_al_options', 'mt_al_stocked_urls_styles', 'MakechTec\AssetsLoader\AdminConfigs::deleteEmptyFields' );
    }
    function deleteEmptyFields( $fromOptionsPage ){
        return array_filter( $fromOptionsPage );
    }
}