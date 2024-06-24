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
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
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
        redirect('dashboard/statusketersediaan');
    }
    public function ada_status($id_kamar)
    {
        $this->M_dashboard->ubah_status_kamar($id_kamar, 1);
        redirect('dashboard/statusketersediaan');
    }
    public function test()
    {
        $this->load->view('dashboard/main');
    }

    public function statusketersediaan()
    {
        $kamar = $this->M_dashboard->get_kamar();
        $data = [
            'title' => 'Adi Abian Villa Dashboard',
            'header' => 'dashboard/header',
            'navbar' => 'dashboard/navbar',
            'sidebar' => 'dashboard/sidebar',
            'content' => 'dashboard/statuskamar',
            'footer' => 'dashboard/footer',
            'script' => 'dashboard/script',
            'kamar' => $kamar
        ];
        $this->load->view('dashboard/main', $data);
    }
    public function tambahkamar()
    {
        $kamar = $this->M_dashboard->get_kamar();
        $data = [
            'title' => 'Adi Abian Villa Dashboard',
            'header' => 'dashboard/header',
            'navbar' => 'dashboard/navbar',
            'sidebar' => 'dashboard/sidebar',
            'content' => 'dashboard/tambahkamar',
            'footer' => 'dashboard/footer',
            'script' => 'dashboard/script',
            'kamar' => $kamar
        ];
        $this->load->view('dashboard/main', $data);
    }

    public function addKamar()
    {
        $this->form_validation->set_rules('no_kamar', 'No Kamar', 'required');
        $this->form_validation->set_rules('harga_kamar', 'Harga Kamar', 'required');
        $this->form_validation->set_rules('tipe_kamar', 'Tipe Kamar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = ['status' => false, 'message' => validation_errors()];
            echo json_encode($response);
        } else {
            $data = [
                'no_kamar' => $this->input->post('no_kamar'),
                'harga_kamar' => $this->input->post('harga_kamar'),
                'tipe_kamar' => $this->input->post('tipe_kamar'),
                'id_admin' => 1
            ];
            $insert = $this->M_dashboard->insertKamar($data);
            if ($insert) {
                $response = ['status' => true, 'message' => 'Kamar berhasil ditambahkan'];
            } else {
                $response = ['status' => false, 'message' => 'Gagal menambahkan kamar'];
            }
            echo json_encode($response);
        }
    }

    public function editKamar()
    {
        $this->form_validation->set_rules('id_kamar', 'ID Kamar', 'required');
        $this->form_validation->set_rules('no_kamar', 'No Kamar', 'required');
        $this->form_validation->set_rules('harga_kamar', 'Harga Kamar', 'required');
        $this->form_validation->set_rules('tipe_kamar', 'Tipe Kamar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = ['status' => false, 'message' => validation_errors()];
            echo json_encode($response);
        } else {
            $id_kamar = $this->input->post('id_kamar');
            $data = [
                'no_kamar' => $this->input->post('no_kamar'),
                'harga_kamar' => $this->input->post('harga_kamar'),
                'tipe_kamar' => $this->input->post('tipe_kamar')
            ];
            $update = $this->M_dashboard->updateKamar($id_kamar, $data);
            if ($update) {
                $response = ['status' => true, 'message' => 'Kamar berhasil diubah'];
            } else {
                $response = ['status' => false, 'message' => 'Gagal mengubah kamar'];
            }
            echo json_encode($response);
        }
    }

    public function deleteKamar()
    {
        $id_kamar = $this->input->post('id_kamar');
        $delete = $this->M_dashboard->deleteKamar($id_kamar);
        if ($delete) {
            $response = ['status' => true, 'message' => 'Kamar berhasil dihapus'];
        } else {
            $response = ['status' => false, 'message' => 'Gagal menghapus kamar'];
        }
        echo json_encode($response);
    }
}

/* End of file Controllername.php */
