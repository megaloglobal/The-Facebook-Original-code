<?php
	session_start();
	error_reporting(1);
	if(isset($_SESSION['fbuser']))
	{
		mysql_connect("localhost","root","");
		mysql_select_db("faceback");
		$user_email=$_SESSION['fbuser'];
		$que_user_info=mysql_query("select * from users where Email='$user_email'");
		$user_data=mysql_fetch_array($que_user_info);
		$userid=$user_data[0];
		
		if(isset($_POST['Message_send']))
		{
			$chat_txt=$_POST['chat_txt'];
			$chat_time=$_POST['chat_time'];
			mysql_query("insert into group_chat(user_id,chat_txt,time) values($userid,'$chat_txt','$chat_time')");
		}
		
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
<style>
#chat_button
{
	font-size:14px;
	height:25;
	width:80;
	padding:2;
	background-color:#5B74A8; color:#FFFFFF;
	border-top:#29447E;
	border-right-color:#29447E;
	border-bottom-color:#1A356E;
	border-left-color:#29447E;
	font-weight:bold;
}
</style>
<script>
	function blank_chat_check()
	{
		var chat_txt=document.chat_form.chat_txt.value;
		if(chat_txt=="")
		{
			return false;
		}
		return true;
	}
	function chat_name_underLine(fid)
	{
		document.getElementById("uname"+fid).style.textDecoration = "underline";
	}
	function chat_name_NounderLine(fid)
	{
		document.getElementById("uname"+fid).style.textDecoration = "none"
	}
	
	function time_get()
	{
			d = new Date();
			mon = d.getMonth()+1;
			time = d.getDate()+"-"+mon+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes();
			chat_form.chat_time.value=time;
	}
</script>
</head>
<body>
	
	<div style="position:absolute; left:25%; top:10%;"> <img src="img/group.png" height="100" width="100"> </div>
	<div style="position:absolute; left:35%; top:12%;"> <h1 style="color:#3B59A4;"> Group Chat </h1> </div>
  
    <div style=" background:#FFF; position:absolute; left:25%; top:31.5%; height:21%; width:41.4%; z-index:-1; box-shadow:0px 2px 5px 1px rgb(0,0,0);"> </div>
    <div style=" background:#F2F2F2; position:absolute; left:25%; top:47%; height:8%; width:41.4%; z-index:-1;"> </div>
    
    <form method="post" name="chat_form" onSubmit="return blank_chat_check()">
	
	<div style="position:absolute; left:25.3%; top:32.5%;">
		<textarea style="height:100; width:550;" name="chat_txt" maxlength="511" placeholder="What's on your mind?"></textarea>
	</div>	
   	<input type="hidden" name="chat_time">
    <div style="position:absolute; left:59%; top:49.6%;"> <input type="submit" value="Send" name="Message_send" id="chat_button" onClick="time_get()"> </div>
    </form>
    
<?php
		$que_chat=mysql_query("select * from group_chat order by chat_id desc");
?>
    <div style="position:absolute; left:20%; top:63%;">
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
<?php    
    if($fb_user_id==$userid)
    {
?>
	<td colspan="3"align="right" style="border-top:outset; border-top-width:thin;"> 
			<form method="post">  
				<input type="hidden" name="chat_id" value="<?php echo $chat_id; ?>" >
				<input type="submit" name="delete_chat" value=" " style="background-color:#FFFFFF; border:#FFFFFF; background-image:url(img/delete_post.gif); width:2%;"> 
			</form>
     </td>
     <td>  </td>
<?php
	}
	else
	{
?>
	<td colspan="3"align="right" style="border-top:outset; border-top-width:thin;">&nbsp;  </td>
     <td>  </td>
     
			
<?php
	}
?>
			
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