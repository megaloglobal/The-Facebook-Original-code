function capital_post_txt()
{
	document.posting_txt.post_txt.style.textTransform="capitalize";
}
		
function capital_post_pic_txt()
{
	document.posting_pic.post_txt.style.textTransform="capitalize";
}
		
function post_name_underLine(pid)
{
	document.getElementById("uname"+pid).style.textDecoration = "underline";
}

function post_name_NounderLine(pid)
{
	document.getElementById("uname"+pid).style.textDecoration = "none"
}

function like_underLine(pid)
{
	document.getElementById("like"+pid).style.textDecoration = "underline";
}
function like_NounderLine(pid)
{
	document.getElementById("like"+pid).style.textDecoration = "none"
}

function Comment_underLine(pid)
{
	document.getElementById("comment"+pid).style.textDecoration = "underline";
}
function Comment_NounderLine(pid)
{
	document.getElementById("comment"+pid).style.textDecoration = "none"
}

function Comment_name_underLine(cid)
{
	document.getElementById("cuname"+cid).style.textDecoration = "underline";
}
function Comment_name_NounderLine(cid)
{
	document.getElementById("cuname"+cid).style.textDecoration = "none"
}