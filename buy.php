<script src="assets/dest/js/common.js"></script>
<script>
function save()
{
	var name=$("#name").val();
	var mobileno=$("#mobileno").val();
	var emailid=$("#emailid").val();
	var address=$("#address").val();
	
	var obj={};var arr=[];var tag=[];
	obj.status="";
	var obj1={};var arr1=[];var tag1=[];
	obj1.status="";
	 //alert('in validation');
	if(name == '')
	{
		obj.status="ERR";arr.push("Enter Name");tag.push("name");
	}
	if(mobileno == '')
	{
		obj.status="ERR";arr.push("Enter Mobile No.");tag.push("mobileno");
	}
	if(emailid == '')
	{
		obj.status="ERR";arr.push("Enter Email-Id");tag.push("emailid");
	}
	if(address == '')
	{
		obj.status="ERR";arr.push("Enter Address");tag.push("address");
	}
	if(obj.status=="ERR")
	{
	   obj.msg=arr;
	   obj.tag=tag;
	   validation(obj);
	   return false;
	}
	else
	{	
		bootbox.alert("Your order is been successfully placed!");
		$("#buyModal").modal('hide');
		$("#name").val('');
		$("#mobileno").val('');
		$("#emailid").val('');
		$("#address").val('');
	}
}
</script>
<div id="buyModal" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Customer Details</h4>
      </div>
      <div class="modal-body">
        <table class="table" align="center" id="Signin">
            <tr>
            	<td style="border:0px;" class="lbl compulsory">Name :</td>
                <td style="border:0px;"><input type="text" name="name" id="name" class="form-control"/></td>
            </tr>
            <tr>
            	<td style="border:0px;" class="lbl compulsory">Mobile no.:</td>
                <td style="border:0px;">
                <div class="input-group">
                  <span class="input-group-addon">+91</span>
                   <input type="text" name="mobileno" id="mobileno" class="form-control"/>
                </div>
                </td>
            </tr>
           
            <tr>
            	<td style="border:0px;" class="lbl compulsory">Email id:</td>
                <td style="border:0px;"><input type="text" name="emailid" id="emailid" class="form-control"/></td>
            </tr>
             <tr>
            	<td style="border:0px;" class="lbl">Address:</td>
                <td style="border:0px;"><textarea type="text" name="address" id="address" class="form-control"></textarea></td>
            </tr>
            
          <tr>
            	<td style="border:0px;" colspan="3" align="center"><input type="button" name="save" id="save" value="Save" class="btn btn-primary" onclick="save()"/></td>
            </tr>
        </table>
      </div>
     </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>	