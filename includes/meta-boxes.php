<?php

/*
** Adding custom meta boxes for only this post type
*/



/**
 * Add Sold STC Checkbox to Pricing Section
 *
 */
function epl_jupix_add_sold_stc_field( $group ) {
	$group['fields'][] = array(
		'name'		=>	'property_sold_stc',
		'label'		=>	__('Sold STC', 'epl-jupix' ),
		'type'		=>	'checkbox_single',
		'opts'		=>	array(
			'yes'	=>	__('Yes', 'easy-property-listings' ),
		),
	);
	return $group;
}
add_filter('epl_meta_groups_pricing', 'epl_jupix_add_sold_stc_field');


/**
 * Add Reception Rooms to House Details Section
 *
 */
function epl_jupix_add_reception_rooms_field( $group ) {
	$group['fields'][] = array(
		'name'		=>	'property_reception_rooms',
		'label'		=>	__('Reception Rooms', 'epl-jupix' ),
		'type'		=>	'number',
		'maxlength'	=>	'3'
	);

	$group['fields'][] = array(
		'name'		=>	'property_kitchens',
		'label'		=>	__('Kitchens', 'epl-jupix' ),
		'type'		=>	'number',
		'maxlength'	=>	'3'
	);

	$group['fields'][] = array(
		'name'		=>	'property_tenure',
		'label'		=>	__('Tenure', 'epl-jupix' ),
		'type'		=>	'select',
		'opts'		=>	array(
			'0'	=>	__( 'Not Specified' , 		'epl-jupix' ),
			'1'	=>	__( 'Freehold' , 		'epl-jupix' ),
			'2'	=>	__( 'Leasehold' , 		'epl-jupix' ),
			'3'	=>	__( 'Commonhold' , 		'epl-jupix' ),
			'4'	=>	__( 'Share of Freehold' , 	'epl-jupix' ),
			'5'	=>	__( 'Flying Freehold' , 	'epl-jupix' ),
			'6'	=>	__( 'Share Transfer' , 		'epl-jupix' )
		)
	);

	return $group;
}
add_filter('epl_meta_groups_house_features', 'epl_jupix_add_reception_rooms_field');


/**
 * Add Property Type to Listing Type Details Section
 *
 */

function epl_jupix_add_property_type_field( $group ) {
	$group['fields'][] = array(
		'name'		=>	'property_type',
		'label'		=>	__('Property Type', 'epl-jupix' ),
		'type'		=>	'select',
		'opts'		=>	array(
			'1'	=>	__( 'Houses' , 			'epl-jupix' ),
			'2'	=>	__( 'Flats / Apartments' , 	'epl-jupix' ),
			'3'	=>	__( 'Bungalows' , 		'epl-jupix' ),
			'4'	=>	__( 'Other' , 			'epl-jupix' )
		)
	);

	return $group;
}
add_filter('epl_meta_groups_listing_type', 'epl_jupix_add_property_type_field');



/**
 * Rental Availability
 *
 */
function epl_jupix_add_property_rental_availability_field( $group ) {
	$group['fields'][] = array(
		'name'		=>	'property_rental_availability',
		'label'		=>	__('Rental Availablilty', 'epl-jupix' ),
		'type'		=>	'select',
		'opts'		=>	array(
			'1'	=>	__( 'On Hold' , 		'epl-jupix' ),
			'2'	=>	__( 'To Let' , 			'epl-jupix' ),
			'3'	=>	__( 'References Pending' , 	'epl-jupix' ),
			'4'	=>	__( 'Let Agreed' , 		'epl-jupix' ),
			'5'	=>	__( 'Let' , 			'epl-jupix' ),
			'6'	=>	__( 'Withdrawn' , 		'epl-jupix' ),
		)
	);

	return $group;
}
add_filter('epl_meta_groups_rental_pricing', 'epl_jupix_add_property_rental_availability_field');

