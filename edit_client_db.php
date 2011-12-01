<?php
include 'dbsetup.php';
include 'head.php';
?>

<div id="wrapper">
<h1>Small Items Checkout</h1>

<?php

$esc_first_name   = mysql_real_escape_string( $_POST[first_name] );
$esc_last_name    = mysql_real_escape_string( $_POST[last_name]  );
$esc_psu_id       = mysql_real_escape_string( $_POST[psu_id]     );
$esc_phone        = mysql_real_escape_string( $_POST[phone]      );
$esc_email        = mysql_real_escape_string( $_POST[email]      );
$esc_notes        = mysql_real_escape_string( $_POST[notes]      );
$id               = mysql_real_escape_string( $_GET[id]          );

$sql= 
"UPDATE client 
SET 		first_name='$esc_first_name', last_name='$esc_last_name', psu_id='$esc_psu_id',
    		phone='$esc_phone', email='$esc_email', notes='$esc_notes'
WHERE 	client_id = " . $id . ";";

if ( mysql_query($sql,$con) )
{
   echo '<h2>Client Edited</h2>';
}
else
{
  echo '<h2>FAILED</h2>';
  echo '<h3>Unable to add client to database!</h3>';
  echo '<p>Error: ' . mysql_error() . '</p>';
  echo 'SQL QUERY:<br/>';
  echo $sql . '<br/><br/>';
}



echo 'First Name: ' . $_POST[first_name] . "<br />";
echo 'Last Name : ' . $_POST[last_name] . '<br />';
echo 'PSU ID    : ' . $_POST[psu_id] . '<br />';
echo 'Phone     : ' . $_POST[phone] . '<br />';
echo 'Email     : ' . $_POST[email] . '<br />';
echo 'Notes     : ' . $_POST[notes] . '<br />';
?>

</div>
<?php include 'tail.php'; ?>


