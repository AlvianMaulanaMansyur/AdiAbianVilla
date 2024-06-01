<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_home extends CI_Controller {

	public function index()
    {
        $data = [
            'title' => 'Home',
            'header' => 'partials/header',
            'content' => 'home/binoPBL',
            'script' => 'partials/script'
        ];
        $this->load->view('partials/main', $data);
    }
}
