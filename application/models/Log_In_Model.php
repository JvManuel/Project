<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Log_in_model extends CI_Model{


		public function getLoginData($uname,$pword)
		{
			//return array("fullname" => "John Vincent Manuel","Age"=>20);
			//$db=$this->load->database('cems_db',TRUE);
			//$this->load->library('api');
			$loginquery="select * from user_tbl where uname= ? and pword= ? ";

			$query = $this->db->query($loginquery,array($uname,$pword));
			$no=$query->num_rows();
			$user_data=$query->row_array();
			
			$this->load->library('session');
			if($no==1)
			{

				$Logdata = array(
						'uid'  		   => $user_data['uid'],
				        'username'     => $user_data['uname'],
				        'password'     => $user_data['pword'],
				        'fname'        => $user_data['fname'],
				        'lname'  	   => $user_data['lname'],
				        'logged_in'    => TRUE
				);
				$this->session->set_userdata($Logdata);

				return true;
				
			}
			else
			{
				return false;
			}
			
		}
	}
?>