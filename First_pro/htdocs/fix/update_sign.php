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
$datetime = date ("Y-m-d H:i:s" , mktime(date('H')+7, date('i'), date('s'), date('m'), date('d'), date('Y'))) ;
$a="s.png";
$fix_id = $_POST['fix_id'];
$fix_status_id = $_POST['fix_status_id'];
$DefaultId = $_POST['fix_id'];
$ImageData = $_POST['image_path'];
$b = md5(uniqid(rand()));
//$ImageName = $_POST['image_name'];

//$GetOldIdSQL ="SELECT * FROM package ORDER BY pg_id ASC";
//$Query = mysqli_query($con,$GetOldIdSQL);
//while($row = mysqli_fetch_array($Query)){
 
 //$DefaultId = $row['pg_id']+1;
 //}
$ImagePath = "uploads/$b$DefaultId$a";
$ServerURL = "http://140.126.146.49:20001/fix/$ImagePath";
 
 //$Query = mysqli_query($conn,$GetOldIdSQL);
 
// while($row = mysqli_fetch_array($Query)){
 
 //$DefaultId = $row['id'];
 //}
	//$query = "SELECT pg_sid FROM `package` WHERE pg_id='$pg_id1'";
	//$result = mysqli_query($con,$query);
	//while($row_result=mysqli_fetch_array($result)){
		//foreach($row_result as $item=>$value){
			//echo $item."=".$value."<br>";
		//}
		//echo "<hr />";
	//}

	//$n_files = $_FILES['n_files']['name'];
	//$temp = $_FILES['n_files']['tmp_name'];
	
	$sql = "UPDATE fix SET fix_status='$fix_status_id',fix_finished_date='$datetime',fix_sign='$b$DefaultId$a',have_sign ='1' WHERE fix_id='$fix_id'";
	
	if(mysqli_query($db_link,$sql))
	{
		file_put_contents($ImagePath,base64_decode($ImageData));
		echo "data save";}
    else{echo "try again";}

?>
</body>
</html>