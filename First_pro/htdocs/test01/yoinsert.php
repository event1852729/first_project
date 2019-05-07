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

	
	$n_id = $_POST['n_id'];
	$n_title = $_POST['n_title'];
    $n_content = $_POST['n_content'];
	echo "n_title1:".$n_title1;
	echo "n_title:".$n_title;
	echo "n_content:".$n_content;
	
	

	//$n_files = $_FILES['n_files']['name'];
	//$temp = $_FILES['n_files']['tmp_name'];
	
	$sql = "UPDATE news SET n_title='$n_title', n_content='$n_content' WHERE n_id='$n_id'";
	
	if(mysqli_query($db_link,$sql))
	{
		//$path = "upload/";
		//move_uploaded_file($temp,$path.$n_files);
		echo "data save";}
    else{echo "try again";}

?>
</body>
</html>