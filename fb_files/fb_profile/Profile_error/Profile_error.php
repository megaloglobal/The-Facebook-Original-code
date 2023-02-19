<html>
<head>
<style>
#ok_button
{
	font-size:12px;
	height:25;
	width:55;
	padding:2;
	background-color:#5B74A8; color:#FFFFFF;
	border-top:#29447E;
	border-right-color:#29447E;
	border-bottom-color:#1A356E;
	border-left-color:#29447E;
	font-weight:bold;
}
</style>
</head>
<body>

<div style="display:none;" id="photo_erorr"> 

<div style="position:fixed; background:#FFFFFF; opacity: 0.8;  left:0%; top:0%; height:100%; width:100%; z-index:3"></div>

<div style="position:fixed;left:29.2%; top:25.1%; height:24%; width:36.7%; background-color:#858585; z-index:3; opacity: 0.8;"> </div>
<div style="position:fixed; background:#6D84B4; left:30%; top:27%; height:7%; width:35%; z-index:3"></div>
<div style="position:fixed;  left:31%; top:28.5%; z-index:3; color:#FFFFFF; font-size:18px; font-weight:bold;"> Bad image </div>
<div style="position:fixed; background:#FFFFFF; left:30%; top:34%; height:7%; width:35%; z-index:3"></div>
<div style="position:fixed;  left:31%; top:35.9%; z-index:3; font-size:14px;"> There was a problem with the image file. </div>
<div style="position:fixed;left:30.1%;top:41%; height:6%; width:34.9%;  background:#E9EAED; z-index:3;">   </div>

<div style="position:fixed; left:60%; top:42.2%;  z-index:3"> <input type="button" value="Ok" id="ok_button" onClick="hide_photo_erorr();"></div>

</div>

</body>
</html>