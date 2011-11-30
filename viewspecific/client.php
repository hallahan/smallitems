<html>
<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css"></style>
<title>Small Items Checkout</title>
</head>

<script>
	function editClient() {
		window.location = "../edit/client.php?id=" + id;
	}
	
	function deleteClient() {
		window.location = "../delete/client.php?id=" + id;
	}
	
</script>

<body>
<?php include("menu.php"); ?>
<div="middle">
<fieldset>
<legend>Client Details</legend>

<?php
$id=$_GET["id"];
$formatstr = 
'Name: %s<br/>
PSU ID: %s<br/>
Phone: %s<br/>
Email: %s
Notes:
<p class="small">
	%s
</p>';

include 'dbsetup.php';

$esc = mysql_real_escape_string( $id );

$q=
"SELECT * FROM client 
WHERE client_id=" . $esc . ";";

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
		<input class="full" type="button" onclick="deleteClient()" value="Delete"/>
		</td>
		<td width="95">
		<input class="full" type="button" onclick="editClient()" value="Edit"/>
		</td>
	</tr>
</table>

</fieldset>
</div>
</body>
</html>