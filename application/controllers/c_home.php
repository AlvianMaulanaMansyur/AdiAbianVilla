<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tamu');
    }

	public function index()
    {
        $identity = $this->session->userdata('identity');

        if (!empty($identity)){

            $user = $this->M_tamu->getTamuByEmailUsername($identity);
            // var_dump($user);
            $data = array(
            'username' => 'Welcome, '.$user[0]['nama']
            );
        } else {
            $data = array (
                'username' => 'Please Login First!'
            );
        }
        // var_dump($data);
        $this->load->view('home/index', $data);
    }

    public function logout(){
        
       session_destroy();
       redirect('auth/login');
        
    }

    public function about()
    {
        $this->load->view('home/about');
        
    }
}
