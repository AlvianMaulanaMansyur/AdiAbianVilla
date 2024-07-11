<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Authadmin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }

    public function login()
    {
        $data = [
            'title' => 'Login Admin',
            'header' => 'partials/header',
            'content' => 'partials/loginAdmin/loginAdmin',
            'script' => 'partials/script'
        ];

        $this->load->view('partials/main', $data);
    }

    public function process_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->admin_model->get_data($username, $password);

        if ($admin) {
            $data_admin = array(
                'username' => $username,
                'logged_in' => TRUE,
                'id_admin' => 'id_admin',
            );

            $this->session->set_userdata($data_admin);
            redirect('dashboard/main');
        } else {
            $this->session->set_flashdata('error_message', 'Incorect Username or Password');
            redirect('Authadmin/login');
        }
    }

    public function logout()
    {
        // Hapus data session dan arahkan ke halaman login
        $this->session->unset_userdata('identity');
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('authadmin/login');
    }
}

/* End of file Authadmin.php */
