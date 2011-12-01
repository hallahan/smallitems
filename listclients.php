<?php
include 'head.php';
include 'dbsetup.php';

$r = mysql_query( "SELECT * FROM client;" );
?>

<script type="text/javascript">
function searchClient( searchStr ) {
	// var searchStr = document.getElementById("clientsearch_txt").value;
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
	    document.getElementById("clients_tabledata").innerHTML=xmlhttp.responseText;
	  }
	}
	xmlhttp.open("GET","search/client_table.php?search="+searchStr,true);
	xmlhttp.send();
	
}
</script>


<body>


<div id="wrapper">
	<h1>Clients</h1>
<!-- 	<input type="text" name="client_search" onkeyup="searchClient(this.value)"/> -->
	
	<table class="i">
		<tr class="i">
			<th class="i">First Name</th>
			<th class="i">Last Name</th>
			<th class="i">PSU ID</th>
			<th class="i">Phone</th>
			<th class="i">Email</th>
			<th class="i">Notes</th>
		</tr>
		<div id="clients_tabledata">
			<?php
			$odd = 0;
			while( $row = mysql_fetch_array($r) ) {
			  $detail_url = "'detail_client.php?id=" . $row['client_id'] . "'";
			  echo '<tr onclick="document.location = ' . $detail_url . '"';
			  
				if ( ($odd % 2) == 1)
					echo ' class = "odd">';
				else
					echo ' class="i">';
				echo '<td class="i">' . $row['first_name'] . '</td>';
				echo '<td class="i">' . $row['last_name'] . '</td>';
				echo '<td class="i">' . $row['psu_id'] . '</td>';
				echo '<td class="i">' . $row['phone'] . '</td>';
				echo '<td class="i">' . $row['email'] . '</td>';
				echo '<td class="i">' . $row['notes'] . '</td>';
				echo '</tr>';
	
				$odd = $odd + 1;
			}
			?>
		</div>
	</table>
</div>
</body>
</html>
