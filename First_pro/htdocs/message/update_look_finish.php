<?php
header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
$con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");


$mg_id = $_POST['mg_id'];


	
	
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
	
	$sql = "UPDATE message SET  have_look='1' WHERE mg_id='$mg_id'";
	
	if(mysqli_query($db_link,$sql))
	{
		//$path = "upload/";
		//move_uploaded_file($temp,$path.$n_files);
		echo "data save";}
    else{echo "try again";}

?>
