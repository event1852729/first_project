<?php
 header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
$mb_id = $_POST['mb_id'];
$select_mb_id = $_POST['select_mb_id'];
$sql_query = "SELECT message.*,member.mb_id,member.mb_name FROM message,member
where (mg_date=(select max(mg_date) from  message where message.mg_mb_id = member.mb_id)
and message.mg_mb_id =member.mb_id 
and message.r_mb_id =$mb_id
and message.mg_mb_id = $select_mb_id)ORDER BY mg_id DESC";

   
$result = mysqli_query($db_link, $sql_query);
 
while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
	
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>