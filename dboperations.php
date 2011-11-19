<?php

$con = mysql_connect("db.cecs.pdx.edu","hallahan","sempervirens");
if (!$con)
{
  die('could not connect to db: ' . mysql_error() );
}

mysql_select_db("hallahan",$con);

// STRINGS FOR QUERIES
$all_clients = "SELECT * FROM client;";
$all_items = "SELECT * FROM item;";
$all_checkouts = "SELECT * FROM checkout;";

function itemsForCheckout( $checkout_id )
{
  $q = "SELECT *
        FROM item
        JOIN checkoutitem USING(item_id)
        WHERE checkoutitem.checkout_id = " . $checkout_id . ";"
  return $q;
}

function printTable( $queryStr )
{
  $result = mysql_query( $queryStr );

  echo "<table>";
  $numCols = mysql_num_fields( $result );
  echo "<tr>";
  for ( $i = 0; $i < $numCols; $i++ )
  {
    echo "<th>" . mysql_field_name( $result, $i ) . "</th>";
  }
  echo "</tr>";

  $row = mysql_fetch_array( $result );
  for ( $i = 0; $i < $numCols; $i++ )
  {
    echo "<td>" . $row[i] . "</td>";
  }

  echo "</table>";
}

?>
