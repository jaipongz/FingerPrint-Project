<?php
	
	$curdate = date('Y-m-d');
	$under = '-';
	$one = '1';
	//$id = '553120410138';

	$objConnect = mysql_connect("localhost","wittawat","123456789") or die(mysql_error());
	$objDB = mysql_select_db("admin");
	/*
	$strSQL = "SELECT * FROM report WHERE date='$curdate' AND id='$id'";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$result=mysql_query($strSQL);
	while($objResult = mysql_fetch_array($objQuery)){

		$id_name = $objResult['id'];
		echo "$id_name<br/>";
	
	}
	*/
	$strSQL = "SELECT SUM(inn), SUM(late), SUM(miss) FROM report WHERE date='$curdate'";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$result = mysql_query($strSQL);	
	
		while($row = mysql_fetch_array($result)){
		
		$inn = $row['SUM(inn)'];
		$late = $row['SUM(late)'];
		$miss = $row['SUM(miss)'];
		echo "IN = $inn<br/>";
		echo "LATE = $late<br/>";
		echo "MISS = $miss<br/>";
		
		}
	
	mysql_close($objConnect);
	
?>

