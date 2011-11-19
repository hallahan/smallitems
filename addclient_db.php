<?php
include 'dbsetup.php';
?>
<html>
<body>
<h1>Small Items Checkout - Client Added</h1>
<?php
  
echo $_POST[first_name] . '<br />';
echo $_POST[last_name] . '<br />';
echo $_POST[psu_id] . '<br />';
echo $_POST[phone] . '<br />';
echo $_POST[email] . '<br />';
echo $_POST[notes] . '<br />';

?>
</body>
</html>

<?php

$sql= "INSERT INTO client (first_name, last_name, psu_id, phone, email, notes)
VALUES ('$_POST[first_name]','$_POST[last_name]','$_POST[psu_id]','$_POST[phone]','$_POST[email],'$_POST[notes]')";

if ( mysql_query($sql,$con) )
{
  
}
else
{

}

?>
