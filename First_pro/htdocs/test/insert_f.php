<?php

header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
	
	

	$con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");
	if(isset($_FILES['n_files']))
	{
		$destination = 'upload/'.$_FILES['n_files']['name'];
		move_uploaded_file($_FILES['n_files']['tmp_name'],$destination);
		
		$sql = "INSERT INTO news(n_files) VALUES ('$destination')";
		
		mysqli_query($con,$sql);
		echo "上船成功";
	}
	else
	{
		echo "上船失敗";
	}
 
?>
