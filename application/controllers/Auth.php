<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('customer_model');
  }

  
  public function Login()
  {
    $this->form_validation->set_rules('identity', 'Username or Email', 'trim|required');

    if ($this->form_validation->run() == FALSE) {
      # code...
      $data = [
        'title' => 'Login',
        'header' => 'partials/header',
        'content' => 'partials/loginRegister/loginCustomer',
        'script' => 'partials/script',
      ];
    } else {
      $identity = $this->input->post('identity');
      if ($this->customer_model->check_identity($identity)) {
        $data = [
          'title' => 'Login',
          'header' => 'partials/header',
          'identity' => $identity,
          'content' => 'partials/loginRegister/formPass',
          'script' => 'partials/script',
        ];
      } else {
        $data = [
          'title' => 'Login',
          'identity' => $identity,
          'header' => 'partials/header',
          'content' => 'partials/loginRegister/createPass',
          'script' => 'partials/script',
        ];
      }
    }
    $this->load->view('partials/main', $data);
  }

  public function verify_password() {
    $this->form_validation->set_rules('identity', 'Username or Email', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == FALSE) {
        $data = [
            'title' => 'Login',
            'header' => 'partials/header',
            'content' => 'partials/loginRegister/formPass',
            'script' => 'partials/script',
            'error' => 'Incorrect Identity or Password'
        ];
        $this->load->view('partials/main', $data);
    } else {
        $identity = $this->input->post('identity');
        $password = $this->input->post('password');

        // Verify password
        if ($this->customer_model->verify_pass($identity, $password)) {
            $user_data = array(
                'identity' => $identity,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($user_data);
            redirect('c_home');
        } else {
            $data = [
                'title' => 'Login',
                'header' => 'partials/header',
                'identity' => $this->input->post('identity'),
                'content' => 'partials/loginRegister/formPass',
                'script' => 'partials/script',
                'error' => 'Incorrect Identity or Password'
            ];
            $this->load->view('partials/main', $data);
        }
    }
}


  public function createPass()
  {
    $this->form_validation->set_rules('identity', 'Username or Email', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('password2', 'Password2', 'trim|matches[password]|required');

    if ($this->form_validation->run() == FALSE) {
      $data = [
        'title' => 'Register',
        'identity' => $this->input->post('identity'),
        'header' => 'partials/header',
        'content' => 'partials/loginRegister/createPass',
        'script' => 'partials/script'
      ];
      $this->load->view('partials/main', $data);
    } else {
      $identity = $this->input->post('identity');
      $password = $this->input->post('password');

      // Insert new user into database
      $data = [
        'email' => filter_var($identity, FILTER_VALIDATE_EMAIL) ? $identity : NULL,
        'username' => !filter_var($identity, FILTER_VALIDATE_EMAIL) ? $identity : NULL,
        'password' => password_hash($password, PASSWORD_DEFAULT)
      ];
      $this->db->insert('tamu', $data);

      // Redirect to main menu
      $user_data = array(
        'identity' => $identity,
        'logged_in' => TRUE
      );
      $this->session->set_userdata($user_data);

      redirect('c_home');
    }
  }

  public function logout()
  {
    // Hapus data session dan arahkan ke halaman login
    $this->session->unset_userdata('identity');
    $this->session->unset_userdata('logged_in');
    $this->session->sess_destroy();
    redirect('auth/login');
  }
}



/* End of file Controllername.php */
