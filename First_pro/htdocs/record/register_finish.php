<?php

header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");

$con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");




    $community_id = $_POST['community_id'];
    $record_title = $_POST['record_title'];
	$record_content = $_POST['record_content'];
	$path = "uploads/";
    $filename = str_replace(' ', '_',$_FILES['uploaded_file']['name']);
	$file_path = $path . basename(str_replace(' ', '_',$_FILES['uploaded_file']['name']));
   
	

       $seldb = @mysqli_select_db($db_link,"commun");
          if(!$seldb) die("資料庫選擇失敗!!");
        //新增資料進資料庫語法
        $sql = "insert into record (community_id,record_title,record_content_file,record_content) values ('$community_id','$record_title','$filename','$record_content')";
    
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