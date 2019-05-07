<?php
 header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
$community_id = $_POST['community_id'];
$con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");
$community_id = $_POST['community_id'];
$sql_query = "SELECT member.mb_id FROM member where (member.community_id = $community_id and member.mb_manager ='1') ORDER BY mb_id DESC";

   
$result = mysqli_query($db_link, $sql_query);

 

	while($row_result=mysqli_fetch_assoc($result)){
		foreach($row_result as $item=>$value){
			echo $item."=".$value."<br>";
		}
		echo "<hr />";
	};
	
	$mb_id = $_POST['mb_id'];

$sql = "SELECT message.* FROM message 
WHERE (message.r_mb_id =$mb_id) AND (message.mg_mb_id =$value)
ORDER BY mg_id DESC" ;

   
$result = mysqli_query($db_link, $sql);
 
while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
	
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>