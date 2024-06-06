<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('customer_model');
    }

    public function main()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        } else {
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
}

/* End of file Controllername.php */
