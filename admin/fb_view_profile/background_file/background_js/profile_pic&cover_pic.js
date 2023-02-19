function open_profile_photo()
{
	document.getElementById("profile_pic_open_box").style.display='block';
}
function close_profile_photo()
{
	document.getElementById("profile_pic_open_box").style.display='none';
}
function open_cover_photo()
{
	document.getElementById("cover_pic_open_box").style.display='block';
}
function close_cover_photo()
{
	document.getElementById("cover_pic_open_box").style.display='none';
}
function dis_cover_pic_edit()
{
	document.getElementById("edit_cover_button").style.display='block';
}

function out_cover_pic_edit()
{
	document.getElementById("edit_cover_button").style.display='none';
}

function upload_cover_pic()
{
	document.getElementById("upload_cover_pic_dailogbox").style.display='block';
	document.getElementById("body").style.overflow="hidden";
}

function Change_cover_pic()
{
	document.getElementById("change_cover_pic_dailogbox").style.display='block';
	document.getElementById("body").style.overflow="hidden";
}
	
function dis_pro_pic_edit()
{
	document.getElementById("edit_pro_button").style.display='block';
}

function out_pro_pic_edit()
{
	document.getElementById("edit_pro_button").style.display='none';
}

function upload_pro_pic()
{
	document.getElementById("upload_pic").style.display='block';
	document.getElementById("body").style.overflow="hidden";
}

function cover_Img_check()
{
	var file = document.getElementById('img');
	var fileName = file.value;
	var ext = fileName.slice(fileName.length-4,fileName.length);
	if(fileName=="")
	{
		document.getElementById("not_valid_img").style.display='none';
		document.getElementById("error_design_format").style.display='block';
		document.getElementById("first_select").style.display='block';
		return false;
	}
	else
	{
		if(ext!=".jpg" && ext!=".JPG" && ext!=".png" && ext!=".PNG" && ext!=".gif" && ext!=".GIF")
		{
			document.getElementById("first_select").style.display='none';
			document.getElementById("error_design_format").style.display='block';
			document.getElementById("not_valid_img").style.display='block';
			return false;
		}
	}
	document.getElementById("first_select").style.display='none';
	document.getElementById("error_design_format").style.display='none';
	document.getElementById("not_valid_img").style.display='none';
	return true;
}
	
function profile_Img_check()
{
	var file = document.getElementById('img1');
	var fileName = file.value;
	var ext = fileName.slice(fileName.length-4,fileName.length);
	if(fileName=="")
	{
		document.getElementById("not_valid_img").style.display='none';
		document.getElementById("error_design_format").style.display='block';
		document.getElementById("first_select").style.display='block';
		return false;
	}
	else
	{
		if(ext!=".jpg" && ext!=".JPG" && ext!=".png" && ext!=".PNG" && ext!=".gif" && ext!=".GIF")
		{
			document.getElementById("first_select").style.display='none';
			document.getElementById("error_design_format").style.display='block';
			document.getElementById("not_valid_img").style.display='block';
			return false;
		}
	}
	document.getElementById("first_select").style.display='none';
	document.getElementById("error_design_format").style.display='none';
	document.getElementById("not_valid_img").style.display='none';
	return true;
}
function hide_cover_change_box()
{
	document.getElementById("change_cover_pic_dailogbox").style.display='none';	
	document.getElementById("body").style.overflow="visible";
	document.getElementById("first_select").style.display='none';
	document.getElementById("error_design_format").style.display='none';
	document.getElementById("not_valid_img").style.display='none';
}
function hide_cover_add_box()
{
	document.getElementById("upload_cover_pic_dailogbox").style.display='none';
	document.getElementById("body").style.overflow="visible";
	document.getElementById("first_select").style.display='none';
	document.getElementById("error_design_format").style.display='none';
	document.getElementById("not_valid_img").style.display='none';
}
function hide_profile_change_box()
{
	document.getElementById("body").style.overflow="visible";
	document.getElementById("upload_pic").style.display='none';
	document.getElementById("first_select").style.display='none';
	document.getElementById("error_design_format").style.display='none';
	document.getElementById("not_valid_img").style.display='none';
}