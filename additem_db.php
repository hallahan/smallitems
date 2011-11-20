<?php
include 'dbsetup.php';
include 'start.php';
?>


<body>
<div id="wrapper">

<?php
include("menu.php");
?>
<div id="wrapper">
<h1>Small Items Checkout</h1>

<?php

$sql= "INSERT INTO item (name, type, descr)
        VALUES ('$_POST[name]', '$_POST[type]', '$_POST[descr]' );";

if ( mysql_query($sql,$con) )
{
   echo '<h2>Item Added</h2>';
}
else
{
  echo '<h2>FAILED</h2>';
  echo '<h3>Unable to add item to database!</h3>';
  echo '<p>Error: ' . mysql_error() . '</p>';
}

echo $_POST[name] . " ";
echo $_POST[type] . '<br />';
echo $_POST[descr] . '<br />';

?>

</div>
</body>
</html>
