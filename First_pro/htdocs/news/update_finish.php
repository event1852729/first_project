<?php
   header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
	
$n_id = $_POST['n_id'];
$n_title = $_POST['n_title'];
$n_content = $_POST['n_content '];

//紅色字體為判斷密碼是否填寫正確

        //更新資料庫資料語法
        $sql = "update news set n_title=$n_title, n_content=$n_content where n_id='$n_id'";
        if(mysqli_query($db_link,$sql))
        {
                echo '修改成功!';
               
        }
        else
        {
                echo '修改失敗!';
               
        }

?>