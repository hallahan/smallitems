<?php
$local = false;

if ($local) {
	$con = mysql_connect("localhost","root","sempervirens");
	if (!$con)
	{
		die('could not connect to db: ' . mysql_error() );
	}
	
	mysql_select_db("hallahan",$con);
} else {
	$con = mysql_connect("db.cecs.pdx.edu","hallahan","sempervirens");
	if (!$con)
	{
		die('could not connect to db: ' . mysql_error() );
	}
	
	mysql_select_db("hallahan",$con);
}


?>
