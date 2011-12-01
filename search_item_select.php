<?php
$search_str=$_GET["search"];
$formatstr = '<option value="%d" >%s</option>';


include 'dbsetup.php';


if($search_str) {
	$esc = mysql_real_escape_string( $search_str );

$q__ = 
"SELECT * FROM item 
WHERE name LIKE '%" . $esc . "%'
OR type LIKE '%" . $esc . "%'
OR description LIKE '%" . $esc . "%'
ORDER BY name, type;";

$q_ = 
"SELECT * FROM item
ORDER BY name, type;";

$q=
"SELECT * FROM item 
WHERE name LIKE '%" . $esc . "%'
OR type LIKE '%" . $esc . "%'
OR descr LIKE '%" . $esc . "%'
ORDER BY name, type;";
																
	$res = mysql_query( $q );
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
