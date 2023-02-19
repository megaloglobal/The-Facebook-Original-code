function Change_name()
{
	document.getElementById("change_Name_dailogbox").style.display='block';
}
		
function hide_name_change_box()
{
	document.getElementById("change_Name_dailogbox").style.display='none';
	document.getElementById("error_design_format").style.display='none';
	document.getElementById("full_Name_error").style.display='none';
	document.getElementById("Name_error").style.display='none';
}

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

function delete_account()
{
	document.getElementById("delete_account_dailogbox").style.display='block';
}

function hide_delete_account_box()
{
	document.getElementById("delete_account_dailogbox").style.display='none';
}
		
function name_check()
{
	var fnm=name_change.fnm.value;
	var lnm=name_change.lnm.value;
			
	// first Name checking
	// first Name A To Z only checking
	for(var index=0;index<fnm.length;index++)
	{
		if(fnm.toUpperCase().charAt(index)<'A' || fnm.toUpperCase().charAt(index)>'Z')
		{
			document.getElementById("error_design_format").style.display='block';
			document.getElementById("full_Name_error").style.display='none';
			document.getElementById("Name_error").style.display='block';
			name_change.fnm.focus();
			return false;
			break;
		}
	}
			
	// 	first Name more then 2 char chaecking
	if(fnm.length<=1)
	{
		document.getElementById("error_design_format").style.display='block';
		document.getElementById("Name_error").style.display='none';
		document.getElementById("full_Name_error").style.display='block';
		name_change.fnm.focus();
		return false;
	}
			
	// last Name checking
	// last Name A To Z only checking
	for(var index=0;index<lnm.length;index++)
	{
		if(lnm.toUpperCase().charAt(index)<'A' || lnm.toUpperCase().charAt(index)>'Z')
		{
			document.getElementById("error_design_format").style.display='block';
			document.getElementById("full_Name_error").style.display='none';
			document.getElementById("Name_error").style.display='block';
			name_change.lnm.focus();
			return false;
			break;
		}
	}
			
	// 	last Name more then 2 char chaecking
	if(lnm.length<=1)
	{
		document.getElementById("error_design_format").style.display='block';
		document.getElementById("Name_error").style.display='none';
		document.getElementById("full_Name_error").style.display='block';
		name_change.lnm.focus();
		return false;
	}
			
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
