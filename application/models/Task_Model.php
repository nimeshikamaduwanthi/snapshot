<?php
class Task_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); 
    } 
    
    public function saveAddTask($data)
    {
        $this->db->insert('task_names', $data);
        return $this->db->insert_id();
    }

    public function getTask()
    {
        $query = $this->db->query(
					'SELECT P.project_name, TN.task_name, TN.start_date, TN.end_date 
					FROM projects P, task_names TN 
					WHERE TN.project_id = P.id'
				);
        return $query->result_array();
    }
		
    public function getTaskNames()
    {
        $this->db->select('id, task_name');
        $this->db->from('task_names');
        $query = $this->db->get();
        return $query->result_array();
    } 
}