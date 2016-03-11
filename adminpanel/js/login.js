function detectKey(e)
{
	var code = (e.keyCode ? e.keyCode : e.which);
	 if(code == 13) { //Enter keycode
		//alert('in 13');
	   chklogin();
	 }
}

function chklogin()
{
		var username=$("#username").val();
		var password=$("#cpassword").val();
		if(username == '')
		{
			$("#errMsg").attr("class","errStripe");
			$("#errMsg").html('Username not entered.');
			$("#username").focus();
			return false;
		}
		if(password == '')
		{
			$("#errMsg").attr("class","errStripe");
			$("#errMsg").html('Password not entered.');
			$("#cpassword").focus();
			return false;
		}
		
		var htmlStr='';
		htmlStr=htmlStr+'<div class="maincontainer" style="margin:0px auto;display:block;text-align:center;z-index:2500;position:fixed;">';
		htmlStr=htmlStr+'<div class="container" style="text-align:center;"><span id="loading">Loading...</span></div>';
		htmlStr=htmlStr+'</div>';
		//console.log('htmlStr:'+htmlStr);
		$("body").prepend(htmlStr);
		var strUrl=path+'index.php/clogin/login';
		$.ajax({
			url: strUrl,
			type: "post",
			data: 'username='+username+'&password='+password,
			// callback handler that will be called on success
			success: function(response, textStatus, jqXHR){
				$("#loading").css("display","none");
				//console.log("response:"+response);
					//response='('+response+')'; // opening and closing parenthesis are compulsory
					//val1=eval(response);
					eval("var val1="+response);
					//alert('after val');
					//alert('Message:'+val1.szMessage);
				
				if(val1.szMessage != 'Success')
				{
					$("#errMsg").attr("class","errStripe");
					$("#errMsg").html(val1.szMessage);
				}
				else if(val1.szMessage == 'Success')
				{
					$("#errMsg").attr("class","");
					$("#errMsg").html('&nbsp;');
					$("#username").val('');
					$("#cpassword").val('');
					//alert('val1.szMessage:'+val1.szMessage);
					window.location.href=path+'index.php/clogin/success';
				}
			},
			// callback handler that will be called on error
			error: function(jqXHR, textStatus, errorThrown){
			}
		});
		//return false;
}
