<?php include('database.php');?>
<?php
if(!isset($_POST['func']) || trim($_POST['func']) == "")
	die();

$func = trim($_POST['func']);
$func();

function saveregister()
{
	$msg=NULL;
	$data=&$_POST['data'];
	$salt = '12312esdf@#$#%%fghfgh5fd1dfg543&%@%&*#$$#fsdf';
	$password=md5($salt.$data['cpassword']);
	$cverificationcode=rand();
	$currdate=date('Y-m-d h:i:s');
	//print_r($data);
	$qry=mysql_query("SELECT * FROM registerusers WHERE reg_email='".$data['cemail']."'");
	$num=mysql_num_rows($qry);
	if($num>=1)
	{
		$msg['status']="ERROR";
		$msg['msg']="Entry already exists for the same email id, ".$data['cemail']."";
	}
	else
	{
		$sql="INSERT INTO registerusers(reg_name,reg_mob,reg_address,reg_email,rusername,rpassword) VALUES 
			('".$data['cname']."','".$data['cmobile_no']."','".$data['caddress']."','".trim($data['cemail'])."','".$data['cusername']."','".$password."')";
		//echo "sql:".$sql;die();
		$res=mysql_query($sql);
		//$id = mysql_insert_id();
		if($res)
		{
				$msg['status']='OK';
				$msg['msg']="Registered Successfully!.....";
		}
		else
		{
			$msg['status']='ERROR';
			$msg['msg']="error..";
		}
	}
	
	echo json_encode($msg);
}

function verify()
{
	$msg=NULL;
	$arrdata=&$_POST['data'];
	$sql="SELECT * FROM user WHERE cusername='".trim($arrdata['cusername'])."' AND cverificationcode='".trim($arrdata['cverificationcode'])."' AND nuserid=".$arrdata['userid']."";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	if($num==1)
	{
		$sql1="UPDATE user SET is_verified='1' WHERE cusername='".trim($arrdata['cusername'])."' AND nuserid=".$arrdata['userid']."";
		$res1=mysql_query($sql1);
		if($res1)
		{
			$msg['status']='OK';
			$msg['msg']='Verified Successfully';
		}
		else
		{
			$msg['status']='ERROR';
			$msg['msg']='Invalid verification code';
		}
	}
	else
	{
		$msg['status']='ERROR';
		$msg['msg']='Invalid verification code';
	}
	echo json_encode($msg);

}//end of verify()

function signin()
{
	$msg=NULL;
	$data=&$_POST['data'];
	$sessval=&$_POST['sessval'];
	$contactid=&$_POST['contactid'];
	$salt = '12312esdf@#$#%%fghfgh5fd1dfg543&%@%&*#$$#fsdf';
	$password=md5($salt.$data['npassword']);
	//echo "username:".$data['username'];
	//echo "password:".$password;
	$sql="SELECT * FROM user WHERE cusername='".trim($data['username'])."' AND cpassword='".$password."' AND is_verified='1'";
	//echo "sql:".$sql;
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	//print_r($num);die();
	if($num==1)
	{
		while($row=mysql_fetch_array($res))
		{
			$nuserid=$row['nuserid'];
			$cusername=$row['cusername'];
			$cname=$row['cname'];
			$_SESSION['username']=$cusername;
			$_SESSION['userid']=$nuserid;
			$_SESSION['cname']=$cname;	
			$_SESSION['ctype']=$sessval;
			$_SESSION['timeout']=time();
			$_SESSION['contactid']=$contactid;
		}
		$msg['status']='OK';
		$msg['msg']="Login Successfully";
	}
	else
	{
		$msg['status']='ERROR';
		$msg['msg']='Invalid Username or Password';
	}
	echo json_encode($msg);
}//end of signin()

function updateUser()
{
	$msg=NULL;
	$data=&$_POST['data'];
	$id=&$_POST['id'];
	$sql="UPDATE user SET cname='".$data['cname']."',cmobile_no='".$data['cmobile_no']."',cphone_no='".$data['cphone_no']."',caddress='".$data['caddress']."' WHERE nuserid=".$id."";
	$res=mysql_query($sql);
	if($res)
	{
		$msg['status']='OK';
		$msg['msg']="Record Updated Successfully";
	}
	else
	{
		$msg['status']='ERROR';
		$msg['msg']='Error while updating';
	}
	echo json_encode($msg);
}

function saveDescription()
{
	$msg=NULL;
	$description=&$_POST['description'];
	$id=&$_POST['id'];
	$sql="SELECT * FROM enterpreneur WHERE nenterpreneur_id=".$id."";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	if($num==1)
	{
		$sql1="UPDATE enterpreneur SET cdescription='".$description."' WHERE nenterpreneur_id=".$id."";
		$res1=mysql_query($sql1);
		$message="Record Updated Successfully";
	}
	else
	{
		$sql1="INSERT INTO enterpreneur(cdescription,nenterpreneur_id) VALUES('".$description."',".$id.")";
		$res1=mysql_query($sql1);
		$message="Record inserted Successfully";
	}
	if($res1)
	{
		$msg['status']='OK';
		$msg['msg']=$message;
	}
	else
	{
		$msg['status']='ERROR';
		$msg['msg']='Error while updating';
	}
	echo json_encode($msg);
}//end of saveDescription()

function savePassword()
{
	$msg=NULL;
	$data=&$_POST['data'];
	$id=&$_POST['id'];
	$salt = '12312esdf@#$#%%fghfgh5fd1dfg543&%@%&*#$$#fsdf';
	$opassword=md5($salt.$data['oldpassword']);
	$npassword=md5($salt.$data['newpassword']);
	$sql="SELECT * FROM user WHERE nuserid=".$id." and cpassword='".$opassword."'";
	//echo $sql;die();
	$res=mysql_query($sql);
	if($res)
	{
		$sql1="UPDATE user SET cpassword='".$npassword."' WHERE nuserid=".$id."";
		$res1=mysql_query($sql1);
		$msg['status']='OK';
		$msg['msg']="Record Updated Successfully";
	}
	else
	{
		$msg['status']='ERROR';
		$msg['msg']='Old Password doesnt match with existing Password.';
	}
	echo json_encode($msg);
}//end of savePassword()

?>
