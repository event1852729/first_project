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
  $searchtxt = $_GET["searchtxt"];
?>
    <form action="index.php" method=get>
	<input type=hidden name="method" value="query"> <!-- 現在method變數值是query，避免搜尋後值消失，所以用hidden再傳一次值 -->
	<p align=center><input type=text name="searchtxt" value="hi"><input type=submit value="搜尋學號與姓名"></p>
	</form>
	
    <table class="table table-hover">
	  <tr class="warning"><td>學號</td><td>姓名</td><td>功能</td></tr>
    <?php

	  
	  $db_link = mysqli_connect("localhost", "root" , "a12345");
		    mysqli_query( $db_link  , "set names utf8");
		   $seldb = @mysqli_select_db($db_link, "temp");
		   
			if (!$seldb) die("資料庫選擇失敗！");
	
	
	
	
	  if(empty($searchtxt))
	    {
			echo "hihi";
	      $sql="select * from ststudent";
		}
	  else
	    {
		  $sql="select * from ststudent where stid like '%$searchtxt%' or stname like '%$searchtxt%'";
		}
		
		
		
		
	  	$rs = mysqli_query($db_link, $sql);
			
		while($record = mysqli_fetch_assoc($rs)){
		echo json_encode($record, JSON_UNESCAPED_UNICODE);;
		
		
	
	}	
		
	  
	?>
 </body>
   
</html>
