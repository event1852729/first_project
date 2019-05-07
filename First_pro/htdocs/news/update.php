<?php
header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
	
	if($_SESSION['n_id'] != null)
{
        //將$_SESSION['username']丟給$id
        //這樣在下SQL語法時才可以給搜尋的值
        $id = $_SESSION['n_id'];
        //若以下$id直接用$_SESSION['username']將無法使用
        $sql = "SELECT * FROM news where n_id='$id'";
        $result = mysqli_query($db_link,$sql);
        $row = mysql_fetch_row($result);
    
        echo "<form name=\"form\" method=\"post\" action=\"update_finish.php\">";
        echo "編號：<input type=\"text\" name=\"n_id\" value=\"$row[1]\" />(此項目無法修改) <br>";
        echo "標題：<input type=\"text\" name=\"n_title\" value=\"$row[2]\" /> <br>";
        echo "內容：<input type=\"text\" name=\"n_content\" value=\"$row[3]\" /> <br>";
        echo "<input type=\"submit\" name=\"button\" value=\"確定\" />";
        echo "</form>";
}
else
{
        echo '您無權限觀看此頁面!';
        
}
?>