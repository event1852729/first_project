<?php

header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");


$it_id = $_POST['it_id'];
$re_status = $_POST['re_status'];
$re_time = $_POST['re_time'];
$re_date = $_POST['re_date'];
$mb_id = $_POST['mb_id'];
$re_person = $_POST['re_person'];
$community_id = $_POST['community_id'];


//判斷帳號密碼是否為空值
//確認密碼輸入的正確性

       $seldb = @mysqli_select_db($db_link,"commun");
          if(!$seldb) die("資料庫選擇失敗!!");
        //新增資料進資料庫語法
        $sql = "insert into reserve (community_id,it_id, re_status, re_time, re_date, mb_id, re_person) values ('$community_id','$it_id','$re_status','$re_time','$re_date','$mb_id', '$re_person')";
    
    if(mysqli_query($db_link,$sql))
        {
                echo '新增成功!';
                
        }
        else
        {
                echo '新增失敗!';
                
        }


?>