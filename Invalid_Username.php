<?php
	include("Login.php");
?>
<html>
<head>
<title> Facebook </title>
<LINK REL="SHORTCUT ICON" HREF="fb_files/fb_title_icon/Faceback.ico" />
	<style>
		#singup_button
		{
			background:#69A74E;
			color:#FFFFFF;
			border-top-color:#3B6E22;
			border-right-color:#2C5115;
			border-left-color:#3B6E22;
			font-size:15px;
			height:30;
			width:75;
			font-weight:bold;
			box-shadow:-5px 0px 10px 1px rgb(0,0,0);

		}
		
		#login_button
		{
			font-size:10px;
			height:25;
			width:49;
			padding:2;
			background-color:#5B74A8; color:#FFFFFF;
			border-top:#29447E;
			border-right-color:#29447E;
			border-bottom-color:#1A356E;
			border-left-color:#29447E;
			font-weight:bold;
		}
	</style>
     <link href="fb_files/fb_font/font.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="position:absolute;left:0;top:0; height:13%; width:100%; z-index:-1; background:#3B5998">   </div>
<div style="position:absolute;left:13.5%; top:3.3%; font-size:45; font-weight:900; color:#FFFFFF; font-weight:bold;"> <font face="myFbFont">  3D Facebook </font> </div>

<div style="position:absolute;left:13.6%; top:14.8%;"> <a href="index.php" style="text-decoration:none;"> <input type="button" value="Sign Up" id="singup_button">    </a> </div>

<div style="position:absolute;left:26%; top:25%; height:1; width:46.85%; background-color:#CCCCCC; "> </div>
<div style="position:absolute;left:26%; top:25%; height:60%; width:0.10%; background-color:#CCCCCC; "> </div>
<div style="position:absolute;left:26%; top:84.9%; height:1; width:46.85%; background-color:#CCCCCC; "> </div>
<div style="position:absolute;left:72.75%; top:25%; height:60%; width:0.10%; background-color:#CCCCCC; "> </div>

<div style="position:absolute; left:27.4%; top:28.2%;">  <font size="4"> Faceback Login </font>  </div>

<div style="position:absolute;left:27.4%; top:32.8%; height:1; width:44.05%; background-color:#CCCCCC; "> </div>

<div style="position:absolute;left:27.4%;top:36.2%; height:18%; width:44.05%; z-index:-1; background:#FFEBE8; ">   </div>

<div style="position:absolute;left:27.4%; top:36.2%; height:1; width:44.05%; background-color:#DD3C10; "> </div>
	<div style="position:absolute;left:27.3%; top:36.2%; height:18%; width:0.08%; background-color:#DD3C10; "> </div>
	<div style="position:absolute;left:27.4%; top:54.2%; height:1; width:44.05%; background-color:#DD3C10; "> </div>
	<div style="position:absolute;left:71.35%; top:36.2%; height:18%; width:0.10%; background-color:#DD3C10; "> </div>
	
	<div style="position:absolute; left:28%; top:37.2%;"> <font size="4"> Incorrect Email </font>  </div>
	<div style="position:absolute; left:28%; top:42.2%; font-size:12;">  The email you entered does not belong to any account.  </div>
	<div style="position:absolute; left:28%; top:46.2%; font-size:12;">  You can login using any email, username associated with your account. Make sure that it is   </div>
	<div style="position:absolute; left:28%; top:48.7%; font-size:12;">  typed correctly.  </div>
	
<form  method="post">
	<div style="position:absolute; left:35.5%; top:57.2%; font-size:15; color:#333333;"> Email </div>
	<div style="position:absolute; left:43.5%; top:57%; font-size:11px; "> <input type="text" name="username" style="width:174;"/> </div>
	<div style="position:absolute; left:35.5%; top:62.2%; font-size:15; color:#333333;"> Password: </div>
	<div style="position:absolute;left:43.5%; top:62%; font-size:11px; "> <input type="password" name="password" style="width:174;"> </div>
	<div style="position:absolute; left:43.3%; top:66.7%; font-size:12; ">  <input type="checkbox" checked="checked">   Keep me logged in </div>
	<div style="position:absolute;left:43.5%;top:71.7%; ">  <input type="submit" name="Login" value="Log In" id="login_button" />  </div>
	<div style="position:absolute;left:47.5%;top:71.7%; "> or </div>
	<div style="position:absolute;left:49%;top:71.7%; "> <a href="index.php" style="color:#3B5998;text-decoration:none;"> Sign up for Facebook </a> </div>
	<div style="position:absolute;left:43.5%; top:77.2%; font-size:12px;"> <a href='Forgot_Password.php' style="text-decoration:none; color:#3B5998;" > Forgot your password? </a> </div>

</body>
</html>

