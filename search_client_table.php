
<?php
$search_str=$_GET["search"];
$formatstr = '<option value="%d" >%s</option>';

include 'dbsetup.php';

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
	
	
	
	
$odd = 0;
while( $row = mysql_fetch_array($res) )
{
	if ( ($odd % 2) == 1)
		echo '<tr class = "odd">';
	else
		echo '<tr>';
	echo '<td>' . $row['first_name'] . '</td>';
	echo '<td>' . $row['last_name'] . '</td>';
	echo '<td>' . $row['psu_id'] . '</td>';
	echo '<td>' . $row['phone'] . '</td>';
	echo '<td>' . $row['email'] . '</td>';
	echo '<td>' . $row['notes'] . '</td>';
	echo '</tr>';

	$odd = $odd + 1;
}


?>