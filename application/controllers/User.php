<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User_Model');
    }

    public function index()
    {
        //load session library
        $this->load->library('session');

        //restrict users to go back to login if session has been set
        if ($this->session->userdata('user')) {
            // redirect('addTask');
            $this->load->view('addTask');
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

    public function home()
    {
        //load session library
        $this->load->library('session');

        //restrict users to go to home if not logged in
        if ($this->session->userdata('user')) {
            $this->load->view('home');
        } else {
            redirect('/');
        }
    }

    public function logout()
    {
        //load session library
        $this->load->library('session');
        $this->session->unset_userdata('user');
        redirect('/');
    }

    public function addTaskIndex()
    {
        $data['projects'] = $this->User_Model->getProjectNames();
        $data['task_names'] = $this->User_Model->getTaskNames();
        // $date['weeks'] = $this->User_Model->getWeeks();
        $data['tasks'] = $this->User_Model->viewTasks();
        $this->load->view('addTask', $data);
    }

    public function addTask()
    {
        // $weeks = array(
        //     'start_date' => $this->input->post('weekStart'),
        //     'end_date' => $this->input->post('weekEnd'),
        // );

        // $this->User_Model->saveWeeks($weeks);

        $task = array(
            // 'weeks_id' => $this->input->post('start_date'),
            'task_name_id' => $this->input->post('task_name'),
            'planned_effort' => $this->input->post('planned_effort'),
            'planned_start_date' => $this->input->post('planned_start_date'),
            'planned_end_date' => $this->input->post('planned_end_date'),
            'mon_p' => $this->input->post('mon_p'),
            'mon_a' => $this->input->post('mon_a'),
            'tue_p' => $this->input->post('tue_p'),
            'tue_a' => $this->input->post('tue_a'),
            'wen_p' => $this->input->post('wen_p'),
            'wen_a' => $this->input->post('wen_a'),
            'thu_p' => $this->input->post('thu_p'),
            'thu_a' => $this->input->post('thu_a'),
            'fri_p' => $this->input->post('fri_p'),
            'fri_a' => $this->input->post('fri_a'),
            'sat_p' => $this->input->post('sat_p'),
            'sat_a' => $this->input->post('sat_a'),
            'sun_p' => $this->input->post('sun_p'),
            'sun_a' => $this->input->post('sun_a'),
            'project_id' => $this->input->post('project'),
        );

        $this->User_Model->saveTask($task);

        redirect('user/addTaskIndex');
    }

    public function dashboardIndex()
    {
        $this->load->view('dashboard_staff');
    }

    public function profileIndex() 
    {
        $this->load->view('profile');
    }

    public function taskIndex() 
    {
        $data['projects'] = $this->User_Model->getProjectNames();
        $data['task_names'] = $this->User_Model->getTask();
        $this->load->view('Task', $data);
    }

    public function addNewTask()
    {
        $newTask = array(
            'task_name' => $this->input->post('task_name'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'project_id' => $this->input->post('project'),
        );

        $this->User_Model->saveAddTask($newTask);

        redirect('user/taskIndex');
    }
}
