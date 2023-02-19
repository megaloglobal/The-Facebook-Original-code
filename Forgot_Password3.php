<?php
	include("Login.php");
?>
<?php
	mysql_connect("localhost","root","");
	mysql_select_db("faceback");
	
	$userid=$_POST['userid'];
	$ans1=$_POST['ans1'];
	
	$que1=mysql_query("select * from user_secret_quotes where user_id=$userid and Answer1='$ans1'");
	$count1=mysql_num_rows($que1);
	
	if($count1>0)
	{
		$que2=mysql_query("select * from user_secret_quotes where user_id=$userid");
		
		$rec1=mysql_fetch_row($que2);
		echo "<div style='position:absolute; left:30%; top:43%;'> <h4> Secret Question 2: </h4> </div>";
		echo "<div style='position:absolute; left:40%; top:43%;'><h4>".$rec1[3]."</h4></div>";
?>
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

<div style="position:absolute;left:35%;top:25%; height:10%; width:7%; z-index:-1; background:#999999; box-shadow:0px 0px 10px 1px rgb(0,0,0);">   </div>
<div style="position:absolute;left:45%;top:25%; height:10%; width:7%; z-index:-1; background:#999999; box-shadow:0px 0px 10px 1px rgb(0,0,0);">   </div>
<div style="position:absolute;left:55%;top:25%; height:10%; width:7%; z-index:-1; background:#339900; box-shadow:0px 0px 10px 1px rgb(0,0,0);">   </div>
<div style="position:absolute; left:36%; top:25%;"> <h2> Step 1 </h2> </div>
<div style="position:absolute; left:46%; top:25%;"> <h2> Step 2 </h2> </div>
<div style="position:absolute; left:56%; top:25%;"> <h2> Step 3 </h2> </div>

<div style="position:absolute;left:26%; top:30.8%; height:1; width:46.85%; background-color:#CCCCCC; z-index:-2 "> </div>
<div style="position:absolute;left:26%; top:30.8%; height:44.3%; width:0.08%; background-color:#CCCCCC; "> </div>
<div style="position:absolute;left:26%; top:75%; height:1; width:46.85%; background-color:#CCCCCC; "> </div>
<div style="position:absolute;left:72.75%; top:30.8%; height:44.3%; width:0.10%; background-color:#CCCCCC; "> </div>

 <form action="Forgot_Password4.php"  method="post"> 
	<div style="position:absolute; left:32%; top:51%;"> <h4> Your Answer: </h4> </div>
	<div style="position:absolute; left:40%; top:54%;">  <input type="text" name="ans2" style="height:28; font-size:16px; height:35; width:300;">  </div>
	<input type="hidden" value="<?php echo $userid; ?>" name="userid">
	<div style="position:absolute; left:45%; top:63%;">  <input type="submit" name="Next" value="Next" id="next"> </div>
</form>

</body>
</html>
<?php
	}
	else
	{
		header("location:Forgot_Password.php");
	}
?>