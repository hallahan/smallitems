<?php 
include 'start.php';

$header_name = "Checkouts Due Today";

$checkout_query = 
"SELECT * 
FROM checkout 
JOIN client USING( client_id )
WHERE returned = 'NO' AND return_time >= CURDATE() AND return_time < DATE_ADD( CURDATE(), INTERVAL 1 DAY )
ORDER BY return_time;";

include 'history_table.php';

?>
