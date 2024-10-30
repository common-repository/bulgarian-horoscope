<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://znacite.com
 * @since      1.0.0
 *
 * @package    Bulgarian_Horoscope
 * @subpackage Bulgarian_Horoscope/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Bulgarian_Horoscope
 * @subpackage Bulgarian_Horoscope/includes
 * @author     znacite <veronika@znacite.com>
 */
class Bulgarian_Horoscope_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'bulgarian-horoscope',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
