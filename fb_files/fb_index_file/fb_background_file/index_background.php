<html>
<head>
<script>
	function open_developer_details()
	{
		document.getElementById("my_details").style.display='block';
		document.getElementById("my_name").style.textDecoration = "underline"
	}
	function close_developer_details()
	{
		document.getElementById("my_details").style.display='none';
		document.getElementById("my_name").style.textDecoration = "none"
	}
</script>
</head>
<body>
	 <!--head background-->
	<div style="position:absolute;left:0%;top:0%; height:13.2%; width:100%; z-index:-1; background:#3B5998">   </div>
	<!--text: faceback -->
	<div style="position:absolute;left:13.5%; top:3.3%; font-size:45; font-weight:900; color:#FFFFFF; font-weight:bold;"> <font face="myFbFont">   Facebook </font> </div>
	<!--body background-->
	<div style="position:absolute;left:0%;top:13.2%; height:90%; width:100%; z-index:-1; background:#E7EBF2">   </div>
	<!--bottam background-->
	<div style="position:absolute;left:0%;top:110%; height:5%; width:100%; z-index:-1; background:#FFFFFF">   </div>
    <div style="position:absolute;left:5%;top:105%;"><font face="myFbFont"> Brought To You By: <span style=" color:#3B5998;" id="my_name"> <a href="http:\\code-projects.org">  code-projects.org</a>  </span> </font> </div>




</body>
</html>
