function validate()
{
	var show = document.getElementById("show");
	var ssc = document.getElementById("ssc").checked;
	var hsc = document.getElementById("hsc").checked;
	var bsc = document.getElementById("bsc").checked;
	var msc = document.getElementById("msc").checked;
	if( ssc == true || hsc == true || bsc == true || msc == true)
	{
		return true;
	}
	else
	{
		show.innerHTML = "|At least one of them has to be selected";
		return false;
	}
	
}

function clicks()
{
	var show = document.getElementById("show");
	show.innerHTML = "";
}