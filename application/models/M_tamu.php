<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_tamu extends CI_Model
{
    public function getTamu()
    {
        $this->db->select('tamu.*');
        $this->db->from('tamu');
        $result = $this->db->get();
        $tamu = $result->result_array();
        return $tamu;
    }
    public function getTamuById($id_tamu)
    {
        $this->db->where('id_tamu', $id_tamu);
        $query = $this->db->get('tamu');
        return $query->row_array();
    }

    public function updateTamu($id_tamu, $data)
    {
        $this->db->where('id_tamu', $id_tamu);
        return $this->db->update('tamu', $data);
    }
}

/* End of file ModelName.php */
