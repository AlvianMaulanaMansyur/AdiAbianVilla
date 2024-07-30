<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tamu');
        $this->load->model('mFasilitas/m_fasilitas');
        
    }

	public function index()
    {

        $identity = $this->session->userdata('identity');

        if (!empty($identity)){
            $user = $this->M_tamu->getTamuByEmailUsername($identity);
            $username = $user[0]['nama'];
        } else {
            $username = 'Please Login First!';
        }
        $fasilitas = $this->m_fasilitas->getAllFasilitas();
        $data = array (
            'username' => 'Welcome, '.$username,
            'fasilitas' => $fasilitas,
        );
        // var_dump($data);
        $this->load->view('home/index', $data);
    }

    public function logout(){
        
       session_destroy();
       redirect('auth/login');
        
    }

    public function about()
    {
        $identity = $this->session->userdata('identity');

        if (!empty($identity)){

            $user = $this->M_tamu->getTamuByEmailUsername($identity);
            $username = $user[0]['nama'];
        
        } else {
            $username = 'Login First!';

        }
        $data = [
            'title' => 'Order',
            'header' => 'partials/kamar/header',
            'navbar' => 'partials/kamar/navbar',
            'script' => 'partials/kamar/script',
            'content' => 'home/about',
            'username' => $username
        ];
        $this->load->view('partials/kamar/main', $data); // Load view dan kirim data pesanan
    }

    public function error_page()
    {
        $this->load->view('error_page');
    }

    public function contact()
    {
        $identity = $this->session->userdata('identity');

        if (!empty($identity)){

            $user = $this->M_tamu->getTamuByEmailUsername($identity);
            $username = $user[0]['nama'];
        
        } else {
            $username = 'Login First!';
        }
        $data = array( 
            'username' => $username
            );
        $this->load->view('home/contact', $data);
    }
}
