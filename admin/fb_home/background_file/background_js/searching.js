function searching()
{
	var xmlhttp;

  	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{	
  			var details=document.getElementById("searching_ID");
	  		details.innerHTML=xmlhttp.responseText;
	}
	xmlhttp.open("GET","Search_Display.php?search_text="+document.fb_search.search1.value,true);
	xmlhttp.send(null);
}