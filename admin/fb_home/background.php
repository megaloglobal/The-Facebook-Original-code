<html>
<head>
	<link href="../fb_font/font.css" rel="stylesheet" type="text/css">
	<LINK REL="SHORTCUT ICON" HREF="../img/Faceback.ico" />
	<script src="background_file/background_js/event.js"></script>
	<script src="background_file/background_js/searching.js"></script>
	<script src="background_file/background_js/searched_reco_event.js">
	</script>
	<script src="background_file/background_js/submited_searched_reco_event.js"></script>
</head>
<body>

<!--Head background-->
<div style="position:fixed;left:0;top:0; height:6%; width:100%; z-index:1; background:#3B5998">   </div>
<!--Head fb text-->
<div style="position:fixed;left:4.05%;top:0.8%;font-size:25;font-weight:900; z-index:2;"> <a href="Home.php" style="color:#FFFFFF; text-decoration:none;" onMouseOver="on_head_fb_text()" onMouseOut="out_head_fb_text()"> <font face="myFbFont"> facebook </font> </a> </div>
<!--Head fb text background-->
<div style="position:fixed;left:4%;top:1%; height:5%; width:8%; z-index:1; background:#4A63A5; display:none;" id="head_fb_text_backgraound">   </div>

<div style="position:fixed; left:12.7%; top:1.6%; z-index:1;">  <img src="background_file/background_icons/request.jpg">  </div>
<div style="position:fixed; left:14.7%; top:1.6%; z-index:1;"> <a href="Group_Message.php"> <img src="background_file/background_icons/messages.jpg"> </a> </div>
<div style="position:fixed; left:16.7%; top:1.6%; z-index:1;">  <img src="background_file/background_icons/notifications.jpg">  </div>

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
	<div style="position:fixed; left:19%; top:1.2%; z-index:1;"> <input type="text" name="search1" style="height:25; width:500;"  onKeyUp="searching();" id="search_text1" placeholder="Search for people" > </div>
	
	<div id="searching_ID"></div> 

	<div style="position:fixed; left:54.2%;top:1.6%; z-index:1;">
	<input type="submit" value=" " style="background-image:url(background_file/background_icons/search.png);">
	</div>
</form>



	
<div style="position:fixed; left:90%; top:0.6%; z-index:1;">
	<table cellspacing="0">
	<tr id="hedarname2">
	
		<td style="padding-left:7;" id="head_img" onMouseOver="head_pro_pic_over()" onMouseOut="head_pro_pic_out()"> <a href="Home.php">  <img src="img/admin.png" style="height:27; width:25;"> </a>  </td>
		
		<td id="head_name_bg"  onMouseOver="head_pro_pic_over()" onMouseOut="head_pro_pic_out()"> <a href="Home.php" id="head_name_font" style="color:#DEDEEF; font-size:12; font-weight:900;font-family:lucida Bright; text-transform:capitalize; text-decoration:none;"> &nbsp;  Admin &nbsp;</a> </td>
		
	
	</tr>
	</table>
</div>



<!--fb option-->
<script src="background_file/background_js/options.js"></script>

        <div style="position:fixed; left:97%; top:0.4%; z-index:1;"> <img src="background_file/background_icons/nexusae0_home_settings_icon2.png" height="35" width="35" onClick="open_option()"> </div>
        
<div style="display:none" id="option">

<div style="position:fixed; left:97%; top:0.4%; z-index:1;"> <img src="background_file/background_icons/nexusae0_home_settings_icon2.png" height="35" width="35" onClick="close_option()"> </div>

        <div style="position:fixed; left:85%; top:6%; z-index:3; background:#FFF; height:32%; width:14.8%; box-shadow:0px 2px 10px 1px rgb(0,0,0);"> </div>
        
         <div style="position:fixed; left:85.8%; top:7.8%; z-index:3;">
        <a href="Home.php"> <img src="img/News_Feed.PNG"  onMouseOver="head_new_over()" onMouseOut="head_new_out()"></a>
        </div>
        <div style="position:fixed; left:88%; top:5%; z-index:3;">
                 <a href="Home.php" style="text-decoration:none; color:#000;" id="head_new" onMouseOver="head_new_over()" onMouseOut="head_new_out()" ><h4>News Feed</h4></a> 
        </div>
        
	<div style="position:fixed; left:86%; top:13%; z-index:3;"> <a href="Settings.php"> <img src="img/settings2.png" height="25" width="23" onMouseOver="head_settings_over()" onMouseOut="head_settings_out()"> </a> </div>
<div style="position:fixed; left:88.2%; top:10%; z-index:3;"><a href="Settings.php" style="text-decoration:none; color:#000;" id="head_settings" onMouseOver="head_settings_over()" onMouseOut="head_settings_out()"><h4> Account Settings </h4></a></div>

	<div style="position:fixed; left:86%; top:17.8%; z-index:3;"> <a href="Group_Message.php"> <img src="img/group.png" height="25" width="23" onMouseOver="head_g_chat_over()" onMouseOut="head_g_chat_out()"> </a> </div>
<div style="position:fixed; left:88.2%; top:15%; z-index:3;"><a href="Group_Message.php" style="text-decoration:none; color:#000;" id="head_g_chat" onMouseOver="head_g_chat_over()" onMouseOut="head_g_chat_out()"><h4> Group Chat </h4></a></div>

	<div style="position:fixed; left:86%; top:22.8%; z-index:3;"> <a href="Notice.php"> <img src="img/Notice.png" height="25" width="23" onMouseOver="head_notice_over()" onMouseOut="head_notice_out()"> </a> </div>
<div style="position:fixed; left:88.2%; top:20%; z-index:3;"><a href="Notice.php" style="text-decoration:none; color:#000;" id="head_notice" onMouseOver="head_notice_over()" onMouseOut="head_notice_out()"><h4> Notice </h4></a></div>

<div style="position:fixed; left:86.1%; top:27.5%; z-index:3;"> <a href="feedback.php"> <img src="background_file/background_icons/icon-feedback.png" height="20" width="20" onMouseOver="head_feedback_over()" onMouseOut="head_feedback_out()"> </a> </div>
<div style="position:fixed; left:88.3%; top:24.5%; z-index:3;"><a href="feedback.php" style="text-decoration:none; color:#000;" id="head_feedback" onMouseOver="head_feedback_over()" onMouseOut="head_feedback_out()"><h4> Feedback </h4></a></div>

<div style="position:fixed; left:86%; top:32.5%; z-index:3;"> <a href="../fb_logout/logout.php"> <img src="background_file/background_icons/logout.png" height="20" width="20"  onMouseOver="head_logout_over()" onMouseOut="head_logout_out()"> </a> </div>
<div style="position:fixed; left:88.3%; top:29.1%; z-index:3;"><a href="../fb_logout/logout.php" style="text-decoration:none; color:#000;" id="head_logout" onMouseOver="head_logout_over()" onMouseOut="head_logout_out()"><h4> Logout </h4></a></div>
</div>


		
		
<!--left part-->
<div style="position:fixed; left:1.2%; top:16.5%; z-index:1;">
	<table border="0">
	<tr>
		<td> <a href="Home.php">  <img src="img/admin.png" style="height:70; width:70;"> </a>  </td>
		<td> &nbsp; <a href="Home.php" onMouseOver="left_name_over()" onMouseOut="left_name_out()" style="color:#000000; font-size:12; font-weight:900;font-family:lucida Bright; text-transform:capitalize; text-decoration:none;" id="left_name">  Admin </a>   </td>
	</tr>
	</table>
</div>


<div style="position:fixed; left:7%; top:35.7%;"> <a href="Home.php"> <img src="img/News_Feed.PNG" onMouseOver="left_news_feed_over()" onMouseOut="left_news_feed_out()"> </a> </div>
<div style="position:fixed; left:9%; top:33%;"> <a href="Home.php" style="text-decoration:none; color:#000;" id="news_feed" onMouseOver="left_news_feed_over()" onMouseOut="left_news_feed_out()"> <h4>News Feed</h4> </a></div>

<div style="position:fixed; left:7%; top:40.2%;"> <a href="Group_Message.php"> <img src="img/group.png" height="25" width="23" onMouseOver="left_group_message_over()" onMouseOut="left_group_message_out()"> </a> </div>
<div style="position:fixed; left:9%; top:37%;"><a href="Group_Message.php" style="text-decoration:none; color:#000;" id="group_message" onMouseOver="left_group_message_over()" onMouseOut="left_group_message_out()"><h4>Group Chat</h4></a></div>

<div style="position:fixed; left:7.3%; top:44.7%;"> <a href="feedback.php"> <img src="img/icon-feedback.png" height="25" width="23" onMouseOver="left_feedback_over()" onMouseOut="left_feedback_out()"> </a> </div>
<div style="position:fixed; left:9%; top:41.7%;"><a href="feedback.php" style="text-decoration:none; color:#000;" id="feedback" onMouseOver="left_feedback_over()" onMouseOut="left_feedback_out()"><h4>Feedback</h4></a></div>

<div style="position:fixed; left:7.2%; top:49.2%;"> <a href="Notice.php"> <img src="img/Notice.png" height="25" width="20" onMouseOver="left_notice_over()" onMouseOut="left_notice_out()"> </a> </div>
<div style="position:fixed; left:9%; top:46%;"><a href="Notice.php" style="text-decoration:none; color:#000;" id="notice" onMouseOver="left_notice_over()" onMouseOut="left_notice_out()"><h4>Notice</h4></a></div>

<div style="position:fixed; left:7%; top:53.7%;"> <a href="Settings.php"> <img src="img/settings2.png" height="25" width="23" onMouseOver="left_settings_over()" onMouseOut="left_settings_out()"> </a> </div>
<div style="position:fixed; left:9%; top:50.7%;"><a href="Settings.php" style="text-decoration:none; color:#000;" id="settings" onMouseOver="left_settings_over()" onMouseOut="left_settings_out()"><h4>Settings</h4></a></div>

<div style="position:fixed; left:7%; top:58%;"> <a href="users.php"> <img src="img/all_users.png" height="25" width="23" onMouseOver="left_users_over()" onMouseOut="left_users_out()"> </a> </div>
<div style="position:fixed; left:9%; top:55%;"><a href="users.php" style="text-decoration:none; color:#000;" id="users" onMouseOver="left_users_over()" onMouseOut="left_users_out()"><h4>All Users</h4></a></div>


<!--left hr-->
<hr style="position:fixed;left:18%;top:4.8%;height:99%;width:0; border-color:#CCCCCC; box-shadow:-5px 0px 5px 0px rgb(0,0,0);">
<!--right hr-->
<hr style="position:fixed;left:82%;top:4.8%;height:99%;width:0; border-color:#CCCCCC; box-shadow:5px 0px 5px 0px rgb(0,0,0);">


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
error_reporting(1);
	mysql_connect("localhost","root","");
	mysql_select_db("faceback");
	
	 $query_online=mysql_query("select * from user_status where status='Online'");
	 $online_count=mysql_num_rows($query_online);
	 
	 if($online_count==0)
	 {
?>
		<div style="position:fixed; left:89%; top:8%; color:#FFF;"> Not found </div>
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
			   	   <td> <a href="../fb_view_profile/view_profile.php?id=<?php echo $online_user_id; ?>"> <img src="../../fb_users/<?php echo $online_user_gender; ?>/<?php echo $online_user_Email; ?>/Profile/<?php echo $online_user_pic; ?>" height="30" width="30"> </a> </td>
				   <td style="color:#ffffff;"> <a href="../fb_view_profile/view_profile.php?id=<?php echo $online_user_id; ?>" style="text-transform:capitalize; text-decoration:none; color:#ffffff;"> <?php echo $online_user_name; ?> </a> &nbsp; </td>	
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
