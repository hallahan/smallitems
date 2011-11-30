<?php
$id=$_GET["id"];
$formatstr = 
'%s<br/>
%s<br/>
%s<br/>
%s
<p class="small">
	%s
</p>';

include 'dbsetup.php';

$esc = mysql_real_escape_string( $id );

$q=
"SELECT * FROM client 
WHERE client_id=" . $esc . ";";

$res = mysql_query( $q );

while( $row = mysql_fetch_array($res) ) {
	$full_name = $row['first_name'] . ' ' . $row['last_name'];
	printf( $formatstr, $full_name, $row['psu_id'], 
					$row['phone'], $row['email'], $row['notes'] );
}

?>