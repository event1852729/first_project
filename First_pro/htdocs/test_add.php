<?php
			include("connect_database.php");
			$title = $_POST['test1'];
			$sql = "insert into test(test1) values	('$title')";
			if($stmt = $db->query($sql))
			{
				
			}
			echo "gagag";

		?>
