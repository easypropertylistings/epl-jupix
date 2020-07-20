<?php
/**
 * Import Processing Functions for JUPIX
 *
 * @package     EPL-JUPIX
 * @subpackage  Import Processing Functions
 * @copyright   Copyright (c) 2020, Merv Barrett
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enable record skipping from native Jupix file
 *
 * @param string $default  Default value.
 * @param string $xml_node Node name.
 * @param string $pid      Import ID.
 *
 * @since 2.1.0
 */
function epl_jupix_filter_modified_date( $default, $xml_node, $pid  ) {
	$updated = '';
	if( !empty( $xml_node['dateLastModified'] ) ) {
		$updated .= $xml_node['dateLastModified'];
	}
	if( !empty( $xml_node['timeLastModified'] ) ) {
		$updated .= '-'.$xml_node['timeLastModified'];
	}
	return !empty( $updated ) ? epl_feedsync_format_date( $updated ) : $default;
}
add_filter( 'epl_import_mod_time', 'epl_jupix_filter_modified_date', 10, 3 );

/**
 * Processing Function for property_price_text
 *
 * @import_usage    [epl_jupix_import_price_qualifier({priceQualifier[1]},{price[1]})]
 * @return      If price qualifier is 0 returns empty, else returns formatted preice prefix and formatted currency
 */
function epl_jupix_import_price_qualifier( $price_qualifier, $price ) {

	$price_text = '';

	if ( $price_qualifier == '0' ) {
		return $price_text;
	}

	if ( $price_qualifier != '' && $price != '' ) {

		$array = array(
			'1'  => 'Asking Price Of',
			'2'  => 'Fixed Price',
			'3'  => 'From',
			'4'  => 'Guide Price',
			'5'  => 'Offers In Region Of',
			'6'  => 'Offers Over',
			'7'  => 'Auction Guide Price',
			'8'  => 'Sale By Tender',
			'9'  => 'Shared Ownership',
			'10' => 'Offers In Excess Of',
			'11' => 'Offers Invited',
			'12' => 'Starting Bid',
		);

		$price_text = $array[ $price_qualifier ] . ' ' . epl_currency_formatted_amount( $price );

	}
	return $price_text;
}

/**
 * Processing Function for property_sold_stc
 *
 * @import_usage    [epl_jupix_import_sold_stc({availability[1]})]
 * @return      If XML <availability> = 4 (Sold STC) return 'yes' otherwise 'no'
 * NOTE:                20181119 At the moment if using "EPL Templates" this creates an issue with properties
 *                        <availability>5 (Sold) as it shows the properties at (New) which is wrong.
 */
function epl_jupix_import_sold_stc( $availability ) {
	$array = array(
		'1' => 'On Hold',
		'2' => 'For Sale',
		'3' => 'Under Offer',
		'4' => 'Sold STC',
		'5' => 'Sold',
		'7' => 'Withdrawn',
	);

	if ( $availability == '4' ) {
		return 'yes';
	} else {
		return 'no';
	}
}




// echo '<pre style="background: orange;">';
// echo epl_jupix_import_price_qualifier( 0 , 600000 );
// echo '</pre>';




/**
 * Jupix propertyAge
 *
 * The number of kitchens
 *
 * @package     EPL_JUPIX
 * @node    propertyAge
 * @post_type   property, rental
 * @epl_meta    property_age * NEW
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jupix_import_property_age( $age ) {

	$age_text = '';

	if ( $age == '' ) {
		return $age_text;
	}

	if ( $age != '' ) {
		$array = array(
			'0'  => __( 'Not Specified', 'epl-jupix' ),
			'1'  => __( 'New Build', 'epl-jupix' ),
			'2'  => __( 'Modern', 'epl-jupix' ),
			'3'  => __( '1980s to 1990s', 'epl-jupix' ),
			'4'  => __( '1950s, 1960s and 1970s', 'epl-jupix' ),
			'5'  => __( '1940s', 'epl-jupix' ),
			'6'  => __( '1920s to 1930s', 'epl-jupix' ),
			'7'  => __( 'Edwardian (1901 - 1910)', 'epl-jupix' ),
			'8'  => __( 'Victorian (1837 - 1901)', 'epl-jupix' ),
			'9'  => __( 'Georgian (1714 - 1830)', 'epl-jupix' ),
			'10' => __( 'Pre 18th Century', 'epl-jupix' ),
		);

		$age_text = $array[ $age ];
	}

	return $age_text;
}








