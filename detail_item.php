<?php 
include 'head.php'; 
include 'dbsetup.php';
?>

<div id="wrapper">
<h1>Item Details</h1>

<?php
$id=$_GET["id"];

$esc = mysql_real_escape_string( $id );

$q=
"SELECT * 
FROM item 
WHERE item_id=" . $esc . ";";

$res = mysql_query( $q );

$row = mysql_fetch_array($res);
?>


<h2>Item</h2>
<table class="silent">
	<tr>
		<th>Name:</th>
		<td>
			<?php echo $row['name']; ?>
		</td>
	</tr>
	<tr>
		<th>Type:</th>
			<td>
			  <?php echo $row['type']; ?>
			</td>
	</tr>
	<tr>
		<th>Description:</th>
			<td>
			  <?php echo $row['descr']; ?>
			</td>
	</tr>

</table>

<br/>
<?php 
  $url = "'edit_item.php?id=" . $esc . "'";
  echo '<input type="button" onclick="document.location = ' .
          $url . '" value="Edit"/>';
?>



<?php include 'tail.php'; ?>