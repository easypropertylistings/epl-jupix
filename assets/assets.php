<?php
/**
 * Scripts & Styles
 *
 * @package     EPL_JPI
 * @subpackage  Scripts/Styles
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Load and enqueue admin scripts and stylesheets
 */
function epl_jpi_admin_enqueue_scripts($screen) {
	wp_enqueue_style( 'epl-jpi-admin-style', EPL_JPI_PLUGIN_URL_CSS . 'jpi-admin.css' );
}
add_action( 'admin_enqueue_scripts', 'epl_jpi_admin_enqueue_scripts' );

/**
 * Load and enqueue front end scripts and stylesheets
 */
function epl_jpi_wp_enqueue_scripts() {
	wp_enqueue_style( 'epl-jpi-front-style', EPL_JPI_PLUGIN_URL_CSS . 'jpi-front.css' );
}
add_action( 'wp_enqueue_scripts', 'epl_jpi_wp_enqueue_scripts' );
