<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://znacite.com
 * @since             1.0.0
 * @package           Bulgarian_Horoscope
 *
 * @wordpress-plugin
 * Plugin Name:       Bulgarian Horoscope
 * Plugin URI:        https://bg.wordpress.org/plugins/bulgarian-horoscope/
 * Description:       Хороскопи на български език. След активация сложете джаджата където искате да се покаже хороскопа.
 * Version:           2.0.0
 * Author:            znacite
 * Author URI:        https://znacite.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bulgarian-horoscope
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bulgarian-horoscope-activator.php
 */
function activate_bulgarian_horoscope() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bulgarian-horoscope-activator.php';
	Bulgarian_Horoscope_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bulgarian-horoscope-deactivator.php
 */
function deactivate_bulgarian_horoscope() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bulgarian-horoscope-deactivator.php';
	Bulgarian_Horoscope_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bulgarian_horoscope' );
register_deactivation_hook( __FILE__, 'deactivate_bulgarian_horoscope' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bulgarian-horoscope.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bulgarian_horoscope() {

	$plugin = new Bulgarian_Horoscope();
	$plugin->run();

}
run_bulgarian_horoscope();
