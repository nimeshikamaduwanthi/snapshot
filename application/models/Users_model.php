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
		
		public function addtask() {

			// $addtaskProject = array(
			// 	'project_name'=>$project
			// );
			// $this->db->insert('projects', $addtaskData);
		}

		// function fetch_projects()
    //     {

    //         // $this->db->order_by('Pname','ASC');
    //         $query = $this->db->get('projects');
    //         if ($query->num_rows() > 0) {
    //             return $query->result();
    //         }
    //     }

	}
?>