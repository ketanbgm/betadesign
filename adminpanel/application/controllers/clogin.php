<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class clogin extends CI_Controller {
	public function index()
	{
		$this->load->view('vlogin');
	}
	
	public function login()
	{
		$username=$this->input->post("username");
		$cpassword=$this->input->post("password");
		$errFlag=0;
		$arrData=array();
		if($username == '')
		{
			$arrData = array("szMessage" => "No username entered");
			$errFlag++;
		}

		if($cpassword == '')
		{
			$arrData = array("szMessage" => "No password entered");
			$errFlag++;
		}
		if($errFlag == 0)
		{
			$this->load->model("mlogin");
			$szRes=$this->mlogin->login($username,$cpassword);
			//print_r($szRes);
			if(is_array($szRes))
			{
				if(is_array($szRes))
				{
					$szRes['username']=$username;
					$this->session->set_userdata('username',$szRes['username']);
					$this->session->set_userdata('name',$szRes['cname']);
					$this->session->set_userdata('userid',$szRes['nuserid']);
					$arrData = array("szMessage" => "Success");
				}
			}
			else
			{
				$arrData = array("szMessage" => "Invalid username or password.");
			}
						
		}//end of if($errFlag == 0)
		echo json_encode($arrData);
	}//end of function login()
	
	public function success()
	{
		//$this->chkloginuser();
		$this->load->view('vproductstore');
	}//end of success()
	public function accessories()
	{
		$this->chkloginuser();
		$this->load->model('maccessories');
		$product=$this->maccessories->getproductlist();
		//print_r($product);die();
		$this->load->view('vaccessories',array('product'=>$product));
	}//end of success()
	public function styling()
	{
		$this->chkloginuser();
		$this->load->model('maccessories');
		$product=$this->maccessories->getproductlist();
		//print_r($product);die();
		$this->load->view('vstyling',array('product'=>$product));
	}//end of success()
	
	public function logout()
	{
		//echo "Logout";
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		 //unset($this->session->userdata);  
		//redirect('/index');
		header("location:".constant('BASE_DIR')."index.php");
		//die();
	}//end of public function logout()
}