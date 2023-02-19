<?php
	session_start();
	error_reporting(1);
	if(isset($_SESSION['fbadmin']))
	{
		mysql_connect("localhost","root","");
		mysql_select_db("faceback");
		
		if(isset($_POST['notice_users']))
		{
			$notice_txt=$_POST['notice_txt'];
			$notice_time=$_POST['notice_time'];
			
			$que_users=mysql_query("select * from users");
			while($users_data=mysql_fetch_array($que_users))
			{
				$user_id=$users_data[0];
				mysql_query("insert into users_notice(user_id,notice_txt,notice_time) values($user_id,'$notice_txt','$notice_time')");
			}
		}
		
		
	include("background.php");
?>
<html>
<head>
<title> Notice </title>
<script>
	function time_get()
	{
		d = new Date();
		mon = d.getMonth()+1;
		time = d.getDate()+"-"+mon+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes();
		notice_form.notice_time.value=time;
	}
</script>
</head>
<body>


<!--notice-->
<script>
	function open_notice_form()
	{
		document.getElementById("notice_form").style.display='block';
	}
	function close_notice_form()
	{
		document.getElementById("notice_form").style.display='none';
	}
</script>
<style>
#notice_button
{
	font-size:18px;
	height:50;
	width:100;
	padding:2;
	background-color:#5B74A8; 
	color:#FFFFFF;
	border-top:#29447E;
	border-right-color:#29447E;
	border-bottom-color:#1A356E;
	border-left-color:#29447E;
	font-weight:bold;
	box-shadow:0px 0px 10px 1px rgb(0,0,0);
}
</style>



<!--notice -->

<div style="position:absolute; left:37%; top:10%;"> <img src="img/Notice.png" height="100" width="100"></div>
<div style="position:absolute; left:45%; top:10%;  color:#3B59A4; font-size:72px;">   Notice  </div>
<hr style="position:absolute;left:25%;top:27%;height:0.5%;width:50%; border-color:#CCCCCC; box-shadow:0px 5px 5px 0px rgb(0,0,0); ">

<div style="position:absolute; left:30%; top:35%; ">
    <img src="img/users.png" height="180" width="180">
</div>
<div style="position:absolute; left:45%; top:42%;  text-transform:capitalize; font-size:48;"> All Users </div>
<form method="post" name="notice_form">
<div style="position:absolute; left:20%; top:72%; "> 
	<input type="text" style="height:50; width:800; font-size:20px; color:#3B59A4;" name="notice_txt" maxlength="90" placeholder="Write a notice..">
</div>
<input type="hidden" name="notice_time">
<div style="position:absolute; left:72%; top:83%; ">  
    <input type="submit" name="notice_users" value="Notice" id="notice_button" onClick="time_get()">
</div> 
</form>

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
