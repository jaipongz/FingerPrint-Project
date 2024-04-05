<?php
	$month = $_POST['m'];
	$year = date('Y');
	$null = "";
	
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
	
	include 'connect.php';
	
	$strSQL = "SELECT * FROM member WHERE ID = '".$_SESSION['ID']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	//$image = $result['Image'];
	$path = '/bootstrap/images/user.png';
	
	$strSQL = "SELECT name_month FROM month_name WHERE number_month='$month'";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$result = mysql_query($strSQL);
	while($objResult = mysql_fetch_array($objQuery)){
		$n_mount = $objResult['name_month'];
	}
	
	//monthly
	$strSQL = "SELECT * FROM data WHERE id = '".$_SESSION['ID']."' AND Year(date) = '$year' AND Month(date) = '$month'";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$result = mysql_query($strSQL);
	
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
		width:1000px;
		height:1000px;
		position:fixed;
		top:8%;
		left:10%;
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
<!-- monthly -->
<div class="center_div">
<div class="col-md-14">
	<center><font face="Calibri" color="#000066" size="8"><b>Total month(<?php echo $n_mount ?>) work</font></center>
	<table class="table table-striped">
        <thead>
            <tr>
                <th><font face="Calibri" color="#FF9900" size="6">Coming in first</font></th>
                <th><font face="Calibri" color="#FF9900" size="6">Coming in second</font></th>
				<th><font face="Calibri" color="#FF9900" size="6">Out in first</font></th>
				<th><font face="Calibri" color="#FF9900" size="6">Out in second</font></th>
				<th><font face="Calibri" color="#FF9900" size="6">Date</font></th> 
            </tr>
        </thead>
        <tbody>
		<?php $i=1; while($objResult = mysql_fetch_array($objQuery)) { ?>
            <tr>
                <td><font face="Calibri" color="#009933" size="5"><b><?php echo $objResult['timein_1']; ?></font></td>
                <td><font face="Calibri" color="#009933" size="5"><b><?php echo $objResult['timein_2']; ?></font></td>
                <td><font face="Calibri" color="#009933" size="5"><b><?php echo $objResult['timeout_1']; ?></font></td>
				<td><font face="Calibri" color="#009933" size="5"><b><?php echo $objResult['timeout_2']; ?></font></td>
				<td><font face="Calibri" color="#009933" size="5"><b><?php echo $objResult['date']; ?></font></td>
            </tr>
		<?php $i++; } ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>