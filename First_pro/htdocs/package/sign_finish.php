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
$pg_id = $_POST['pg_id'];
$have_sign =$_POST['have_sign'];
$DefaultId = $_POST['pg_id'];
$ImageData = $_POST['image_path'];

$sql = "SELECT package.pg_status FROM package where package.pg_id='$pg_id'";

   
$result = mysqli_query($db_link, $sql);

 

	while($row_result=mysqli_fetch_assoc($result)){
		foreach($row_result as $item=>$value){
			echo $item."=".$value."<br>";
		}
		echo "<hr />";
	}
if($value == 1){
$datetime = date ("Y-m-d H:i:s" , mktime(date('H')+7, date('i'), date('s'), date('m'), date('d'), date('Y'))) ;
$a="s.png";
$pg_id = $_POST['pg_id'];
$have_sign =$_POST['have_sign'];
$DefaultId = $_POST['pg_id'];
$ImageData = $_POST['image_path'];
$b = md5(uniqid(rand()));

$ImagePath = "uploads/$b$DefaultId$a";
$ServerURL = "http://140.126.146.49:20001/package/$ImagePath";
 
	$sql = "UPDATE package SET pg_sign='$b$DefaultId$a',pg_status='2',have_sign='$have_sign',pg_date='$datetime' WHERE pg_id=$pg_id";
	
	if(mysqli_query($db_link,$sql))
	{
		file_put_contents($ImagePath,base64_decode($ImageData));
		echo "data save";}
    else{echo "try again";}
}else{
	$datetime = date ("Y-m-d H:i:s" , mktime(date('H')+7, date('i'), date('s'), date('m'), date('d'), date('Y'))) ;
$a="s.png";
$pg_id = $_POST['pg_id'];
$have_sign =$_POST['have_sign'];
$DefaultId = $_POST['pg_id'];
$ImageData = $_POST['image_path'];
$b = md5(uniqid(rand()));

$ImagePath = "uploads/$b$DefaultId$a";
$ServerURL = "http://140.126.146.49:20001/package/$ImagePath";
 
	$sql = "UPDATE package SET pg_sign='$b$DefaultId$a',pg_status='4',have_sign='$have_sign',pg_date = '$datetime' WHERE pg_id=$pg_id";
	
	if(mysqli_query($db_link,$sql))
	{
		file_put_contents($ImagePath,base64_decode($ImageData));
		echo "data save";}
    else{echo "try again";}
	
}
?>
</body>
</html>