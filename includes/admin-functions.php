<?php
/**
 * JUPIX Functions and Setup EPL for JUPIX format
 *
 * @package     EPL_JUPIX
 * @subpackage  Admin Functions
 * @copyright   Copyright (c) 2014, Merv Barrett
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}





/**
 * Sold STC Pricing Admin Bar Graph
 *
 * @return If the listing meta property_sold_stc is yes, return the label.
 * @pending need a filter in the epl_manage_listing_column_price_callback function to apply this status and bar
 */
function epl_jupix_admin_bar_sold_stc() {

	$array = array(
		'1' => 'On Hold',
		'2' => 'For Sale',
		'3' => 'Under Offer',
		'4' => 'Sold STC',
		'5' => 'Sold',
		'7' => 'Withdrawn',
	);

	global $property, $epl_settings;

	$price           = $property->get_property_meta( 'property_price' );
	$property_status = ucfirst( $property->get_property_meta( 'property_status' ) );
	$sold_stc        = $property->get_property_meta( 'property_sold_stc' );
	$sold_price      = $property->get_property_meta( 'property_sold_price' );

	if ( $property_status != 'Current' ) {
		return;
	}

	if ( $sold_stc != 'yes' ) {
		return;
	}

	$max_price = '2000000';
	if ( isset( $epl_settings['epl_max_graph_sales_price'] ) ) {
		$max_price = (int) $epl_settings['epl_max_graph_sales_price'];
	}

	$class = '';

	if ( ! empty( $sold_stc ) && 'yes' == $sold_stc ) {
		$class = 'bar-under-offer';
	}

	if ( ! empty( $sold_price ) ) {
		$barwidth = $max_price == 0 ? 0 : $sold_price / $max_price * 100;
	} else {
		$barwidth = $max_price == 0 ? 0 : $price / $max_price * 100;
	}
	echo '<div class="epl-price-bar ' . $class . '">
			<span style="width:' . $barwidth . '%"></span>
		</div>';

}
// add_action( 'epl_manage_listing_column_price' , 'epl_jupix_admin_bar_sold_stc' );

