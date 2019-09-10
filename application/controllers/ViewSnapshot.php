<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ViewSnapshot extends CI_Controller
{  

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User_Model');
        $this->load->model('Task_Model');
        $this->load->model('Project_Model');
        $this->load->model('Snapshot_Model');
    }

    public function index()
    {   
        $data['users'] = $this->User_Model->getUserDetails();
        $data['projects'] = $this->Project_Model->getProjectNames();
        $data['task_names'] = $this->Task_Model->getTaskNames();
				// $date['weeks'] = $this->User_Model->getWeeks();
				// $data['total'] = $this->Snapshot_Model->getTotal();
        $data['tasks'] = $this->ViewSnapshot_Model->viewSnapshotAdmin();
        $this->load->view('view_snapshot', $data);
    }
