<?php
	$curdate = date('Y-m-d');
	$one = "1";
	$null = "";
	$under = "-";
	
	session_start();
	if($_SESSION['ID'] == "")
	{
		echo "Please Login!";
		exit();
	}

	if($_SESSION['Status'] != "USER")
	{
		echo "This page for User only!";
		exit();
	}	
	
	mysql_connect("localhost","wittawat","123456789");
	mysql_select_db("admin");
	
	$strSQL = "SELECT * FROM member WHERE ID = '".$_SESSION['ID']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	//$image = $result['Image'];
	$path = '/bootstrap/images/user.png';
	
	$strSQL = "SELECT SUM(inn), SUM(late), SUM(miss) FROM report WHERE id='".$_SESSION['ID']."' AND date='$curdate'";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$result = mysql_query($strSQL);
	while($row = mysql_fetch_array($result)) {
		$in_date = $row['SUM(inn)'];
		$late_date = $row['SUM(late)'];
		$miss_date = $row['SUM(miss)'];
	}
	
	$strSQL = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(time_all))), SEC_TO_TIME(SUM(TIME_TO_SEC(time_am))), SEC_TO_TIME(SUM(TIME_TO_SEC(time_pm))) FROM sum_time WHERE id='".$_SESSION['ID']."' AND date='$curdate'";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$result = mysql_query($strSQL);	
	while($row = mysql_fetch_array($result)){
		$timeam = $row['SEC_TO_TIME(SUM(TIME_TO_SEC(time_am)))'];
		$timepm = $row['SEC_TO_TIME(SUM(TIME_TO_SEC(time_pm)))'];
		$time_date = $row['SEC_TO_TIME(SUM(TIME_TO_SEC(time_all)))'];
	}
	
	$strSQL = "SELECT * FROM data WHERE id='".$_SESSION['ID']."' AND date='$curdate'";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$result = mysql_query($strSQL);
	while($objResult = mysql_fetch_array($objQuery)) {
		$in_1 = $objResult['timein_1'];
		$in_2 = $objResult['timein_2'];
		$out_1 = $objResult['timeout_1'];
		$out_2 = $objResult['timeout_2'];
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Time Recorder System Online using fringerprint scanner</title>

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
	<style>
		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #3333;
		}

		li {
			float: left;
		}

		li a, .dropbtn_1 {
			display: inline-block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		li a:hover, .dropdown_1:hover .dropbtn_1 {
			background-color: #01adfd;
		}

		li.dropdown_1 {
			display: inline-block;
		}

		.dropdown-content_1 {
			display: none;
			position: absolute;
			background-color: #f9f9f9;
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		}

		.dropdown-content_1 a {
			color: black;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
			text-align: left;
		}

		.dropdown-content_1 a:hover {background-color: #00fe06}

		.dropdown_1:hover .dropdown-content_1 {
			display: block;
		}
	</style>
	<style>
	ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #3333;
	}

	li {
		float: left;
	}

	li a, .dropbtn_2 {
		display: inline-block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}

	li a:hover, .dropdown_2:hover .dropbtn_2 {
		background-color: #01adfd;
	}

	li.dropdown_2 {
		display: inline-block;
	}

	.dropdown-content_2 {
		display: none;
		position: absolute;
		background-color: #f9f9f9;
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	}

	.dropdown-content_2 a {
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
		text-align: left;
	}

	.dropdown-content_2 a:hover {background-color: #00fe06}

	.dropdown_2:hover .dropdown-content_2 {
		display: block;
	}
	</style>
		<style>
		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #3333;
		}

		li {
			float: left;
		}

		li a, .dropbtn_3 {
			display: inline-block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		li a:hover, .dropdown_3:hover .dropbtn_3 {
			background-color: #01adfd;
		}

		li.dropdown_3 {
			display: inline-block;
		}

		.dropdown-content_3 {
			display: none;
			position: absolute;
			background-color: #f9f9f9;
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		}

		.dropdown-content_3 a {
			color: black;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
			text-align: left;
		}

		.dropdown-content_3 a:hover {background-color: #00fe06}

		.dropdown_3:hover .dropdown-content_3 {
			display: block;
		}
	</style>
		
	<style type="text/css">  
	.center_div {  
		width:1250px;
		height:1700px;
		position:fixed;
		top:30%;
		left:16.5%;
		margin-left:-50px;
		margin-top:-50px;  
	}  
	</style>
	<style type="text/css">  
	.below_1_div {  
		width:1100px;
		height:800px;
		position:fixed;
		top:65%;
		left:21%;
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

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--a class="navbar-brand" href="admin_page.php">
                    <center><img src="images/logo_1.png" alt=""></center>
					 
                </a-->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul>
					<li class="dropdown_1">
					<a href="#" class="dropbtn_1">Index</a>
						<div class="dropdown-content_1">
							<a href="user_page.php">Pro file</a>
							<a href="user_page_today.php">Time of day</a>
						</div>
					</li>
					<li class="dropdown_2">
					<a href="#" class="dropbtn_2">Edit</a>
						<div class="dropdown-content_2">
							<a href="user_page_edit.php">Edit pro file</a>
						</div>
					</li>
					<li class="dropdown_3">
					<a href="#" class="dropbtn_3">Check the work</a>
						<div class="dropdown-content_3">
							<a href="user_page_total.php">Total</a>
							<a href="user_page_search.php">Find time to work</a>
							<a href="user_page_search_list.php">Find the job status</a>
						</div>
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <!-- daily -->
<div class="center_div">
<div class="col-md-10">
	<center><font face="Calibri" color="#000066" size="8"><b>Total day(<?php echo $curdate; ?>) work</font></center>
	<table class="table table-striped">
        <thead>
            <tr>
                <th><font face="Calibri" color="#FF9900" size="6">Coming</font></th>
                <th><font face="Calibri" color="#FF9900" size="6">Late</font></th>
				<th><font face="Calibri" color="#FF9900" size="6">Absence</font></th>
				<th><font face="Calibri" color="#FF9900" size="6">All time first</font></th>
				<th><font face="Calibri" color="#FF9900" size="6">All time second</font></th>
				<th><font face="Calibri" color="#FF9900" size="6">All time date</font></th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td><font face="Calibri" color="#009933" size="5"><b><?php echo $in_date; ?></font></td>
                <td><font face="Calibri" color="#009933" size="5"><b><?php echo $late_date; ?></font></td>
                <td><font face="Calibri" color="#009933" size="5"><b><?php echo $miss_date; ?></font></td>
				<td><font face="Calibri" color="#009933" size="5"><b><?php  
				if($timeam != $null){
					echo $timeam;
				}else{
					echo $under;
				}
				?></font></td>
				<td><font face="Calibri" color="#009933" size="5"><b><?php  
				if($timepm != $null){
					echo $timepm;
				}else{
					echo $under;
				}
				?></font></td>
				<td><font face="Calibri" color="#009933" size="5"><b><?php  
				if($time_date != $null){
					echo $time_date;
				}else{
					echo $under;
				}
				?></font></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<div class="below_1_div">
<div class="col-md-10">
	<center><font face="Calibri" color="#000066" size="8"><b>Total day(<?php echo $curdate; ?>) work</font></center>
	<h3 align="left">
	<table class="table table-striped">
	  <thead>
            <tr>
                <th><font face="Calibri" color="#FF9900" size="6">Coming in first</font></th>
                <th><font face="Calibri" color="#FF9900" size="6">Coming in second</font></th>
				<th><font face="Calibri" color="#FF9900" size="6">Out in first</font></th>
				<th><font face="Calibri" color="#FF9900" size="6">Out in second</font></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><font face="Calibri" color="#009933" size="5"><b><?php 
				if($miss_date == $one){
					echo $under;
				}else if($late_date == $one){
					echo $in_1;
				}else if($in_date == $one){
					echo $in_1;
				}else{
					echo $under;
				}
				?></font></td>
                <td><font face="Calibri" color="#009933" size="5"><b><?php
				if($miss_date == $one){
					echo $under;
				}else if($late_date == $one){
					echo $in_2;
				}else if($in_date == $one){
					echo $in_2;
				}else{
					echo $under;
				}
				?></font></td>
                <td><font face="Calibri" color="#009933" size="5"><b><?php
				if($miss_date == $one){
					echo $under;
				}else if($late_date == $one){
					echo $out_1;
				}else if($in_date == $one){
					echo $out_1;
				}else{
					echo $under;
				}
				?></font></td>
				<td><font face="Calibri" color="#009933" size="5"><b><?php
				if($miss_date == $one){
					echo $under;
				}else if($late_date == $one){
					echo $out_2;
				}else if($in_date == $one){
					echo $out_2;
				}else{
					echo $under;
				}
				?></font></td>
            </tr>
        </tbody>
	</table>
	</h3>
</div>
</div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
