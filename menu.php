<div id="menu">
	<fieldset>
		<legend>Small Items</legend>
		<a href="newcheckout.php">New Checkout</a><br/>
		<a href="history.php">Checkout History</a><br/>
		<a href="overdue.php">Overdue</a><br/>
		<a href="duetoday.php">Due Today</a><br/>
		<a href="listclients.php">List Clients</a><br/>
		<a href="listitems.php">List Items</a><br/>
		<a href="addclient.php">Add Client</a><br/>
		<a href="additem.php">Add Item</a><br/>
<?php 
  if ( $_SESSION['user_access'] == 'DEV' || $_SESSION['user_access'] == 'ADM' ) {
    echo '<a href="adduser.php">Add User</a><br/>';
  }
?>
		<a href="logout.php">Logout</a>

	</fieldset>
	<br/>

</div>
