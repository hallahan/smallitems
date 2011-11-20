<?php
include 'start.php'
?>

<body>

<h1>Small Items Checkout - Add Item</h1>

<?php include("menu.php"); ?>

<div id="wrapper">
	<form action = "additem_db.php" method = "post">
		<label for="name">Name:</label> 
			<input type="text" name="name" /><br />
		<label for="type">Type (optional):</label>
			<input type="radio" name="type" value="TYPE 1"/>TYPE 1<br />
			<input type="radio" name="type" value="TYPE 2"/>TYPE 2<br />
			<input type="radio" name="type" value="TYPE 3"/>TYPE 3<br />
			<input type="radio" name="type" value="TYPE 4"/>TYPE 4<br />
			<input type="radio" name="type" value="TYPE 5"/>TYPE 5<br />
			<input type="radio" name="type" value="TYPE 6"/>TYPE 6<br />
		<label for="descr">Description:</label>
			<textarea name = "descr" rows="5" cols="50" ></textarea><br/>
		<input type="submit" value="Add" />
	</form>
</div>
</body>
</html>
