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
if(isset($_POST['submit'])){
	
	
	$n_title = $_POST['n_title'];
    $n_content = $_POST['n_content'];
	
	echo "n_title:".$n_title;
	echo "n_content:".$n_content;
	
	
	$n_files[] = $_FILES['n_files']['name'];
	$temp = $_FILES['n_files']['tmp_name'];
	
	$sql = "insert into news  (n_title, n_content,n_files,n_filename) values ('$n_title','$n_content','$n_files[]','$n_files[]')";
	
	if(mysqli_query($db_link,$sql))
	{
		$i = count($_FILES['n_files']['name']);
		echo $i;
		for($j=0;$j<$i;$j++){
			if($_FILES['n_files']['error'][$j]==0){
				if(move_uploaded_file($_FILES['n_files']['tmp_name'][$j],"upload/".$_FILES['n_files']['name'][$j])){
					echo $_FILES['n_files']['name'][$j]."上傳成功!<br />";
				}else{
					echo $_FILES['n_files']['name'][$j]."上傳失敗!<br />";
				}
			}
		}
		
		//$path = "upload/";
		//move_uploaded_file($temp,$path.$n_files);
		//echo "data save";
	}
    else{echo "try again";}
}
else{
	echo "家華";
}
?>
</body>
</html>