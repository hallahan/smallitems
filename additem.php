<html>
<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

<link href="style.css" rel="stylesheet" type="text/css" />

<style type="text/css"></style>
<title>Small Items Checkout</title>
</head>
<body>

<?php include("menu.php"); ?>

<div id="middle">
	<fieldset>
		<legend>Add Item</legend>
	
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
			<label for="name">Description:</label> 
			<textarea id="descr" rows="4" cols="45" ></textarea>
			<input type="submit" value="Add" />
		</form>
</div>
</body>
</html>
