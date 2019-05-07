<?php
 header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");

$y=date("y-m-d");

echo date("y");

	$query = "UPDATE datetime SET datetime_y='$y'";
	
	if(mysqli_query($db_link,$query))
	{
		
		echo "data save";}
    else
	{echo "try again";}
$sql_query = "SELECT * FROM datetime" ;

   
$result = mysqli_query($db_link, $sql_query);
 
while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
	
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);