<?php
	session_start();
	error_reporting(1);
	if(isset($_SESSION['fbadmin']))
	{
		mysql_connect("localhost","root","");
		mysql_select_db("faceback");
		
		if(isset($_POST['delete_feedback']))
		{
			$fb_id=intval($_POST['feedback_id']);
			mysql_query("delete from feedback where feedback_id=$fb_id");
		}
		
		
		include("background.php");
?>
<html>
<head>
<title> Feedback </title>
<script>
	function feedback_name_underLine(fid)
	{
		document.getElementById("uname"+fid).style.textDecoration = "underline";
	}
	function feedback_name_NounderLine(fid)
	{
		document.getElementById("uname"+fid).style.textDecoration = "none"
	}
</script>

</head>
<body>
	
	<div style="position:absolute; left:25%; top:10%;"> <img src="img/icon-feedback.png"> </div>
	<div style="position:absolute; left:35%; top:12%;"> <h1 style="color:#3B59A4;"> Feedback </h1> </div>
    <hr style="position:absolute;left:25%;top:25%;height:0.5%;width:50%; border-color:#CCCCCC; box-shadow:0px 5px 5px 0px rgb(0,0,0); ">
    
   
    
    
<?php
		$que_feedback=mysql_query("select * from feedback order by feedback_id desc");
?>
    <div style="position:absolute; left:20%; top:35%;">
    <table border="0">
<?php
	while($feedback_data=mysql_fetch_array($que_feedback))
	{
		$feedback_id=$feedback_data[0];
		$fb_user_id=$feedback_data[1];
		$fb_txt=$feedback_data[2];
		$fb_star=$feedback_data[3];
		$fb_time=$feedback_data[4];
		$que_fb_user_info=mysql_query("select * from users where user_id=$fb_user_id");
		$fb_user_data=mysql_fetch_array($que_fb_user_info);
		$user_name=$fb_user_data[1];
		$user_email=$fb_user_data[2];
		$user_gender=$fb_user_data[4];
		$que_fb_user_pic=mysql_query("select * from user_profile_pic where user_id=$fb_user_id");
		$fetch_user_pic=mysql_fetch_array($que_fb_user_pic);
		$user_pic=$fetch_user_pic[2];
?>
	<tr>

	<td colspan="3"align="right" style="border-top:outset; border-top-width:thin;"> 
			<form method="post">  
				<input type="hidden" name="feedback_id" value="<?php echo $feedback_id; ?>" >
				<input type="submit" name="delete_feedback" value=" " style="background-color:#FFFFFF; border:#FFFFFF; background-image:url(img/delete_post.gif); width:2%;"> 
			</form>
     </td>
     <td>  </td>
				
     </tr>
    
	<tr>
    	<td style="padding-left:25;" rowspan="2"> <img src="../../fb_users/<?php echo $user_gender; ?>/<?php echo $user_email; ?>/Profile/<?php echo $user_pic; ?>" height="60" width="55">  </td>
       <td colspan="2" style="padding:7;"> <a href="../fb_view_profile/view_profile.php?id=<?php echo $fb_user_id; ?>" style="text-transform:capitalize; text-decoration:none; color:#003399;" onMouseOver="feedback_name_underLine(<?php echo $feedback_id; ?>)" onMouseOut="feedback_name_NounderLine(<?php echo $feedback_id; ?>)" id="uname<?php echo $feedback_id; ?>"> <?php echo $user_name; ?> </a>   </td>
       
    </tr>
    <tr>
		<td colspan="2" style=" padding-left:7;"><?php echo $fb_txt; ?></td>
        <td> </td>
        <td> </td>
	</tr>
    <tr>
    	<td> </td>
        <td> <span style="color:#999999;">  Give's <?php echo $fb_star; ?> star </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:#999999;"> <?php echo $fb_time; ?> </span> </td>
        <td> </td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
<?php
	}
	
?>
   </table></div>
   
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