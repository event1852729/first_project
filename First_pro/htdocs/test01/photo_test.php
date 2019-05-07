<?php
 header("Content-Type:text/html; charset=utf-8");
   $db_link = mysqli_connect("localhost", "root" , "a12345");
    mysqli_query( $db_link  , "set names utf8");
   $seldb = @mysqli_select_db($db_link, "commun");
   
	if (!$seldb) die("資料庫選擇失敗！");

// array for json
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
			$fliename = $_FILES['image' . $i]['name'];
			$target_path = $full_directory_path . basename($_FILES['image' . $i]['name']);
			 $seldb = @mysqli_select_db($db_link,"commun");
          
             $sql = "insert into image (name) values ('$fliename')";
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
?>