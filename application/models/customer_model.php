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

}


?>