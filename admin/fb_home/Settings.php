<?php
	session_start();
	error_reporting(1);
	if(isset($_SESSION['fbadmin']))
	{
		mysql_connect("localhost","root","");
		mysql_select_db("faceback");
		$admin_user=$_SESSION['fbadmin'];
		$que_admin_info=mysql_query("select * from admin_info where Username='$admin_user'");
		$que_admin_data=mysql_fetch_array($que_admin_info);
		$admin_password=$que_admin_data[1];	
?>
<?php
	if(isset($_POST['change_password']))
	{
		$old_password=md5($_POST['old_password']);
		$new_password=md5($_POST['new_password']);
		if($admin_password==$old_password)
		{
			mysql_query("update admin_info set Password='$new_password' where Username='$admin_user'");
		}
		else
		{
			echo " <script> alert('old password Wrong') </script>";
		}
	}
?>
<?php
	include("background.php");
?>
<html>
<head>
	<title>Settings</title>
    <link href="Settings_css/Settings.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="Settings_js/Settings.js"> </script>
</head>
<body>
	
    
    
    <div style="position:absolute; left:25%; top:20%; color:#3B59A4; font-size:24px;"> Paasword </div>
    <div style="position:absolute; left:34%; top:20%; color:#909DB2; font-size:24px;"> ******** </div>
    <div style="position:absolute; left:70%; top:15%"> <img src="img/edit-icon.png" height="70" width="70" onClick="Change_password()"> </div>
    <hr style="position:absolute;left:25%;top:26%;height:0.5%;width:50%; border-color:#CCCCCC; box-shadow:0px 5px 5px 0px rgb(0,0,0); ">


 <!--password change dailog box-->
<div style="display:none;" id="change_password_dailogbox"> 
<div style="position:fixed; background:#3A3E41; opacity: 0.8; left:0%; top:0%; height:100%; width:100%; z-index:3" onClick="hide_password_change_box()"></div>
<div style="position:fixed; background:#3B5998; left:30%; top:20%; height:10%; width:35%; z-index:3"></div>
<div style="position:fixed;  left:35%; top:21.5%; z-index:3"> <img src="img/settings.png" height="50" width="50"> </div>
<div style="position:fixed;  left:40%; top:19%; z-index:3">
<h1 style="color:#FFFFFF;"> Change Password </h1> </div>
<div style="position:fixed;  left:63.7%; top:19%; z-index:4">  <input type="button" style="height:22; width:22; background:url(img/exit.png); no-repeat; border:none;" onClick="hide_password_change_box()"> </div>

<form method="post"  name="password_change"  onSubmit="return password_check()">
	<div style="position:fixed; left:33%; top:34%; z-index:4; font-size:18px;"> Old Password </div>
    <div style="position:fixed; left:44%; top:33.5%; z-index:4;"> <input type="password" name="old_password" style="height:30; width:240; font-size:18px;" maxlength="30" > </div>
    <div style="position:fixed; left:33%; top:41%; z-index:4; font-size:18px;"> New Password </div>
    <div style="position:fixed; left:44%; top:40.5%; z-index:4;"> <input type="password" name="new_password" style="height:30; width:240; font-size:18px;" maxlength="30"> </div>
    <div style="position:fixed; left:33%; top:48%; z-index:4; font-size:18px;"> Conform Password </div>
    <div style="position:fixed; left:44%; top:47.5%; z-index:4;"> <input type="password" name="c_password" style="height:30; width:240; font-size:18px;" maxlength="30"> </div>
	<div style="position:fixed; left:44%; top:55.3%; z-index:4;"> <input type="submit" value="Change" name="change_password" id="change_button"> </div>
</form>


<div style="position:fixed; background:#FFFFFF; left:30%; top:30%; height:37%; width:35%; z-index:3"></div>
<div style="position:fixed;left:30.1%;top:62%; height:6%; width:34.9%;  background:#E9EAED; z-index:3; ">   </div>
<!--password change dailog box boder-->
<div style="position:fixed;left:29.9%; top:20%; height:0.7%; width:35.1%; background-color:#666666; z-index:3; box-shadow:0px -6px 10px 1px rgb(0,0,0); "> </div>
<div style="position:fixed;left:29.9%; top:20%; height:48.1%; width:0.3%; background-color:#666666; z-index:3; box-shadow:-5px 0px 10px 1px rgb(0,0,0); "> </div>
<div style="position:fixed;left:29.9%; top:68.1%; height:0.7%; width:35.1%; background-color:#666666; z-index:3; box-shadow:0px 6px 10px 1px rgb(0,0,0); "> </div>
<div style="position:fixed;left:64.7%; top:20%; height:48.1%; width:0.3%; background-color:#666666; z-index:3;box-shadow:5px 0px 10px 1px rgb(0,0,0);  "> </div>
</div>


<?php
	include("Settings_error/Settings_error.php");
?>
<div style="position:absolute; left:90%; top:100%;" > &nbsp; </div>	
</body>
</html>
<?php
	}
	else
	{
		header("location:../../index.php");
	}
?>