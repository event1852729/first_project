<?php
header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
$con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");
$msg_content = $_POST['msg_content'];
$applicant_id = $_POST['applicant_id'];

 $sq = "update applicant set applicant_status= '1' where applicant_id='$applicant_id'";
        if(mysqli_query($db_link,$sq))
        {
                echo '修改成功!';
               
        }
        else
        {
                echo '修改失敗!';
               
        }
             $to = $_POST['applicant_mail']; //收件者
             $subject = "GO!~~~社即"; //信件標題
             $msg = "親愛的用戶您好,很抱歉您未通過本社區的審核,原因如下:\n".$msg_content;//信件內容
             $headers = "From: GodsSeason@gmail.com"; //寄件者
  
             if(mail("$to", "$subject", "$msg", "$headers")):
             echo "信件已經發送成功。";//寄信成功就會顯示的提示訊息
             else:
             echo "信件發送失敗！";//寄信失敗顯示的錯誤訊息
             endif;
?>