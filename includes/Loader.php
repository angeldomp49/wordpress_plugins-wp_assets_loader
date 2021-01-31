<?php
namespace MakechTec\AssetsLoader;

class Loader{
    public static function insertUserAssets(){
        add_action( 'wp_enqueue_scripts', 'MakechTec\AssetsLoader\Loader::enqueueScripts');
        add_action( 'wp_enqueue_styles', 'MakechTec\AssetsLoader\Loader::enqueueStyles' );
    }
    public static function enqueueScripts(){
        $urlScripts = self::getUrlScripts();
        $i = 0;
        foreach( $urlScripts as $url ){
            wp_enqueue_script( 'customScript-' . $i, $url, array(), null, true );
            $i++;
        }
    }
    
    public static function getUrlScripts(){
        return get_option( 'mt_al_stocked_urls_scripts' );
    }
    
    public static function enqueueStyles(){
        $urlStyles = self::getUrlStyles();
        $i = 0;
        foreach( $urlStyles as $url ){
            wp_enqueue_style( 'customStyle-' . $i, $url, array());
        }
    }
    
    public static function getUrlStyles(){
        return get_option( 'mt_al_stocked_urls_styles' );
    }
}