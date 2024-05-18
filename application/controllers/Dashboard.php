<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('customer_model');
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

?>