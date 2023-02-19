function Img_check()
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
		if(ext!=".jpg" && ext!=".JPG" && ext!=".png" && ext!=".PNG" && ext!=".gif" && ext!=".GIF" && ext!=".jpeg" && ext!=".JPEG")
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