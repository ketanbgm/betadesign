var group_number=0;
var loading  = false;

jQuery(document).ready(function($) {
	loadData();
	//$(document).scroll(function() { //detect page scroll
		if(detectscrollbottom())  //user scrolled to bottom of the page?
		{
			if(group_number < total_groups && loading==false)
			{
				console.log('hi');
				loadData();	
			}
		}
});

function loadData(size,complexion)
{
	//console.log('hi');
	var price=$('span #price-filter-amount').html();//alert(price);
	//alert(size);
	//var size='';
	//$(".beta-tags").val();
		//var id=$(this).attr("id");
	
	var designer='';
	$(".designer").each(function(index, element) {
		var id=$(this).attr("id");
		//var designername=$(this).attr("id");
		var dname='';
		if($("#"+id).is(':checked'))
		{
			dname=$("#"+id).val();
			if(designer=='')
		       designer=dname;
			else 
			   designer=designer+"','"+dname;  
		}
	});
	//console.log(designer);
	
	var occasion='';
	$("ul .occasion").each(function(index, element) {
		var id=$(this).attr("id");
		if($("#"+id).is(':checked'))
		{
			if(occasion=='')
		       occasion=id;
			else 
			   occasion=occasion+"','"+id;  
		}
	});
	//console.log(occasion);
	/*var scolor='';
	$("ul .scolor").each(function(index, element) {
		var id=$(this).attr("id");
		if($("#"+id).is(':checked'))
		{
			if(scolor=='')
		       scolor=id;
			else 
			   scolor=scolor+"','"+id;  
		}
	});*/
	//console.log(scolor);
	
	var sheight='';
	$("ul .sheight").each(function(index, element) {
		var id=$(this).attr("id");
		if($("#"+id).is(':checked'))
		{
			if(sheight=='')
		       sheight=id;
			else 
			   sheight=sheight+"','"+id;  
		}
	});
	
	var category=$("#category option:selected").val();
	var gender=$("#gender option:selected").val();
	
	$("#divloadingimg").css('display','');
	//$("#divloadingimg").html('<img src="images/ajax-loader.gif"/>');
	loading = true;
	var strUrl="dbQueries.php";
	$.ajax({
		url: strUrl,
		type: "post",
		data: 'group_number='+group_number+'&designer='+designer+'&category='+category+'&occasion='+occasion+'&sheight='+sheight+'&price='+price+'&size='+size+'&complexion='+complexion+'&gender='+gender,
		dataType:"html",
		success: function(response, textStatus, jqXHR){
				$('#displayData').html('');
				$("#divloadingimg").css('display','none');
				$('#displayData').append(response);
				//console.log(group_number);
				group_number++;
				loading=false;
			
		},
		error: function(jqXHR, textStatus, errorThrown){
			loading=false;
		}
	});
}

var ProcessingDialog="<div align='center'><img src='images/ajax-loader.gif' alt='Processing...'/></div><br/><div align='center' style='font-family:Helvetica,Arial,sans-serif;font-size:15px;color:#333;'>Please Wait<br/></div>";

function IsNumeric(input)
{
    return (input - 0) == input && (input+'').replace(/^\s+|\s+$/g, "").length > 0;
}

function IsEmail(email) 
{
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
           return false;
        }else{
           return true;
        }
}
function detectscrollbottom()
{

	if($(window).scrollTop() + $(window).height() >= ($(document).height()-100))  //user scrolled to bottom of the page?
	{
		return true;
	}
	return false;
}
function validation(res,validate)
{
	var showmsg='';var i=0; var val='';
	
		$('.form-control').each(function()
		{
			$('.form-control').css('border','1px solid #ccc');
			$('.form-control').attr('placeholder','');
			$(".multiselect").css('border','1px solid #ccc');
		});
	
		$.each(res.tag, function(key, val) 
		{
			if(res.tag[key] != 'show')
			{
				if(res.status == "ERR")
				{
					
					if($('#'+res.tag[key]).next(".btn-group").length > 0)
					{
						$('#'+res.tag[key]).siblings(".btn-group").children(".multiselect").css('border','1px solid red');
						//$('#'+res.tag[key]).tooltip({'trigger':'focus', 'title':res.msg[key]}).addClass("error");
						//$('#'+res.tag[key]).tooltip('show');
					}
					else
					{
						if($('#'+res.tag[key]).is("input[type='checkbox']") || $('#'+res.tag[key]).is("input[type='radio']"))
						{
							$('#'+res.tag[key]).css('outline','1px solid red');
						}
						else
						{
							$('#'+res.tag[key]).css('border','1px solid red');
							$('#'+res.tag[key]).attr('placeholder',res.msg[key]);	
						}
					}
					
					if($("div#errpanel").length > 0)
						$("div#errpanel").remove();
					
					if(typeof(validate)=='undefined')
					{
						var errStr="<div id='errpanel' class='alert alert-danger' style='text-align:center;margin-top:10px;'>Warning! Form incomplete, please fill all compulsory details.</div>";
						$(".panel-body").append(errStr);
					}
					else
					{
						var errStr="<div id='errpanel' class='alert alert-danger' style='text-align:center;margin-top:10px;'>Warning! Entered value(s) should be Numeric.</div>";
						$(".panel-body").append(errStr);
					}
				}
				return;
			}
			else
			{
				var classname="";
				if(res.status == "ERR")
					classname="alert alert-danger";
				else if(res.status == "ERR")
					classname="alert alert-success";
				
				//var msg = "<div style='border:1px solid #EBCCD1;padding:8px 5px;border-radius:5px'><div style='background-color:transparent;border:none;color:red;font-weight:bold;font-size:1em'><img src='"+pbaseurl+"images/error.jpg' style='padding-right:10px;'/>Problem encountered.</div>";
				//msg = msg + "<p style='color:#000;font-size:0.88em;margin-top:10px;padding-left:5px;'>"+res.msg[0]+"</p></div>";
				bootbox.alert(errorIconStart+res.msg[0]+errorIconEnd);
			}
		});
}

function register()
{
	var name=$("#fname").val();
	var mobileno=$("#mobileno").val();
	var phoneno=$("#phoneno").val();
	var emailid=$("#emailid").val();
	var address=$("#address").val();
	var npassword=$("#npassword").val();
	var cnfrmpassword=$("#cnfrmpassword").val();
	
	if(name=='')
	{
	  bootbox.alert("Enter Name");
	  return false;
	}
	
	if(mobileno == '' || (mobileno != '' && IsNumeric(mobileno)==false))
	{
	   bootbox.alert("Enter Mobile no.");
	  return false;
	}
	else if(mobileno.length!=10)
	{
		bootbox.alert("Mobile number must be of 10 digits.");
		$("#mobileno").focus();
		return false;
	}
	
	if(emailid == '' || IsEmail(emailid)==false)
	{
	   bootbox.alert("Enter valid Email id");
	  return false;
	}

	if(npassword == '')
	{
	   bootbox.alert("Enter Password");
	  return false;
	}

	if(cnfrmpassword=='')
	{
	   bootbox.alert("Enter Confirm Password");
	   return false;
	}

	if(npassword != cnfrmpassword)
	{
	   bootbox.alert("Password and Confirm Password doesnt match");
	   return false;
	}

	var data={
		'cname':name,
		'cmobile_no':mobileno,
		'cphone_no':phoneno,
		'cemail':emailid,
		'caddress':address,
		'cpassword':npassword,
		'cusername':emailid,
	}
	//console.log(data);
   var dialog = bootbox.dialog({
		message: ProcessingDialog,
		show: true,
		backdrop: true,
		closeButton: false,
		animate: true,
		className: "my-modal",
	});
	
	$("#signin").attr('disabled',true);
	var strUrl='saveRegister.php';
	$.ajax({
		url: strUrl,
		type: "post",
		data: {func:'saveregister',data:data},
		dataType:"json",
		success: function(response, textStatus, jqXHR){
			
			var htmlDiv='';
			dialog.modal('hide');
			//console.log(response.status);
			if(response.status=='OK')
			{
				bootbox.alert(response.msg);
				window.location.href='index.php';
				//var arrdata=response['usermail'].split("---");
				//$("#usermail").val(arrdata[0]);
				//$("#userid").val(arrdata[1]);
				$("#RegisterModal").modal('hide');	
			}
			else
			{
				bootbox.alert(response['msg']);
			}
			
		},
		error: function(jqXHR, textStatus, errorThrown){
		}
	});
}

function proceed()
{
	var verification_code=$("#verification_code").val();
	var usermail=$("#usermail").val();
	var userid=$("#userid").val();
	var data={
		'cverificationcode':verification_code,
		'cusername':usermail,
		'userid':userid,
	}
	var strUrl='saveRegister.php';
	$.ajax({
		url: strUrl,
		type: "post",
		data: {func:'verify',data:data},
		dataType:"json",
		success: function(response, textStatus, jqXHR){
			console.log(response);
				if(response['status']=='OK')
				{
					bootbox.alert(response['msg']);
					$('#VerificationModal').modal("hide");
					$('#RegisterModal').modal("hide");
				}
				else
				{
					bootbox.alert(response['msg']);
				}
		},
		error: function(jqXHR, textStatus, errorThrown){
		}
	});
}//end of proceed()

function resend()
{
	var usermail=$("#usermail").val();//proceed
	$("#proceed").attr('disabled',true);
	$("#resend").attr('disabled',true);
	var strUrl='saveRegister.php';
   var dialog = bootbox.dialog({
		message: ProcessingDialog,
		show: true,
		backdrop: true,
		closeButton: false,
		animate: true,
		className: "my-modal",
	});
	$.ajax({
		url: strUrl,
		type: "post",
		data: {func:'resend',data:usermail},
		dataType:"json",
		success: function(response, textStatus, jqXHR){
			dialog.modal('hide');
			var htmlDiv='';
			
			//console.log(response);
			if(response['status']=='OK')
			{
				bootbox.alert(response['msg']);	
				$("#proceed").attr('disabled',false);
				$("#resend").attr('disabled',false);
			}
			else
			{
				bootbox.alert(response['msg']);
			}
		},
		error: function(jqXHR, textStatus, errorThrown){
		}
	});
}//end of resend()

function detectKey(e,sessval)
{
	var code = (e.keyCode ? e.keyCode : e.which);
	 if(code == 13) { //Enter keycode
		signin(sessval);
	 }
}

function signin(sessval)
{
	var username=$("#username").val();
	var npassword=$("#cpassword").val();

	var contactid='';
	if(sessval=='entrepreneur')
		contactid=$("#contactid").val();
	
	if(username == '' || IsEmail(username)==false)
	{
	   bootbox.alert("Invalid Email id");
	  return false;
	}

	if(npassword == '')
	{
	  bootbox.alert("Enter Password");
	  return false;
	}

	var data={
		'username':username,
		'npassword':npassword,
	}
	//console.log(data);
   var dialog = bootbox.dialog({
		message: ProcessingDialog,
		show: true,
		backdrop: true,
		closeButton: false,
		animate: true,
		className: "my-modal",
	});
	
	$("#signin").attr('disabled',true);
	var strUrl='saveRegister.php';
	$.ajax({
		url: strUrl,
		type: "post",
		data: {func:'signin',data:data,sessval:sessval,contactid:contactid},
		dataType:"json",
		success: function(response, textStatus, jqXHR){
			dialog.modal('hide');
			var htmlDiv='';
			//console.log(response);
			if(response['status']=='OK')
			{
				window.location.href='loginsuccess.php';
			}
			else
			{
				bootbox.alert(response['msg']);
			}
		},
		error: function(jqXHR, textStatus, errorThrown){
		}
	});
}//end of signin()

function contact(userid)
{
	$("#contactid").val(userid);
	$("#ContactModal").modal('show');
}//end of contact()

function updateUser(id)
{
	var name=$("#name").val();
	var mobileno=$("#mobileno").val();
	var phoneno=$("#phoneno").val();
	var address=$("#address").val();

	if(mobileno != '' && (mobileno == '' || IsNumeric(mobileno)==false))
	{
	  alert("Enter Mobile no.");
	  return false;
	}

	if(name == '' )
	{
	  alert("Enter Email id");
	  return false;
	}

	var data={
		'cname':name,
		'cmobile_no':mobileno,
		'cphone_no':phoneno,
		'caddress':address,
	}
	//console.log(data);
   var dialog = bootbox.dialog({
		message: ProcessingDialog,
		show: true,
		backdrop: true,
		closeButton: false,
		animate: true,
		className: "my-modal",
	});
	
	$("#signin").attr('disabled',true);
	var strUrl='saveRegister.php';
	$.ajax({
		url: strUrl,
		type: "post",
		data: {func:'updateUser',data:data,id:id},
		dataType:"json",
		success: function(response, textStatus, jqXHR){
			dialog.modal('hide');
			console.log(response);
			if(response['status']=='OK')
			{
				bootbox.alert(response['msg']);
				window.location.href='loginsuccess.php';
			}
			else
			{
				bootbox.alert(response['msg']);
			}
		},
		error: function(jqXHR, textStatus, errorThrown){
		}
	});
}//end of updateUser(id)

function saveDescription(id)
{
	var description=$("#description").val();
	if(description == '' )
	{
	  alert("Enter Description");
	  return false;
	}
	//console.log(data);
   var dialog = bootbox.dialog({
		message: ProcessingDialog,
		show: true,
		backdrop: true,
		closeButton: false,
		animate: true,
		className: "my-modal",
	});
	
	$("#save").attr('disabled',true);
	var strUrl='saveRegister.php';
	$.ajax({
		url: strUrl,
		type: "post",
		data: {func:'saveDescription',description:description,id:id},
		dataType:"json",
		success: function(response, textStatus, jqXHR){
			dialog.modal('hide');
			console.log(response);
			if(response['status']=='OK')
			{
				bootbox.alert(response['msg']);
				window.location.href='loginsuccess.php';
			}
			else
			{
				bootbox.alert(response['msg']);
			}
		},
		error: function(jqXHR, textStatus, errorThrown){
		}
	});
}

function savePassword(id)
{
	var oldpassword=$("#oldpassword").val();
	var newpassword=$("#newpassword").val();
	var cnfrmpassword=$("#cnfrmpassword").val();

	if(oldpassword == '' )
	{
	  alert("Enter Old password");
	  return false;
	}
	
	if(newpassword == '' )
	{
	  alert("Enter New password");
	  return false;
	}
	
	if(cnfrmpassword == '' )
	{
	  alert("Enter Old Confirm password");
	  return false;
	}
	
	if(newpassword != cnfrmpassword)
	{
	  alert("New Password and Confirm Password doesnt match");
	  return false;
	}
	var data={
		'oldpassword':oldpassword,
		'newpassword':newpassword,
		'cnfrmpassword':cnfrmpassword	
	}
	//console.log(data);
   var dialog = bootbox.dialog({
		message: ProcessingDialog,
		show: true,
		backdrop: true,
		closeButton: false,
		animate: true,
		className: "my-modal",
	});
	
	$("#save").attr('disabled',true);
	var strUrl='saveRegister.php';
	$.ajax({
		url: strUrl,
		type: "post",
		data: {func:'savePassword',data:data,id:id},
		dataType:"json",
		success: function(response, textStatus, jqXHR){
			dialog.modal('hide');
			//console.log(response);
			$("#save").attr('disabled',false);
			if(response['status']=='OK')
			{
				bootbox.alert(response['msg']);
				window.location.href='loginsuccess.php';
			}
			else
			{
				bootbox.alert(response['msg']);
			}
		},
		error: function(jqXHR, textStatus, errorThrown){
		}
	});
}//end of savePassword()

function sendMail(contactid)
{
	var subject=$("#subject").val();
	var bodycontent=$("#bodycontent").val();
	
	if(subject=='')
	{
		alert('Subject cannot be blank');
	    return false;
	}
	
	if(bodycontent=='')
	{
		alert('Body content cannot be blank');
		  return false;
	}
	var data={
		'contactid':contactid,
		'subject':subject,
		'bodycontent':bodycontent	
	}
	//console.log(data);
   var dialog = bootbox.dialog({
		message: ProcessingDialog,
		show: true,
		backdrop: true,
		closeButton: false,
		animate: true,
		className: "my-modal",
	});
	
	$("#sendmail").attr('disabled',true);
	var strUrl='saveRegister.php';
	$.ajax({
		url: strUrl,
		type: "post",
		data: {func:'sendMail',data:data},
		dataType:"json",
		success: function(response, textStatus, jqXHR){
			dialog.modal('hide');
			//console.log(response);
			$("#sendmail").attr('disabled',false);
			if(response['status']=='OK')
			{
				bootbox.alert(response['msg']);
				window.location.href='loginsuccess.php';
			}
			else
			{
				bootbox.alert(response['msg']);
			}
		},
		error: function(jqXHR, textStatus, errorThrown){
		}
	});
}//end of sendMail()

/* BACK TO TOP BUTTON */

jQuery(document).ready(function() {
    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });
    
    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    });
});

function getProduct(id)
{
	window.location.href = 'product.php?id='+id;	
}

function validation(res,validate)
{
	var showmsg='';var i=0; var val='';
	
		$('.form-control').each(function()
		{
			$('.form-control').css('border','1px solid #ccc');
			$('.form-control').attr('placeholder','');
			$(".multiselect").css('border','1px solid #ccc');
		});
	
		$.each(res.tag, function(key, val) 
		{
			if(res.tag[key] != 'show')
			{
				if(res.status == "ERR")
				{
					
					if($('#'+res.tag[key]).next(".btn-group").length > 0)
					{
						$('#'+res.tag[key]).siblings(".btn-group").children(".multiselect").css('border','1px solid red');
						//$('#'+res.tag[key]).tooltip({'trigger':'focus', 'title':res.msg[key]}).addClass("error");
						//$('#'+res.tag[key]).tooltip('show');
					}
					else
					{
						if($('#'+res.tag[key]).is("input[type='checkbox']") || $('#'+res.tag[key]).is("input[type='radio']"))
						{
							$('#'+res.tag[key]).css('outline','1px solid red');
						}
						else
						{
							$('#'+res.tag[key]).css('border','1px solid red');
							$('#'+res.tag[key]).attr('placeholder',res.msg[key]);	
						}
					}
					
					if($("div#errpanel").length > 0)
						$("div#errpanel").remove();
					
					if(typeof(validate)=='undefined')
					{
						var errStr="<div id='errpanel' class='alert alert-danger' style='text-align:center;margin-top:10px;'>Warning! Form incomplete, please fill all compulsory details.</div>";
						$(".panel-body").append(errStr);
					}
					else
					{
						var errStr="<div id='errpanel' class='alert alert-danger' style='text-align:center;margin-top:10px;'>Warning! Entered value(s) should be Numeric.</div>";
						$(".panel-body").append(errStr);
					}
				}
				return;
			}
			else
			{
				var classname="";
				if(res.status == "ERR")
					classname="alert alert-danger";
				else if(res.status == "ERR")
					classname="alert alert-success";
				
				//var msg = "<div style='border:1px solid #EBCCD1;padding:8px 5px;border-radius:5px'><div style='background-color:transparent;border:none;color:red;font-weight:bold;font-size:1em'><img src='"+pbaseurl+"images/error.jpg' style='padding-right:10px;'/>Problem encountered.</div>";
				//msg = msg + "<p style='color:#000;font-size:0.88em;margin-top:10px;padding-left:5px;'>"+res.msg[0]+"</p></div>";
				bootbox.alert(errorIconStart+res.msg[0]+errorIconEnd);
			}
		});
}