<?php 
$search_str=$_GET["search"];
$esc = mysql_real_escape_string( $search_str );

include 'start.php';

$header_name = "Checkout History";

$checkout_query = 
"SELECT * 
FROM checkout 
JOIN client USING( client_id ) 
WHERE first_name LIKE '%" . $esc . "%'
OR last_name LIKE '%" . $esc . "%'
OR psu_id LIKE '%" . $esc . "%'
OR phone LIKE '%" . $esc . "%'
OR email LIKE '%" . $esc . "%'
OR client.notes LIKE '%" . $esc . "%'
OR checkout.notes LIKE '%" . $esc . "%'
OR return_time LIKE '%" . $esc . "%'
OR checkout_time LIKE '%" . $esc . "%'
ORDER BY checkout_time DESC;";

include '../history_table.php';

?>