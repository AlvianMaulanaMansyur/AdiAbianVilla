<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('customer_model');
        $this->load->model('M_dashboard');
        $this->load->model('M_pemesanan');
        $this->load->model('mFasilitas/m_fasilitas');

        
        if (empty($this->session->userdata('username'))) {
            redirect('Authadmin/login');
        }
    }

    public function main()
    {   
            $data = [
                'title' => 'Adi Abian Villa Dashboard',
                'header' => 'dashboard/header',
                'navbar' => 'dashboard/navbar',
                'sidebar' => 'dashboard/sidebar',
                'content' => 'dashboard/test',
                'footer' => 'dashboard/footer',
                'script' => 'dashboard/script'
            ];
            $this->load->view('dashboard/main', $data);
    }



    public function index()
    {
        $kamar = $this->M_dashboard->get_status_ketersediaan();
        $data = [
            'title' => 'Calendar',
            'header' => 'partials/header',
            'content' => 'dashboard/main',
            'script' => 'partials/script',
            'kamar' => $kamar,
        ];
        $this->load->view('partials/main', $data);
    }
    public function ubah_status($id_kamar)
    {
        $this->M_dashboard->ubah_status_kamar($id_kamar, 0);
        redirect('dashboard/statusketersediaan');
    }
    public function ada_status($id_kamar)
    {
        $this->M_dashboard->ubah_status_kamar($id_kamar, 1);
        redirect('dashboard/statusketersediaan');
    }
    public function test()
    {
        $this->load->view('dashboard/main');
    }

    public function statusketersediaan()
    {
        $kamar = $this->M_dashboard->get_kamar();
        $data = [
            'title' => 'Adi Abian Villa Dashboard',
            'header' => 'dashboard/header',
            'navbar' => 'dashboard/navbar',
            'sidebar' => 'dashboard/sidebar',
            'content' => 'dashboard/statuskamar',
            'footer' => 'dashboard/footer',
            'script' => 'dashboard/script',
            'kamar' => $kamar
        ];
        $this->load->view('dashboard/main', $data);
    }
    public function detailketersediaan()
    {
        
    }

    public function daftarPemesanan()
    {
        $pemesanan = $this->M_pemesanan->getPemesanan();
        $data = [
            'title' => 'Adi Abian Villa Dashboard',
            'header' => 'dashboard/header',
            'navbar' => 'dashboard/navbar',
            'sidebar' => 'dashboard/sidebar',
            'content' => 'dashboard/daftar_pemesanan',
            'footer' => 'dashboard/footer',
            'script' => 'dashboard/script',
            'pemesanan' => $pemesanan
        ];
        $this->load->view('dashboard/main', $data);
    }
    public function guestdata()
    {

        $guest = $this->customer_model->get_data_tamu();
        $data = [
            'title' => 'Guest Data',
            'header' => 'dashboard/header',
            'navbar' => 'dashboard/navbar',
            'sidebar' => 'dashboard/sidebar',
            'content' => 'dashboard/guestdata',
            'footer' => 'dashboard/footer',
            'script' => 'dashboard/script',
            'guest' => $guest,
        ];

        $this->load->view('dashboard/main', $data);
    }

    public function edit() {
        $id_tamu = $this->input->post('id_tamu');
        $data = [
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'no_telp' => $this->input->post('phone'),
            'jenis_kelamin' => $this->input->post('gender'),
            'negara' => $this->input->post('nationality')
        ];
        $this->customer_model->update_guest($id_tamu, $data);

        // Set flash data untuk notifikasi
        $this->session->set_flashdata('success', 'Data berhasil diperbarui!');
        redirect('Dashboard/guestData');
    }
    
    public function fasilitas()
    {
        $fasilitas = $this->m_fasilitas->getAllData();
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
    public function insert_fasilitas()
    {
        $fasilitas = $this->db->get_where('fasilitas', array('id_fasilitas' => $this->input->post('id_fasilitas')))->num_rows();
        $nama_fasilitas = $this->db->get_where('fasilitas', array('nama_fasilitas' => $this->input->post('nama_fasilitas')))->num_rows();
                $image = $this->uploadImage();
                $this->M_dashboard->insertFasilitas($image);
                redirect('dashboard/tambah_fasilitas/');
    }
    public function edit_fasilitas()
    {
        $id_fasilitas = $this->input->post('id_fasilitas');
        $data = [
            'gambar' => $this->input->post('image'),
            'nama_fasilitas' => $this->input->post('nama_fasilitas'),
        ];
        $this->M_dashboard->edit_fasilitas_kamar($id_fasilitas, 0);
        redirect('Dashboard/fasilitas');
    }
    public function delete_fasilitas()
    {
        $this->db->where('id_fasilitas', $id_fasilitas);
        $result = $this->db->delete('fasilitas');
        return $result;
    }
    public function tambah_fasilitas()
    {
        // $guest = $this->M_dashboard-->get_fasilitas();
        $data = [
            'title' => 'Fasilitas',
            'header' => 'dashboard/header',
            'navbar' => 'dashboard/navbar',
            'sidebar' => 'dashboard/sidebar',
            'content' => 'dashboard/fasilitas/tambah_fasilitas',
            'footer' => 'dashboard/footer',
            'script' => 'dashboard/script',
            // 'guest' => $guest,
        ];

        $this->load->view('dashboard/main', $data);
    }
    public function uploadImage()
    {
        $config['upload_path']          = './assets/admin/img/admin/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $new_name = '(' . time() . ')' . $this->input->post('nip');
        $config['encrypt_name'] = FALSE;
        $config['file_name'] = $new_name;
        $config['max_size']  = '2000';
        $config['overwrite']  = TRUE;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $error = $this->upload->display_errors('', '');
            $sess = array(
                'tittle' => 'Gagal',
                'icon' => 'error'
            );
            $this->session->set_userdata($sess);
            $this->session->set_flashdata('flash', $error);
            redirect('c_admin/dataAdmin/c_dataAdmin/tambahAdmin');
        } else {
            $imageData = $this->upload->data();
            // insert into database
            return $imageData['file_name'];
        }
    }

}

/* End of file Controllername.php */
 