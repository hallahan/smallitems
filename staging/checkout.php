<?php
$checkout_date =	$_GET["checkout_date"];
$return_date =		$_GET["return_date"];
$checkout_time =	$_GET["checkout_time"];
$return_time =		$_GET["return_time"];
$notes =					$_GET["notes"];

$con = mysql_connect("db.cecs.pdx.edu","hallahan","sempervirens");
if (!$con){die('could not connect to db: ' . mysql_error() );}
mysql_select_db("hallahan",$con);

$formatstr = 
'<h2>Checkout Date/Time:</h2>
	%s<br/>
	%s
<h2>Return Date/Time:</h2>
	%s<br/>
	%s
<h2>Notes:</h2>
	%s';

$esc_cod = mysql_real_escape_string( $checkout_date );
$esc_cot = mysql_real_escape_string( $checkout_time );
$esc_rtd = mysql_real_escape_string( $return_date );
$esc_rtt = mysql_real_escape_string( $return_time );
$esc_not = mysql_real_escape_string( $notes );

echo "TEST<br/>";
echo $esc_cod . "<br/>";
echo $esc_cot . "<br/>";
// echo $return_date . "<br/>";
// echo $return_time . "<br/>";
// echo $notes . "<br/>";
echo "ENDTEST";

printf($formatstr, 
				$esc_cod,
				$esc_cot,
				$esc_rtd,
				$esc_rtt,
				$esc_not);

?>

<?php

// 
// $q=
// "SELECT * FROM client 
// WHERE client_id=" . $esc . ";";
// 
// $res = mysql_query( $q );
// 
// while( $row = mysql_fetch_array($res) ) {
	// printf($formatstr, $row['checkout_time'], $row['return_time'], $row['notes']);
// }
?>
