<?php
$db_server = "localhost";
$db_name = "test";
$db_user = "root";
$db_passwd = "";
$db = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
if(mysqli_connect_errno($db))
	echo "fucking error";
mysqli_set_charset($db,'utf8');
if(!@mysqli_select_db($db,'report'))
        die("fuck");
?>