<html>
<body>
<h1>PSU AV Small Items Checkout</h1>
<p>
<?php
$txt1="test";
$txt2="table";
echo $txt1 . " " . $txt2.'<br />';

$db = mysql_connect("db.cecs.pdx.edu","hallahan","hRf2k#py3s");
if (!$db)
  {
  echo "could not connect to db";
  die('Could not connect: ' . mysql_error());
  }


$seldb = mysql_select_db("hallahan",$db);
if (!$seldb)
{
  echo "could not select db";
}

$query = "SELECT * FROM test";
$result = mysql_query($query);
if (!$result)
{
  echo "could not execute query";
}



while($row = mysql_fetch_array($result)){

    // fetch current row

    echo $row['fname'].' '.$row['lname'].' '.$row['byear'].'<br />';

}

mysql_close($db);

?>
</p>
</body>
</html>
