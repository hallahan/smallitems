<?php
include 'start.php'
?>

<body>

<?php include("menu.php"); ?>

<div id="wrapper">
	<h1>Add Client</h1>
	
	
	<form action = "addclient_db.php" method = "post">
		<label for="first_name">First Name:</label> 
			<input type="text" name="first_name" /><br class="clear"/>
		<label for="last_name">Last Name:</label>
			<input type="text" name="last_name" /><br class="clear"/>
		<label for="psu_id">PSU ID:</label>
			<input type="text" name="psu_id" /><br class="clear"/>
		<label for="phone">Phone:</label>
			<input type="text" name="phone" /><br class="clear"/>
		<label for="email">Email:</label>
			<input type="text" name="email" /> <br class="clear"/>
		<label for="notes">Notes:</label>
			<textarea name = "notes" rows="5" cols="50" ></textarea><br class="clear"/>
		<input type="submit" value="Add" />
	</form>
</div>
</body>
</html>
