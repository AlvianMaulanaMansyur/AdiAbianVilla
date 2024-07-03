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

    public function statusketersediaan()
    {
        $kamar = $this->M_dashboard->get_kamar();
        $tipekamar = $this->M_dashboard->get_tipe_kamar();
        $data = [
            'title' => 'Adi Abian Villa Dashboard',
            'header' => 'dashboard/header',
            'navbar' => 'dashboard/navbar',
            'sidebar' => 'dashboard/sidebar',
            'content' => 'dashboard/statuskamar',
            'footer' => 'dashboard/footer',
            'script' => 'dashboard/script',
            'kamar' => $kamar,
            'tipekamar' => $tipekamar
        ];
        $this->load->view('dashboard/main', $data);
    }



    public function addKamar()
    {
        $this->form_validation->set_rules('no_kamar', 'No Kamar', 'required');
        $this->form_validation->set_rules('jenis_kamar', 'Tipe Kamar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = ['status' => false, 'message' => validation_errors()];
            echo json_encode($response);
        } else {
            $no_kamar = $this->input->post('no_kamar');
            $jenis_kamar = $this->input->post('jenis_kamar');
            $id_detail_kamar = $this->M_dashboard->getIddetailkamar($jenis_kamar);
            // var_dump($id_detail_kamar);
            $data = [
                'no_kamar' => $no_kamar,
                'id_detail_kamar' => $id_detail_kamar[0]['id_detail_kamar'],
                'id_admin' => 1
            ];
            $insert = $this->M_dashboard->insertKamar($data);
            if ($insert) {
                $response = ['status' => true, 'message' => 'Kamar berhasil ditambahkan'];
            } else {
                $response = ['status' => false, 'message' => 'Gagal menambahkan kamar'];
            }
            echo json_encode($response);
        }
    }

    public function addtipekamar()
    {
        $this->form_validation->set_rules('harga', 'Harga Kamar', 'required');
        $this->form_validation->set_rules('jenis_kamar', 'Tipe Kamar', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = ['status' => false, 'message' => validation_errors()];
            echo json_encode($response);
        } else {
            $data = [
                'harga' => $this->input->post('harga'),
                'jenis_kamar' => $this->input->post('jenis_kamar'),
                'deskripsi' => $this->input->post('deskripsi'),
            ];
            $insert = $this->M_dashboard->inserttipe($data);
            if ($insert) {
                $response = ['status' => true, 'message' => 'Kamar berhasil ditambahkan'];
            } else {
                $response = ['status' => false, 'message' => 'Gagal menambahkan kamar'];
            }
            echo json_encode($response);
        }
    }
    public function editTipeKamar()
    {
        $id_detail_kamar = $this->input->post('id_detail_kamar');
        $data = [
            'jenis_kamar' => $this->input->post('jenis_kamar'),
            'harga' => $this->input->post('harga'),
            'deskripsi' => $this->input->post('deskripsi')
        ];
        $update = $this->M_dashboard->editTipeKamar($id_detail_kamar, $data);
        echo json_encode(['status' => $update]);
    }


    public function deleteTipeKamar()
    {
        $id_detail_kamar = $this->input->post('id_detail_kamar');
        $delete = $this->M_dashboard->deleteTipeKamar($id_detail_kamar);
        if ($delete) {
            $response = ['status' => true, 'message' => 'Kamar berhasil dihapus'];
        } else {
            $response = ['status' => false, 'message' => 'Gagal menghapus kamar'];
        }
        echo json_encode($response);
    }



    public function editKamar()
    {
        $this->form_validation->set_rules('id_kamar', 'ID Kamar', 'required');
        $this->form_validation->set_rules('no_kamar', 'No Kamar', 'required');
        $this->form_validation->set_rules('jenis_kamar', 'Tipe Kamar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = ['status' => false, 'message' => validation_errors()];
            echo json_encode($response);
        } else {
            $id_kamar = $this->input->post('id_kamar');
            $no_kamar = $this->input->post('no_kamar');
            $jenis_kamar = $this->input->post('jenis_kamar');
            $id_detail_kamar = $this->M_dashboard->getIddetailkamar($jenis_kamar);
            // var_dump($id_detail_kamar);
            $data = [
                'no_kamar' => $no_kamar,
                'id_detail_kamar' => $id_detail_kamar[0]['id_detail_kamar'],
                'id_admin' => 1
            ];
            $update = $this->M_dashboard->updateKamar($id_kamar, $data);
            if ($update) {
                $response = ['status' => true, 'message' => 'Kamar berhasil diubah'];
            } else {
                $response = ['status' => false, 'message' => 'Gagal mengubah kamar'];
            }
            echo json_encode($response);
        }
    }

    public function deleteKamar()
    {
        $id_kamar = $this->input->post('id_kamar');
        $delete = $this->M_dashboard->deleteKamar($id_kamar);
        if ($delete) {
            $response = ['status' => true, 'message' => 'Kamar berhasil dihapus'];
        } else {
            $response = ['status' => false, 'message' => 'Gagal menghapus kamar'];
        }
        echo json_encode($response);
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

    public function edit()
    {
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
}

/* End of file Controllername.php */
