<?php
$csel_str=$_GET["clientsearch_sel"];
$isel_str=$_GET["itemsearch_sel"];

$sel_formatstr = '<option value="%d" >%s</option>';


$con = mysql_connect("db.cecs.pdx.edu","hallahan","sempervirens");
if (!$con){die('could not connect to db: ' . mysql_error() );}

mysql_select_db("hallahan",$con);

if ( $csel_str ) {
	$csel_esc = mysql_real_escape_string( $csel_str );

	$client_res = mysql_query( "SELECT * FROM client 
																WHERE first_name LIKE '%" . $csel_esc . "%'" .
																" OR last_name LIKE '%" . $csel_esc . "%'" .
																" OR psu_id LIKE '%" . $csel_esc . "%'" .
																" OR phone LIKE '%" . $csel_esc . "%'" .
																" OR email LIKE '%" . $csel_esc . "%'" .
																" OR notes LIKE '%" . $csel_esc . "%'" .
																" ORDER BY last_name, first_name;" );
	
	while( $row = mysql_fetch_array($client_res) ) {
		$full_name = $row['first_name'] . ' ' . $row['last_name'];
		printf( $sel_formatstr, $row['client_id'], $full_name );
	}
	
} 

if ($csel_str == '' ) {
	
	$cr = mysql_query( "SELECT * FROM client ORDER BY last_name, first_name;" );
	
	while( $row = mysql_fetch_array($cr) ) {
								$full_name = $row['first_name'] . ' ' . $row['last_name'];
								printf( $formatstr, $row['client_id'], $full_name );
							}
}


if ( $isel_str ) {
	$isel_esc = mysql_real_escape_string( $isel_str );

	$item_res = mysql_query( "SELECT * FROM item 
																WHERE name LIKE '%" . $isel_esc . "%'" .
																" OR type LIKE '%" . $isel_esc . "%'" .
																" OR description LIKE '%" . $isel_esc . "%'" .
																" ORDER BY name, type;" );
	
	while( $row = mysql_fetch_array($item_res) ) {
		$item_name = $row['name'];
		$item_type = $row['type'];
		if ( $item_type ) {
			$item_name = $item_name . '(' . $item_type . ')';
		}
		printf( $sel_formatstr, $row['client_id'], $item_name );
	}
	
} 

if ($isel_str==''){
	
	$ir = mysql_query( "SELECT * FROM item ORDER BY name, type;" );
	
	while( $row = mysql_fetch_array($ir) ) {
								$item_name = $row['name'];
								$item_type = $row['type'];
								if ( $item_type ) {
									$item_name = $item_name . '(' . $item_type . ')';
								}
								printf( $formatstr, $row['client_id'], $item_name );
							}
}


?>