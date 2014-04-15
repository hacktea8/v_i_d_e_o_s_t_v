//-------------------------------------------------------
function checkAll(bool,tagname,name)
{
	var checkboxArray;checkboxArray=getElementsByName(tagname,name)
	for (var i=0;i<checkboxArray.length;i++){checkboxArray[i].checked = bool;}
}

function checkOthers(tagname,name)
{
	var checkboxArray;checkboxArray=getElementsByName(tagname,name)
	for (var i=0;i<checkboxArray.length;i++){
		if (checkboxArray[i].checked == false){
			checkboxArray[i].checked = true;
		}else if (checkboxArray[i].checked == true){
			checkboxArray[i].checked = false;
		}
	}
}

function textareasize(obj){
	if(obj.scrollHeight > 70){
		obj.style.height = obj.scrollHeight + 'px';
	}
}

function set(obj,value){
	obj.innerHTML = value
}

function view(id){
	$(id).style.display='inline'	
}

function hide(id){
	$(id).style.display='none'		
}

function getScroll(){var t;if(document.documentElement&&document.documentElement.scrollTop){t=document.documentElement.scrollTop;}else if(document.body){t=document.body.scrollTop;}return(t);} 


function HtmlEncode(str)
{   
	 var s = "";
	 if(str.length == 0) return "";
	 s    =    str.replace(/&/g,"&amp;");
	 s    =    s.replace(/</g,"&lt;");
	 s    =    s.replace(/>/g,"&gt;");
	 s    =    s.replace(/ /g,"&nbsp;");
	 s    =    s.replace(/\'/g,"&#39;");
	 s    =    s.replace(/\"/g,"&quot;"); 
	 return   s;   
}  

function getElementsByName(tag,name){
    var rtArr=new Array();
    var el=document.getElementsByTagName(tag);
    for(var i=0;i<el.length;i++){
        if(el[i].name==name)
              rtArr.push(el[i]);
    }
    return rtArr;
}

function closeWin(){
	document.body.removeChild($("bg")); 
	document.body.removeChild($("msg"));
	if($("searchtype"))$("searchtype").style.display="";
}

function openWindow(zindex,width,height,alpha){
	var iWidth = document.documentElement.scrollWidth; 
	var iHeight = document.documentElement.clientHeight; 
	var bgDiv = document.createElement("div");
	bgDiv.id="bg";
	bgDiv.style.cssText = "top:0;width:"+iWidth+"px;height:"+document.documentElement.scrollHeight+"px;filter:Alpha(Opacity="+alpha+");opacity:0.3;z-index:"+zindex+";";
	document.body.appendChild(bgDiv); 
	var msgDiv=document.createElement("div");
	msgDiv.id="msg";
	msgDiv.style.cssText ="z-index:"+(zindex+1)+";width:"+width+"px; height:"+(parseInt(height)-0+29+16)+"px;left:"+((iWidth-width-2)/2)+"px;top:"+(getScroll()+(height=="auto"?150:(iHeight>(parseInt(height)+29+2+16+30)?(iHeight-height-2-29-16-30)/2:0)))+"px";
	msgDiv.innerHTML="<div class='msgtitle'><div id='msgtitle'></div><img onclick='closeWin()' src='/"+sitePath+"pic/btn_close.gif' /></div><div id='msgbody' style='height:"+height+"px'></div>";
	document.body.appendChild(msgDiv);
}

function openWindow2(zindex,width,height,alpha){
	var iWidth = document.documentElement.scrollWidth; 
	var bgDiv = document.createElement("div");
	bgDiv.id="bg";
	bgDiv.style.cssText = "top:0;width:"+iWidth+"px;height:"+document.documentElement.scrollHeight+"px;filter:Alpha(Opacity="+alpha+");opacity:0.3;z-index:"+zindex+";";
	document.body.appendChild(bgDiv); 
	var msgDiv=document.createElement("div");
	msgDiv.id="msg";
	msgDiv.style.cssText ="position: absolute;z-index:"+(zindex+1)+";width:"+width+"px; height:"+(height=="auto"?height:(height+"px"))+";";
	document.body.appendChild(msgDiv);	
}

function selectTogg(){
	var selects=document.getElementsByTagName("select");
	for(var i=0;i<selects.length;i++){
		selects[i].style.display=(selects[i].style.display=="none"?"":"none");
	}
}
function checkInput(str,type){
	switch(type){
		case "mail":
			if(!/^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/gi.test(str)){alert('邮箱填写错误');return false;}
			break;
		case "num" :
			if(isNaN(str)){alert('QQ填写错误');return false;}
			break;
	}
	return true;
}

function copyToClipboard(txt) {    
	if(window.clipboardData){    
		window.clipboardData.clearData();    
		window.clipboardData.setData("Text", txt);
		alert('复制成功！')
	}else{
		alert('请手动复制！')	
	}   
}
function   getUrlArgs()   
  {   
     return  location.pathname;
  }
//
