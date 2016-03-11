<?php
class mlogin extends CI_Model
{	
	private $salt = '12312esdf@#$#%%fghfgh5fd1dfg543&%@%&*#$$#fsdf';
	public function login($username,$cpassword)
	{
		$userData=array();
		$query="SELECT * FROM registerusers WHERE lower(rusername)='".strtolower($username)."' ";
		//echo "query:".$query."<br/>";die();
		$res=$this->db->query($query);
		if($res->num_rows() == 1)
		{
			$row=$res->row();
			$encyptpass=md5($this->salt.$cpassword);
			
			if(strcmp($encyptpass, $row->rpassword) == 0 )
			{
				$userData=array(
					'username'=>$row->rusername,
					'cname'=>$row->reg_name,
					'nuserid'=>$row->regid
				);
				return $userData;
			}
			else
			{
				return -1;
			}
		}
		else
		{
			return -2;
		}
	}
	 public function getTableCount($tblname,$condition='',$fld="*")
	{
		$iCnt=0;
		//$sql="SELECT COUNT(".$fld.") AS cnt FROM ".$tblname." ".$condition;
		$resId=$this->db->query("SELECT COUNT(".$fld.") AS cnt FROM ".$tblname." ".$condition);
		//$sql="SELECT COUNT(".$fld.") AS cnt FROM ".$tblname." ".$condition;
		//echo "SELECT COUNT(".$fld.") AS cnt FROM ".$tblname." ".$condition;die();
		if(is_object($resId))
		{
			$row = $resId->row();
			$iCnt=$row->cnt;
		}
		return $iCnt;
	}
	
	/*public function notification($nmenu_id,$nparent_id,$tblname,$dcurrent_date)
	{
		$sql="SELECT COUNT(id) FROM ".$tblname." WHERE dcurrent_date=".$dcurrent_date."";
		$result=$this->db->query($sql);
		$cnt=num_rows($sql);
		
		if($cnt>0)
		{
			$sql1=""
		}
		else
		{
		
			$sportsntfn='0';
		}
	}*/

}
?>