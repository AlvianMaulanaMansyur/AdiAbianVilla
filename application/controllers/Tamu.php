<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tamu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tamu');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $email = $this->session->userdata('identity');
        // var_dump($email);

        $tamu = $this->M_tamu->getTamuByEmailUsername($email);
        $data = [
            'title' => 'Tamu',
            'header' => 'partials/header',
            'script' => 'partials/script',
            'content' => 'tamu/tamu',
            'tamu' => $tamu,

        ];
        $this->load->view('partials/main', $data);
    }
    public function editProfile($id_tamu)
    {
        $data = [
            'tamu' => $this->M_tamu->getTamuById($id_tamu),
            'header' => 'partials/header',
            'script' => 'partials/script',
            'content' => 'tamu/edit_profile',
            'title' => ' Edit Profile'
        ];

        $this->load->view('partials/main', $data);
    }

    public function edittamu($id_tamu)
    {
        $data = [
            'tamu' => $this->M_tamu->getTamuById($id_tamu),
            'header' => 'partials/header',
            'script' => 'partials/script',
            'content' => 'tamu/edit_profile',
            'title' => ' Edit tamu'
        ];

        $this->load->view('partials/main', $data);
    }

    public function updateProfile()
    {
        $id_tamu = $this->input->post('id_tamu');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'tamu' => $this->M_tamu->getTamuById($id_tamu),
                'header' => 'partials/header',
                'script' => 'partials/script',
                'content' => 'tamu/edit_profile',
                'title' => ' Edit tamu'
            ];
            $this->load->view('partials/main', $data);
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'no_telp' => $this->input->post('no_telp'),

                'jenis_kelamin' => $this->input->post('jenis_kelamin')
            ];

            // Upload foto profil
            if (!empty($_FILES['foto_profil']['name'])) {
                $config['upload_path'] = './assets/foto/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 2048; // 2MB

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_profil')) {
                    $uploadData = $this->upload->data();
                    $data['foto_profil'] = $uploadData['file_name'];
                } else {
                    $error = $this->upload->display_errors();
                    $data['upload_error'] = $error;
                }
            }

            $update = $this->M_tamu->updateTamu($id_tamu, $data);
            if ($update) {
                $this->session->set_flashdata('message', 'Profile updated successfully');
            } else {
                $this->session->set_flashdata('message', 'Failed to update profile');
            }
            redirect('tamu/editProfile/' . $id_tamu);
        }
    }
    public function deletePhoto($id_tamu)
    {
        // Load the model and get the current photo filename
        $tamu = $this->M_tamu->getTamuById($id_tamu);

        if ($tamu && !empty($tamu['foto_profil'])) {
            $file_path = './assets/foto/' . $tamu['foto_profil'];

            // Delete the file from the server
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            // Update the database record to remove the photo reference
            $this->M_tamu->updateTamu($id_tamu, ['foto_profil' => '']);

            $this->session->set_flashdata('message', 'Foto profil berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Foto profil tidak ditemukan.');
        }

        redirect('tamu/editProfile/' . $id_tamu);
    }
}

/* End of file Tamu.php */
