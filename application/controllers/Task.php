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
    $this->load->view('task', $data);
}

public function addTask()
{
		$newTask = array(
			  'id' => $this->input->post('id'),
				'task' => $this->input->post('task_name'),
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),
				'project_id' => $this->input->post('project'),
				'status'=>  '1'
		);

		$this->Task_Model->saveTask($newTask);
		$this->index();

}
 
public function updateTask()
    {   
			$task_id = $_POST['id'];
			$task = array(  
				'id' => $this->input->post('id'),
				'task' => $this->input->post('task_name'),
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),
		);

				$this->Task_Model->updateTask($task, $task_id);
				$this->Task_Model->getTask();
				$this->index();

		} 
		
public function deleteTask($id) 
		{       
			$this->Task_Model->deleteTask($id);
			$this->index();

			// redirect('task/index');
		}	

public function taskEditIndex($id) 
{
			$data['task'] = $this->Task_Model->getSelectedTask($id);
      $this->load->view('task_edit', $data);
}
}
?>