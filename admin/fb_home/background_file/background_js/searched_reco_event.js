function searched_over(uid)
{
	document.getElementById("Photo"+uid).bgColor = "#6D84B4";
	document.getElementById("Photo"+uid).style.color="#FFFFFF";
	document.getElementById("Name_bg"+uid).bgColor = "#6D84B4";
	document.getElementById("Name_font"+uid).style.color="#FFFFFF";
}
function searched_out(uid)
{
	document.getElementById("Photo"+uid).bgColor = "#FFFFFF";
	document.getElementById("Photo"+uid).style.color="#3B5998";
	document.getElementById("Name_bg"+uid).bgColor = "#FFFFFF";
	document.getElementById("Name_font"+uid).style.color="#3B5998";	
}
function see_more_over()
{
	document.getElementById("see_more").bgColor = "#6D84B4";
	document.getElementById("see_more_text").style.color="#FFFFFF";
}

function see_more_out()
{
	document.getElementById("see_more").bgColor = "#F2F2F2";
	document.getElementById("see_more_text").style.color="#3B5998";
}




