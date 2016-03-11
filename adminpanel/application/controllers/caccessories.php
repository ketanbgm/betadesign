<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class cproduct extends CI_Controller{
	public function index()
	{
		$this->chkloginuser();
		$this->load->model('maccessories');
		$product=$this->maccessories->getproductlist();
		print_r($product);die();
		$this->load->view('vaccessories',array('product'=>$product));
	}
	
	public function saveAccessories()
	{
		$this->chkloginuser();
		$this->load->model('maccessories');

		$productstore=$this->input->post('productstore');
		/*$occasion=$this->input->post('occasion');
		$size=$this->input->post('size');
		$height=$this->input->post('height');
		$complx=$this->input->post('complx');*/
		
		$oper=$this->input->post('oper');
		$id=$this->input->post('id');
		$res=$this->maccessories->saveAccessories($productstore);
		echo json_encode($res);
	}
	
	public function lookupAccessories()
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$this->load->model('mlogin');
		$Cnt=$this->mlogin->getTableCount('accessories');
		$this->load->view('vlookupaccessories',array('Cnt'=>$Cnt,'numberofrecords'=>$numberofrecords));
		
	}
	
	public function loadAccessories()
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$pageno=$this->input->post('pageno');
		$end=$numberofrecords*$pageno;
		$start=$end-$numberofrecords;
		$this->load->model('mincredible');
		$res=$this->maccessories->loadAccessories($start,$numberofrecords);
		//print_r($res); die();
		echo json_encode($res);
	}
	
	public function getIncredible($id='')
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$id=$this->input->get('id');
		$this->load->model('mincredible');
		$res=$this->mincredible->getIncredible($id);
		$this->load->view('vincredible',array('dataIncredible'=>$res));
	}
	
	public function deleteIncredible($id='')
	{
		$this->chkloginuser();
		$id=$this->input->post('id');
		$this->load->model('mincredible');
		$res=$this->mincredible->deleteIncredible($id);
		echo json_encode($res);
	}
	
	public function uploadimg()
	{
		if(isset($_POST['submit']) && $_POST['submit'] == "productimg")
		{
			$productid=$_POST['productid'];//echo'productid'.$productid;die();
			//$incrediblename=$_POST['incrediblename'];
			//$oper=$_POST['oper'];
			$cphoto=$_POST['cphoto'];
			
			$this->load->model('mproduct');
			$newname='';
			$tmpname='';
			$cphotoDB=$this->mproduct->getPhoto($productid);
			
			if(isset($_FILES['profile']))
			{
				if($_FILES['profile']['error'] == 0)
				{
					$name=$_FILES['profile']['name'];
					$newname=$productid."=".$name;
					$tmpname=$_FILES['profile']['tmp_name'];
					
					$res=$this->mproduct->updateanduploadimg($productid,$newname,$tmpname,'');
					if($res == "OK")
					{
						/*if(trim($cphotoDB) != '' && $cphotoDB != NULL && $cphotoDB!=$newname)
							if(file_exists($_SERVER['DOCUMENT_ROOT']."/mywing/incrediblebgm/".$cphotoDB))
								unlink($_SERVER['DOCUMENT_ROOT']."/mywing/incrediblebgm/".$cphotoDB);*/
					}
				}
			}
			/*else
			{
				if(trim($cphoto) == '' && $cphotoDB != '')
				{
					$res=$this->mincredible->updateanduploadimg($incredibleid,$newname,$tmpname,$oper);
					if($res == "OK")
					{																																																															
						if(file_exists($_SERVER['DOCUMENT_ROOT']."/mywing/incrediblebgm/".$cphotoDB))
								unlink($_SERVER['DOCUMENT_ROOT']."/mywing/incrediblebgm/".$cphotoDB);
					}
				}
			}*/
			
			//if($oper == 'Save')
			//{
				header("location:".constant('BASE_DIR')."index.php/cproduct/");
			/*}
			else
			{
				header("location:".constant('BASE_DIR')."index.php/cproduct/lookupIncredible");
			}*/
		}
	}
}
?>