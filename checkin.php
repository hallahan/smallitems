<?php 
include 'head.php'; 
include 'dbsetup.php';
?>

<div id="wrapper">
<h1>Check-in</h1>

<?php
$id=$_GET["id"];
$esc = mysql_real_escape_string( $id );

$sql=
"UPDATE checkout
SET 		returned='YES'
WHERE 	checkout_id = " . $esc . ";";

if ( mysql_query($sql,$con) )
{
echo '<h2>Check-in Complete!</h2>';
}
else
{
echo '<h2>FAILED</h2>';
  echo '<h3>Unable to check-in to the database!</h3>';
  echo '<p>Error: ' . mysql_error() . '</p>';
  echo 'SQL QUERY:<br/>';
  echo $sql . '<br/><br/>';
}

include 'tail.php';
?>