<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pesanan'); // Load model pesanan
    }

    public function index()
    {
        $data['bookings'] = $this->M_pesanan->get_all_bookings(); // Mendapatkan semua pesanan
        $this->load->view('pesanan/daftar_pesanan', $data); // Load view dan kirim data pesanan
    }
}
