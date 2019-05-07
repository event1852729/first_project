<?php
		
			$five_ten = $_POST['50M'];
			$ten = $_POST['10M'];
			$five = $_POST['5M'];
			$one = $_POST['1M'];
			$inputmoney = $_POST['inputmoney'];
		
			
			echo "{$inputmoney} transfor :" ;echo "<br>";echo "<br>";
			
			if($five_ten=="1")
				echo "50*";echo (int)($inputmoney/50);echo "<br>";
				$a50yu = $inputmoney%50;
				if($ten=="1")
					echo "10*";echo (int)($a50yu/10);echo "<br>";
					$a10yu = $a50yu%10;
					if($five == "1")
						echo "5*";echo (int)($a10yu/5);echo "<br>";
						$a5yu = $a10yu%5;
						if($one == "1")
							echo "1*";echo (int)($a5yu/1);echo "<br>";
			
	



			
?>
