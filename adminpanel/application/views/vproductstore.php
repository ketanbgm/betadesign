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
	$btnfunctn="product.saveProduct('".$oper."',0)";
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
<script type="text/javascript" src="<?php echo $base; ?>js/productstore.js"></script>
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
    <div class="panel-heading">Product Store<span class="pull-right"><a href="<?php echo $base; ?>index.php/cproduct/lookupProduct" class="lookupclass">LookUp</a></span></div>
    <div class="panel-body">
    <table border="0" align="center" class="table tbl">
    	<tr>
            <td class="label1 colon compulsory">Product Name </td>
            <td><input type="text" name="pname" id="pname" value="<?php //echo $csharedby; ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td class="label1 compulsory">Male </td><td><input type="radio" name="gender" id="male" value="M" checked="checked" /> <span style="padding-left:20px;">Female</span>
            <input type="radio" name="gender" id="female" value="F" style="margin-left:15px;"/>
            </td>
        </tr>
        
        <tr>
           <td class="label1 colon compulsory">Category</td>
           <td>
            <select class="form-control" id="category" name="category">
                <option value="-1">Select</option>
                <option valu='Dress'>Dress</option>
                <option valu='Ghagra'>Ghagra</option>
                <option valu='Saree'>Saree</option>
                <option valu='Jeans'>Jeans</option>
                <option valu='Tops'>Tops</option>
                <option valu='Kurtis'>Kurtis</option>
                <option valu='Shirts'>Shirts</option>
            </select>
           </td>
        </tr>
    	<tr>
           <td class="label1 colon compulsory">Occasion</td>
           <td>
           	<select class="form-control multiselect" multiple id="occasion" name="occasion">
           		<option valu='Festival'>Festival</option>
                <option valu='Wedding'>Wedding</option>
                <option valu='Party'>Party</option>
                <option valu='Formal'>Formal</option>
                <option valu='Casual'>Casual</option>
            </select>
           </td>
        </tr>
    
         <tr>
            <td class="label1 colon compulsory">Image Upload</td>
            <td>
            <form name="frmproduct" action="" method="post" enctype="multipart/form-data" style="margin-bottom:0px;">
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
                      <input type="submit" name="submit" id="submit" value="productimg" style="display:none;"/>
                </div>
             </form>
            </td>
		</tr>
        <tr>
           <td class="label1 colon compulsory">Size</td>
           <td>
           	<select class="form-control multiselect" multiple id="size" name="size">
           		<option valu='S'>S</option>
                <option valu='M'>M</option>
                <option valu='L'>L</option>
                <option valu='XL'>XL</option>
                <option valu='XXL'>XXL</option>
            </select>
           </td>
        </tr>
        <tr>
           <td class="label1 colon compulsory">Color</td>
           <td>
           	<select class="form-control" id="color" name="color">
            	<option value="-1">Select</option>
           		<option valu='Red'>Red</option>
                <option valu='Yellow'>Yellow</option>
                <option valu='Blue'>Blue</option>
                <option valu='White'>White</option>
                <option valu='Black'>Black</option>
                <option valu='Pink'>Pink</option>
                <option valu='Purple'>Purple</option>
                <option valu='Green'>Green</option>
                <option valu='Orange'>Orange</option>
            </select>
           </td>
        </tr>
        
         <tr>
           <td class="label1 colon compulsory">Height</td>
           <td>
           	<select class="form-control multiselect" multiple id="height" name="height">
           		<option valu='1to2'>1-2</option>
                <option valu='2to4'>2-4</option>
                <option valu='4to5'>4-5</option>
                <option valu='5to6'>5-6</option>
                <option valu='6to7'>6-7</option>
            </select>
           </td>
        </tr>
        <tr>
           <td class="label1 colon compulsory">Complexion</td>
           <td>
           	<select class="form-control multiselect" multiple id="complx" name="complx">
           		<option valu='Fair'>Fair</option>
                <option valu='Wheatish'>Wheatish</option>
                <option valu='Dark'>Dark</option>
            </select>
           </td>
        </tr>
        
        <tr>
            <td class="label1 colon compulsory">Price </td>
            <td><input type="text" name="price" id="price" value="<?php //echo $csharedby; ?>" class='form-control' /></td>
        </tr>
        <tr>
			<td class="label1">Designer Name</td>
			<td><input type="text" name="desgame" id="desgame" class="form-control"/></td>
		</tr>
         <tr>
			<td class="label1 colon compulsory">Contact Number</td>
			<td><input type="text" name="dnumber" id="dnumber" class="form-control"/></td>
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