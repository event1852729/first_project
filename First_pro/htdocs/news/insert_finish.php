<?php

header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
$con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");
if(isset($_POST['submit'])){
	$n_title = $_POST['n_title'];
    $n_content = $_POST['n_content'];
	
	$n_files = $_FILES['n_files']['name'];
	$temp = $_FILES['n_files']['tmp_name'];
	
	$sql = "insert into news (n_title, n_content, n_files,n_filename) values ( '$n_title', '$n_content', '$n_files','$n_files')";
	//mysqli_query($db_link,$sql);
	if(mysqli_query($db_link,$sql))
	{
		$path = "uploads/";
		move_uploaded_file($temp,$path.$n_files);
		echo "data save";}
    else{echo "try again";}
}
else{
	echo "家華";
}
//$n_title = $_POST['n_title'];
//$n_content = $_POST['n_content'];
//$n_files = $_POST['n_files'];
//判斷帳號密碼是否為空值
//確認密碼輸入的正確性

      // $seldb = @mysqli_select_db($db_link,"commun");
         // if(!$seldb) die("資料庫選擇失敗!!");
        //新增資料進資料庫語法
        //$sql = "insert into news (n_title, n_content) values ( '$n_title', '$n_content')";
		
    //if(mysqli_query($db_link,$sql))
        //{
                //echo '新增成功!';
                
        //}
        //else
        //{
                //echo '新增失敗!';
                
       // }


?>