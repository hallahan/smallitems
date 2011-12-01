<?php
$id = $_GET["id"];
$clear=$_GET["clear"];

$formatstr = 
'%s (%s)<br/>';

include '../dbsetup.php';

$ids = explode('_', mysql_real_escape_string($id) );
$esc_clear = mysql_real_escape_string( $clear );

$escs = array();
foreach( $ids as $i ){
	$esc = mysql_real_escape_string( $i );
	array_push( $escs, $esc );
}

if ( $esc_clear != TRUE ) {
  foreach($escs as $e) {
  	$q=
  	"SELECT * FROM item 
  	WHERE item_id=" . $e . ";";
  	
  	$res = mysql_query( $q );
  	
  	while( $row = mysql_fetch_array($res) ) {
  		if ( $row['type']) {
  			printf($formatstr, $row['name'], $row['type']);
  		} else {
  			echo $row['name'] . '<br/>';
  		}
  	}
  }
} else {
  echo ' ';
}

?>