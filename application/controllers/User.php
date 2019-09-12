<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('User_Model');
    }

    public function index()
    {
        $this->load->library('session');

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

        if ($data && $data['user_type_id'] == 1) {
            $userData = array(
                'user_id'  =>  $data['id'],
                'first_name'  =>  $data['first_name'], 
                'user_type_id'  =>  $data['user_type_id'], 
            );
            $this->session->set_userdata($userData);

            $this->load->view('dashboard_HR');
        } 
        else if ($data && $data['user_type_id'] == 2) {
            $userData = array(
                'user_id'  =>  $data['id'],
                'first_name'  =>  $data['first_name'], 
                'last_name'  =>  $data['last_name'], 
                'email'  =>  $data['email'], 
                'user_type_id'  =>  $data['user_type_id'], 
            );
            $this->session->set_userdata($userData);

            $this->load->view('dashboard_staff');
        }
        else {
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
        // $this->session->unset_userdata('admin');
        redirect('/');
    }
    
    public function dashboardIndex()
    {
        $this->load->view('dashboard_staff');
    }

    public function profileIndex() 
    {
        $data['first_name'] = $this->session->userdata('first_name');
        $data['last_name'] = $this->session->userdata('last_name');
        $data['email'] = $this->session->userdata('email');
        $this->load->view('profile', $data);
    }

    public function dashboardHrIndex()
		{
			$this->load->view('dashboard_HR');
		}

    public function userDetails()
    {
        $data['users'] = $this->User_Model->getUserDetails();
        $this->load->view('user_details', $data);
    }

}
