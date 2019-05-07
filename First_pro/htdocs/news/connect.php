<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>資料庫</title>
</head>
<body>
<?php
//資料庫設定
//資料庫位置
$db_server = "localhost";
//資料庫名稱
$db_name = "complex";
//資料庫管理者帳號
$db_username = "root";
//資料庫管理者密碼
$db_passwd = "a12345";

//對資料庫連線
$db_link = @mysqli_connect($db_server,$db_username,$db_passwd);


if(!$db_link) die ("資料連結失敗!");

//資料庫連線採UTF8
mysqli_query($db_link,"SET NAMES 'utf8'");

//選擇資料庫


?>
</body>
</html>



