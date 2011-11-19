<?php 

include 'dbsetup.php';

$checkout_query = "SELECT * FROM checkout JOIN client USING( client_id )";

function itemsForCheckout( $checkout_id )
{
  $q = "SELECT name, count(name)
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
<h1>Small Items Checkout - Checkout History</h1>

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
      echo $itemrow['name'] . '(' . $itemrow['count(name)'] . ')' . '<br/>';
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
