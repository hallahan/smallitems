<?php
include 'start.php';
$failed=false;
$failed = $_GET['failed'];
?>

<br/>
<div id="login-vert">
<div id="login-hori">
<fieldset>
<legend>Small Items</legend>
<form action="login_check.php" method="post">

<table class="silent">
<tr>
<th width="115">
	<label for="username">User:</label>
</th>
<td width="180">
	<input type="text" id="username" name="username"/>
</td>
</tr>
<tr>
<th width="115">
	<label for="password">Password:</label>
</th>
<td width="180">
	<input type="password" id="password" name="password"/>
</td>
</tr>
</table>

<table class="silent" align="right" >
<tr>
<?php 
if ( $failed == true )
  echo '<td width="180">login failed...</td>';
?>
<td width="80">
<input type="submit" class="full" value="Login"/>
</td>
</tr>
</table>
			
</form>
</fieldset>
</div>
</div>
<?php 
include 'tail.php';
?>