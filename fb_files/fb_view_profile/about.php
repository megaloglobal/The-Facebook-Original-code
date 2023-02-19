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
?>
<?php
		include("background.php");
		
		$user_info_query=mysql_query("select * from user_info where user_id=$v_user_id");
		$user_info_data=mysql_fetch_array($user_info_query);
?>
<html>
<head>
<title><?php echo $name; ?></title>
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
  
<div style="position:absolute;left:19%;top:97%;"> <img src="img/job.PNG"> </div>
<?php
	$job=$user_info_data[1];
	$school_or_collage=$user_info_data[2];
?>
		<div style="position:absolute;left:26%;top:101%; color:#000; font-weight:bold;"> <?php echo $job; ?> </div>

<div style="position:absolute;left:19%;top:115%;"> <img src="img/school.PNG"> </div>

		<div style="position:absolute;left:26%;top:119%; color:#000; font-weight:bold;"> <?php echo $school_or_collage; ?> </div>


<div style="position:absolute;left:48.2%; top:82%; height:120%; width:0.05%; background:#CCC;">
</div>

<!--Living-->
<div style="position:absolute;left:51%;top:85%;"> <h3> Living </h3> </div>

<div style="position:absolute;left:53%;top:97%;"> <img src="img/city.PNG"> </div>

<?php
	$city=$user_info_data[3];
?>
		<div style="position:absolute;left:60%;top:101%; color:#000; font-weight:bold;text-transform:capitalize;"> <?php echo $city; ?> </div>

<div style="position:absolute;left:53%;top:115%;"> <img src="img/hometown.PNG"> </div>
<?php
	$hometown=$user_info_data[4];
?>
		<div style="position:absolute;left:60%;top:119%; color:#000; font-weight:bold; text-transform:capitalize;"> <?php echo $hometown; ?> </div>


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
 


 <div style="position:absolute;left:19%;top:156%; font-size:18px; color:#89919C;"> Birthday </div>
 <div style="position:absolute;left:25%;top:156%; font-size:18px;"> <?php echo $bday; ?> </div>

<div style="position:absolute;left:19%; top:163%; font-size:18px; color:#89919C;">Gender</div>
<div style="position:absolute;left:25%;top:163%; font-size:18px;"> <?php echo $gender; ?> </div>


<div style="position:absolute;left:19%; top:169%; font-size:18px; color:#89919C;">Relationship </div>
<?php
	$relationship=$user_info_data[5];
?>
		<div style="position:absolute;left:27%;top:169.5%;"> <?php echo $relationship; ?> </div>

<!--Contact Information--> 

<div style="position:absolute;left:51%;top:145%;"> <h3> Contact Information </h3> </div>


<div style="position:absolute;left:53%;top:156%; font-size:18px; color:#89919C;"> Mobile Phones </div>
<?php
	$m_no=$user_info_data[6];
?>

<?php
		$m_no_priority=$user_info_data[7];
		if($m_no_priority!="Private")
		{
?>	
					<div style="position:absolute;left:62%;top:156%; font-size:18px;"> <?php echo $m_no; ?> </div>
	
<?php			
		}
?>
   <div style="position:absolute;left:53%; top:162%; font-size:18px; color:#89919C;">Email</div>

<div style="position:absolute;left:58%;top:162%; font-size:18px;"> <?php echo $Emial_id; ?> </div>
   <div style="position:absolute;left:53%; top:169%; font-size:18px; color:#89919C;">Website</div>
  
<?php
	$web=$user_info_data[8];
?>
		<div style="position:absolute;left:59%;top:169%; color:#3B59A4; font-weight:bold;"> <?php echo $web; ?> </div>


<div style="position:absolute;left:53%; top:175%; font-size:18px; color:#89919C;">Facebook ID </div>

<?php
	$fb_id=$user_info_data[9];
?>
		<div style="position:absolute;left:61%;top:175%; color:#3B59A4; font-weight:bold;"> <?php echo $fb_id; ?> </div>
		
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