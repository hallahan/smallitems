<?php
//should take input and produce corresponding table rows and cells 

$search_str=$_GET["search"];
$formatstr = '<option value="%d" >%s</option>';


include 'dbsetup.php';


if($search_str) {
	$esc = mysql_real_escape_string( $search_str );

	$res = mysql_query( "SELECT * FROM item 
																WHERE name LIKE '%" . $esc . "%'" .
																" OR type LIKE '%" . $esc . "%'" .
																" OR descr LIKE '%" . $esc . "%'" .
																" ORDER BY name, type;" );
} else {
	$res = mysql_query( "SELECT * FROM item ORDER BY name, type;" );
		
}
	
$odd = 0;
while( $row = mysql_fetch_array($res) ) {
	if ( ($odd % 2) == 1) 
				echo '<tr class = "odd">';
			else
				echo '<tr>';
			echo '<td>' . $row['name'] . '</td>';
			echo '<td>' . $row['type'] . '</td>';
			echo '<td>' . $row['descr'] . '</td>';
			echo '</tr>';
			
			$odd = $odd + 1;
}

?>