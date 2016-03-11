<?php
include_once(APPPATH.'libraries/resize-class.php');
class mproduct extends CI_Model
{	
	public function saveProduct($productstore,$occasion,$size,$height,$complx)
	{
		$arrStatus=NULL;
		$this->db->query("Begin");
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
				$res1=$this->db->insert('productstore',$productstore);
				//echo $res1;die();
				$res=$this->db->query("Select LAST_INSERT_ID() as pid from productstore");
				$row=$res->row();
				$id=$row->pid;
				//echo $pid;die();
				//$msg='Record Saved';
				if($res)
				{
					//print_r($occasion);die();
					$cntcomplx=count($complx['complexionname']);
					$cntocc=count($occasion['oname']);
					$cntsize=count($size['sname']);
					$cnthgt=count($height['hname']);
					
					//echo'cntocc'.$occasion['oname'][0];die();
					//$complx['complexionname'][0]='';
					//if($cntcomplx > 0)
					//{
						for($i=0;$i<count($complx['complexionname']);$i++)
						{
							$complexionname=$complx['complexionname'][$i];
							$pid=$id;
							
							$sql="Insert into complexion(pid,complexionname)VALUES(".$pid.",'".$complexionname."')";//echo $sql;//die();
							$res1=$this->db->query($sql);
						}
					//}
					//$occasion['oname'][0]='';
					//if($cntocc > 0)
					//{
						for($i=0;$i<count($occasion['oname']);$i++)
						{
							$oname=$occasion['oname'][$i];
							$pid=$id;
							
							$sql1="Insert into occassion(pid,oname)VALUES(".$pid.",'".$oname."')";//echo $sql1;die();
							$res2=$this->db->query($sql1);
						}
					//}
					//$size['sname'][0]='';
					//if($cntsize > 0)
					//{
						for($i=0;$i<count($size['sname']);$i++)
						{
							$sizename=$size['sname'][$i];
							$pid=$id;
							
							$sql3="Insert into dsize(pid,sname)VALUES(".$pid.",'".$sizename."')";
							$res3=$this->db->query($sql3);
						}
					//}
					//$height['hname'][0]='';
					//if($cnthgt > 0)
					//{
						for($i=0;$i<count($height['hname']);$i++)
						{
							$hname=$height['hname'][$i];
							$pid=$id;
							
							$sql3="Insert into dheight(pid,hname)VALUES(".$pid.",'".$hname."')";
							$res3=$this->db->query($sql3);
						}
					//}
				}
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
			$arrStatus['status'] ='OK';$arrStatus['msg'][]='Product Saved';$arrStatus['tag'][]='show';$arrStatus['id']=$id;
		}
		return $arrStatus;
	}
	
	public function loadProduct($start,$end)
	{
		//$this->load->model('mproductcategory');
		//$this->load->model('mpromake');
		$sql="SELECT * FROM productstore ORDER BY pid LIMIT ".$start.",".$end."";
		//$sql="SELECT * FROM product a,product_category b,product_make c WHERE a.ncategory_id=b.ncategory_id AND a.nmake_id=c.nmake_id ORDER BY cname LIMIT ".$start.",".$end."";
		$res=$this->db->query($sql);
		$c=0;
		$arrRet=NULL;
		foreach($res->result() as $row)
		{
			$id=$row->pid;
			//$arrCategory=$this->mproductcategory->getcategory($row->ncategory_id);
			//$categoryname=$arrCategory[0]['ccategory_name'];
			
			//$arrCategory1=$this->mpromake->getPromake($row->nmake_id);
			//$make=$arrCategory1[0]['cmake'];
			$arrRet[$c]['items']['pname']=$row->pname;
			$arrRet[$c]['items']['pdesigner']=$row->pdesigner;
			$arrRet[$c]['items']['pprice']=$row->pprice;
			//$arrRet[$c]['items']['cdescription']=$row->cdescription;
			//$arrRet[$c]['editfunction']="product.editProduct(".$id.")";
			$arrRet[$c]['deletefunction']="product.deleteProduct(".$id.")";
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
	
	public function deleteProduct($id='')
	{
		
		$this->db->where('pid',$id);
		$res=$this->db->delete('accessories');
		if($res)
		{
			$this->db->where('pid',$id);
			$res1=$this->db->delete('complexion');
			if($res1)
			{
				$this->db->where('pid',$id);
				$res2=$this->db->delete('dheight');
				if($res2)
				{
					$this->db->where('pid',$id);
					$res3=$this->db->delete('dsize');
					if($res3)
					{
						$this->db->where('pid',$id);
						$res4=$this->db->delete('occassion');
						if($res4)
						{
							$this->db->where('pid',$id);
							$res4=$this->db->delete('productstore');
						}
					}
				}
			}
		}
		
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
	
	public function getPhoto($nproduct_id)
	{
		$oldcphoto='';
		$res=$this->db->query("SELECT pimgname FROM productstore WHERE pid=".$nproduct_id."");
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
		$sql="UPDATE productstore SET pimgname='".$newname."' WHERE pid=".$nproduct_id."";
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
}
?>