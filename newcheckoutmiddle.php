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
	checkoutDate = 	document.getElementById("datepicker").value;

	checkoutTime_h = 		document.getElementById("cohh").value;
	checkoutTime_m = 		document.getElementById("com").value;
	returnDate = 		document.getElementById("datepicker_return").value;

	returnTime_h = 			document.getElementById("rthh").value;
	returnTime_m = 			document.getElementById("rtm").value;
	notes = 						document.getElementById("notes").value;
	
	if (checkoutDate == "") {
		alert("You must specify a checkout date.");
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
	if (returnDate  == "") {
		alert("You must specify a return date.");
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
			
			<input class="most" type="text" id="clientsearch_txt" name="search" onkeyup="searchClient()" placeholder="Search clients..." />
			
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
					<td width="100">
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
			
				<input class="most" id="itemsearch_txt" type="text" name="searchclient" onkeyup="searchItem()" placeholder="Search items..." />
				
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
			
			<table class="silent" id="both_times" >
				<tr>
					<th width="115"><label for="cohh">Checkout Date:</label></th>
					<td width="180">
						<input type="text" class="w8em" id="datepicker" name="datepicker" value="" maxlength="10" placeholder="YYYY-MM-DD" />
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
					<th width="115"><label for="cohh">Return Date:</label></th>
					<td width="180">
						<input type="text" class="w8em" id="datepicker_return" name="datepicker_return" value="" maxlength="10" placeholder="YYYY-MM-DD" />
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
			<textarea id="notes" rows="4" cols="45" placeholder="Details Regarding Checkout"></textarea>
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
