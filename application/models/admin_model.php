<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class admin_model extends CI_Model {
    
        
        public function __construct()
        {
            parent::__construct();
            //Do your magic here
        }
        
        public function get_data($username, $password)
        {
            $query = $this->db->get_where('admin', array('username' => $username, 'password' => $password));
            return $query->row();
        }
    
    }
    
    /* End of file ModelName.php */
    
?>