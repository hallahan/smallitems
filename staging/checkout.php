<?php
$id=$_GET["id"];
$formatstr = 
'<h2>Checkout Date/Time:</h2>
	%s
<h2>Return Date/Time:</h2>
	%s	
<h2>Notes:</h2>
	%s';

$con = mysql_connect("db.cecs.pdx.edu","hallahan","sempervirens");
if (!$con){die('could not connect to db: ' . mysql_error() );}
mysql_select_db("hallahan",$con);

$esc = mysql_real_escape_string( $id );

$q=
"SELECT * FROM client 
WHERE client_id=" . $esc . ";";

$res = mysql_query( $q );

while( $row = mysql_fetch_array($res) ) {
	printf($formatstr, $row['checkout_time'], $row['return_time'], $row['notes']);
}

?>