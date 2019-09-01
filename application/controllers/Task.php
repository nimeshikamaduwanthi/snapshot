<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task extends CI_Controller
{

public function __construct()
{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Project_Model');
		$this->load->model('Task_Model');
}

public function Index() 
{
    $data['projects'] = $this->Project_Model->getProjectNames();
    $data['task_names'] = $this->Task_Model->getTask();
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

		$this->Task_Model->saveAddTask($newTask);

		redirect('task/index');
}
}
?>