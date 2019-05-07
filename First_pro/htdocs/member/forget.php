<?php
 header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
	$community_name = $_POST['community_name'];
	$mb_pw = $_POST['mb_pw'];
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
	
	$data = $mb_pw."_".$value;
	$sql = "update member set mb_pw='$data' where real_name='$applicant_name' and mb_phone ='$applicant_phone' and mb_address='$applicant_address' and mb_mail = '$applicant_mail' and community_id = '$value'";
        if(mysqli_query($db_link,$sql))
        {
                echo '修改成功!';
               
        }
        else
        {
                echo '修改失敗!';
               
        }
	$sq = "SELECT member.mb_id FROM member where (member.real_name='$applicant_name' and member.mb_phone = '$applicant_phone' and member.mb_address = '$applicant_address' and member.mb_mail = '$applicant_mail')";

   
     $a = mysqli_query($db_link, $sq);

 

	while($row_result=mysqli_fetch_assoc($a)){
		foreach($row_result as $item=>$c){
			echo $item."=".$value."<br>";
		}
		echo "<hr />";
	}
	echo $c;
	
	if(isset($c))
	{
		     $to = $applicant_mail; //收件者
            $subject = "GO!~~~社即"; //信件標題
            $msg = "親愛的用戶您好:\n此為您新的啟動碼:".$data;//信件內容
             $headers = "From: GodsSeason@gmail.com"; //寄件者
  
             if(mail("$to", "$subject", "$msg", "$headers")){
             echo "信件已經發送成功。";//寄信成功就會顯示的提示訊息
			 }
             else{
             echo "信件發送失敗！";//寄信失敗顯示的錯誤訊息
             }
		
	}else{echo "無此住戶!!";}
		    
?>