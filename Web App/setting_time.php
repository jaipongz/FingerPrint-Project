<?php
session_start();
	if($_SESSION['ID'] == "")
	{
		echo "Please Login!";
		exit();
	}
	mysql_connect("localhost","wittawat","123456789");
	mysql_select_db("admin");
?>
<html>
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
</head>
<body>
<center>
<form action="save_setting_time.php?day=<?php echo $_GET["day"];?>" name="frmEdit" method="post">
<?php
$objConnect = mysql_connect("localhost","wittawat","123456789") or die("Error Connect to Database");
$objDB = mysql_select_db("admin");
$strSQL = "SELECT * FROM check_time WHERE day = '".$_GET["day"]."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
{
	echo "Not found day=".$_GET["day"];
}
else
{
?>

<div class="container">
    <div class="row">
    <div class="col-lg-12 text-center">
    <h1>&nbsp;
    <div class="container">
		<div class="row">
        <div class="col-lg-12 text-center">
            <font face="Calibri" color="#FF0000" size="6"><b>Setting Time Late!</font>
            <hr class="star-primary">
        </div>
        </div>
    <div class="row">
    <div class="col-lg-8 text-center col-lg-offset-3">
<div class="row control-group text-center">
	<div class="form-group col-xs-8 floating-label-form-group controls text-center">
	<div class="form-group text-center">
		<h3 align="center">
		<center>
		<table class="table table-striped" width="50" border="0">
		  <tr>
			   <th width="20"> <div align="left">Day </div></th>
			   <th width="20"> <div align="left">Time </div></th>
		  </tr>
		  <tr>
				<td align="left"><font face="Calibri" color="#0099FF" size="5" ><?php echo $objResult["day_check"];?></font></td>
				<td align="center"><input type="text" name="txtTime" class="form-control" size="10" value="<?php echo $objResult["time_check"];?>"></td>
		  </tr>
		  </table>
		  <button type="submit" class="btn btn-success btn-lg" name="Submit" value="Save">Save</button>
		</center>
		</h3>
	</div>
	</div>
</div>
	</div>
	</h1>
	</div>
	</div>
</div>

<?php
  }
  mysql_close($objConnect);
  ?>
  </form>
</center>
</body>
</html>