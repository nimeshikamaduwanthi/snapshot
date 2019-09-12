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
        // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $sql = "SELECT id, first_name, last_name, email, user_type_id
         FROM users WHERE email='$email'
         AND password='$password' 
         AND active_status=1";  

        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function signup($firstName, $lastName, $email, $password)
    {
        // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $userData = array(
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'password' => $password,
            'user_type_id' => '2', 
            'active_status' => true
        );

        $this->db->insert('users', $userData);
    }

    public function getUserDetails()
    {
        $this->db->select('id, first_name, email');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result_array();
    } 

}
