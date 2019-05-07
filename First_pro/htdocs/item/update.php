<html>
<head>
<meta charset="utf-8"/>
<title>公告修改</title>
</head>
<body>
<form  action="update_finish.php" method="post" enctype="multipart/form-data" >


$it_id <input type="int"  name="it_id"  /><br />
$it_name <input type="text"  name="it_name"  /><br />
$it_day <input type="int"  name="it_day"  /><br />
$it_stime <input type="int"  name="it_stime"  /><br />
$it_etime <input type="int"  name="it_etime"  /><br />
$it_limt <input type="int"  name="it_limt"  /><br />
$it_stauts <input type="int"  name="it_stauts"  /><br />


<input type="submit" name="submit" value="送出資料" />
</form>
</body>
</html>