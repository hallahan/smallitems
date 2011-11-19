<?php 

/*
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

<html>
<body>
<h1>Small Items Checkout - <?php $header_name ?> </h1>

<p>
<?php include("menu.php"); ?>
</p>

<table>
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Items</th>
    <th>Returned</th>
    <th>Checkout Time</th>
    <th>Return Time</th>
    <th>Notes</th>
  </tr>

  <?php 
  while( $row = mysql_fetch_array($r) )
  {
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
  }
  ?>

</table>


</body>
</html>
