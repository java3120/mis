function AJAX_OBJ(url, callback)
{
	this.xmlHttp = null;
    this.url = url;
    this.callback = callback;
}

AJAX_OBJ.prototype.requestData = function()
{
	this.xmlHttp = this.createXMLHttpRequest();
	var requestUrl = this.url;
	//var self = this;
	this.xmlHttp.onreadystatechange = this.stateChanged();
	//function()
	//{
	    //self.stateChanged();
	//}
	this.xmlHttp.open("GET", requestUrl, true);
	this.xmlHttp.send(null);
}

AJAX_OBJ.prototype.createXMLHttpRequest = function()
{
	var xmlHttpRequest = null;
	
	if (window.ActiveXObject)
	{
		xmlHttpRequest = new ActiveXObject("Microsoft.XMLHttp");
	}
	else if (window.XMLHttpRequest)
	{
	    xmlHttpRequest = new XMLHttpRequest();
	}
	
	return xmlHttpRequest;
}

AJAX_OBJ.prototype.stateChanged = function()
{
    if (this.xmlHttp.readyState == 4)
    {
        if (this.xmlHttp.status == 200)
        {
            var tempDataStr = this.xmlHttp.responseText;
            var tempData;
            eval(tempDataStr);
            this.callback(tempData);
        }
    }
}