<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pemesanan extends CI_Model
{
    public function getPemesanan()
    {
        $this->db->select('pemesanan.*');
        $this->db->from('pemesanan');
        // $this->db->where('status', 1);
        $result = $this->db->get();
        $pemesanan = $result->result();
        return $pemesanan;
    }

    public function getPemesananById($id_pemesanan)
    {
        $this->db->where('id_pemesanan', $id_pemesanan);
        $result = $this->db->get('pemesanan');
        $pemesanan = $result->result();
        return $pemesanan;
    }

    public function getPemesananByIdTamu($id_tamu)
    {
        $this->db->where('id_tamu', $id_tamu);
        $this->db->where('status', 0);
        $result = $this->db->get('pemesanan');
        $pemesanan = $result->result();
        return $pemesanan;
    }

    

    public function getSessionValues()
    {
        $data = array(
            'adults' => get_cookie('adults') ? get_cookie('adults') : 2,
            'kids' => get_cookie('kids') ? get_cookie('kids') : 0,
            'rooms' => get_cookie('rooms') ? get_cookie('rooms') : 2,
            'checkin' => get_cookie('checkin') ? get_cookie('checkin') : '',
            'checkout' => get_cookie('checkout') ? get_cookie('checkout') : '',
        );

        return $data;
    }
    public function getCookieValues()
    {
        $data = [
            'username' => get_cookie('username') ? get_cookie( 'username' ) : '',
            'email' => get_cookie('email') ? get_cookie('email') : '',
            'no_telp' => get_cookie('no_telp') ? get_cookie('no_telp') : '',
            'negara' => get_cookie('negara') ? get_cookie('negara') : 'Pilih Negara',
            'jenis_kelamin' => get_cookie('jenis_kelamin') ? get_cookie('jenis_kelamin') : '',
        ];

        return $data;
    }


    public function savePersonalInfo($data)
    {
        $this->db->where('email', $data['email']);
        $this->db->or_where('username', $data['username']);
        $query = $this->db->get('tamu');
        $result = $query->result_array();

        if ($query->num_rows() > 0) {
            return $result[0]['id_tamu'];
        } else {
            $this->db->insert('tamu', $data);
            return $this->db->insert_id();
        }
    }
    public function savePemesanan($data)
    {
        $this->db->where('pemesanan.id_tamu', $data['id_tamu']);
        $this->db->where('pemesanan.status', 0);

        $query = $this->db->get('pemesanan');
        
        if($query->num_rows()>0) {
            return null;
        } else {
            $this->db->insert('pemesanan', $data);
            return $this->db->insert_id();
        }
        
    }
    public function updatePemesanan($id_pemesanan, $data)
    {
        $this->db->where('id_pemesanan', $id_pemesanan);
        return $this->db->update('pemesanan', $data);
    }
    public function deletePemesanan($id_pemesanan)
    {
        $this->db->where('id_pemesanan', $id_pemesanan);
        $this->db->delete('pemesanan');
    }
    public function saveKamarPemesanan($data)
    {
        return $this->db->insert('kamar_has_pemesanan', $data);
        // return $this->db->insert_id();
    }
}

/* End of file M_pemesanan.php */
