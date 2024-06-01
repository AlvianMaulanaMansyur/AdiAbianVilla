<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('customer_model');
        $this->load->model('M_dashboard');
    }
    
    public function main()
    {
        $data = [
            'title' => 'Adi Abian Villa Dashboard',
            'header' => 'dashboard/header',
            'navbar' => 'dashboard/navbar',
            'sidebar' => 'dashboard/sidebar',
            'content' => 'dashboard/test',
            'footer' => 'dashboard/footer',
            'script' => 'dashboard/script'
        ];
        $this->load->view('dashboard/main', $data);
    }

    public function userdata()
    {
        $customer = $this->customer_model->get_data_tamu();
        $data = [
            'title' => 'Guest Data',
            'header' => 'partials/header',
            'content' => 'partials/dashboard/allDataCustomer',
            'customer' => $customer,
        ];

        $this->load->view('partials/main', $data);
    }

    public function index()
    {
        $kamar = $this->M_dashboard->get_status_ketersediaan();
        $data = [
            'title' => 'Calendar',
            'header' => 'partials/header',
            'content' => 'dashboard/main',
            'script' => 'partials/script',
            'kamar' => $kamar,
        ];
        $this->load->view('partials/main', $data);
    }
    public function ubah_status($id_kamar)
    {
        $this->M_dashboard->ubah_status_kamar($id_kamar, 0);
        redirect('dashboard');
    }
    public function ada_status($id_kamar)
    {
        $this->M_dashboard->ubah_status_kamar($id_kamar, 1);
        redirect('dashboard');
    }
    public function test()
    {
        $this->load->view('dashboard/main');
    }
    public function ketersediaankamar()
    {
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
            // var_dump($detail_ketersediaan);
            $response = array(
                'status' => 'success',
                'message' => 'Data ketersediaan kamar berhasil diambil',
                'dateRange' => $dateRange,
                'availability' => $ketersediaan,
                'detail' => $detail_ketersediaan,
                'real' => $real_ketersediaan,
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
}

/* End of file Controllername.php */
