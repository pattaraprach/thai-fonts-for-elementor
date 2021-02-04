<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;


if ( ! class_exists( 'Thai_Fonts_For_Elementor' ) ) :

	/**
	 * Main Thai_Fonts_For_Elementor Class.
	 *
	 * @package		THAIFONT4E
	 * @subpackage	Classes/Thai_Fonts_For_Elementor
	 * @since		1.0.0
	 * @author		Pattara Prach-umpai
	 */
	final class Thai_Fonts_For_Elementor {

		/**
		 * The real instance
		 *
		 * @access	private
		 * @since	1.0.0
		 * @var		object|Thai_Fonts_For_Elementor
		 */
		private static $instance;

		/**
		 * THAIFONT4E settings object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Thai_Fonts_For_Elementor_Settings
		 */
		public $settings;

		/**
		 * Throw error on object clone.
		 *
		 * Cloning instances of the class is forbidden.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to clone this class.', 'thai-fonts-for-elementor' ), '1.0.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to unserialize this class.', 'thai-fonts-for-elementor' ), '1.0.0' );
		}

		/**
		 * Main Thai_Fonts_For_Elementor Instance.
		 *
		 * Insures that only one instance of Thai_Fonts_For_Elementor exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @access		public
		 * @since		1.0.0
		 * @static
		 * @return		object|Thai_Fonts_For_Elementor	The one true Thai_Fonts_For_Elementor
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Thai_Fonts_For_Elementor ) ) {
				self::$instance					= new Thai_Fonts_For_Elementor;
				self::$instance->base_hooks();
				self::$instance->includes();
				self::$instance->settings		= new Thai_Fonts_For_Elementor_Settings();

				//Fire the plugin logic
				new Thai_Fonts_For_Elementor_Run();

				/**
				 * Fire a custom action to allow dependencies
				 * after the successful plugin setup
				 */
				do_action( 'THAIFONT4E/plugin_loaded' );
			}

			return self::$instance;
		}

		/**
		 * Include required files.
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function includes() {
			require_once THAIFONT4E_PLUGIN_DIR . 'core/includes/classes/class-thai-fonts-for-elementor-settings.php';		
			require_once THAIFONT4E_PLUGIN_DIR . 'core/includes/classes/class-thai-fonts-for-elementor-run.php';
		}

		/**
		 * Add base hooks for the core functionality
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function base_hooks() {
			add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
		}

		/**
		 * Loads the plugin language files.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( 'thai-fonts-for-elementor', "", dirname( plugin_basename( THAIFONT4E_PLUGIN_FILE ) ) . '/languages/' );
		}

	}

endif; // End if class_exists check.