<?php
	session_start();
	mysql_connect("localhost","wittawat","123456789");
	mysql_select_db("admin");
	$strSQL = "SELECT * FROM member WHERE Username = '".mysql_real_escape_string($_POST['username'])."' 
	and Password = '".mysql_real_escape_string($_POST['password'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
			header("location:index.php");
	}
	else
	{
			$_SESSION["ID"] = $objResult["ID"];
			$_SESSION["Status"] = $objResult["Status"];

			session_write_close();
			
			if($objResult["Status"] == "ADMIN")
			{
				header("location:admin_page.php");
			}
			else
			{
				header("location:user_page.php");
			}
	}
	mysql_close();
?>