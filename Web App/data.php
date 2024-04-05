<?php
	$curdate = date('Y-m-d');
	$curtime = date('H:i:s');
	
	$day_chk = date('N', strtotime($curdate));

	$timechk = explode(":",$curtime);
	$timechk = $timechk[0];
	$timechk_2 = $timechk-1;
	
	$under = '-';
	$one = '1';
	
	$timecheck_1 = "01:00:00";
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
					//echo $in_1;
					//echo $in_2;
					//echo $out_1;
					//echo $out_2;
			
				}
				if($out_2 == $under){
					
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
								
								if($out_2 != $under){
									
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
									
								}else if($out_2 == $under){
									
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
							
							if($in_2 != $under){
								
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
							
							}else if($in_2 == $under){
							
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
						
						if($out_1 == $under){
						
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
							
						}else if($out_1 != $under){
							
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
							VALUES ('$curdate', '$curtime', '$under', '$id','$under', '$under')";
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
								
									$sql = "UPDATE report SET inn='$one', late='$under', miss='$under' WHERE id='$id' AND date='$curdate'";
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
								
									$sql = "UPDATE report SET inn='$under', late='$one', miss='$under' WHERE id='$id' AND date='$curdate'";
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
			
			$strSQL = "SELECT * FROM report WHERE date='$curdate' AND miss='$one' AND id='$id'";
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
	
	$strSQL = "SELECT timein_1, timeout_1, timein_2, timeout_2 FROM data WHERE id='$id' AND date='$curdate'";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$result = mysql_query($strSQL);	
	
		while($objResult = mysql_fetch_array($objQuery)){
			
			$time_a = $objResult['timein_1'];
			$time_b = $objResult['timeout_1'];
			$time_c = $objResult['timein_2'];
			$time_d = $objResult['timeout_2'];
			$sumtime_am = difftime($time_a,$time_b);
			$sumtime_pm = diff1time($time_c,$time_d);
			$sumtime_all = diff2time($time_a,$time_b,$time_c,$time_d);
			echo "<br/>";
			echo $time_a;
			echo "<br/>";
			echo $time_b;
			echo "<br/>";
			echo $time_c;
			echo "<br/>";
			echo $time_d;
			echo "<br/>";
			
		}if($time_d != $under){
			
			$strSQL = "SELECT time_pm, time_all FROM sum_time WHERE id='$id' AND date='$curdate'";
			$objQuery = mysql_query($strSQL) or die (mysql_error());
			$result = mysql_query($strSQL);
			while($objResult = mysql_fetch_array($objQuery)){
				
				$timepm = $objResult['time_pm'];
				$timeall = $objResult['time_all'];
				
			}if($timepm == $under){
				
				if(isset($password) && ($password == $passcode)){
					
					if(isset($id)&&isset($id)&&isset($id)){
				
						$sql = "UPDATE sum_time SET time_pm='$sumtime_pm', time_all='$sumtime_all' WHERE id='$id' AND date='$curdate'";
						$objQuery = mysql_query($sql);
						if($objQuery) {
							echo "OK UPDATE sum_time PM AND ALL<br/>";
						}else {
							echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
						}
						
					}
					
				}
				
			}else{
				
				if(isset($password) && ($password == $passcode)){
				
					if(isset($id)&&isset($id)&&isset($id)){

						$strSQL = "SELECT * FROM sum_time WHERE date='$curdate' AND id='$id'";
						$objQuery = mysql_query($strSQL) or die (mysql_error());
						$result=mysql_query($strSQL);
						if($objQuery) {
							echo "Total has already<br/>";
						} else {
							echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
						}
				
					}
				
				}
				
			}
			
		}else if($time_b != $under){
			
			$strSQL = "SELECT time_am FROM sum_time WHERE id='$id' AND date='$curdate'";
			$objQuery = mysql_query($strSQL) or die (mysql_error());
			$result = mysql_query($strSQL);
			$count = mysql_num_rows($result);
			if($count == 1){
				
				if(isset($password) && ($password == $passcode)){
				
					if(isset($id)&&isset($id)&&isset($id)){

						$strSQL = "SELECT * FROM sum_time WHERE date='$curdate' AND id='$id'";
						$objQuery = mysql_query($strSQL) or die (mysql_error());
						$result=mysql_query($strSQL);
						if($objQuery) {
							echo "Total has already<br/>";
						} else {
							echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
						}
				
					}
				
				}
				
			}else{
				
				if(isset($password) && ($password == $passcode)){
				
					if(isset($id)&&isset($id)&&isset($id)){
						
						$sql = "INSERT INTO sum_time (date, time_am, time_pm, time_all, id)
						VALUES ('$curdate', '$sumtime_am', '$under', '$under', '$id')";
						$objQuery = mysql_query($sql);
						if($objQuery) {
							echo "OK INSERT SUM_TIME AM<br/>";
						} else {
							echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
						}
						
					}
				
				}
				
			}			
			
		}else{
			
			echo "!--NO INSERT SUM_TIME";
			
		}
		
	function difftime($time_a,$time_b){
    $now_time1=strtotime($time_a);  
    $now_time2=strtotime($time_b);
    $time_diff=($now_time2-$now_time1); 
	$time_diff_h=floor($time_diff/3600); // จำนวนชั่วโมงที่ต่างกัน  
    $time_diff_m=floor(($time_diff%3600)/60); // จำวนวนนาทีที่ต่างกัน  
    $time_diff_s=($time_diff%3600)%60; // จำนวนวินาทีที่ต่างกัน  
    return $time_diff_h.":".$time_diff_m.":".$time_diff_s."";
	} 
	
	function diff1time($time_c,$time_d){
	$now_time3=strtotime($time_c);
	$now_time4=strtotime($time_d);
    $time_diff=($now_time4-$now_time3); 
	$time_diff_h=floor($time_diff/3600); // จำนวนชั่วโมงที่ต่างกัน  
    $time_diff_m=floor(($time_diff%3600)/60); // จำวนวนนาทีที่ต่างกัน  
    $time_diff_s=($time_diff%3600)%60; // จำนวนวินาทีที่ต่างกัน  
    return $time_diff_h.":".$time_diff_m.":".$time_diff_s."";
	}  
	
	function diff2time($time_a,$time_b,$time_c,$time_d){
    $now_time1=strtotime($time_a);  
    $now_time2=strtotime($time_b);
	$now_time3=strtotime($time_c);
	$now_time4=strtotime($time_d);
    $time_diff=($now_time2-$now_time1)+($now_time4-$now_time3); 
	$time_diff_h=floor($time_diff/3600); // จำนวนชั่วโมงที่ต่างกัน  
    $time_diff_m=floor(($time_diff%3600)/60); // จำวนวนนาทีที่ต่างกัน  
    $time_diff_s=($time_diff%3600)%60; // จำนวนวินาทีที่ต่างกัน  
    return $time_diff_h.":".$time_diff_m.":".$time_diff_s."";
	}  

		mysql_close($objConnect);
	
?>