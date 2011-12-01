<?php
include 'head.php';
include 'dbsetup.php';

$res = mysql_query( "SELECT * FROM item ORDER BY name, type;" );
?>

<script type="text/javascript">
function search( searchStr ) {
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
	    document.getElementById("item_table").innerHTML=xmlhttp.responseText;
	  }
	}
	xmlhttp.open("GET","search_item_table.php?search="+searchStr, true);
	xmlhttp.send();
	
}
</script>

<body>

<div id="wrapper">
	<h1>Items</h1>
	
	<div class="alignCenter">
		<input class = "tablesearch" type="text" name="search" onkeyup="search(this.value)" placeholder="Search items..." />
	</div>
	
	<br/>
	
	<div id="item_table">
  	<table class="i">
  		<tr class="i">
  			<th class="i">Name</th>
  			<th class="i">Type</th>
  			<th class="i">Description</th>
  		</tr>
  		
  			<?php
  			$odd = 0;
  			
  			while( $row = mysql_fetch_array($res) ) {
  			  $detail_url = "'detail_item.php?id=" . $row['item_id'] . "'";
  			  echo '<tr onclick="document.location = ' . $detail_url . '"';
  			  
  				if ( ($odd % 2) == 1) 
  					echo '<tr class = "odd">';
  				else
  					echo '<tr class="i">';
  				echo '<td class="i">' . $row['name'] . '</td>';
  				echo '<td class="i">' . $row['type'] . '</td>';
  				echo '<td class="i">' . $row['descr'] . '</td>';
  				echo '</tr>';
  				
  				$odd = $odd + 1;
  			}
  			?>
  	</table>
  </div>
</div>

<?php include 'tail.php'; ?>
