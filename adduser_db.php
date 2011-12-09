<?php
include 'dbsetup.php';
include 'head.php';
?>

<body>

<?php
include("menu.php");
?>
<div id="wrapper">
<h1>Small Items Checkout</h1>

<?php
$user_name = mysql_real_escape_string($_POST[user_name]);
$user_password = mysql_real_escape_string($_POST[user_password]);
$user_access = mysql_real_escape_string($_POST[user_access]);

// echo "TEST<br/>";
// echo $name . "<br/>";
// echo $descr;
// echo "ENDTEST<br/>";

$sql= "INSERT INTO user (user_name, user_password, user_access)
        VALUES ('$user_name', '$user_password', '$user_access' );";

if ( mysql_query($sql,$con) )
{
   echo '<h2>User Added</h2>';
}
else
{
  echo '<h2>FAILED</h2>';
  echo '<h3>Unable to add user to database!</h3>';
  echo '<p>Error: ' . mysql_error() . '</p>';
}

echo $_POST['user_name'] . " ";
echo $_POST['user_access'] . '<br />';

?>

</div>
</body>
</html>