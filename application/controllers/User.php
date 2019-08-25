<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('users_model');
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

        $this->users_model->signup($firstName, $lastName, $email, $password);
        header('location:' . base_url() . $this->index());

    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $data = $this->users_model->login($email, $password);

        if ($email == 'email' && $password == 'password') {
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
        $data['projects'] = $this->users_model->getProjectNames();
        $data['tasks'] = $this->users_model->viewTasks();
        $this->load->view('addTask', $data);
    }

    public function addTask()
    {
        $weeks = array(
            'week_start' => $this->input->post('weekStart'),
            'week_end' => $this->input->post('weekEnd'),
        );

        $this->users_model->saveWeeks($weeks);

        $task = array(
            'task' => $this->input->post('tasks'),
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

        $this->users_model->saveTask($task);

        redirect('user/addTaskIndex');
    }

    public function projectsIndex()
    {
        $data['projects'] = $this->users_model->getProjects();
        $this->load->view('ViewWeekly', $data);
    }

    public function addProject()
    {
        $project = array(
            'code' => $this->input->post('code'),
            'project_name' => $this->input->post('project_name'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
        );

        $this->users_model->saveProject($project);

        $data['projects'] = $this->users_model->getProjects();
        $this->load->view('ViewWeekly', $data);
    }

    // public function dropdown()
    // {
    //     $this->loda->view('addTask');
    // }
}
