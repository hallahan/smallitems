<?php
$id=$_GET["id"];
$formatstr = 
'%s<br/>
%s<br/>
%s<br/>
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
	$full_name = $row['first_name'] . ' ' . $row['last_name'];
	printf( $formatstr, $full_name, $row['psu_id'], $row['phone'], $row['email'] );
}

?>