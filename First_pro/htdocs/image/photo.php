<?php
header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");
	
	$con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");
	
		
		if(isset($_POST['encoded_string'])){
			$encoded_string = $_POST['encoded_string'];
			$image_name = $_POST['image_name'];
			
			$decoded_string = base64_decode($encoded_string);
			
			$path = 'uploads/'.$image_name;
			
			$file = fopen($path,'w+');
			
			$is_written = fwrite($file,$decoded_string);
			fclose($file);
			
			if($is_written > 0){
                 $con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");
				 $sql = "insert into image (name,path) values ('$image_name','$path')";
				  if(mysqli_query($con,$sql))
				  {
				
				    echo "win";
			       }
			       else
			        { 
				       echo "loss";
			        }
			  mysqli_close($con);
				
			}
		}

	
?>