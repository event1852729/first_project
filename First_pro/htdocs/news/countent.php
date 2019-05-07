<?php
 header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
$community_id = $_POST['community_id'];
$sql_query = "SELECT news.* FROM news where (news.community_id = '$community_id') ORDER BY n_id DESC";

   
$result = mysqli_query($db_link, $sql_query);
 
while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
	
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);


$mb_id = $_POST['mb_id'];
$n_id = $_POST['n_id'];


$sql_q = "SELECT newsdecide.decide_id FROM newsdecide where (newsdecide.mb_id = $mb_id and newsdecide.n_id = $n_id)";

   
$result = mysqli_query($db_link, $sql_q);

 

	while($row_result=mysqli_fetch_assoc($result)){
		foreach($row_result as $item=>$value){
			echo $item."=".$value."<br>";
		}
		echo "<hr />";
	}
	echo $value;
if(isset($value)){
	echo "已讀";
}else{

$mb_id = $_POST['mb_id'];
$n_id = $_POST['n_id'];





//判斷帳號密碼是否為空值
//確認密碼輸入的正確性

       $seldb = @mysqli_select_db($db_link,"commun");
          if(!$seldb) die("資料庫選擇失敗!!");
        //新增資料進資料庫語法
        $sql = "insert into newsdecide (mb_id,n_id) values ('$mb_id','$n_id')";
    
    if(mysqli_query($db_link,$sql))
        {
                echo '新增成功!';
                
        }
       else
        {
                echo '新增失敗!';
                
        }
echo "未讀";
}
?>



