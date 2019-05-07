<?php

header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");

$con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");
$community_name = $_POST['community_name'];
$community_manager_name = $_POST['community_manager_name'];
$community_manager_phone = $_POST['community_manager_phone'];
$community_manager_address = $_POST['community_manager_address'];
$community_manager_mail = $_POST['community_manager_mail'];
$community_number = $_POST['community_number'];

$DefaultId = 0;
$GetOldIdSQL ="SELECT community.community_id FROM community ORDER BY community_id DESC limit 1";
 
 $Query = mysqli_query($con,$GetOldIdSQL);
 
while($row_result=mysqli_fetch_assoc($Query)){
		foreach($row_result as $item=>$value){
			echo $item."=".$value."<br>";
		}
		echo "<hr />";
	}
	$DefaultId = $value + 1;
	$community_id = "_".$DefaultId;
//判斷帳號密碼是否為空值
//確認密碼輸入的正確性

       $seldb = @mysqli_select_db($db_link,"commun");
          if(!$seldb) die("資料庫選擇失敗!!");
        //新增資料進資料庫語法
        $sql = "insert into community (community_id,community_name,community_manager_name,community_manager_phone,community_manager_address,community_manager_mail,community_number) values ('$DefaultId','$community_name','$community_manager_name','$community_manager_phone','$community_manager_address','$community_manager_mail','$community_number$community_id')";
    
    if(mysqli_query($db_link,$sql))
        {
			
              echo '新增成功!';
                
        }
        else
        {
                echo '新增失敗!';
                
        }
		
		


//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
        $mb_name = $community_name."的主委";
       $seldb = @mysqli_select_db($db_link,"commun");
          if(!$seldb) die("資料庫選擇失敗!!");
        //新增資料進資料庫語法
        $sql = "insert into member (community_id,mb_name,mb_pw,mb_manager,real_name,mb_phone,mb_address,mb_mail) values ('$DefaultId','$mb_name','$community_number$community_id','1','$community_manager_name','$community_manager_phone','$community_manager_address','$community_manager_mail')";
    
    if(mysqli_query($db_link,$sql))
        {
			 //$to = $_POST['community_manager_mail'];; //收件者
             //$subject = "GO!~~~社即"; //信件標題
             //$msg = "您的啟動碼為".$community_number$DefaultId;//信件內容
             //$headers = "From: GodsSeason@gmail.com"; //寄件者
  
             //if(mail("$to", "$subject", "$msg", "$headers")):
             //echo "信件已經發送成功。";//寄信成功就會顯示的提示訊息
             //else:
             //echo "信件發送失敗！";//寄信失敗顯示的錯誤訊息
             //endif;
              echo '新增成功!';
                
        }
        else
        {
                echo '新增失敗!';
                
        }
             $to = $_POST['community_manager_mail'];; //收件者
             $subject = "GO!~~~社即"; //信件標題
             $msg = "親愛的用戶您好:\n您的啟動碼為:".$community_number.$community_id;//信件內容
             $headers = "From: GodsSeason@gmail.com"; //寄件者
  
             if(mail("$to", "$subject", "$msg", "$headers")):
             echo "信件已經發送成功。";//寄信成功就會顯示的提示訊息
             else:
             echo "信件發送失敗！";//寄信失敗顯示的錯誤訊息
             endif;

?>