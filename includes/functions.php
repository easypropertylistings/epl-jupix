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
 * Sold STC Pricing Plain Value Filter
 *
 * @return		If the listing meta property_sold_stc is yes, return the label.
 *
 */
function epl_jupix_sold_stc_price_plain_value( $price_plain_value ) {

	$array = array(
		'1' => 'On Hold',
		'2' => 'For Sale',
		'3' => 'Under Offer',
		'4' => 'Sold STC',
		'5' => 'Sold',
		'7' => 'Withdrawn'
	);

	global $property;

	if ( 'yes' == $property->get_property_meta('property_sold_stc') && 'sold' != $property->get_property_meta('property_status') ) {
		$price_plain_value = 'Sold STC';
	}
	return $price_plain_value;

}
add_filter( 'epl_get_price_plain_value' , 'epl_jupix_sold_stc_price_plain_value' );

/**
 * Sold STC Pricing Plain Value Filter
 *
 * @return		If the listing meta property_sold_stc is yes, return the label.
 *
 */
function epl_jupix_sold_stc_price( $price ) {

	$array = array(
		'1' => 'On Hold',
		'2' => 'For Sale',
		'3' => 'Under Offer',
		'4' => 'Sold STC',
		'5' => 'Sold',
		'7' => 'Withdrawn'
	);

	global $property;

	if ( 'yes' == $property->get_property_meta('property_sold_stc') && 'sold' != $property->get_property_meta('property_status') ) {
		$label = 'Sold STC';
		$price = '<div class="page-price under-offer-status sold-stc-status">'. $label .'</div>';
	}
	return $price;

}
add_filter( 'epl_get_price' , 'epl_jupix_sold_stc_price' );

/**
 * Jupix propertyType
 *
 * House Category Filter
 *
 * @import	{propertyStyle[1]}-{propertyType[1]}
 * @package     EPL_JUPIX
 * @node	propertyType
 * @post_type	property, rental
 * @epl_meta	property_category
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_property_type_filter() {

	$sep = '- ';

	$defaults = array(
		'1'	=>	__( 'Houses' , 				'epl-jupix' ),

		'1-1'	=>	$sep . __( 'Barn Conversion' , 		'epl-jupix' ),
		'2-1'	=>	$sep . __( 'Cottage' ,			'epl-jupix' ),
		'3-1'	=>	$sep . __( 'Chalet' , 			'epl-jupix' ),
		'4-1'	=>	$sep . __( 'Detached House' , 		'epl-jupix' ),
		'5-1'	=>	$sep . __( 'Semi-Detached House' , 	'epl-jupix' ),
		'28-1'	=>	$sep . __( 'Link Detached' , 		'epl-jupix' ),
		'6-1'	=>	$sep . __( 'Farm House' , 		'epl-jupix' ),
		'7-1'	=>	$sep . __( 'Manor House' , 		'epl-jupix' ),
		'8-1'	=>	$sep . __( 'Mews' , 			'epl-jupix' ),
		'9-1'	=>	$sep . __( 'Mid Terraced House' , 	'epl-jupix' ),
		'10-1'	=>	$sep . __( 'End Terraced House' , 	'epl-jupix' ),
		'11-1'	=>	$sep . __( 'Town House' , 		'epl-jupix' ),
		'12-1'	=>	$sep . __( 'Villa' , 			'epl-jupix' ),
		'29-1'	=>	$sep . __( 'Shared House' , 		'epl-jupix' ),
		'31-1'	=>	$sep . __( 'Sheltered Housing' , 	'epl-jupix' ),


		'2'	=>	__( 'Flats / Apartments' , 		'epl-jupix' ),

		'13-2'	=>	$sep . __( 'Apartment' , 		'epl-jupix' ),
		'14-2'	=>	$sep . __( 'Bedsit' , 			'epl-jupix' ),
		'15-2'	=>	$sep . __( 'Ground Floor Flat' , 	'epl-jupix' ),
		'16-2'	=>	$sep . __( 'Flat' , 			'epl-jupix' ),
		'17-2'	=>	$sep . __( 'Ground Floor Maisonette' , 	'epl-jupix' ),
		'18-2'	=>	$sep . __( 'Maisonette' , 		'epl-jupix' ),
		'19-2'	=>	$sep . __( 'Penthouse' , 		'epl-jupix' ),
		'20-2'	=>	$sep . __( 'Studio' , 			'epl-jupix' ),
		'30-2'	=>	$sep . __( 'Shared Flat' , 		'epl-jupix' ),


		'3'	=>	__( 'Bungalows' , 			'epl-jupix' ),
		'21-3'	=>	$sep . __( 'Detached Bungalow' , 	'epl-jupix' ),
		'35-3'	=>	$sep . __( 'End Terraced Bungalow' , 	'epl-jupix' ),
		'34-3'	=>	$sep . __( 'Mid Terraced Bungalow' , 	'epl-jupix' ),
		'22-3'	=>	$sep . __( 'Semi-Detached Bungalow' , 	'epl-jupix' ),

		'4'	=>	__( 'Other' , 				'epl-jupix' ),
		'23-4'	=>	$sep . __( 'Building Plot / Land' , 	'epl-jupix' ),
		'24-4'	=>	$sep . __( 'Garage' , 			'epl-jupix' ),
		'25-4'	=>	$sep . __( 'House Boat' , 		'epl-jupix' ),
		'26-4'	=>	$sep . __( 'Mobile Home' , 		'epl-jupix' ),
		'27-4'	=>	$sep . __( 'Parking' , 			'epl-jupix' ),
		'32-4'	=>	$sep . __( 'Equestrian' , 		'epl-jupix' ),
		'33-4'	=>	$sep . __( 'Unconverted Barn' , 	'epl-jupix' )

	);
	return $defaults;
}
add_filter( 'epl_listing_meta_property_category' , 'epl_jpi_property_type_filter' );


/**
 * Jupix floorAreaUnits
 * Jupix siteAreaUnits
 *
 * The units the floor area is measured in Values
 *
 * @package     EPL_JPI
 * @node	floorAreaUnits
 * @node	siteAreaUnits
 * @post_type	property, rental, commercial
 * @epl_meta	property_building_area_unit
 * @filter	epl_opts_area_unit_filter
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_property_building_area_unit_filter() {
	$defaults = array(
		'acres'		=>	__( 'Acres' , 		'epl-jupix' ),
		'hectares'	=>	__( 'Hectares' , 	'epl-jupix' ),
		'sq m'		=>	__( 'sq m' , 		'epl-jupix' ),
		'sq ft'		=>	__( 'sq ft' , 		'epl-jupix' )
	);
	return $defaults;
}
add_filter( 'epl_opts_area_unit_filter' , 'epl_jpi_property_building_area_unit_filter' );


/**
 * Jupix saleBy
 *
 * Property for sale by. Indicates type of sale on the property. It is a numeric value which corresponds to the lookups below.
 *
 * @package     EPL_JPI
 * @node		saleBy
 * @post_type	commercial
 * @epl_meta	property_com_authority
 * @filter	opts_property_com_authority
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_com_sale_by() {
	$sale_by = array(
		'0'	=>	__( 'Not Specified' , 		'epl-jpi' ),
		'1'	=>	__( 'Private Treaty' , 		'epl-jpi' ),
		'2'	=>	__( 'By Auction' ,		'epl-jpi' ),
		'3'	=>	__( 'Confidential' ,		'epl-jpi' ),
		'4'	=>	__( 'By Tender' ,		'epl-jpi' ),
		'5'	=>	__( 'Offers Invited' ,		'epl-jpi' )
	);

	return $sale_by;
}
add_filter( 'epl_property_authority_filter' , 'epl_jpi_com_sale_by' );