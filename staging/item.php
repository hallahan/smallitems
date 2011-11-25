<?php
$id=$_GET["id"];


echo "TEST<br/>";
print_r($id);
echo "END_TEST<br/>";

$formatstr = 
'%s (%s)<br/>';

$con = mysql_connect("db.cecs.pdx.edu","hallahan","sempervirens");
if (!$con){die('could not connect to db: ' . mysql_error() );}
mysql_select_db("hallahan",$con);

$ids = explode('_', $id);

// echo "TEST<br/>";
// print_r($ids);
// echo "END_TEST<br/>";

$escs = array();
foreach( $ids as $i ){
	$esc = mysql_real_escape_string( $i );
	array_push( $escs, $esc );
}

$q=
"SELECT * FROM item 
WHERE item_id=" . array_shift( $escs );

foreach ($escs as $e ) {
	$q = $q . " OR item_id=" . $e;	
}

$q = $q . " ORDER BY name, type;";

// $esc = mysql_real_escape_string( $id );
// $q=
// "SELECT * FROM item 
// WHERE item_id=" . $esc . ";";

$res = mysql_query( $q );

while( $row = mysql_fetch_array($res) ) {
	if ( $row['type']) {
		printf($formatstr, $row['name'], $row['type']);
	} else {
		echo $row['name'] . '<br/>';
	}
}

?>