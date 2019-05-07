<?php

header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
$n_title = $_POST['n_title'];
$n_content = $_POST['n_content'];

$query = "SELECT n_id FROM `news` WHERE n_title='$n_title'";
	$result = mysqli_query($con,$query);
	while($row_result=mysqli_fetch_array($result)){
		foreach($row_result as $item=>$value){
			echo $item."=".$value."<br>";
		}
		echo "<hr />";
	}



//判斷帳號密碼是否為空值
//確認密碼輸入的正確性

       $seldb = @mysqli_select_db($db_link,"commun");
          if(!$seldb) die("資料庫選擇失敗!!");
        //新增資料進資料庫語法
        $sql = "UPDATE news SET n_title='$n_title', n_content='$n_content' WHERE n_id='$value'";;
    
    if(mysqli_query($db_link,$sql))
        {
                echo '新增成功!';
                
        }
        else
        {
                echo '新增失敗!';
                
        }


?>