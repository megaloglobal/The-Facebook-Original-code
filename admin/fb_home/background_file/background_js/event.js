// fb text
function on_head_fb_text()
{
	document.getElementById("head_fb_text_backgraound").style.display='block';
}
function out_head_fb_text()
{
	document.getElementById("head_fb_text_backgraound").style.display='none';
}


// head profile pic,name,home

function head_pro_pic_over()
{
	document.getElementById("head_img").bgColor = "#4A63A5";
	document.getElementById("head_name_bg").bgColor = "#4A63A5";
	document.getElementById("head_name_font").style.color = "#FFFFFF";
}
function head_pro_pic_out()
{
	document.getElementById("head_img").bgColor = "#3B5998";
	document.getElementById("head_name_bg").bgColor = "#3B5998";
	document.getElementById("head_name_font").style.color = "#DEDEEF";	
}


// Left name
function left_name_over()
{
	document.getElementById("left_name").style.textDecoration = "underline"
}
function left_name_out()
{
	document.getElementById("left_name").style.textDecoration = "none"
}

