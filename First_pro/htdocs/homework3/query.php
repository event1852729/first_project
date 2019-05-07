<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>Document</title>
  <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="sample.css">
 </head>
 <body>

<?php 
	 error_reporting(E_ALL^E_NOTICE); 		
 	  $searchtxt = $_GET["searchtxt"];
?>
    <form action="query.php" method=get>
	<input type=hidden name="method" value="query"> <!-- 現在method變數值是query，避免搜尋後值消失，所以用hidden再傳一次值 -->
	<p align=center><input type=text name="searchtxt" value=""><input type=submit value="搜尋公告編號" placeholder="小麻煩只做都找零"></p>
	</form>
    <table class="table table-hover">
	  <tr class="warning"><td>公告編號</td><td>標題</td><td>內容</td><td>時間</td><td>功能</td></tr>
    <?php
	  
	  $db_link = mysqli_connect("localhost", "root" , "a12345");
		    mysqli_query( $db_link  , "set names utf8");
		   $seldb = @mysqli_select_db($db_link, "temp");
		   
			if (!$seldb) die("資料庫選擇失敗！");
	
	
	  if(empty($searchtxt))
	    {
		
	      $sql="select * from ststudent";
		}
	  else
	    {
		  $sql="select * from ststudent where stid like '%$searchtxt%' or stname like '%$searchtxt%'";
		}
	  	$rs = mysqli_query($db_link, $sql);
		while($record = mysqli_fetch_assoc($rs)){
		$content = $record['content'];
		$record['content'] = nl2br($record['content']);
		
		echo "<tr><td>{$record['stid']}</td><td>{$record['stname']}</td><td>{$record['content']}</td><td>{$record['date']}</td>";
		echo "<td><a href=input_insert.php?method=update&stid={$record['stid']}&title={$record['stname']}&content={$content}&date={$record['date']}>[修改]</a>、<a href=delete.php?method=delete&stid={$record['stid']}>[刪除]</a>";
	
	}	
	
	
		
	  
	?>
 </body>
   
</html>
