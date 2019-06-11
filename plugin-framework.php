<?php
/*
Plugin Name: Basic Plugin Framework
Plugin URI: 
Description: Base for plugin dev
Author: Martin Miller
Version: 1.0
Author URI: 
*/

/*
 * TODO:
 *
 *
*/

define( 'PLUGIN_PATH', plugin_dir_url( __FILE__ ) );
//require_once( dirname( __FILE__ ) . '/includes/settings.php' );
add_action( 'plugins_loaded', array( Plugin::get_instance(), 'get_instance' ) );
	
class Plugin {
	
	private static $instance;
	private $settings;
	
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	public function __construct() {
		register_activation_hook( __FILE__, array( $this, 'plugin_on_activate' ) );
		
		register_deactivation_hook( __FILE__, array( $this, 'plugin_on_deactivate' ) );
		
		add_action( 'init', array( $this, 'init_function' ) );
			
		add_action( 'admin_init', array( $this, 'admin_init' ) );
		
		//$this->settings = new plugin_options();
		// class for settings page.	
		
	} // __construct
	
	
	/*
	 * runs on plugin init (for custom post type setup, etc.)
	 *
	 *
	*/
	public function init_function() {
		
	}
	
	/*
	 * runs on plugin activation (db setup, etc)
	 *
	 *
	*/
	private static function plugin_on_activate() {
		
	}
	
	/*
	 * runs on plugin deactivation
	 *
	 *
	*/
	private static function plugin_on_deactivate() {
		
	}
	
	/*
	 * Runs on admin init - for scripts/styles in admin area
	 *
	 *
	*/	
	public function admin_init() {			
		//add_action( 'admin_print_scripts-post-new.php', array( $this, 'plugin_admin_enqueue' ), 11 );
		//add_action( 'admin_print_scripts-post.php', array( $this, 'plugin_admin_enqueue' ), 11 );
	} //  public function admin_init()
	
	public function plugin_admin_enqueue( $hook ) {
		//wp_enqueue_script( 'js_script' );
		//wp_enqueue_script( 'script_name', PLUGIN_PATH. '/includes/js/js_file.js' );
	} // news_admin_enqueue


} // end class