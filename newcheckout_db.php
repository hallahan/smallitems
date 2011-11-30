<?php
include 'head.php';
include 'dbsetup.php';
?>

<div id="middle">

<?php 
$client_id 			= $_GET["client_id"];
$items_str 			= $_GET["items_str"];
$checkout_date 	= $_GET["checkout_date"];
$return_date 		= $_GET["return_date"];
$checkout_time 	= $_GET["checkout_time"];
$return_time 		= $_GET["return_time"];
$notes					= $_GET["notes"];

$esc_client_id			= mysql_real_escape_string( $client_id );
$esc_items_str			= mysql_real_escape_string( $items_str );
$esc_checkout_date	= mysql_real_escape_string( $checkout_date );
$esc_return_date		= mysql_real_escape_string( $return_date );
$esc_checkout_time	= mysql_real_escape_string( $checkout_time );
$esc_return_time		= mysql_real_escape_string( $return_time );
$esc_notes					= mysql_real_escape_string( $notes );

$item_ids = explode('_', $esc_items_str);

$max_q =
"SELECT max(checkout_id)
FROM checkout;";

$max_r = mysql_query( $max_q );

while ($row = mysql_fetch_array( $max_r) ) {
  $highest_id = $row[0];
}

$new_checkout_id = $highest_id + 1;

$q =
"INSERT INTO  `checkout` (
`client_id` ,
`returned` ,
`checkout_time` ,
`return_time` ,
`notes`
)
VALUES ('" .
$esc_client_id . "', '" .
"NO" . "', '" .
$esc_checkout_date . " " . $esc_checkout_time . "', '" .
$esc_return_date . " " . $esc_return_time . "', '" .
$esc_notes .
"' );";

$qr = mysql_query($q);

foreach ($item_ids as $i) {
  $q2 =
"INSERT INTO checkoutitem (checkout_id, item_id)
VALUES (" .
  $new_checkout_id. "," .
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
  echo "<h2>Success. The following Checkout was added to the database:</h2>";
}

$t1 =
"SELECT *
FROM checkout
JOIN client USING( client_id )
WHERE checkout_id=" . $new_checkout_id .
";";

$t2 =
"SELECT *
FROM checkoutitem
JOIN item USING( item_id )
WHERE checkout_id=" . $new_checkout_id .
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
  echo $t1r[5] . "<br/>";
}

echo "Items: ";
while ( $t2r = mysql_fetch_array( $t2q ) ) {
  echo $t2r['name'] . "<br/>";
}
?>

</div>

<?php include 'tail.php'; ?>
