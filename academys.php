<?php 
/*
 * Plugin Name:       Academys
 * Plugin URI:       
 * Description:       This is a basic Academy plugin
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Faruq Ahmed
 * Author URI:        
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       academy
 * Domain Path:       /languages
 */


 if( !defined('ABSPATH') ) return;

 include_once __DIR__.'/vendor/autoload.php';

/**
 * Plugin main class
 */
 final class Academys {

   /**
    *  Plugin Versoin
    */

    const version = '1.0.0';

    /**
     * Constructor class
     */
    private function __contruct() {
      $this->defined_path();

      register_activation_hook( __FILE__, [$this,'academy_activation'] );
      add_action( 'plugin_loaded',[$this,'init_plugin'] );

    }

    /**
     * inisialize single instaant
     */


     public static function instance (){
        $instance = false;
        if( !$instance ){
            $instance = new self();
        }
        return $instance;
     }

     /**
      * Defined path class 
      */
      public function defined_path() {
         define( 'ACADEMY_VERSION', self::version );
         define( 'ACADEMY_FILE', __FILE__);
         define( 'ACADEMY_PATH',__DIR__ );
         define( 'ACADEMY_URL',plugins_url( '', 'ACADEMY_PATH' ) );
         define( 'ACADEMY_ASSETS', ACADEMY_URL. '/assets' );

      }


      /**
       *  Activation class of plugin 
       */
      public function academy_activation(){
         $installed = get_options('academys_installed');
         if( !$installed ) {
            updated_option('academys_installed',time());
         }
         update_option( 'academys_version','ACADEMY_VERSION' );
      }


      /**
       * Initialize plugin file
       */
      public function init_plugin() {

      }


 }


 /**
  * Main plugin class
  */

 function academy() {
    return Academys :: instance();
 }

 /**
  * kick off the plugin
  */
    academy();