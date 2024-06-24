<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kamar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kamar');
    }

    public function ketersediaan2()
    {
        $this->load->view('kamar/ketersediaan2');
    }

    public function index()
    {
        $harga_kamar = $this->M_kamar->getHargaKamar();
        $checkin = $this->input->cookie('checkin', TRUE);
        $checkout = $this->input->cookie('checkout', TRUE);

        $datacheck = array(
            'checkin' => $checkin ? $checkin : '',
            'checkout' => $checkout ? $checkout : ''
        );
        // $datacheck = array(
        //     'checkin' => $this->session->userdata('checkin') ? $this->session->userdata('checkin') : '',
        //     'checkout' => $this->session->userdata('checkout') ? $this->session->userdata('checkout') : '',
        // );
        $data = [
            'title' => 'Calendar',
            'header' => 'partials/header',
            'content' => 'kamar/ketersediaan',
            'script' => 'partials/script',
            'kamar' => $datacheck,
            'harga' => $harga_kamar[0]['harga'],
        ];
        $this->load->view('partials/main', $data);
    }
    public function carousel()
    {
        $data = [
            'title' => 'Calendar',
            'header' => 'partials/header',
            'content' => 'kamar/carousel',
            'script' => 'partials/script'
        ];
        $this->load->view('kamar/carousel', $data);
    }
    public function ketersediaanKamar()
    {
        // $kamar = $this->M_kamar->getKamarByTime();

        if ($this->input->is_ajax_request()) {
            // Ambil data tanggal dari permintaan
            $dateRange = $this->input->post('dateRange');
            // var_dump($dateRange);
            $dates = explode(' - ', $dateRange);
            $checkin = date('Y-m-d', strtotime($dates[0]));
            $checkout = date('Y-m-d', strtotime($dates[1]));

            // Atur durasi cookie (misalnya, 1 hari)
            $cookie_duration = 86400; // 86400 detik = 1 hari

            // Tetapkan cookie untuk 'checkin' dan 'checkout'
            $cookie_checkin = array(
                'name'   => 'checkin',
                'value'  => $checkin,
                'expire' => $cookie_duration,
                'path'   => '/'
            );
            $cookie_checkout = array(
                'name'   => 'checkout',
                'value'  => $checkout,
                'expire' => $cookie_duration,
                'path'   => '/'
            );

            $this->input->set_cookie($cookie_checkin);
            $this->input->set_cookie($cookie_checkout);
            // $this->session->set_userdata('checkin', $checkin);
            // $this->session->set_userdata('checkout', $checkout);

            $ketersediaan = $this->M_kamar->ketersediaan($checkin, $checkout);
            $detail_ketersediaan = $this->M_kamar->detailKetersediaan($checkin, $checkout);
            $real_ketersediaan = $this->M_kamar->gabungKetersediaan($checkin, $checkout);

            $this->session->set_userdata('availability', $ketersediaan);

            $tampil = $this->M_kamar->tampilkamar();
            // var_dump($detail_ketersediaan);
            $response = array(
                'status' => 'success',
                'message' => 'Data ketersediaan kamar berhasil diambil',
                'dateRange' => $dateRange,
                'availability' => $ketersediaan,
                'detail' => $detail_ketersediaan,
                'real' => $real_ketersediaan,
                'tampil' => $tampil
            );

            echo json_encode($response);
        } else {
            // Jika bukan permintaan AJAX, mungkin akan lebih baik melempar error
            show_error('Forbidden', 403);
        }
    }
    public function dataKamar()
    {
        $dewasa = $this->input->post('dewasa');
        $anak = $this->input->post('jumlah_kamar');
        $jumlah_kamar = $this->input->post('jumlah_kamar');

        $this->session->set_userdata('jumlah_kamar', $jumlah_kamar);
        $this->session->set_userdata('dewasa', $dewasa);
        $this->session->set_userdata('anak', $anak);

        redirect('pemesanan');
    }

    public function datepicker()
    {
        $this->load->view('kamar/lightpick',);
    }

    public function sessionRooms()
    {
        $adults = $this->input->post('adults');
        $kids = $this->input->post('kids');
        $rooms = $this->input->post('rooms');

        // Store data in session
        $this->session->set_userdata('adults', $adults);
        $this->session->set_userdata('kids', $kids);
        $this->session->set_userdata('rooms', $rooms);

        // Return data as JSON response
        $response = array(
            'adults' => $adults,
            'kids' => $kids,
            'rooms' => $rooms
        );
        echo json_encode($response);
    }

    public function getSessionValues()
    {
        // Mengambil nilai dari session
        $data = array(
            'adults' => $this->session->userdata('adults') ? $this->session->userdata('adults') : 2,
            'kids' => $this->session->userdata('kids') ? $this->session->userdata('kids') : 0,
            'rooms' => $this->session->userdata('rooms') ? $this->session->userdata('rooms') : 1,
            'checkin' => $this->session->userdata('checkin') ? $this->session->userdata('checkin') : '',
            'checkout' => $this->session->userdata('checkout') ? $this->session->userdata('checkout') : '',
        );

        // Mengirimkan respon dalam format JSON
        echo json_encode($data);
    }
}

/* End of file Kamar.php */
