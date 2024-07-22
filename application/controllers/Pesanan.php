<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pesanan');
        $this->load->model('M_tamu');
    }

    public function index()
    {
        $identity = $this->session->userdata('identity');

        if (!empty($identity)){

            $user = $this->M_tamu->getTamuByEmailUsername($identity);
            $username = $user[0]['nama'];
        
        } else {
            $username = 'Login First!';

        }
        $id_tamu = $this->M_tamu->getIdTamuByEmailUsername($identity);
        $data = [
            'bookings' => $this->M_pesanan->get_all_bookings($id_tamu[0]['id_tamu']),
            'title' => 'Order',
            'header' => 'pesanan/header',
            'navbar' => 'partials/kamar/navbar',
            'script' => 'partials/kamar/script',
            'content' => 'pesanan/daftar_pesanan',
            'username' => $username
        ];
        $this->load->view('partials/kamar/main', $data); // Load view dan kirim data pesanan
    }
}
