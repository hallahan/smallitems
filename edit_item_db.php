<?php
include 'dbsetup.php';
include 'head.php';
?>

<div id="wrapper">
<h1>Small Items Checkout</h1>

<?php

$esc_name   = mysql_real_escape_string( $_POST[name] );
$esc_type   = mysql_real_escape_string( $_POST[type] );
$esc_descr  = mysql_real_escape_string( $_POST[descr]);
$id         = mysql_real_escape_string( $_GET[id]    );

$sql= 
"UPDATE item 
SET 		name='$esc_name', 
    		type='$esc_type',
    		descr='$esc_descr' 
WHERE 	item_id = " . $id . ";";

if ( mysql_query($sql,$con) )
{
   echo '<h2>Item Edited</h2>';
}
else
{
  echo '<h2>FAILED</h2>';
  echo '<h3>Unable to edit item in database!</h3>';
  echo '<p>Error: ' . mysql_error() . '</p>';
  echo 'SQL QUERY:<br/>';
  echo $sql . '<br/><br/>';
}



echo 'Name: ' . $_POST[name] . "<br />";
echo 'Type: ' . $_POST[type] . '<br /><br />';
echo 'Description: ' . $_POST[descr] . '<br />';

?>

</div>
<?php include 'tail.php'; ?>


