<?php
include_once(APPPATH.'libraries/resize-class.php');
class mstyling extends CI_Model
{	
	public function savestyling($productstore)
	{
		$arrStatus=NULL;
		$this->db->query("Begin");
		$aname=$productstore['aname'];
		//$aimgname=$productstore['aimgname'];
		//$aprice=$productstore['aprice'];
		$adescription=$productstore['adescription'];
		$pid=$productstore['pid'];
		//if($oper=='Save')
			//$sql="SELECT * from productstore WHERE LOWER(pname)='".strtolower($productstore['pname'])."'";
		/*else
			$sql="SELECT * from product WHERE cname='".$dataProduct['cname']."' AND nid!=".$id."";*/
		/*$res=$this->db->query($sql);
		$num=$res->num_rows();
		if($num>=1)
		{
			$arrStatus['status']="OK"; $arrStatus['msg']="Record already exists";
			return $arrStatus;
		}
		else
		{*/
			
			//if($oper=='Save')
			//{
				//$productstore['regid']=$this->session->userdata['userid'];
				//print_r($productstore);die();
				//$res1=$this->db->insert('accessories',$productstore);
				$sql="Insert into styling(stylename,pid,styledescrp) VALUES('".$aname."',".$pid.",'".$adescription."')";//echo $sql;//die();
				//echo $sql;die();
				$res1=$this->db->query($sql);
				//$res3=$this->db->query($sql3);
				//echo $res1;die();
				//$res=$this->db->query("Select LAST_INSERT_ID() as aid from accessories");
				//$row=$res->row();
				//$id=$row->aid; //echo $id;die();
				//echo $pid;die();
				//$msg='Record Saved';
				/*if($res)
				{
					//print_r($occasion);die();
					//echo(count($complx['complexionname']));die();
					for($i=0;$i<count($complx['complexionname']);$i++)
					{
						$complexionname=$complx['complexionname'][$i];
						$pid=$id;
						
						$sql="Insert into complexion(pid,complexionname)VALUES(".$pid.",'".$complexionname."')";//echo $sql;//die();
						$res1=$this->db->query($sql);
					}
					for($i=0;$i<count($occasion['oname']);$i++)
					{
						$oname=$occasion['oname'][$i];
						$pid=$id;
						
						$sql1="Insert into occassion(pid,oname)VALUES(".$pid.",'".$oname."')";//echo $sql1;die();
						$res2=$this->db->query($sql1);
					}
					for($i=0;$i<count($size['sname']);$i++)
					{
						$sizename=$size['sname'][$i];
						$pid=$id;
						
						$sql3="Insert into dsize(pid,sname)VALUES(".$pid.",'".$sizename."')";
						$res3=$this->db->query($sql3);
					}
					for($i=0;$i<count($height['hname']);$i++)
					{
						$hname=$height['hname'][$i];
						$pid=$id;
						
						$sql3="Insert into dheight(pid,hname)VALUES(".$pid.",'".$hname."')";
						$res3=$this->db->query($sql3);
					}
					
				}*/
			/*}
			else
			{
				$this->db->where('nid',$id);
				$res=$this->db->update('product',$dataProduct);
				$msg='Record Updated';	
			}*/
			
		//}

		if($this->db->trans_status() === FALSE)
		{
			$this->db->query("rollback");
			$arrStatus['status'] ='ERR';$arrStatus['msg']='Database Error';
		}
		else
		{
			$this->db->query("commit");
			$arrStatus['status'] ='OK';$arrStatus['msg']='Styling Saved';$arrStatus['tag'][]='show';
		}
		return $arrStatus;
	}
	
	public function loadAccessories($start,$end)
	{
		
		$sql="SELECT * FROM accessories ORDER BY aid LIMIT ".$start.",".$end."";
		//$sql="SELECT * FROM product a,product_category b,product_make c WHERE a.ncategory_id=b.ncategory_id AND a.nmake_id=c.nmake_id ORDER BY cname LIMIT ".$start.",".$end."";
		$res=$this->db->query($sql);
		$c=0;
		$arrRet=NULL;
		foreach($res->result() as $row)
		{
			$id=$row->aid;
			
			
			$arrRet[$c]['items']['aname']=$row->aname;
			$arrRet[$c]['items']['aprice']=$row->aprice;
			//$arrRet[$c]['items']['cdescription']=$row->cdescription;
			//$arrRet[$c]['editfunction']="product.editProduct(".$id.")";
			$arrRet[$c]['deletefunction']="accessories.deleteAccessories(".$id.")";
			$c++;
		}
		return $arrRet;
	}
	
	public function loadStyling($start,$end)
	{
		
		$sql="SELECT * FROM styling ORDER BY styleid LIMIT ".$start.",".$end."";
		//$sql="SELECT * FROM product a,product_category b,product_make c WHERE a.ncategory_id=b.ncategory_id AND a.nmake_id=c.nmake_id ORDER BY cname LIMIT ".$start.",".$end."";
		$res=$this->db->query($sql);
		$c=0;
		$arrRet=NULL;
		foreach($res->result() as $row)
		{
			$id=$row->styleid;
			
			
			$arrRet[$c]['items']['stylename']=$row->stylename;
			//$arrRet[$c]['items']['aprice']=$row->aprice;
			//$arrRet[$c]['items']['cdescription']=$row->cdescription;
			//$arrRet[$c]['editfunction']="product.editProduct(".$id.")";
			$arrRet[$c]['deletefunction']="styling.deletestyling(".$id.")";
			$c++;
		}
		return $arrRet;
	}
	
	public function getProduct($id='')
	{
		$sql="SELECT * FROM product";
		if($id != '')
			$sql=$sql." WHERE nid=".$id."";	
		
		$res=$this->db->query($sql);
		$ret=NULL;
		$c=0;
		foreach($res->result() as $row)
		{
			$ret[$c]['id']=$row->nid;
			$ret[$c]['ncategory_id']=$row->ncategory_id;
			$ret[$c]['nmake_id']=$row->nmake_id;
			$ret[$c]['cname']=$row->cname;
			$ret[$c]['nprice']=$row->nprice;
			$ret[$c]['iproductimage']=$row->iproductimage;
			$ret[$c]['cdescription']=$row->cdescription;
			$c++;
		}
		return $ret;
	}
	
	public function deleteAccessories($id='')
	{
		
		$this->db->where('aid',$id);
		$res=$this->db->delete('accessories');
		
		if($this->db->trans_status() === FALSE)
		{
			$this->db->query("rollback");
			$arrStatus['status'] ='ERR';$arrStatus['msg']='Database Error';
		}
		else
		{
			$this->db->query("commit");
			$arrStatus['status'] ='OK';$arrStatus['msg']='Record Deleted';
		}
		return $arrStatus;
	}
	
	public function deleteStyling($id='')
	{
		
		$this->db->where('styleid',$id);
		$res=$this->db->delete('styling');
		
		if($this->db->trans_status() === FALSE)
		{
			$this->db->query("rollback");
			$arrStatus['status'] ='ERR';$arrStatus['msg']='Database Error';
		}
		else
		{
			$this->db->query("commit");
			$arrStatus['status'] ='OK';$arrStatus['msg']='Record Deleted';
		}
		return $arrStatus;
	}
	
	public function getPhoto($accessoryid)
	{
		$oldcphoto='';
		$res=$this->db->query("SELECT pimgname FROM accessories WHERE aid=".$accessoryid."");
		if($res)
		{
		if($res->num_rows() > 0)
			$oldcphoto=$res->row()->pimgname;
		}
		return $oldcphoto;
	}
	
	public function getPhotoaccessories($nproduct_id)
	{
		$oldcphoto='';
		$res=$this->db->query("SELECT pimgname FROM accessories WHERE pid=".$nproduct_id."");
		if($res)
		{
		if($res->num_rows() > 0)
			$oldcphoto=$res->row()->pimgname;
		}
		return $oldcphoto;
	}
	
	public function updateanduploadimg($nproduct_id,$newname,$tmpname,$oper='')
	{
		$newname=preg_replace('/\s+/', '', $newname);/*remove whitespaces from filename*/
		$ret='';
		$this->db->query("BEGIN");
		$sql="UPDATE accessories SET aimgname='".$newname."' WHERE aid=".$nproduct_id."";
		//echo $sql;die();
		$res=$this->db->query($sql);
		/*if($categry == 1)
		{
			$imgpath=$_SERVER['DOCUMENT_ROOT']."/compare/car/".$newname;
		}
		else if($categry == 2)
		{*/
		$imgpath=$_SERVER['DOCUMENT_ROOT']."/server/".$newname;//echo $imgpath;die();
		//}
		//echo $sql;
		//echo $imgpath;die();
		if($res)
		{
			if($newname != '')
			{
				if(move_uploaded_file($tmpname,$imgpath))
				{
					$ret="OK";
					$resize = new resize($imgpath);
					$resize->resizeImage(270,320,'auto');
					$resize->saveImage($imgpath,80);
				}
				else
					$ret="ERR";
			}
		}
		//if($oper == 'Update')
			$ret="OK";
			
		if($ret == "OK")
			$this->db->query("COMMIT");
		else
			$this->db->query("ROLLBACK");
		
		return $ret;		
	}
	
	public function getproductlist()
	{
		$sql="SELECT * FROM productstore";
		/*if($id != '')
			$sql=$sql." WHERE nid=".$id."";	*/
		
		$res=$this->db->query($sql);
		$ret=NULL;
		$c=0;
		foreach($res->result() as $row)
		{
			$ret[$c]['pid']=$row->pid;
			$ret[$c]['pname']=$row->pname;
			
			$c++;
		}
		return $ret;
	}
	
}
?>