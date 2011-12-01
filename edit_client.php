<?php
$id = $_GET['id'];
include 'head.php';
include 'dbsetup.php';

$esc = mysql_real_escape_string( $id );

$q=
"SELECT * FROM client 
WHERE client_id=" . $esc . ";";

$res = mysql_query( $q );
$row = mysql_fetch_array($res);
?>

<div id="middle">
	<fieldset>
		<legend>Edit Client</legend>
	
		<form action = "edit_client_db.php?id=<?php echo $esc; ?>" method = "post">
			<table class="silent">
				<tr>
					<td width="115">
						<label for="first_name">First Name:</label> 
					</td>
					<td width="180">
						  <input class="full" type="text" name="first_name" value="<?php echo $row['first_name']; ?>" />
					</td>
				</tr>
				<tr>
					<td width="115">
						<label for="last_name">Last Name:</label>
					</td>
					<td width="180">
						<input class="full" type="text" name="last_name" value="<?php echo $row['last_name']; ?>" />
					</td>
				</tr>
				<tr>	
					<td width="115">	
						<label for="psu_id">PSU ID:</label>
					</td>
					<td width="180">	
						<input class="full" type="text" name="psu_id" value="<?php echo $row['psu_id']; ?>" />
					</td>
				</tr>
				<tr>	
					<td width="115">	
						<label for="phone">Phone:</label>
					</td>
					<td width="180">	
						<input class="full" type="text" name="phone" value="<?php echo $row['phone']; ?>" />
					</td>
				</tr>
				<tr>	
					<td width="115">	
						<label for="email">Email:</label>
					</td>
					<td width="180">	
						<input class="full" type="text" name="email" value="<?php echo $row['email']; ?>" />
					</td>
				</tr>
			</table>

			<label for="notes">Notes:</label><br/>
			<textarea name = "notes" rows="5" cols="50" ><?php echo $row['notes']; ?></textarea>
		
			<table class="silent" align="right">
				<tr>
					<td width="80">
						<input class="full" type="submit" value="Submit" />
					</td>
				</tr>
			</table>
			
			
		</form>
	</fieldset>
</div>