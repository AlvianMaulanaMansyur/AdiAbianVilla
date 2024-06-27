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
        $this->db->select('id_kamar,no_kamar');
        $query = $this->db->get('kamar');
        return $query->result_array();
    }
    public function insertKamar($data)
    {
        return $this->db->insert('kamar', $data);
    }

    public function updateKamar($id_kamar, $data)
    {
        $this->db->where('id_kamar', $id_kamar);
        return $this->db->update('kamar', $data);
    }

    public function deleteKamar($id_kamar)
    {
        $this->db->where('id_kamar', $id_kamar);
        return $this->db->delete('kamar');
    }
}
   




/* End of file M_dashboard.php */
