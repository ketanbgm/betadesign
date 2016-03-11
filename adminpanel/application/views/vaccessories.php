<?php 
include('headerScripts.php');
	$cphoto='';
	$oper='Save';
	$btnVal='Save';
	//$iimg='';
	$caption='';
	$csharedby='';
	$is_approved='';
	//$id=0;
	$btnfunctn="accessories.saveAccessories('".$oper."',0)";
	/*if(isset($dataIncredible))
	{
		$id=$dataIncredible[0]['id'];
		$cphoto=$dataIncredible[0]['iimg'];
		$caption=$dataIncredible[0]['caption'];
		$csharedby=$dataIncredible[0]['csharedby'];
		$is_approved=$dataIncredible[0]['is_approved'];
		$oper='Update';
		$btnVal='Update';
		$btnfunctn="incredible.saveIncredible('".$oper."',".$id.")";
		
		if($is_approved=='1')
		{
			$is_approved="checked";
		}
	}*/
?>
<script type="text/javascript" src="<?php echo $base; ?>js/accessories.js"></script>
<link href="<?php echo $base; ?>css/jasny-bootstrap.css" rel="stylesheet" media="screen">
<script src="<?php echo $base; ?>js/jasny-bootstrap.js"></script>
<script>
function clearimg()
{
	$("#imgprofile").val('');	
}
</script>
<style>
.multiselect-container input {
    display: block;
}
.radio input[type="radio"], .radio-inline input[type="radio"], .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"] {
    /*margin-left:0px;*/
}
</style>
</head>

<?php include('menu.php'); ?>
<div class="panel panel-default " style="border-collapse:0px solid red;">
    <div class="panel-heading">Accessories Store<span class="pull-right"><a href="<?php echo $base; ?>index.php/cproduct/lookupAccessories" class="lookupclass">LookUp</a></span></div>
    <div class="panel-body">
    <table border="0" align="center" class="table tbl">
    	<tr>
            <td class="label1 colon compulsory">Accessory Name </td>
            <td><input type="text" name="aname" id="aname" value="<?php //echo $csharedby; ?>" class='form-control' /></td>
        </tr>
         
         <tr>
            <td class="label1 colon compulsory">Product Name </td>
            <td width="50%">
            	<select id="pname" name="pname" class="form-control" data-placement="right" >
                    <option value="-1">Select</option>
                     <?php
						if(isset($product))
						{	  
						   for($i=0;$i<count($product);$i++)
						   {
								$selected='';
								$pname=$product[$i]['pname'];
								if($pid==$product[$i]['pid'])
									$selected='selected="selected"';
								echo "<option value='".$product[$i]['pid']."' ".$selected.">".$pname."</option>";
						   }
						}
					 ?>
              </select>
           </td>
        </tr>
        
        <tr>
            <td class="label1 colon compulsory">Image Upload</td>
            <td>
            <form name="frmaccessories" action="" method="post" enctype="multipart/form-data" style="margin-bottom:0px;">
              <input type="hidden" name="oper" id="oper" value="<?php echo $oper; ?>" />
              <input type="hidden" name="cphoto" id="cphoto" value="<?php echo $cphoto; ?>" />
              <input type="hidden" name="hideval" id="hideval" value=""  />
              <input type="hidden" name="productid" id="productid" value="<?php //echo $id; ?>" />
                <?php
                $class='fileinput-new';$img="";
                /*if($btnVal == "Update")
                {
                    
                    if(trim($cphoto) != '' && $cphoto != NULL && file_exists($_SERVER['DOCUMENT_ROOT']."/mywing/incrediblebgm/650x450/".$cphoto))
                    {
                        $img="<img src='/mywing/incrediblebgm/650x450/".$cphoto."'>";
                        $class='fileinput-exists';
                    }
					else
						$img='Image';
                }*/
                 ?>
                <div class="fileinput <?php echo $class; ?>" data-provides="fileinput">
                      <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width:105px;height:105px;" tabindex="16">
                          <?php echo $img; ?>
                      </div>
                      <div>
                        <span class="btn btn-default btn-file" tabindex="17"><span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists" tabindex="18">Change</span><input type="file" name="profile" id="profile"></span>
                        <a href="javascript:void(0);" onClick="clearimg()" class="btn btn-default fileinput-exists" data-dismiss="fileinput" tabindex="19">Remove</a>
                      </div>
                      <input type="submit" name="submit" id="submit" value="accessoriesimg" style="display:none;"/>
                </div>
             </form>
            </td>
		</tr>
       
        
        <tr>
            <td class="label1 colon compulsory">Price </td>
            <td><input type="text" name="price" id="price" value="<?php //echo $csharedby; ?>" class='form-control' /></td>
        </tr>
        
        <tr>
            <td class="label1 colon compulsory">Description</td>
            <td><textarea name="descp" id="descp" value="<?php // echo $csharedby; ?>" class='form-control' /></textarea></td>
        </tr>
       
          <tr>
            <td colspan="2" align="center">
                <input type="button" name="save" id="save" value="<?php echo $btnVal;?>" class="btn btn-primary" onClick="<?php echo $btnfunctn;?>"/>
           </td>
         </tr>
     </table>

<?php include('footer.php'); ?>