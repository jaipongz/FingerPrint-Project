<?php
include 'connect.php';
$sql = "select * from report where (date  LIKE '{$_POST['itemname']}' or id LIKE '{$_POST['itemname']}') ORDER BY id ASC";
$query = mysql_query($sql);
?>
<div class="col-md-12">
	<br><br><br><center><font face="Calibri" color="#000066" size="8"><b>The guest list work(Previous)</font></center><br>
    <h3 align="left">
	<table class="table table-striped">
        <thead>
            <tr>
                <th><font face="Calibri" color="#FF9900" size="7">ID</font></th>
                <th><font face="Calibri" color="#FF9900" size="7">Coming</font></th>
                <th><font face="Calibri" color="#FF9900" size="7">Late</font></th>
				<th><font face="Calibri" color="#FF9900" size="7">Absence</font></th>
                <th><font face="Calibri" color="#FF9900" size="7">Date</font></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; while ($result = mysql_fetch_assoc($query)) { ?>
            <tr>
                <td><font face="Calibri" color="#009933" size="6"><b><?php echo $result['id'];?></font></td>
                <td><font face="Calibri" color="#009933" size="6"><b><?php echo $result['inn'];?></font></td>
                <td><font face="Calibri" color="#009933" size="6"><b><?php echo $result['late'];?></font></td>
                <td><font face="Calibri" color="#009933" size="6"><b><?php echo $result['miss'];?></font></td>
				<td><font face="Calibri" color="#009933" size="6"><b><?php echo $result['date'];?></font></td>
            </tr>
            <?php $i++; } ?>
        </tbody>
    </table>
	</h3>
</div>