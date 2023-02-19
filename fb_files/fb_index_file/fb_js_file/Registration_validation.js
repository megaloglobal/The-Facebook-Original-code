// Registration 
function check()
{
	// All blank checking
	for(i=0;i<Reg.length;i++)
	{
		if(Reg[i].type=="text")
		{
			if(Reg[i].value=="")
			{
				document.getElementById("error_design_format").style.display='block';
				document.getElementById("Name_error").style.display='none';
				document.getElementById("full_Name_error").style.display='none';
				document.getElementById("Email_error").style.display='none';
				document.getElementById("Email_not_match_error").style.display='none';
				document.getElementById("Password_error").style.display='none';
				document.getElementById("Gender_error").style.display='none';
				document.getElementById("Date_error").style.display='none';
				document.getElementById("blank_error").style.display='block';
				Reg[i].focus();
				return false;
			}
			
		}
	}
	
	// first Name checking
	// first Name A To Z only checking
	var fnm=Reg.first_name.value;
	for(var index=0;index<fnm.length;index++)
	{
		if(fnm.toUpperCase().charAt(index)<'A' || fnm.toUpperCase().charAt(index)>'Z')
		{
			document.getElementById("error_design_format").style.display='block';
			document.getElementById("blank_error").style.display='none';
			document.getElementById("full_Name_error").style.display='none';
			document.getElementById("Email_error").style.display='none';
			document.getElementById("Email_not_match_error").style.display='none';
			document.getElementById("Password_error").style.display='none';
			document.getElementById("Gender_error").style.display='none';
			document.getElementById("Date_error").style.display='none';
			document.getElementById("Name_error").style.display='block';
			Reg.first_name.focus();
			return false;
			break;
		}
	}
	
	// 	first Name more then 2 char chaecking
	if(fnm.length<=1)
	{
		document.getElementById("error_design_format").style.display='block';
		document.getElementById("blank_error").style.display='none';
		document.getElementById("Name_error").style.display='none';
		document.getElementById("Email_error").style.display='none';
		document.getElementById("Email_not_match_error").style.display='none';
		document.getElementById("Password_error").style.display='none';
		document.getElementById("Gender_error").style.display='none';
		document.getElementById("Date_error").style.display='none';
		document.getElementById("full_Name_error").style.display='block';
		Reg.first_name.focus();
		return false;
	}
	
	// Last Name checking
	// Last Name A To Z only checking
	var lnm=Reg.last_name.value;
	for(var index=0;index<lnm.length;index++)
	{
		if(lnm.toUpperCase().charAt(index)<'A' || lnm.toUpperCase().charAt(index)>'Z')
		{
			document.getElementById("error_design_format").style.display='block';
			document.getElementById("blank_error").style.display='none';
			document.getElementById("full_Name_error").style.display='none';
			document.getElementById("Email_error").style.display='none';
			document.getElementById("Email_not_match_error").style.display='none';
			document.getElementById("Password_error").style.display='none';
			document.getElementById("Gender_error").style.display='none';
			document.getElementById("Date_error").style.display='none';
			document.getElementById("Name_error").style.display='block';
			Reg.last_name.focus();
			return false;
			break;
		}
	}
	
	// 	last Name more then 2 char chaeking
	if(lnm.length<=1)
	{
		document.getElementById("error_design_format").style.display='block';
		document.getElementById("blank_error").style.display='none';
		document.getElementById("Name_error").style.display='none';
		document.getElementById("Email_error").style.display='none';
		document.getElementById("Email_not_match_error").style.display='none';
		document.getElementById("Password_error").style.display='none';
		document.getElementById("Gender_error").style.display='none';
		document.getElementById("Date_error").style.display='none';
		document.getElementById("full_Name_error").style.display='block';
		Reg.last_name.focus();
		return false;
	}
	
	// Email checking
	
		var x=Reg.email.value;
		var atpos=x.indexOf("@");
		var dotpos=x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
 		{
  			document.getElementById("error_design_format").style.display='block';
			document.getElementById("blank_error").style.display='none';
			document.getElementById("Name_error").style.display='none';
			document.getElementById("full_Name_error").style.display='none';
			document.getElementById("Email_not_match_error").style.display='none';
			document.getElementById("Password_error").style.display='none';
			document.getElementById("Gender_error").style.display='none';
			document.getElementById("Date_error").style.display='none';
			document.getElementById("Email_error").style.display='block';
			Reg.email.focus();
 		 	return false;
 		}
	
		var doname=x.substr(atpos+1,5);
		var donameup=doname.toUpperCase();
		if(donameup!="GMAIL" && donameup!="YAHOO")
		{
			document.getElementById("error_design_format").style.display='block';
			document.getElementById("blank_error").style.display='none';
			document.getElementById("Name_error").style.display='none';
			document.getElementById("full_Name_error").style.display='none';
			document.getElementById("Email_not_match_error").style.display='none';
			document.getElementById("Password_error").style.display='none';
			document.getElementById("Gender_error").style.display='none';
			document.getElementById("Date_error").style.display='none';
			document.getElementById("Email_error").style.display='block';
			Reg.email.focus();
 		 	return false;
		}
	
	// Email match checking
	if(Reg.email.value!=Reg.remail.value)
	{
		document.getElementById("error_design_format").style.display='block';
		document.getElementById("blank_error").style.display='none';
		document.getElementById("Name_error").style.display='none';
		document.getElementById("full_Name_error").style.display='none';
		document.getElementById("Email_error").style.display='none';
		document.getElementById("Password_error").style.display='none';
		document.getElementById("Gender_error").style.display='none';
		document.getElementById("Date_error").style.display='none';
		document.getElementById("Email_not_match_error").style.display='block';
		Reg.remail.focus();
		return false;
	}
	
	// password checking
	var cpass=Reg.password.value;
	if(cpass.length<=5)
	{
		document.getElementById("error_design_format").style.display='block';
		document.getElementById("blank_error").style.display='none';
		document.getElementById("Name_error").style.display='none';
		document.getElementById("full_Name_error").style.display='none';
		document.getElementById("Email_error").style.display='none';
		document.getElementById("Email_not_match_error").style.display='none';
		document.getElementById("Gender_error").style.display='none';
		document.getElementById("Date_error").style.display='none';
		document.getElementById("Password_error").style.display='block';
		Reg.password.focus();
		return false;
	}
	
	// gender checking
	var cgen=Reg.sex.value;
	if(cgen=="Select Sex:")
	{
		document.getElementById("error_design_format").style.display='block';
		document.getElementById("blank_error").style.display='none';
		document.getElementById("Name_error").style.display='none';
		document.getElementById("full_Name_error").style.display='none';
		document.getElementById("Email_error").style.display='none';
		document.getElementById("Email_not_match_error").style.display='none';
		document.getElementById("Password_error").style.display='none';
		document.getElementById("Date_error").style.display='none';
		document.getElementById("Gender_error").style.display='block';
		return false;
	}
	
	// month checking
	var cmon=Reg.month.value;
	if(cmon=="Month:")
	{
		document.getElementById("error_design_format").style.display='block';
		document.getElementById("blank_error").style.display='none';
		document.getElementById("Name_error").style.display='none';
		document.getElementById("full_Name_error").style.display='none';
		document.getElementById("Email_error").style.display='none';
		document.getElementById("Email_not_match_error").style.display='none';
		document.getElementById("Password_error").style.display='none';
		document.getElementById("Gender_error").style.display='none';
		document.getElementById("Date_error").style.display='block';
		return false;
	}
	
	// Day checking
	var cday=Reg.day.value;
	if(cday=="Day:")
	{
		document.getElementById("error_design_format").style.display='block';
		document.getElementById("blank_error").style.display='none';
		document.getElementById("Name_error").style.display='none';
		document.getElementById("full_Name_error").style.display='none';
		document.getElementById("Email_error").style.display='none';
		document.getElementById("Email_not_match_error").style.display='none';
		document.getElementById("Password_error").style.display='none';
		document.getElementById("Gender_error").style.display='none';
		document.getElementById("Date_error").style.display='block';
		return false;
	}
	
	// Year checking
	var cyear=Reg.year.value;
	if(cyear=="Year:")
	{
		document.getElementById("error_design_format").style.display='block';
		document.getElementById("blank_error").style.display='none';
		document.getElementById("Name_error").style.display='none';
		document.getElementById("full_Name_error").style.display='none';
		document.getElementById("Email_error").style.display='none';
		document.getElementById("Email_not_match_error").style.display='none';
		document.getElementById("Password_error").style.display='none';
		document.getElementById("Gender_error").style.display='none';
		document.getElementById("Date_error").style.display='block';
		return false;
	}
	
	return true;
}