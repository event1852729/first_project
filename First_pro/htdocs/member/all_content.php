<?php
 header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
$community_id = $_POST['community_id'];
$con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");
$sql_query = "SELECT member.*,community.community_id,community.community_name FROM member,community where (member.community_id = community.community_id and member.community_id = $community_id) ORDER BY mb_id DESC";

   
$result = mysqli_query($db_link, $sql_query);
 
while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
	
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>