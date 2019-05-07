<?php
header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
	
	$con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");
	
		
		if(isset($_POST['image_name'])){
			$image_name = $_POST['image_name'];
			$imsrc = base64_decode($_POST['base64']);
			
			
			///$path = 'uploads/'.$image_name;
			
			$file = fopen($image_name,'w');
			
			 fwrite($file,$imsrc);
			if(fclose($file)){
				echo "success";
			}
			else{
				echo "sorrry";
			}
			
			
		}

	
?>