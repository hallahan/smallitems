<?php

include 'dbsetup.php';

$r = mysql_query( "SELECT * FROM client;" );

include 'start.php';
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

<?php include("menu.php"); ?>

<div id="wrapper">
	<h1>Clients</h1>
	<input type="text" name="client_search" onkeyup="searchClient(this.value)"/>
	<table>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>PSU ID</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Notes</th>
		</tr>
		<div id="clients_tabledata">
			<?php
			$odd = 0;
			while( $row = mysql_fetch_array($r) )
			{
				if ( ($odd % 2) == 1)
					echo '<tr class = "odd">';
				else
					echo '<tr>';
				echo '<td>' . $row['first_name'] . '</td>';
				echo '<td>' . $row['last_name'] . '</td>';
				echo '<td>' . $row['psu_id'] . '</td>';
				echo '<td>' . $row['phone'] . '</td>';
				echo '<td>' . $row['email'] . '</td>';
				echo '<td>' . $row['notes'] . '</td>';
				echo '</tr>';
	
				$odd = $odd + 1;
			}
			?>
		</div>
	</table>
</div>
</body>
</html>
