<?php
include 'head.php';
?>

<div id="middle">

<fieldset>
<legend>Add User</legend>
<form action="adduser_db.php" method="post">

<table class="silent">
	<tr>
		<th width="115">
			<label for="name">Username:</label> 
		</th>
		<td width="180">
			<input class = "full" type="text" name="user_name" /><br />
		</td>
	</tr>
	<tr>
		<th width="115">
			<label for="name">Password:</label> 
		</th>
		<td width="180">
			<input class = "full" type="password" name="user_password" /><br />
		</td>
	</tr>
	<tr>
		<th width="115">	
			<label for="type">User Access:</label>
		</th>
		<td width="180">
			<input type="radio" name="user_access" value="REG"/>Regular<br />
		</td>
	</tr>
	<tr>
		<td width="115"></td>
		<td width="180">
			<input type="radio" name="user_access" value="ADM"/>Administrator<br />
		</td>
	</tr>
	<tr>
		<td width="115"></td>
		<td width="180">
			<input type="radio" name="user_access" value="DEV"/>Developer<br />
		</td>
	</tr>
</table>

<table class="silent" align="right" >
<tr>
<td width="80">
<input type="submit" class="full" value="Add"/>
</td>
</tr>
</table>

</form>
</fieldset>

</div>

<?php include 'tail.php'; ?>