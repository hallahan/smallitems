<?php
$formatstr = '<option value="%d" >%s</option>';

include 'dbsetup.php';

$cr = mysql_query( "SELECT * FROM client ORDER BY last_name, first_name;" );
$ir = mysql_query( "SELECT * FROM item ORDER BY name, type;" );

?>

<script type="text/javascript">
function searchClient() {
	var searchStr = document.getElementById("clientsearch_txt").value;
	// var searchStr = "test";
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
	    document.getElementById("clientsearch_sel").innerHTML=xmlhttp.responseText;
	  }
	}
	xmlhttp.open("GET","search_client_select.php?search="+searchStr,true);
	xmlhttp.send();
}

function searchItem(  ) {
	var searchStr = document.getElementById("itemsearch_txt").value;
	// var searchStr = "test";
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
	    document.getElementById("itemsearch_sel").innerHTML=xmlhttp.responseText;
	  }
	}
	xmlhttp.open("GET","search_item_select.php?search="+searchStr,true);
	xmlhttp.send();
	
}

var client_id = null;
function selectClient(  ) {
	client_id = document.getElementById("clientsearch_sel").value;
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
	xmlhttp.open("GET","staging/client.php?id="+client_id,true);
	xmlhttp.send();
	
}

var notes = null;
var checkoutDate = null;
var returnDate = null;
var checkoutTime = null;
var returnTime = null;
function selectCheckout() {
	checkoutDate_mm = 	document.getElementById("comm").value;
	checkoutDate_dd = 	document.getElementById("codd").value;
	checkoutDate_yr = 	document.getElementById("coyr").value;
	checkoutTime_h = 		document.getElementById("cohh").value;
	checkoutTime_m = 		document.getElementById("com").value;
	returnDate_mm = 		document.getElementById("rtmm").value;
	returnDate_dd = 		document.getElementById("rtdd").value;
	returnDate_yr = 		document.getElementById("rtyr").value;
	returnTime_h = 			document.getElementById("rthh").value;
	returnTime_m = 			document.getElementById("rtm").value;
	notes = 						document.getElementById("notes").value;
	
	if (checkoutDate_mm == "") {
		alert("You must specify a checkout month.");
		return;
	}
	if (checkoutDate_dd  == "") {
		alert("You must specify a checkout day.");
		return;
	}
	if (checkoutDate_yr  == "") {
		alert("You must specify a checkout year.");
		return;
	}
	if (checkoutTime_h  == "") {
		alert("You must specify a checkout hour.");
		return;
	}
	if (checkoutTime_m  == "") {
		alert("You must specify a checkout minute.");
		return;
	}
	if (returnDate_mm  == "") {
		alert("You must specify a return month.");
		return;
	}
	if (returnDate_dd == "") {
		alert("You must specify a return day.");
		return;
	}
	if (returnDate_yr  == "") {
		alert("You must specify a return year.");
		return;
	}
	if (returnTime_h  == "") {
		alert("You must specify a return hour.");
		return;
	}
	if (returnTime_m  == "") {
		alert("You must specify a return minute.");
		return;
	}
	
	checkoutDate = checkoutDate_yr + '-' + checkoutDate_mm + '-' + checkoutDate_dd;
	returnDate   = returnDate_yr + '-' + returnDate_mm + '-' + returnDate_dd;
	checkoutTime = checkoutTime_h + ':' + checkoutTime_m;
	returnTime = returnTime_h + ':' + returnTime_m;
	
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
	    document.getElementById("staging_checkout").innerHTML=xmlhttp.responseText;
	  }
	}
	
	xmlhttp.open("GET","staging/checkout.php?checkout_date=" + checkoutDate +
								"&checkout_time=" + checkoutTime +
								"&return_date="+ returnDate+
								"&return_time=" + returnTime + 
								"&notes=" + notes, true);
								
	xmlhttp.send();
	
}

var items = new Array();

function selectItem() {
	item_id = document.getElementById("itemsearch_sel").value;
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
	    document.getElementById("staging_item").innerHTML=xmlhttp.responseText;
	  }
	}
	items.push(item_id);
	items_str = items.join("_");
	xmlhttp.open("GET","staging/item.php?id="+items_str,true);
	xmlhttp.send();
	
}

function clearItems() {
	items = new Array();

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
	    document.getElementById("staging_item").innerHTML=xmlhttp.responseText;
	  }
	}
	xmlhttp.open("GET","staging/item.php?clear=TRUE", true);
	xmlhttp.send();
}

function submitCheckout() {
	if (client_id == null) {
		alert("You must select a client.");
		return;
	} 
	if (items.length == 0) {
		alert("You must select at least 1 item.");
		return;
	}
	if (checkoutDate == null) {
		alert("You must specify a checkout date.");
		return;
	}
	if (returnDate == null) {
		alert("You must specify a return date.");
		return;
	}
	if (checkoutTime == null) {
		alert("You must specify a checkout time.");
		return;
	}
	if (returnTime == null){
		alert("You must specify a return time.");
		return;
	}
	window.location = './newcheckout_db.php?' +
										'client_id=' + client_id +
										'&items_str=' + items.join("_") +
										'&checkout_date=' + checkoutDate +
										'&return_date=' + returnDate +
										'&checkout_time=' + checkoutTime + 
										'&return_time=' + returnTime +
										'&notes=' + notes;
}

</script>


<div id="middle">
	<!-- <h1>New Checkout</h1> -->
<!-- 	<form action = "newcheckout_db.php" method = "post"> -->
		<fieldset>
			<legend>
				Client
			</legend>
			
			<input class="most" type="text" id="clientsearch_txt" name="search" onkeyup="searchClient()" placeholder="Search Clients" />
			
			<select class="most" id="clientsearch_sel" name="clients" size="10" >
				<?php
					while( $row = mysql_fetch_array($cr) ) {
						$full_name = $row['first_name'] . ' ' . $row['last_name'];
						printf( $formatstr, $row['client_id'], $full_name );
					}
				?>
			</select>
			
			<br/><br/>
			
			<table class="silent" align="right" >
				<tr>
					<td width="95">
					<input class="full" type="button" value="Add New Client" onclick="window.location='addclient.php'" />
					</td>
					<td width="95">
					<input class="full" type="button" value="Select" onclick="selectClient()" />
					</td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend>
				Item
			</legend>
			
				<input class="most" id="itemsearch_txt" type="text" name="searchclient" onkeyup="searchItem()" placeholder="Search Items" />
				
				<select class="most" id="itemsearch_sel" multiple name="items" size="10" >
					<?php
						while( $row = mysql_fetch_array($ir) ) {
							$item_name = $row['name'];
							$item_type = $row['type'];
							if ( $item_type ) {
								$item_name = $item_name . '(' . $item_type . ')';
							}
							printf( $formatstr, $row['item_id'], $item_name );
						}
					?>
				</select>
					
			<br/><br/>
			
			<table class="silent" align="right" >
				<tr>
					<td width="95">
					<input class="full" type="button" value="Add New Item" onclick="window.location='additem.php'" />
					</td>
					<td width="95">
					<input class="full" type="button" value="Clear" onclick="clearItems()" />
					</td>
					<td width="95">
					<input class="full" type="button" value="Add" onclick="selectItem()" />
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
					<th width="115"><label for="comm">Checkout Date:</label></th>
					<td width="180">
					<input type="text" class="w2em" id="comm" name="comm" value="" maxlength="2" placeholder="MM" />
					/
					<input type="text" class="w2em" id="codd" name="codd" value="" maxlength="2" placeholder="DD" />
					/
					<input type="text" class="w4em" id="coyr" name="coyr" value="" maxlength="4" placeholder="YYYY" />
					</td>
				</tr>
				<tr>
					<th width="115"><label for="cohh">Checkout Time:</label></th>
					<td width="180">
					<input type="text" class="w2em" id="cohh" name="cohh" value="" maxlength="2" placeholder="HH" />
					:
					<input type="text" class="w2em" id="com" name="comm" value="" maxlength="2" placeholder="MM" />
					</td>
				</tr>
				<tr>
					<th width="115"><label for="rtmm">Return Date:</label></th>
					<td width="180">
					<input type="text" class="w2em" id="rtmm" name="rtmm" value="" maxlength="2" placeholder="MM" />
					/
					<input type="text" class="w2em" id="rtdd" name="rtdd" value="" maxlength="2" placeholder="DD" />
					/
					<input type="text" class="w4em" id="rtyr" name="rtyr" value="" maxlength="4" placeholder="YYYY" />
					</td>
				</tr>
				<tr>
					<th width="115"><label for="rthh">Return Time:</label></th>
					<td width="180">
					<input type="text" class="w2em" id="rthh" name="rthh" value="" maxlength="2" placeholder="HH" />
					:
					<input type="text" class="w2em" id="rtm" name="rthh" value="" maxlength="2" placeholder="MM" />
					</td>
				</tr>
			</table>
			<h2>Notes:</h2>
			<textarea id="notes" rows="4" cols="55" placeholder="Details Regarding Checkout"></textarea>
			<table class="silent" align="right" >
				<tr>
					<td width="95">
					<input class="full" type="button" value="Clear"/>
					</td>
					<td width="95">
					<input class="full" type="button" onclick="selectCheckout()" value="Add"/>
					</td>
				</tr>
			</table>
		</fieldset>
<!-- 	</form> -->
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
