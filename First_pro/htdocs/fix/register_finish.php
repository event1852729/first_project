<?php

header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");

$con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");

$mb_id = $_POST['mb_id'];
$community_id = $_POST['community_id'];
$fix_status_id = $_POST['fix_status_id'];
$fix_content = $_POST['fix_content'];

$fix_place = $_POST['fix_place'];
$DefaultId = 0;
$ImageData = $_POST['image_path'];
//$ImageName = $_POST['image_name'];

$GetOldIdSQL ="SELECT fix.fix_id FROM fix ORDER BY fix_id DESC limit 1";
 
 $Query = mysqli_query($con,$GetOldIdSQL);
 
while($row_result=mysqli_fetch_assoc($Query)){
		foreach($row_result as $item=>$value){
			echo $item."=".$value."<br>";
		}
		echo "<hr />";
	}
	$DefaultId = $value + 1;
 $a = md5(uniqid(rand()));
 $b = ".png";
$ImagePath = "uploads/$a$DefaultId$b";
$ServerURL = "http://140.126.146.49:20001/fix/$ImagePath";
//判斷帳號密碼是否為空值
//確認密碼輸入的正確性

       $seldb = @mysqli_select_db($db_link,"commun");
          if(!$seldb) die("資料庫選擇失敗!!");
        //新增資料進資料庫語法
        $sql = "insert into fix (community_id,fix_status, mb_id, fix_content, fix_place,fix_pic) values ('$community_id','$fix_status_id','$mb_id','$fix_content','$fix_place','$a$DefaultId$b')";
    
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