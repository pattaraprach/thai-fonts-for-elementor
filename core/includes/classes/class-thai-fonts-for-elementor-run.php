<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Class Thai_Fonts_For_Elementor_Run
 *
 * Thats where we bring the plugin to life
 *
 * @package		THAIFONT4E
 * @subpackage	Classes/Thai_Fonts_For_Elementor_Run
 * @author		Pattara Prach-umpai
 * @since		1.0.0
 */
class Thai_Fonts_For_Elementor_Run{

	/**
	 * Our Thai_Fonts_For_Elementor_Run constructor 
	 * to run the plugin logic.
	 *
	 * @since 1.0.0
	 */
	function __construct(){
		$this->add_hooks();
	}

	/**
	 * ######################
	 * ###
	 * #### WORDPRESS HOOKS
	 * ###
	 * ######################
	 */

	/**
	 * Registers all WordPress and plugin related hooks
	 *
	 * @access	private
	 * @since	1.0.0
	 * @return	void
	 */
	private function add_hooks(){
	
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_backend_scripts_and_styles' ), 20 );
		add_action( 'admin_menu', array( $this, 'add_custom_admin_menu'));
		add_action( 'admin_init', array( $this, 'register_tfe_fonts_settings' ));
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_selected_thai_fonts'));

		add_filter( 'elementor/fonts/groups', array( $this, 'elementor_add_font_group' ));
		add_filter( 'elementor/fonts/additional_fonts', array( $this, 'elementor_add_fonts' ));
	}

	/**
	 * ######################
	 * ###
	 * #### WORDPRESS HOOK CALLBACKS
	 * ###
	 * ######################
	 */

	/**
	 * Enqueue the backend related scripts and styles for this plugin.
	 * All of the added scripts andstyles will be available on every page within the backend.
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @return	void
	 */
	public function enqueue_backend_scripts_and_styles() {
		wp_enqueue_style( 'thaifont4e-backend-styles', THAIFONT4E_PLUGIN_URL . 'core/includes/assets/css/tfe-styles.css', array(), THAIFONT4E_VERSION, 'all' );
		wp_enqueue_script( 'thaifont4e-backend-scripts', THAIFONT4E_PLUGIN_URL . 'core/includes/assets/js/backend-scripts.js', array(), THAIFONT4E_VERSION, false );
		wp_localize_script( 'thaifont4e-backend-scripts', 'thaifont4e', array(
			'plugin_name'   => __( THAIFONT4E_NAME, 'thai-fonts-for-elementor' ),
		));
	}

	/**
	 * Add Admin Menu and Page
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @return	void
	 */
	public function add_custom_admin_menu() {
		add_menu_page( 'Thai Fonts for Elementor', 'Thai Fonts', 'manage_options', 'thai-font-for-elementor-settings.php', array( $this, 'tfe_custom_admin_page'), 'dashicons-editor-paste-text', 99 );
	}

	public function tfe_custom_admin_page() {
		require_once THAIFONT4E_PLUGIN_DIR . 'core/views/tfe-admin-page.php';;
	}

	/**
	 * Register Elementor Fonts Settings
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @return	void
	 */
	
	 public function register_tfe_fonts_settings() {
		register_setting( 'tfe_settings', 'tfe-fonts' );
	 }

	/**
	 * Enqueue selected Thai Font
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @return	void
	 */

	public function enqueue_selected_thai_fonts() {
		
		$fontClass = new Addtional_Thai_Fonts();
		$fonts = $fontClass->get_fonts();
		$user_fonts = get_option('tfe-fonts');

		if(isset($user_fonts)){

			foreach ($fonts as $slug => $name){

			  if(in_array($slug, $user_fonts)){

		
				wp_enqueue_style( $slug , THAIFONT4E_PLUGIN_URL . 'core/includes/assets/fonts/'. $slug .'/font.css', array(), THAIFONT4E_VERSION, 'all' );

			  }

			}
		
		  }
	}

	/**
	 * Add Thai Fonts as Elementor Font Group
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @return	void
	 */

	public function elementor_add_font_group( $groups ) {

		$groups[ 'tfe' ] = __( 'Thai Fonts', 'elementor-tfe-fonts' );
	
		return $groups;
	}

	/**
	 * Add Thai Fonts to Elementor Additional Fonts
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @return	void
	 */
	
	public function elementor_add_fonts( $elementor_fonts ) {
	
		$fontClass = new Addtional_Thai_Fonts();
		$fonts = $fontClass->get_fonts();
		$user_fonts = get_option('tfe-fonts');
	
		if ( ! $user_fonts ) {
			return $elementor_fonts;
		}
		
		foreach ($fonts as $slug => $name){
	
			if(in_array($slug, $user_fonts)){
	
	  
				$elementor_fonts[ $name ] = 'tfe';
	
			}
	
		  }
	
		return $elementor_fonts;
	}


}


