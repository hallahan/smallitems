<?php 
include 'head.php';

$checkout_query = 
"SELECT * 
FROM checkout 
JOIN client USING( client_id )
WHERE returned = 'NO' AND return_time < NOW()
ORDER BY return_time;";
?>

<h1>Overdue Checkouts</h1>
<body>

<?php include 'history_table.php'; ?>

