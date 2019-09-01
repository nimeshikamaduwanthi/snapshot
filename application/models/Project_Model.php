<?php 
class Project_Model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database(); 
  } 

  public function saveProject($data)
  {
    $this->db->insert('projects', $data);
    return $this->db->insert_id();
  }

  public function getProjects()
  {
    $query = $this->db->get('projects');
    return $query->result_array();
  }
    
  public function getProjectNames()
  {
    $this->db->select('id, project_name');
    $this->db->from('projects');
    $query = $this->db->get();
    return $query->result_array();
  } 
} 
?> 