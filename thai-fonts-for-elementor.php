<?php
/**
 * Thai Fonts for Elementor
 *
 * @package       THAIFONT4E
 * @author        CoombCo
 * @license       gplv2
 * @version       1.0.1
 *
 * @wordpress-plugin
 * Plugin Name:   Thai Fonts for Elementor
 * Plugin URI:    https://coomb.co/thai-font-for-elementor
 * Description:   A simple plugin that dynamically enqueue selected Thai language fonts, and make them available in the Elementor\'s Editor
 * Version:       1.0.1
 * Author:        CoombCo
 * Author URI:    https://coomb.co
 * Text Domain:   thai-fonts-for-elementor
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with Thai Fonts for Elementor. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;


// Plugin name
define( 'THAIFONT4E_NAME',			'Thai Fonts for Elementor' );

// Plugin version
define( 'THAIFONT4E_VERSION',		'1.0.0' );

// Plugin Root File
define( 'THAIFONT4E_PLUGIN_FILE',	__FILE__ );

// Plugin base
define( 'THAIFONT4E_PLUGIN_BASE',	plugin_basename( THAIFONT4E_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'THAIFONT4E_PLUGIN_DIR',	plugin_dir_path( THAIFONT4E_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'THAIFONT4E_PLUGIN_URL',	plugin_dir_url( THAIFONT4E_PLUGIN_FILE ) );

/**
 * Load the main class for the core functionality
 */
require_once THAIFONT4E_PLUGIN_DIR . 'core/class-thai-fonts-for-elementor.php';

/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  Pattara Prach-umpai
 * @since   1.0.0
 * @return  object|Thai_Fonts_For_Elementor
 */
function THAIFONT4E() {
	return Thai_Fonts_For_Elementor::instance();
}

THAIFONT4E();
