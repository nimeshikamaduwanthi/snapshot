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
     
        $user_id =  $_SESSION['user_id'];
 
        $data['projects'] = $this->Project_Model->getProjectNames();
        $data['task_names'] = $this->Task_Model->getTaskNames();
        $data['snapshots'] = $this->Snapshot_Model->mySnapshots($user_id);
        $this->load->view('snapshot', $data);
    }

    // public function saveWeeks($data)
    // {
    //     $this->db->insert('weeks', $data);
    //     return $this->db->insert_id();
		// }
		
		
		
    public function addSnapshot()
    {
        // $weeks = array(
        //     'start_date' => $this->input->post('weekStart'),
        //     'end_date' => $this->input->post('weekEnd'),
        // );

        // $this->User_Model->saveWeeks($weeks);

        
        $user_id =  $_SESSION['user_id'];

        $total_planned_hours = 0;
        $total_actual_hours = 0;

        if (!empty($_POST['mon_p'])) {
          $total_planned_hours += $_POST['mon_p'];
        } 

        if (!empty($_POST['tue_p'])) {
          $total_planned_hours += $_POST['tue_p'];
        }

        if (!empty($_POST['wen_p'])) {
          echo $_POST['wen_p'] . 'wen_p_value';
          print_r($_POST);
          $total_planned_hours += $_POST['wen_p'];
        }

        if (!empty($_POST['thu_p'])) {
          $total_planned_hours += $_POST['thu_p'];
        }

        if (!empty($_POST['fri_p'])) {
          $total_planned_hours += $_POST['fri_p'];
        }
        
        if (!empty($_POST['sat_p'])) {
          $total_planned_hours += $_POST['sat_p'];
        }
        
        if (!empty($_POST['sun_p'])) {
          $total_planned_hours += $_POST['sun_p'];
        }

        if (!empty($_POST['mon_a'])) {
          $total_actual_hours += $_POST['mon_a'];
        }

        if (!empty($_POST['tue_a'])) {
          $total_actual_hours += $_POST['tue_a'];
        }

        if (!empty($_POST['wen_a'])) {
          $total_actual_hours += $_POST['wen_a'];
        }

        if (!empty($_POST['thu_a'])) {
          $total_actual_hours += $_POST['thu_a'];
        } 

        if (!empty($_POST['fri_a'])) {
          $total_actual_hours += $_POST['fri_a'];
        }

        if (!empty($_POST['sat_a'])) {
          $total_actual_hours += $_POST['sat_a'];
        } 

        if (!empty($_POST['sun_a'])) {
          $total_actual_hours += $_POST['sun_a'];
        }
        
         
        
        $task = array(
            'start_date' => $this->input->post('start_date'),
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
            'total_planned' => $total_planned_hours,
            'total_actual' => $total_actual_hours,
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