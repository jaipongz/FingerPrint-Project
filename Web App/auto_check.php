<?php
	
	$day_1 = date('l');
	$day_2 = 'Sunday';
	
	$under = '-';
	$one = '1';
	$curdate = date('Y-m-d');
	
	include 'connect.php';
	
	if($day_1 != $day_2){
		
		$strSQL = "SELECT * FROM report WHERE date='$curdate'";
		$objQuery = mysql_query($strSQL) or die (mysql_error());
		$result=mysql_query($strSQL);
		$count=mysql_num_rows($result);
		if($count == 25){
			
			echo "OK Check Auto, then";
			
		}else{
			
			$sql = "INSERT INTO report (id) SELECT id FROM user WHERE id";
			$objQuery = mysql_query($sql);
			if($objQuery){
				
				$sql = "UPDATE report SET inn='$under', late='$under', miss='$one', date='$curdate' WHERE date=''";
				$objQuery = mysql_query($sql);
				if($objQuery){
					echo "Check Auto OK";
				}else{
					echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
				}	
			}else{
				echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
			}
			
		}
		
	}else{
		
		echo "Today is a holiday";
		
	}
	
	
?>