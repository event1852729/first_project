<?php
header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");


$bd_id = $_POST['bd_id'];

$mb_id = $_POST['mb_id'];
$lm_content = $_POST['lm_content'];



//判斷帳號密碼是否為空值
//確認密碼輸入的正確性

       $seldb = @mysqli_select_db($db_link,"commun");
          if(!$seldb) die("資料庫選擇失敗!!");
        //新增資料進資料庫語法
        $sql = "insert into lm (bd_id, mb_id, lm_content) values ('$bd_id','$mb_id','$lm_content')";
    
    if(mysqli_query($db_link,$sql))
        {
                echo '新增成功!';
                
        }
        else
        {
                echo '新增失敗!';
                
        }


?>