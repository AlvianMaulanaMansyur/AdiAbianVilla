<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Tamu extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tamu');
        //Do your magic here
    }
    
    public function index()
    {
        $tamu = $this->M_tamu->getTamu();
        $data = [
            'title' => 'Tamu',
            'header' => 'partials/header',
            'content' => 'tamu/tamu',
            'tamu' => $tamu,
        ];
        $this->load->view('partials/main', $data);
    }

    public function hai() {
        $this->load->view('main');
    }
}

/* End of file Tamu.php */
?>