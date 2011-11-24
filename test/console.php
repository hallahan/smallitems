<?php
$arg = $_GET['arg'];
$val = $_GET['val'];
include '../client_select.php?' . $arg . '=' . $val;
?>
<html>
	<body>
		<h1>
			Test Results:
		</h1>
		<?php
		echo 'HELLO';
		?>
	</body>
</html>




