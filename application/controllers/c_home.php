<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_home extends CI_Controller {

	public function index()
    {
       
        $this->load->view('home/index');
    }

    public function about()
    {
        $this->load->view('home/about');
        
    }
}
