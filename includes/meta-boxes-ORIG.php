<?php

/*
** Adding custom meta boxes for only this post type
*/
add_action( 'init', 'epl_jpi_add_meta' );

function epl_jpi_add_meta( $meta_box ) {

	$opts_property_age = array(
		'0'  => __( 'Not Specified', 'epl-jpi' ),
		'1'  => __( 'New Build', 'epl-jpi' ),
		'2'  => __( 'Modern', 'epl-jpi' ),
		'3'  => __( '1980s to 1990s', 'epl-jpi' ),
		'4'  => __( '1950s, 1960s and 1970s', 'epl-jpi' ),
		'5'  => __( '1940s', 'epl-jpi' ),
		'6'  => __( '1920s to 1930s', 'epl-jpi' ),
		'7'  => __( 'Edwardian (1901 - 1910)', 'epl-jpi' ),
		'8'  => __( 'Victorian (1837 - 1901)', 'epl-jpi' ),
		'9'  => __( 'Georgian (1714 - 1830)', 'epl-jpi' ),
		'10' => __( 'Pre 18th Century', 'epl-jpi' ),
	);

	$opts_price_qualifier = array(
		'1'  => __( 'Asking Price Of', 'epl-jpi' ),
		'2'  => __( 'Fixed Price', 'epl-jpi' ),
		'3'  => __( 'From', 'epl-jpi' ),
		'4'  => __( 'Guide Price', 'epl-jpi' ),
		'5'  => __( 'Offers In Region Of', 'epl-jpi' ),
		'6'  => __( 'Offers Over', 'epl-jpi' ),
		'7'  => __( 'Auction Guide Price', 'epl-jpi' ),
		'8'  => __( 'Sale By Tender', 'epl-jpi' ),
		'9'  => __( 'Shared Ownership', 'epl-jpi' ),
		'10' => __( 'Offers In Excess Of', 'epl-jpi' ),
	);

	$opts_property_tenure = array(
		'0' => __( 'Not Specified', 'epl-jpi' ),
		'1' => __( 'Freehold', 'epl-jpi' ),
		'2' => __( 'Leasehold', 'epl-jpi' ),
		'3' => __( 'Commonhold', 'epl-jpi' ),
		'4' => __( 'Share of Freehold', 'epl-jpi' ),
		'5' => __( 'Flying Freehold', 'epl-jpi' ),
		'6' => __( 'Share Transfer', 'epl-jpi' ),
	);

	$opts_rental_availability = array(
		'1' => __( 'On Hold', 'epl-jpi' ),
		'2' => __( 'To Let', 'epl-jpi' ),
		'3' => __( 'References Pending', 'epl-jpi' ),
		'4' => __( 'Let Agreed', 'epl-jpi' ),
		'5' => __( 'Let', 'epl-jpi' ),
		'6' => __( 'Withdrawn', 'epl-jpi' ),
	);

	$opts_com_availability = array(
		''   => __( '', 'epl-jpi' ),
		'1'  => __( 'On Hold', 'epl-jpi' ),
		'2'  => __( 'For Sale', 'epl-jpi' ),
		'3'  => __( 'To Let', 'epl-jpi' ),
		'4'  => __( 'For Sale / To Let', 'epl-jpi' ),
		'5'  => __( 'Under Offer', 'epl-jpi' ),
		'6'  => __( 'Sold STC', 'epl-jpi' ),
		'7'  => __( 'Exchanged', 'epl-jpi' ),
		'8'  => __( 'Completed', 'epl-jpi' ),
		'9'  => __( 'Let Agreed', 'epl-jpi' ),
		'10' => __( 'Let', 'epl-jpi' ),
		'11' => __( 'Withdrawn', 'epl-jpi' ),
	);

	$meta_fields = array(
		'id'        => 'epl-jpi-meta-fields',
		'label'     => __( 'Jupix Special Fields', 'epl' ),
		'post_type' => array( 'property', 'rental', 'commercial', 'rural' ),
		'context'   => 'normal',
		'priority'  => 'default',
		'groups'    => array(
			array(
				'id'      => 'jupix_values',
				'columns' => '1',
				'label'   => 'Jupix Stuff Features',
				'fields'  => array(
					array(
						'name'      => 'property_flags',
						'label'     => __( 'Flags', 'epl' ),
						'type'      => 'text',
						'maxlength' => '50',
					),

					array(
						'name'      => 'property_reception_rooms',
						'label'     => __( 'Reception Rooms', 'epl' ),
						'type'      => 'number',
						'maxlength' => '10',
					),

					array(
						'name'      => 'property_kitchens',
						'label'     => __( 'Kitchens', 'epl' ),
						'type'      => 'number',
						'maxlength' => '10',
					),

					array(
						'name'  => 'property_age',
						'label' => __( 'Age', 'epl' ),
						'type'  => 'select',
						'opts'  => $opts_property_age,
					),

					/** Residential Sales Specific Fields */

					/**

					availability
					price
					forSalePOA
					priceQualifier
					propertyTenure
					saleBy
					developmentOpportunity
					investmentOpportunity
					estimatedRentalIncome
					*/

					array(
						'name'    => 'property_tenure',
						'label'   => __( 'Price Qualifier', 'epl' ),
						'type'    => 'select',
						'opts'    => $opts_price_qualifier,
						'include' => array( 'property' ),
					),

					array(
						'name'    => 'property_tenure',
						'label'   => __( 'Tenure', 'epl' ),
						'type'    => 'select',
						'opts'    => $opts_property_tenure,
						'include' => array( 'property' ),
					),

					array(
						'name'    => 'property_development_opportunity',
						'label'   => __( 'Development Opportunity', 'epl' ),
						'type'    => 'radio',
						'opts'    => array(
							'1' => __( 'Yes', 'epl' ),
							'0' => __( 'No', 'epl' ),
						),
						'include' => array( 'property' ),
					),

					array(
						'name'    => 'property_investment_opportunity',
						'label'   => __( 'Investment Opportunity', 'epl' ),
						'type'    => 'radio',
						'opts'    => array(
							'1' => __( 'Yes', 'epl' ),
							'0' => __( 'No', 'epl' ),
						),
						'include' => array( 'property' ),
					),

					array(
						'name'      => 'property_estimated_rental_income',
						'label'     => __( 'Estimated Rental Income', 'epl' ),
						'type'      => 'number',
						'maxlength' => '50',
						'include'   => array( 'property' ),
					),

					/** Residential Lettings Specific Fields */
					array(
						'name'    => 'property_rental_availability',
						'label'   => __( 'Rental Availability', 'epl' ),
						'type'    => 'select',
						'opts'    => $opts_rental_availability,
						'include' => array( 'rental' ),
					),

					array(
						'name'    => 'property_student',
						'label'   => __( 'Student', 'epl' ),
						'type'    => 'radio',
						'opts'    => array(
							'1' => __( 'Yes', 'epl' ),
							''  => __( 'No', 'epl' ),
						),
						'include' => array( 'rental' ),
					),

					array(
						'name'      => 'property_letting_fee_policy_headline',
						'label'     => __( 'Letting Fee Policy Headline', 'epl' ),
						'type'      => 'text',
						'maxlength' => '50',
						'include'   => array( 'rental' ),
					),

					array(
						'name'      => 'epl_jpi_processing_letting_fee_policy_details',
						'label'     => __( 'Letting Fee Policy Details', 'epl' ),
						'type'      => 'textarea',
						'maxlength' => '1000',
						'include'   => array( 'rental' ),
					),

					/** Commercial specific fields */
					array(
						'name'    => 'property_com_to_let',
						'label'   => __( 'To Let', 'epl' ),
						'type'    => 'radio',
						'opts'    => array(
							'1' => __( 'Yes', 'epl' ),
							'0' => __( 'No', 'epl' ),
						),
						'include' => array( 'commercial' ),
					),

					array(
						'name'    => 'property_com_availability',
						'label'   => __( 'Availability', 'epl' ),
						'type'    => 'select',
						'opts'    => $opts_com_availability,
						'include' => array( 'commercial' ),
					),

					array(
						'name'      => 'property_com_price_from',
						'label'     => __( 'Price From', 'epl' ),
						'type'      => 'number',
						'maxlength' => '11',
					),

					array(
						'name'      => 'epl_jpi_processing_com_rent_frequency',
						'label'     => __( 'Price To', 'epl' ),
						'type'      => 'text',
						'maxlength' => '11',
					),

					array(
						'name'      => 'property_com_tenure',
						'label'     => __( 'Tenure', 'epl' ),
						'type'      => 'text',
						'maxlength' => '50',
					),

					array(
						'name'      => 'epl_jpi_processing_com_rent_frequency',
						'label'     => __( 'Rent Frequency', 'epl' ),
						'type'      => 'text',
						'maxlength' => '50',
					),

					array(
						'name'      => 'property_building_area_to',
						'label'     => __( 'Building Area To', 'epl' ),
						'type'      => 'text',
						'maxlength' => '50',
					),
				),
			),
		),
	);
	$meta_box[] = $meta_fields;
	return $meta_box;
}

add_filter( 'epl_listing_meta_boxes', 'epl_jpi_add_meta' );
