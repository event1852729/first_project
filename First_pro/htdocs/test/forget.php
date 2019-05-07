<?php
 header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
$applicant_name = $_POST['applicant_name'];
$applicant_phone = $_POST['applicant_phone'];
$applicant_address = $_POST['applicant_address'];
$applicant_mail = $_POST['applicant_mail'];
	$sql_query = "SELECT member.mb_id FROM member where (member.real_name='$applicant_name' and member.mb_phone = '$applicant_phone' and member.mb_address = '$applicant_address' and member.mb_mail = '$applicant_mail')";

   
     $result = mysqli_query($db_link, $sql_query);

 

	while($row_result=mysqli_fetch_assoc($result)){
		foreach($row_result as $item=>$value){
			echo $item."=".$value."<br>";
		}
		echo "<hr />";
	}
	echo $value;
	
	if(isset($value))
	{
		    $to = "az655396@yahoo.com.tw"; //收件者
            $subject = "GO!~~~社即"; //信件標題
            $msg = "親愛的用戶您好:\n此為您新的啟動碼:";//信件內容
             $headers = "From: GodsSeason@gmail.com"; //寄件者
  
             if(mail("$to", "$subject", "$msg", "$headers")){
             echo "信件已經發送成功。";//寄信成功就會顯示的提示訊息
			 }
             else{
             echo "信件發送失敗！";//寄信失敗顯示的錯誤訊息
             }
                echo '修改成功!';
		
	}else{echo "無此住戶!!";}
	?>