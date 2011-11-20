<?php

include 'dbsetup.php';

$r = mysql_query( "SELECT * FROM client;" );

include 'start.php';
?>


<body>

<?php include("menu.php"); ?>

<div id="wrapper">
	<h1>Clients</h1>
	<table>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>PSU ID</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Notes</th>
		</tr>
	
		<?php
		$odd = 0;
		while( $row = mysql_fetch_array($r) )
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
	
	</table>
</div>
</body>
</html>
