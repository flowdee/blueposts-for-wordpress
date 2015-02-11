<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.flowdee.de
 * @since             1.0.0
 * @package           Blueposts
 *
 * @wordpress-plugin
 * Plugin Name:       Blueposts for WordPress
 * Plugin URI:        http://coder.flowdee.de/blueposts-for-wordpress/
 * Description:       Simple and stylish way to quote and highlight Blizzard posts on your website.
 * Version:           1.0.0
 * Author:            flowdee
 * Author URI:        http://www.flowdee.de/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       blueposts
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-blueposts-activator.php';

/**
 * The code that runs during plugin deactivation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-blueposts-deactivator.php';

/** This action is documented in includes/class-blueposts-activator.php */
register_activation_hook( __FILE__, array( 'Blueposts_Activator', 'activate' ) );

/** This action is documented in includes/class-blueposts-deactivator.php */
register_deactivation_hook( __FILE__, array( 'Blueposts_Deactivator', 'deactivate' ) );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-blueposts.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_Blueposts() {

	$plugin = new Blueposts();
	$plugin->run();

}
run_Blueposts();
