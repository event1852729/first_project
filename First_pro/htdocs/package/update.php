<html>
<head>
<meta charset="utf-8"/>
<title>公告修改</title>
</head>
<body>
<form  action="update_finish.php" method="post" enctype="multipart/form-data" >

編號：<input type="int" name="pg_id" /> <br>
包裹收取日期：<input type="day" name="pg_date" /> <br>
狀態:<input type="int" name="pg_status" /><br />
<input type="submit" name="submit" value="送出資料" />
</form>
</body>
</html>