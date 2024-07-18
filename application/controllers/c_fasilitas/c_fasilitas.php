<?php


defined('BASEPATH') or exit('No direct script access allowed');

class c_fasilitas extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('mFasilitas/m_fasilitas');
        if (empty($this->session->userdata('username'))) {
            redirect('Authadmin/login');
        }
    }
    public function index()
    {
        
        // $tampilData = $this->m_fasilitas->getAllData();
        $fasilitas = $this->m_fasilitas->getData();
        $data = [
            'title' => 'Fasilitas',
            'header' => 'dashboard/header',
            'navbar' => 'dashboard/navbar',
            'sidebar' => 'dashboard/sidebar',
            'content' => 'dashboard/fasilitas/fasilitas',
            'footer' => 'dashboard/footer',
            'script' => 'dashboard/script',
            'fasilitas' => $fasilitas,
        ];
        $this->load->view('dashboard/main', $data);
    }

    public function edit()
    {
        echo json_encode($this->m_fasilitas->getFasilitasById($this->input->post('id')));
    }

    public function insert()
    {
        $cek = $this->db->get_where('fasilitas', array('nama_fasilitas' => $this->input->post('nama_fasilitas')))->num_rows();
        // var_dump($cek);
        // die;
        if ($cek > 0) {
            $sess = array(
                'tittle' => 'Gagal',
                'icon' => 'error'
            );
            $this->session->set_userdata($sess);
            $this->session->set_flashdata('flash', 'fasilitas sudah ada!');
            redirect('c_fasilitas/c_fasilitas/');
        } else {
            //upload image
            $image = $this->uploadImage();
            // insert into database
            $this->m_fasilitas->insertFasilitas($image);
            $sess = array(
                'tittle' => 'Berhasil',
                'icon' => 'success'
            );
            $this->session->set_userdata($sess);
            $this->session->set_flashdata('flash', 'data fasilitas berhasil ditambah!');
            redirect('c_fasilitas/c_fasilitas/');
        }
    }

    public function uploadImage()
    {
        $config['upload_path']          = './assets/images/fasilitas/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $fasilitas = $this->input->post('nama_fasilitas');
        $nama_fasilitas = preg_replace('/[^a-z]+/i', '_', $fasilitas); 
        $new_name = '(' . time() . ')' . $nama_fasilitas;
        $config['encrypt_name'] = FALSE;
        $config['file_name'] = $new_name;
        $config['max_size']  = '2000';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $error = $this->upload->display_errors('', '');
            $sess = array(
                'tittle' => 'Gagal',
                'icon' => 'error'
            );
            $this->session->set_userdata($sess);
            $this->session->set_flashdata('flash', $error);
            redirect('c_fasilitas/c_fasilitas/');
        } else {
            $imageData = $this->upload->data();
            $this->resizeImage($imageData['full_path']);
            // insert into database
            return $imageData['file_name'];
        }
    }

    public function ubah($idFasilitas)
    {
        $nama = $this->db->get_where('fasilitas', array('id_fasilitas' => $idFasilitas))->result_array();
        $result = $this->input->post('nama_fasilitas');
        if ($nama[0]['nama_fasilitas'] != $result) {
            $cek = $this->db->get_where('fasilitas', array('nama_fasilitas' => $this->input->post('nama_fasilitas')))->num_rows();
            if ($cek > 0) {
                $sess = array(
                    'tittle' => 'Gagal',
                    'icon' => 'error'
                );
                $this->session->set_userdata($sess);
                $this->session->set_flashdata('flash', 'fasilitas sudah ada!');
                redirect('c_fasilitas/c_fasilitas');
            } else {
                $this->ubahValid($idFasilitas);
            }
        } else {
            $this->ubahValid($idFasilitas);
        }
    }
    public function ubahValid($idFasilitas)
    {
        $this->prosesEdit($idFasilitas);
        $sess = array(
            'tittle' => 'Berhasil',
            'icon' => 'success'
        );
        $this->session->set_userdata($sess);
        $this->session->set_flashdata('flash', 'data fasilitas berhasil diubah!');
        redirect('c_fasilitas/c_fasilitas');
    }

    public function prosesEdit($idFasilitas)
    {
        if (!empty($_FILES['image']['name'])) {
            $image = $this->uploadImage();
            $data = $this->db->get_where('fasilitas', array('id_fasilitas' => $idFasilitas));
            $oldImage = $data->result_array();
            $target_file = $oldImage[0]['image'];
            if (file_exists($target_file)) {
                unlink($target_file);
                $this->m_fasilitas->editFotoFasilitas($image);
            } else {
                $this->m_fasilitas->editFotoFasilitas($image);
            }
        } else {
            $this->m_fasilitas->editFasilitas();
        }
    }

    public function resizeImage($fullPath)
    {
        $configer = array(
            'image_library' => 'gd2',
            'source_image' => $fullPath,
            'maintain_ratio' => TRUE,
            'width' => 80,
            'height' => 80,
        );
        $this->load->library('image_lib', $configer);
        if (!$this->image_lib->resize()) {
            $error = $this->image_lib->display_errors('', '');
            $sess = array(
                'tittle' => 'Gagal',
                'icon' => 'error'
            );
            $this->session->set_userdata($sess);
            $this->session->set_flashdata('flash', $error);
            redirect('c_fasilitas/c_fasilitas/');
        }
    }

    public function delete($idFasilitas)
    {
            $this->m_fasilitas->deleteFasilitas($idFasilitas);
        $sess = array(
            'tittle' => 'Berhasil',
            'icon' => 'success'
        );
        $this->session->set_userdata($sess);
        $this->session->set_flashdata('flash', 'data fasilitas berhasil dihapus!');
        redirect('c_fasilitas/c_fasilitas');
    }
    
}

/* End of file Controllername.php */
 