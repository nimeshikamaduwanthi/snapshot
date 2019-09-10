<?php
class Task_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); 
    } 
    
    public function saveTask($data)
    {
        $this->db->insert('tasks', $data);
        return $this->db->insert_id();
    }

    public function getTask()
    {
        $query = $this->db->query(
					'SELECT P.project_name, T.task, T.start_date, T.end_date 
					FROM projects P, tasks T 
					WHERE T.project_id = P.id'
				);
        return $query->result_array();
    }
		
    public function getTaskNames()
    {
        $this->db->select('id, task');
        $this->db->from('tasks');
        $query = $this->db->get();
        return $query->result_array();
    } 
}