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
}

/* End of file ModelName.php */

?>