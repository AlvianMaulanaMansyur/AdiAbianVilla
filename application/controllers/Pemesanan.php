<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pemesanan');
        $this->load->model('M_kamar');
    }
    
    public function index()
    {
        $pemesanan = $this->M_pemesanan->getPemesanan();

        $data = [
            'title' => 'Tamu',
            'header' => 'partials/header',
            'content' => 'pemesanan/pemesanan',
            'script' => 'partials/script',
            'pemesanan' => $pemesanan,
        ];
        $this->load->view('partials/main', $data);
    }
    public function createPemesanan() {
        
        $checkin = $this->session->userdata('checkin');
        $checkout = $this->session->userdata('checkout');
        $jumlah_kamar = $this->session->userdata('jumlah_kamar');
        $dewasa = $this->session->userdata('dewasa');
        $anak = $this->session->userdata('anak');
        
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

        $id_pemesanan = $this->M_pemesanan->savePemesanan($dataPemesanan);

        // Simpan id_kamar sesuai dengan jumlah_kamar
        $kamar = $this->M_kamar->ketersediaan($checkin, $checkout); // Ganti dengan fungsi yang sesuai
        $kamar_count = count($kamar);
        $kamar_ids = array_column($kamar, 'id_kamar');

    if ($kamar_count >= $jumlah_kamar) {
        // Jika jumlah kamar tersedia mencukupi
        for ($i = 0; $i < $jumlah_kamar; $i++) {
            $dataKamarPemesanan = array(
                'id_kamar' => $kamar_ids[$i],
                'id_pemesanan' => $id_pemesanan,
            );
            $this->M_pemesanan->saveKamarPemesanan($dataKamarPemesanan);
        }
    } else {
        // Handle kasus ketika kamar tidak tersedia sesuai dengan jumlah yang diminta
        // Misalnya, tampilkan pesan kesalahan atau lakukan tindakan yang sesuai
        // Di sini Anda dapat menambahkan logika untuk menangani kasus di mana jumlah kamar yang diminta lebih besar dari yang tersedia
    }
        redirect('pemesanan/infosukses');
    }
    public function infoSukses() {
        $this->load->view('pemesanan/test');
    }

    public function daftarPemesanan() {
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

     public function editPemesanan($id_pemesanan) {
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

    public function submitEditPemesanan() {
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
            'status' => 0,
            'id_tamu' => $id_tamu,
            'id_admin' => 1,
        );
        // var_dump($dataPemesanan);die;

        $this->M_pemesanan->updatePemesanan($dataPemesanan, $id_pemesanan);

        // Simpan id_kamar sesuai dengan jumlah_kamar
       
        redirect('pemesanan/daftarpemesanan');
    }

    public function deletePemesanan($id_pemesanan) {
        $this->M_pemesanan->deletePemesanan($id_pemesanan);
        redirect('pemesanan/daftarpemesanan');
    }

    public function calendar() {
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

?>