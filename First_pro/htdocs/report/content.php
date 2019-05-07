<?php
 header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
	
$community_id = $_POST['community_id'];
$sql_query = "SELECT report.*,member.mb_id,member.mb_name,board.bd_id,board.bd_content FROM report,member,board where (report.mb_id = member.mb_id and report.bd_id = board.bd_id and report.community_id = $community_id and report.rp_status = '0') ORDER BY rp_id DESC";

   
$result = mysqli_query($db_link, $sql_query);

 
while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
	
}


echo json_encode($data, JSON_UNESCAPED_UNICODE);

?>