<head>
  <meta charset="UTF-8">
  <title>insert</title>
  <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="sample.css">
 </head>

 <?php
  $method=$_GET["method"];;
  
  $postid = $_GET["stid"];
	  $company = $_GET["title"];
	  $content = $_GET["content"];
	  $pdate = $_GET["date"];
  
?>
  <center>
  <form method="post" action=<?php echo $method ?>.php>
   <input type=hidden name="method" value="<?php echo $method ?>">
   <table class="RedList" align=center width="40%">
   <caption  class="RedListCap"><?php echo $method ?> 最新公告</caption>
   <tr>
	<td>公告代碼</td>
	<td><input type=text name="postid" value="<?php echo $postid ?>"></td>
   </tr>
   <tr>
	<td>公告標題</td>
	<td><input type=text name="company" value="<?php echo $company ?>"></td>
   </tr>
   <tr>
	<td>公告內容</td>
	<td> 
	   <textarea name="content" cols=40 rows=10><?php echo $content ?></textarea>
	</td>
   </tr>
   <tr>
	<td>公告日期</td>
	<td><input type=date name="pdate" value="<?php echo $pdate ?>"></td>
   </tr>
   <tr align=center>
	<td colspan=2><input type="submit" value=<?php echo $method ?> ></td>	
   </tr>
   </table>
  </form></center>
 