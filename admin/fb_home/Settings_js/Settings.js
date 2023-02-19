function Change_password()
{
	document.getElementById("change_password_dailogbox").style.display='block';
}

function hide_password_change_box()
{
	document.getElementById("change_password_dailogbox").style.display='none';
	document.getElementById("error_design_format1").style.display='none';
	document.getElementById("not_match_error").style.display='none';
	document.getElementById("not_valid_error").style.display='none';
	document.getElementById("blank_error").style.display='none';	
}

function password_check()
{ 
	var old_pass=password_change.old_password.value;
	var new_pass=password_change.new_password.value;
	var c_pass=password_change.c_password.value;
			
	for(i=0;i<password_change.length;i++)
	{
		if(password_change[i].value=="")
		{
			document.getElementById("error_design_format1").style.display='block';
			document.getElementById("not_match_error").style.display='none';
			document.getElementById("not_valid_error").style.display='none';
			document.getElementById("blank_error").style.display='block';
			password_change[i].focus();
			return false;
		}
	}
			
	if(new_pass!=c_pass)
	{
		document.getElementById("error_design_format1").style.display='block';
		document.getElementById("blank_error").style.display='none';
		document.getElementById("not_valid_error").style.display='none';
		document.getElementById("not_match_error").style.display='block';
		password_change.c_password.focus();
		return false;
	}
			
	if(old_pass.length<=5 || new_pass.length<=5 || c_pass.length<=5)
	{
		document.getElementById("error_design_format1").style.display='block';
		document.getElementById("not_match_error").style.display='none';
		document.getElementById("blank_error").style.display='none';
		document.getElementById("not_valid_error").style.display='block';
		return false;
	}
}
