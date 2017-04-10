<?php
		$host="localhost";
		$u_host="root";
		$p_host="root1234";
		$db="test1";
		$con=mysql_connect($host,$u_host,$p_host) or die ("Error!!! connect to server fail");
		mysql_query("SET NAME'UTF8'");
		mysql_select_db($db) or die ("Error!!! connect to database fail");
?>