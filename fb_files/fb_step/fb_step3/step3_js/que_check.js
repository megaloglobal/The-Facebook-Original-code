function check()
{
	var que=sq.que.value;
	var ans_leg=sq.ans.value.length;
			
	if(que=="select one")
	{
		document.getElementById("ans_error_design_format").style.display='none';
		document.getElementById("erorr_4").style.display='none';
		document.getElementById("que_error").style.display='block';
		return false;
	}
	
	if(ans_leg<4)
	{
		document.getElementById("que_error").style.display='none';
		document.getElementById("ans_error_design_format").style.display='block';
		document.getElementById("erorr_4").style.display='block';
		sq.ans.focus();
		return false;
	}
	return true;
}