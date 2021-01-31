<?php
namespace MakechTec\AssetsLoader;
use MakechTec\AssetsLoader\Loader;

class AdminConfigs{
    public static function menu(){
        add_options_page( 'Assets Loader', 'Assets Loader', 'manage_options', 'Assets Loader', 'MakechTec\AssetsLoader\AdminConfigs::pageTemplate' );
    }
    public static function pageTemplate(){
        self::addPageSections();
        self::addFieldsSections();
        ?>
            <form action="options.php" method="post" id ="mt_la_form_settings_urls">
                <input type="hidden" name="" value="<?php echo( plugins_url( '/mt-load-assets/assets/js/addInputs.js') ) ?>">
                <?php
                    settings_fields( 'mt_la_options' );
                    do_settings_sections( 'mtLaUrlsSettings' );
                ?>
                <?php
                submit_button( 'Guardar' );
                ?>
            </form>
        <?php
        
    }
    public static function registerSettings(){
        register_setting( 'mt_la_options', 'mt_la_stocked_urls_scripts' );
        register_setting( 'mt_la_options', 'mt_la_stocked_urls_styles' );
    }
    public static function addPageSections(){
        add_settings_section( 'mtLaScriptsSection', 'Urls Scripts To Enqueue', 'MakechTec\AssetsLoader\AdminConfigs::scriptsDescription', 'mtLaUrlsSettings' );
        add_settings_section( 'mtLaStylesSection', 'Urls Styles To Enqueue', 'MakechTec\AssetsLoader\AdminConfigs::stylesDescription', 'mtLaUrlsSettings' );    
    }
    public static function addFieldsSections(){
        add_settings_field( 'mtLaScriptsFields', 'Enter your Urls Scripts Here', 'MakechTec\AssetsLoader\AdminConfigs::printCurrentUrlsScripts', 'mtLaUrlsSettings', 'mtLaScriptsSection' );
        add_settings_field( 'mtLaStylesFields', 'Enter your Urls Styles Here', 'MakechTec\AssetsLoader\AdminConfigs::printCurrentUrlsStyles', 'mtLaUrlsSettings', 'mtLaStylesSection' );
    }
    public static function printCurrentUrlsScripts(){
        $listOptionsScripts = Loader::getUrlScripts();
    
        if( !empty( $listOptionsScripts ) ){
            $i = 0;
            foreach( $listOptionsScripts as $option ){
                ?>
                    <div class="form-control mt_la_input_url_script">
                        <input id="mt_la_script-<?php echo( $i ); ?>" name="mt_la_stocked_urls_scripts[mt_la_script-<?php echo( $i ); ?>]" type="text" class="col-8" value = "<?php echo( $option ); ?>">
                        <div class="col-4">
                            <button class="btn btn-lg btn-danger mt_la_btn_remove_input"><?php echo( __( 'Borrar' ) ); ?></button>
                        </div>
                    </div>
                <?php
                $i++;
            }
        }
        else{
            ?>
                <div class="form-control">
                    <input id="mt_la_script-0" name="mt_la_stocked_urls_scripts[mt_la_script-0]" type="text" class="col-8" value = "">
                    <div class="col-4">
                        <button class="btn btn-lg btn-danger"><?php echo( __( 'Borrar' ) ); ?></button>
                    </div>
                </div>
            <?php
        }
        ?>
            <button class="btn btn-lg btn-info" id="mt_la_add_new_script_button" type="button"> 
                <?php echo( __( 'Agregar nuevo' ) ); ?> 
            </button>
        <?php
    }
    public static function printCurrentUrlsStyles(){
        $listUrlsStyles = Loader::getUrlStyles();
    
        if( !empty( $listUrlsStyles ) ){
            foreach( $listUrlsStyles as $url ){
                ?>
                    <div class="form-control">
                        <input type="text" class="col-8" value = "<?php echo( $url ); ?>">
                        <div class="col-4">
                            <button class="btn btn-lg btn-danger"><?php echo( __( 'Borrar' ) ); ?></button>
                        </div>
                    </div>
                <?php
            }
        }
        else{
            ?>
                <div class="form-control">
                    <input type="text" class="col-8" value = "">
                    <div class="col-4">
                        <button class="btn btn-lg btn-danger"><?php echo( __( 'Borrar' ) ); ?></button>
                    </div>
                </div>
            <?php
        }
        ?>
            <button class="btn btn-lg btn-info" type="button"> 
                <?php echo( __( 'Agregar nuevo' ) ); ?> 
            </button>
        <?php
    }
    public static function scriptsDescription(){
        ?>
            <p>Here you can put the urls that may be enqueued in the right order.</p>
        <?php
    }
    public static function stylesDescription(){
        ?>
            <p>The same but for the styles files</p>
        <?php
    }
}