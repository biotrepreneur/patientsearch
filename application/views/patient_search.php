<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Patient Lookup</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!--<link rel="icon" type="image/png" href="images/favicon.png">-->

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
 
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
    <div class="row">
      <div class="two-thirds column" style="margin-top: 5%; margin-bottom: 5%;">
      	<a href="/Medina"><i class="material-icons" style="float: left; font-size: 35px; margin-right: 5px;">search</i></a>
        <h4>Patient Lookup</h4>
	        <form id="patientName" action="">
	      		<input class="" type="text" placeholder="Enter Patient Name" id="name" style="width: 50%; margin-left: 40px;">
	      	 	<input class="button-primary" type="submit" value="Submit" >
	      	</form>
      </div>
    </div>

    <div id="results">
  	</div>

  	<script type="text/javascript">
		$('#patientName').submit(function() { 
	        var patientName = $('#name').val().toUpperCase();
			$.post('/Medina/index.php/welcome/all_patients', {patientName:patientName},   
		      function(result) {
		        if (result) {
		          $('#results').html(result);
		          $('#name').val('');
		        }
		      }
		    );
			return false;
		});
	</script>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
