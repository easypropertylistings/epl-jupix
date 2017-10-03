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
		$label = __( 'Sold STC' , 'epl-jupix' );
		$price_sticker .= '<span class="status-sticker under-offer sold-stc">'.$label.'</span>';
	}

	return $price_sticker;
}
add_filter( 'epl_get_price_sticker' , 'epl_jupix_sold_stc_sticker' );


/**
 * Property Kitchens
 *
 * Add kitchens to additional features list
 *
 */
 function epl_jupix_additional_feature_kitchens( $array ) {

	$array[] = 'property_kitchens'; //whatever your new field name is
	return $array;
}
add_filter( 'epl_property_additional_features_list' , 'epl_jupix_additional_feature_kitchens' );

/**
 * Property Reception Rooms
 *
 * Add Reception Rooms to additional features list
 *
 */
 function epl_jupix_additional_feature_reception_rooms( $array ) {

	$array[] = 'property_reception_rooms'; //whatever your new field name is
	return $array;
}
add_filter( 'epl_property_additional_features_list' , 'epl_jupix_additional_feature_reception_rooms' );


/**
 * Disable Features Taxonomy Link
 *
 */
function epl_jupix_disable_feature_links() {
	return false;
}
add_filter( 'epl_features_taxonomy_link_filter' , 'epl_jupix_disable_feature_links' );



/**
 * Rename Tour button to Brochure
 *
 */
function epl_jupix_rename_tour() {
	return __( 'Brochure' , 'epl-jupix' );
}
add_filter( 'epl_button_label_tour' , 'epl_jupix_rename_tour' );
add_filter( 'epl_button_label_property_external_link_1' , 'epl_jupix_rename_tour' );

/**
 * Rename Tour button to Brochure
 *
 */
function epl_jupix_rename_tour_second() {
	return __( 'Virtual Tour' , 'epl-jupix' );
}
add_filter( 'epl_button_label_property_external_link_2' , 'epl_jupix_rename_tour_second' );



/**
 * Rental Availability Price Prefix
 *
 */
function epl_jupix_property_rental_availability_price_prefix( $price ) {

	global $property;

	if ( function_exists( 'is_epl_rental_post' ) ) {

		if ( ! is_epl_rental_post() ) {
			return $price;
		}

		$availability = $property->get_property_meta('property_rental_availability');

		if ( $availability == '5' || $availability == '1' ) {
			return $price;
		}


		$availability_options = array(
			'1'	=>	__( 'On Hold' , 		'epl-jupix' ),
			'2'	=>	__( 'To Let' , 			'epl-jupix' ),
			'3'	=>	__( 'References Pending' , 	'epl-jupix' ),
			'4'	=>	__( 'Let Agreed' , 		'epl-jupix' ),
			'5'	=>	__( 'Let' , 			'epl-jupix' ),
			'6'	=>	__( 'Withdrawn' , 		'epl-jupix' ),
		);

		$avail_text = $availability_options[$availability];

	}


	return '<span class="epl-jupix-rental-availability">' . $avail_text . '</span> ' . $price;
}
add_filter('epl_get_price', 'epl_jupix_property_rental_availability_price_prefix' );

