<?php include 'head.php'; ?>

<div id="middle">
	<fieldset>
		<legend>Add Client</legend>
	
		<form action = "addclient_db.php" method = "post">
			<table class="silent">
				<tr>
					<th width="115">
						<label for="first_name">First Name:</label> 
					</th>
					<td width="180">
						<input class="full" type="text" name="first_name" />
					</td>
				</tr>
				<tr>
					<th width="115">
						<label for="last_name">Last Name:</label>
					</th>
					<td width="180">
						<input class="full" type="text" name="last_name" />
					</td>
				</tr>
				<tr>	
					<th width="115">	
						<label for="psu_id">PSU ID:</label>
					</th>
					<td width="180">	
						<input class="full" type="text" name="psu_id" />
					</td>
				</tr>
				<tr>	
					<th width="115">	
						<label for="phone">Phone:</label>
					</th>
					<td width="180">	
						<input class="full" type="text" name="phone" />
					</td>
				</tr>
				<tr>	
					<th width="115">	
						<label for="email">Email:</label>
					</th>
					<td width="180">	
						<input class="full" type="text" name="email" /> 
					</td>
				</tr>
			</table>

			<label for="notes">Notes:</label><br/>
			<textarea name = "notes" rows="5" cols="50" ></textarea>
		
			<table class="silent" align="right">
				<tr>
					<td width="80">
						<input class="full" type="submit" value="Add" />
					</td>
				</tr>
			</table>
			
			
		</form>
	</fieldset>
</div>

<?php include 'tail.php'; ?>
