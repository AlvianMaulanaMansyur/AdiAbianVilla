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
       // Membaca nilai cookie
        
    $roomsDataJson = get_cookie('roomsData');

     // Inisialisasi variabel
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

            //  // Menampilkan hasil
            //  echo "Dewasa: " . $adults . "<br>";
            //  echo "Anak: " . $kids . "<br>";
            //  echo "Kamar: " . $rooms . "<br>";
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
