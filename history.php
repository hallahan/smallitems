<?php 
include 'head.php';

$checkout_query = 
"SELECT * 
FROM checkout 
JOIN client USING( client_id ) 
ORDER BY checkout_time DESC;";
?>

<h1>Checkout History</h1>
<body>

<?php include 'history_table.php'; ?>
