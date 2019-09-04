<?php
class Admin_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); 
    } 

    public function login($email, $password)
    {
        $encripted_pass = password_hash($password, PASSWORD_BCRYPT);

        $query = $this->db->get_where('admin', array('email' => $email, $encripted_pass));
        return $query->row_array();
    }

    public function signup($firstName, $lastName, $email, $password)
    {
        $encripted_pass = password_hash($password, PASSWORD_BCRYPT);

        $adminData = array(
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'password' => $encripted_pass,
        );

        $this->db->insert('admin', $adminData);
    }

    // class Loginmodel extends CI_Model {
 
    //     public function login_valid($username, $password) {
     
    //         $password = md5($password);
    //         $q = $this->db->where(['admin_name' => $username, 'admin_password' => $password])
    //                 ->get('admin');
    //         if ($q->num_rows) {
                    
    //             return $q->row()->id;
    //             //return TRUE;
    //         } else {
    //             return FALSE;
    //         }
    //     }
     