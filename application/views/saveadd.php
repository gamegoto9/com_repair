<?php
include 'html_head.php'
?>
<?php
$objConnect = mysql_connect("localhost","root","root1234") or die("Error Connect to Database");
$objDB =   mysql_select_db("test1");
$strSQL = "INSERT INTO repair";
$strSQL .="(U_name,Email,Phone,Subject,Message,detail) ";
$strSQL .="VALUES ";
$strSQL .="('".$_POST["inputName"]."','".$_POST["inputMail"]."','".$_POST["inputPhone"]."' ";
$strSQL .=",'".$_POST["inputnum"]."','".$_POST["inputtext"]."','".$_POST["textArea"]."') ";
$objQuery = mysql_query($strSQL);
$strSQL = "INSERT INTO catgory";
$strSQL .="(c_type,c_name) ";
$strSQL.="VALUES ";
$strSQL.="('".$_POST["select11"]."','".$_POST["select12"]."') ";
$objQuery = mysql_query($strSQL);
if($objQuery)
{
	echo "ส่งคำร้องเสร็จเรียบร้อย.";
	echo "<br> กลับสู่หน้าหลัก <a href='index.php'>Click</a>";
}
else
{
	echo "Error Save [".$strSQL."]";
}
mysql_close($objConnect);
?>

<?php
include 'html_foot.php'
?>