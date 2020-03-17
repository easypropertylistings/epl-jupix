<?php
/**
 * Plugin Name: Easy Property Listings - Jupix Integration
 * Plugin URL: https://easypropertylistings.com.au/extension/jupix
 * Description: Alter Easy Property Listings for the Jupix format.
 * Author: Merv Barrett
 * Author URI: http://www.realestateconnected.com.au/
 * Version: 2.0.90
 * Text Domain: epl-jupix
 * Domain Path: languages
 *
 * You should have received a copy of the GNU General Public License
 * along with Easy Property Listings. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package EPL-JUPIX
 * @author Merv Barrett
 */


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'EPL_Jupix' ) ) :
	/*
	 * Main EPL_Jupix Class
	 *
	 * @since 1.0
	 */
	final class EPL_Jupix {

		/*
		 * @var EPL_Jupix The one true EPL_Jupix
		 * @since 1.0
		 */
		private static $instance;

		/*
		 * Main EPL_Jupix Instance
		 *
		 * Insures that only one instance of EPL_Jupix exists in memory at any one time.
		 * Also prevents needing to define globals all over the place.
		 *
		 * @since 1.0
		 * @static
		 * @staticvar array $instance
		 * @uses EPL_Jupix::includes() Include the required files
		 * @see EPL_JPI()
		 * @return The one true EPL_Jupix
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof EPL_Jupix ) ) {
				self::$instance = new EPL_Jupix;
				self::$instance->hooks();
				if ( defined('EPL_RUNNING') ) {
					self::$instance->setup_constants();
					self::$instance->includes();
				}
			}
			return self::$instance;
		}

		/**
		 * Setup the default hooks and actions
		 *
		 * @since 1.0
		 *
		 * @return void
		 */
		private function hooks() {
			// activation
			add_action( 'admin_init', array( $this, 'activation' ) );
		}

		/**
		 * Activation function fires when the plugin is activated.
		 * @since 1.0
		 * @access public
		 *
		 * @return void
		 */
		public function activation() {
			if ( ! class_exists( 'Easy_Property_Listings' ) ) {
				// Is this plugin active?
				if ( is_plugin_active( plugin_basename( __FILE__ ) ) ) {
			 		// Unset activation notice.
			 		unset( $_GET[ 'activate' ] );
			 		// Display notice.
			 		add_action( 'admin_notices', array( $this, 'admin_notices' ) );
				}
			}
		}

		/**
		 * Admin notices
		 *
		 * @since 1.0
		*/
		public function admin_notices() {

			if ( ! is_plugin_active('easy-property-listings/easy-property-listings.php') ) {
				echo '<div class="error"><p>';
				_e( 'Please activate <b>Easy Property Listings</b> to enable all functions of Easy Property Listings - Stamp Duty Calculator', 'epl' );
				echo '</p></div>';
			}
		}

		/*
		 * Setup plugin constants
		 *
		 * @access private
		 * @since 1.0
		 * @return void
		 */
		private function setup_constants() {
			// API URL
			if ( ! defined( 'EPL_TEMPLATES' ) ) {
				define( 'EPL_TEMPLATES', 'https://easypropertylistings.com.au' );
			}

			// Extension name on API server
			if ( ! defined( 'EPL_JPI_PRODUCT_NAME' ) ) {
				define( 'EPL_JPI_PRODUCT_NAME', 'Jupix Integration' );
			}

			// Plugin File
			if ( ! defined( 'EPL_JPI_PLUGIN_FILE' ) ) {
				define( 'EPL_JPI_PLUGIN_FILE', __FILE__ );
			}

			// Plugin Folder URL
			if ( ! defined( 'EPL_JPI_PLUGIN_URL' ) ) {
				define( 'EPL_JPI_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
			}

			// Plugin Folder Path
			if ( ! defined( 'EPL_JPI_PLUGIN_PATH' ) ) {
				define( 'EPL_JPI_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
			}

			// Plugin Sub-Directory Paths
			if ( ! defined( 'EPL_JPI_PLUGIN_PATH_INCLUDES' ) ) {
				define( 'EPL_JPI_PLUGIN_PATH_INCLUDES', EPL_JPI_PLUGIN_PATH . 'includes/' );
			}


		}
		/*
		 * Include required files
		 *
		 * @access private
		 * @since 1.0
		 * @return void
		 */
		private function includes() {

			include_once( EPL_JPI_PLUGIN_PATH_INCLUDES . 'import-processing-functions.php' );



			if ( is_admin() ) {
				$epljpi_license = new EPL_License( __FILE__, EPL_JPI_PRODUCT_NAME, '2.0.0', 'Merv Barrett' );

				include_once( EPL_JPI_PLUGIN_PATH_INCLUDES . 'admin-functions.php' );
			} else {
				include_once( EPL_JPI_PLUGIN_PATH_INCLUDES . 'template-functions.php' );

			}
			include_once( EPL_JPI_PLUGIN_PATH_INCLUDES . 'hooks.php' );
			include_once( EPL_JPI_PLUGIN_PATH_INCLUDES . 'meta-boxes.php' );
			include_once( EPL_JPI_PLUGIN_PATH_INCLUDES . 'functions.php' );

		}

	}
endif; // End if class_exists check

/*
 * The main function responsible for returning the one true EPL_Jupix
 * Instance to functions everywhere.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * Example: <?php $epl = EPL_JPI(); ?>
 *
 * @since 1.0
 * @return object The one true EPL_Jupix Instance
 */
function EPL_JPI() {
	return EPL_Jupix::instance();
}
// Get EPL_JPI Running
EPL_JPI();
