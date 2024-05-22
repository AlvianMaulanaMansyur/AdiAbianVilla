<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class customer_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
       
    }

    // public function get_data_tamu($id_tamu)
    // {
    //     // ngambil data customer di database
    //     $this->db->where('id_tamu', $id_tamu);
    //     $query = $this->db->get('tamu');

    //     // disimpan dalam bentuk array dan dikembalikan 
    //     $query = $query->result_array();
    //     return $query [0];
    // }

    public function get_data_tamu(){
        return $this->db->get('tamu')->result_array();
    }

    public function get_username($username, $password)
    {
        $query= $this->db->get_where('tamu', array('username' => $username, 'password' => $password));
        return $query->result_array();
    }

    public function check_email_exists($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('tamu');
        return $query->num_rows() > 0 ;
    }

    public function create_password($email, $password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $data = array (
            'email' => $email,
            'password' => $hash
        );
        return $this->db->insert('tamu', $data);
    }

    public function verify_pass($email, $password)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('tamu');
        $user = $query->row();

        if ($user && password_verify($password, $user->password))
        {
            return $user;
        } else {
            return false;
        }
    }

}


?>