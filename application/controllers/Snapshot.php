<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Snapshot extends CI_Controller
{  

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('User_Model');
        $this->load->model('Task_Model');
        $this->load->model('Project_Model');
        $this->load->model('Snapshot_Model');
    } 
  
    public function index()
    {
        $data['projects'] = $this->Project_Model->getProjectNames();
        $data['task_names'] = $this->Task_Model->getTaskNames();
        $data['snapshots'] = $this->Snapshot_Model->mySnapshots();
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

        $user_id =  $_SESSION['user_id'];
				
        $task = array(
            // 'weeks_id' => $this->input->post('start_date'),
            'task_id' => $this->input->post('task_name'),
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
						'user_id' => $user_id ,	
        );
				

				$this->Snapshot_Model->saveSnapshot($task);
				redirect('snapshot/index');
		}
		  
    public function getAllSnapshots()
    {
        $data['snapshots'] = $this->Snapshot_Model->getAllSnapshots();
        $this->load->view('view_snapshot', $data);
    }		
  } 