<?php

include 'dbsetup.php';

$r = mysql_query( "SELECT * FROM item ORDER BY name, type;" );

include 'start.php';
?>
<body>
<h1>Items</h1>

<?php include("menu.php"); ?>

<div id="wrapper">
	<table class="i">
		<tr class="i">
			<th class="i">Name</th>
			<th class="i">Type</th>
			<th class="i">Description</th>
		</tr>
		<div id="item_tabledata">
			<?php
			$odd = 0;
			
			while( $row = mysql_fetch_array($r) )
			{
				if ( ($odd % 2) == 1) 
					echo '<tr class = "odd">';
				else
					echo '<tr class="i">';
				echo '<td class="i">' . $row['name'] . '</td>';
				echo '<td class="i">' . $row['type'] . '</td>';
				echo '<td class="i">' . $row['descr'] . '</td>';
				echo '</tr>';
				
				$odd = $odd + 1;
			}
			?>
		</div>
	</table>
</div>

</body>
</html>
