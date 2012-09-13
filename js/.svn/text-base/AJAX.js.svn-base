
var objPool = [];
objPool[0] = createXMLHttpRequest();
objPool[1] = createXMLHttpRequest();
objPool[2] = createXMLHttpRequest();
objPool[3] = createXMLHttpRequest();
objPool[4] = createXMLHttpRequest();
objPool[5] = createXMLHttpRequest();


function createXMLHttpRequest(){
	var xmlh = null;
	if(window.ActiveXObject){
		xmlh = new ActiveXObject("Microsoft.XMLHttp");
	}else if(window.XMLHttpRequest){
		xmlh = new XMLHttpRequest();
	}
	return xmlh;
}

function AJAX_OBJ(url, callback){
	this.xmlHttp = null;
	this.url = url;
	this.callback = callback;
}

AJAX_OBJ.prototype.requestData = function(){
	this.xmlHttp = this.getInstance();
	var request_url = this.url;
	var self = this;
	this.xmlHttp.onreadystatechange = function(){
		self.stateChanged();
	};
	this.xmlHttp.open("GET", request_url, true);
	this.xmlHttp.send(null);
}

AJAX_OBJ.prototype.getInstance = function(){
	for (var i = 0; i < objPool.length; i ++)
	{
		if ( objPool[i].readyState == 4||objPool[i].readyState == 0)
		{
			return objPool[i];
		}
	}
	objPool[objPool.length] = createXMLHttpRequest();
	return objPool[objPool.length - 1];
}

AJAX_OBJ.prototype.stateChanged = function()
{
	if(this.xmlHttp.readyState == 4)
	{
		if(this.xmlHttp.status == 200)
		{
			var tempDataStr = this.xmlHttp.responseText;
			var tempData;
			eval("tempData = "+tempDataStr);
			this.callback(tempData);
		}
		else//error handling
		{
			//alert("error");
		}
	}
}