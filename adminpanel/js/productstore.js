function ifIn_ArrayRemove(arrObj,rvalue)
{
	//var c=0,newArrObj = [];
	for(var i=0;i<arrObj.length;i++)
	{
		if(arrObj[i] == rvalue){
			arrObj.splice(i,1);break;
			//newArrObj[c] = arrObj[i];c++;
		}
	}
	return arrObj;//newArrObj
}

var product=
{
	saveProduct:function(oper,id)
	{
		var pname=$("#pname").val();
		var category=$("#category").val();
		var occasion1=eval($("#occasion").val());
		var size1=eval($("#size").val());
		var color=$("#color").val();
		var height1=eval($("#height").val());
		var complx1=eval($("#complx").val());
		var price=$("#price").val();
		var desgame=$("#desgame").val();
		var descp=$("#descp").val();
		var profile=$("#profile").val();
		var dnumber=$("#dnumber").val();
		var gender='';
		if($("#male").is(':checked'))
		{
			gender=$("#male").val();
		}
		else
		{
			gender=$("#female").val();
		}
		
		 //alert(profile);
		//console.log(occasion);
		if(occasion1 != null)
		 	occasion1 = ifIn_ArrayRemove(occasion1,"multiselect-all"); 
		if(size1 != null)
		 	size1 = ifIn_ArrayRemove(size1,"multiselect-all"); 
		if(height1 != null)
		 	height1 = ifIn_ArrayRemove(height1,"multiselect-all");
		if(complx1 != null)
		 	complx1 = ifIn_ArrayRemove(complx1,"multiselect-all"); 
		 
		var filehtml=$('.fileinput-preview').html();
		if(oper=='Save')
		{
			if(profile=='')
			{
				bootbox.alert('Please select Photo');
				return false;	
			}
		}
		
		//console.log(occasion);return;
		var productstore=
		{
			'pname':pname,
			'pimgname':profile,
			'pcolor':color,
			'pprice':price,
			'pdescription':descp,
			'pcategory':category,
			'pdesigner':desgame,
			'dnumber':dnumber,
			'gender':gender,
		}
		var occasion='';var size='';var height='';var complx='';
		occasion={'oname':occasion1,}
		size={'sname':size1,}
		height={'hname':height1,}
		complx={'complexionname':complx1,}
		//console.log(size);
		//console.log(occasion);
		var strUrl=pbaseurl+'index.php/cproduct/saveProductstore';
		$.ajax({
			url:strUrl,
			type:"POST",
			data:{productstore:productstore,occasion:occasion,size:size,height:height,complx:complx},
			dataType:"json",
			success: function(response, textStatus, jqXHR)
			{
					bootbox.alert(response.msg,function()
					{
						$("#productid").val(response.id);
						$("form[name='frmproduct']").attr("action",pbaseurl+"index.php/cproduct/uploadimg");
						$("#submit").click();
					});
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				console.log("The following error occured: "+textStatus, errorThrown);
			}
		});
	},
	
	editIncredible:function(id)
	{
		window.location.href=pbaseurl+'index.php/cincredible/getIncredible?id='+id;
	},
	
	deleteProduct:function(id)
	{
		bootbox.confirm('Are you sure you want delete?', function(result) 
		{
			if(result)
			{
				var strUrl=pbaseurl+'index.php/cproduct/deleteProduct';
				$.ajax
				({
					url :strUrl,
					type :"POST",
					data: {id:id},
					dataType : 'json',
					success: function(response, textStatus, jqXHR)
					{
						bootbox.alert(response.msg,function(){
							window.location.href=pbaseurl+'index.php/cproduct/lookupProduct';
						});	
					},
					// callback handler that will be called on error
					error: function(jqXHR, textStatus, errorThrown)
					{
						console.log("The following error occured: "+textStatus, errorThrown);
					}
				});
			}
		});
	}
}