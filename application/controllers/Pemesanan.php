<?php

/* End of file Controllername.php */


// use function PHPUnit\Framework\isEmpty;

defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pemesanan');
        $this->load->model('M_kamar');
        $this->load->model('M_tamu');
        if ($this->session->userdata('identity') == null) {
            redirect('auth/login');
        }

        if(get_cookie('roomsData') == null || empty(get_cookie('roomsData'))) {
            redirect('kamar');
        }

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
        $email = $this->session->userdata('identity');
        $tamu = $this->M_tamu->getTamuByEmailUsername($email);
        $pemesanan = $this->M_pemesanan->getPemesanan();
        $kamar = $this->M_pemesanan->getCookieValues();
        $harga_kamar = $this->M_kamar->getHargaKamar();
        $data = [
            'title' => 'Order',
            'header' => 'partials/kamar/header',
            'navbar' => 'partials/kamar/navbar',
            'script' => 'partials/kamar/script_pemesanan',
            'content' => 'pemesanan/pemesanan',
            'pemesanan' => $pemesanan,
            'username' => $username,
            'kamar' => $kamar,
            'tamu' => $tamu[0],
            'harga' => $harga_kamar[0]['harga'],
        ];
        $this->load->view('partials/kamar/main', $data);
    }
    public function createPemesanan()
    {
        $id_pemesanan = time();
        $dataCookie = $this->M_pemesanan->getCookieValues();
        $checkin = $dataCookie['checkin'];
        $checkout = $dataCookie['checkout'];
        $dewasa = $dataCookie['adults'];
        $anak = $dataCookie['kids'];
        $jumlah_kamar = $dataCookie['rooms'];
        date_default_timezone_set('Asia/Makassar');
        $current_time = date_create()->format('Y-m-d H:i:s');
        $email = $this->session->userdata('identity');
        $tamu = $this->M_tamu->getIdTamuByEmailUsername($email);
        $jumlah_pembayaran = $this->input->post('jumlah_pembayaran');
        $dataPemesanan = array(
            'id_pemesanan' => $id_pemesanan,
            'tgl_pemesanan' => $current_time,
            'tgl_checkIn' => $checkin,
            'tgl_checkOut' => $checkout,
            'jumlah_kamar' => $jumlah_kamar,
            'dewasa' => $dewasa,
            'anak' => $anak,
            'status' => 0,
            'jumlah_pembayaran' => $jumlah_pembayaran,
            'id_tamu' => $tamu[0]['id_tamu'],
        );

        $cek_pemesanan = $this->M_pemesanan->savePemesanan($dataPemesanan);
        if ($cek_pemesanan == null) {
            $pemesanan =  $this->M_pemesanan->getPemesananByIdTamu($tamu[0]['id_tamu']);
            $response = array(
                'status' => 'Fail',
                'message' => 'Please complete the previous order first',
                'pemesanan' => $pemesanan
            );
            echo json_encode($response);
        } else {
            $pemesanan =  $this->M_pemesanan->getPemesananById($cek_pemesanan);
            $response = array(
                'status' => 'Success',
                'message' => 'Success to make the order',
                'pemesanan' => $pemesanan
            );
            echo json_encode($response);
        }
    }

    public function daftarPemesanan()
    {
        $daftar_pemesanan = $this->M_pemesanan->getPemesanan();
        $data = [
            'title' => 'Tamu',
            'header' => 'partials/header',
            'content' => 'pemesanan/daftar_pemesanan',
            'script' => 'partials/script',
            'pemesanan' => $daftar_pemesanan,
        ];
        $this->load->view('partials/main', $data);
    }

  
}

/* End of file Pemesanan.php */
