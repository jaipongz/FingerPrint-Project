<?php

	$test = "553120410151";
	$curdate = date('Y-m-d');
	
	$objConnect = mysql_connect("localhost","wittawat","123456789") or die(mysql_error());
	$objDB = mysql_select_db("admin");
	
	
	$strSQL = "SELECT * FROM user";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$result=mysql_query($strSQL);
	if($result){
		
		while($objResult = mysql_fetch_array($objQuery)){

			$ID_1 = $objResult["id"];
			//echo $objResult["id"];
			//echo $objResult["name"];
			//echo "$ID_1";
	
		}
		
	}
	
	$strSQL = "SELECT * FROM user WHERE id='$id'";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$result=mysql_query($strSQL);
	if($result){
		
		while($objResult = mysql_fetch_array($objQuery)){

			$ID_2 = $objResult["id"];
			//echo $objResult["id"];
			//echo $objResult["name"];
			//echo "$ID_2";
	
		}
		
	}
	
	$strSQL = "SELECT * FROM data WHERE date='$curdate' AND id='$id'";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$result=mysql_query($strSQL);
	$count=mysql_num_rows($result);
		if($count == 1){
			
			while($objResult = mysql_fetch_array($objQuery)){

				$ID_3 = $objResult["id"];
				//echo $objResult["id"];
				//echo $objResult["name"];
				//echo "$ID_3";
	
			}if($ID_2 == $ID_3){
				
				$strSQL = "SELECT * FROM data WHERE date='$curdate' AND id='$id'";
				$objQuery = mysql_query($strSQL) or die (mysql_error());
				$result=mysql_query($strSQL);
				$count=mysql_num_rows($result);
				if($count == 1){
					
					if(isset($password) && ($password == $passcode)){
													
						if(isset($id)&&isset($id)&&isset($id)){
					
							$sql = "DELETE FORM report WHERE id='$id' AND date='$curdate' AND miss='1'";
							mysql_query($sql) or die(mysql_error());
						
								echo "delete ID miss !!!!";
								
						}
					
					}
					
				}else{
					
					if(isset($password) && ($password == $passcode)){
													
						if(isset($id)&&isset($id)&&isset($id)){
					
							$strSQL = "SELECT * FROM report WHERE date='$curdate' AND id='$id'";
							$objQuery = mysql_query($strSQL) or die (mysql_error());
							$result=mysql_query($strSQL);
							if($objQuery) {
								echo "No DELETE !!!";
							} else {
								echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
							}
							
						}
						
					}
					
				}
				
				
			}else if($ID_2 != $ID_3){
				
				$strSQL = "SELECT * FROM report WHERE date='$curdate'";
				$objQuery = mysql_query($strSQL) or die (mysql_error());
				$result=mysql_query($strSQL);
				$count=mysql_num_rows($result);
				if($count == 1){
					
					if(isset($password) && ($password == $passcode)){
													
						if(isset($id)&&isset($id)&&isset($id)){
					
							$sql = "INSERT INTO report (id, inn, late, miss, date)
							VALUES ('$ID_1', '-', '-', '1', '$curdate')";
							$objQuery = mysql_query($sql);
							if($objQuery) {
								echo "ADD Miss";
							} else {
								echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
							}
							
						}
					
					}
					
				}else{
					
					if(isset($password) && ($password == $passcode)){
													
						if(isset($id)&&isset($id)&&isset($id)){
					
							$strSQL = "SELECT * FROM report WHERE date='$curdate' AND id='$ID_2'";
							$objQuery = mysql_query($strSQL) or die (mysql_error());
							$result=mysql_query($strSQL);
							if($objQuery) {
								echo "GET DELETE !!!";
							} else {
								echo "Fail: " . $sql . "<br>" . mysqli_error($objConnect);
							}
							
						}
						
					}
					
				}
				
			}
			
			
		}
	
	mysql_close($objConnect);
		
?>