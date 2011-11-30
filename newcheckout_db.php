<html>
	<head>
		<meta content="en-us" http-equiv="Content-Language" />
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		
		<link href="style.css" rel="stylesheet" type="text/css" />
		
		<style type="text/css"></style>
		<title>Small Items Checkout</title>
	</head>

	<body>
		

<?php

$client_id 			= $_GET["client_id"];
$items_str 			= $_GET["items_str"];
$checkout_date 	= $_GET["checkout_date"];
$return_date 		= $_GET["return_date"];
$checkout_time 	= $_GET["checkout_time"];
$return_time 		= $_GET["return_time"];
$notes					= $_GET["notes"];

include 'dbsetup.php';

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

$qr = mysql_query($q);

$j=1;
foreach ($item_ids as $i) {
$q2 = 
"INSERT INTO checkoutitem (checkout_id, item_id)
VALUES (" .
$highest_id + $j . "," .
$i .
");";

$q2r = mysql_query($q2);
if ($q2r == false) {
	echo "<h2>Inserting item into database failed. Bad item data...</h2>";
	echo "SQL Query Details: " . $q2 . "<br/>";
}
}

if ($qr == false) {
	echo "<h2>Inserting new checkout into database failed. Bad checkout data...</h2>";
	echo "SQL Query Details: " . $q . "<br/>";
} else {
	echo "<h2>Success.</h2>";
}

$t1 = 
"SELECT *
FROM checkout
JOIN client USING( client_id )
WHERE checkout_id=" . $highest_id+1 .
";";

$t2 =
"SELECT *
FROM checkoutitem
JOIN item USING( item_id )
WHERE checkout_id=" . $highest_id+1 .
";";

$t1q = mysql_query($t1);
$t2q = mysql_query($t2);

while ( $t1r = mysql_fetch_array($t1q)) {
	echo "Client: ";
	echo $t1r['first_name'] . " " . $t1r['last_name'] . "<br/>";
	echo "Checkout Date/Time: ";
	echo $t1r['checkout_time'] . "<br/>";
	echo "Return Date/Time: ";
	echo $t1r['return_time'] . "<br/>";
	echo "Notes: ";
	echo $t1r['notes'] . "<br/>";
}

while ( $t2r = mysql_fetch_array( $t2q ) ) {
	echo "Items: ";
	echo $t2r['name'] . "<br/>";
}

?>

	</body>
</html>