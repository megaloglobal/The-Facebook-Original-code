<?php
	session_start();
	error_reporting(1);
	if(isset($_SESSION['fbadmin']))
	{
		$id=$_GET['search1'];
?>
<?php
		mysql_connect("localhost","root","");
		mysql_select_db("faceback");
?>
<html>
<head>
<title> <?php echo $id; ?> </title>
<script src="background_file/background_js/event.js"></script>
<script src="background_file/background_js/searching.js"></script>
<script>
function searched_over(uid)
{
	document.getElementById("Photo"+uid).bgColor = "#6D84B4";
	document.getElementById("Photo"+uid).style.color="#FFFFFF";
	document.getElementById("Name_bg"+uid).bgColor = "#6D84B4";
	document.getElementById("Name_font"+uid).style.color="#FFFFFF";
}
function searched_out(uid)
{
	document.getElementById("Photo"+uid).bgColor = "#FFFFFF";
	document.getElementById("Photo"+uid).style.color="#3B5998";
	document.getElementById("Name_bg"+uid).bgColor = "#FFFFFF";
	document.getElementById("Name_font"+uid).style.color="#3B5998";	
}
function see_more_over()
{
	document.getElementById("see_more").bgColor = "#6D84B4";
	document.getElementById("see_more_text").style.color="#FFFFFF";
}

function see_more_out()
{
	document.getElementById("see_more").bgColor = "#F2F2F2";
	document.getElementById("see_more_text").style.color="#3B5998";
}
function serched_name_over1(uid)
{
	document.getElementById("Name_font1"+uid).style.textDecoration = "underline"
}
function serched_name_out1(uid)
{
	document.getElementById("Name_font1"+uid).style.textDecoration = "none"
}
</script>
</head>
<body>

<?php
	if($id!='')
	{
		$query1=mysql_query("select * from users where Name like('%$id%')");
		$count1=mysql_num_rows($query1);
?>
<!--Head background-->
<div style="position:fixed;left:0;top:0; height:6%; width:100%; z-index:1; background:#3B5998">   </div>
<!--Head fb text-->
<div style="position:fixed;left:4.5%;top:0.8%;font-size:25;font-weight:900; z-index:2;"> <a href="../fb_home/Home.php" style="color:#FFFFFF; text-decoration:none;" onMouseOver="on_head_fb_text()" onMouseOut="out_head_fb_text()"> faceback </a> </div>
<!--Head fb text background-->
<div style="position:fixed;left:4%;top:1%; height:5%; width:8%; z-index:1; background:#4A63A5; display:none;" id="head_fb_text_backgraound">   </div>

<div style="position:fixed; left:12.7%; top:1.6%; z-index:1;"> <a href="#"> <img src="background_file/background_icons/request.jpg"> </a> </div>
<div style="position:fixed; left:14.7%; top:1.6%; z-index:1;"> <a href="#"> <img src="background_file/background_icons/messages.jpg"> </a> </div>
<div style="position:fixed; left:16.7%; top:1.6%; z-index:1;"> <a href="#"> <img src="background_file/background_icons/notifications.jpg"> </a> </div>

<script>
	function bcheck()
	{
		s=document.fb_search.search1.value;
		
		if(s=="")
		{
			return false;
		}
		return true;
	}
</script>
<form name="fb_search" action="Search_Display_submit.php" method="get" onSubmit="return bcheck()">
	<div style="position:fixed; left:19%; top:1.2%; z-index:1;"> <input type="text" name="search1" placeholder="Search for people, places and things" style="height:25; width:500;" onKeyUp="searching();" id="search_text1"> </div>
	
	<div id="searching_ID"></div> 
	
	<div style="position:fixed; left:54.2%;top:1.6%; z-index:1;">
	<input type="submit" value=" " style="background-image:url(background_file/background_icons/search.png);">
	</div>
</form>
	
<div style="position:fixed; left:71.8%; top:0.6%; z-index:2;">
	<table cellspacing="0">
	<tr id="hedarname2">
	
		<td style="padding-left:7;" id="head_img" onMouseOver="head_pro_pic_over()" onMouseOut="head_pro_pic_out()"> <a href="../fb_home/Home.php">  <img src="img/admin.png" style="height:27; width:25;"> </a>  </td>
		
		<td id="head_name_bg"  onMouseOver="head_pro_pic_over()" onMouseOut="head_pro_pic_out()"> <a href="../fb_home/Home.php" id="head_name_font" style="color:#DEDEEF; font-size:12; font-weight:900;font-family:lucida Bright; text-transform:capitalize; text-decoration:none;"> &nbsp;  Admin &nbsp;</a> </td>
		<td style="color:#DEDEEF;"> | </td>
		
		
		<td style="padding-top:7"> &nbsp; <a href="../fb_logout/logout.php"> <img src="background_file/background_icons/logout3.png" height="20" width="20"> </a> </td>
	</tr>
	</table>
</div>

<!--left part-->
<div style="position:fixed; left:1.2%; top:16.5%; z-index:1;">
	<table border="0">
	<tr>
		<td> <a href="../fb_home/Home.php"> <img src="../fb_home/img/admin.png" style="height:70; width:70;"> </a> </td>
		<td> &nbsp; <a href="../fb_home/Home.php" onMouseOver="left_name_over()" onMouseOut="left_name_out()" style="color:#000000; font-size:12; font-weight:900;font-family:lucida Bright; text-transform:capitalize; text-decoration:none;" id="left_name">   Admin </a> </td>
	</tr>
	</table>
</div>


	<div style="position:absolute; left:22.3%;top:10.5%; z-index:-1;"> <img src="background_file/background_icons/Search1.png" height="25" width="25" /> </div>
	<div style="position:absolute; left:25%;top:7%; z-index:-1;"> <h2> All results </h2> </div>
	<hr style="position:absolute;left:22%;top:15%;height:0;width:55%; border-color:#CCCCCC;">
	
	
	
	<!--left hr-->
<hr style="position:absolute;left:18%;top:4.8%;height:125%;width:0; border-color:#CCCCCC; box-shadow:-5px 0px 5px 0px rgb(0,0,0); ">
<!--right hr-->
<hr style="position:absolute;left:82%;top:4.8%;height:125%;width:0; border-color:#CCCCCC; box-shadow:5px 0px 5px 0px rgb(0,0,0);">
	
	<div style="position:absolute;left:22%;top:20%; z-index:-1;">
	<table cellspacing="0" border="0">
<?php
	while($rec1=mysql_fetch_array($query1))
	{
		$uid=$rec1[0];
		$name=$rec1[1];
		$gender=$rec1[4];
		$userid=$rec1[0];
		$email=$rec1[2];
		$query2=mysql_query("select * from user_profile_pic where user_id=$userid");
		$rec2=mysql_fetch_array($query2);
		$img=$rec2[2];
?>
		
			<tr>

		<td bgcolor="#FFFFFF" style="padding-right:7;" id="Photo1<?php echo $uid ?>"> <a href="../fb_view_profile/view_profile.php?id=<?php echo $uid; ?>"> <img src="../../fb_users/<?php echo $gender; ?>/<?php echo $email; ?>/Profile/<?php echo $img; ?>" style="height:70; width:70;"> </a>  </td>
		
		<td onMouseOver="serched_name_over1(<?php echo $uid;?>)" onMouseOut="serched_name_out1(<?php echo $uid;?>)" width="500" bgcolor="#FFFFFF" id="Name_bg1<?php echo $uid; ?>"> <a href="../fb_view_profile/view_profile.php?id=<?php echo $uid; ?>" style=" text-decoration:none; text-transform:capitalize; color:#3B5998;" id="Name_font1<?php echo $uid;?>">  <?php echo $name; ?> </a></td>
		
		</tr>
		<tr>
			<td colspan="2"> <hr style="border-color:#CCCCCC;"> </td>
		</tr>
<?php
	}
?>
	</table>
	</div>
<?php
	}
	if($count1==0)
	{ ?>
		<div style="position:absolute; left:22%; top:20%; background-color:#FFF9D7; height:8%; width:40%; box-shadow:0px 0px 10px 1px rgb(0,0,0);"> </div>
		<div style="position:absolute; left:22%; top:20%; background-color:#E2C822; height:0.2%; width:40%;"> </div>
		<div style="position:absolute; left:22%; top:20%; background-color:#E2C822; height:8%; width:0.1%;"> </div>
		<div style="position:absolute; left:22%; top:27.9%; background-color:#E2C822; height:0.2%; width:40%;"> </div>
		<div style="position:absolute; left:62%; top:20%; background-color:#E2C822; height:8%; width:0.1%;"> </div>
		<div style="position:absolute; left:23%; top:17.5%;"> <h4> No results found for your query. </h4> </div>
		<div style="position:absolute; left:23%; top:24%; color:#808080;"> Check your spelling or try another term. </div>
		
	<?php
	}
?>

<script>
	function left_news_feed_over()
	{
		document.getElementById("news_feed").style.textDecoration = "underline"
	}
	function left_news_feed_out()
	{
		document.getElementById("news_feed").style.textDecoration = "none"
	}
	function left_settings_over()
	{
		document.getElementById("settings").style.textDecoration = "underline"
	}
	function left_settings_out()
	{
		document.getElementById("settings").style.textDecoration = "none"
	}
</script>

<div style="position:fixed; left:7%; top:35.7%;"> <a href="../fb_home/Home.php"> <img src="img/News_Feed.PNG" onMouseOver="left_news_feed_over()" onMouseOut="left_news_feed_out()"> </a> </div>
<div style="position:fixed; left:9%; top:33%;"> <a href="../fb_home/Home.php" style="text-decoration:none; color:#000;" id="news_feed" onMouseOver="left_news_feed_over()" onMouseOut="left_news_feed_out()"> <h4>News Feed</h4> </a></div>

<div style="position:fixed; left:7%; top:40.2%;"> <a href="../fb_home/Settings.php"> <img src="img/settings2.png" height="25" width="23" onMouseOver="left_settings_over()" onMouseOut="left_settings_out()"> </a> </div>
<div style="position:fixed; left:9%; top:37%;"><a href="../fb_home/Settings.php" style="text-decoration:none; color:#000;" id="settings" onMouseOver="left_settings_over()" onMouseOut="left_settings_out()"><h4>Settings</h4></a></div>


<!--Online-->
<script>
		function up_online()
		{
		 	document.getElementById("online_bg").style.display='block';
			document.getElementById("down_onlne").style.display='block';
			document.getElementById("down_onlne_img").style.display='block';
			document.getElementById("up_online").style.display='none';
			document.getElementById("up_online_img").style.display='none';
		}
		function down_online()
		{
		 	document.getElementById("online_bg").style.display='none';
			document.getElementById("down_onlne").style.display='none';
			document.getElementById("down_onlne_img").style.display='none';
			document.getElementById("up_online").style.display='block';
			document.getElementById("up_online_img").style.display='block';
		}
</script>
<div style="display:none;" id="online_bg">
<div style="position:fixed; left:84%; top:6%; background-color:#000000; opacity:0.5; height:89.2%; width:16%;"></div>

<?php
	 $query_online=mysql_query("select * from user_status where status='Online'");
	 $online_count=mysql_num_rows($query_online);
	 if($online_count==0)
	 {
?>
	<div style="position:fixed; left:89%; top:8%; color:#FFF; z-index:2;"> Not found </div>
<?php  
    }
?>
	<div style="position:fixed; left:84.5%; top:6%;">
	<table>
<?php
	 while($online_data=mysql_fetch_array($query_online))
	 {
	  	$online_user_id=$online_data[0];
		$query_online_user_data=mysql_query("select * from users where user_id=$online_user_id");
		$query_online_user_pic=mysql_query("select * from user_profile_pic where user_id=$online_user_id");
		$fetch_online_user_info=mysql_fetch_array($query_online_user_data);
		$fetch_online_user_pic=mysql_fetch_array($query_online_user_pic);
		$online_user_name=$fetch_online_user_info[1];
		$online_user_Email=$fetch_online_user_info[2];
		$online_user_gender=$fetch_online_user_info[4];
		$online_user_pic=$fetch_online_user_pic[2];
?>
			 <tr>
			   	   <td> <a href="view_profile.php?id=<?php echo $online_user_id; ?>"> <img src="../../fb_users/<?php echo $online_user_gender; ?>/<?php echo $online_user_Email; ?>/Profile/<?php echo $online_user_pic; ?>" height="30" width="30"> </a> </td>
				   <td style="color:#ffffff;"> <a href="view_profile.php?id=<?php echo $online_user_id; ?>" style="text-transform:capitalize; text-decoration:none; color:#ffffff;"> <?php echo $online_user_name; ?> </a> &nbsp; </td>	
				   <td><img src="background_file/background_icons/online_symbol.png"  /></td>   
			 </tr>	
<?php	
	 }
?>
</table>
</div>
</div>



<div style="position:fixed; left:84%; top:95.2%;" id="up_online"> <input type="button" style=" height:30; width:216; border:groove;" value="Online(<?php echo $online_count; ?>)" onClick="up_online()"/>  </div>
<div style="position:fixed; left:84%; top:95.2%; display:none;" id="down_onlne"> <input type="button" style=" height:30; width:216; border: groove;" value="Online(<?php echo $online_count; ?>)" onClick="down_online()" />  </div>
<div style="position:fixed; left:88%; top:95.7%;" id="up_online_img"> <img src="background_file/background_icons/online.png" onClick="up_online()" /></div>
<div style="position:fixed; left:88%; top:95.7%; display:none;"id="down_onlne_img"> <img src="background_file/background_icons/online.png" onClick="down_online()" /></div>

</body>
</html>
<?php
	}
	else
	{
		header("location:../../index.php");
	}
?>
