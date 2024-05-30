<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

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

    if ($this->form_validation->run() == False) {
      $data = [
        'title' => 'Register',
        'header' => 'partials/header',
        'content' => 'partials/loginRegister/register',
        'script' => 'partials/script',

      ];
      $this->load->view('partials/main', $data);
    } else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $email = $this->input->post('email');

      $data = array(
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

    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

    if ($this->form_validation->run() === FALSE) {
      # code...
      $data = [
        'title' => 'Login',
        'header' => 'partials/header',
        'content' => 'partials/loginRegister/loginCustomer',
        'script' => 'partials/script',
      ];
    } else {
      $email = $this->input->post('email');
      if ($this->customer_model->check_email_exists($email)) {
        $data = [
          'title' => 'Login',
          'header' => 'partials/header',
          'email' => $email,
          'content' => 'partials/loginRegister/formPass',
          'script' => 'partials/script',
        ];
      } else {
        $data = [
          'title' => 'Login',
          'email' => $email,
          'header' => 'partials/header',
          'content' => 'partials/loginRegister/createPass',
          'script' => 'partials/script',
        ];
      }
    }
    $this->load->view('partials/main', $data);
  }

  public function verify_password()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == FALSE)
    {
      redirect('auth/login');
    } else {
      $email = $this->input->post('email');
      $password = $this->input->post('password');

      if ($this->customer_model->verify_pass($email, $password))
      {
        redirect('auth/register');
      } else {
        $data = [
          'title' => 'Login',
          'email' => $email,
          'header' => 'partials/header',
          'content' => 'partials/loginRegister/formPass',
          'script' => 'partials/script',
          'error' => 'Incorect Password'
        ];
      } 
    }
    $this->load->view('partials/main', $data);
  }

  public function createPass(){
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == FALSE) {
      # code...
      redirect('auth/login');
    } else {
      # code...
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      
      $data = [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
      ];
      $this->db->insert('tamu', $data);
      redirect('mainmenu');
    }
  } 
}

/* End of file Controllername.php */
