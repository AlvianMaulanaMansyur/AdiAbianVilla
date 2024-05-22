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

    
    $data = [
      'title' => 'Login',
      'header' => 'partials/header',
      'content' => 'partials/loginRegister/loginCustomer',
      'script' => 'partials/script',

    ];
    $this->load->view('partials/main', $data);
  }

  public function check_email()
  {
    $email = $this->input->post('email');
    $exist =  $this->customer_model->check_email_exists($email);
    echo json_encode(['existed' => $exist]);
  }

  public function create_password()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $result = $this->customer_model->create_password($email, $password);
    if ($result) {
      echo json_encode(['status' => 'success', 'message' => 'Account created successfully.']);
  } else {
      echo json_encode(['status' => 'error', 'message' => 'Failed to create account.']);
  }
  }

  
  public function process_login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $is_valid = $this->customer_model->verify_pass($email, $password);

    if ($is_valid){
      $customer_data = array(
        'id_tamu' => $is_valid->id_tamu,
        'logged_in' => true
      );
      
      $this->session->set_userdata($customer_data);
      print('halo');
    } else{

    }
      // $customer = $this->customer_model->get_username($username, $password);
      // // var_dump($customer);

      // if ($customer) {
      //   $customer_data = array(
      //     'id_tamu' => $customer->id_tamu,
      //     'username' => $customer->username,
      //     'logged_in' => true
      //   );

      //   $this->session->set_userdata($customer_data);
      //   redirect('Auth/Register');
      // } else {
      //   redirect('Auth/Login');
      // }
  }
}

/* End of file Controllername.php */
