<?php

header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");

$con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");
$community_id = $_POST['community_id'];
$real_name = $_POST['real_name'];
$mb_phone = $_POST['mb_phone'];
$mb_address = $_POST['mb_address'];
$mb_mail = $_POST['mb_mail'];
$mb_pw = $_POST['mb_pw'];
$mb_manager = $_POST['mb_manager'];
if($mb_manager == 2){
	$community_id = $_POST['community_id'];
$real_name = $_POST['real_name'];
$mb_phone = $_POST['mb_phone'];
$mb_address = $_POST['mb_address'];
$mb_mail = $_POST['mb_mail'];
$mb_pw = $_POST['mb_pw'];
$sql_query = "SELECT community.community_name FROM community where community_id='$community_id'";

   
$result = mysqli_query($db_link, $sql_query);

 

	while($row_result=mysqli_fetch_assoc($result)){
		foreach($row_result as $item=>$value){
			echo $item."=".$value."<br>";
		}
		echo "<hr />";
	}
$name = $value."的警衛";

$data = $mb_pw."_".$community_id;
//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
        
       $seldb = @mysqli_select_db($db_link,"commun");
          if(!$seldb) die("資料庫選擇失敗!!");
        //新增資料進資料庫語法
        $sql = "insert into member (community_id,mb_name,mb_pw,mb_manager,mb_mail,real_name,mb_phone,mb_address) values ('$community_id','$name','$data','$mb_manager','$mb_mail','$real_name','$mb_phone','$mb_address')";
    
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
		



             $to = $_POST['mb_mail']; //收件者
             $subject = "GO!~~~社即"; //信件標題
             $msg = "親愛的用戶您好:\n您的啟動碼為:".$data;//信件內容
             $headers = "From: GodsSeason@gmail.com"; //寄件者
  
             if(mail("$to", "$subject", "$msg", "$headers")):
             echo "信件已經發送成功。";//寄信成功就會顯示的提示訊息
             else:
             echo "信件發送失敗！";//寄信失敗顯示的錯誤訊息
             endif;
}else{
	$community_id = $_POST['community_id'];
$real_name = $_POST['real_name'];
$mb_phone = $_POST['mb_phone'];
$mb_address = $_POST['mb_address'];
$mb_mail = $_POST['mb_mail'];
$mb_pw = $_POST['mb_pw'];
	$sql_query = "SELECT community.community_name FROM community where community_id='$community_id'";

   
$result = mysqli_query($db_link, $sql_query);

 

	while($row_result=mysqli_fetch_assoc($result)){
		foreach($row_result as $item=>$value){
			echo $item."=".$value."<br>";
		}
		echo "<hr />";
	}
$name = $value."的物業管理員";

$data = $mb_pw."_".$community_id;
//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
        
       $seldb = @mysqli_select_db($db_link,"commun");
          if(!$seldb) die("資料庫選擇失敗!!");
        //新增資料進資料庫語法
        $sql = "insert into member (community_id,mb_name,mb_pw,mb_manager,mb_mail,real_name,mb_phone,mb_address) values ('$community_id','$name','$data','$mb_manager','$mb_mail','$real_name','$mb_phone','$mb_address')";
    
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
		



             $to = $_POST['mb_mail']; //收件者
             $subject = "GO!~~~社即"; //信件標題
             $msg = "親愛的用戶您好:\n您的啟動碼為:".$data;//信件內容
             $headers = "From: GodsSeason@gmail.com"; //寄件者
  
             if(mail("$to", "$subject", "$msg", "$headers")):
             echo "信件已經發送成功。";//寄信成功就會顯示的提示訊息
             else:
             echo "信件發送失敗！";//寄信失敗顯示的錯誤訊息
             endif;
}

?>