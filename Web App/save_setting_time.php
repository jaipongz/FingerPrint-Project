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
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>
<body>
<?php
$objConnect = mysql_connect("localhost","wittawat","123456789") or die("Error Connect to Database");
$objDB = mysql_select_db("admin");
$strSQL = "UPDATE check_time SET ";
$strSQL .="time_check = '".$_POST["txtTime"]."' ";
$strSQL .="WHERE day = '".$_GET["day"]."' ";
$objQuery = mysql_query($strSQL);
if($objQuery)
{
	echo "Save Done.";
}
else
{
	echo "Error Save [".$strSQL."]";
}

if($_SESSION["Status"] == "ADMIN")
	{
		echo "<br> Go to <a href='admin_page.php'>Admin page</a>";
	}
	else
	{
		echo "<br> Go to <a href='user_page.php'>User page</a>";
	}
	
	mysql_close();
	
	mysql_close($objConnect);

?>
</body>
</html>