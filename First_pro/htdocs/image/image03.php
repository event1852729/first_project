<?php
header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
	
	$conn=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");
//if($_SERVER['REQUEST_METHOD'] == 'POST')
 //{
 $DefaultId = 0;
 
 $ImageData = $_POST['image_path'];
 
 $ImageName = $_POST['image_name'];

 $GetOldIdSQL ="SELECT id FROM image ORDER BY id ASC";
 
 //$Query = mysqli_query($conn,$GetOldIdSQL);
 
// while($row = mysqli_fetch_array($Query)){
 
 //$DefaultId = $row['id'];
 //}
 
 $ImagePath = "uploads/$ImageName.png";
 
 $ServerURL = "http://140.126.146.49:20001/image/$ImagePath";
 
 $InsertSQL = "insert into image (path,name) values ('$ServerURL','$ImageName.png')";
 
 if(mysqli_query($conn, $InsertSQL)){

 file_put_contents($ImagePath,base64_decode($ImageData));

 echo "Your Image Has Been Uploaded.";
 }
 
 //mysqli_close($conn);
 //}
 else{
 echo "Not Uploaded";
 }

?>