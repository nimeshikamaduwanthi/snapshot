<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User_Model');
        $this->load->model('Project_Model');
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

    public function login() 
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $data = $this->User_Model->login($email, $password);
				
        if ($email == 'email' && $encripted_pass == 'password') {
            $this->session->set_userdata('user', $data);
//            redirect('dashboard_HR');
            $this->load->view('dashboard_HR');
        } elseif ($data) {
            $this->session->set_userdata('user', $data);
            $this->load->view('dashboard_staff');

        } else {
            header('location:' . base_url() . $this->index());
            $this->session->set_flashdata('error', 'Invalid login. User not found');
        }
    }

    public function logout()
    {
        //load session library
        $this->load->library('session');
        $this->session->unset_userdata('user');
        redirect('/');
    }
    
    public function dashboardIndex()
    {
        $this->load->view('dashboard_staff');
    }

    public function profileIndex() 
    {
        $this->load->view('profile');
    }

}
