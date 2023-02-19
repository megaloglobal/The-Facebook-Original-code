<?php
	session_start();
	unset($_SESSION['fbadmin']);
	//session_destroy();
	header("location:../../index.php");
?>