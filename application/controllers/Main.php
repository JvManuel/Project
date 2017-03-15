<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{
  public function __construct() 
    { 
            parent::__construct();
            $this->load->helper('url'); 
            $this->load->library('session');
            $this->load->database();
            $last = $this->uri->total_segments();
            $data['Page_Name'] = $this->uri->segment($last);
            $this->load->view("Header_view",$data);

    } 

  public function Login()
  {
     if(isset($_SESSION['logged_in'])==FALSE)
     {  
           $this->load->view("Log_in_view");
     }
     else
     {
           header("location:Admin_Home");
     }
  }

  public function Admin_Home()
  {
     if(isset($_SESSION['logged_in'])==TRUE)
     {  
           $this->load->view("Admin/Admin_home_view");
     }
     else
     {
           header("location:Login");
     }
  }
  public function Log_out()
  {
    //$this->api->Audit($_SESSION['uid']," logged out");
    $this->session->sess_destroy();
    $_SESSION['logged_in']=FALSE;
    header("location:Login");  
  }
  

}
?>