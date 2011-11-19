<?php

include 'dbsetup.php';

$r = mysql_query( "SELECT * FROM client;" );

?>

<html>
<body>
<h1>Small Items Checkout - Clients</h1>

<?php include("menu.php"); ?>

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
  while( $row = mysql_fetch_array($r) )
  {
    echo '<tr>';
    echo '<td>' . $row['first_name'] . '</td>';
    echo '<td>' . $row['last_name'] . '</td>';
    echo '<td>' . $row['psu_id'] . '</td>';
    echo '<td>' . $row['phone'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['notes'] . '</td>';
    echo '</tr>';
  }
  ?>

</table>


</body>
</html>
