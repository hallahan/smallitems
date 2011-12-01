<?php include 'head.php'; ?>

<div id="wrapper">
<h1>Client Details</h1>

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
FROM client 
WHERE client_id=" . $esc . ";";

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

<br/>
<?php 
  $url = "'edit_client.php?id=" . $esc . "'";
  echo '<input type="button" onclick="document.location = ' .
          $url . '" value="Edit"/>';
?>

<h2>Client History</h2>
</div>
<?php 
$checkout_query =
"SELECT * 
FROM checkout 
JOIN client USING( client_id )
WHERE client_id = " . $esc .
" ORDER BY return_time;";

include 'history_table.php';
?>


<?php include 'tail.php'; ?>