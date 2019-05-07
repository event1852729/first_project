<?php
header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
$con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");

$image = $_FILES['image']['name'];
$temp = $_FILES['image']['tmp_name'];

$sql = "insert into image (name) values ('$image')";
if(mysqli_query($db_link,$sql))
	{
		$path = "uploads/";
		move_uploaded_file($temp,$path.$image);
		echo "data save";}
    else{echo "try again";}

?>
