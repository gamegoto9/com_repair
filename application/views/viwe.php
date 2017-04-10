<?php
include 'html_head.php';
?>
<?php
$objConnect = mysql_connect("localhost","root","root1234") or die("Error Connect to Database fail!!!!!!");
$objDB = mysql_select_db("test1");
$strSQL = "SELECT * FROM repair ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table class="table table-striped table-hover" >
  <thead class="thead-default">
    <center><tr>
      <th>ลำดับ</th>
      <th>รหัส</th>
      <th>ชื่อผู้แจ้งซ่อม</th>
      <th>อีเมลล์</th>
      <th>ปะเภทครุภัณฑ์</th>
      <th>อาการเสีย</th>
      <th>รายละเอียด</th>
      <th>วันที่แจ้งซ่อม</th>
      <th>วันที่ปิดงาน</th>
      </tr></center>
  </thead>
 <?php
while($objResult = mysql_fetch_array($objQuery))
	{
?>
  <tr>
    <td ><div align="center"><?php echo $objResult["rep_id"];?></div></td>
    <td ><div align="leff" style="width:30px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;"><? echo $objResult["U_id"];?></td></div>
    <td><div align="left" style="width:100px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;"><?php echo $objResult["U_name"];?></td></div>
    <td><div align="left" style="width:100px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;"><?php echo $objResult["Email"];?></div></td>
    <td><div align="left" style="width:100px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;"><?php echo $objResult["Catgory"];?></td>
    <td><div align="left" style="width:100px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;"><?php echo $objResult["Subject"];?></td>
    <td><div align="left" style="width:100px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;"><?php echo $objResult["Message"];?></td>
    <td><div align="left" style="width:100px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;"><?php echo $objResult["Date"];?></td>
    <td><div align="left" style="width:100px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;"><?php echo $objResult["CloseDate"];?></td>
  </tr>
<?php
	}
?> 
</table> 
  <?php
mysql_close($objConnect);
?>   
<?php
include 'html_foot.php';
?>