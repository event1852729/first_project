<?php
 header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
$community_id = $_POST['community_id'];
$re_status = $_POST['re_status'];
$sql_query = "SELECT reserve.*,member.mb_id,member.mb_name,item.it_id,item.it_name FROM reserve,member,item WHERE (reserve.mb_id = member.mb_id and re_status = $re_status and reserve.community_id = $community_id and reserve.it_id = item.it_id) ORDER BY re_id DESC" ;

   
$result = mysqli_query($db_link, $sql_query);
 
while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
	
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>