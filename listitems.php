<?php

include 'dbsetup.php';

$r = mysql_query( "SELECT * FROM item ORDER BY name, type;" );

?>

<html>
<body>
<h1>Small Items Checkout - Items</h1>

<?php include("menu.php"); ?>

<table>
  <tr>
    <th>Name</th>
    <th>Type</th>
    <th>Description</th>
  </tr>

  <?php
  while( $row = mysql_fetch_array($r) )
  {
    echo '<tr>';
    echo '<td>' . $row['name'] . '</td>';
    echo '<td>' . $row['type'] . '</td>';
    echo '<td>' . $row['descr'] . '</td>';
    echo '</tr>';
  }
  ?>

</table>


</body>
</html>
