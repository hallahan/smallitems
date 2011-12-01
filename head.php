<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

<link href="style.css" rel="stylesheet" type="text/css" />
<link href="itunestable.css" rel="stylesheet" type="text/css" />

<style type="text/css"></style>
<title>Small Items Checkout</title>


<link type="text/css" href="jquery/css/custom-theme/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
	<script src="jquery/development-bundle/jquery-1.6.2.js"></script>
	<script src="jquery/development-bundle/ui/jquery.ui.core.js"></script>
	<script src="jquery/development-bundle/ui/jquery.ui.widget.js"></script>
	<script src="jquery/development-bundle/ui/jquery.ui.datepicker.js"></script>
	
	<script>
	$(function() {
		$( "#datepicker" ).datepicker({
			dateFormat: "yy-mm-dd"
		});
	});

	$(function() {
		$( "#datepicker_return" ).datepicker({
			dateFormat: "yy-mm-dd"
		});
	});
	</script>
	
	<!-- timepicker stuff -->
	<link rel="Stylesheet" media="screen" href="ui-timepickr/ui.core.css" /> 
  <link rel="Stylesheet" media="screen" href="ui-timepickr/ui.timepickr.css" /> 
  <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.js"></script>  -->
  <!-- <script type="text/javascript" src="ui-timepickr/jquery.utils.js"></script>
  <script type="text/javascript" src="ui-timepickr/jquery.strings.js"></script>
  <script type="text/javascript" src="ui-timepickr/jquery.anchorHandler.js"></script>
  <script type="text/javascript" src="ui-timepickr/jquery.ui.all.js"></script>  -->
  <script type="text/javascript" src="ui-timepickr/ui.timepickr.js"></script>
  
  <script type="text/javascript">
      $(function(){
          //$('#test-1').timepickr({trigger: '#trigger-test'});
        $('#demo-1').timepickr().focus();
        $('#demo-2').timepickr({convention:12});
        $('#demo-1').next().find('ol').show().find('li:eq(2)').mouseover();
        // temporary fix..
        $('.ui-timepickr ol:eq(0) li:first').mouseover();
      });
  </script>
	
</head>
<body>

<?php include("menu.php"); ?>