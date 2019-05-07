<?php
 header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
	//$mb_id = $_POST['mb_id'];
	$mb_manager = $_POST['mb_manager'];
if($_POST['mb_manager'] == 1 or 2){
$sql_query = "SELECT * FROM record ORDER BY record_id DESC";

   
$result = mysqli_query($db_link, $sql_query);

 
while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
	
}


echo json_encode($data, JSON_UNESCAPED_UNICODE);
}else{
	echo "家華";
}
?>