<?php
	session_start();
	error_reporting(1);
	if(isset($_SESSION['fbuser']))
	{
		mysql_connect("localhost","root","");
		mysql_select_db("facebook");
		$user_email=$_SESSION['fbuser'];
		$que_user_info=mysql_query("select * from users where Email='$user_email'");
		$user_data=mysql_fetch_array($que_user_info);
		$userid=$user_data[0];
		$user_name=$user_data[1];
		$user_pass=$user_data[3];
		
		$last_name_pos=strrpos($user_name," ");
		$last_name_pos=$last_name_pos+1;
		$first_name=strstr($user_name,' ',1);
		$last_name=substr($user_name,$last_name_pos,strlen($user_name));
	
?>
<?php
	if(isset($_POST['change_name']))
	{
		$Name=$_POST['fnm'].' '.$_POST['lnm'];
		mysql_query("update users set Name='$Name' where user_id=$userid;");
		header("location:Settings.php");
	}
	if(isset($_POST['change_password']))
	{
		$old_password=$_POST['old_password'];
		$new_password=$_POST['new_password'];
		if($user_pass==$old_password)
		{
			mysql_query("update users set Password='$new_password' where user_id=$userid;");
		}
		else
		{
			echo " <script> alert('old password Wrong') </script>";
		}
	}
	if(isset($_POST['detete_id']))
	{
		$uid=$_POST['uid'];
		mysql_query("delete from users where user_id=$uid;");
		header("location:../../index.php");
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
	
	<div style="position:absolute; left:25%; top:18%; color:#3B59A4; font-size:24px;"> Name </div>
    <div style="position:absolute; left:32%; top:18%; color:#909DB2; font-size:24px; text-transform:capitalize;"> <?php echo $user_name; ?>  </div>
    <div style="position:absolute; left:70%; top:14%"> <img src="img/edit-icon.png" height="70" width="70" onClick="Change_name()"> </div>
    <hr style="position:absolute;left:25%;top:25%;height:0.5%;width:50%; border-color:#CCCCCC; box-shadow:0px 5px 5px 0px rgb(0,0,0); ">
    
    
    <div style="position:absolute; left:25%; top:35%; color:#3B59A4; font-size:24px;"> Paasword </div>
    <div style="position:absolute; left:34%; top:35%; color:#909DB2; font-size:24px;"> ******** </div>
    <div style="position:absolute; left:70%; top:31%"> <img src="img/edit-icon.png" height="70" width="70" onClick="Change_password()"> </div>
    <hr style="position:absolute;left:25%;top:42%;height:0.5%;width:50%; border-color:#CCCCCC; box-shadow:0px 5px 5px 0px rgb(0,0,0); ">
    
    <div style="position:absolute; left:25%; top:47%; "> <input type="button" value="Deactivate your account." style="background:#FFF; color:#3B59A4; font-size:15px; border:none;" onClick="delete_account()"> </div>
    
    
    
    
    <!--Name change dailog box-->
<div style="display:none;" id="change_Name_dailogbox"> 
<div style="position:fixed; background:#3A3E41; opacity: 0.8; left:0%; top:0%; height:100%; width:100%; z-index:3" onClick="hide_name_change_box()"></div>
<div style="position:fixed; background:#3B5998; left:30%; top:20%; height:10%; width:35%; z-index:3"></div>
<div style="position:fixed;  left:36%; top:21.5%; z-index:3"> <img src="img/settings.png" height="50" width="50"> </div>
<div style="position:fixed;  left:41%; top:19%; z-index:3">
<h1 style="color:#FFFFFF;"> Change Name </h1> </div>
<div style="position:fixed;  left:63.7%; top:19%; z-index:4">  <input type="button" style="height:22; width:22; background:url(img/exit.png); no-repeat; border:none;" onClick="hide_name_change_box()"> </div>

<form method="post"  name="name_change"  onSubmit="return name_check();">
	<div style="position:fixed; left:35%; top:33%; z-index:4; font-size:18px;"> First Name </div>
    <div style="position:fixed; left:41.5%; top:32.5%; z-index:4;"> <input type="text" name="fnm" value="<?php echo $first_name; ?>" style="height:35; width:200; font-size:18px;" maxlength="15"> </div>
    <div style="position:fixed; left:35%; top:40%; z-index:4; font-size:18px;"> Last Name </div>
    <div style="position:fixed; left:41.5%; top:39.5%; z-index:4;"> <input type="text" name="lnm" value="<?php echo $last_name; ?>" style="height:35; width:200; font-size:18px;" maxlength="15"> </div>
	<div style="position:fixed; left:45%; top:48%; z-index:4;"> <input type="submit" value="Save" name="change_name" class="save_button"> </div>
</form>


<div style="position:fixed; background:#FFFFFF; left:30%; top:30%; height:30%; width:35%; z-index:3"></div>
<div style="position:fixed;left:30.1%;top:54%; height:6%; width:34.9%;  background:#E9EAED; z-index:3; ">   </div>
<!--name change dailog box boder-->
<div style="position:fixed;left:29.9%; top:20%; height:0.7%; width:35.1%; background-color:#666666; z-index:3; box-shadow:0px -6px 10px 1px rgb(0,0,0); "> </div>
<div style="position:fixed;left:29.9%; top:20%; height:40.1%; width:0.3%; background-color:#666666; z-index:3; box-shadow:-5px 0px 10px 1px rgb(0,0,0); "> </div>
<div style="position:fixed;left:29.9%; top:60.1%; height:0.7%; width:35.1%; background-color:#666666; z-index:3; box-shadow:0px 6px 10px 1px rgb(0,0,0); "> </div>
<div style="position:fixed;left:64.7%; top:20%; height:40.1%; width:0.3%; background-color:#666666; z-index:3;box-shadow:5px 0px 10px 1px rgb(0,0,0);  "> </div>
</div>


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
	<div style="position:fixed; left:44%; top:55.3%; z-index:4;"> <input type="submit" value="Change" name="change_password" class="save_button"> </div>
</form>


<div style="position:fixed; background:#FFFFFF; left:30%; top:30%; height:37%; width:35%; z-index:3"></div>
<div style="position:fixed;left:30.1%;top:62%; height:6%; width:34.9%;  background:#E9EAED; z-index:3; ">   </div>
<!--password change dailog box boder-->
<div style="position:fixed;left:29.9%; top:20%; height:0.7%; width:35.1%; background-color:#666666; z-index:3; box-shadow:0px -6px 10px 1px rgb(0,0,0); "> </div>
<div style="position:fixed;left:29.9%; top:20%; height:48.1%; width:0.3%; background-color:#666666; z-index:3; box-shadow:-5px 0px 10px 1px rgb(0,0,0); "> </div>
<div style="position:fixed;left:29.9%; top:68.1%; height:0.7%; width:35.1%; background-color:#666666; z-index:3; box-shadow:0px 6px 10px 1px rgb(0,0,0); "> </div>
<div style="position:fixed;left:64.7%; top:20%; height:48.1%; width:0.3%; background-color:#666666; z-index:3;box-shadow:5px 0px 10px 1px rgb(0,0,0);  "> </div>
</div>



<!--delete_account  dailog box-->
<div style="display:none;" id="delete_account_dailogbox"> 
<div style="position:fixed; background:#3A3E41; opacity: 0.8; left:0%; top:0%; height:100%; width:100%; z-index:3" onClick="hide_delete_account_box()"></div>
<div style="position:fixed; background:#3B5998; left:30%; top:20%; height:10%; width:35%; z-index:3"></div>
<div style="position:fixed;  left:32%; top:21.5%; z-index:3"> <img src="img/QuestionMark.png" height="50" width="50"> </div>
<div style="position:fixed;  left:37%; top:19.4%; z-index:3">
<h2 style="color:#FFFFFF;"> You want Delete your Account? </h2> </div>
<div style="position:fixed;  left:63.7%; top:19%; z-index:4">  <input type="button" style="height:22; width:22; background:url(img/exit.png); no-repeat; border:none;" onClick="hide_delete_account_box()"> </div>

<div style="position:fixed;  left:31%; top:33%; z-index:4"> <img src="img/sad.gif"> </div>
<div style="position:fixed;  left:41%; top:40%; z-index:4"> 
<form method="post">
<input type="hidden" value="<?php echo $userid; ?>" name="uid">
<input type="submit" value="Yes" name="detete_id" id="yes_button"> 
</form>
</div>

<div style="position:fixed;  left:50%; top:40%; z-index:4"> 
<input type="button" value="No" id="no_button" onClick="hide_delete_account_box()"> 
</div>
<div style="position:fixed;  left:57%; top:31%; z-index:4"> <img src="img/smile.gif" height="110" width="90"> </div>


<div style="position:fixed; background:#FFFFFF; left:30%; top:30%; height:30%; width:35%; z-index:3"></div>
<div style="position:fixed;left:30.1%;top:54%; height:6%; width:34.9%;  background:#E9EAED; z-index:3; ">   </div>
<!--delete account  dailog box boder-->
<div style="position:fixed;left:29.9%; top:20%; height:0.7%; width:35.1%; background-color:#666666; z-index:3; box-shadow:0px -6px 10px 1px rgb(0,0,0); "> </div>
<div style="position:fixed;left:29.9%; top:20%; height:40.1%; width:0.3%; background-color:#666666; z-index:3; box-shadow:-5px 0px 10px 1px rgb(0,0,0); "> </div>
<div style="position:fixed;left:29.9%; top:60.1%; height:0.7%; width:35.1%; background-color:#666666; z-index:3; box-shadow:0px 6px 10px 1px rgb(0,0,0); "> </div>
<div style="position:fixed;left:64.7%; top:20%; height:40.1%; width:0.3%; background-color:#666666; z-index:3;box-shadow:5px 0px 10px 1px rgb(0,0,0);  "> </div>

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