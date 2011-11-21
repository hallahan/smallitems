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
		<legend>Add Client</legend>
	
		<form action = "additem_db.php" method = "post">
			<table class="silent">
				<tr>
					<td width="115">
						<label for="name">Name:</label> 
					</td>
					<td width="180">
						<input type="text" name="name" /><br />
					</td>
				</tr>
				<tr>
					<td width="115">	
						<label for="type">Type (optional):</label>
					</td>
					<td width="180">
						<input type="radio" name="type" value="TYPE 1"/>TYPE 1<br />
					</td>
				</tr>
				<tr>
					<td width="115"></td>
					<td width="180">
						<input type="radio" name="type" value="TYPE 2"/>TYPE 2<br />
					</td>
				</tr>
				<tr>
					<td width="115"></td>
					<td width="180">
						<input type="radio" name="type" value="TYPE 3"/>TYPE 3<br />
					</td>
				</tr>
				<tr>
					<td width="115"></td>
					<td width="180">
						<input type="radio" name="type" value="TYPE 4"/>TYPE 4<br />
					</td>
				</tr>
				<tr>
					<td width="115"></td>
					<td width="180">
						<input type="radio" name="type" value="TYPE 5"/>TYPE 5<br />
					</td>
				</tr>
				<tr>
					<td width="115"></td>
					<td width="180">
						<input type="radio" name="type" value="TYPE 6"/>TYPE 6<br />
					</td>
				</tr>
			</table>				
					
			<table class="silent" align="right">
				<tr>
					<td width="80">
						<input type="submit" value="Add" />
					</td>
				</tr>
			</table>
			
		</form>
</div>
</body>
</html>
