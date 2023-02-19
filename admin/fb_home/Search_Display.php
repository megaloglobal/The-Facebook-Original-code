<html>
<head>
	
</head>
<body>
<?php
error_reporting(1);
	$id=$_GET['search_text'];
	mysql_connect("localhost","root","");
	mysql_select_db("faceback");
	if($id!='')
	{
		$query1=mysql_query("select * from users where Name like('%$id%')");
		$count1=mysql_num_rows($query1);
?>
	<div style="position:fixed;left:19%;top:5.4%; height:3%; width:42%; z-index:3; background:#F2F2F2">   </div>
	<div style="position:fixed;left:19.5%;top:5.3%; z-index:3;"> People </div>
	<div style="position:fixed;left:19.1%;top:8.4%; z-index:3;">
		<table cellspacing="0" align="center" style="border:ridge;">
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
				<tr onMouseOver="searched_over(<?php echo $uid; ?>)" onMouseOut="searched_out(<?php echo $uid; ?>)">
			
			<td bgcolor="#FFFFFF" style="padding-left:5;" id="Photo<?php echo $uid; ?>"> <a href="../fb_view_profile/view_profile.php?id=<?php echo $uid; ?>">  <img src="../../fb_users/<?php echo $gender; ?>/<?php echo $email; ?>/Profile/<?php echo $img; ?>" style="height:70; width:70;"> </a> </td>
			
			<td width="500" bgcolor="#FFFFFF" id="Name_bg<?php echo $uid;?>"> <a href="../fb_view_profile/view_profile.php?id=<?php echo $uid; ?>" style=" text-decoration:none; text-transform:capitalize; color:#3B5998;" id="Name_font<?php echo $uid;?>">  <?php echo $name; ?> </a></td>
              
			</tr>	
<?php
		}
?>
		<tr>
			
			<td height="50" colspan="3" bgcolor="#F2F2F2" onMouseOver="see_more_over()" onMouseOut="see_more_out()" id="see_more"><a id="see_more_text" href="Search_Display_submit.php?search1=<?php echo $id; ?>" style="text-decoration:none; color:#3B5998;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; See more results &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
		</tr>
		</table>
		</div>
<?php
	}
?>
</body>
</html>
