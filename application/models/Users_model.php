<?php
	class Users_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function login($email, $password){
			$query = $this->db->get_where('users', array('email'=>$email, 'password'=>$password));
			return $query->row_array();
		}

		public function signup($firstName, $lastName, $email, $password){
			$data = array(
        'first_name'=>$firstName,
        'last_name'=>$lastName,
        'email'=>$email,
        'password'=>$password,
			);
			
			$this->db->insert('users', $data);
		}


		function fetch_projects()
        {

            // $this->db->order_by('Pname','ASC');
            $query = $this->db->get('projects');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }

	}
?>