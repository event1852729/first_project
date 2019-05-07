<?php
 header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
$mg_mb_id = $_POST['mg_mb_id'];
$r_mb_id = $_POST['r_mb_id'];

$sql_query = "SELECT message.*,member.mb_id,member.mb_name FROM message,member
WHERE (message.mg_mb_id =$mg_mb_id 
       and message.r_mb_id = $r_mb_id
       and message.mg_mb_id = member.mb_id)";


   
$result = mysqli_query($db_link, $sql_query);
 
while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
	
}
$sql = "SELECT message.*,member.mb_id,member.mb_name FROM message,member
WHERE (message.mg_mb_id =$r_mb_id 
and message.r_mb_id =$mg_mb_id
and message.mg_mb_id=member.mb_id)
ORDER BY mg_date DESC";
$num = mysqli_query($db_link, $sql);
while($row = mysqli_fetch_assoc($num)){
	$ya[] = $row;
	
}
$yo = array_merge($data,$ya);
echo json_encode($yo,JSON_UNESCAPED_UNICODE);
;
?>