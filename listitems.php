<?php

include 'dbsetup.php';

$r = mysql_query( "SELECT * FROM item ORDER BY name, type;" );

include 'start.php';
?>


<body>
<h1>Items</h1>

<?php include("menu.php"); ?>

<div id="wrapper">
	<table>
		<tr>
			<th>Name</th>
			<th>Type</th>
			<th>Description</th>
		</tr>
	
		<?php
		$odd = 0;
		while( $row = mysql_fetch_array($r) )
		{
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
	
	</table>
</div>

</body>
</html>
