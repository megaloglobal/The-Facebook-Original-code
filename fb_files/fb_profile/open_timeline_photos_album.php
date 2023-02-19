<html>
<head>
	
</head>
<body>
<?php
error_reporting(1);
	$id=$_GET['photo'];
	session_start();
	$user=$_SESSION['fbuser'];
	mysql_connect("localhost","root","");
	mysql_select_db("faceback");
	
	$que_user_info=mysql_query("select * from users where Email='$user'");
	$user_data=mysql_fetch_array($que_user_info);
	$gender=$user_data[4];
	
	$que_post_img=mysql_query("select * from user_post where post_id=$id");
	while($post_img_data=mysql_fetch_array($que_post_img))
	{
?>
	
<!--Timeline pic open dailog box-->
<div id="timeline_album_photo">
<div style="position:fixed; background:#3A3E41; opacity: 0.8; left:0%; top:0%; height:100%; width:100%; z-index:3" onClick="close_timeline_album_photo()"></div>
<div style="position:fixed; background:#FFF; left:17%; top:5%; height:90%; width:65.5%; z-index:3"></div>
<div style="position:fixed; left:20%; top:10%;z-index:4;">
<img src="../../fb_users/<?php echo $gender; ?>/<?php echo $user; ?>/Post/<?php echo $post_img_data[3]; ?>" style="height:500; width:800; ">
</div>
</div>

<?php	
	}
?>
</body>
</html>