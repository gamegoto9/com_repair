<?php
include 'html_head.php'
?>
<?php
	include 'connect.php'; 
	$rep_id=$_POST['rep_id'];
	$U_id=$_POST['inputName'];
	$U_name=$_POST['inputMail'];
	$Email=$_POST['select11'];
	$Catgory=$_POST['inputPhone'];
	$Subject=$_POST['select21'];
	$Message=$_POST['inputnum'];
	
	//$delmem='0';
	
	//$uimg=$_FILES['uimg']['name'];
	
	$SQL="SELECT * FROM repair WHERE rep_id ='$rep_id'";
	$SQLQUERY=mysql_db_query($db,$SQL);
	$ROW=mysql_num_rows($SQLQUERY);
	
	/*if($uimg<>'')
	{
		echo $uimg;
		move_uploaded_file($_FILES['uimg']['tmp_name'],"uimg/".$uimg);
	}elseif($uimg==''){
		$uimg='userdefault.jpg';
		
	}
	*/

	if($U_id=='' or $U_name==''  or $Email=='' or $Catgory=='' or $Subject=='' or $Message==''  )
	{
		
		//echo $U_id;?> <br /><?
		//echo $U_name;?> <br /><?
		//echo $Email;?> <br /><?
		//echo $Catgory;?> <br /><?
		//echo $Subject;?> <br /><?
		//echo $Message;?> <br /><?
		
		
	?>
    
	<script language="javascript">
	alert("กรุณากรอกข้อมูลให้ครบ");
	window.location.href="index.php";
	</script>
    
    
	<?php

	}elseif($ROW<>0){
		?>
	<script language="javascript">
	alert("มี Username นี้อยู่แล้ว");
	window.location.href="index.php";
	</script>
	<?php
		
	}elseif($customer_password<>$customer_password2){
	?>
		<?php
	}else{
		
		//echo $U_id;?> <br /><?
		//echo $U_name;?> <br /><?
		//echo $Email;?> <br /><?
		//echo $Catgory;?> <br /><?
		//echo $Subject;?> <br /><?
		//echo $Message;?> <br /><?
	
	$SQLINS1="INSERT INTO repair values('$U_id','$U_name','$Email','$Catgory','$Subject','$Message')";
	$SQLQUERY1=mysql_db_query($db,$SQLINS1);
	?>

	<script language="javascript">
	alert("สมัครสมาชิกเรียบร้อยแล้ว");
	window.location.href="index.php";
	</script>
	<?php
	}

	?>

<?php
include 'html_foot.php'
?>