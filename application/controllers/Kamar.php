<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kamar');
    }

    public function index()
    {
        $data = [
            'title' => 'Calendar',
            'header' => 'partials/header',
            'content' => 'kamar/ketersediaan',
            'script' => 'partials/script'
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
    public function ketersediaanKamar() {
        // $kamar = $this->M_kamar->getKamarByTime();

        if ($this->input->is_ajax_request()) {
            // Ambil data tanggal dari permintaan
            $dateRange = $this->input->post('dateRange');
            // var_dump($dateRange);
            $dates = explode(' - ', $dateRange);
            $checkin = date('Y-m-d', strtotime($dates[0]));
            $checkout = date('Y-m-d', strtotime($dates[1]));

            $this->session->set_userdata('checkin', $checkin);
            $this->session->set_userdata('checkout', $checkout);

            $ketersediaan = $this->M_kamar->ketersediaan($checkin, $checkout);
            $detail_ketersediaan = $this->M_kamar->detailKetersediaan($checkin, $checkout);
            $real_ketersediaan = $this->M_kamar->gabungKetersediaan($checkin, $checkout);
            // $kamar = $this->M_kamar->getKamar();
            // var_dump($detail_ketersediaan);
            $response = array(
                'status' => 'success',
                'message' => 'Data ketersediaan kamar berhasil diambil',
                'dateRange' => $dateRange,
                'availability' => $ketersediaan,
                'detail' => $detail_ketersediaan,
                'real' => $real_ketersediaan,
                // 'kamar' => $kamar
            );
    
            echo json_encode($response);
        } else {
            // Jika bukan permintaan AJAX, mungkin akan lebih baik melempar error
            show_error('Forbidden', 403);
        }
    }
    public function dataKamar() {
        $dewasa = $this->input->post('dewasa');
        $anak = $this->input->post('jumlah_kamar');
        $jumlah_kamar = $this->input->post('jumlah_kamar');

        $this->session->set_userdata('jumlah_kamar', $jumlah_kamar);
        $this->session->set_userdata('dewasa', $dewasa);
        $this->session->set_userdata('anak', $anak);

        redirect('pemesanan');
    }

    public function datepicker() {
        $this->load->view('kamar/lightpick',);
    }

}

/* End of file Kamar.php */

?>