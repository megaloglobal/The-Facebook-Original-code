<?php
	include("Forgot_Password_background.php");
?>
<html>
<head>
<title> Forgot Password </title>
	<style>	
		#next
		{
			font-size:18px;
			height:35;
			width:80;
			padding:2;
			background-color:#5B74A8; color:#FFFFFF;
			border-top:#29447E;
			border-right-color:#29447E;
			border-bottom-color:#1A356E;
			border-left-color:#29447E;
			font-size:15px;
			font-weight:bold;
			box-shadow:5px 0px 10px 1px rgb(0,0,0);
		}
	</style>
</head>
<body>

<div style="position:absolute;left:35%;top:25%; height:10%; width:7%; z-index:-1; background:#339900; box-shadow:0px 0px 10px 1px rgb(0,0,0);">   </div>
<div style="position:absolute;left:45%;top:25%; height:10%; width:7%; z-index:-1; background:#999999; box-shadow:0px 0px 10px 1px rgb(0,0,0);">   </div>
<div style="position:absolute;left:55%;top:25%; height:10%; width:7%; z-index:-1; background:#999999; box-shadow:0px 0px 10px 1px rgb(0,0,0);">   </div>

<div style="position:absolute; left:36%; top:25%;"> <h2> Step 1 </h2> </div>
<div style="position:absolute; left:46%; top:25%;"> <h2> Step 2 </h2> </div>
<div style="position:absolute; left:56%; top:25%;"> <h2> Step 3 </h2> </div>

<div style="position:absolute;left:26%; top:30.8%; height:1; width:46.85%; background-color:#CCCCCC; z-index:-2 "> </div>
<div style="position:absolute;left:26%; top:30.8%; height:44.3%; width:0.08%; background-color:#CCCCCC; "> </div>
<div style="position:absolute;left:26%; top:75%; height:1; width:46.85%; background-color:#CCCCCC; "> </div>
<div style="position:absolute;left:72.75%; top:30.8%; height:44.3%; width:0.10%; background-color:#CCCCCC; "> </div>

<form action="Forgot_Password2.php"  method="post">
	<div style="position:absolute; left:32%; top:45.6%;"> <h4> Enter Your Email Id: </h4> </div>
	<div style="position:absolute; left:43%; top:44.5%;"> <h4> <input type="text" name="Email" style="height:35; width:300; font-size:18px;"> </h4> </div>
	<div style="position:absolute; left:45%; top:60%;">  <input type="submit" name="Next" value="Next" id="next"> </div>
</form>


</body>
</html>