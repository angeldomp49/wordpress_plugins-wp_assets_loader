<?php
namespace MakechTec\AssetsLoader;

class Dependencies{
    public static function loadScripts(){
        wp_enqueue_script( 'addInputs', plugins_url( '/mt-load-assets/assets/js/addInputs.js'), array(), null, true );
    }
}