<?php 

$checkout_query = "SELECT * FROM checkout JOIN client USING( client_id ) ORDER BY checkout_time DESC;";

include 'history_table.php';

?>
