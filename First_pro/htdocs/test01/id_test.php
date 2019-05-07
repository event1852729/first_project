<?php
header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
   $con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");
	$DefaultId = 0;
$GetOldIdSQL ="SELECT album.ab_id FROM album ORDER BY ab_id DESC limit 1";
 
 $Query = mysqli_query($con,$GetOldIdSQL);
 
while($row_result=mysqli_fetch_assoc($Query)){
	foreach($row_result as $item=>$value){
			echo $item."=".$value."<br>";
		}
		echo "<hr />";
	}
	$DefaultId = $value + 1;
	echo $DefaultId ;
	
	
	for ($i=0; $i < 9; $i++){
		
		echo $DefaultId;
	}
	
?>