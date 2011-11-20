<?php 

/*
REQUIRED VARS PRE SET:
  $checkout_query (string)
  $header_name    (string)
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



<body>

<?php include("menu.php"); ?>
<div id="wrapper">
	<table>
		<h1> <?php echo $header_name ?> </h1>
		
		<tr>
			<th scope="col">First Name</th>
			<th scope="col">Last Name</th>
			<th scope="col">Items</th>
			<th scope="col">Returned</th>
			<th scope="col">Checkout Time</th>
			<th scope="col">Return Time</th>
			<th scope="col">Notes</th>
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
	
			echo '<td>';
			//echo 'test';
	
			$coitems = itemsForCheckout( $row['checkout_id'] );
			while( $itemrow = mysql_fetch_array( $coitems ) )
			{
				echo $itemrow['name'] .  ' ' . $itemrow['type']  . '<br/>';
			}
	
			echo '</td>';
			
			echo '<td>' . $row['returned'] . '</td>';
			echo '<td>' . $row['checkout_time'] . '</td>';
			echo '<td>' . $row['return_time'] . '</td>';
			echo '<td>' . $row['notes'] . '</td>';
			echo '</tr>';

			$odd++;
		}
		?>
	
	</table>
</div>

</body>
</html>
