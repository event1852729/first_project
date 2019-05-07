<?php
   header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
$rp_id = $_POST['rp_id'];
$bd_id = $_POST['bd_id'];


//紅色字體為判斷密碼是否填寫正確

        //更新資料庫資料語法
        $sql = "update board set bd_status='1' where bd_id='$bd_id'";
        if(mysqli_query($db_link,$sql))
        {
                echo '修改成功!';
               
        }
        else
        {
                echo '修改失敗!';
               
        }

//紅色字體為判斷密碼是否填寫正確

        //更新資料庫資料語法
        $sql = "update report set rp_status='1' where rp_id='$rp_id'";
        if(mysqli_query($db_link,$sql))
        {
                echo '修改成功!';
               
        }
        else
        {
                echo '修改失敗!';
               
        }

?>