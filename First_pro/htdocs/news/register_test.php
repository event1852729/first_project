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

$community_id = $_POST['community_id'];
$n_title = $_POST['n_title'];
$n_content = $_POST['n_content'];
$n_type = $_POST['n_type'];
$path = "uploads/";
    $filename = str_replace(' ', '_',$_FILES['uploaded_file']['name']);
	$file_path = $path . basename(str_replace(' ', '_',$_FILES['uploaded_file']['name']));

//判斷帳號密碼是否為空值
//確認密碼輸入的正確性

       $seldb = @mysqli_select_db($db_link,"commun");
          if(!$seldb) die("資料庫選擇失敗!!");
        //新增資料進資料庫語法
        $sql = "insert into news (community_id,n_title, n_content,n_files,n_type) values ('$community_id','$n_title', '$n_content','$filename','$n_type')";
    
    if(mysqli_query($db_link,$sql))
        {
			move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$file_path);
                echo '新增成功!';
                
        }
        else
        {
                echo '新增失敗!';
                
        }


?>
</body>
</html>




