<?php
header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
	
	$con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");
	if($con){
		$n_title = $_POST['n_title'];
		$n_content = $_POST['n_content'];
		$image = $_POST['image'];
		$name = $_POST['name'];
		$sql = $sql = "insert into news (n_title, n_content,n_filename) values ('$n_title','$n_content','$name')";
		$upload_path = "upload/$name.jpg";
		     if(mysqli_query($con,$sql)){
				 file_put_contents($upload_path,base64_decode($image));
				 echo json_encode(array('response'=>'image upload 成功'));
			 }
			 else
			 {
				 echo json_encode(array('response'=>'image upload 失敗'));
			 }
	}
	else
	{
		echo json_encode(array('response'=>'image upload 剛開始失敗'));
	}

	
?>