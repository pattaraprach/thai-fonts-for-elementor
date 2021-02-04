<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;



/**
 * Class Thai_Fonts_For_Elementor_Settings
 *
 * This class contains all of the plugin settings.
 * Here you can configure the whole plugin data.
 *
 * @package		THAIFONT4E
 * @subpackage	Classes/Thai_Fonts_For_Elementor_Settings
 * @author		Pattara Prach-umpai
 * @since		1.0.0
 */
class Thai_Fonts_For_Elementor_Settings{

	/**
	 * The plugin name
	 *
	 * @var		string
	 * @since   1.0.0
	 */
	private $plugin_name;

	/**
	 * Our Thai_Fonts_For_Elementor_Settings constructor 
	 * to run the plugin logic.
	 *
	 * @since 1.0.0
	 */
	function __construct(){

		$this->plugin_name = THAIFONT4E_NAME;
	}

	/**
	 * ######################
	 * ###
	 * #### CALLABLE FUNCTIONS
	 * ###
	 * ######################
	 */

	/**
	 * Return the plugin name
	 *
	 * @access	public
	 * @since	1.0.0
	 * @return	string The plugin name
	 */
	public function get_plugin_name(){
		return apply_filters( 'THAIFONT4E/settings/get_plugin_name', $this->plugin_name );
	}
}

/**
 * Class Additional Thai Fonts
 * This class contains all additional Fonts added
 *
 */

class Addtional_Thai_Fonts {

	protected $fonts =[

		'noto-sans-thai' => 'Noto-Sans-Thai',
		'noto-serif-thai' => 'Noto-Serif-Thai',
		'moonjelly' => 'Moonjelly',
		'anakotmai' => 'Anakotmai',
		'anuphan' => 'Anuphan',
		'boon' => 'Boon',
		'cloud' => 'Cloud',
		'cs-prajad' => 'CS PraJad',
		'cs-chatthai-ui' => 'CS ChatThaiUI',
		'ibm-plex-thai' => 'IBM-Plex-Thai',
		'silpakorn' => 'Silpakorn',
		'rsu' => 'RSU'
	];


	public function get_fonts(){
		return $this->fonts;
	}


}