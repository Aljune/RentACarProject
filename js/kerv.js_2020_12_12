function handleHttpResponse()
{
	if (http.readyState == 4)
	{
		document.getElementById(div_id).innerHTML = http.responseText;
		loading = document.getElementById('loading');
		loading.innerHTML		= "";
		loading.style.height	= '0px';
	} else{
			loading = document.getElementById('loading');
			loading.innerHTML = "<div style='padding: 15%'><img src='images/loader.gif' style='height:80px;'><br><small style='color:#fff'>Please wait .... </small></div>" ;
			loading.style.height	= '100%';
			loading.style.valign	= 'middle';
	}
	
}

function getHTTPObject() 
{
	var xmlhttp;
	if (!xmlhttp && typeof XMLHttpRequest != 'undefined') 
	{
		try {xmlhttp = new XMLHttpRequest();} catch (e) {xmlhttp = false;}
	}	
	if(!xmlhttp && typeof ActiveXObject != "undefined")
	{
		 try
		 { 
		 	xmlhttp=new ActiveXObject("MSXML2.XMLHTTP"); 
		 }
		 catch(e)
		 {xmlhttp=false;}
		 if(!xmlhttp)
		 try{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); }catch(e){xmlhttp=false;}
	}
	
	return xmlhttp;
}

var http = getHTTPObject(); 

function clickMenu(v_id, file_name, value){	
		div_id = v_id;
		var url = file_name;
		http.open("GET", url, true);
		http.onreadystatechange = handleHttpResponse;
		http.send(null);
}
	
function SelectedTab(sender){
        var aElements = sender.parentNode.parentNode.getElementsByTagName("a");     
        var aElementsLength = aElements.length;      
        var index;     
        for (var i = 0; i < aElementsLength; i++)     
        {
            if (aElements[i] == sender) //this condition is never true         
            {
                index = i;
                aElements[i].id="onlink"
            } else {
                aElements[i].id=""
            }   
        } 
}	