<?php
	$curdate = date('Y-m-d');
	$curtime = date('H:i:s');
	
	$day_chk = date('N', strtotime($curdate));

	$timechk = explode(":",$curtime);
	$timechk = $timechk[0];
	$timechk_2 = $timechk-1;
	
	$under = '-';
	$one = '1';
	$null = time('00:00:00');
	
	$timecheck_1 = "00:00:00";
	$timecheck_2 = "24:00:00";

	$password = $_GET['code'];
	$id = $_GET['id'];
	
	$passcode = "123456789";

	$objConnect = mysql_connect("localhost","wittawat","123456789") or die(mysql_error());
	$objDB = mysql_select_db("admin");
		
	$strSQL = "SELECT * FROM data WHERE date='$curdate' AND id='$id'";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$result=mysql_query($strSQL);
			
		if($result){
			
			$strSQL = "SELECT * FROM data WHERE date='$curdate' AND id='$id' AND (timediff('$curtime',timein_1)/(60)) > 2";
			$objQuery = mysql_query($strSQL) or die (mysql_error());
			$result=mysql_query($strSQL);
			$count=mysql_num_rows($result);
			if($count == 1){
				
				$strSQL = "SELECT * FROM data WHERE date='$curdate' AND id='$id'";
				$objQuery = mysql_query($strSQL) or die (mysql_error());
				$result=mysql_query($strSQL);
				$count=mysql_num_rows($result);
				while($objResult = mysql_fetch_array($objQuery)){
			
					$in_1 = $objResult['timein_1'];
					$in_2 = $objResult['timein_2'];
					$out_1 = $objResult['timeout_1'];
					$out_2 = $objResult['timeout_2'];
					echo $in_1;
					echo $in_2;
					echo $out_1;
					echo $out_2;
			
				}
				if($out_2 == $null){
					
					$strSQL = "SELECT * FROM data WHERE date='$curdate' AND id='$id' AND (timediff('$curtime',timeout_1)/(60)) > 2";
					$objQuery = mysql_query($strSQL) or die (mysql_error());
					$result=mysql_query($strSQL);
					$count=mysql_num_rows($result);
					if($count == 1){
						
						$strSQL = "SELECT * FROM data WHERE date='$curdate' AND id='$id' AND (timediff('$curtime',timein_2)/(60)) > 2";
						$objQuery = mysql_query($strSQL) or die (mysql_error());
						$result=mysql_query($strSQL);
						$count=mysql_num_rows($result);
						if($count == 1){
						
							$strSQL = "SELECT * FROM data WHERE date='$curdate' AND id='$id' AND (timediff('$curtime',timeout_2)/(60)) > 2";
							$objQuery = mysql_query($strSQL) or die (mysql_error());
							$result=mysql_query($strSQL);
							$count=mysql_num_rows($result);
							if($count == 1){ 
							
								if(isset($password) && ($password == $passcode)){
								
									if(isset($id)&&isset($id)&&isset($id)){

										$strSQL = "SELECT * FROM data WHERE date='$curdate' AND id='$id' AND timeout_2 LIKE '%{$curtime}%'";
										$objQuery = mysql_query($strSQL) or die (mysql_error());
										$result=mysql_query($strSQL);
										if($objQuery) {
											echo "A scan out PM<br/>";
										} else {
											echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
										}
										
									}
									
								}
									
							}else{
							
								$strSQL = "SELECT * FROM data WHERE date='$curdate' AND id='$id'";
								$objQuery = mysql_query($strSQL) or die (mysql_error());
								$result=mysql_query($strSQL);
								$count=mysql_num_rows($result);
								
								if($out_2 != $null){
									
									if(isset($password) && ($password == $passcode)){
										
										if(isset($id)&&isset($id)&&isset($id)){

											$strSQL = "SELECT * FROM data WHERE date='$curdate' AND id='$id' AND timeout_2 LIKE '%{$curtime}%'";
											$objQuery = mysql_query($strSQL) or die (mysql_error());
											$result=mysql_query($strSQL);
											if($objQuery) {
												echo "A scan out PM<br/>";
											} else {
												echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
											}
											
										}
										
									}
									
								}else if($out_2 == $null){
									
									if(isset($password) && ($password == $passcode)){
								
										if(isset($id)&&isset($id)&&isset($id)){

											$sql = "UPDATE data SET timeout_2='$curtime' WHERE id='$id' AND date='$curdate'";
											$objQuery = mysql_query($sql);
											$result=mysql_query($strSQL);
											if($objQuery) {
												echo "OK UPDATE Time_Out PM<br/>";
											} else {
												echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
											}
											
										}
										
									}
									
								}
								
							}
							
						}else{
						
							$strSQL = "SELECT * FROM data WHERE date='$curdate' AND id='$id'";
							$objQuery = mysql_query($strSQL) or die (mysql_error());
							$result=mysql_query($strSQL);
							$count=mysql_num_rows($result);
							
							if($in_2 != $null){
								
								if(isset($password) && ($password == $passcode)){
				
									if(isset($id)&&isset($id)&&isset($id)){

										$strSQL = "SELECT * FROM data WHERE date='$curdate' AND id='$id' AND timein_2 LIKE '%{$curtime}%'";
										$objQuery = mysql_query($strSQL) or die (mysql_error());
										$result=mysql_query($strSQL);
										if($objQuery) {
											echo "Are scanned, then PM<br/>";
										} else {
											echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
										}
										
									}
									
								}
							
							}else if($in_2 == $null){
							
								if(isset($password) && ($password == $passcode)){
							
									if(isset($id)&&isset($id)&&isset($id)){

										$sql = "UPDATE data SET timein_2='$curtime' WHERE id='$id' AND date='$curdate'";
										$objQuery = mysql_query($sql);
										$result=mysql_query($strSQL);
										if($objQuery) {
											echo "OK UPDATE Time_In PM<br/>";
										} else {
											echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
										}
										
									}
									
								}
								
							}
							
						}
						
					
					}else{
						
						$strSQL = "SELECT * FROM data WHERE date='$curdate' AND id='$id'";
						$objQuery = mysql_query($strSQL) or die (mysql_error());
						$result=mysql_query($strSQL);
						$count=mysql_num_rows($result);
						
						if($out_1 == $null){
						
							if(isset($password) && ($password == $passcode)){
						
								if(isset($id)&&isset($id)&&isset($id)){

									$sql = "UPDATE data SET timeout_1='$curtime' WHERE id='$id' AND date='$curdate'";
									$objQuery = mysql_query($sql);
									$result=mysql_query($strSQL);
									if($objQuery) {
										echo "OK UPDATE Time_Out AM<br/>";
									} else {
										echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
									}
								
								}
								
							}
							
						}else if($out_1 != $null){
							
							if(isset($password) && ($password == $passcode)){
						
								if(isset($id)&&isset($id)&&isset($id)){

									$strSQL = "SELECT * FROM data WHERE date='$curdate' AND id='$id' AND timeout_1 LIKE '%{$curtime}%'";
									$objQuery = mysql_query($strSQL) or die (mysql_error());
									$result=mysql_query($strSQL);
									if($objQuery) {
										echo "A scan out AM<br/>";
									} else {
										echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
									}
									
								}
								
							}
						
						}
					
					}
				}
			}else{
			
				$strSQL = "SELECT * FROM data WHERE date='$curdate' AND id='$id'";
				$objQuery = mysql_query($strSQL) or die (mysql_error());
				$result=mysql_query($strSQL);
				$count=mysql_num_rows($result);
				
				if($count == 1){
					
					if(isset($password) && ($password == $passcode)){
					
						if(isset($id)&&isset($id)&&isset($id)){

							$strSQL = "SELECT * FROM data WHERE date='$curdate' AND id='$id' AND timeout_1 LIKE '%{$curtime}%'";
							$objQuery = mysql_query($strSQL) or die (mysql_error());
							$result=mysql_query($strSQL);
							if($objQuery) {
								echo "Are scanned, then AM<br/>";
							} else {
								echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
							}
							
						}
					
					}
				
				}else{
				
					if(isset($password) && ($password == $passcode)){
					
						if(isset($id)&&isset($id)&&isset($id)){

							$sql = "INSERT INTO data (date, timein_1, timeout_1, id, timein_2, timeout_2)
							VALUES ('$curdate', '$curtime', '$null', '$id','$null', '$null')";
							$objQuery = mysql_query($sql);
							if($objQuery) {
								echo "OK INSERT data Time_In AM<br/>";
							} else {
								echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
							}
							
						}
						
					}
					
				}
				
			}
			
		}
	
	$strSQL = "SELECT * FROM report WHERE date='$curdate' AND id='$id'";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$result=mysql_query($strSQL);
	$count = mysql_num_rows($result);
	if($count == 1){
		
		$strSQL = "SELECT * FROM report WHERE date='$curdate' AND id='$id' AND miss='$one'";
		$objQuery = mysql_query($strSQL) or die (mysql_error());
		$result=mysql_query($strSQL);
		$count = mysql_num_rows($result);
		if($count == 1){
		
			$strSQL = "SELECT * FROM check_time WHERE day='$day_chk' AND time_check BETWEEN '$timecheck_1' AND '$timecheck_2'";
			$objQuery = mysql_query($strSQL) or die (mysql_error());
			$result = mysql_query($strSQL);	
			$count=mysql_num_rows($result);
			if($count==1){
		
				while($objResult = mysql_fetch_array($objQuery)){
		
					$timecheck = $objResult['time_check'];
					//echo "$timecheck";
					
				}if($curtime < $timecheck){
					
					$strSQL = "SELECT * FROM report WHERE date='$curdate' AND id='$id'";
					$objQuery = mysql_query($strSQL) or die (mysql_error());
					$result=mysql_query($strSQL);
					$count=mysql_num_rows($result);
					if($count == 1){
						
						$strSQL = "SELECT * FROM report WHERE date='$curdate' AND id='$id'";
						$objQuery = mysql_query($strSQL) or die (mysql_error());
						$result=mysql_query($strSQL);
							
							if(isset($password) && ($password == $passcode)){
									
								if(isset($id)&&isset($id)&&isset($id)){
								
									$sql = "UPDATE report SET inn='$one', late='$under', miss='$under' WHERE id='$id'";
									$objQuery = mysql_query($sql);
									if($objQuery) {
										echo "You come to work<br/>";
									} else {
										echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
									}
									
								}
								
							}
						
					}
					
				}else if($curtime > $timecheck){
					
					$strSQL = "SELECT * FROM report WHERE date='$curdate' AND id='$id'";
					$objQuery = mysql_query($strSQL) or die (mysql_error());
					$result=mysql_query($strSQL);
					$count=mysql_num_rows($result);
					if($count == 1){
						
						$strSQL = "SELECT * FROM report WHERE date='$curdate' AND id='$id'";
						$objQuery = mysql_query($strSQL) or die (mysql_error());
						$result=mysql_query($strSQL);
							
							if(isset($password) && ($password == $passcode)){
									
								if(isset($id)&&isset($id)&&isset($id)){
								
									$sql = "UPDATE report SET inn='$under', late='$one', miss='$under' WHERE id='$id'";
									$objQuery = mysql_query($sql);
									if($objQuery) {
										echo "You're late for work<br/>";
									} else {
										echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
									}
									
								}
								
							}
						
					}
					
				}
				
			}
		
		}else{
			
			$strSQL = "SELECT * FROM report WHERE date='$curdate' AND miss='$one'";
			$objQuery = mysql_query($strSQL) or die (mysql_error());
			$result=mysql_query($strSQL);
			if($objQuery) {
				echo "Have already<br/>";
			} else {
				echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
			}
			
		}
	}else{
		
		$sql = "INSERT INTO report (id) SELECT id FROM user WHERE id";
		$objQuery = mysql_query($sql);
		if($objQuery) {
			$sql = "UPDATE report SET inn='$under', late='$under', miss='$one', date='$curdate' WHERE date=''";
			$objQuery = mysql_query($sql);
			if($objQuery) {
				
			$strSQL = "SELECT * FROM check_time WHERE day='$day_chk' AND time_check BETWEEN '$timecheck_1' AND '$timecheck_2'";
			$objQuery = mysql_query($strSQL) or die (mysql_error());
			$result = mysql_query($strSQL);	
			$count=mysql_num_rows($result);
			if($count==1){
		
				while($objResult = mysql_fetch_array($objQuery)){
		
					$timecheck = $objResult['time_check'];
					//echo "$timecheck";
					
				}if($curtime < $timecheck){
					
					$strSQL = "SELECT * FROM report WHERE date='$curdate' AND id='$id'";
					$objQuery = mysql_query($strSQL) or die (mysql_error());
					$result=mysql_query($strSQL);
					$count=mysql_num_rows($result);
					if($count == 1){
						
						$strSQL = "SELECT * FROM report WHERE date='$curdate' AND id='$id'";
						$objQuery = mysql_query($strSQL) or die (mysql_error());
						$result=mysql_query($strSQL);
							
							if(isset($password) && ($password == $passcode)){
									
								if(isset($id)&&isset($id)&&isset($id)){
								
									$sql = "UPDATE report SET inn='$one', late='$under', miss='$under' WHERE id='$id'";
									$objQuery = mysql_query($sql);
									if($objQuery) {
										echo "You come to work<br/>";
									} else {
										echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
									}
									
								}
								
							}
						
					}
					
				}else if($curtime > $timecheck){
					
					$strSQL = "SELECT * FROM report WHERE date='$curdate' AND id='$id'";
					$objQuery = mysql_query($strSQL) or die (mysql_error());
					$result=mysql_query($strSQL);
					$count=mysql_num_rows($result);
					if($count == 1){
						
						$strSQL = "SELECT * FROM report WHERE date='$curdate' AND id='$id'";
						$objQuery = mysql_query($strSQL) or die (mysql_error());
						$result=mysql_query($strSQL);
							
							if(isset($password) && ($password == $passcode)){
									
								if(isset($id)&&isset($id)&&isset($id)){
								
									$sql = "UPDATE report SET inn='$under', late='$one', miss='$under' WHERE id='$id'";
									$objQuery = mysql_query($sql);
									if($objQuery) {
										echo "You're late for work<br/>";
									} else {
										echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
									}
									
								}
								
							}
						
					}
					
				}
				
			}
			} else {
				echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
			}
				
		} else {
			echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
		}
		
	}
	
		mysql_close($objConnect);
	
?>