<?php
 header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
	
//$sql_query = "SELECT package.pg_id FROM package ORDER BY pg_id DESC limit 1";

   
//$result = mysqli_query($db_link, $sql_query);

 

	//while($row_result=mysqli_fetch_assoc($result)){
		//foreach($row_result as $item=>$value){
			//echo $item."=".$value."<br>";
		//}
		//echo "<hr />";
	//}
$GetOldIdSQL ="SELECT package.pg_id FROM package ORDER BY pg_id DESC limit 1";
 
 $Query = mysqli_query($con,$GetOldIdSQL);
 
while($row_result=mysqli_fetch_assoc($result)){
		foreach($row_result as $item=>$value){
			echo $item."=".$value."<br>";
		}
		echo "<hr />";
	}
	$DefaultId = $value + 1;
	
	echo $DefaultId;


?>