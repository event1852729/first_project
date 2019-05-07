
<!doctype html>
<html lang="en">
 <head>

  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="../sample.css">
 </head>
 <body>
    <?php
		error_reporting(E_ALL^E_NOTICE);
	  include "tools.html";
		
	  $method = $_GET["method"];
    

	 

	  switch($method)
	  {
		  case "insert": include "input_insert.php"; break;
		  default: include "query.php";
	  }
	?>
 </body>
   
</html>
