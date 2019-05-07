<?php
header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   $con=mysqli_connect("127.0.0.1","root","a12345","commun") or die("Database not connected");
	if (!$seldb) die("資料庫選擇失敗！");

$ab_name = $_POST['ab_name'];
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

                //判斷帳號密碼是否為空值
                //確認密碼輸入的正確性

                $seldb = @mysqli_select_db($db_link,"commun");
                if(!$seldb) die("資料庫選擇失敗!!");
                 //新增資料進資料庫語法
               $sq = "insert into album (ab_id,ab_name) values ('$DefaultId','$ab_name')";
    
             if(mysqli_query($db_link,$sq))
              {
			    $response = array();
 
if (isset($_FILES['image' . 0 ])) {
	
	if(isset($_POST['directory'])){
		$directory = $_POST['directory'];
		$full_directory_path = 'upload/' . $directory;
		
		
		//Checking folder , is already available or not
		//if(!is_dir($full_directory_path)){
		
			//Making a new folder
			//mkdir($full_directory_path, 0777, true);
		//}
		
		//Specifies where files are saved
		for ($i=0; $i < $_POST['numberOfFiles']; $i++){
			$ab_id = $DefaultId;
			$fliename = $_FILES['image' . $i]['name'];
			$target_path = $full_directory_path . basename($_FILES['image' . $i]['name']);
			 $seldb = @mysqli_select_db($db_link,"commun");
          
             $sql = "insert into photo (ph_pic,ab_id) values ('$fliename','$ab_id')";
             mysqli_query($db_link,$sql);
			 
        
			if (!move_uploaded_file($_FILES['image' . $i]['tmp_name'], $target_path)) {
			
				//File failed to be moved to the server , usually because the destination folder is not available
				$response['kode'] = 1;
				$response['pesan'] = "Server error";
				echo json_encode($response);
				return;
			}
			 
		}
		
		// File uploaded successfully
		$response['kode'] = 2;
		$response['pesan'] = "File uploaded successfully!";
		echo json_encode($response);
		
	}
} else {
	
	//If the file is not sent from android
	$response['kode'] = 0;
	$response['pesan'] = 'File not sent from android!';
	echo json_encode($response);
}
               echo '新增成功!';
                
               }
              else
              {
                echo '新增失敗!';
                
              }
?>