<?php

include 'dbsetup.php';

//returns a list of tuples ('client_id','client_name')
 function get_all_clients_list()
 {
 	$clients_query = "SELECT * FROM client ORDER BY last_name, first_name;";
 	$clients_res = mysql_query( $clients_query );
 	
 	$clients = array();
 	while( $client_row = mysql_fetch_array( $clients_res ) )
 	{
 		$id_name_tuple = array();
  	$client_id = $client_row['client_id'];
  	$client_name = $client_row['first_name'] . ' ' . $client_row['last_name'];
 		$id_name_tuple['client_id'] = $client_id;
 		$id_name_tuple['client_name'] = $client_name;
 		array_push( $clients, $id_name_tuple );
 	}
 	return $clients;
 }
 
function get_all_clients_query() {
	$clients_query = "SELECT * FROM client ORDER BY last_name, first_name;";
 	$clients_res = mysql_query( $clients_query );
 	return $clients_res;
}

function get_all_items_list( )
{
 	$query = "SELECT * FROM item ORDER BY name, type;";
 	$res = mysql_query( $query );
 	
 	$items = array();
 	while( $row = mysql_fetch_array( $res ) )
 	{
 		$id_name_tuple = array();
  	$id = $row['item_id'];
  	if ( $row['type'] )
  		$name = $row['name'] . ' (' . $row['type'] . ')';
  	else
  		$name = $row['name'];
 		$id_name_tuple['id'] = $id;
 		$id_name_tuple['name'] = $name;
 		array_push( $items, $id_name_tuple );
 	}
 	return $items;
 }
 
function get_all_items_query() {
	$query = "SELECT * FROM item ORDER BY name, type;";
 	$res = mysql_query( $query );
 	return $res;
}
 
 
//TODO not finished
// function search_clients_list( $search_string )
// {
// 	$esc_search = mysql_real_escape_string ( $search_string );
// 	
// 	$clients_query = "SELECT * FROM client ORDER BY last_name, first_name;"
// 	$clients_res = mysql_query( $clients_query );
// 	$client_names = array();
// 	while( $client_row = mysql_fetch_array( $clients_res ) )
// 	{
// 		$client_name = $client_row['first_name'] . ' ' . $client_row['last_name'];
// 		$client_names.push( $client_name );
// 	}
// 	return $client_names;
// }

//TODO not finished
// function search_items_list( $search_string )
// {
// 	$items_query = "SELECT * FROM item ORDER BY name, type;"
// 	$items_res = mysql_query( $items_query );
// 	$item_names = array();
// 	while ( $item_row = mysql_fetch_array( $items_res ) )
// 	{
// 		$item_name = $item_row['name'] . ' (' . $item_row['type'] . ')';
// 		$item_names.push( $item_name );
// 	}
// 	return $item_names;
// }

?>
