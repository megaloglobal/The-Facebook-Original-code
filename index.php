<?php
	include("Login.php");
	include("fb_files/fb_index_file/fb_SignUp_file/SignUp.php");
?>
<html>
<head>
	<title> Facebook </title>
<?php
include("fb_files/fb_index_file/fb_background_file/index_background.php");
?>
	<LINK REL="SHORTCUT ICON" HREF="fb_files/fb_title_icon/Faceback.ico" />
	<link href="fb_files/fb_index_file/fb_css_file/index_css.css" rel="stylesheet" type="text/css">
    <link href="fb_files/fb_font/font.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="fb_files/fb_index_file/fb_js_file/Registration_validation.js"> </script>
</head>
<script>
	function time_get()
	{
		d = new Date();
		mon = d.getMonth()+1;
		time = d.getDate()+"-"+mon+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes();
		Reg.fb_join_time.value=time;
	}
</script>
<body>
	<!--login form-->
	<form  method="post">
		<div style="position:absolute; left:57.7%; top:2.2%; font-size:12px; color:#FFFFFF;">   Email </div>
		<div style="position:absolute; left:57.7%; top:5.18%; font-size:11px; "> <input type="text" name="username" style="width:149.5;"/> </div>
		<div style="position:absolute; left:57.4%; top:8.8%; font-size:12; color:#CCCCCC;">  <input type="checkbox" checked="checked">   Keep me logged in </div>
		<div style="position:absolute;left:69.6%; top:2.2%; font-size:13px; color:#FFFFFF"> Password </div>
		<div style="position:absolute;left:69.6%; top:5.18%; font-size:13px; "> <input type="password" name="password" style="width:149.5;"> </div>
		<div style="position:absolute;left:69.6%; top:9.2%; font-size:12px; color:#CCCCCC;"> <a href="Forgot_Password.php" style="color:#CCCCCC; text-decoration:none;"> Forgot your password? </a> </div>
		<div style="position:absolute;left:81.8%;top:5.2%; ">   <input type="submit" name="Login" value="Log In" id="login_button" />  </div>
	</form>

	<!-- Faceback left part -->

		<!--Left part-->
		<!--Mobile Image-->
	<div style="position:absolute; left:5%; top:35%;"> <img src="fb_files/fb_index_file/fb_image_file/Faceback_map.PNG" width="700" height="275"> </div>
    <div style="position:absolute; left:7%; top:24%; color:#3B5998; font-size:28px;"> <font face="myFbFont"> Facebook helps you connect and share with </font> </div>
    <div style="position:absolute; left:7%; top:30%; color:#3B5998; font-size:28px;"> <font face="myFbFont"> the people in your life. </font></div>



	<!-- Registration -->
	<form  method="post" onSubmit="return check();" name="Reg">
		<div style="position:absolute;left:58%; top:14.5%; color:#000066; font-size:25"> <h5> Sign Up </h5> </div>
		<div style="position:absolute;left:58%; top:24.6%; color:#000000;">  It's free and always will be.  </div>
		<div style="position:absolute;left:57.3%; top:29.1%; height:1; width:385; background-color:#CCCCCC;"> </div>

		<div style="position:absolute;left:59.4%; top:34%; font-size:16px; color:#000000">  First Name: </div>
		<div style="position:absolute;left:65.2%;   top:32.8%; "> <input type="text" name="first_name" class="inputbox" maxlength="10"/> </div>
		<div style="position:absolute;left:59.4%; top:41%; font-size:16px; color:#000000">  Last Name: </div>
		<div style="position:absolute;left:65.2%;  top:39.8%;  "> <input type="text" name="last_name"  size="25" class="inputbox" maxlength="10" /> </div>
		<div style="position:absolute;left:59.2%; top:48%; font-size:16px; color:#000000">  Your Email:  </div>
		<div style="position:absolute;left:65.2%;  top:46.8%; "> <input type="text" name="email"  size="25" class="inputbox" /> </div>
		<div style="position:absolute;left:57.4%; top:55%; font-size:16px; color:#000000">  Re-enter Email:  </div>
		<div style="position:absolute;left:65.2%; top:53.8%; "> <input type="text" name="remail"  size="25" class="inputbox" /> </div>
		<div style="position:absolute;left:57.4%; top:62%; font-size:16px; color:#000000"> New Password:  </div>
		<div style="position:absolute;left:65.2%; top:60.8%; "> <input type="password" name="password" size="25" class="inputbox" /> </div>
		<div style="position:absolute;left:62.2%; top:68.5%; font-size:16px; color:#000000"> I am:  </div>
		<div style="position:absolute;left:65.2% ;top:67.8%;">
		<select name="sex" style="width:120;height:35;font-size:18px;padding:3;">
			<option value="Select Sex:"> Select Sex: </option>
			<option value="Female"> Female </option>
			<option value="Male"> Male </option>
		</select>
		</div>

<div style="position:absolute;left:60.28%; top:74.8%; font-size:16px; color:#000000">  Birthday:  </div>


	<div style="position:absolute;left:65.2%; top:74%;">
	<select name="month" style="width:80;font-size:18px;height:32;padding:3;">
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



	<div style="position:absolute; left:72%; top:74%;">
	<select name="day" style="width:63;font-size:18px;height:32;padding:3;">
	<option value="Day:"> Day: </option>

	<script type="text/javascript">

		for(i=1;i<=31;i++)
		{
			document.write("<option value='"+i+"'>" + i + "</option>");
		}

	</script>

	</select>
	</div>

	<div style='position:absolute;left:77.5%;top:74%;'>
	<select name="year" style="width:70; font-size:18px; height:32; padding:3;">
	<option value="Year:"> Year: </option>

	<script type="text/javascript">

		for(i=1996;i>=1960;i--)
		{
			document.write("<option value='"+i+"'>" + i + "</option>");
		}

	</script>

	</select>
	</div>
		<input type="hidden" name="fb_join_time">
		<div style="position:absolute;left:65.2%; top:82%; ">  <input type="submit" name="signup" value="Sign Up" id="sign_button" / onClick="time_get()"> </div>
		</form>

		<div style="position:absolute;left:57.3%; top:90%; height:1; width:385; background-color:#CCCCCC; "> </div>

 <!--my_details -->
    <div style="display:none;" id="my_details">
    <div style="position:absolute;left:12%;top:73%; height:30%; width:30%; z-index:2; background:#000; opacity:0.5; box-shadow:10px 0px 10px 1px rgb(0,0,0);">   </div>
    <div style="position:absolute;left:13%;top:75%; z-index:3;"> <img src="fb_files/fb_index_file/fb_background_file/Developer_details/my.jpg" height="165" width="150" style="box-shadow:0px 0px 10px 5px rgb(0,0,0);"> </div>
    <div style="position:absolute;left:26%;top:75%; z-index:3; color:#FFF;"> <h2> <?php echo base64_decode("QW1pdCBEb2RpeWEgKEFEKQ=="); ?> </h2> </div>
    <div style="position:absolute;left:26%;top:83%; z-index:3; color:#FFF;">  <h3><?php echo base64_decode("QW1pdC5hZDFpNEB5YWhvby5jb20="); ?> </h3> </div>
    <div style="position:absolute;left:26%;top:90%; z-index:3; color:#FFF;"> <h3> <?php echo base64_decode("NzYwMDg5ODIxMA=="); ?>  </h3> </div>
	</div>


<?php
	include("fb_files/fb_index_file/fb_erorr_file/fb_erorr.php");
?>
</body>
</html>
