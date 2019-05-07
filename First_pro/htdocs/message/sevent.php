<?php
 header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
if (!$seldb) die("資料庫選擇失敗！");
$mb_id = $_POST['mb_id'];
$community_id = $_POST['community_id'];
$mb_manager = $_POST['mb_manager'];
if($mb_manager == 3 || $mb_manager == 2){
$sql = "SELECT message.*,member.mb_id,member.mb_name,messagedecide.* FROM message,member,messagedecide
where (mg_date=(select max(mg_date) from  message where message.mg_mb_id = member.mb_id)
and message.mg_mb_id =member.mb_id 
and message.r_mb_id =$mb_id
and date_sub(curdate(),interval 3 day)<=date(mg_date)
and message.mg_id = messagedecide.mg_id
)";

   
$a = mysqli_query($db_link, $sql);

$num = mysqli_num_rows($a);

$sql_query = "SELECT message.*,member.mb_id,member.mb_name FROM message,member
where (mg_date=(select max(mg_date) from  message where message.mg_mb_id = member.mb_id)
and message.mg_mb_id =member.mb_id 
and message.r_mb_id =$mb_id
and date_sub(curdate(),interval 3 day)<=date(mg_date))ORDER BY mg_id DESC";

   
$b = mysqli_query($db_link, $sql_query);

$num1 = mysqli_num_rows($b);

$num1 -= $num;


 

$sq = "SELECT news.*,newsdecide.* FROM news,newsdecide where (date_sub(curdate(),interval 3 day)<=date(n_date) and news.community_id =$community_id and newsdecide.n_id = news.n_id and newsdecide.mb_id = '$mb_id')";

   
$c = mysqli_query($db_link, $sq);

$num2 = mysqli_num_rows($c);

$sql_quer = "SELECT news.* FROM news where (date_sub(curdate(),interval 3 day)<=date(n_date) and news.community_id =$community_id)";

   
$d = mysqli_query($db_link, $sql_quer);

$num3 = mysqli_num_rows($d);
 

$num3 -= $num2;



$s = "SELECT package.*,packagedecide.* FROM package,packagedecide where (date_sub(curdate(),interval 3 day)<=date(pg_arrival_date) and packagedecide.mb_id =$mb_id and package.pg_status = '1' and packagedecide.pg_id = package.pg_id and package.community_id =$community_id) or (date_sub(curdate(),interval 3 day)<=date(pg_arrival_date) and packagedecide.mb_id =$mb_id and package.pg_status = '3' and packagedecide.pg_id = package.pg_id and package.community_id =$community_id)";

   
$e = mysqli_query($db_link, $s);

$num4 = mysqli_num_rows($e);


$sql_que = "SELECT package.* FROM package where (date_sub(curdate(),interval 3 day)<=date(pg_arrival_date) and package.community_id =$community_id and package.pg_status = '1') or (date_sub(curdate(),interval 3 day)<=date(pg_arrival_date) and package.community_id =$community_id and package.pg_status = '3')";

   
$f = mysqli_query($db_link, $sql_que);

$num5 = mysqli_num_rows($f);


 
$num5 -= $num4;

echo $num1.",".$num3.",".$num5;
	
}else{
$sql = "SELECT message.*,member.mb_id,member.mb_name,messagedecide.* FROM message,member,messagedecide
where (mg_date=(select max(mg_date) from  message where message.mg_mb_id = member.mb_id)
and message.mg_mb_id =member.mb_id 
and message.r_mb_id =$mb_id
and date_sub(curdate(),interval 3 day)<=date(mg_date)
and message.mg_id = messagedecide.mg_id
)";

   
$a = mysqli_query($db_link, $sql);

$num = mysqli_num_rows($a);

$sql_query = "SELECT message.*,member.mb_id,member.mb_name FROM message,member
where (mg_date=(select max(mg_date) from  message where message.mg_mb_id = member.mb_id)
and message.mg_mb_id =member.mb_id 
and message.r_mb_id =$mb_id
and date_sub(curdate(),interval 3 day)<=date(mg_date))ORDER BY mg_id DESC";

   
$b = mysqli_query($db_link, $sql_query);

$num1 = mysqli_num_rows($b);

$num1 -= $num;


 

$sq = "SELECT news.*,newsdecide.* FROM news,newsdecide where (date_sub(curdate(),interval 3 day)<=date(n_date) and news.community_id =$community_id and newsdecide.n_id = news.n_id and newsdecide.mb_id = '$mb_id')";

   
$c = mysqli_query($db_link, $sq);

$num2 = mysqli_num_rows($c);

$sql_quer = "SELECT news.* FROM news where (date_sub(curdate(),interval 3 day)<=date(n_date) and news.community_id =$community_id)";

   
$d = mysqli_query($db_link, $sql_quer);

$num3 = mysqli_num_rows($d);
 

$num3 -= $num2;



$s = "SELECT package.*,packagedecide.* FROM package,packagedecide where (date_sub(curdate(),interval 3 day)<=date(pg_arrival_date) and package.mb_id =$mb_id and package.pg_status = '1' and packagedecide.pg_id = package.pg_id and packagedecide.mb_id = package.mb_id) or (date_sub(curdate(),interval 3 day)<=date(pg_arrival_date) and package.mb_id =$mb_id and package.pg_status = '3' and packagedecide.pg_id = package.pg_id and packagedecide.mb_id = package.mb_id)";

   
$e = mysqli_query($db_link, $s);

$num4 = mysqli_num_rows($e);


$sql_que = "SELECT package.* FROM package where (date_sub(curdate(),interval 3 day)<=date(pg_arrival_date) and package.mb_id =$mb_id and package.pg_status = '1') or (date_sub(curdate(),interval 3 day)<=date(pg_arrival_date) and package.mb_id =$mb_id and package.pg_status = '3')";

   
$f = mysqli_query($db_link, $sql_que);

$num5 = mysqli_num_rows($f);


 
$num5 -= $num4;



echo $num1.",".$num3.",".$num5;
}

?>