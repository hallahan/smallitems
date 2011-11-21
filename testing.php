<?php
	include 'newcheckout_cont.php';
	
	$all_clients = get_all_clients_list();
//$all_items = get_all_items_list();
$all_clients_count = count( $all_clients );
// $all_items_count = count( %all_items );
?>

<html>
	<body>
		
<?php
echo 'testing<br/>';
// echo $all_clients[0]['client_id'];
// echo $all_clients[0]['client_name'] . <br/>;

foreach ( $all_clients as $c ) {
	echo $c['client_name'];
}

// while( $all_clients ) {
// 	print array_shift( array_shift( $all_clients ) );
// }

print_r( $all_clients );
?>

	</body>
</html>
