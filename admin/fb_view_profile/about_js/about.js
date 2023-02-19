function work_static_hide()
{
	document.getElementById("work_static").style.display='none';
	document.getElementById("Work_form").style.display='block';
}
function Living_static_hide()
{
	document.getElementById("Living_static").style.display='none';
	document.getElementById("Living_form").style.display='block';
}
function work_form_hide()
{
	document.getElementById("Work_form").style.display='none';
	document.getElementById("work_static").style.display='block';
}
function living_form_hide()
{
	document.getElementById("Living_form").style.display='none';
	document.getElementById("Living_static").style.display='block';
}
function basic_static_hide()
{
	document.getElementById("basic_static").style.display='none';
	document.getElementById("basic_form").style.display='block';
}
function basic_form_hide()
{
	document.getElementById("basic_form").style.display='none';
	document.getElementById("basic_static").style.display='block';
}
function contact_static_hide()
{
	document.getElementById("contact_static").style.display='none';
	document.getElementById("contact_form").style.display='block';
}
function contact_form_hide()
{
	document.getElementById("mobile_no_erorr").style.display='none';
	document.getElementById("contact_form").style.display='none';
	document.getElementById("contact_static").style.display='block';
}
		
function contact_check()
{
	var no = document.contact.mno.value;
	if(no!='')
	{
     if (no.length!=10)
     {
         document.getElementById("mobile_no_erorr").style.display='block';
         return false;
      }
      if (no.charAt(0)!="9" && no.charAt(0)!="8" && no.charAt(0)!="7")
      {
         document.getElementById("mobile_no_erorr").style.display='block';
         return false;
      }
	}
}

function isNumberKey(evt)
{
	var charCode=(evt.which)? evt.which:event.KeyCode
	if(charCode>31 && (charCode<48 || charCode>57))
	{
		return false;
	}
	return true;
}


function isStringKey(evt)
{
	var charCode=(evt.which)? evt.which:event.KeyCode
	if(charCode>10 && (charCode<65 || charCode>90) && (charCode<97 || charCode>122))
	{
		return false;
	}
	return true;
}
