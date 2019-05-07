<?php
header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
	
	$con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");
	if($con){
		
		$image = $_POST['image'];
		$name = $_POST['name'];
		$sql = "insert into image (name) values ('$name')";
		$upload_path = "uploads/$name.jpg";
		     if(mysqli_query($con,$sql)){
				 file_put_contents($upload_path,base64_decode($image));
				 echo json_encode(array('response'=>'image upload win'));
			 }
			 else
			 {
				 echo json_encode(array('response'=>'image upload loss'));
			 }
	}
	else
	{
		echo json_encode(array('response'=>'image upload LOSS'));
	}

	
?>