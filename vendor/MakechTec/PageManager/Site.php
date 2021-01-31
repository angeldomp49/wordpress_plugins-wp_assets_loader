<?php 
namespace MakechTec\PageManager;

class Site{
    
    public static $name          = "MakechTecnology";
    public static $description   = "Tecnology everywhere";
    public static $url           = "makechtecnology.com";
    public static $logo;
    public static $favicon;
    public static $email;
    public static $phone;
    public static $address;
    public static $currentTranslation;
    public static $libLocation = "vendor/";
    
    /**
     * return or show the absolute path to the resource
     * 
     * Get the path resource and if $show is true echo the absolute path with the server name and http or 
     * https protocol, if $show is false then return the result
     * 
     * @param  $path_resource     string         relative path resource
     * @param  $show              boolean        if echo or return the result
     * @return string             the absolute path resource
     *  
     */
    public static function rightUrl($pathToResource = "", $show = true){

        $http_or_https = isset($_SERVER['HTTPS']) ? "https://" : "http://";
        $site_domain = $_SERVER['SERVER_NAME'];

        if( preg_match( "/^\//", $pathToResource) ){
            $pathToResource = substr($pathToResource, 1, strlen( $pathToResource ) );
        }
        else{
            //do nothing
        }

        if($show){
            echo($http_or_https.$site_domain.'/'.$pathToResource);
        }
        else{
            return $http_or_https.$site_domain.'/'.$pathToResource;
        }
    }

    /**
     * gets the base absolute path on hard disk of the project
     * 
     * @return    string        absolute path in hard disk
     */
    public static function getAbsPath(){
        $path    = __DIR__;
        $subDir  = self::$libLocation. __NAMESPACE__;

        if( preg_match( "/\//", $path ) ){
            $subDir = preg_replace( "/\\\\/", "/", $subDir );
        }
        else if ( preg_match( "/\\\\/", $path ) ){
            $subDir  = preg_replace( "/\//", "\\", $subDir );
        }
        $absPath = str_replace( $subDir, "", $path );
        return $absPath;
    }

    /**
     * path (on hard disk) to the request file
     * 
     * @param       string       $pathToResource       resource
     * @param       boolean      $show                 if echo or return
     * @return      string       absolute path on hard disk
     */

    public static function rightPath( $pathToResource = "", $show = true ){

        $path = self::getAbsPath();

        if( preg_match( "/^\//", $pathToResource) || preg_match( "/\\\\/", $pathToResource ) ){
            $pathToResource = substr($pathToResource, 1, strlen( $pathToResource ) );
        }

        if( preg_match( "/\//", $path ) ){
            $pathToResource = preg_replace( "/\\\\/", "/", $pathToResource);
        }
        else if ( preg_match( "/\\\\/", $path ) ){
            $pathToResource  = preg_replace( "/\//", "\\", $pathToResource );
        }

        if($show){
            echo( $path . $pathToResource );
        }
        else{
            return  $path . $pathToResource ;
        }
    }

    public static function toArray(){
        return [
            'siteName'            => self::$name,
            'SiteDescription'     => self::$description,
            'siteUrl'             => self::right_url(),
            'currentTranslation'  => self::$currentTranslation
        ];
    }

    public static function loadData( $data ){
        self::$name         = $data['name'];
        self::$description  = $data['description'];
        self::$url          = $data['url'];
        self::$logo         = $data['logo'];
        self::$favicon      = $data['favicon'];
        self::$email        = $data['email'];
        self::$phone        = $data['phone'];
        self::$address      = $data['address'];
    }

}