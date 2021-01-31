<?php
namespace MakechTec\AssetsLoader;

class Dependencies{
    public static function loadScripts(){
        wp_enqueue_script( 'addInputs', plugins_url( '/mt-load-assets/assets/js/addInputs.js'), array(), null, true );
    }
    public static function loadStyles(){
        //if you need any
    }
    public static function loadPluginAssets(){
        add_action( 'admin_enqueue_scripts', 'MakechTec\AssetsLoader\Dependencies::loadScripts' );
        add_action( 'admin_enqueue_scripts', 'MakechTec\AssetsLoader\Dependencies::loadStyles' );
    }
}