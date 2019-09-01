<?php
class User_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); 
    } 

    public function login($email, $password)
    {
        $encripted_pass = password_hash($password, PASSWORD_BCRYPT);

        $query = $this->db->get_where('users', array('email' => $email, $encripted_pass));
        return $query->row_array();
    }

    public function signup($firstName, $lastName, $email, $password)
    {
        $encripted_pass = password_hash($password, PASSWORD_BCRYPT);

        $userData = array(
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'password' => $encripted_pass,
        );

        $this->db->insert('users', $userData);
    }

    public function saveWeeks($data)
    {
        $this->db->insert('weeks', $data);
        return $this->db->insert_id();
    }

    // public function saveProject($data)
    // {
    //     $this->db->insert('projects', $data);
    //     return $this->db->insert_id();
    // }

    public function saveTask($data)
    {
        $this->db->insert('tasks', $data);
        return $this->db->insert_id();
    }

    public function saveAddTask($data)
    {
        $this->db->insert('task_names', $data);
        return $this->db->insert_id();
    }

    public function viewTasks()
    {

        $query = $this->db->query(
					'SELECT P.project_name, TN.task_name, T.planned_effort, T.planned_start_date, T.planned_end_date,
					T.mon_p, T.mon_a, T.tue_p, T.tue_a, T.wen_p, T.wen_a, T.thu_p, T.thu_a, T.fri_p,
					T.fri_a, T.sat_p, T.sat_a, T.sun_p, T.sun_a
					FROM projects P, tasks T, task_names TN
					WHERE P.id = T.project_id
					AND TN.id = T.task_name_id'
					
            // 'SELECT W.start_date, P.project_name, TN.task_name, T.planned_effort, T.planned_start_date, T.planned_end_date,
						// T.mon_p, T.mon_a, T.tue_p, T.tue_a, T.wen_p, T.wen_a, T.thu_p, T.thu_a, T.fri_p,
						// T.fri_a, T.sat_p, T.sat_a, T.sun_p, T.sun_a
						// FROM weeks W, projects P, tasks T, task_names TN
						// WHERE P.id = T.project_id
						// AND TN.id = T.task_name_id
						// AND W.id = T.weeks_id'
        );
        return $query->result_array();
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
