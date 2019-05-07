<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Example3.php</title>
</head>
<body>
<?php
header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
$con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");

	$path = "images/";
    $filename = $_FILES['uploaded_file']['name'];
	$file_path = $path . basename($_FILES['uploaded_file']['name']);
    $sql = "insert into record (record_content) values ('$$filename')";
	if(mysqli_query($db_link,$sql))
	{
		move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$file_path);
		echo "success";
	}else {
		echo "error";
	}

	
    //$file_path = "images/";

	//$file_path = $file_path . basename($_FILES['uploaded_file']['name']);
	
	//$sql = "insert into record (record_title,record_content) values ('$record_title','$n_files')";
	
	//if(mysqli_query($db_link,$sql))
	//{
		
		//move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$file_path)
		//echo "data save";}
    //else{echo "try again";}

?>
</body>
</html>