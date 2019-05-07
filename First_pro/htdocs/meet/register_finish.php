<?php

header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");

$con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");





$mt_title = $_POST['mt_title'];
$DefaultId = 0;
$ImageData = $_POST['image_path'];
//$ImageName = $_POST['image_name'];

$GetOldIdSQL ="SELECT meet.mt_id FROM meet ORDER BY mt_id DESC limit 1";
 
 $Query = mysqli_query($con,$GetOldIdSQL);
 
while($row_result=mysqli_fetch_assoc($Query)){
		foreach($row_result as $item=>$value){
			echo $item."=".$value."<br>";
		}
		echo "<hr />";
	}
	$DefaultId = $value + 1;
 $a = md5(uniqid(rand()));
 $b = ".zip";
$ImagePath = "uploads/$a$DefaultId$b";
$ServerURL = "http://140.126.146.49:20001/meet/$ImagePath";
 

//判斷帳號密碼是否為空值
//確認密碼輸入的正確性

       $seldb = @mysqli_select_db($db_link,"commun");
          if(!$seldb) die("資料庫選擇失敗!!");
        //新增資料進資料庫語法
        $sql = "insert into meet (mt_title,mt_content) values ('$mt_title','$a$DefaultId$b')";
    
    if(mysqli_query($db_link,$sql))
        {
			 file_put_contents($ImagePath,base64_decode($ImageData));
               echo '新增成功!';
                
        }
        else
        {
                echo '新增失敗!';
                
        }


?>