<?php 
include 'head.php';

$checkout_query = 
"SELECT * 
FROM checkout 
JOIN client USING( client_id ) 
ORDER BY return_time DESC;";
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
	    document.getElementById("history_table").innerHTML=xmlhttp.responseText;
	  }
	}
	xmlhttp.open("GET","search_history_table.php?search="+searchStr, true);
	xmlhttp.send();
	
}
</script>

<body>
	<div id="wrapper">
    <h1>Checkout History</h1>
    <div class="alignCenter">
    	<input class = "tablesearch" type="text" name="search" onkeyup="search(this.value)" placeholder="Search checkout history..." />
    </div>
    <br/>
  </div>
  
<div id="history_table">
<?php include 'history_table.php'; ?>
</div>
