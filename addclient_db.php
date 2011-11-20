<?php
include 'dbsetup.php';
include 'start.php';

?>
<html>
<body>
<?php
include("menu.php");
?>
<div id="wrapper">
<h1>Small Items Checkout</h1>

<?php


$sql= "INSERT INTO client (first_name, last_name, psu_id, phone, email, notes)
        VALUES ('$_POST[first_name]','$_POST[last_name]','$_POST[psu_id]',
                '$_POST[phone]','$_POST[email]','$_POST[notes]')";

if ( mysql_query($sql,$con) )
{
   echo '<h2>Client Added</h2>';
}
else
{
  echo '<h2>FAILED</h2>';
  echo '<h3>Unable to add client to database!</h3>';
  echo '<p>Error: ' . mysql_error() . '</p>';
}



echo $_POST[first_name] . " ";
echo $_POST[last_name] . '<br />';
echo $_POST[psu_id] . '<br />';
echo $_POST[phone] . '<br />';
echo $_POST[email] . '<br />';
echo $_POST[notes] . '<br />';
?>

</div>
</body>
</html>


