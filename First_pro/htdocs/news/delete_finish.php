<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Example.php</title>
</head>
<body>
<?php
header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
	
 $n_id = $_POST['n_id'];

if(!$seldb) die("資料庫選擇失敗!!");
        //刪除資料庫資料語法
        $sql = "delete from news where n_id='$n_id'";
        if(mysqli_query($db_link,$sql))
        {
                echo '刪除成功!';
                
        }
        else
        {
                echo '刪除失敗!';
                
        }

?>
</body>
</html>



