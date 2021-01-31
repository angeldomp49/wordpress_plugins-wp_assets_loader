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
            <form action="options.php" method="post" id ="mt_al_form_settings_urls">
                <input type="hidden" name="" value="<?php echo( plugins_url( '/mt-load-assets/assets/js/addInputs.js') ) ?>">
                <?php
                    settings_fields( 'mt_al_options' );
                    do_settings_sections( 'mtAlUrlsSettings' );
                ?>
                <?php
                submit_button( 'Guardar' );
                ?>
            </form>
        <?php
        
    }
    public static function registerSettings(){
        register_setting( 'mt_al_options', 'mt_al_stocked_urls_scripts' );
        register_setting( 'mt_al_options', 'mt_al_stocked_urls_styles' );
    }
    public static function addPageSections(){
        add_settings_section( 'mtAlScriptsSection', 'Urls Scripts To Enqueue', 'MakechTec\AssetsLoader\AdminConfigs::scriptsDescription', 'mtAlUrlsSettings' );
        add_settings_section( 'mtAlStylesSection', 'Urls Styles To Enqueue', 'MakechTec\AssetsLoader\AdminConfigs::stylesDescription', 'mtAlUrlsSettings' );    
    }
    public static function addFieldsSections(){
        add_settings_field( 'mtAlScriptsFields', 'Enter your Urls Scripts Here', 'MakechTec\AssetsLoader\AdminConfigs::printCurrentUrlsScripts', 'mtAlUrlsSettings', 'mtAlScriptsSection' );
        add_settings_field( 'mtAlStylesFields', 'Enter your Urls Styles Here', 'MakechTec\AssetsLoader\AdminConfigs::printCurrentUrlsStyles', 'mtAlUrlsSettings', 'mtAlStylesSection' );
    }
    public static function printCurrentUrlsScripts(){
        $listOptionsScripts = Loader::getUrlScripts();
    
        if( !empty( $listOptionsScripts ) ){
            $i = 0;
            foreach( $listOptionsScripts as $option ){
                ?>
                    <div class="form-control mt_al_input_url_script">
                        <input id="mt_al_script-<?php echo( $i ); ?>" name="mt_al_stocked_urls_scripts[mt_al_script-<?php echo( $i ); ?>]" type="text" class="col-8" value = "<?php echo( $option ); ?>">
                        <div class="col-4">
                            <button class="btn btn-lg btn-danger mt_al_btn_remove_input"><?php echo( __( 'Borrar' ) ); ?></button>
                        </div>
                    </div>
                <?php
                $i++;
            }
        }
        else{
            ?>
                <div class="form-control">
                    <input id="mt_al_script-0" name="mt_al_stocked_urls_scripts[mt_al_script-0]" type="text" class="col-8" value = "">
                    <div class="col-4">
                        <button class="btn btn-lg btn-danger"><?php echo( __( 'Borrar' ) ); ?></button>
                    </div>
                </div>
            <?php
        }
        ?>
            <button class="btn btn-lg btn-info" id="mt_al_add_new_script_button" type="button"> 
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