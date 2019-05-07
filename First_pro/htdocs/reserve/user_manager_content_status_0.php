<?php
 header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
	$mb_id = $_POST['mb_id'];
	$mb_manager = $_POST['mb_manager'];
	$community_id = $_POST['community_id'];
if($_POST['mb_manager'] == 3 ){
$sql_query = "SELECT reserve.*,member.mb_id,member.mb_name,member.mb_manager,item.it_id,item.it_name FROM reserve,member,item WHERE (reserve.mb_id = member.mb_id and reserve.re_status = '0' and reserve.it_id = item.it_id and reserve.community_id = $community_id) ORDER BY re_id DESC" ;

   
$result = mysqli_query($db_link, $sql_query);

 
while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
	
}


echo json_encode($data, JSON_UNESCAPED_UNICODE);
}else{
	$sql_query = "SELECT reserve.*,member.mb_id,member.mb_name,member.mb_manager,item.it_id,item.it_name FROM reserve,member,item WHERE (reserve.mb_id = member.mb_id and member.mb_id =$mb_id and reserve.re_status ='0' and reserve.it_id = item.it_id and reserve.community_id = $community_id) ORDER BY re_id DESC" ;
	
	$result = mysqli_query($db_link, $sql_query);

 
while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
 }
	echo json_encode($data, JSON_UNESCAPED_UNICODE);
}
?>