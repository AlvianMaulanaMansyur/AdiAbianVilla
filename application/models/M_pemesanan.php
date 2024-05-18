<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemesanan extends CI_Model {
    public function getPemesanan()
    {
        $this->db->select('pemesanan.*');
        $this->db->from('pemesanan');
        $result = $this->db->get();
        $pemesanan = $result->result();
        return $pemesanan;
    }

    public function getPemesananById($id_pemesanan)
    {
        $this->db->select('pemesanan.*');
        $this->db->from('pemesanan');
        $this->db->where('id_pemesanan', $id_pemesanan);
        $result = $this->db->get();
        $pemesanan = $result->result();
        return $pemesanan;
    }

   

    public function savePersonalInfo($data) {
        $this->db->insert('tamu', $data);
        return $this->db->insert_id();
    }
    public function savePemesanan($data) {
        $this->db->insert('pemesanan', $data);
        return $this->db->insert_id();
    }
    public function updatePemesanan($data, $id_pemesanan) {
        $this->db->where('id_pemesanan', $id_pemesanan);
        $this->db->update('pemesanan', $data);
    }

    public function deletePemesanan($id_pemesanan) {
        $this->db->where('id_pemesanan', $id_pemesanan);
        $this->db->delete('pemesanan');
    }
    public function saveKamarPemesanan($data) {
        $this->db->insert('kamar_has_pemesanan', $data);
        return $this->db->insert_id();
    }
}

/* End of file M_pemesanan.php */

?>