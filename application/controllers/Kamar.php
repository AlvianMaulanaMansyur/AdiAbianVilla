<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kamar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kamar');
        if ($this->session->userdata('identity') == null) {
            redirect('auth/login');
        }
    }

    public function easepick() {
        $this->load->view('kamar/easepick', FALSE);
        
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
        $data = [
            'title' => 'Calendar',
            'header' => 'partials/header_kamar',
            'content' => 'kamar/ketersediaan',
            'script' => 'partials/script',
            'kamar' => $datacheck,
            'harga' => $harga_kamar[0]['harga'],
        ];
        $this->load->view('partials/main', $data);
    }
    public function ketersediaanKamar()
    {
        if ($this->input->is_ajax_request()) {
            $dateRange = $this->input->post('dateRange');
            $dates = explode(' - ', $dateRange);
            $checkin = date('Y-m-d', strtotime($dates[0]));
            $checkout = date('Y-m-d', strtotime($dates[1]));

            $cookie_duration = 86400; // 86400 detik = 1 hari

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

            $ketersediaan = $this->M_kamar->ketersediaan($checkin, $checkout);
            // $detail_ketersediaan = $this->M_kamar->detailKetersediaan($checkin, $checkout);
            // $real_ketersediaan = $this->M_kamar->gabungKetersediaan($checkin, $checkout);

            $this->session->set_userdata('availability', $ketersediaan);

            // $tampil = $this->M_kamar->tampilkamar();
            // var_dump($detail_ketersediaan);
            $response = array(
                'status' => 'success',
                'message' => 'Data ketersediaan kamar berhasil diambil',
                'dateRange' => $dateRange,
                'availability' => $ketersediaan,
                // 'detail' => $detail_ketersediaan,
                // 'real' => $real_ketersediaan,
            );

            echo json_encode($response);
        } else {
            show_error('Forbidden', 403);
        }
    }
}

/* End of file Kamar.php */
