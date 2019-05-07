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


$it_id = $_POST['it_id'];
$it_name = $_POST['it_name'];
$it_day = $_POST['it_day'];
$it_stime = $_POST['it_stime'];
$it_etime = $_POST['it_etime'];
$it_limt = $_POST['it_limt'];
$it_stauts = $_POST['it_stauts'];

	
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
	
	$sql = "UPDATE item SET it_name='$it_name',it_day='$it_day',it_stime='$it_stime',it_etime='$it_etime',it_limt='$it_limt',it_stauts='$it_stauts' WHERE it_id='$it_id'";
	
	if(mysqli_query($db_link,$sql))
	{
		//$path = "upload/";
		//move_uploaded_file($temp,$path.$n_files);
		echo "data save";}
    else{echo "try again";}

?>
</body>
</html>