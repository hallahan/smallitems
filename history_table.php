<?php 

/*
REQUIRED VARS PRE SET:
  $checkout_query (string)
This is a macro file of sorts. For this to work, define the string
$checkout_query with a query selecting * from checkout joined with client.
eg:
$checkout_query = "SELECT * FROM checkout JOIN client USING( client_id ) ORDER BY checkout_time DESC;";

That will give you the complete history of all checkouts in the database.

*/

include 'dbsetup.php';


function itemsForCheckout( $checkout_id )
{
  $q = "SELECT *
        FROM item
        JOIN checkoutitem USING(item_id)
        WHERE checkoutitem.checkout_id = " . $checkout_id . ";";
  $qres = mysql_query( $q );
  return $qres;
}

$r = mysql_query( $checkout_query );

?>

<div id="wrapper">
	<table class="i">
		
		<tr class="i">
			<th class="i" scope="col">First Name</th>
			<th class="i" scope="col">Last Name</th>
			<th class="i" scope="col">Items</th>
			<th class="i" scope="col">Returned</th>
			<th class="i" scope="col">Checkout Time</th>
			<th class="i" scope="col">Return Time</th>
			<th class="i" scope="col">Notes</th>
		</tr>
	
		<?php 
 		$odd = 0;
		while( $row = mysql_fetch_array($r) )
		{
		  $detail_url = "'detail_checkout.php?id=" . $row['checkout_id'] . "'";
		  echo '<tr onclick="document.location = ' . $detail_url . '"';
			if ( ($odd % 2) == 1) 
				echo ' class = "odd">';
			else
				echo ' class="i">';
				
			echo '<td class="i">' . $row['first_name'] . '</td>';
			echo '<td class="i">' . $row['last_name'] . '</td>';
	
			echo '<td class="i">';
			//echo 'test';
	
			$coitems = itemsForCheckout( $row['checkout_id'] );
			while( $itemrow = mysql_fetch_array( $coitems ) )
			{
				echo $itemrow['name'] .  ' ' . $itemrow['type']  . '<br/>';
			}
	
			echo '</td>';
			
			echo '<td class="i">' . $row['returned'] . '</td>';
			echo '<td class="i">' . $row['checkout_time'] . '</td>';
			echo '<td class="i">' . $row['return_time'] . '</td>';
			echo '<td class="i">' . $row[5] . '</td>';
			echo '</tr>';
			$odd++;
		}
		?>
	
	</table>
</div>

</body>
</html>
