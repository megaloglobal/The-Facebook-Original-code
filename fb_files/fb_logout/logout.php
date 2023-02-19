<?php
	session_start();
	error_reporting(1);
	$user=$_SESSION['fbuser'];
	mysql_connect("localhost","root","");
	mysql_select_db("faceback");
	$query1=mysql_query("select * from users where Email='$user'");
	$rec1=mysql_fetch_array($query1);
	$userid=$rec1[0];
	mysql_query("update user_status set status='Offline' where user_id='$userid'");
	unset($_SESSION['fbuser']);
	//session_destroy();
	header("location:../../index.php");
?>