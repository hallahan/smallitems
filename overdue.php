<?php 

$header_name = "Overdue Checkouts";

$checkout_query = 
"SELECT * 
FROM checkout 
JOIN client USING( client_id )
WHERE returned = 'NO' AND return_time < NOW()
ORDER BY return_time;";

include 'history_table.php';

?>
