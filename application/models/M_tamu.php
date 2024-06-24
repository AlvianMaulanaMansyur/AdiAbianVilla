<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_tamu extends CI_Model {
    public function getTamu()
    {
        $this->db->select('tamu.*');
        $this->db->from('tamu');
        $result = $this->db->get();
        $tamu = $result->result_array();
        return $tamu;
    }
    public function getTamuByEmailUsername($identity)
    {
        $this->db->where('email', $identity['email']);
        $this->db->or_where('username', $identity['username']);
        $query = $this->db->get('tamu');
        return $query->result_array();
    }
}

/* End of file ModelName.php */

?>