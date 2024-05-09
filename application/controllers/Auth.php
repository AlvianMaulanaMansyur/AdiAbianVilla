<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      $this->load->model('customer_model');
  }

    public function Register()
    {
    $this->form_validation->set_rules('username', 'Username', 'required|min_length[8]|trim', array(
        'required' => 'username cannot be empty!',
        'min_length' => 'username must be at least 8 characters!',
    ));
    $this->form_validation->set_rules('password', 'Password', 'required', array(
        'required' => 'password cannot be empty!',
    ));
    $this->form_validation->set_rules('email', 'Email', 'required|trim', array(
        'required' => 'email cannot be empty!',
    ));
    
    if ($this->form_validation->run() == False){
      $data = [
        'title' => 'Register',
        'header' => 'partials/header',
        'content' => 'partials/loginRegister/register',
        ];
      $this->load->view('partials/main', $data);

      } else {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');

        $data = array (
          'username' => $username,
          'password' => $password,
          'email' => $email,
        );

        $this->db->insert('tamu', $data);
        redirect('Auth/login');
      }
    }

    public function Login()
    {
          $data = [
              'title' => 'Login',
              'header' => 'partials/header',
              'content' => 'partials/loginRegister/loginCustomer',
          ];
          $this->load->view('partials/main', $data);
    }

    public function process_login()
    {
      $username = $this->input->post('username');
      $password = $this->input->post('password_customer');

      $customer = $this->customer_model->login($username, $password);

      if ($customer){
        $customer_data = array (
          'id_customer' => $customer->id_tamu,
          'logged_in' => true
        );

        $this->session->set_userdata($customer_data);
        redirect('Auth/register');
      } else {
        redirect('Auth/login');
      }
    }
}

/* End of file Controllername.php */

?>