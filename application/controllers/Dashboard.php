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
        $this->load->library('PDF');
        
        
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

    public function addKamar()
    {
        $this->form_validation->set_rules('no_kamar', 'No Kamar', 'required');
        $this->form_validation->set_rules('harga_kamar', 'Harga Kamar', 'required');
        $this->form_validation->set_rules('tipe_kamar', 'Tipe Kamar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = ['status' => false, 'message' => validation_errors()];
            echo json_encode($response);
        } else {
            $data = [
                'no_kamar' => $this->input->post('no_kamar'),
                'harga_kamar' => $this->input->post('harga_kamar'),
                'tipe_kamar' => $this->input->post('tipe_kamar'),
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

    public function editKamar()
    {
        $this->form_validation->set_rules('id_kamar', 'ID Kamar', 'required');
        $this->form_validation->set_rules('no_kamar', 'No Kamar', 'required');
        $this->form_validation->set_rules('harga_kamar', 'Harga Kamar', 'required');
        $this->form_validation->set_rules('tipe_kamar', 'Tipe Kamar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = ['status' => false, 'message' => validation_errors()];
            echo json_encode($response);
        } else {
            $id_kamar = $this->input->post('id_kamar');
            $data = [
                'no_kamar' => $this->input->post('no_kamar'),
                'harga_kamar' => $this->input->post('harga_kamar'),
                'tipe_kamar' => $this->input->post('tipe_kamar')
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

    public function monthlyReport()
    {
        $selectedMonth = $this->input->get('month');
        if ($selectedMonth) {
            $selectedYear = $this->input->get('year');

            $monthYear = "$selectedYear-$selectedMonth";

            // Simpan nilai bulan ke dalam session
            $this->session->set_userdata('selected_month', $monthYear);
            $formattedMonthYear = date("F Y", strtotime($this->session->userdata('selected_month')));
        } else {
            $monthYear = "";
            $this->session->set_userdata('selected_month', $monthYear);
            $monthYear = $this->session->userdata('selected_month');
            $formattedMonthYear = "";
        }

        $monthly_orders = $this->M_dashboard->getMonthlyOrders($this->session->userdata('selected_month'));

        $data = [
            'title' => 'Guest Data',
            'header' => 'dashboard/header',
            'navbar' => 'dashboard/navbar',
            'sidebar' => 'dashboard/sidebar',
            // 'content' => 'dashboard/guestdata',
            'footer' => 'dashboard/footer',
            'script' => 'dashboard/script',
            // 'guest' => $guest,
            'monthly_orders' => $monthly_orders,
            // 'active_tab' => 'monthlyReport',
            'selected_month' => $formattedMonthYear,
        ];

        if ($selectedMonth == '') {
            $data['content'] = 'dashboard/monthly_report';
        } else {
            $data['content'] = 'dashboard/monthly_report_table';
        }
        $this->load->view('dashboard/main', $data);
    }

    public function saveAsPDF()
    {
        $data['title'] = 'Laporan Bulanan';
        $monthYear = $this->session->userdata('selected_month');

        if ($monthYear == null) {
            $formattedMonthYear = "";
        } else {
            $formattedMonthYear = date("F Y", strtotime($monthYear));
        }

        $data['title'] = 'Laporan Bulanan ' . $formattedMonthYear;
        $monthly_orders = $this->M_dashboard->getMonthlyOrders($monthYear);

        $data = [
            'monthly_orders' => $monthly_orders,
            'selected_month' => $formattedMonthYear, // Menggunakan format yang baru
        ];

        $data['formatCurrency'] = array($this->pdf, 'formatCurrency');

        $filename = 'LaporanBulanan';
        $paper = 'A4';
        $orientation = 'portrait';
        $view = $this->load->view('dashboard/monthly_report_pdf', $data, true);

        $this->pdf->generate($view, $filename, $paper, $orientation);
    }

}

/* End of file Controllername.php */
 