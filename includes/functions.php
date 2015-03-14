 <?php
/**
 * JUPIX Functions and Setup EPL for JUPIX format 
 *
 * @package     EPL_JPI
 * @subpackage  Processing Functions
 * @copyright   Copyright (c) 2014, Merv Barrett
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Jupix forSalePOA & toLetPOA
 *
 * @package     EPL_JPI
 * @node	forSalePOA
 * @node	toLetPOA
 * @post_type	property, rental, commercial
 * @epl_meta	property_price_display
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_sale_poa() {
	$values = array(
		'0'	=>	__( 'yes' , 'epl-jpi' ),	// Display Price
		'1'	=>	__( 'no' , 'epl-jpi' )		// Hide Price
	);
}

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
function epl_jpi_processing_com_area_units() {
	$com_area_units = array(
		'acres'		=>	__( 'acres' , 		'epl-jpi' ),
		'hectares'	=>	__( 'hectares' , 	'epl-jpi' ),
		'sq m'		=>	__( 'sq m' , 		'epl-jpi' ),
		'sq ft'		=>	__( 'sq ft' , 		'epl-jpi' )
	);
}

/**
 * Jupix flags
 *
 * Agent-specific list of property flags
 *
 * @package     EPL_JPI
 * @node		flags
 * @post_type	property, rental, commercial
 * @epl_meta	property_flags * NEW
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_flags() {
	$flags = ''; 
	
	/*	<flags>
			<flag>New Instruction</flag>
			<flag>Price Reduction</flag>
		</flags>
	*/
}

/*
 **********************************************
 * Residential and Rural
 */
 
/**
 * Jupix availability
 *
 * The following fields apply to residential lettings properties only
 *
 * @package     EPL_JPI
 * @node		availability
 * @post_type	property, rural
 * @epl_meta	property_status
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_property_availability() {
	$availability = array(
		'1'	=>	__( 'On Hold' , 	'epl-jpi' ),
		'2'	=>	__( 'For Sale' , 	'epl-jpi' ),
		'3'	=>	__( 'Under Offer' , 	'epl-jpi' ),
		'4'	=>	__( 'Sold STC' , 	'epl-jpi' ),
		'5'	=>	__( 'Sold' , 		'epl-jpi' ),
		'7'	=>	__( 'Withdrawn' , 	'epl-jpi' )
	);
}

/**
 * Jupix saleBy
 *
 * @package     EPL_JPI
 * @node		saleBy
 * @epl_meta	property_authority
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_sale_by() {
	$sale_by = array(
		'0'	=>	__( 'Not Specified' , 	'epl-jpi' ),
		'1'	=>	__( 'Private Treaty' , 	'epl-jpi' ),
		'2'	=>	__( 'By Auction' , 	'epl-jpi' ),
		'3'	=>	__( 'Confidential' , 	'epl-jpi' ),
		'4'	=>	__( 'By Tender' , 	'epl-jpi' ),
		'5'	=>	__( 'Offers Invited' , 	'epl-jpi' )
	);
}

/**
 **********************************************
 * Residential Sales and Lettings data fields
 */

/**
 * Jupix propertyReceptionRooms
 *
 * The number of reception rooms
 *
 * @package     EPL_JPI
 * @node		propertyReceptionRooms
 * @post_type	property, rental
 * @epl_meta	property_reception_rooms * NEW
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_reception_rooms() {
	$reception_rooms = ''; // Number
}
 
/**
 * Jupix propertyKitchens
 *
 * The number of kitchens
 *
 * @package     EPL_JPI
 * @node		propertyKitchens
 * @post_type	property, rental
 * @epl_meta	property_kitchens * NEW
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_kitchens() {
	$property_kitchens = ''; // Number
}

/**
 * Jupix propertyAge
 *
 * The number of kitchens
 *
 * @package     EPL_JPI
 * @node		propertyAge
 * @post_type	property, rental
 * @epl_meta	property_age * NEW
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_age() {
	$property_age = array(
		'0'	=>	__( 'Not Specified' , 		'epl-jpi' ),
		'1'	=>	__( 'New Build' , 		'epl-jpi' ),
		'2'	=>	__( 'Modern' , 			'epl-jpi' ),
		'3'	=>	__( '1980s to 1990s' , 		'epl-jpi' ),
		'4'	=>	__( '1950s, 1960s and 1970s' , 	'epl-jpi' ),
		'5'	=>	__( '1940s' , 			'epl-jpi' ),
		'6'	=>	__( '1920s to 1930s' , 		'epl-jpi' ),
		'7'	=>	__( 'Edwardian (1901 - 1910)' , 'epl-jpi' ),
		'8'	=>	__( 'Victorian (1837 - 1901)' ,	'epl-jpi' ),
		'9'	=>	__( 'Georgian (1714 - 1830)' , 	'epl-jpi' ),
		'10'	=>	__( 'Pre 18th Century' , 	'epl-jpi' )
	);
}

/**
 **********************************************
 * Residential Sales Specific Fields
 */

/**
 * Jupix priceQualifier
 *
 * @package     EPL_JPI
 * @node		priceQualifier
 * @post_type	property
 * @epl_meta	property_price_view
 * @usage		[epl_jpi_processing_price_qualifier({priceQualifier[1]},{price[1]})]
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_price_qualifier( $input = FALSE , $price = 0 ) {
	$price_qualifier = array(
		'1'	=>	__( 'Asking Price Of' , 	'epl-jpi' ),
		'2'	=>	__( 'Fixed Price' , 		'epl-jpi' ),
		'3'	=>	__( 'From' , 			'epl-jpi' ),
		'4'	=>	__( 'Guide Price' , 		'epl-jpi' ),
		'5'	=>	__( 'Offers In Region Of' , 	'epl-jpi' ),
		'6'	=>	__( 'Offers Over' , 		'epl-jpi' ),
		'7'	=>	__( 'Auction Guide Price' , 	'epl-jpi' ),
		'8'	=>	__( 'Sale By Tender' , 		'epl-jpi' ),
		'9'	=>	__( 'Shared Ownership' , 	'epl-jpi' ),
		'10'	=>	__( 'Offers In Excess Of' , 	'epl-jpi' )
	);
	$result = $price_qualifier[$input] . ' ' . epl_currency_formatted_amount( $price );
	return $result;
}


/**
 * Jupix propertyTenure
 *
 * Property tenure. Indicates the tenure of the property. 
 * It is a numeric value which corresponds to the lookups below.
 *
 * @package     EPL_JPI
 * @node		propertyTenure
 * @post_type	property
 * @epl_meta	property_tenure * NEW
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_property_tenure() {
	$tenure = array(
		'0'	=>	__( 'Not Specified' , 		'epl-jpi' ),
		'1'	=>	__( 'Freehold' , 		'epl-jpi' ),
		'2'	=>	__( 'Leasehold' , 		'epl-jpi' ),
		'3'	=>	__( 'Commonhold' , 		'epl-jpi' ),
		'4'	=>	__( 'Share of Freehold' , 	'epl-jpi' ),
		'5'	=>	__( 'Flying Freehold' , 	'epl-jpi' ),
		'6'	=>	__( 'Share Transfer' , 		'epl-jpi' )
	);
}

/**
 * Jupix developmentOpportunity
 *
 * @package     EPL_JPI
 * @node		developmentOpportunity
 * @post_type	property, commercial
 * @epl_meta	property_development_opportunity * NEW
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_development_opportunity() {
	$development_opportunity = array(
		'0'	=>	__( 'no' , 		'epl-jpi' ),	// No
		'1'	=>	__( 'yes' , 		'epl-jpi' )		// Yes
	);
}

/**
 * Jupix investmentOpportunity
 *
 * @package     EPL_JPI
 * @node		investmentOpportunity
 * @post_type	property, commercial
 * @epl_meta	property_investment_opportunity * NEW
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_investment_opportunity() {
	$investment_opportunity = array(
		'0'	=>	__( 'no' , 		'epl-jpi' ),	// No
		'1'	=>	__( 'yes' , 		'epl-jpi' )		// Yes
	);
}

/**
 * Jupix estimatedRentalIncome
 *
 * @package     EPL_JPI
 * @node	estimatedRentalIncome
 * @epl_meta	property_estimated_rental_income * NEW
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_estimated_rental_income() {
	$estimated_rental_income = array(
		'0'	=>	__( 'no' , 		'epl-jpi' ),	// No
		'1'	=>	__( 'yes' , 		'epl-jpi' )		// Yes
	);
}


/**
 * Jupix propertyType
 *
 * The number of reception rooms
 *
 * @package     EPL_JPI
 * @node	propertyType
 * @post_type	property, rental
 * @epl_meta	property_category
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_property_type() {
	$property_type = array(
		'1'	=>	__( 'Houses' , 			'epl-jpi' ),
		'2'	=>	__( 'Flats / Apartments' , 	'epl-jpi' ),
		'3'	=>	__( 'Bungalows' , 		'epl-jpi' ),
		'4'	=>	__( 'Other' , 			'epl-jpi' )
	);
}

/**
 * Jupix propertyStyle
 *
 * The number of reception rooms
 *
 * @package     EPL_JPI
 * @node	propertyStyle
 * @post_type	property, rental
 * @epl_meta	property_category_style * NEW
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_property_style() {
	$property_style = array();
		/*
		1 1 Barn Conversion 
		2 1 Cottage 
		3 1 Chalet 
		4 1 Detached House 
		5 1 Semi-Detached House 
		28 1 Link Detached 
		6 1 Farm House 
		7 1 Manor House 
		8 1 Mews 
		9 1 Mid Terraced House 
		10 1 End Terraced House 
		11 1 Town House 
		12 1 Villa 
		29 1 Shared House 
		31 1 Sheltered Housing
		
		13 2 Apartment 
		14 2 Bedsit 
		15 2 Ground Floor Flat 
		16 2 Flat 
		17 2 Ground Floor Maisonette 
		18 2 Maisonette 
		19 2 Penthouse 
		20 2 Studio 
		30 2 Shared Flat 
		
		21 3 Detached Bungalow 
		35 3 End Terraced Bungalow 
		34 3 Mid Terraced Bungalow 
		22 3 Semi-Detached Bungalow 
		
		23 4 Building Plot / Land 
		24 4 Garage 
		25 4 House Boat 
		26 4 Mobile Home 
		27 4 Parking 
		32 4 Equestrian 
		33 4 Unconverted Barn
		
		*/

}

/**
 **********************************************
 * Residential Lettings Specific Fields
 */
 
/**
 * Jupix availability
 *
 * The following fields apply to residential lettings properties only
 *
 * @package     EPL_JPI
 * @node	availability
 * @post_type	rental
 * @epl_meta	property_rental_availability * NEW
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_rental_availability() {
	$availability = array(
		'1'	=>	__( 'On Hold' , 		'epl-jpi' ),
		'2'	=>	__( 'To Let' , 			'epl-jpi' ),
		'3'	=>	__( 'References Pending' , 	'epl-jpi' ),
		'4'	=>	__( 'Let Agreed' , 		'epl-jpi' ),
		'5'	=>	__( 'Let' , 			'epl-jpi' ),
		'6'	=>	__( 'Withdrawn' , 		'epl-jpi' )
	);
}

/**
 * Jupix rentFrequency
 *
 * The rent frequency of the property such as Per Calendar Month
 *
 * @package     EPL_JPI
 * @node		rentFrequency
 * @post_type	rental
 * @epl_meta	property_rent_period
 * @filter		epl_opts_rent_period_filter
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_rent_frequency() {
	$rent_frequency = array(
		'1'	=>	__( 'pcm' , 			'epl-jpi' ),
		'2'	=>	__( 'pw' , 			'epl-jpi' ),
		'3'	=>	__( 'pa' ,			'epl-jpi' )
	);
}

/**
 * Jupix studentProperty
 *
 * Will be equal to \911\92 this property has a let type of \91Student\92
 *
 * @package     EPL_JPI
 * @node		studentProperty
 * @post_type	rental
 * @epl_meta	property_student * NEW
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_rent_student() {
	$student_property = array(
		'0'	=>	__( 'no' , 		'epl-jpi' ),
		'1'	=>	__( 'yes' , 		'epl-jpi' )
	);
}

/**
 * Jupix lettingFeePolicyHeadline
 *
 * @package     EPL_JPI
 * @node		lettingFeePolicyHeadline
 * @post_type	rental
 * @epl_meta	property_letting_fee_policy_headline * NEW
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_letting_fee_policy_heading() {
	$letting_fee_policy_heading = ''; // String
}

/**
 * Jupix lettingFeePolicyDetails
 *
 * @package     EPL_JPI
 * @node		lettingFeePolicyDetails
 * @post_type	rental
 * @epl_meta	opts_property_com_listing_type
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_letting_fee_policy_details() {
	$letting_fee_policy_details = ''; // String
}

/**
 **********************************************
 * Agricultural Specific Fields
 */

/**
 * Jupix priceQualifier
 *
 * @package     EPL_JPI
 * @node		priceQualifier
 * @post_type	property
 * @epl_meta	property_price_view
 * @subpackage  Processing Functions
 * @since       1.0
 
function epl_jpi_processing_price_qualifier() {
	$price_qualifier = array(
		'1'	=>	__( 'Asking Price Of' , 	'epl-jpi' ),
		'2'	=>	__( 'Fixed Price' , 		'epl-jpi' ),
		'3'	=>	__( 'From' , 			'epl-jpi' ),
		'4'	=>	__( 'Guide Price' , 		'epl-jpi' ),
		'5'	=>	__( 'Offers In Region Of' , 	'epl-jpi' ),
		'6'	=>	__( 'Offers Over' , 		'epl-jpi' ),
		'7'	=>	__( 'Auction Guide Price' , 	'epl-jpi' ),
		'8'	=>	__( 'Sale By Tender' , 		'epl-jpi' )
	);
}
*/
/**
 * Jupix propertyType
 *
 * The number of reception rooms
 *
 * @package     EPL_JPI
 * @node	propertyType
 * @post_type	rural
 * @epl_meta	property_category
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_agricultural_type() {
	$property_type = array(
		'1'	=>	__( 'Residential Farm' , 	'epl-jpi' ),
		'2'	=>	__( 'Commercial Farm' , 	'epl-jpi' ),
		'3'	=>	__( 'Poultry Farm' , 		'epl-jpi' ),
		'4'	=>	__( 'Livestock Farm' , 		'epl-jpi' ),
		'5'	=>	__( 'Arable Land' , 		'epl-jpi' ),
		'6'	=>	__( 'Bare Land' , 		'epl-jpi' ),
		'7'	=>	__( 'Grazing Land' , 		'epl-jpi' ),
		'8'	=>	__( 'Paddocks' , 		'epl-jpi' ),
		'9'	=>	__( 'Pasture Land' , 		'epl-jpi' ),
		'10'	=>	__( 'Shooting' , 		'epl-jpi' ),
		'11'	=>	__( 'Fishing' , 		'epl-jpi' ),
		'12'	=>	__( 'General Leisure' , 	'epl-jpi' ),
		'13'	=>	__( 'Woodland' , 		'epl-jpi' ),
		'14'	=>	__( 'Investment Land' , 	'epl-jpi' ),
		'15'	=>	__( 'Development Land' , 	'epl-jpi' ),
		'16'	=>	__( 'Residential Land' , 	'epl-jpi' ),
		'17'	=>	__( 'Residential Land' , 	'epl-jpi' ),
		'18'	=>	__( 'Commercial / Industrial' , 'epl-jpi' )
	);
}

/**
 **********************************************
 * Commercial Specific Fields
 */
 
 /**
 * Jupix toLet
 *
 * Is the property available as leasehold.
 *
 * @package     EPL_JPI
 * @node		toLet
 * @post_type	commercial
 * @epl_meta	property_com_to_let * NEW
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_com_to_let() {
	$com_to_let = array(
		'0'	=>	__( 'no' , 		'epl-jpi' ),
		'1'	=>	__( 'yes' , 		'epl-jpi' )
	);
}

/**
 * Jupix Commercial availability
 *
 * The following fields apply to residential lettings properties only
 *
 * @package     EPL_JPI
 * @node		availability
 * @post_type	commercial
 * @epl_meta	property_com_availability * NEW
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_com_availability() {
	$com_availability = array(
		'1'	=>	__( 'On Hold' , 		'epl-jpi' ),
		'2'	=>	__( 'For Sale' , 		'epl-jpi' ),
		'3'	=>	__( 'To Let' , 			'epl-jpi' ),
		'4'	=>	__( 'For Sale / To Let' , 	'epl-jpi' ),
		'5'	=>	__( 'Under Offer' , 		'epl-jpi' ),
		'6'	=>	__( 'Sold STC' , 		'epl-jpi' ),
		'7'	=>	__( 'Exchanged' , 		'epl-jpi' ),
		'8'	=>	__( 'Completed' , 		'epl-jpi' ),
		'9'	=>	__( 'Let Agreed' , 		'epl-jpi' ),
		'10'	=>	__( 'Let' , 			'epl-jpi' ),
		'11'	=>	__( 'Withdrawn' , 		'epl-jpi' )
	);
}

/**
 * Jupix priceFrom
 *
 * The price from of the property in pounds EG 150000 to 450000. Note for properties 
 * that do not have a range priceFrom will be 0 and only priceTo will be specified
 *
 * @package     EPL_JPI
 * @node		priceFrom
 * @post_type	commercial
 * @epl_meta	property_com_price_from * NEW
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_com_price_from() {
	$com_price_from = ''; // Integer
}

/**
 * Jupix rentFrequency
 *
 * The frequency of the rent specified for example PA Values
 *
 * @package     EPL_JPI
 * @node		rentFrequency
 * @post_type	commercial
 * @epl_meta	property_com_rent_frequency * NEW
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_com_rent_frequency() {
	$com_rent_frequency = ''; // String
	
	/**
	* String Freehold or Long Leasehold
	* pa
	* pax
	* pcm
	* psf
	* psm
	* per
	* acre
	* per
	* hectare
	*/
}

/**
 * Jupix propertyTenure
 *
 * The tenure of the property, stored as a textual value that can be blank. This can either be Freehold or Long Leasehold.
 *
 * @package     EPL_JPI
 * @node		propertyTenure
 * @post_type	commercial
 * @epl_meta	property_com_tenure * NEW
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_com_tenure() {
	$com_tenure = ''; // String
}

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
function epl_jpi_processing_com_sale_by() {
	$com_sale_by = array(
		'0'	=>	__( 'Not Specified' , 		'epl-jpi' ),
		'1'	=>	__( 'Private Treaty' , 		'epl-jpi' ),
		'2'	=>	__( 'By Auction' ,		'epl-jpi' ),
		'3'	=>	__( 'Confidential' ,		'epl-jpi' ),
		'4'	=>	__( 'By Tender' ,		'epl-jpi' ),
		'5'	=>	__( 'Offers Invited' ,		'epl-jpi' )
	);
}

/**
 * Jupix floorAreaTo
 *
 * The total floor area size available.
 *
 * @package     EPL_JPI
 * @node	floorAreaTo
 * @post_type	commercial
 * @epl_meta	property_building_area
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_com_floor_area_to() {
	$com_floor_area_to = ''; // number
}

/**
 * Jupix floorAreaFrom
 *
 * The minimum floor area available. Note for properties that do not 
 * have a range floorAreaFrom will be 0 and only floorArea will be specified
 *
 * @package     EPL_JPI
 * @node	floorAreaFrom
 * @post_type	commercial
 * @epl_meta	property_building_area_to * NEW
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_com_floor_area_from() {
	$com_floor_area_from = ''; // number
}

/**
 * Jupix strapLine
 *
 * The units the floor area is measured in Values
 *
 * @package     EPL_JPI
 * @node		strapLine
 * @post_type	commercial, rural
 * @epl_meta	property_com_further_options
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_com_strap_line() {
	$com_strap_line = ''; // String
}

/**
 * Jupix Commercial Property Types
 *
 * The multiple property types for this property. For example farms and grazing land Values: Please see the appendix
 *
 * @package     EPL_JPI
 * @node		propertyType
 * @post_type	commercial
 * @epl_meta	property_commercial_category
 * @filter		epl_listing_load_meta_commercial_category
 * @subpackage  Processing Functions
 * @since       1.0
 */
function epl_jpi_processing_com_property_type() {
	$com_type = array(
		'1'	=>	__( 'Offices' , 			'epl-jpi' ),
		'2'	=>	__( 'Serviced Offices' , 		'epl-jpi' ),
		'3'	=>	__( 'Business Park' , 			'epl-jpi' ),
		'4'	=>	__( 'Science / Tech / R&D' , 		'epl-jpi' ),
		'5'	=>	__( 'A1 - High Street' , 		'epl-jpi' ),
		'6'	=>	__( 'A1 \96 Centre' , 			'epl-jpi' ),
		'7'	=>	__( 'A1 - Out Of Town' , 		'epl-jpi' ),
		'8'	=>	__( 'A1 \96 Other' , 			'epl-jpi' ),
		'9'	=>	__( 'A2 - Financial Services' , 	'epl-jpi' ),
		'10'	=>	__( 'A3 - Restaurants / Cafes' , 	'epl-jpi' ),
		'11'	=>	__( 'A4 - Pubs / Bars / Clubs' , 	'epl-jpi' ),
		'12'	=>	__( 'A5 - Take Away' , 			'epl-jpi' ),
		'13'	=>	__( 'B1 - Light Industrial' , 		'epl-jpi' ),
		'14'	=>	__( 'B2 - Heavy Industrial' , 		'epl-jpi' ),
		'15'	=>	__( 'B8 - Warehouse / Distribution' , 	'epl-jpi' ),
		'16'	=>	__( 'Science / Tech / R&D' , 		'epl-jpi' ),
		'17'	=>	__( 'Other Industrial' , 		'epl-jpi' ),
		'18'	=>	__( 'Caravan Park' , 			'epl-jpi' ),
		'19'	=>	__( 'Cinema' , 				'epl-jpi' ),
		'20'	=>	__( 'Golf Property' , 			'epl-jpi' ),
		'21'	=>	__( 'Guest House / Hotel' , 		'epl-jpi' ),
		'22'	=>	__( 'Leisure Park' , 			'epl-jpi' ),
		'23'	=>	__( 'Leisure Other' , 			'epl-jpi' ),
		'24'	=>	__( 'Day Nursery / Child Care' , 	'epl-jpi' ),
		'25'	=>	__( 'Nursing & Care Homes' , 		'epl-jpi' ),
		'26'	=>	__( 'Surgeries' , 			'epl-jpi' ),
		'27'	=>	__( 'Petrol Stations' , 		'epl-jpi' ),
		'28'	=>	__( 'Show Room' , 			'epl-jpi' ),
		'29'	=>	__( 'Garage' , 				'epl-jpi' ),
		'30'	=>	__( 'Industrial (land)' , 		'epl-jpi' ),
		'31'	=>	__( 'Office (land)' , 			'epl-jpi' ),
		'32'	=>	__( 'Residential (land)' , 		'epl-jpi' ),
		'33'	=>	__( 'Retail (land)' , 			'epl-jpi' ),
		'34'	=>	__( 'Leisure (land)' , 			'epl-jpi' ),
		'35'	=>	__( 'Commercial / Other (land)' , 	'epl-jpi' ),
		'36'	=>	__( 'Refurbishment Opportunities' , 	'epl-jpi' ),
		'37'	=>	__( 'Residential Conversions' , 	'epl-jpi' ),
		'38'	=>	__( 'Residential' , 			'epl-jpi' ),
		'39'	=>	__( 'Commercial' , 			'epl-jpi' ),
		'40'	=>	__( 'Ground Leases' , 			'epl-jpi' )
	);
}
