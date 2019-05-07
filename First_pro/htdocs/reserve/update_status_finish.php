<?php
header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
$con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");

$datetime = date ("Y-m-d H:i:s" , mktime(date('H')+7, date('i'), date('s'), date('m'), date('d'), date('Y'))) ;
$re_id = $_POST['re_id'];
$re_status = $_POST['re_status'];
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
	
	$sql = "UPDATE reserve SET re_status='$re_status',re_ft='$datetime' WHERE re_id='$re_id'";
	
	if(mysqli_query($db_link,$sql))
	{
		
		echo "data save";}
    else{echo "try again";}

?>