<?php include 'head.php'; ?>

<div id="wrapper">
<h1>Checkout Details</h1>

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

include 'dbsetup.php';

$esc = mysql_real_escape_string( $id );

$q=
"SELECT * 
FROM checkout 
JOIN client USING(client_id)
WHERE checkout_id=" . $esc . ";";

$res = mysql_query( $q );
$row = mysql_fetch_array($res);
?>


<h2>Client</h2>
<table class="silent">
	<tr>
		<th>Name:</th>
		<td>
			<?php echo $row['first_name'] . ' ' . $row['last_name']; ?>
		</td>
	</tr>
	<tr>
		<th>PSU ID:</th>
			<td>
			  <?php echo $row['psu_id']; ?>
			</td>
	</tr>
	<tr>
		<th>Phone:</th>
			<td>
			  <?php echo $row['phone']; ?>
			</td>
	</tr>
	<tr>
		<th>Email:</th>
		  <td><?php echo $row['email']; ?></td>
	</tr>
	<tr>
		<th>Notes:</th>
			<td><?php echo $row['notes']; ?></td>
	</tr>
</table>

<h2>Items</h2>

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

<?php include 'tail.php'; ?>