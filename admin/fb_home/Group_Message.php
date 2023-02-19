<?php
	session_start();
	error_reporting(1);
	if(isset($_SESSION['fbadmin']))
	{
		mysql_connect("localhost","root","");
		mysql_select_db("faceback");
		
		if(isset($_POST['delete_chat']))
		{
			$chat_id=intval($_POST['chat_id']);
			mysql_query("delete from group_chat where chat_id=$chat_id");
		}
		
		
		include("background.php");
?>
<html>
<head>
<title> Group Chat </title>

<script>
	function chat_name_underLine(fid)
	{
		document.getElementById("uname"+fid).style.textDecoration = "underline";
	}
	function chat_name_NounderLine(fid)
	{
		document.getElementById("uname"+fid).style.textDecoration = "none"
	}
</script>
</head>
<body>
	
	<div style="position:absolute; left:25%; top:10%;"> <img src="img/group.png" height="100" width="100"> </div>
	<div style="position:absolute; left:35%; top:12%;"> <h1 style="color:#3B59A4;"> Group Chat </h1> </div>
  
    <hr style="position:absolute;left:25%;top:25%;height:0.5%;width:50%; border-color:#CCCCCC; box-shadow:0px 5px 5px 0px rgb(0,0,0); ">
    
<?php
		$que_chat=mysql_query("select * from group_chat order by chat_id desc");
?>
    <div style="position:absolute; left:20%; top:40%;">
    <table border="0">
<?php
	while($chat_data=mysql_fetch_array($que_chat))
	{
		$chat_id=$chat_data[0];
		$fb_user_id=$chat_data[1];
		$chat_txt=$chat_data[2];
		$chat_time=$chat_data[3];
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
				<input type="hidden" name="chat_id" value="<?php echo $chat_id; ?>" >
				<input type="submit" name="delete_chat" value=" " style="background-color:#FFFFFF; border:#FFFFFF; background-image:url(img/delete_post.gif); width:2%;"> 
			</form>
     </td>
     <td>  </td>
			
     </tr>
    
	<tr>
    	<td style="padding-left:25;" rowspan="2"> <img src="../../fb_users/<?php echo $user_gender; ?>/<?php echo $user_email; ?>/Profile/<?php echo $user_pic; ?>" height="60" width="55">  </td>
        <td colspan="2" style="padding:7;"> <a href="../fb_view_profile/view_profile.php?id=<?php echo $fb_user_id; ?>" style="text-transform:capitalize; text-decoration:none; color:#003399;" onMouseOver="chat_name_underLine(<?php echo $chat_id; ?>)" onMouseOut="chat_name_NounderLine(<?php echo $chat_id; ?>)" id="uname<?php echo $chat_id; ?>"> <?php echo $user_name; ?> </a>   </td>
       
    </tr>
   
    
    <?php
	$len=strlen($chat_data[2]);
	if($len>0 && $len<=73)
	{
		$line1=substr($chat_data[2],0,73);
	?>
	<tr>
		<td colspan="2" style="padding-left:7;"><?php echo $line1; ?> </td>
        <td> </td>
	</tr>
	<?php
	}
	else if($len>73 && $len<=146)
	{
		$line1=substr($chat_data[2],0,73);
		$line2=substr($chat_data[2],73,73);
	?>
	<tr>
		<td colspan="2" style="padding-left:7;"><?php echo $line1; ?> </td>	
        <td> </td>
        
	</tr>
	<tr>
    	<td> </td>
		<td colspan="2" style="padding-left:7;"><?php echo $line2; ?> </td>
        <td> </td>
	</tr>
	<?php
	}
	else if($len>146 && $len<=219)
	{
		$line1=substr($chat_data[2],0,73);
		$line2=substr($chat_data[2],73,73);
		$line3=substr($chat_data[2],146,73);
	?>
	<tr>
		
		<td colspan="2" style="padding-left:7;"><?php echo $line1; ?> </td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;"><?php echo $line2; ?> </td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;"><?php echo $line3; ?> </td>	
        <td> </td>
	</tr>
	<?php
	}
	else if($len>219 && $len<=292)
	{
		$line1=substr($chat_data[2],0,73);
		$line2=substr($chat_data[2],73,73);
		$line3=substr($chat_data[2],146,73);
		$line4=substr($chat_data[2],219,73);
	?>
	<tr>
		<td colspan="2" style="padding-left:7;"><?php echo $line1; ?> </td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;"><?php echo $line2; ?> </td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;"><?php echo $line3; ?> </td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;"><?php echo $line4; ?> </td>	
        <td> </td>
	</tr>
	
	
	<?php
	}
	else if($len>292 && $len<=365)
	{
		$line1=substr($chat_data[2],0,73);
		$line2=substr($chat_data[2],73,73);
		$line3=substr($chat_data[2],146,73);
		$line4=substr($chat_data[2],219,73);
		$line5=substr($chat_data[2],292,73);
	?>
	<tr>
		<td colspan="2" style="padding-left:7;"><?php echo $line1; ?> </td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;"><?php echo $line2; ?> </td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;"><?php echo $line3; ?> </td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;"><?php echo $line4; ?> </td>	
        <td> </td>
	</tr>
	
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;"><?php echo $line5; ?> </td>	
        <td> </td>
	</tr>
	
	
	<?php
	}
	else if($len>365 && $len<=438)
	{
		$line1=substr($chat_data[2],0,73);
		$line2=substr($chat_data[2],73,73);
		$line3=substr($chat_data[2],146,73);
		$line4=substr($chat_data[2],219,73);
		$line5=substr($chat_data[2],292,73);
		$line6=substr($chat_data[2],365,73);
	?>
	<tr>
		<td colspan="2" style="padding-left:7;"><?php echo $line1; ?> </td>	
        <td> </td>
	</tr>
	<tr>
		<td></td>
		<td colspan="2" style="padding-left:7;"><?php echo $line2; ?> </td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;"><?php echo $line3; ?> </td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;"><?php echo $line4; ?> </td>	
        <td> </td>
	</tr>
	
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;"><?php echo $line5; ?> </td>	
        <td> </td>
	</tr>
	
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;"><?php echo $line6; ?> </td>
        <td> </td>	
	</tr>
	
	<?php
	}
	else if($len>438 && $len<=511)
	{
		$line1=substr($chat_data[2],0,73);
		$line2=substr($chat_data[2],73,73);
		$line3=substr($chat_data[2],146,73);
		$line4=substr($chat_data[2],219,73);
		$line5=substr($chat_data[2],292,73);
		$line6=substr($chat_data[2],365,73);
		$line7=substr($chat_data[2],438,73);
	?>
	<tr>
		<td colspan="2" style="padding-left:7;"><?php echo $line1; ?> </td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;"><?php echo $line2; ?> </td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;"><?php echo $line3; ?> </td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;"><?php echo $line4; ?> </td>	
        <td> </td>
	</tr>
	
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;"><?php echo $line5; ?> </td>	
        <td> </td>
	</tr>
	
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;"><?php echo $line6; ?> </td>	
        <td> </td>
	</tr>
	
	<tr>
    	<td> </td>
		<td colspan="2" style="padding-left:7;"><?php echo $line7; ?> </td>	
        <td> </td>
	</tr>
    <?php
	}
    ?>
    
    <tr>
    	<td> </td>
        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:#CCC;"> <?php echo $chat_time; ?> </span> </td>
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