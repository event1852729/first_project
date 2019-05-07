<?php
 header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
if (!$seldb) die("資料庫選擇失敗！");
$mb_id = $_POST['mb_id'];
$community_id = $_POST['community_id'];
$mb_manager = $_POST['mb_manager'];



$sql = "SELECT message.*,messagedecide.* FROM message,messagedecide where (date_sub(curdate(),interval 3 day)<=date(mg_date) and message.r_mb_id = $mb_id and message.mg_id = messagedecide.mg_id)";

   
$b = mysqli_query($db_link, $sql);

$num = mysqli_num_rows($b);

echo $num.",";
$sql_query = "SELECT message.* FROM message where (date_sub(curdate(),interval 3 day)<=date(mg_date) and message.r_mb_id = $mb_id) ORDER BY mg_id ASC";

   
$c = mysqli_query($db_link, $sql_query);

$num1 = mysqli_num_rows($c);

echo $num1."," ; 
 
$num1 -= $num;

echo $num1;