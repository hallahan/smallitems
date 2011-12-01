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
?>

<table class="i">
	<tr class="i">
		<th class="i">Name</th>
		<th class="i">Type</th>
		<th class="i">Description</th>

	</tr>
		<?php
		$odd = 0;
		while( $row = mysql_fetch_array($res) ) {
		  $detail_url = "'detail_item.php?id=" . $row['item_id'] . "'";
		  echo '<tr onclick="document.location = ' . $detail_url . '"';
		  
			if ( ($odd % 2) == 1)
				echo ' class = "odd">';
			else
				echo ' class="i">';
			echo '<td class="i">' . $row['name'] . '</td>';
			echo '<td class="i">' . $row['type'] . '</td>';
			echo '<td class="i">' . $row['descr'] . '</td>';
			echo '</tr>';

			$odd = $odd + 1;
		}
		?>

</table>