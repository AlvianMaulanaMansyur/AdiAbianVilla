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
        
        if (empty($this->session->userdata('username'))) {
            redirect('Authadmin/login');
        }
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
    public function detailketersediaan()
    {
        
    }

    public function guestdata()
    {

        $guest = $this->customer_model->get_data_tamu();
        $data = [
            'title' => 'Guest Data',
            'header' => 'dashboard/header',
            'navbar' => 'dashboard/navbar',
            'sidebar' => 'dashboard/sidebar',
            'content' => 'dashboard/guestdata',
            'footer' => 'dashboard/footer',
            'script' => 'dashboard/script',
            'guest' => $guest,
        ];

        $this->load->view('dashboard/main', $data);
    }

    public function edit() {
        $id_tamu = $this->input->post('id_tamu');
        $data = [
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'no_telp' => $this->input->post('phone'),
            'jenis_kelamin' => $this->input->post('gender'),
            'negara' => $this->input->post('nationality')
        ];
        $this->customer_model->update_guest($id_tamu, $data);

        // Set flash data untuk notifikasi
        $this->session->set_flashdata('success', 'Data berhasil diperbarui!');
        redirect('Dashboard/guestData');
    }

}

/* End of file Controllername.php */
 