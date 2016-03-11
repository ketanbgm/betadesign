<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class cproduct extends CI_Controller{
	public function index()
	{
		$this->chkloginuser();
		$this->load->view('vstyling');
	}
	
	public function saveProductstore()
	{
		$this->chkloginuser();
		$this->load->model('mproduct');

		$productstore=$this->input->post('productstore');
		//print_r($productstore);die();
		$occasion=$this->input->post('occasion');
		$size=$this->input->post('size');
		$height=$this->input->post('height');
		$complx=$this->input->post('complx');
		
		$oper=$this->input->post('oper');
		$id=$this->input->post('id');
		$res=$this->mproduct->saveProduct($productstore,$occasion,$size,$height,$complx);
		echo json_encode($res);
	}
	public function saveAccessories()
	{
		$this->chkloginuser();
		$this->load->model('maccessories');

		$productstore=$this->input->post('productstore');
		//print_r($productstore);die();
		/*$occasion=$this->input->post('occasion');
		$size=$this->input->post('size');
		$height=$this->input->post('height');
		$complx=$this->input->post('complx');*/
		
		$oper=$this->input->post('oper');
		$id=$this->input->post('id');
		$res=$this->maccessories->saveAccessories($productstore);
		echo json_encode($res);
	}
	public function lookupProduct()
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$this->load->model('mlogin');
		$Cnt=$this->mlogin->getTableCount('productstore');
		$this->load->view('vlookupproduct',array('Cnt'=>$Cnt,'numberofrecords'=>$numberofrecords));
		
	}
	
	public function loadProduct()
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$pageno=$this->input->post('pageno');
		$end=$numberofrecords*$pageno;
		$start=$end-$numberofrecords;
		$this->load->model('mproduct');
		$res=$this->mproduct->loadProduct($start,$numberofrecords);
		//print_r($res); die();
		echo json_encode($res);
	}
	
	public function deleteProduct($id='')
	{
		$this->chkloginuser();
		$id=$this->input->post('id');
		$this->load->model('mproduct');
		$res=$this->mproduct->deleteProduct($id);
		echo json_encode($res);
	}
	
	public function uploadimg()
	{
		if(isset($_POST['submit']) && $_POST['submit'] == "productimg")
		{
			$productid=$_POST['productid'];//echo'productid'.$productid;die();
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
					}
				}
			}
				header("location:".constant('BASE_DIR')."index.php/cproduct/");
		}
	}
	
	public function uploadimgaccessory()
	{
		if(isset($_POST['submit']) && $_POST['submit'] == "accessoriesimg")
		{
			//echo "hi";die();
			$productid=$_POST['productid'];//echo'productid'.$accessoryid;die();
			$cphoto=$_POST['cphoto'];
			
			$this->load->model('maccessories');
			$newname='';
			$tmpname='';
			$cphotoDB=$this->maccessories->getPhoto($productid);
			
			if(isset($_FILES['profile']))
			{
				//echo "hi";die();
				if($_FILES['profile']['error'] == 0)
				{
					//echo"hi";die();
					$name=$_FILES['profile']['name'];
					$newname=$name;
					$tmpname=$_FILES['profile']['tmp_name'];
					
					$res=$this->maccessories->updateanduploadimg($productid,$newname,$tmpname,'');
					if($res == "OK")
					{
					}
				}
			}
				header("location:".constant('BASE_DIR')."index.php/clogin/accessories");
		}
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
		$this->load->model('maccessories');
		$res=$this->maccessories->loadAccessories($start,$numberofrecords);
		//print_r($res); die();
		echo json_encode($res);
	}
	public function deleteAccessory($id='')
	{
		$this->chkloginuser();
		$id=$this->input->post('id');
		$this->load->model('maccessories');
		$res=$this->maccessories->deleteAccessories($id);
		echo json_encode($res);
	}
}
?>