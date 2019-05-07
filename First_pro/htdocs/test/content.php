<?php
 header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
	$mb_name = $_POST['mb_name'];
$sql_query = "SELECT mb_id FROM member where mb_name='$mb_name'";

   
$result = mysqli_query($db_link, $sql_query);

 
//$result = mysqli_query($con,$query);
	while($row_result=mysqli_fetch_assoc($result)){
		foreach($row_result as $item=>$value){
			echo $item."=".$value."<br>";
		}
		echo "<hr />";
	}



?>