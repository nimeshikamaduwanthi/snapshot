<?php
	class Users_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function login($email, $password){
			$encripted_pass = password_hash($password, PASSWORD_BCRYPT);

			$query = $this->db->get_where('users', array('email'=>$email, $encripted_pass));
			return $query->row_array();
		}

		public function signup($firstName, $lastName, $email, $password) {
			$encripted_pass = password_hash($password, PASSWORD_BCRYPT);

			$userData = array(
        'first_name'=>$firstName,
        'last_name'=>$lastName,
        'email'=>$email,
        'password'=>$encripted_pass
			);
			
			$this->db->insert('users', $userData);
		}
		
		public function saveWeeks($data) {
			$this->db->insert('weeks', $data);
			return $this->db->insert_id();
		}

		public function saveProject($data) {
			$this->db->insert('projects', $data);
			return $this->db->insert_id();
		}

		public function saveTask($data) {
			$this->db->insert('tasks', $data);
			return $this->db->insert_id();
		}

		public function viewTasks() {
			$query = $this->db->get('tasks');
			return $query->result_array();

			$query = $this->db->get('weeks');
			return $query->result_array();
			// $query = $this->db->get('project_name');
			// return $query->result_array();
		}

		
	}
?>