<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Log_in extends CI_Controller
{
		public function __construct() 
	    { 
	            parent::__construct();
	            $this->load->helper('url'); 
	            $this->load->library('session');
	            //$this->load->library('api');
	            $this->load->database();
	            
	    }

    	public function Log_in_function(){
		$uname=$this->input->post('uname');
		$pword=$this->input->post('pword');
		$this->load->model("Log_In_Model");
		
		$result = $this->Log_In_Model->getLoginData($uname,$pword);
		
			if($result)
			{			
				echo base_url("Main/Admin_home");			
			}
			else
			{
				echo "Wrong username or password ! Please try again !";
			}
		}
		
	
}
?>