<?php
$formatstr = '<option value="%d" >%s</option>';

$con = mysql_connect("db.cecs.pdx.edu","hallahan","sempervirens");
if (!$con){die('could not connect to db: ' . mysql_error() );}

mysql_select_db("hallahan",$con);

$cr = mysql_query( "SELECT * FROM client ORDER BY last_name, first_name;" );
$ir = mysql_query( "SELECT * FROM item ORDER BY name, type;" );

?>

<script type="text/javascript">
function searchClient() {
	
	var xmlhttp;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange=function()
	{
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	  {
	    document.getElementById("staging_client").innerHTML=xmlhttp.responseText;
	  }
	}
	xmlhttp.open("GET","ajaxtest.txt",true);
	xmlhttp.send();
	
}

</script>
<div id="middle">
	<!-- <h1>New Checkout</h1> -->
	<form action = "newcheckout_db.php" method = "post">
		<fieldset>
			<legend>
				Client
			</legend>
			<table class="silent">
				<tr>
					<td width="300">
					<input type="text" name="searchclient" />
					</td>
					<td width="95">
					<input id = "clientserach" type="button" value="Search"/>
					</td>
				</tr>
				<tr>
					<td width="300">
					<select name="clients" size="10" >
					
						<?php
							while( $row = mysql_fetch_array($cr) ) {
								$full_name = $row['first_name'] . ' ' . $row['last_name'];
								printf( $formatstr, $row['client_id'], $full_name );
							}
						?>
						

					</select></td>
					<td width="95">
					<input type="button" value="Add New Client" />
					</td>
				</tr>
			</table>
			<br/>
			<table class="silent" align="right" >
				<tr>
					<td width="95">
					<input type="button" value="Select"/>
					</td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend>
				Item
			</legend>
			<table class="silent">
				<tr>
					<td width="300">
					<input type="text" name="searchclient" />
					</td>
					<td width="95">
					<input type="button" value="Search"/>
					</td>
				</tr>
				<tr>
					<td width="300">
					<select multiple name="items" size="10" >
						<?php
							while( $row = mysql_fetch_array($ir) ) {
								$item_name = $row['name'];
								$item_type = $row['type'];
								if ( $item_type ) {
									$item_name = $item_name . '(' . $item_type . ')';
								}
								printf( $formatstr, $row['client_id'], $item_name );
							}
						?>
					</select></td>
					<td width="95">
					<input type="button" value="Add New Item" />
					</td>
				</tr>
			</table>
			<br/>
			<table class="silent" align="right" >
				<tr>
					<td width="95">
					<input type="button" value="Clear"/>
					</td>
					<td width="95">
					<input type="button" value="Add"/>
					</td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend>
				Time/Details
			</legend>
			<!-- Checkout Date -->
			<table class="silent">
				<tr>
					<td width="115"><label for="comm">Checkout Date:</label></td>
					<td width="180">
					<input type="text" class="w2em" id="comm" name="comm" value="" maxlength="2" placeholder="MM" />
					/
					<input type="text" class="w2em" id="codd" name="codd" value="" maxlength="2" placeholder="DD" />
					/
					<input type="text" class="w4em" id="coyr" name="coyr" value="" maxlength="4" placeholder="YYYY" />
					</td>
				</tr>
				<tr>
					<td width="115"><label for="cohh">Checkout Time:</label></td>
					<td width="180">
					<input type="text" class="w2em" id="cohh" name="cohh" value="" maxlength="2" placeholder="HH" />
					:
					<input type="text" class="w2em" id="comm" name="comm" value="" maxlength="2" placeholder="MM" />
					</td>
				</tr>
				<tr>
					<td width="115"><label for="rtmm">Return Date:</label></td>
					<td width="180">
					<input type="text" class="w2em" id="rtmm" name="rtmm" value="" maxlength="2" placeholder="MM" />
					/
					<input type="text" class="w2em" id="rtdd" name="rtdd" value="" maxlength="2" placeholder="DD" />
					/
					<input type="text" class="w4em" id="rtyr" name="rtyr" value="" maxlength="4" placeholder="YYYY" />
					</td>
				</tr>
				<tr>
					<td width="115"><label for="rthh">Return Time:</label></td>
					<td width="180">
					<input type="text" class="w2em" id="rthh" name="rthh" value="" maxlength="2" placeholder="HH" />
					:
					<input type="text" class="w2em" id="rtmm" name="rthh" value="" maxlength="2" placeholder="MM" />
					</td>
				</tr>
			</table>
			<label for="comments">Comments:</label>
			<textarea rows="4" cols="45" placeholder:"Details Regarding Checkout"></textarea>
			<table class="silent" align="right" >
				<tr>
					<td width="95">
					<input type="button" value="Clear"/>
					</td>
					<td width="95">
					<input type="button" value="Add"/>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
	<p>
		&nbsp;
	</p>
</div>


<script>
	datePickerController.createDatePicker({
		// Associate the three text inputs to their date parts
		formElements : {
			"coyr" : "%Y",
			"comm" : "%m",
			"codd" : "%d"
		},
		// Show the week numbers
		showWeeks : true,
		// Set a statusbar format
		statusFormat : "%l, %F %d %Y",
		// Fill the entire grid with dates
		fillGrid : true,
		// Enable the selection of dates not within the current month
		// but rendered within the grid (as we used fillGrid:true)
		constrainSelection : false
	});

</script>
<script>
	datePickerController.createDatePicker({
		// Associate the three text inputs to their date parts
		formElements : {
			"rtyr" : "%Y",
			"rtmm" : "%m",
			"rtdd" : "%d"
		},
		// Show the week numbers
		showWeeks : true,
		// Set a statusbar format
		statusFormat : "%l, %F %d %Y",
		// Fill the entire grid with dates
		fillGrid : true,
		// Enable the selection of dates not within the current month
		// but rendered within the grid (as we used fillGrid:true)
		constrainSelection : false
	});

</script>
