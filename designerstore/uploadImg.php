<?php
include('header.php');
/*if(!isset($_SESSION['ctype']))
{
	header('location:logout.php');
	die();	
}*/
?>
<link href="css/jasny-bootstrap.css" rel="stylesheet" media="screen">
<script src="js/jasny-bootstrap.js"></script>
<?php 
    $signinval='mywing';
?>
<script type="text/javascript" src="js/common.js"></script>
<script src="js/bootbox.min.js"></script>

<style type="text/css">
    body{
        padding:0px;
        margin:0px;	
    }
    .table{
        width:60%;
    }
    .btn-default {
        background-color: #FFFFFF;
        border: 1px solid #CCCCCC;
        color: #333333;
        border-radius: 4px;
        cursor: pointer;
        display: inline-block;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.42857;
        margin-bottom: 0;
        padding: 6px 12px;
        text-align: center;
        vertical-align: middle;
        white-space: nowrap;
    }
	
/*date picker override*/
.ui-widget-content {
    border: 1px solid #aaaaaa;
    color: #7e7c7c;
}

.ui-datepicker-calendar
{
	background-color:#F0F0F0;	
}

</style>
<script type="text/javascript">
	$(document).ready(function(e) {
		if($("#post_date").length > 0){ $("#post_date").datepicker({ changeMonth: true,changeYear: true }); }
	});		

	function showdatepicker(refid)
	{
		$("#"+refid).focus();	
	}

	function save_photo()
	{
		var imgname=$("div .fileinput-preview").find("img").attr('src');
		//console.log(imgname);
		var caption=$("#caption").val();
		var shared_by=$("#shared_by").val();
		var img_name=$("#img_name").val();
		var inc_photo=$("#inc_photo").val();
		var mtype=$("#mtype").val();
		var to_name=($("#to").val())==''?'':$("#to").val();
		var post_date=$("#post_date").val();
		
		if(mtype != 'Bday')
		{
			if(inc_photo == '')
			{
				bootbox.alert('Please upload the image');
				return;
			}
		}
		
		if(mtype == 'Bday')
		{
			if(caption=='')
			{
				bootbox.alert('Enter Caption');
				return false;
			}
			if(shared_by=='')
			{
				bootbox.alert('Enter From');
				return false;
			}
			if(to_name=='')
			{
				bootbox.alert('Enter To');
				return false;
			}
			if(post_date=='')
			{
				bootbox.alert('Enter Post date');
				return false;
			}
		}	
	
		if(mtype=='Incredible' || mtype=='Unseen')
		{
			if(caption=='')
			{
				bootbox.alert('Enter Caption');
				return false;
			}
			
			if(shared_by=='')
			{
				bootbox.alert('Enter shared by');
				return false;
			}
		}
		
	   var dialog = bootbox.dialog({
			message: ProcessingDialog,
			show: true,
			backdrop: true,
			closeButton: false,
			animate: true,
			className: "my-modal",
		});
		
		$("#save_photo").attr('disabled',true);
		var dataVal={'img_name':img_name,'caption':caption,'shared_by':shared_by,'inc_photo':inc_photo,'mtype':mtype,'to_name':to_name,'post_date':post_date}
		var strUrl='saveuploadImg.php';
		$.ajax({
			url: strUrl,
			type: "post",
			data:{dataVal:dataVal,oper:'Save'},
			dataType:"json",
			success: function(response,textStatus,jqHRX)
			{
				dialog.modal('hide');
				if(response == '-1')
				{
					bootbox.alert('Failed to upload image');
					//location.reload();
				}
				else if(response == '-2')
				{
					bootbox.alert('Invalid image type');
					//location.reload();
				}
				else
				{
					//$("#save_photo").attr('disabled',false);
					//if(imgname!='mywing/mywingmain/default.jpg')
					//{
						$("#img_id").val(response);
						$("#submit").click();
					//}
					bootbox.alert('Image uploaded successfully');
					//location.reload();
				}				
			},
			error: function(jqXHR, textStatus, errorThrown){ console.log("The following error occured: "+textStatus, errorThrown); }	
		});
	 }
	 function removeImg()
	 {
		 $("inc_photo").val('');
	 }
		
</script>
</head>
   	<body class="body-new" oncontextmenu="return false;"><!---  dark red : 710908 ;light red :b31307-->
		<?php //include("includelogo-new.php"); ?>
        <?php include("includemenu.php"); ?>
		<div class="displaydata">
			<div class="panel panel-default " style="border-collapse:0px solid red;">
				<div class="panel-body">
				
    <div class="" style="border:1px solid #ccc;">           
    <table class="table" align="center">
    <tr align="center"><td>
    	<form name="incredibleimg" action="uploadimg_server.php" method="post" enctype="multipart/form-data" style="margin-bottom:0px;">
			<?php
				$class='fileinput-new';$img="<img src='mywing/mywingmain/default.jpg'/>";$display_txt='display:none';
			?>
            <input type="hidden" id="img_id" name="img_id"/> 
            <input type="hidden" id="mtype" name="mtype" value="<?php echo $type; ?>"/> 
			<div class="fileinput <?php echo $class; ?>" data-provides="fileinput" style="align:center;">
				  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width:273px;height:190px;" tabindex="16">
					  <?php echo $img; ?>
				  </div>
				  <div>
					<span class="btn btn-default btn-file" tabindex="17"><span class="fileinput-new">Select image</span>
					<span class="fileinput-exists" tabindex="18">Change</span><input type="file" name="inc_photo" id="inc_photo"></span>
					<a href="javascript:void(0);" onClick="removeImg();" class="btn btn-default fileinput-exists" data-dismiss="fileinput" tabindex="19">Remove</a>
				  </div>
				  <input type="submit" name="submit" id="submit" value="" style="display:none;"/>
			</div>
         </form>
         </td></tr>
       </table>   
        <table class="table" align="center">
       	  
        	<tr>
            	<td class="lbl compulsory"> Occasion :</td>
                <td><input type="text" id="occasion" name="occasion" class="form-control"></textarea></td>
            </tr>
            <tr>
            	<td class="lbl compulsory"> Size </td>
                <td><input type="text" id="size" name="size" class="form-control"/></td>
            </tr>
           
            <tr style="" >
                <td class="lbl compulsory"> Color :</td>
                <td><input type="text" id="color" name="color" class="form-control"/></td>
            </tr>
            <tr style="" >
                <td class="lbl compulsory"> Complexion :</td>
                <td> 
                    <select class='form-control' id='post_date' name='post_date' value="" tabindex="7" />
                        <option value="-1"> Select </option>
                        <option value="fair"> Fair </option>
                        <option value="wheatish"> Wheatish </option>
                        <option value="dark"> Dark </option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td> Price</td>
                <td><input type="text" id="price" name="price" class="form-control"/></td>
            </tr>
            <tr>
            	<td> Designer Name</td>
                <td><input type="text" id="dname" name="dname" class="form-control"/></td>
            </tr>			 
            <tr>
            	<td>&nbsp;</td>
                <td><input type="button" name="save_photo" id="save_photo" value="Post" class="btn btn-primary" onClick="save_photo();"/></td>
            </tr>
        </table>
        </div>
     </div>
   </div>
  </div> 
<?php include('footer.php'); ?>