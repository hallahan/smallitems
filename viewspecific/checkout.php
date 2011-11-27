<html>
<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css"></style>
<title>Small Items Checkout</title>
</head>

<script>
	function edit() {
		window.location = "../edit/checkout.php?id=" + id;
	}
	
	function del() {
		window.location = "../delete/checkout.php?id=" + id;
	}
	
</script>

<body>
<?php include("menu.php"); ?>
<div="middle">
<fieldset>
<legend>Checkout Details</legend>

<?php
$id=$_GET["id"];
$formatstr = 
'Client: %s<br/>
Checkout Date/Time: %s<br/>
Return Date/Time: %s<br/>
Notes:
<p class="small">
	%s
</p>
<h3>Items</h3>';

$con = mysql_connect("db.cecs.pdx.edu","hallahan","sempervirens");
if (!$con){die('could not connect to db: ' . mysql_error() );}
mysql_select_db("hallahan",$con);

$esc = mysql_real_escape_string( $id );

$q=
"SELECT * FROM checkout 
JOIN client USING(client_id)
WHERE checkout_id=" . $esc . ";";

$res = mysql_query( $q );

while( $row = mysql_fetch_array($res) ) {
	$full_name = $row['first_name'] . ' ' . $row['last_name'];
	printf( $formatstr, $full_name, $row['psu_id'], 
					$row['phone'], $row['email'], $row['notes'] );
}

?>
<table class="silent" align="right" >
	<tr>
		<td width="95">
		<input class="full" type="button" onclick="del()" value="Delete"/>
		</td>
		<td width="95">
		<input class="full" type="button" onclick="edit()" value="Edit"/>
		</td>
	</tr>
</table>

</fieldset>
</div>
</body>
</html>