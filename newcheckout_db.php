<html>
	<body>
		

<?php

$client_id 			= $_GET["client_id"];
$items_str 			= $_GET["items_str"];
$checkout_date 	= $_GET["checkout_date"];
$return_date 		= $_GET["return_date"];
$checkout_time 	= $_GET["checkout_time"];
$return_time 		= $_GET["return_time"];
$notes					= $_GET["notes"];

$con = mysql_connect("db.cecs.pdx.edu","hallahan","sempervirens");
if (!$con){die('could not connect to db: ' . mysql_error() );}
mysql_select_db("hallahan",$con);

$esc_client_id			= mysql_real_escape_string( $client_id );
$esc_items_str			= mysql_real_escape_string( $items_str );
$esc_checkout_date	= mysql_real_escape_string( $checkout_date );
$esc_return_date		= mysql_real_escape_string( $return_date );
$esc_checkout_time	= mysql_real_escape_string( $checkout_time );
$esc_return_time		= mysql_real_escape_string( $return_time );
$esc_notes					= mysql_real_escape_string( $notes );

$item_ids = explode('_', $esc_items_str);

// echo $esc_client_id . '<br/>';
// echo $esc_items_str . '<br/>';
// echo $esc_checkout_date . '<br/>';
// echo $esc_return_date . '<br/>';

$max_q =
"SELECT max(checkout_id)
FROM checkout;";

$max_r = mysql_query( $max_q );

while ($row = mysql_fetch_array( $max_r) ) {
	$highest_id = $row[0];
}

$q =
"INSERT INTO checkout
VALUES (" . 
$highest_id+1 . "," .
$esc_client_id . "," .
"NO" . "," .
$esc_checkout_date . " " . $esc_checkout_time . "," .
$esc_return_date . " " . $esc_return_time . ",'" .
$esc_notes . 
"');";

$j=1;
foreach ($item_ids as $i) {
$q2 = 
"INSERT INTO checkoutitem (checkout_id, item_id)
VALUES (" .
$highest_id + $j . "," .
$i .
");";
}


?>

	</body>
</html>