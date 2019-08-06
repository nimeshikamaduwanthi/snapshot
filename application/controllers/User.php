<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('users_model');
	}

	public function index(){
		//load session library
		$this->load->library('session');

		//restrict users to go back to login if session has been set
		if($this->session->userdata('user')){
			redirect('home');
		}
		else{
			$this->load->view('login_page');
		}
	}

	public function signup() {
		print_r($_POST);
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$email = $_POST['email'];
		$password = $_POST['password'];  

		$this->users_model->signup($firstName, $lastName, $email, $password);
		header('location:'.base_url().$this->index());
	}

	public function login(){
		//load session library
		$this->load->library('session');

		$email = $_POST['email'];
		$password = $_POST['password']; 

		$data = $this->users_model->login($email, $password);

		if($email=='email' && $password=='password'){
			$this->session->set_userdata('user', $data);
//			redirect('dashboard_HR');
            $this->load->view('dashboard_HR');
		}
		elseif ($data){
            $this->session->set_userdata('user', $data);
            $this->load->view('dashboard_staff');

        }
		else{
			header('location:'.base_url().$this->index());
			$this->session->set_flashdata('error','Invalid login. User not found');
		} 
	}

	public function home(){
		//load session library
		$this->load->library('session');

		//restrict users to go to home if not logged in
		if($this->session->userdata('user')){
			$this->load->view('home');
		}
		else{
			redirect('/');
		}
	}

	public function logout(){
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('/');
	}

    /**
     *
     */
    public function addTask(){

			 $this->load->library('session');
       $data['projects']=$this->users_model->fetch_projects();

        // $fetch_projects=$this->queries->fetch_projects();

	    // $this->load->view('addTask',['fetch_projects'->$fetch_projects]);
    }

    public function viewTask(){
        $this->load->library('session');
        $this->load->view('viewTask');
    }

    public function viewWeekly(){
        $this->load->library('session');
        $this->load->view('viewWeekly');
    }

//    public function fetch_projects(){
//
//        $this->load->view();
//    }

}
