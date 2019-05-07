<?php
 header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");

$sql_query = "SELECT * FROM image";

   
$result = mysqli_query($db_link, $sql_query);
 //while($row_result=mysqli_fetch_array($result)){
		//foreach($row_result as $item=>$value){
			//echo $item."=".$value."<br>";
		//}
		//echo "<hr />";
	//}
while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
	
}

echo json_encode($data, JSON_UNESCAPED_SLASHES,JSON_UNESCAPED_UNICODE);
?>