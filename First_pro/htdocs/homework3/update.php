<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>Document</title>
  <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="sample.css">
 </head>
 <body>

  
    <?php
	  $method = $_POST["method"];
	  $postid = $_POST["postid"];
	  $company = $_POST["company"];
	  $content = $_POST["content"];
	  $pdate = $_POST["pdate"];
	  
		
	  $db_link = mysqli_connect("localhost", "root" , "a12345");
		    mysqli_query( $db_link  , "set names utf8");
		   $seldb = @mysqli_select_db($db_link, "temp");
		   
			if (!$seldb) die("資料庫選擇失敗！");
	
	
	  if(empty($postid))
	    {
			echo "insert error";
		}
	  else
	    {
		  $sql="UPDATE ststudent SET stname='$company',content='$content',date='$pdate' WHERE stid='$postid'";
		}
		
	  	$rs = mysqli_query($db_link, $sql);
	
		if($rs){
			include "insert_ok.php";
		}else{
			include "insert_fail.php";
		}
	
			
	
	
		
	  
	?>
 </body>
   
 
   
   
</html>
