<?php
class Users_model extends CI_Model
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

    public function saveProject($data)
    {
        $this->db->insert('projects', $data);
        return $this->db->insert_id();
    }

    public function saveTask($data)
    {
        $this->db->insert('tasks', $data);
        return $this->db->insert_id();
    }

    public function viewTasks()
    {
        $query = $this->db->query(
            'SELECT T.task, T.planned_effort, T.planned_start_date, T.planned_end_date,
						T.mon_p, T.mon_a, T.tue_p, T.tue_a, T.wen_p, T.wen_a, T.thu_p, T.thu_a, T.fri_p,
						T.fri_a, T.sat_p, T.sat_a, T.sun_p, T.sun_a, P.project_name
						FROM tasks T LEFT JOIN projects P
						ON T.project_id = P.id'
        );
        return $query->result_array();
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
