<?php
header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");

$it_name = $_POST['it_name'];
$it_day = $_POST['it_day'];
$it_stime = $_POST['it_stime'];
$it_etime = $_POST['it_etime'];
$it_limt = $_POST['it_limt'];
$it_stauts = $_POST['it_stauts'];
$community_id = $_POST['community_id'];



//判斷帳號密碼是否為空值
//確認密碼輸入的正確性

       $seldb = @mysqli_select_db($db_link,"commun");
          if(!$seldb) die("資料庫選擇失敗!!");
        //新增資料進資料庫語法
        $sql = "insert into item (community_id,it_name, it_day, it_stime, it_etime, it_limt, it_stauts) values ('$community_id','$it_name','$it_day','$it_stime','$it_etime','$it_limt','$it_stauts')";
    
    if(mysqli_query($db_link,$sql))
        {
                echo '新增成功!';
                
        }
        else
        {
                echo '新增失敗!';
                
        }


?>