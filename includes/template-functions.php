<?php
/**
 * JUPIX Functions and Setup EPL for JUPIX format
 *
 * @package     EPL_JUPIX
 * @subpackage  Processing Functions
 * @copyright   Copyright (c) 2014, Merv Barrett
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;




/**
 * Sold STC Pricing Sticker
 *
 * @return		If the listing meta property_sold_stc is yes, return the label.
 *
 */
function epl_jupix_sold_stc_sticker( $price_sticker ) {

	global $property;

	if ( 'yes' == $property->get_property_meta('property_sold_stc') && 'sold' != $property->get_property_meta('property_status') ) {
		$price_sticker = '';
		$label = 'Sold STC';
		$price_sticker .= '<span class="status-sticker under-offer sold-stc">'.$label.'</span>';
	}

	return $price_sticker;
}
add_filter( 'epl_get_price_sticker' , 'epl_jupix_sold_stc_sticker' );


