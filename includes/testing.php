<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>


	<?php

	// Processing Function
	// Price Text
	//{priceQualifier[1]} £[epl_format_amount({price[1]})]

	$priceQualifier = 0;
	$price = 600000;

	function epl_jupix_import_price_qualifier( $price_qualifier , $price ) {

		$price_text = '';

		if ( $price_qualifier != '0' || $price_qualifier != '' ) {

			$array = array(
				'1' 	=> 'Asking Price Of',
				'2' 	=> 'Fixed Price',
				'3' 	=> 'From',
				'4' 	=> 'Guide Price',
				'5' 	=> 'Offers In Region Of',
				'6' 	=> 'Offers Over',
				'7' 	=> 'Auction Guide Price',
				'8' 	=> 'Sale By Tender',
				'9' 	=> 'Shared Ownership',
				'10' 	=> 'Offers In Excess Of',
				'11' 	=> 'Offers Invited',
				'12' 	=> 'Starting Bid'
			);

			$price_text = $array[$price_qualifier] . ' ' . epl_currency_formatted_amount ( $price );

		}

		return $price_text;

	}


	echo epl_jupix_import_price_qualifier( 5 , 600000 );



	 ?>







 <?php echo '<p>Hello World</p>'; ?>
 </body>
</html>
