<?php
 header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
if (!$seldb) die("資料庫選擇失敗！");
$mb_id = $_POST['mb_id'];
$community_id = $_POST['community_id'];
$mb_manager = $_POST['mb_manager'];



$sql = "SELECT package.*,packagedecide.* FROM package,packagedecide where (date_sub(curdate(),interval 3 day)<=date(pg_arrival_date) and packagedecide.mb_id =$mb_id and package.pg_status = '1' and packagedecide.pg_id = package.pg_id and package.community_id =$community_id) or (date_sub(curdate(),interval 3 day)<=date(pg_arrival_date) and packagedecide.mb_id =$mb_id and package.pg_status = '3' and packagedecide.pg_id = package.pg_id and package.community_id =$community_id)";

   
$b = mysqli_query($db_link, $sql);

$num = mysqli_num_rows($b);

echo $num.",";
$sql_query = "SELECT package.* FROM package where (date_sub(curdate(),interval 3 day)<=date(pg_arrival_date) and package.community_id =$community_id and package.pg_status = '1') or (date_sub(curdate(),interval 3 day)<=date(pg_arrival_date) and package.community_id =$community_id and package.pg_status = '3')";

   
$c = mysqli_query($db_link, $sql_query);

$num1 = mysqli_num_rows($c);

echo $num1."," ; 
 
$num1 -= $num;

echo $num1;