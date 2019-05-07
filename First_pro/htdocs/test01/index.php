<?php

header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");

if(isset($_POST['submit'])){
$n_title = $_POST['n_title'];
$n_content = $_POST['n_content'];
$n_files = $_POST['n_files'];

$n_files = $_FILES['n_files']['name'];
$temp = $_FILES['n_files']['tmp_name'];
//判斷帳號密碼是否為空值
//確認密碼輸入的正確性

       $seldb = @mysqli_select_db($db_link,"commun");
          if(!$seldb) die("資料庫選擇失敗!!");
        //新增資料進資料庫語法
        $sql = "insert into news (n_title, n_content,n_files ,n_filename) values ('$n_title', '$n_content','$n_files','$n_files')";
    
    if(mysqli_query($db_link,$sql))
        {
        $path = "upload/";
		move_uploaded_file($temp,$path.$n_files);
		echo "data save";
                
        }
        else
        {
                echo 'try again';
                
        }
}
else{echo "家華";};

?>
<html>
<head>
<meta charset="utf-8"/>
<title>公告修改</title>
</head>
<body>
<form   method="post" enctype="multipart/form-data" >

標題：<input type="text" name="n_title" /> <br>
內容：<input type="text" name="n_content" /> <br>
檔案:<input type="file"  name="n_files" multiple /><br />

<input type="submit" name="submit" value="送出資料" />
</form>
<p><br/></p>
<div class="row">
<?php
 header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");

$sql_query = "SELECT * FROM news ORDER BY n_id DESC";

   
$result = mysqli_query($db_link, $sql_query);
 
while($row = mysqli_fetch_assoc($result)){
	
	
?>
    <div class="col-sm-6 col-md-4">
	 <div class="thumbnail">
	   <img src = "upload/<?php echo $row['n_files']?>" alt="<?php echo $row['n_files']?>" alt="<?php echo $row['n_files']?>">
	   </div>
	  </div>
	  <?php
  }
  ?>
  </div>
</body>
</html>