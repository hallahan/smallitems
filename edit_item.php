<?php
$id = $_GET['id'];
include 'head.php';
include 'dbsetup.php';

$esc = mysql_real_escape_string( $id );

$q=
"SELECT * FROM item 
WHERE item_id=" . $esc . ";";

$res = mysql_query( $q );
$row = mysql_fetch_array($res);
?>

<div id="middle">
	<fieldset>
		<legend>Edit Item</legend>
	
		<form action = "edit_item_db.php?id=<?php echo $esc; ?>" method = "post">
			<table class="silent">
				<tr>
					<td width="115">
						<label for="name">Name:</label> 
					</td>
					<td width="180">
						  <input class="full" type="text" name="name" value="<?php echo $row['name']; ?>" />
					</td>
				</tr>
				<tr>	
					<td width="115">	
						<label for="phone">Type:</label>
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

			<label for="descr">Description:</label><br/>
			<textarea name = "descr" rows="5" cols="50" ><?php echo $row['descr']; ?></textarea>
		
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