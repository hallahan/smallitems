<html>
<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

<link href="style.css" rel="stylesheet" type="text/css" />

<script src="./datepicker/datepicker.js"></script>
<link href="./datepicker/datepicker.css" rel="stylesheet" type="text/css" />

<style type="text/css"></style>
<title>Small Items Checkout</title>
</head>
<body>

<?php include("menu.php"); ?>

<div id="middle">
	<fieldset>
		<legend>Add Client</legend>
	
		<form action = "addclient_db.php" method = "post">
			<table class="silent">
				<tr>
					<td width="115">
						<label for="first_name">First Name:</label> 
					</td>
					<td width="180">
						<input type="text" name="first_name" />
					</td>
				</tr>
				<tr>
					<td width="115">
						<label for="last_name">Last Name:</label>
					</td>
					<td width="180">
						<input type="text" name="last_name" />
					</td>
				</tr>
				<tr>	
					<td width="115">	
						<label for="psu_id">PSU ID:</label>
					</td>
					<td width="180">	
						<input type="text" name="psu_id" />
					</td>
				</tr>
				<tr>	
					<td width="115">	
						<label for="phone">Phone:</label>
					</td>
					<td width="180">	
						<input type="text" name="phone" />
					</td>
				</tr>
				<tr>	
					<td width="115">	
						<label for="email">Email:</label>
					</td>
					<td width="180">	
						<input type="text" name="email" /> 
					</td>
				</tr>
			</table>

			<label for="notes">Notes:</label><br/>
			<textarea name = "notes" rows="5" cols="50" ></textarea>
		
			<table class="silent" align="right">
				<tr>
					<td width="80">
						<input type="submit" value="Add" />
					</td>
				</tr>
			</table>
			
			
		</form>
	</fieldset>
</div>
</body>
</html>
