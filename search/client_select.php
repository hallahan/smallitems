
<?php
$search_str=$_GET["search"];
$formatstr = '<option value="%d" >%s</option>';


$con = mysql_connect("db.cecs.pdx.edu","hallahan","sempervirens");
if (!$con){die('could not connect to db: ' . mysql_error() );}
mysql_select_db("hallahan",$con);


if($search_str) {
	$esc = mysql_real_escape_string( $search_str );

	$res = mysql_query( "SELECT * FROM client 
																WHERE first_name LIKE '%" . $esc . "%'" .
																" OR last_name LIKE '%" . $esc . "%'" .
																" OR psu_id LIKE '%" . $esc . "%'" .
																" OR phone LIKE '%" . $esc . "%'" .
																" OR email LIKE '%" . $esc . "%'" .
																" OR notes LIKE '%" . $esc . "%'" .
																" ORDER BY last_name, first_name;" );
} else {
	$res = mysql_query( "SELECT * FROM client ORDER BY last_name, first_name;" );
		
}
	
	
while( $row = mysql_fetch_array($res) ) {
	$full_name = $row['first_name'] . ' ' . $row['last_name'];
	printf( $formatstr, $row['client_id'], $full_name );
}

?>