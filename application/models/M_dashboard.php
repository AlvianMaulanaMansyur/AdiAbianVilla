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
        $this->db->select('detail_kamar.harga,detail_kamar.jenis_kamar,detail_kamar.deskripsi,kamar.no_kamar,kamar.id_kamar');
        $this->db->from('kamar');
        $this->db->join('detail_kamar', 'kamar.id_detail_kamar = detail_kamar.id_detail_kamar', 'left');
        $query = $this->db->get();
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
    public function get_tipe_kamar()
    {
        $query = $this->db->get('detail_kamar');
        return $query->result_array();
    }
    public function editTipeKamar($id_detail_kamar, $data)
    {
        $this->db->where('id_detail_kamar', $id_detail_kamar);
        $this->db->update('detail_kamar', $data);
        return $this->db->affected_rows() > 0;
    }

    public function deleteTipeKamar($id_detail_kamar)
    {
        $this->db->where('id_detail_kamar', $id_detail_kamar);
        return $this->db->delete('detail_kamar');
    }


    public function getIddetailkamar($tipe_kamar)
    {
        $this->db->select('id_detail_kamar');
        $this->db->where('jenis_kamar', $tipe_kamar);
        $this->db->from('detail_kamar');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function insertKamar($data)
    {
        return $this->db->insert('kamar', $data);
    }
    public function inserttipe($data)
    {
        return $this->db->insert('detail_kamar', $data);
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
