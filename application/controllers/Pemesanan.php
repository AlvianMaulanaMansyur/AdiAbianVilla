<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pemesanan');
        $this->load->model('M_kamar');
    }

    public function index()
    {
        $pemesanan = $this->M_pemesanan->getPemesanan();
        $kamar = $this->M_pemesanan->getSessionValues();
        $data_pribadi = $this->M_pemesanan->getCookieValues();
        // var_dump($data_pribadi);die;
        $harga_kamar = $this->M_kamar->getHargaKamar();
        $data = [
            'title' => 'Tamu',
            'header' => 'partials/header',
            'content' => 'pemesanan/pemesanan',
            'script' => 'partials/script',
            'pemesanan' => $pemesanan,
            'kamar' => $kamar,
            'tamu' => $data_pribadi,
            'harga' => $harga_kamar[0]['harga_kamar'],
        ];
        $this->load->view('partials/main', $data);
    }
    public function createPemesanan()
    {
        $checkin = $this->session->userdata('checkin');
        $checkout = $this->session->userdata('checkout');
        $jumlah_kamar = $this->session->userdata('rooms') ? $this->session->userdata('rooms') : 1;
        $dewasa = $this->session->userdata('adults') ? $this->session->userdata('adults') : 2;
        $anak = $this->session->userdata('kids') ? $this->session->userdata('kids') : 0;

        $current_time = date_create()->format('Y-m-d H:i:s');
        $nama = $this->input->post('username');
        $no_telp = $this->input->post('no_telp');
        $email = $this->input->post('email');
        $negara = $this->input->post('negara');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $dataTamu = array(
            'username' => $nama,
            'no_telp' => $no_telp,
            'email' => $email,
            'negara' => $negara,
            'jenis_kelamin' => $jenis_kelamin,
        );
        $expire = 86400;

        // Menyimpan setiap item data sebagai cookie
        foreach ($dataTamu as $key => $value) {
            set_cookie($key, $value, $expire);
        }
        // var_dump($dataTamu);die;

        $id_tamu = $this->M_pemesanan->savePersonalInfo($dataTamu);
        // var_dump($id_tamu);die;

        $dataPemesanan = array(
            'tgl_pemesanan' => $current_time,
            'tgl_checkIn' => $checkin,
            'tgl_checkOut' => $checkout,
            'jumlah_kamar' => $jumlah_kamar,
            'dewasa' => $dewasa,
            'anak' => $anak,
            'status' => 0,
            'id_tamu' => $id_tamu,
            'id_admin' => 1,
        );
        // var_dump($dataPemesanan);die;

        $cek_pemesanan = $this->M_pemesanan->savePemesanan($dataPemesanan);
        if ($cek_pemesanan == null) {
            $pemesanan =  $this->M_pemesanan->getPemesananByIdTamu($id_tamu);
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
        // redirect('pemesanan/payment');
    }
    public function Payment($id_pemesanan)
    {
        $pemesanan = $this->M_pemesanan->getPemesananById($id_pemesanan);
        $data = [
            'title' => 'Tamu',
            'header' => 'partials/header',
            'content' => 'pemesanan/pembayaran',
            'script' => 'partials/script',
            'pemesanan' => $pemesanan[0]
        ];
        $this->load->view('partials/main', $data);
    }

    public function Pay($id_pemesanan)
    {
        $status = $this->input->post('status');
        $data = array(
            'status' => $status
        );
        $pemesanan = $this->M_pemesanan->updatePemesanan($id_pemesanan, $data);
        if ($pemesanan) {
            $response = array(
                'status' => 'Success',
                'message' => 'Payment Success',
                'availability' => $this->session->userdata('availability'),
            );
        } else {
            $response = array(
                'status' => 'Fail',
                'message' => 'Payment Failed'
            );
        }

        echo json_encode($response);
    }
    public function PaySuccess($id_pemesanan) {
        $availability = $this->session->userdata('availability');
        $getIdKamar = $availability[0]->id_kamar;
        // var_dump($getIdKamar);
        $data = array(
            'id_kamar' => $getIdKamar,
            'id_pemesanan' => $id_pemesanan,
        );
        $data_id = $this->M_pemesanan->saveKamarPemesanan($data);
        if($data_id) {
            $status = 'success';
        } else {
            $status = 'failed';
        }
        echo json_encode($status);
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

    public function editPemesanan($id_pemesanan)
    {
        $pemesanan = $this->M_pemesanan->getPemesananById($id_pemesanan);
        $data = [
            'title' => 'Tamu',
            'header' => 'partials/header',
            'content' => 'pemesanan/edit_pemesanan',
            'script' => 'partials/script',
            'pemesanan' => $pemesanan,
        ];
        $this->load->view('partials/main', $data);
    }

    public function submitEditPemesanan()
    {
        $id_pemesanan = $this->input->post('id_pemesanan');
        $checkin = $this->input->post('tgl_checkIn');
        $checkout = $this->input->post('tgl_checkOut');
        $jumlah_kamar = $this->input->post('jumlah_kamar');
        $dewasa = $this->input->post('dewasa');
        $anak = $this->input->post('anak');
        $id_tamu = $this->input->post('id_tamu');

        // var_dump($id_tamu);die;

        $dataPemesanan = array(
            // 'tgl_pemesanan' => $current_time,
            'tgl_checkIn' => $checkin,
            'tgl_checkOut' => $checkout,
            'jumlah_kamar' => $jumlah_kamar,
            'dewasa' => $dewasa,
            'anak' => $anak,
            'id_tamu' => $id_tamu,
            'id_admin' => 1,
        );
        // var_dump($dataPemesanan);die;

        $this->M_pemesanan->updatePemesanan($id_pemesanan, $dataPemesanan);

        // Simpan id_kamar sesuai dengan jumlah_kamar

        redirect('dashboard/daftarpemesanan');
    }

    public function deletePemesanan($id_pemesanan)
    {
        $this->M_pemesanan->deletePemesanan($id_pemesanan);
        redirect('dashboard/daftarpemesanan');
    }

    public function calendar()
    {
        $data = [
            'title' => 'Calendar',
            'header' => 'partials/header',
            'content' => 'pemesanan/calendar',
        ];
        $this->load->view('partials/main', $data);
        // $this->load->view('pemesanan/calendar');
    }
}

/* End of file Pemesanan.php */
