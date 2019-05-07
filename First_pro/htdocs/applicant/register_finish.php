<?php

header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");

$con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");
$community_name = $_POST['community_name'];
$sql_query = "SELECT community.community_id FROM community where community_name='$community_name'";

   
$result = mysqli_query($db_link, $sql_query);

 

	while($row_result=mysqli_fetch_assoc($result)){
		foreach($row_result as $item=>$value){
			echo $item."=".$value."<br>";
		}
		echo "<hr />";
	}

$applicant_name = $_POST['applicant_name'];
$applicant_phone = $_POST['applicant_phone'];
$applicant_address = $_POST['applicant_address'];
$applicant_mail = $_POST['applicant_mail'];



//判斷帳號密碼是否為空值
//確認密碼輸入的正確性

       $seldb = @mysqli_select_db($db_link,"commun");
          if(!$seldb) die("資料庫選擇失敗!!");
        //新增資料進資料庫語法
        $sql = "insert into applicant (community_id,applicant_name,applicant_phone,applicant_address,applicant_mail) values ('$value','$applicant_name','$applicant_phone','$applicant_address','$applicant_mail')";
    
    if(mysqli_query($db_link,$sql))
        {
			
              echo '新增成功!';
                
        }
        else
        {
                echo '新增失敗!';
                
        }
		
?>