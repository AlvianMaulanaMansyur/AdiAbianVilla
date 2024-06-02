<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function get_kamar()
    {
        $query = $this->db->get('kamar');
        return $query->result_array();
    }

    public function get_status_ketersediaan()
    {
        $this->db->select('id_kamar,no_kamar,status_ketersediaan');
        $query = $this->db->get('kamar');
        return $query->result_array();
    }

    public function ubah_status_kamar($id_kamar, $status)
    {
        $data = array('status_ketersediaan' => $status);
        $this->db->where('id_kamar', $id_kamar);
        $this->db->update('kamar', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
   




/* End of file M_dashboard.php */
