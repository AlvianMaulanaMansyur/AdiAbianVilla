<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class customer_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
       
    }

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

    public function verify_pass($email, $password)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('tamu');
        if ($query->num_rows() == 1) {
            $customer = $query->row();
            return password_verify($password, $customer->password);
        } else {
            return FALSE;
        }
    }
}


?>