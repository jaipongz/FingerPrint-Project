<?php
	$day = $_POST['d'];
	$month = $_POST['m'];
	$year = date('Y');
	$ALL_DATE = "$year-$month-$day";
	$null = "";
	$under = "-";
	
	include 'connect.php';
	
	//daily
	$strSQL = "SELECT SUM(inn), SUM(late), SUM(miss) FROM report WHERE Year(date) = '$year' AND Month(date) = '$month' AND Day(date) = '$day'";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$result = mysql_query($strSQL);
	while($row = mysql_fetch_array($result)) {
		$in_date = $row['SUM(inn)'];
		$late_date = $row['SUM(late)'];
		$miss_date = $row['SUM(miss)'];
	}
	/*
	//monthly
	$strSQL = "SELECT SUM(inn), SUM(late), SUM(miss) FROM report WHERE Year(date) = '$year' AND Month(date) = '$month'";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$result = mysql_query($strSQL);
	while($row = mysql_fetch_array($result)) {
		$all_in = $row['SUM(inn)'];
		$all_late = $row['SUM(late)'];
		$all_miss = $row['SUM(miss)'];
	}
	
	$strSQL = "SELECT name_month FROM month_name WHERE number_month='$month'";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$result = mysql_query($strSQL);
	while($objResult = mysql_fetch_array($objQuery)){
		$n_mount = $objResult['name_month'];
	}
	
	//Annual
	$strSQL = "SELECT SUM(inn), SUM(late), SUM(miss) FROM report WHERE Year(date) = '$year'";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$result = mysql_query($strSQL);
	while($row = mysql_fetch_array($result)) {
		$year_in = $row['SUM(inn)'];
		$year_late = $row['SUM(late)'];
		$year_miss = $row['SUM(miss)'];
	}
	*/
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/logo-nav.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

		<link href="css/jquery-ui.css " rel="stylesheet">
		<link href="css/jquery-ui.min.css " rel="stylesheet">
	<style type="text/css">  
	.center_div {  
		width:800px;
		height:800px;
		position:fixed;
		top:8%;
		left:25%;
		margin-left:-50px;
		margin-top:-50px;  
	}  
	</style>
	<style type="text/css">  
	.below_1_div {  
		width:800px;
		height:800px;
		position:fixed;
		top:32%;
		left:25%;
		margin-left:-50px;
		margin-top:-50px;  
	}  
	</style>
	<style type="text/css">  
	.below_2_div {  
		width:800px;
		height:800px;
		position:fixed;
		top:56%;
		left:25%;
		margin-left:-50px;
		margin-top:-50px;  
	}
	</style>
</head>
<body>
<!-- daily -->
<div class="center_div">
<div class="col-md-10">
	<center><font face="Calibri" color="#000066" size="8"><b>Total day work</font></center>
	<table class="table table-striped">
        <thead>
            <tr>
                <th><font face="Calibri" color="#FF9900" size="6">Coming</font></th>
                <th><font face="Calibri" color="#FF9900" size="6">Late</font></th>
				<th><font face="Calibri" color="#FF9900" size="6">Absence</font></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><font face="Calibri" color="#009933" size="5"><b><?php
				if($in_date != $null){
					echo $in_date;
				}else{
					echo $under;
				}
				?></font></td>
                <td><font face="Calibri" color="#009933" size="5"><b><?php
				if($late_date != $null){
					echo $late_date;
				}else{
					echo $under;
				}
				?></font></td>
                <td><font face="Calibri" color="#009933" size="5"><b><?php
				if($miss_date != $null){
					echo $miss_date;
				}else{
					echo $under;
				}
				?></font></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<!-- monthly >
<div class="below_1_div">
<div class="col-md-10">
	<center><font face="Calibri" color="#000066" size="8"><b>Total monthly(<?php //echo $n_mount ?>) work</font></center>
	<table class="table table-striped">
        <thead>
            <tr>
                <th><font face="Calibri" color="#FF9900" size="7">Coming</font></th>
                <th><font face="Calibri" color="#FF9900" size="7">Late</font></th>
				<th><font face="Calibri" color="#FF9900" size="7">Absence</font></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><font face="Calibri" color="#009933" size="6"><b><?php //echo $all_in; ?></font></td>
                <td><font face="Calibri" color="#009933" size="6"><b><?php //echo $all_late; ?></font></td>
                <td><font face="Calibri" color="#009933" size="6"><b><?php //echo $all_miss; ?></font></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<div class="below_2_div">
<div class="col-md-10">
	<center><font face="Calibri" color="#000066" size="8"><b>Total Annual(<?php //echo $year ?>) work</font></center>
	<table class="table table-striped">
        <thead>
            <tr>
                <th><font face="Calibri" color="#FF9900" size="7">Coming</font></th>
                <th><font face="Calibri" color="#FF9900" size="7">Late</font></th>
				<th><font face="Calibri" color="#FF9900" size="7">Absence</font></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><font face="Calibri" color="#009933" size="6"><b><?php //echo $year_in; ?></font></td>
                <td><font face="Calibri" color="#009933" size="6"><b><?php //echo $year_late; ?></font></td>
                <td><font face="Calibri" color="#009933" size="6"><b><?php //echo $year_miss; ?></font></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<-->
</body>
</html>