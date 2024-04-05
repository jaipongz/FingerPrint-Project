<?php
	$ID = $_POST['id'];
	$day = $_POST['d'];
	$month = $_POST['m'];
	$year = date('Y');
	$ALL_DATE = "$year-$month-$day";
	$null = "";
	$under = "-";
	
	include 'connect.php';
	
	//day
	$strSQL = "SELECT SUM(inn), SUM(late), SUM(miss) FROM report WHERE id='$ID' AND Year(date) = '$year' AND Month(date) = '$month' AND Day(date) = '$day'";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$result = mysql_query($strSQL);
	while($row = mysql_fetch_array($result)) {
		$in_date = $row['SUM(inn)'];
		$late_date = $row['SUM(late)'];
		$miss_date = $row['SUM(miss)'];
	}
	
	$strSQL = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(time_all))), SEC_TO_TIME(SUM(TIME_TO_SEC(time_am))), SEC_TO_TIME(SUM(TIME_TO_SEC(time_pm))) FROM sum_time WHERE id='$ID' AND Year(date) = '$year' AND Month(date) = '$month' AND Day(date) = '$day'";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$result = mysql_query($strSQL);	
	while($row = mysql_fetch_array($result)){
		$timeam_day = $row['SEC_TO_TIME(SUM(TIME_TO_SEC(time_am)))'];
		$timepm_day= $row['SEC_TO_TIME(SUM(TIME_TO_SEC(time_pm)))'];
		$timeall_day = $row['SEC_TO_TIME(SUM(TIME_TO_SEC(time_all)))'];
	}
	
	//month
	$strSQL = "SELECT SUM(inn), SUM(late), SUM(miss) FROM report WHERE id='$ID' AND Year(date) = '$year' AND Month(date) = '$month'";
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
	
	$strSQL = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(time_all))), SEC_TO_TIME(SUM(TIME_TO_SEC(time_am))), SEC_TO_TIME(SUM(TIME_TO_SEC(time_pm))) FROM sum_time WHERE id='$ID' AND Year(date) = '$year' AND Month(date) = '$month'";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$result = mysql_query($strSQL);	
	while($row = mysql_fetch_array($result)){
		$timeam_month = $row['SEC_TO_TIME(SUM(TIME_TO_SEC(time_am)))'];
		$timepm_month = $row['SEC_TO_TIME(SUM(TIME_TO_SEC(time_pm)))'];
		$timeall_month = $row['SEC_TO_TIME(SUM(TIME_TO_SEC(time_all)))'];
	}
	
	//year
	$strSQL = "SELECT SUM(inn), SUM(late), SUM(miss) FROM report WHERE id='$ID' AND Year(date) = '$year'";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$result = mysql_query($strSQL);
	while($row = mysql_fetch_array($result)) {
		$in_year = $row['SUM(inn)'];
		$late_year = $row['SUM(late)'];
		$miss_year = $row['SUM(miss)'];
	}
	
	$strSQL = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(time_all))), SEC_TO_TIME(SUM(TIME_TO_SEC(time_am))), SEC_TO_TIME(SUM(TIME_TO_SEC(time_pm))) FROM sum_time WHERE id='$ID' AND Year(date) = '$year'";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$result = mysql_query($strSQL);	
	while($row = mysql_fetch_array($result)){
		$timeam_year = $row['SEC_TO_TIME(SUM(TIME_TO_SEC(time_am)))'];
		$timepm_year = $row['SEC_TO_TIME(SUM(TIME_TO_SEC(time_pm)))'];
		$timeall_year = $row['SEC_TO_TIME(SUM(TIME_TO_SEC(time_all)))'];
	}
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
		height:2500px;
		position:fixed;
		top:5%;
		left:25%;
		margin-left:-50px;
		margin-top:-20px;  
	}  
	</style>
	<style type="text/css">  
	.below_1_div {  
		width:800px;
		height:2500px;
		position:fixed;
		top:38%;
		left:25%;
		margin-left:-50px;
		margin-top:-20px;  
	}  
	</style>
	<style type="text/css">  
	.below_2_div {  
		width:800px;
		height:2500px;
		position:fixed;
		top:73%;
		left:25%;
		margin-left:-50px;
		margin-top:-20px;  
	}
	</style>
</head>
<body>
<body>
<!-- daily -->
<div class="center_div">
<div class="col-md-10">
	<center><font face="Calibri" color="#000066" size="6"><b>Total daily work</font></center>
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
                <td><font face="Calibri" color="#009933" size="5"><b><?php echo $in_date; ?></font></td>
                <td><font face="Calibri" color="#009933" size="5"><b><?php echo $late_date; ?></font></td>
                <td><font face="Calibri" color="#009933" size="5"><b><?php echo $miss_date; ?></font></td>
            </tr>
        </tbody>
    </table>
	<table class="table table-striped">
        <thead>
            <tr>
                <th><font face="Calibri" color="#FF9900" size="6">All time first</font></th>
                <th><font face="Calibri" color="#FF9900" size="6">All time second</font></th>
				<th><font face="Calibri" color="#FF9900" size="6">All time date</font></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><font face="Calibri" color="#009933" size="5"><b><?php
				if($timeam_day != $null){
					echo $timeam_day;
				}else{
					echo $under;
				}
				?></font></td>
                <td><font face="Calibri" color="#009933" size="5"><b><?php
				if($timepm_day != $null){
					echo $timepm_day;
				}else{
					echo $under;
				}
				?></font></td>
				<td><font face="Calibri" color="#009933" size="5"><b><?php
				if($timeall_day != $null){
					echo $timeall_day;
				}else{
					echo $under;
				}
				?></font></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<!-- month -->
<div class="below_1_div">
<div class="col-md-10">
	<center><font face="Calibri" color="#000066" size="6"><b>Total month(<?php echo $n_mount ?>) work</font></center>
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
                <td><font face="Calibri" color="#009933" size="5"><b><?php echo $all_in; ?></font></td>
                <td><font face="Calibri" color="#009933" size="5"><b><?php echo $all_late; ?></font></td>
                <td><font face="Calibri" color="#009933" size="5"><b><?php echo $all_miss; ?></font></td>
            </tr>
        </tbody>
    </table>
	<table class="table table-striped">
        <thead>
            <tr>
                <th><font face="Calibri" color="#FF9900" size="6">All time first</font></th>
                <th><font face="Calibri" color="#FF9900" size="6">All time second</font></th>
				<th><font face="Calibri" color="#FF9900" size="6">All time date</font></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><font face="Calibri" color="#009933" size="5"><b><?php echo $timeam_month; ?></font></td>
                <td><font face="Calibri" color="#009933" size="5"><b><?php echo $timepm_month; ?></font></td>
				<td><font face="Calibri" color="#009933" size="5"><b><?php echo $timeall_month; ?></font></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<!-- year -->
<div class="below_2_div">
<div class="col-md-10">
	<center><font face="Calibri" color="#000066" size="6"><b>Total year(<?php echo $year ?>) work</font></center>
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
                <td><font face="Calibri" color="#009933" size="5"><b><?php echo $in_year; ?></font></td>
                <td><font face="Calibri" color="#009933" size="5"><b><?php echo $late_year; ?></font></td>
                <td><font face="Calibri" color="#009933" size="5"><b><?php echo $miss_year; ?></font></td>
            </tr>
        </tbody>
    </table>
	<table class="table table-striped">
        <thead>
            <tr>
                <th><font face="Calibri" color="#FF9900" size="6">All time first</font></th>
                <th><font face="Calibri" color="#FF9900" size="6">All time second</font></th>
				<th><font face="Calibri" color="#FF9900" size="6">All time date</font></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><font face="Calibri" color="#009933" size="5"><b><?php echo $timeam_year; ?></font></td>
                <td><font face="Calibri" color="#009933" size="5"><b><?php echo $timepm_year; ?></font></td>
				<td><font face="Calibri" color="#009933" size="5"><b><?php echo $timeall_year; ?></font></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
</body>
</html>