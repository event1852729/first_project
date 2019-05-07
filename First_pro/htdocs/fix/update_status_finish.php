<?php
header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
$con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");

$datetime = date ("Y-m-d H:i:s" , mktime(date('H')+7, date('i'), date('s'), date('m'), date('d'), date('Y'))) ;
$fix_id = $_POST['fix_id'];
$fix_status_id = $_POST['fix_status_id'];
$fix_name = $_POST['fix_name'];
$fix_phone = $_POST['fix_phone'];

	
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
	
	$sql = "UPDATE fix SET fix_status='$fix_status_id',fix_make_time='$datetime',fix_name='$fix_name',fix_phone='$fix_phone' WHERE fix_id='$fix_id'";
	
	if(mysqli_query($db_link,$sql))
	{
		
		echo "data save";}
    else{echo "try again";}

?>