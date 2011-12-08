<?php 
include 'dbsetup.php';

$username = mysql_real_escape_string($_POST['username']); 
$password = mysql_real_escape_string($_POST['password']);

$sql=
"SELECT * FROM user
WHERE user_name='" . $username .
"' AND user_password='" . $password .
"';";

$res = mysql_query($sql);
$count=mysql_num_rows($res);

if ( $count == 1 ) {
  session_start();
  $row = mysql_fetch_array($res);
  $access = $row['user_access'];
  $_SESSION['user_name'] = $username;
  $_SESSION['user_access'] = $access;
  $_SESSION['loggedin'] = "YES";
  header( 'location: history.php' );
} else {
  header( 'location: login.php?failed="true"' );
}

?>