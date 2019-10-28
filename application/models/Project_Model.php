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

  public function updateProject($data, $project_id)
    {      
      $this->db->where('id', $project_id);
      $this->db->update('projects', $data);
      return;
    }


    public function deleteProject($project_id) 
    {
    $project = array('status' => 1);    
    $this->db->where('id', $project_id);
    $this->db->update('projects', $project); 
      
    }


  public function getSelectedProjects($project_id)
  {
   $this->db->select('id, code, project_name, project_description, start_date, end_date');
    $this->db->from('projects');
    $query = $this->db->get();
    return $query->row_array();
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