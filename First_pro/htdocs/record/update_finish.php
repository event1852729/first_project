<?php

header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");

$con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");




    $record_id = $_POST['record_id'];
    $record_title = $_POST['record_title'];
	$record_content = $_POST['record_content'];
	$path = "uploads/";
    $filename = $_FILES['uploaded_file']['name'];
	$file_path = $path . basename($_FILES['uploaded_file']['name']);
   
	

       $seldb = @mysqli_select_db($db_link,"commun");
          if(!$seldb) die("資料庫選擇失敗!!");
        //新增資料進資料庫語法
        $sql = "UPDATE record SET record_title='$record_title',record_content='$filename',record_content='$record_content' WHERE record_id='$record_id'";
    
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