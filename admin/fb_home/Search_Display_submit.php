<?php
	session_start();
	error_reporting(1);
	if(isset($_SESSION['fbadmin']))
	{
		include("background.php");
		$id=$_GET['search1'];
?>
<html>
<head>
<title> <?php echo $id; ?> </title>

</head>
<body>
<?php
	mysql_connect("localhost","root","");
	mysql_select_db("faceback");
	if($id!='')
	{
		$query1=mysql_query("select * from users where Name like('%$id%')");
		$count1=mysql_num_rows($query1);
?>
	<div style="position:absolute; left:22.3%;top:10.5%; z-index:-1;"> <img src="background_file/background_icons/Search1.png" height="25" width="25" /> </div>
	<div style="position:absolute; left:25%;top:7%; z-index:-1;"> <h2> All results </h2> </div>
	<hr style="position:absolute;left:22%;top:15%;height:0;width:55%; border-color:#CCCCCC;">
	
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
		
		<td onMouseOver="serched_name_over1(<?php echo $uid;?>)" onMouseOut="serched_name_out1(<?php echo $uid;?>)" width="500" bgcolor="#FFFFFF" id="Name_bg1<?php echo $uid; ?>"> <a href="../fb_view_profile/view_profile.php?id=<?php echo $uid; ?>" style=" text-decoration:none; text-transform:capitalize; color:#3B5998;" id="Name_font1<?php echo $uid;?>">  <?php echo $name; ?></a></td>
       
        
		
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
