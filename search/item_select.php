<?php
$search_str=$_GET["search"];
$formatstr = '<option value="%d" >%s</option>';


$con = mysql_connect("db.cecs.pdx.edu","hallahan","sempervirens");
if (!$con){die('could not connect to db: ' . mysql_error() );}
mysql_select_db("hallahan",$con);


if($search_str) {
	$esc = mysql_real_escape_string( $search_str );

	$res = mysql_query( "SELECT * FROM item 
																WHERE name LIKE '%" . $esc . "%'" .
																" OR type LIKE '%" . $esc . "%'" .
																" OR description LIKE '%" . $esc . "%'" .
																" ORDER BY name, type;" );
} else {
	$res = mysql_query( "SELECT * FROM item ORDER BY name, type;" );
		
}
	
	
while( $row = mysql_fetch_array($res) ) {
	$name = $row['name'];
	$type = $row['type'];
	if ( $type ) {
		$name = $name . '(' . $type . ')';
	}
	printf( $formatstr, $row['item_id'], $name );
}

?>