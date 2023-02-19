<?php
	session_start();
	error_reporting(1);
	if(isset($_SESSION['fbuser']))
	{	
		$v_user_id=$_GET['id'];
		$user=$_SESSION['fbuser'];
		mysql_connect("localhost","root","");
		mysql_select_db("faceback");
		$query1=mysql_query("select * from users where Email='$user'");
		$rec1=mysql_fetch_array($query1);
		$userid=$rec1[0];
		
		if($userid!=$v_user_id)
		{
			include("background.php");
?>

<?php
	if(isset($_POST['Like']))
	{
		$post_id=intval($_POST['postid']);
		$user_id=intval($_POST['userid']);
		mysql_query("insert into user_post_status(post_id,user_id,status) values($post_id,$user_id,'Like');");
	}
	if(isset($_POST['Unlike']))
	{
		$post_id=intval($_POST['postid']);
		$user_id=intval($_POST['userid']);
		mysql_query("delete from user_post_status where post_id=$post_id and  	user_id=$user_id;");
	}
	if(isset($_POST['comment']))
	{
		$post_id=intval($_POST['postid']);
		$user_id=intval($_POST['userid']);
		$txt=$_POST['comment_txt'];
		if($txt!="")
		{
		mysql_query("insert into user_post_comment(post_id,user_id,comment) values($post_id,$user_id,'$txt');");
		}
	}
	if(isset($_POST['delete_comment']))
	{
		$comm_id=intval($_POST['comm_id']);
		mysql_query("delete from user_post_comment where comment_id=$comm_id;");
	}
?>

<html>
<head>
<script src="Profile_js/Profile.js"> </script>
</head>
<body bgcolor="#E9EAED">

<div style="position:absolute;left:31.5%; top:54%; font-weight:bold; z-index:1;">  Timeline  </div>
<div style="position:absolute;left:37.1%; display:none; top:51%; height:9.8%; width:5.9%; background-color:#F6F7F8; z-index:1;" id="about_txt_background"> </div>
<div style="position:absolute;left:38.3%; top:54%; font-weight:bold; z-index:1;"> <a href="about.php?id=<?php echo $v_user_id; ?>" style="text-decoration:none; color:#3B59B0;" onMouseOver="on_about_txt();" onMouseOut="out_about_txt();"> About </a>  </div>
<div style="position:absolute;left:43.1%; display:none; top:51%; height:9.8%; width:8.4%; background-color:#F6F7F8; z-index:1;" id="photos_txt_background"> </div>
<div style="position:absolute;left:44.7%; top:54%; font-weight:bold; z-index:1; color:#3B59B0;"> <a href="photos.php?id=<?php echo $v_user_id; ?>" style="text-decoration:none; color:#3B59B0;" onMouseOver="on_photos_txt();" onMouseOut="out_photos_txt();">  Photos </a> <samp style="color:#717171;"> <?php echo $photos_count; ?> </samp> </div>


<?php
	$que_post_bg1=mysql_query("select * from user_post where user_id=$v_user_id");
	$count_bg1=mysql_num_rows($que_post_bg1);
?>

<!-- post bg-->
	<div style="position:absolute; left:37.2%; top:65%; background:#FFFFFF; height:<?php echo $count_bg1+3; ?>80%; width:50%; z-index:-1; box-shadow:0px 2px 5px 1px rgb(0,0,0);" > </div>
    
    
<div style="position:absolute;left:37.3%; top:65%;">
<table cellspacing="0">
<?php
	$que_post=mysql_query("select * from user_post where user_id=$v_user_id and priority='Public' order by post_id desc");
	while($post_data=mysql_fetch_array($que_post))
	{
		$postid=$post_data[0];
		$post_user_id=$post_data[1];
		$post_txt=$post_data[2];
		$post_img=$post_data[3];
		$que_user_info=mysql_query("select * from users where user_id=$post_user_id");
		$que_user_pic=mysql_query("select * from user_profile_pic where user_id=$post_user_id");
		$fetch_user_info=mysql_fetch_array($que_user_info);
		$fetch_user_pic=mysql_fetch_array($que_user_pic);
		$user_name=$fetch_user_info[1];
		$user_Email=$fetch_user_info[2];
		$user_gender=$fetch_user_info[4];
		$user_pic=$fetch_user_pic[2];
?>
	<tr>
			
		<td colspan="5" align="right" style="border-top:outset; border-top-width:thin;">&nbsp;  </td>
			<td>  </td>
			<td> </td>
			
	</tr>
	<tr>
		<td width="5%" style="padding-left:10;" rowspan="2"> <img src="../../fb_users/<?php echo $user_gender; ?>/<?php echo $user_Email; ?>/Profile/<?php echo $user_pic; ?>" height="60" width="55">  </td>
		<td > </td>
		<td> </td>
		<td> </td>
	</tr>
	<tr>
		<td colspan="3" style="padding:7;"> <a href="view_profile.php?id=<?php echo $post_user_id; ?>" style="text-transform:capitalize; text-decoration:none; color:#003399;" onMouseOver="post_name_underLine(<?php echo $postid; ?>)" onMouseOut="post_name_NounderLine(<?php echo $postid; ?>)" id="uname<?php echo $postid; ?>"> <?php echo $user_name; ?> </a>  </td>
		<td> </td>
		<td> </td>
		<td> </td>
	</tr>
<?php
	$len=strlen($post_data[2]);
	if($len>0 && $len<=73)
	{
		$line1=substr($post_data[2],0,73);
	?>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line1; ?> </td>
	</tr>
	<?php
	}
	else if($len>73 && $len<=146)
	{
		$line1=substr($post_data[2],0,73);
		$line2=substr($post_data[2],73,73);
	?>
	<tr >
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line1; ?> </td>	
	</tr>
	<tr >
		<td> </td>
		<td colspan="3" style="padding-left:7;"><?php echo $line2; ?> </td>
	</tr>
	<?php
	}
	else if($len>146 && $len<=219)
	{
		$line1=substr($post_data[2],0,73);
		$line2=substr($post_data[2],73,73);
		$line3=substr($post_data[2],146,73);
	?>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line1; ?> </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line2; ?> </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line3; ?> </td>	
	</tr>
	<?php
	}
	else if($len>219 && $len<=292)
	{
		$line1=substr($post_data[2],0,73);
		$line2=substr($post_data[2],73,73);
		$line3=substr($post_data[2],146,73);
		$line4=substr($post_data[2],219,73);
	?>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line1; ?> </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line2; ?> </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line3; ?> </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line4; ?> </td>	
	</tr>
	
	
	<?php
	}
	else if($len>292 && $len<=365)
	{
		$line1=substr($post_data[2],0,73);
		$line2=substr($post_data[2],73,73);
		$line3=substr($post_data[2],146,73);
		$line4=substr($post_data[2],219,73);
		$line5=substr($post_data[2],292,73);
	?>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line1; ?> </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line2; ?> </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line3; ?> </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line4; ?> </td>	
	</tr>
	
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line5; ?> </td>	
	</tr>
	
	
	<?php
	}
	else if($len>365 && $len<=438)
	{
		$line1=substr($post_data[2],0,73);
		$line2=substr($post_data[2],73,73);
		$line3=substr($post_data[2],146,73);
		$line4=substr($post_data[2],219,73);
		$line5=substr($post_data[2],292,73);
		$line6=substr($post_data[2],365,73);
	?>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line1; ?> </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line2; ?> </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line3; ?> </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line4; ?> </td>	
	</tr>
	
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line5; ?> </td>	
	</tr>
	
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line6; ?> </td>	
	</tr>
	
	<?php
	}
	else if($len>438 && $len<=511)
	{
		$line1=substr($post_data[2],0,73);
		$line2=substr($post_data[2],73,73);
		$line3=substr($post_data[2],146,73);
		$line4=substr($post_data[2],219,73);
		$line5=substr($post_data[2],292,73);
		$line6=substr($post_data[2],365,73);
		$line7=substr($post_data[2],438,73);
	?>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line1; ?> </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line2; ?> </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line3; ?> </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line4; ?> </td>	
	</tr>
	
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line5; ?> </td>	
	</tr>
	
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line6; ?> </td>	
	</tr>
	
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"><?php echo $line7; ?> </td>	
	</tr>
	
<?php
}
?>

<?php 
		if($post_data[3]!="")
		{
	?>
	<tr>
		<td>   </td>
		<td colspan="3"><img src="../../fb_users/<?php echo $user_gender; ?>/<?php echo $user_Email; ?>/Post/<?php echo $post_img; ?>" width="400" height="400"> </td>
		<td> </td>
		<td> </td>
	</tr>
	<?php
		}
	?>
	
	<tr style="color:#6D84C4;">
		<td >   </td>
		<?php
		 	$que_status=mysql_query("select * from user_post_status where post_id=$postid and user_id=$userid;");
			$que_like=mysql_query("select * from user_post_status where post_id=$postid");
			$count_like=mysql_num_rows($que_like);
			$status_data=mysql_fetch_array($que_status);
			if($status_data[3]=="Like")
			{?>
			
			<td style="padding-top:15;">
		<form method="post">
		<input type="hidden" name="postid" value="<?php echo $postid; ?>">
		<input type="hidden" name="userid" value="<?php echo $userid; ?>">
		<input type="submit" value="Unlike" name="Unlike" style="border:#FFFFFF; background:#FFFFFF; font-size:15px; color:#6D84C4;" onMouseOver="unlike_underLine(<?php echo $postid; ?>)" onMouseOut="unlike_NounderLine(<?php echo $postid; ?>)" id="unlike<?php echo $postid; ?>"></form></td>
			<?php
			}
			else
			{?>
			<td style="padding-top:15;">
		<form method="post">
		<input type="hidden" name="postid" value="<?php echo $postid; ?>">
		<input type="hidden" name="userid" value="<?php echo $userid; ?>">
		<input type="submit" value="Like" name="Like" style="border:#FFFFFF; background:#FFFFFF; font-size:15px; color:#6D84C4;" onMouseOver="like_underLine(<?php echo $postid; ?>)" onMouseOut="like_NounderLine(<?php echo $postid; ?>)" id="like<?php echo $postid; ?>"></form></td>
			<?php
			}
		 ?>
		 <?php
		 
		 	$que_comment=mysql_query("select * from user_post_comment where post_id =$postid order by comment_id");
	$count_comment=mysql_num_rows($que_comment);
		 ?>
		
		<td colspan="3"> &nbsp; <input type="button" value="Comment(<?php echo $count_comment; ?>)" style="background:#FFFFFF; border:#FFFFFF;font-size:15px; color:#6D84C4;" onClick="Comment_focus(<?php echo $postid; ?>);" onMouseOver="Comment_underLine(<?php echo $postid; ?>)" onMouseOut="Comment_NounderLine(<?php echo $postid; ?>)" id="comment<?php echo $postid; ?>">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <span style="color:#999999;">   <?php echo $post_data[4]; ?> </span> </td>
		<td>   </td>
	</tr>
	<tr>
		<td>   </td>
		<td  bgcolor="#EDEFF4" style="width:9;" colspan="3"><img src="img/like.PNG"><span style="color:#6D84C4;"><?php echo $count_like; ?></span> like this. </td>
		<td> </td>
		<td> </td>
	</tr>
	<tr>
		<td>   </td>
		<td> </td>
		<td> </td>
		<td> </td>
	</tr>
<?php
	while($comment_data=mysql_fetch_array($que_comment))
	{
		$comment_id=$comment_data[0];
		$comment_user_id=$comment_data[2];
		$que_user_info1=mysql_query("select * from users where user_id=$comment_user_id");
		$que_user_pic1=mysql_query("select * from user_profile_pic where user_id=$comment_user_id");
		$fetch_user_info1=mysql_fetch_array($que_user_info1);
		$fetch_user_pic1=mysql_fetch_array($que_user_pic1);
		$user_name1=$fetch_user_info1[1];
		$user_Email1=$fetch_user_info1[2];
		$user_gender1=$fetch_user_info1[4];
		$user_pic1=$fetch_user_pic1[2];
?>


	<tr>
		<td> </td>
		<td width="4%" bgcolor="#EDEFF4" style="padding-left:12;" rowspan="2">  <img src="../../fb_users/<?php echo $user_gender1; ?>/<?php echo $user_Email1; ?>/Profile/<?php echo $user_pic1; ?>" height="40" width="47">    </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" > <a href="view_profile.php?id=<?php echo $comment_user_id; ?>" style="text-transform:capitalize; text-decoration:none; color:#3B5998;" onMouseOver="Comment_name_underLine(<?php echo $comment_id; ?>)" onMouseOut="Comment_name_NounderLine(<?php echo $comment_id; ?>)" id="cuname<?php echo $comment_id; ?>"> <?php echo $user_name1; ?></a> </td>
<?php	
        if($userid==$comment_user_id)
		{ ?>
		<td align="right" rowspan="2" bgcolor="#EDEFF4">
			<form method="post">  
				<input type="hidden" name="comm_id" value="<?php echo $comment_id; ?>" >
				<input type="submit" name="delete_comment" value="  " style="background-color:#FFFFFF; border:#FFFFFF; background-image:url(img/delete_comment.gif); width:13; height:13;"> &nbsp;
			</form> 
        </td>
		<?php
		}
		else
		{?>
			<td align="right" rowspan="2" bgcolor="#EDEFF4">  </td>
		<?php
		}
	?>
    </tr>
<?php
	$clen=strlen($comment_data[3]);
	if($clen>0 && $clen<=60)
	{
		$cline1=substr($comment_data[3],0,60);
	?>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
	</tr>
	<?php
	}
	else if($clen>60 && $clen<=120)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
	?>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
	</tr>
	<?php
	}
	else if($clen>120 && $clen<=180)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
		$cline3=substr($comment_data[3],120,60);
	?>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline3; ?></td>
	</tr>
	<?php
	}
	else if($clen>180 && $clen<=240)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
		$cline3=substr($comment_data[3],120,60);
		$cline4=substr($comment_data[3],180,60);
	?>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline3; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline4; ?></td>
	</tr>
	<?php
	}
	else if($clen>240 && $clen<=300)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
		$cline3=substr($comment_data[3],120,60);
		$cline4=substr($comment_data[3],180,60);
		$cline5=substr($comment_data[3],240,60);
	?>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline3; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline4; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline5; ?></td>
	</tr>
	<?php
	}
	else if($clen>300 && $clen<=360)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
		$cline3=substr($comment_data[3],120,60);
		$cline4=substr($comment_data[3],180,60);
		$cline5=substr($comment_data[3],240,60);
		$cline6=substr($comment_data[3],300,60);
	?>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline3; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline4; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline5; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline6; ?></td>
	</tr>
	<?php
	}
	else if($clen>360 && $clen<=420)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
		$cline3=substr($comment_data[3],120,60);
		$cline4=substr($comment_data[3],180,60);
		$cline5=substr($comment_data[3],240,60);
		$cline6=substr($comment_data[3],300,60);
		$cline7=substr($comment_data[3],360,60);
	?>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline3; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline4; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline5; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline6; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline7; ?></td>
	</tr>
	<?php
	}
	?>

<?php
}
?>

<tr>
	<td> </td>
	<td width="4%" style="padding-left:17;" bgcolor="#EDEFF4" rowspan="2">  <img src="../../fb_users/<?php echo $gender; ?>/<?php echo $user; ?>/Profile/<?php echo $img; ?>" style="height:33; width:33;">    </td>
		<td bgcolor="#EDEFF4" colspan="2" style="padding-top:15;"> 
		<form method="post" name="commenting" onSubmit="return blank_comment_check()"> 
		<input type="text" name="comment_txt" placeholder="Write a comment..." maxlength="420" style="width:440;" id="<?php echo $postid;?>"> 
		<input type="hidden" name="postid" value="<?php echo $postid; ?>"> 
		<input type="hidden" name="userid" value="<?php echo $userid; ?>"> 
		<input type="submit" name="comment" style="display:none;"> 
		</form> </td>
	</tr>
<tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr>
<?php
	}
?>
</table>
</div>

<script>
	function on_about_bg()
	{
		document.getElementById("about_on_bg").style.display='block';
	}
	function out_about_bg()
	{
		document.getElementById("about_on_bg").style.display='none';	
	}
	function on_photos_bg()
	{
		document.getElementById("photos_on_bg").style.display='block';
	}
	function out_photos_bg()
	{
		document.getElementById("photos_on_bg").style.display='none';	
	}
</script>

<!-- About bg-->
	<a href="about.php?id=<?php echo $v_user_id; ?>"> <div style="position:absolute; left:15%; top:65%; background:#F6F7F8; height:6%; width:20%; z-index:-1; box-shadow:0px 0px 5px 0px rgb(0,0,0);" onMouseOver="on_about_bg()"> </div>
	<div style="display:none;" id="about_on_bg">	
	<div style="position:absolute; left:15%; top:65%; background:#F9FAFB; height:6%; width:20%; z-index:-1;" onMouseOut="out_about_bg()">  </div>
	</div>
	</a>	
	<div style="position:absolute; left:16%; top:66%;"> <a href="about.php" style="color:#6A7480;text-decoration:none;font-size:17px; font-weight:bold;"> About </a> </div>
	
	<div style="position:absolute; left:15%; top:71.2%; background:#FFFFFF; height:25%; width:20%; z-index:-1; box-shadow:0px 2px 5px 0px rgb(0,0,0);"> </div>	
	<div style="position:absolute;left:17%; top:74%; font-weight:bold;"> Basic Information </div>
	<div style="position:absolute;left:17%; top:79%; font-size:15px; color:#89919C;">Birthday</div>
	<div style="position:absolute;left:22%; top:79%; font-size:15px;"> <?php echo $v_bday; ?></div>
	<div style="position:absolute;left:17%; top:83%; font-size:15px; color:#89919C;">Gender</div>
	<div style="position:absolute;left:22%; top:83%; font-size:15px;"> <?php echo $v_gender; ?></div>
	<div style="position:absolute;left:17%; top:87%; font-size:15px; color:#89919C;">Current location</div>
	<div style="position:absolute;left:17%; top:91%; font-size:15px; color:#89919C;">Hometown</div>
<?php
	$user_info_query=mysql_query("select * from user_info where user_id=$v_user_id");
	$user_info_data=mysql_fetch_array($user_info_query);
	$city=$user_info_data[3];
	$hometown=$user_info_data[4];
	
?>
		<div style="position:absolute;left:25%; top:87%; font-size:15px; text-transform:capitalize;">  <?php echo $city; ?>  </div>


		<div style="position:absolute;left:23%; top:91%; font-size:15px; text-transform:capitalize;">  <?php echo $hometown; ?>  </div>





<!-- Photos bg-->
	<a href="photos.php?id=<?php echo $v_user_id; ?>"> <div style="position:absolute; left:15%; top:100%; background:#F6F7F8; height:6.1%; width:20%; z-index:-1; box-shadow:0px 0px 5px 0px rgb(0,0,0);" onMouseOver="on_photos_bg()"> </div>
	<div style="display:none;" id="photos_on_bg">	
	<div style="position:absolute; left:15%; top:100%; background:#F9FAFB; height:6%; width:20%; z-index:-1;" onMouseOut="out_photos_bg()">  </div>
	</div>
	</a>	
	<div style="position:absolute; left:16%; top:101%;"> <a href="photos.php" style="color:#6A7480;text-decoration:none;font-size:17px; font-weight:bold;"> Photos </a> </div>
	
	<div style="position:absolute; left:15%; top:106.2%; background:#FFFFFF; height:51.7%; width:20%; z-index:-1; box-shadow:0px 2px 5px 0px rgb(0,0,0);"> </div>	

<?php
	$que_post_img=mysql_query("select * from user_post where user_id=$v_user_id and post_pic!='' and priority='Public' order by post_id desc");
	$photos_count=mysql_num_rows($que_post_img);
	$photos_count=$photos_count+2;
?>
<?php	
	$img_array = array("");
	while($post_img_data=mysql_fetch_array($que_post_img))
	{
		array_push($img_array,$post_img_data[3]);
	}
?>
	<div style="position:absolute; left:15.5%; top:108%;"> <img src="../../fb_users/<?php echo $v_gender; ?>/<?php echo $v_email; ?>/Profile/<?php echo $profile_img; ?>" height="90" width="78">  </div>
	<div style="position:absolute; left:22%; top:108%;"> <img src="../../fb_users/<?php echo $v_gender; ?>/<?php echo $v_email; ?>/Post/<?php echo $img_array[1] ?>" height="90" width="78">  </div>
	<div style="position:absolute; left:28.5%; top:108%;"> <img src="../../fb_users/<?php echo $v_gender; ?>/<?php echo $v_email; ?>/Post/<?php echo $img_array[2] ?>" height="90" width="78">  </div>
	<div style="position:absolute; left:15.5%; top:125%;"> <img src="../../fb_users/<?php echo $v_gender; ?>/<?php echo $v_email; ?>/Post/<?php echo $img_array[3] ?>" height="90" width="78">  </div>
	<div style="position:absolute; left:22%; top:125%;"> <img src="../../fb_users/<?php echo $v_gender; ?>/<?php echo $v_email; ?>/Post/<?php echo $img_array[4] ?>" height="90" width="78">  </div>
	<div style="position:absolute; left:28.5%; top:125%;"> <img src="../../fb_users/<?php echo $v_gender; ?>/<?php echo $v_email; ?>/Post/<?php echo $img_array[5] ?>" height="90" width="78">  </div>
	<div style="position:absolute; left:15.5%; top:142%;"> <img src="../../fb_users/<?php echo $v_gender; ?>/<?php echo $v_email; ?>/Post/<?php echo $img_array[6] ?>" height="90" width="78">  </div>
	<div style="position:absolute; left:22%; top:142%;"> <img src="../../fb_users/<?php echo $v_gender; ?>/<?php echo $v_email; ?>/Post/<?php echo $img_array[7] ?>" height="90" width="78">  </div>
	<div style="position:absolute; left:28.5%; top:142%;"> <img src="../../fb_users/<?php echo $v_gender; ?>/<?php echo $v_email; ?>/Post/<?php echo $img_array[8] ?>" height="90" width="78">  </div>


</body>
</html>
<?php
}
else
{
	header("location:../fb_profile/Profile.php");
}
?>

<?php
	}
	else
	{
		header("location:../../index.php");
	}
?>