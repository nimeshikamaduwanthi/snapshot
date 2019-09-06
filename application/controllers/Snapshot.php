<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Snapshot extends CI_Controller
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
        $data['projects'] = $this->Project_Model->getProjectNames();
        $data['task_names'] = $this->Task_Model->getTaskNames();
        // $date['weeks'] = $this->User_Model->getWeeks();
        $data['tasks'] = $this->Snapshot_Model->viewTasks();
        $this->load->view('snapshot', $data);
    }

    public function saveWeeks($data)
    {
        $this->db->insert('weeks', $data);
        return $this->db->insert_id();
    }

    public function addSnapshot()
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

        $this->Snapshot_Model->saveTask($task);

        redirect('snapshot/index');
    }

    // public function getWeeks()
		// {
		// 	$query = $this->db->get('weeks');
		// 	return $query->result_array();
		// }

		// public function getWeekStartDate() 
		// {
		// 	$this->db->select('id, start_date');
		// 	$this->db->from('weeks');
		// 	$query = $this->db->get();
		// 	return $query->result_array();
        // }
        
        public function viewSnapshotIndex()
        {
            $data['users'] = $this->User_Model->getUserDetails();
            $data['tasks'] = $this->Snapshot_Model->viewTasks();
            $this->load->view('view_snapshot', $data);
        }
    }