<?php
 header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
$fix_status_id = $_POST['fix_status_id'];
$community_id = $_POST['community_id'];
$sql_query = "SELECT fix.*,member.mb_id,member.mb_name FROM fix,member where (fix.mb_id = member.mb_id and fix.fix_status =$fix_status_id and fix.community_id = $community_id) ORDER BY fix.fix_make_time DESC";

   
$result = mysqli_query($db_link, $sql_query);

 
while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
	
}


echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>