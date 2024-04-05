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
$strSQL = "SELECT * FROM data where date='$d' ORDER BY $strSort, timein_1 DESC";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
</font>

<h3 align="left">
	<table class="table table-striped">
  <tr>
    <th <div align="left"><a href="JavaScript:doCallAjax('id')">ID</a> </div></th>
    <th <div align="left"><a href="JavaScript:doCallAjax('timein_1')">Coming in first</a> </div></th>
	<th <div align="left"><a href="JavaScript:doCallAjax('timein_2')">Coming in second</a> </div></th>
    <th <div align="left"><a href="JavaScript:doCallAjax('timeout_1')">Out in first</a> </div></th>
	<th <div align="left"><a href="JavaScript:doCallAjax('timeout_2')">Out in second</a> </div></th>
    <th <div align="left"><a href="JavaScript:doCallAjax('date')">Date</a> </div></th> 
  </tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="left"><?php echo $objResult["id"];?></div></td>
    <td><div align="left"><?php echo $objResult["timein_1"];?></div></td>
	<td><div align="left"><?php echo $objResult["timein_2"];?></div></td>
	<td><div align="left"><?php echo $objResult["timeout_1"];?></div></td>
    <td><div align="left"><?php echo $objResult["timeout_2"];?></div></td>
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