<?php
	session_start();
	error_reporting(1);
	if(isset($_SESSION['fbadmin']))
	{
		$v_user_id=$_GET['id'];
		mysql_connect("localhost","root","");
		mysql_select_db("faceback");
		$query1=mysql_query("select * from users where user_id=$v_user_id");
		$rec1=mysql_fetch_array($query1);
		$userid=$rec1[0];
?>
<?php
	if(isset($_POST['work_sub']))
	{
		$u_job=$_POST['job'];
		$u_edu=$_POST['edu'];
		mysql_query("update user_info set job='$u_job',school_or_collage='$u_edu' where user_id=$userid;");
	}
	
	if(isset($_POST['leving_sub']))
	{
		$u_city=$_POST['city'];
		$u_hometown=$_POST['hometown'];
		mysql_query("update user_info set  	current_city='$u_city',hometown='$u_hometown' where user_id=$userid;");
	}
	
	if(isset($_POST['basic_sub']))
	{
		if($_POST['day']=='Day:' && $_POST['month']=='Month:' && $_POST['year']=='Year:')
		{
			$u_relationship=$_POST['relationship'];
			mysql_query("update user_info set relationship_status='$u_relationship' where user_id=$userid;");
		}
		else
		{
			$day=intval($_POST['day']);
			$month=intval($_POST['month']);
			$year=intval($_POST['year']);
			if(checkdate($month,$day,$year))
			{
				$u_relationship=$_POST['relationship'];
				$u_birthday_date=$_POST['day'].'-'.$_POST['month'].'-'.$_POST['year'];
				mysql_query("update user_info set relationship_status='$u_relationship' where user_id=$userid;");
				mysql_query("update users set Birthday_Date='$u_birthday_date' where user_id=$userid;");
			}
			else
			{
				echo "<script>
				alert('The selected date is not valid.');
					</script>";
			}
		}
	}
	
	if(isset($_POST['contact_sub']))
	{
		$u_m_no=$_POST['mno'];
		$u_priority=$_POST['priority'];
		$u_web=$_POST['web'];
		$u_fb_id=$_POST['fbid'];
		mysql_query("update user_info set mobile_no='$u_m_no',mobile_no_priority='$u_priority',website='$u_web',Facebook_ID='$u_fb_id' where user_id=$userid;");
	}
	
		include("background.php");
		
		$user_info_query=mysql_query("select * from user_info where user_id=$userid");
		$user_info_data=mysql_fetch_array($user_info_query);
?>
<html>
<head>
<title><?php echo $name; ?></title>
	<link href="about_css/about.css" rel="stylesheet" type="text/css">
	<script src="about_js/about.js"></script>
</head>
<body bgcolor="#E9EAED">

<div style="position:absolute;left:30%; display:none;  top:51%; height:9.8%; width:6.9%; background-color:#F6F7F8; z-index:1;" id="timeline_txt_background"> </div>
<div style="position:absolute;left:31.5%; top:54%; font-weight:bold; z-index:1;"> <a href="view_profile.php?id=<?php echo $v_user_id; ?>" style="text-decoration:none; color:#3B59B0;" onMouseOver="on_timeline_txt();" onMouseOut="out_timeline_txt();">  Timeline </a> </div>
<div style="position:absolute;left:38.3%; top:54%; font-weight:bold; z-index:1;">  About   </div>
<div style="position:absolute;left:43.1%; display:none; top:51%; height:9.8%; width:8.4%; background-color:#F6F7F8; z-index:1;" id="photos_txt_background"> </div>
<div style="position:absolute;left:44.7%; top:54%; font-weight:bold; z-index:1; color:#3B59B0;"> <a href="photos.php?id=<?php echo $v_user_id; ?>" style="text-decoration:none; color:#3B59B0;" onMouseOver="on_photos_txt();" onMouseOut="out_photos_txt();">  Photos </a> <samp style="color:#717171;"> <?php echo $photos_count; ?> </samp> </div>


<div style="position:absolute;left:15%;top:68%;height:12%;width:70%; background-color:#F6F7F8; box-shadow:0px -1px 5px 1px rgb(0,0,0);"> </div>

<div style="position:absolute;left:16%;top:69%;"> <img src="img/about1.PNG"> </div>
<div style="position:absolute;left:19%;top:66.3%;"> <h2> About </h2> </div>

<div style="position:absolute;left:15%; top:80%; height:125%; width:70%; background:#FFF; box-shadow:0px -1px 5px 1px rgb(0,0,0); z-index:-1;">
</div>
	
       
 <!--Work and education--> 
 <div style="position:absolute;left:17%;top:85%;"> <h3> Work and education </h3> </div>

<div id="work_static" onClick="work_static_hide()">   
<div style="position:absolute;left:19%;top:97%;"> <img src="img/job.PNG"> </div>
<?php
	$job=$user_info_data[1];
	$school_or_collage=$user_info_data[2];
	if($job!="")
	{
?>
		<div style="position:absolute;left:26%;top:101%; color:#000; font-weight:bold;"> <?php echo $job; ?> </div>
<?php
	}
	else
	{
?>
		<div style="position:absolute;left:26%;top:101%; color:#3B59A4; font-weight:bold; "> Add a job </div>
<?php	
    }
?>
<div style="position:absolute;left:19%;top:115%;"> <img src="img/school.PNG"> </div>
<?php
	if($school_or_collage!="")
	{
?>
		<div style="position:absolute;left:26%;top:119%; color:#000; font-weight:bold;"> <?php echo $school_or_collage; ?> </div>
<?php
	}
	else
	{
?>
		<div style="position:absolute;left:26%;top:119%; color:#3B59A4; font-weight:bold;"> Add a school or college </div>
<?php
	}
?>


<div style="position:absolute;left:43.5%;top:87.5%;"> <input type="button" style="background-image:url(img/edit_button.PNG); border:none; height:24;" value="             " onClick="work_static_hide()"> </div> 
</div>

<form method="post" style="display:none"  id="Work_form">
<div style="position:absolute;left:19%;top:94%;color:#3B59A4;"> Job </div>
<div style="position:absolute;left:19%;top:98.5%;"> <input type="text" value="<?php echo $job; ?>" name="job" style="height:33;width:350;font-size:16px;" maxlength="35"> </div>
<div style="position:absolute;left:19%;top:108%;color:#3B59A4;"> School or College </div>
<div style="position:absolute;left:19%;top:112.5%;"> <input type="text" value="<?php echo $school_or_collage; ?>" name="edu" maxlength="35" style="height:33;width:350;font-size:16px;"> </div>

<div style="position:absolute;left:24%;top:122%;"> <input type="submit" value="Save" name="work_sub" class="save_button" > </div>
<div style="position:absolute;left:32%;top:122%;"> <input type="button" value="Cancel"  class="cancel_button" onClick="work_form_hide()"> </div>

</form>


<div style="position:absolute;left:48.2%; top:82%; height:120%; width:0.05%; background:#CCC;">
</div>

<!--Living-->
<div style="position:absolute;left:51%;top:85%;"> <h3> Living </h3> </div>
<div id="Living_static" onClick="Living_static_hide()"> 
<div style="position:absolute;left:53%;top:97%;"> <img src="img/city.PNG"> </div>

<?php
	$city=$user_info_data[3];
	if($city!="")
	{
?>
		<div style="position:absolute;left:60%;top:101%; color:#000; font-weight:bold;text-transform:capitalize;"> <?php echo $city; ?> </div>

<?php
	}
	else
	{
?>
		<div style="position:absolute;left:60%;top:101%; color:#3B59A4; font-weight:bold;"> Add Your Current City </div>
<?php
	}	
?>
<div style="position:absolute;left:53%;top:115%;"> <img src="img/hometown.PNG"> </div>
<?php
	$hometown=$user_info_data[4];
	if($hometown!="")
	{
?>
		<div style="position:absolute;left:60%;top:119%; color:#000; font-weight:bold; text-transform:capitalize;"> <?php echo $hometown; ?> </div>
<?php
	}
	else
	{
?>
		<div style="position:absolute;left:60%;top:119%; color:#3B59A4; font-weight:bold;"> Add your hometown </div>
<?php
	}
?>


<div style="position:absolute;left:80%;top:87.5%;"> <input type="button" style="background-image:url(img/edit_button.PNG); border:none; height:24;" value="             " onClick="Living_static_hide()"> </div> 
</div>

<form method="post" style="display:none" id="Living_form">
<div style="position:absolute;left:53%;top:94%;color:#3B59A4;"> Current City </div>
<div style="position:absolute;left:53%;top:98.5%;"> <input type="text" value="<?php echo $city; ?>" name="city" style="height:33;width:350;font-size:16px;" onKeyPress="return isStringKey(event)" maxlength="15"> </div>
<div style="position:absolute;left:53%;top:108%;color:#3B59A4;"> hometown </div>
<div style="position:absolute;left:53%;top:112.5%;"> <input type="text" value="<?php echo $hometown; ?>" name="hometown" onKeyPress="return isStringKey(event)" maxlength="15" style="height:33;width:350;font-size:16px;"> </div>

<div style="position:absolute;left:59%;top:122%;"> <input type="submit" value="Save" name="leving_sub" class="save_button"> </div>
<div style="position:absolute;left:67%;top:122%;"> <input type="button" value="Cancel"  class="cancel_button" onClick="living_form_hide()"> </div>

</form>

<div style="position:absolute;left:17%; top:139%; height:0.09%; width:66%; background:#CCC; z-index:1">
</div>

 <!--Basic Information--> 
<?php
	$user_data_query=mysql_query("select * from users where user_id=$v_user_id");
	$user_data=mysql_fetch_array($user_data_query);
	$bday=$user_data[5];
	$gender=$user_data[4];
	$Emial_id=$user_data[2];
?>

 <div style="position:absolute;left:17%;top:145%;"> <h3> Basic Information </h3> </div>
 
<div id="basic_static" onClick="basic_static_hide()"> 

 <div style="position:absolute;left:19%;top:156%; font-size:18px; color:#89919C;"> Birthday </div>
 <div style="position:absolute;left:25%;top:156%; font-size:18px;"> <?php echo $bday; ?> </div>

<div style="position:absolute;left:19%; top:163%; font-size:18px; color:#89919C;">Gender</div>
<div style="position:absolute;left:25%;top:163%; font-size:18px;"> <?php echo $gender; ?> </div>


<div style="position:absolute;left:19%; top:169%; font-size:18px; color:#89919C;">Relationship </div>
<?php
	$relationship=$user_info_data[5];
	if($relationship!="")
	{	
?>
		<div style="position:absolute;left:27%;top:169.5%;"> <?php echo $relationship; ?> </div>
<?php
	}
	else
	{
?>
		<div style="position:absolute;left:27%;top:169.5%; color:#3B59A4; font-weight:bold;"> Add Relationship </div>
<?php
	}
?>
<div style="position:absolute;left:43.5%;top:147.5%;"> <input type="button" style="background-image:url(img/edit_button.PNG); border:none; height:24;" value="             " onClick="basic_static_hide()"> </div> 
</div>

<form method="post" style="display:none" id="basic_form">
<div style="position:absolute;left:19%;top:156%; font-size:18px; color:#89919C;"> Birthday </div>


<div style="position:absolute; left:25%; top:155.7%;">
	<select name="day" style="width:61;font-size:15px;height:29;padding:3;">
	<option value="Day:"> Day: </option>
	
	<script type="text/javascript">
	
		for(i=1;i<=31;i++)
		{
			document.write("<option value='"+i+"'>" + i + "</option>");
		}
		
	</script>
	
	</select>
	</div>	
    
    <div style="position:absolute;left:30%; top:155.7%;">
	<select name="month" style="width:78;font-size:15px;height:29;padding:3;">
	<option value="Month:"> Month: </option>
	
	<script type="text/javascript">
		var m=new Array("","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
		for(i=1;i<=m.length-1;i++)
		{
			document.write("<option value='"+i+"'>" + m[i] + "</option>");
		}	
	</script>
	
	</select>
	</div>
    
    
    <div style='position:absolute;left:36.3%;top:155.7%;'>
	<select name="year" style="width:66; font-size:15px; height:29; padding:3;">
	<option value="Year:"> Year: </option>
	
	<script type="text/javascript">
	
		for(i=2013;i>=1960;i--)
		{
			document.write("<option value='"+i+"'>" + i + "</option>");
		}
	
	</script>
	
	</select>
	</div>		
    
    <div style="position:absolute;left:19%; top:163%; font-size:18px; color:#89919C;">Gender</div>
<div style="position:absolute;left:25%;top:163%; font-size:18px;"> <?php echo $gender; ?> </div>

<div style="position:absolute;left:19%; top:169%; font-size:18px; color:#89919C;">Relationship </div>


<div style="position:absolute;left:27%; top:169%;">
	<select name="relationship" style="font-size:15px;height:29;padding:3;">
	<option value=""> ------------ </option>
	
	<script type="text/javascript">
	
		var rel=new Array("Single","In a relationship","Engaged","Married","Its complicated","In an open relationship","Windowed","Separated","Divoced");
		for(i=0;i<=rel.length-1;i++)
		{
			document.write("<option value='"+rel[i]+"'>" + rel[i] + "</option>");
		}	
	</script>
	
	</select>
	</div>
    
    <div style="position:absolute;left:24%;top:180%;"> <input type="submit" value="Save" name="basic_sub" class="save_button"> </div>
<div style="position:absolute;left:32%;top:180%;"> <input type="button" value="Cancel"  class="cancel_button" onClick="basic_form_hide()"> </div>

</form>




<!--Contact Information--> 

<div style="position:absolute;left:51%;top:145%;"> <h3> Contact Information </h3> </div>

<div id="contact_static" onClick="contact_static_hide()">
<div style="position:absolute;left:53%;top:156%; font-size:18px; color:#89919C;"> Mobile Phones </div>
<?php
	$m_no=$user_info_data[6];
	if($m_no!=0)
	{
?>
		<div style="position:absolute;left:62%;top:156%; font-size:18px;"> <?php echo $m_no; ?> </div>
<?php
		$m_no_priority=$user_info_data[7];
		if($m_no_priority=="Private")
		{
?>	
			<div style="position:absolute;left:70%;top:156%;"> <img src="img/only_me.PNG"> </div>
	
<?php			
		}
	}
	else
	{
?>
		<div style="position:absolute;left:62%;top:156.4%; color:#3B59A4; font-weight:bold;"> Add Mobile Number </div>
		
<?php
	}
?>

<div style="position:absolute;left:53%; top:162%; font-size:18px; color:#89919C;">Email</div>

<div style="position:absolute;left:58%;top:162%; font-size:18px;"> <?php echo $Emial_id; ?> </div>
   <div style="position:absolute;left:53%; top:169%; font-size:18px; color:#89919C;">Website</div>
  
<?php
	$web=$user_info_data[8];
	if($web!="")
	{
?>
		<div style="position:absolute;left:59%;top:169%; color:#3B59A4; font-weight:bold;"> <?php echo $web; ?> </div>
<?php
	}
	else
	{
?>
		<div style="position:absolute;left:59%;top:169%; color:#3B59A4; font-weight:bold;"> Add Website </div>
<?php
	}
?> 

<div style="position:absolute;left:53%; top:175%; font-size:18px; color:#89919C;">Facebook ID </div>

<?php
	$fb_id=$user_info_data[9];
	if($fb_id!="")
	{
?>
		<div style="position:absolute;left:61%;top:175%; color:#3B59A4; font-weight:bold;"> <?php echo $fb_id; ?> </div>
		
<?php
	}
	else
	{
?>
		<div style="position:absolute;left:61%;top:175%; color:#3B59A4; font-weight:bold;"> Add Facebook ID </div>
<?php
	}
?> 

<div style="position:absolute;left:80%;top:147.5%;"> <input type="button" style="background-image:url(img/edit_button.PNG); border:none; height:24;" value="             " onClick="contact_static_hide()"> </div> 
</div>

<form method="post" style="display:none" name="contact" id="contact_form" onSubmit="return contact_check()">
<div style="position:absolute;left:53%;top:156%; font-size:18px; color:#89919C;"> Mobile Phones </div>
<div style="position:absolute;left:62%;top:155.4%;"> <input type="text" value="<?php echo $m_no; ?>" name="mno" onKeyPress="return isNumberKey(event)" style="height:33;width:150;font-size:16px;" maxlength="10"> </div>

<div style="position:absolute;left:74%;top:155.4%;">
	<select style="height:33;font-size:19px;" name="priority">
    	<option value="Private"> Only me </option>  
		<option value="Public"> Public </option> 
	</select>
</div>

<div style="position:absolute;left:53%; top:162%; font-size:18px; color:#89919C;">Email</div>

<div style="position:absolute;left:61%;top:161.6%; font-size:18px;"> <input type="text" value="<?php echo $Emial_id; ?>" style="height:33; width:300; color:#000; font-size:16px; "  disabled></div>
    
  <div style="position:absolute;left:53%; top:169%; font-size:18px; color:#89919C;">Website</div>
<div style="position:absolute;left:61%;top:168%;"> <input type="text" value="<?php echo $web; ?>" name="web" maxlength="40" style="height:33;width:300;font-size:16px;"> </div>
<div style="position:absolute;left:53%; top:175%; font-size:18px; color:#89919C;">Facebook ID </div>
<div style="position:absolute;left:61%;top:174.4%;"> <input type="text" value="<?php echo $fb_id; ?>" name="fbid" maxlength="40" style="height:33;width:300;font-size:16px;"> </div>

<div style="position:absolute;left:59%;top:185%;"> <input type="submit" value="Save" name="contact_sub" class="save_button"> </div>
<div style="position:absolute;left:67%;top:185%;"> <input type="button" value="Cancel"  class="cancel_button" onClick="contact_form_hide()"> </div>

</form>



<div style="position:absolute;left:58%;top:193%; display:none;" id="mobile_no_erorr"><img src="img/wrong.png"> The phone number is invalid.</div>

<div style="position:absolute;left:24%;top:220%; color:#E9EAED;">.</div>

</body>
</html>
<?php
	}
	else
	{
		header("location:../../index.php");
	}
?>