<?php
	session_start();
	if($_SESSION['UserID'] == "")
	{
		echo "Please Login!";
		exit();
	}
	
	mysql_connect("localhost","wittawat","123456789");
	mysql_select_db("admin");
	$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>หน้าหลัก</title>
<meta charset="utf-8">
<style type="text/css">
body {
	background-image: url(images/Untitled-2.jpg);
}
</style>
</head>




<marquee><font face="Calibri" color="#FFF" size="5">Welcome : <?php echo $objResult["Name"];?></font></marquee>
<br>
<br>
<center>
<table width="1000" border="0">
  <tr>
    <td colspan="2"></td>
</tr>
  <tr>
    
    </td>
  </tr>
  <tr>
    <td colspan="2">
	
      <table width="986" border="1" bordercolor="#00cafd" align="center" bgcolor="#FFFFFF">
        <tr>
          <td colspan="2"><center><img src="images/a1.jpg" width="1016" height="406" /></center></td>
        </tr>
        <tr>
          <td width="300"><a href="logout.php">Logout</a>
          <td width="670" valign="top">
    <table width="399" border="0" align="center">
    <tr>
      <form name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
      <th><font face="JasmineUPC" color="#FF0000" size="5"><strong>ค้นหา</strong></font>
      <input name="txtKeyword" type="text" id="txtKeyword" value="">
      <input type="submit" value="Search"></th>
      </form>
    </tr>
  </table>
    </td>
          
        </tr>
        <tr>
          <td valign="top">&nbsp;
            <table border="0" style="width: 300px">
    <tbody>

      <tr>
        <td width="87"> &nbsp;<font face="Calibri" size="3">Username</font></td>
        <td width="197"><font face="Calibri" size="3"><?php echo $objResult["Username"];?></font>
        </td>
      </tr>
      <tr>
        <td> &nbsp;<font face="Calibri" size="3">Name</font></td>
        <td><font face="Calibri" size="3"><?php echo $objResult["Name"];?></font></td>
      </tr>
    </tbody>
  </table>            <br>
          </td>
          <td valign="top">&nbsp;
<form name="form1" method="post" action="save_profile.php">
  <center><font face="Calibri" color="#FF0000" size="5">Edit Profile!</font></center> <br>
  <center><table width="400" border="1" bordercolor="#00cafd" align="center" style="width: 400px">
    <tbody>
      <tr>
        <td width="125"> &nbsp;<font face="Calibri" size="3">UserID</font></td>
        <td width="180">
          <font face="Calibri" size="3"><?php echo $objResult["UserID"];?></font>
        </td>
      </tr>
      <tr>
        <td> &nbsp;<font face="Calibri" size="3">Username</font></td>
        <td>
          <font face="Calibri" size="3"><?php echo $objResult["Username"];?></font>
        </td>
      </tr>
      <tr>
        <td> &nbsp;<font face="Calibri" size="3">Password</font></td>
        <td><input name="txtPassword" type="password" id="txtPassword" value="<?php echo $objResult["Password"];?>">
        </td>
      </tr>
      <tr>
        <td> &nbsp;<font face="Calibri" size="3">Confirm Password</font></td>
        <td><input name="txtConPassword" type="password" id="txtConPassword" value="<?php echo $objResult["Password"];?>">
        </td>
      </tr>
      <tr>
        <td>&nbsp;<font face="Calibri" size="3">Name</font></td>
        <td><input name="txtName" type="text" id="txtName" value="<?php echo $objResult["Name"];?>"></td>
      </tr>
      <tr>
        <td> &nbsp;<font face="Calibri" size="3">Status</font></td>
        <td>
          <font face="Calibri" size="3"><?php echo $objResult["Status"];?></font>
        </td>
      </tr>
    </tbody>
  </table></center>
  <br>
  <center><input type="submit" name="Submit" value="Save"></center>
</form>

          </td>
        </tr>
      </table>
