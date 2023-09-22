function writediv(div, texte)
{
	document.getElementById(div).innerHTML = texte;
}

function ajax_champs(champs, page, div)
{
	if(champs != '')
	{
		if( texte = file(page + champs) )
		{
			writediv(div, texte);
		}
	}	
}

function file(fichier)
{
	if(window.XMLHttpRequest) // FIREFOX
		xhr_object = new XMLHttpRequest();
	else if(window.ActiveXObject) // IE
		xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
	else
		return(false);
	xhr_object.open("GET", fichier, false);
	xhr_object.send(null);
	if(xhr_object.readyState == 4) return(xhr_object.responseText);
	else return(false);
}