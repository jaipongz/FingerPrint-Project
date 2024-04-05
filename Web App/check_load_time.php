<!DOCTYPE html>
<head>
<title></title>
</head>
<body>
<br><br><font face="Calibri" color="#FF0000" size="6">
<?php

echo "Load Time : ".date("Y-m-d H:i:s");

$strSort = $_POST["mySort"];
$d = date("Y-m-d");
$objConnect = mysql_connect("localhost","wittawat","123456789") or die("Error Connect to Database");
$objDB = mysql_select_db("admin");
$strSQL = "SELECT * FROM report where Date='$d' ORDER BY $strSort";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
</font>

<h3 align="left">
	<table class="table table-striped">
  <tr>
    <th <div align="left"><a href="JavaScript:doCallAjax('id')">ID</a> </div></th>
    <th <div align="left"><a href="JavaScript:doCallAjax('inn')">Coming</a> </div></th>
	<th <div align="left"><a href="JavaScript:doCallAjax('late')">Late</a> </div></th>
    <th <div align="left"><a href="JavaScript:doCallAjax('miss')">Absence</a> </div></th>
    <th <div align="left"><a href="JavaScript:doCallAjax('date')">Date</a> </div></th>
  </tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="left"><?php echo $objResult["id"];?></div></td>
    <td><div align="left"><?php echo $objResult["inn"];?></div></td>
	<td><div align="left"><?php echo $objResult["late"];?></div></td>
	<td><div align="left"><?php echo $objResult["miss"];?></div></td>
    <td><div align="left"><?php echo $objResult["date"];?></div></td>
  </tr>
<?php
}
?>
</table>
</h3>
<?php
mysql_close($objConnect);
?>
</body>
</html>