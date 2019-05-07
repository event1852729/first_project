<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>login.php</title>
</head>
<body>
<?php
session_start();  // 啟用交談期
$username = "";  $password = "";
// 取得表單欄位值
if ( isset($_POST["mb_name"]) )
   $username = $_POST["mb_name"];
if ( isset($_POST["mb_pw"]) )
   $password = $_POST["mb_pw"];
// 檢查是否輸入使用者名稱和密碼
if ($username != "" && $password != "") {
   // 建立MySQL的資料庫連接 
   $link = mysqli_connect("localhost","root",
                          "a12345","commun")
        or die("無法開啟MySQL資料庫連接!<br/>");
   //送出UTF8編碼的MySQL指令
   mysqli_query($link, 'SET NAMES utf8'); 
   // 建立SQL指令字串
   $sql = "SELECT * FROM member WHERE mb_pw='";
   $sql.= $password."' AND mb_name='".$username."'";
   // 執行SQL查詢
   $result = mysqli_query($link, $sql);
   $total_records = mysqli_num_rows($result);
   // 是否有查詢到使用者記錄
   if ( $total_records > 0 ) {
      // 成功登入, 指定Session變數
      $_SESSION["login_session"] = true;
      header("Location: index.php");
   } else {  // 登入失敗
      echo "<center><font color='red'>";
      echo "使用者名稱或密碼錯誤!<br/>";
      echo "</font>";
      $_SESSION["login_session"] = false;
   }
   mysqli_close($link);  // 關閉資料庫連接  
}
?>
<form action="login.php" method="post">
<table align="center" bgcolor="#FFCC99">
 <tr><td><font size="2">使用者名稱:</font></td>
   <td><input type="text" name="mb_name" 
             size="15" maxlength="10"/>
   </td></tr>
 <tr><td><font size="2">使用者密碼:</font></td>
   <td><input type="password" name="mb_pw"
              size="15" maxlength="10"/>
   </td></tr>
 <tr><td colspan="2" align="center">
   <input type="submit" value="登入網站"/>
   </td></tr> 
</table>
</form>
</body>
</html>