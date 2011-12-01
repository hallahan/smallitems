<?php 
include 'head.php';

$checkout_query = 
"SELECT * 
FROM checkout 
JOIN client USING( client_id )
WHERE returned = 'NO' AND return_time >= CURDATE() AND return_time < DATE_ADD( CURDATE(), INTERVAL 1 DAY )
ORDER BY return_time;";
?>

<h1>Checkouts Due Today</h1>
<body>

<?php include 'history_table.php'; ?>

