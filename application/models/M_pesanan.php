<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesanan extends CI_Model {

    public function __construct()
    {
        $this->load->database(); // Load database
    }

    // Fungsi untuk mendapatkan semua pesanan
    public function get_all_bookings($id_tamu)
    {
        $this->db->where('id_tamu', $id_tamu);
        $query = $this->db->get('pemesanan'); // Mengambil data dari tabel 'pemesanan'
        return $query->result_array(); // Mengembalikan hasil sebagai array
    }
}
