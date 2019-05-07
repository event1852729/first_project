<?php
 header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
	
$ab_id = $_POST['ab_id'];
$sql_query = "SELECT photo.*,album.ab_id,album.ab_name FROM photo,album where (photo.ab_id = album.ab_id and album.ab_id = $ab_id) ORDER BY ph_id DESC";

   
$result = mysqli_query($db_link, $sql_query);

 
while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
	
}


echo json_encode($data, JSON_UNESCAPED_UNICODE);

?>