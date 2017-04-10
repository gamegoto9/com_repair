<?php
include 'html_head.php'
?>
<?php
	mysql_connect("localhost","root","root1234");
	mysql_select_db("test1");
	
	if(trim($_POST["inputName"]) == "")
	{
		echo "Please input Username!";
		exit();	
	}
	
	if(trim($_POST["inputMail"]) == "")
	{
		echo "Please input Password!";
		exit();	
	}	
		
		
	if(trim($_POST["select11"]) == "")
	{
		echo "Please input Name!";
		exit();	
	}	
	if(trim($_POST["select12"]) == "")
	{
		echo "Please input Name!";
		exit();	
	}	
	if(trim($_POST["inputPhone"]) == "")
	{
		echo "Please input Name!";
		exit();	
	}	
	if(trim($_POST["select21"]) == "")
	{
		echo "Please input Name!";
		exit();	
	}	
	if(trim($_POST["select22"]) == "")
	{
		echo "Please input Name!";
		exit();	
	}	
	if(trim($_POST["select23"]) == "")
	{
		echo "Please input Name!";
		exit();	
	}	
	if(trim($_POST["inputtext"]) == "")
	{
		echo "Please input Name!";
		exit();	
	}	
	
	$strSQL = "SELECT * FROM repair WHERE U_id = '".trim($_POST['inputName'])."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if($objResult)
	{
			echo "Username already exists!";
	}
	else
	{	
		
		$strSQL = "INSERT INTO member (U_id,U_name,Email,Catgory,Subject,Message,CloseDate) VALUES ('".$_POST["inputName"]."', 
		'".$_POST["inputMail"]."','".$_POST["select11"]."','".$_POST["inputPhone"]."','".$_POST["select21"]."','".$_POST["inputnum"]."','".$_POST["inputtext"]."','".$_POST["textArea"]."')";
		$objQuery = mysql_query($strSQL);
		
		echo "Register Completed!<br>";		
	
		echo "<br> Go to <a href='login.php'>Login page</a>";
		
	}

	mysql_close();
?>





<?php
include 'html_foot.php'
?>
