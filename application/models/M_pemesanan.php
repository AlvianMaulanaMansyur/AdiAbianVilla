<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pemesanan extends CI_Model
{
    public function getPemesanan()
    {
        $this->db->select('pemesanan.*');
        $this->db->from('pemesanan');
        // $this->db->where('status', 1);
        $this->db->order_by('tgl_pemesanan', 'DESC');
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
        $this->db->select('pemesanan.id_pemesanan');
        $this->db->from('pemesanan');
        // $this->db->join('tamu', 'tamu.id_tamu = pemesanan.id_tamu
        $this->db->where('id_tamu', $id_tamu);
        $this->db->where('status', 0);
        $result = $this->db->get();
        $pemesanan = $result->result();
        return $pemesanan;
    }

    public function getCookieValues()
    {
        $adults = 0;
        $kids = 0;
        $rooms = 0;

        // Membaca nilai cookie
        $roomsDataJson = get_cookie('roomsData');

        if ($roomsDataJson !== null) {
            // Uraikan JSON menjadi array asosiatif
            $roomsData = json_decode($roomsDataJson, true);

            // Periksa apakah json_decode berhasil
            if (json_last_error() === JSON_ERROR_NONE) {
                foreach ($roomsData as $room) {
                    $adults += intval($room['adults']);
                    $kids += intval($room['kids']);
                    $rooms++;
                }
            } else {
                echo "Error decoding JSON: " . json_last_error_msg();
            }
        } else {
            echo "Cookie 'roomsData' tidak ditemukan.";
        }
        $data = array(
            'adults' => $adults ? $adults : 2,
            'kids' => $kids ? $kids : 0,
            'rooms' => $rooms ? $rooms : 1,
            'checkin' => get_cookie('checkin') ? get_cookie('checkin') : '',
            'checkout' => get_cookie('checkout') ? get_cookie('checkout') : '',
            'availability' => json_decode(get_cookie('availability'), true),
            'kamar' => json_decode(get_cookie('kamar'), true),
        );
        return $data;
    }
    public function savePemesanan($data)
    {
        $this->db->where('id_tamu', $data['id_tamu']);
        $this->db->where('status', 0);
        $query = $this->db->get('pemesanan');

        if ($query->num_rows() > 0) {
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
}

/* End of file M_pemesanan.php */
