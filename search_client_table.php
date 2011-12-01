<?php
$search_str=$_GET["search"];
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
?>

<table class="i">
	<tr class="i">
		<th class="i">First Name</th>
		<th class="i">Last Name</th>
		<th class="i">PSU ID</th>
		<th class="i">Phone</th>
		<th class="i">Email</th>
		<th class="i">Notes</th>
	</tr>
		<?php
		$odd = 0;
		while( $row = mysql_fetch_array($res) ) {
		  $detail_url = "'detail_client.php?id=" . $row['client_id'] . "'";
		  echo '<tr onclick="document.location = ' . $detail_url . '"';
		  
			if ( ($odd % 2) == 1)
				echo ' class = "odd">';
			else
				echo ' class="i">';
			echo '<td class="i">' . $row['first_name'] . '</td>';
			echo '<td class="i">' . $row['last_name'] . '</td>';
			echo '<td class="i">' . $row['psu_id'] . '</td>';
			echo '<td class="i">' . $row['phone'] . '</td>';
			echo '<td class="i">' . $row['email'] . '</td>';
			echo '<td class="i">' . $row['notes'] . '</td>';
			echo '</tr>';

			$odd = $odd + 1;
		}
		?>

</table>