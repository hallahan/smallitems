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

$i_q = "SELECT *
        FROM item
        JOIN checkoutitem USING(item_id)
        WHERE checkoutitem.checkout_id = " . $esc . ";";

$res = mysql_query( $q );
$i_res = mysql_query( $i_q );

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

<ul>
	<?php 
	while( $i_row = mysql_fetch_array($i_res) ) { 
	  echo "<li>" . $i_row['name'] . "</li>";
	  if ($i_row['descr'])
	    echo "<ul><li>" . $i_row['descr'] . "</li></ul>";
	}
	?>
</ul>

<h2>Checkout</h2>
<table class="silent">
	<tr>
		<th>Checkout:</th>
		<td>
			<?php echo $row['checkout_time']; ?>
		</td>
	</tr>
	<tr>
		<th>Return:</th>
			<td>
			  <?php echo $row['return_time']; ?>
			</td>
	</tr>
	<tr>
		<th>Notes:</th>
			<td>
			  <?php echo $row[5]; ?>
			</td>
	</tr>
</table>

<br/>
<input type="button" onclick="del()" value="Check In"/>



</div>

<?php include 'tail.php'; ?>