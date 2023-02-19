<?php
	session_start();
	error_reporting(1);
	if(isset($_SESSION['fbadmin']))
	{
		include("background.php");
?>
<?php
	if(isset($_POST['delete_post']))
	{
		$post_id=intval($_POST['post_id']);
		mysql_query("delete from user_post where post_id=$post_id;");
	}
	
	if(isset($_POST['delete_comment']))
	{
		$comm_id=intval($_POST['comm_id']);
		mysql_query("delete from user_post_comment where comment_id=$comm_id;");
	}
?>
<html>
<head>
<title>Home</title>
	<script src="Home_js/home.js" language="javascript"></script>
</head>
<body>
<div style="position:absolute;left:35%; top:8%;"> <h1> All Public Post </h1> </div>
<div style="position:absolute;left:19%; top:20%;">
<table cellspacing="0">

<?php
	$que_post=mysql_query("select * from user_post where priority='Public' order by post_id desc");
	
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
		<td colspan="4"align="right" style="border-top:outset; border-top-width:thin;"> 
			<form method="post">  
				<input type="hidden" name="post_id" value="<?php echo $postid; ?>" >
				<input type="submit" name="delete_post" value=" " style="background-color:#FFFFFF; border:#FFFFFF; background-image:url(img/delete_post.gif); width:2.3%;"> 
			</form></a> </td>
			<td>  </td>
			<td> </td>
	</tr>
    
    <tr>
		<td width="5%" style="padding-left:25;" rowspan="2"> <img src="../../fb_users/<?php echo $user_gender; ?>/<?php echo $user_Email; ?>/Profile/<?php echo $user_pic; ?>" height="60" width="55">  </td>
		<td > </td>
		<td> </td>
		<td> </td>
	</tr>
    
    <tr>
		<td colspan="3" style="padding:7;"> <a href="../fb_view_profile/view_profile.php?id=<?php echo $post_user_id; ?>" style="text-transform:capitalize; text-decoration:none; color:#003399;" onMouseOver="post_name_underLine(<?php echo $postid; ?>)" onMouseOut="post_name_NounderLine(<?php echo $postid; ?>)" id="uname<?php echo $postid; ?>"> <?php echo $user_name; ?> </a>  </td>
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
        <td style="padding-top:15;">
        <input type="button" value="Like" name="Like" style="border:#FFFFFF; background:#FFFFFF; font-size:15px; color:#6D84C4;" onMouseOver="like_underLine(<?php echo $postid; ?>)" onMouseOut="like_NounderLine(<?php echo $postid; ?>)" id="like<?php echo $postid; ?>">
        </td>
        
        <?php
		 
		 	$que_comment=mysql_query("select * from user_post_comment where post_id =$postid order by comment_id");
	$count_comment=mysql_num_rows($que_comment);
		 ?>
        
        <td colspan="1" style="padding-top:14.5;"> &nbsp; <input type="button" value="Comment(<?php echo $count_comment; ?>)" style="background:#FFFFFF; border:#FFFFFF;font-size:15px; color:#6D84C4;" onMouseOver="Comment_underLine(<?php echo $postid; ?>)" onMouseOut="Comment_NounderLine(<?php echo $postid; ?>)" id="comment<?php echo $postid; ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <span style="color:#999999;">   <?php echo $post_data[4]; ?> </span> </td>
		<td>   </td>
	</tr>
	<tr>
    <?php
		$que_like=mysql_query("select * from user_post_status where post_id=$postid");
		$count_like=mysql_num_rows($que_like);
	?>
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
		<td bgcolor="#EDEFF4" style="padding-left:7;" > <a href="../fb_view_profile/view_profile.php?id=<?php echo $comment_user_id; ?>" style="text-transform:capitalize; text-decoration:none; color:#3B5998;" onMouseOver="Comment_name_underLine(<?php echo $comment_id; ?>)" onMouseOut="Comment_name_NounderLine(<?php echo $comment_id; ?>)" id="cuname<?php echo $comment_id; ?>"> <?php echo $user_name1; ?></a> </td>
        
        <td align="right" rowspan="2" bgcolor="#EDEFF4"> 
			<form method="post">  
				<input type="hidden" name="comm_id" value="<?php echo $comment_id; ?>" >
				<input type="submit" name="delete_comment" value="  " style="background-color:#FFFFFF; border:#FFFFFF; background-image:url(img/delete_comment.gif); width:13; height:13;"> &nbsp;
			</form> 
        </td>
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

<tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr>


<?php
	}
?>


</table>  
	
</div>
    
	
</body>
</html>
<?php
	}
	else
	{
		header("location:../../index.php");
	}
?>