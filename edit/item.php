<?php
$id = $_GET['id'];

$con = mysql_connect("db.cecs.pdx.edu","hallahan","sempervirens");
if (!$con){die('could not connect to db: ' . mysql_error() );}
mysql_select_db("hallahan",$con);

$esc = mysql_real_escape_string( $id );

$q=
"SELECT * FROM client 
WHERE client_id=" . $esc . ";";

$res = mysql_query( $q );

if ( $res ) {
	echo "<h1>Checkout Deleted</h1>";
} else {
	echo "<h1>FAILED.</h1><h2>Checkout NOT deleted.</h2>";
}

?>