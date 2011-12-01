<?php 
$search_str=$_GET["search"];
include 'dbsetup.php';

if ( $search_str ) {
  $esc = mysql_real_escape_string( $search_str );
  
  $checkout_query =
  "SELECT * 
  FROM checkout 
  JOIN client USING( client_id ) 
  WHERE first_name LIKE '%" . $esc . "%'
  OR last_name LIKE '%" . $esc . "%'
  OR psu_id LIKE '%" . $esc . "%'
  OR phone LIKE '%" . $esc . "%'
  OR email LIKE '%" . $esc . "%'
  OR returned LIKE '%" . $esc . "%'
  OR client.notes LIKE '%" . $esc . "%'
  OR checkout.notes LIKE '%" . $esc . "%'
  OR return_time LIKE '%" . $esc . "%'
  OR checkout_time LIKE '%" . $esc . "%'
  ORDER BY return_time DESC;";
  
} else {
  $checkout_query =
  "SELECT * 
  FROM checkout 
  JOIN client USING( client_id ) 
  ORDER BY return_time DESC;";
}

$res = mysql_query( $checkout_query );

include 'history_table.php';
?>

