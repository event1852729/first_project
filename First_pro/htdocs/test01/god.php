<html>
<head>
<meta charset="utf-8"/>
<title>公告修改</title>
</head>
<body>
<form  action="god_finish.php" method="post" enctype="multipart/form-data" >

標題：<input type="text" name="n_title" /> <br>
內容：<input type="text" name="n_content" /> <br>
檔案:<input type="file"  name="n_files[]" multiple /><br />

<input type="submit" name="submit" value="送出資料" />
</form>
</body>
</html>