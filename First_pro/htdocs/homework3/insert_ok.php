<?php
error_reporting(E_ALL^E_NOTICE); 
$method = $_GET["method"];
if(empty($method))
{
	$method = $_POST["method"];
}
?>

  <center>
  <form method="post" action="index.php">
   <input type=hidden name="method" value="query">
   <table class="RedList" align=center width="40%">
   <caption  class="RedListCap"><?php echo $method?>成功</caption>
   <tr align=center>
	<td colspan=2><input type="submit" value="確認" ></td>	
   </tr>
   </table>
  </form></center>
