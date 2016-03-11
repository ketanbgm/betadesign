<div id="RegisterModal" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Register</h4>
      </div>
      <div class="modal-body">
         <table class="table" align="center" id="Signin">
            <tr>
            	<td style="border:0px;" class="lbl compulsory">Name :</td>
                <td style="border:0px;"><input type="text" name="fname" id="fname" class="form-control"/></td>
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
            	<td  style="border:0px;" class="lbl compulsory">Password:</td>
                <td style="border:0px;"><input type="password" name="npassword" id="npassword" class="form-control"/></td>
            </tr>
             <tr>
            	<td style="border:0px;" class="lbl compulsory">Confirm Password:</td>
                <td style="border:0px;"><input type="password" name="cnfrmpassword" id="cnfrmpassword" class="form-control"/></td>
            </tr>
            <tr>
            	<td style="border:0px;" colspan="2" align="center"><input type="button" name="signin" id="signin" value="Register" class="btn btn-primary" onclick="register()"/></td>
            </tr>
         </table>
      </div>
     </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>	