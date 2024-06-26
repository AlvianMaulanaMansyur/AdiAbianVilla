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
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]', array(
      'required' => 'Password cannot empty!',
      'min_length' => 'Password at least 8 characters!',
    ));
 
    if ($this->form_validation->run() == FALSE) {
        $data = [
            'title' => 'Login',
            'header' => 'partials/header',
            'content' => 'partials/loginRegister/formPass',
            'identity' => $this->input->post('identity'),
            'script' => 'partials/script',
            'error_message' => 'Incorrect Identity or Password'
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
                'error_message' => 'Incorrect Identity or Password'
            ];
            $this->load->view('partials/main', $data);
        }
    }
}


  public function createPass()
  {
    $this->form_validation->set_rules('identity', 'Username or Email', 'trim|required', array(
      'required' => 'email cannot be empty!',
    ));
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|regex_match[/[0-9]/]', array(
      'required' => 'password cannot be empty',
      'min_length' => 'password must be at least 8 characters',
      'regex_match' => 'password must be at least contain 1 number'
    ));
    $this->form_validation->set_rules('password2', 'Password2', 'trim|matches[password]|required', array(
      'required' => 'password confirmation cannot be empty',
      'matches' => 'Password does not match!'  
    ));

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
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'foto_profil' => 'assets/images/profile/default.jpg'
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

  public function forgotPassword()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array(
      'required' => 'email cannot be empty!',
    ));
    
    if ($this->form_validation->run() == FALSE){
      $data = [
        'title' => 'Password Recovery',
        'header' => 'partials/header',
        'content' => 'partials/forgotPassword/forgotPass',
      ];
      }else {
        $email = $this->input->post('email');
        $user = $this->db->get_where('tamu', ['email' => $email])->row_array();

        $link = base_url('Auth/changePassword');
        $subject = 'Password Recovery';
        $message =
          "<html>
            <p>click link down below to change your password!</p>
            <a href='$link'>Click Me!</a>
          </html>";
        if ($user){
          $this->session->set_userdata('reset', $email);
          $this->send_email($email, $subject, $message);
            if(isset($email)){
              $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert" please check your email! </div>' );
              redirect('Auth/forgotPassword');
            } else {
              redirect('Auth/Login');
            }
        } else {
          $this->session->set_flashdata('error_message', '<div class="alert alert-danger" role="alert">
                your email was not found </div>');
          redirect('Auth/forgotPassword');     
        }
      } 
    $this->load->view('partials/authTemplate', $data);
  } 
  
  
  public function changePassword()
  {
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[password1]', array(
      'min_length' => 'password atleast contain 8 characters!',
      'matches' => 'password is not the same'

  ));
  $this->form_validation->set_rules('password1', 'Password1', 'trim|required|min_length[8]|matches[password]', array(
      'min_length' => 'password atleast contain 8 characters!',
      'matches' => 'password is not the same'
  ));
  if ($this->form_validation->run() == FALSE) {
  $data = [
      'title' => 'Password Recovery',
      'header' => 'partials/header',
      'content' => 'partials/changePass',

  ];
  $this->load->view('partials/authTemplate', $data);
  } else  {
      $password = $this->input->post('password');
      $email = $this->session->userdata('reset');

      $data = password_hash($password, PASSWORD_DEFAULT);
      $this->db->set('password', $data);
      $this->db->where('email', $email);
      $this->db->update('tamu');

      $this->session->unset_userdata('reset');

      $this->session->set_flashdata('error_message', '<div class="alert alert-success" role="alert">
      password has been changed!</div>');

      redirect('Auth/Login');
  }
  }

  public function send_email($to, $subject, $message)
  {
    $this->email->set_newline("\r\n");
    $this->email->from('balinirvanakomputer@gmail.com', 'Adi Abian Villa');
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($message);

    if($this->email->send()){
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
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
