<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Admin extends CI_Controller
{
  
  function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->helper('url');
        
  }
 
    public function index()
   {
     parent::__construct();
     $this->load->helper('url');
     $this->load->model('User_Model');
     $this->load->model('Admin_Model');
   }

   public function index()
   {
       $this->load->library('session');

       //restrict users to go back to login if session has been set
       if ($this->session->userdata('user')) {
           $this->load->view('snapshot');
       } else {
           $this->load->view('login_page');
       }
   }
   
   public function signup()
   {
       $firstName = $_POST['firstName'];
       $lastName = $_POST['lastName'];
       $email = $_POST['email'];
       $password = $_POST['password'];

       $this->User_Model->signup($firstName, $lastName, $email, $password);
       header('location:' . base_url() . $this->index());

   }

   public function loginchk()
     {
          //get the posted values
          $username = $this->input->post("txt_username");
          $password = $this->input->post("txt_password");

          //set validations
          $this->form_validation->set_rules("txt_username", "Username", "trim|required");
          $this->form_validation->set_rules("txt_password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
               $data[""] ="";
               //validation fails
               $this->load->view("");
               $this->load->view("", $data);
               $this->load->view("");
          }
          else
          {
               //validation succeeds
               if ($this->input->post('btn_login') == "Login")
               {
                    //check if username and password is correct
                    $usr_result = $this->login_model->get_user($username, $password);
                    if ($usr_result > 0) //active user record is present
                    {
                         //set the session variables
                         $sessiondata = array(
                              'username' => $username,
                              'loginuser' => TRUE
                         );
                         $this->session->set_userdata($sessiondata);
                         redirect("site/members");
                    }
                    else
                    {
                         $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                         redirect('site/home');
                    }
               }
               else
               {
                    redirect('site/home');
               }
          }

?>