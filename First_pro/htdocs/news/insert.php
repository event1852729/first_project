<html>
<head>
<meta charset="utf-8"/>
<title>公告新增</title>
</head>
<body>
<form  action="insert_finish.php" method="POST" enctype="multipart/form-data" >
標題：<input type="text" name="n_title" /> <br>
內容：<input type="text" name="n_content" /> <br>
檔案:<input type="file" id="n_files" name="n_files" /><br />
<input type="submit" name="submit" value="送出資料" />
</form>
</body>
</html>
